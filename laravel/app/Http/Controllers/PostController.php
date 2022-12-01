<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post_barang;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = post_barang::all();
        return view('dashboard.post.barang', [
            'barang' => $barang,
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
        $barang = post_barang::find($id);
        return response()->json($barang);
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
        $barang = post_barang::find($id);

        $barang->name = $request->name;
        $barang->deskripsi = $request->deskripsi;
        $barang->jumlah = $request->jumlah;
        $barang->harga = $request->harga;
        $barang->save();

        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = post_barang::find($id);
        
        $path = 'template/images';
        File::delete($path, $barang->gambar);

        // Alert::question('Yakin akan menghapus data ?', 'Question Message');
        $barang->delete();
        return redirect('/post');
    }
}
