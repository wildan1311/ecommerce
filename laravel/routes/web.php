<?php

use App\Http\Controllers\cart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\post_barang;

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
    return view('home',[
        'title' => 'home'
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/admin', function () {
    return view('dashboard.admin');
})->middleware('admin');

Route::resource('post', PostController::class);

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
Route::get('/create_post', function(){
    return view('dashboard.post.create', [
        'notif' => ''
    ]);
});


Route::resource('cart', cart::class, [
    'title' => 'cart',
])->middleware('auth');