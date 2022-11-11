<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\beli;
use Illuminate\Support\Facades\DB;
use App\Models\post_barang;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Support\Facades\Auth;

class cart extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = DB::table('beli')
            ->join('barang', 'beli.id_barang', '=', 'barang.id')
            ->select('barang.gambar', 'barang.name', 'barang.harga', 'beli.jumlah')
            ->where([
                ['beli.id_user','=',auth()->user()->id],
                ['beli.status','=','pending'],
            ])
            ->get();
        return view('cart', [
            'title' => 'cart',
            'cart' => $cart,
            'total'=> '0',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'jumlah' => 'required',
        ]);
        $beli = new beli();
        $beli->id_barang = $request->id_barang;
        $beli->jumlah = $request->jumlah;
        $beli->id_user = auth()->user()->id;
        $beli->save();
        return redirect('/shop');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('beli')
            ->whereIn('id', json_decode($id))
            ->update(['status'=>'paid']);
        return redirect('/thankyou');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
