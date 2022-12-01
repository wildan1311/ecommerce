<?php

use App\Http\Controllers\cart;
use App\Http\Controllers\generatePDF;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\beli;
use App\Models\post_barang;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $barang = DB::table('barang')
            ->skip(0)
            ->take(4)
            ->get();
    return view('home',[
        'title' => 'home',
        'barang'=>$barang,
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/about', function(){
    return view('about', [
        'title' => 'about'
    ]);
});

Route::get('/shop', function(){
    $barang = post_barang::get();
    return view('shop', 
    [
        'barang' => $barang,
        'title' => 'shop'
    ]);
});
Route::get('/thankyou', function(){
    return view('thankyou', [
        'title' => 'thankyou',
    ]);
})->name('thankyou');

// middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        $transaksi = DB::table('beli')
        ->join('users', 'beli.id_user', '=', 'users.id')
        ->join('barang', 'beli.id_barang', '=', 'barang.id')
        ->select(['beli.id', 'users.name AS nama', 'barang.name', 'beli.jumlah', 'beli.status'])
        ->get();

        $dataRekap = DB::table('beli')
                    ->select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy("month_name")
                    ->orderBy('created_at')
                    ->pluck('count', 'month_name');
        $labels = $dataRekap->keys();
        $data = $dataRekap->values();
        // dd(compact('labels', 'data'));
        return view('dashboard.main', [
            'transaksi'=>$transaksi,
            'charts' => compact('labels', 'data'),
        ]);
    });

    Route::resource('post', PostController::class);

    Route::get('/create_post', function(){
        return view('dashboard.post.create', [
            'notif' => ''
        ]);
    });
    Route::resource('cart', cart::class);
    
    Route::get('/checkout', function () {
        $cart = DB::table('beli')
                ->join('barang', 'beli.id_barang', '=', 'barang.id')
                ->select('barang.gambar', 'barang.name', 'barang.harga', 'beli.*')
                ->where([
                    ['beli.id_user','=',auth()->user()->id],
                    ['beli.status', '=', 'pending']    
                ])
                ->get();
        return view('checkout',[
            'title' => 'checkout',
            'cart' => $cart,
        ]);
    });
});

Route::get('/coba', [generatePDF::class, 'coba']);

Route::get('generate-pdf', [generatePDF::class, 'generatePDF'])->name('pdf');