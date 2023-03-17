<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
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
            $member = member::orderby('kode_member', 'ASC')
            ->paginate(5);
            return view('member.index', compact('member','user'));
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
        return view('member.create');
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
            'kode_member'     => 'required',
            'nama'     => 'required',
            'alamat'     => 'required',
            'telepon'     => 'required'
        ]);
    
        //upload image
        //$image = $request->file('image');
        //$image->storeAs('public/blogs', $image->hashName());
    
        $member = member::create([
            //'image'     => $image->hashName(),
            'kode_member'     => $request->kode_member,
            'nama'   => $request->nama,
            'alamat'   => $request->alamat,
            'telepon'   => $request->telepon

        ]);
    
        if($member){
            //redirect dengan pesan sukses
            return redirect()->route('member.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('member.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function update($id_member, Request $request)
    {
        $this->validate($request, [
            'kode_member' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required'
        ]);
        $id_member = member::find($id_member);
        $id_member->kode_member   = $request->kode_member;
        $id_member->nama      = $request->nama;
        $id_member->alamat  = $request->alamat;
        $id_member->telepon   = $request->telepon;
        
        $id_member->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_member)
    {
        $member=member::find($id_member);
        $member->delete();
        return redirect()->back();
    }
}
