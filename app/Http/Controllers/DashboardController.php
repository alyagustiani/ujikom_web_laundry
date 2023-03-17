<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Member;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Outlet;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::count();
        $produk = Produk::count();
        $outlet = Outlet::count();
        $member = Member::count();

        //$tanggal_awal = date('Y-m-01');
        //$tanggal_akhir = date('Y-m-d');

        //$data_tanggal = array();
        //$data_pendapatan = array();

        // while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
        //     $data_tanggal[] = (int) substr($tanggal_awal, 8, 2);

        //     $total_transaksi = Transaksi::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('bayar');

        //     $pendapatan = $total_transaksi - $total_pembelian - $total_pengeluaran;
        //     //$data_pendapatan[] += $pendapatan;

        //     $tanggal_awal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_awal)));
        // }

        if (Auth::check()) {
            $user = Auth::user()->name;
            return view('dashboard.index', compact('user'));
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
        //
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
