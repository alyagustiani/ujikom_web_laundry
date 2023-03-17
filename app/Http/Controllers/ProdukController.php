<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user()->name;
            $produk = Produk::orderby('kode_produk', 'ASC')
            ->paginate(5);
            return view('produk.index', compact('produk','user'));
        } else {
            // user belum login, redirect ke halaman login
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_produk'     => 'required',
            'nama_produk'     => 'required',
            'harga_beli'     => 'required',
            'harga_jual'     => 'required',
            'stok'   => 'required'
        ]);
    
        //upload image
        //$image = $request->file('image');
        //$image->storeAs('public/blogs', $image->hashName());
    
        $produk = Produk::create([
            //'image'     => $image->hashName(),
            'kode_produk'     => $request->kode_produk,
            'nama_produk'   => $request->nama_produk,
            'harga_beli'   => $request->harga_beli,
            'harga_jual'   => $request->harga_jual,
            'stok'   => $request->stok

        ]);
    
        if($produk){
            //redirect dengan pesan sukses
            return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('produk.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update($id_produk, Request $request)
    {
        $this->validate($request, [
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required'
        ]);
        $id_produk = Produk::find($id_produk);
        $id_produk->kode_produk   = $request->kode_produk;
        $id_produk->nama_produk      = $request->nama_produk;
        $id_produk->harga_beli  = $request->harga_beli;
        $id_produk->harga_jual   = $request->harga_jual;
        $id_produk->stok   = $request->stok;
        
        $id_produk->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_produk)
    {
        $produk=Produk::find($id_produk);
        $produk->delete();
        return redirect()->back();
    }
}
