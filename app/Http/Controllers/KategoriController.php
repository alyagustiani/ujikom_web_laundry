<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
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
            $kategori = Kategori::orderby('kode_kategori', 'ASC')
            ->paginate(5);
            return view('kategori.index', compact('kategori','user'));
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
        return view('kategori.create');
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
            'kode_kategori'     => 'required',
            'nama'     => 'required'
        ]);
    
        //upload image
        //$image = $request->file('image');
        //$image->storeAs('public/blogs', $image->hashName());
    
        $kategori = kategori::create([
            //'image'     => $image->hashName(),
            'kode_kategori'     => $request->kode_kategori,
            'nama'   => $request->nama

        ]);
    
        if($kategori){
            //redirect dengan pesan sukses
            return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('kategori.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update($id_kategori, Request $request)
    {
        $this->validate($request, [
            'kode_kategori' => 'required',
            'nama' => 'required'
        ]);
        $id_kategori = kategori::find($id_kategori);
        $id_kategori->kode_kategori   = $request->kode_kategori;
        $id_kategori->nama      = $request->nama;
        
        $id_kategori->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kategori)
    {
        $kategori=kategori::find($id_kategori);
        $kategori->delete();
        return redirect()->back();
    }
}
