<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OutletController extends Controller
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
            $outlet = Outlet::orderby('kode_outlet', 'ASC')
            ->paginate(5);
            return view('outlet.index', compact('outlet','user'));
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
        return view('outlet.create');
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
            'kode_outlet'     => 'required',
            'nama'     => 'required',
            'alamat'     => 'required',
            'telepon'     => 'required'
        ]);
    
        //upload image
        //$image = $request->file('image');
        //$image->storeAs('public/blogs', $image->hashName());
    
        $outlet = outlet::create([
            //'image'     => $image->hashName(),
            'kode_outlet'     => $request->kode_outlet,
            'nama'   => $request->nama,
            'alamat'   => $request->alamat,
            'telepon'   => $request->telepon

        ]);
    
        if($outlet){
            //redirect dengan pesan sukses
            return redirect()->route('outlet.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('outlet.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit(outlet $outlet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update($id_outlet, Request $request)
    {
        $this->validate($request, [
            'kode_outlet' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required'
        ]);
        $id_outlet = outlet::find($id_outlet);
        $id_outlet->kode_outlet   = $request->kode_outlet;
        $id_outlet->nama      = $request->nama;
        $id_outlet->alamat  = $request->alamat;
        $id_outlet->telepon   = $request->telepon;
        
        $id_outlet->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_outlet)
    {
        $outlet=outlet::find($id_outlet);
        $outlet->delete();
        return redirect()->back();
    }
}
