<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post_barang;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.post.create', [
            'notif' => 'berhasil'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.post.create', ['notif'=> '']);
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
            'name' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'gambar'=> 'required|image|mimes:jpg,png,jpeg'
        ]);

        $post = new post_barang();

        $post->name = $request->name;
        $post->deskripsi = $request->deskripsi;
        $post->harga = $request->harga;
        $post->jumlah = $request->jumlah;

        $imageName = time().$request->name.'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('template/images'), $imageName);

        $post->gambar = $imageName;

        $post->save();
        //CEKLAGI
        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        //
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
