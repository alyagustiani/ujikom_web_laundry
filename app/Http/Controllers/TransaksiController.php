<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
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
            
            $transaksi = Transaksi::orderby('id_transaksi', 'ASC')
            ->paginate(5);

            $produk    = Produk::all();
            $kategori  = Kategori::all();
            $member    = Member::all();

            return view('transaksi.index', compact('transaksi','user','produk','kategori','member'));
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
        return view('transaksi.create');
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
            'id_member'     => 'required',
            'id_kategori'   => 'required',
            'id_produk'     => 'required',
            'berat'         => 'required',
            'harga_per_kg'  => 'required',
            'total'         => 'required'
        ]);

    
        $transaksi = Transaksi::create([
            'id_member'     => $request->id_member,
            'id_kategori'   => $request->id_kategori,
            'id_produk'     => $request->id_produk,
            'berat'         => $request->berat,
            'harga_per_kg'  => $request->harga_per_kg,
            'total'         => $request->total

        ]);

        
        if($transaksi){
            //redirect dengan pesan sukses
            return redirect()->route('transaksi.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('transaksi.index')->with(['error' => 'Data Gagal Disimpan!']);
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update($id_transaksi, Request $request)
    {
        $this->validate($request, [
            'id_member'     => 'required',
            'id_kategori'      => 'required',
            'id_produk'        => 'required',
            'berat'         => 'required',
            'harga_per_kg'  => 'required',
            'total'         => 'required'
        ]);
        $id_transaksi = Transaksi::find($id_transaksi);
        $id_transaksi->id_member    = $request->id_member;
        $id_transaksi->id_kategori     = $request->id_kategori;
        $id_transaksi->id_produk       = $request->id_produk;
        $id_transaksi->berat        = $request->berat;
        $id_transaksi->harga_per_kg = $request->harga_per_kg;
        $id_transaksi->total        = $request->total;
        
        $id_transaksi->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_transaksi)
    {
        $transaksi=transaksi::find($id_transaksi);
        $transaksi->delete();
        return redirect()->back();
    }
}
