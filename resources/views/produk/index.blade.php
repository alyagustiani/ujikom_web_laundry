@extends('adminlte::page')

@section('title', 'Halaman Data Produk')

@section('content_header')
<h1>Halaman Data Produk</h1>
@stop

@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahProduk">
        Tambah Data Produk
    </button>
    <p>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Produk</td>
                <td align="center">Kode Produk</td>
                <td align="center">Nama Produk</td>
                <td align="center">Harga beli</td>
                <td align="center">Harga jual</td>
                <td align="center">Stok</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($produk as $index=>$p)
                <tr>
                    <td align="center" scope="row">{{ $index + $produk->firstItem() }}</td>
                    <td>{{$p->id_produk}}</td>
                    <td>{{$p->kode_produk}}</td>
                    <td>{{$p->nama_produk}}</td>
                    <td>{{$p->harga_beli}}</td>
                    <td>{{$p->harga_jual}}</td>
                    <td>{{$p->stok}}</td>
                    <td align="center">

                    <!-- Edit Section -->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditProduk{{$p->id_produk}}">
                        Edit
                    </button>

                    <!-- Modal Edit Data Produk -->
                    <div class="modal fade" id="modalEditProduk{{$p->id_produk}}" tabindex="-1" aria-labelledby="modalEditProduk" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Data Produk</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                    <div class="modal-body">
                                    <!--FORM EDIT DATA PRODUK-->
                                    <form name="formprodukedit" id="formprodukedit" action="/produk/edit/{{$p->id_produk}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        <div class="form-group row">
                                            <label for="id_produk" class="col-sm-4 col-form-label">Kode produk</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="kode_produk" name="kode_produk" placeholder="{{ $p->kode_produk}}">
                                            </div>
                                        </div>

                                        <p>
                                        <div class="form-group row">
                                            <label for="nama_produk" class="col-sm-4 col-form-label">Nama produk</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="{{ $p->nama_produk}}">
                                            </div>
                                        </div>
                                        <p>
                                        <div class="form-group row">
                                            <label for="harga_beli" class="col-sm-4 col-form-label">Harga beli</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="harga_beli" name="harga_beli" placeholder="{{ $p->harga_beli}}">
                                            </div>
                                        </div>
                                        <p>
                                        <div class="form-group row">
                                            <label for="harga_jual" class="col-sm-4 col-form-label">Harga jual</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="{{ $p->harga_jual}}">
                                            </div>
                                        </div>
                                        <p>
                                        <div class="form-group row">
                                            <label for="stok" class="col-sm-4 col-form-label">Stok</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="stok" name="stok" placeholder="{{ $p->stok}}">
                                            </div>
                                        </div>
                                        <p>
                                            
                                        <div class="modal-footer">
                                            <button type="submit" name="produktambah" class="btn btn-success">Edit</button>
                                        </div>
                                    </form>
                                    <!--END FORM EDIT DATA PRODUK-->
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Akhir Modal Edit-->

                    <!-- End of Edit Section -->

                    <!-- Delete Section -->
                    <a href="produk/hapus/{{$p->id_produk}}" onclick="return confirm('Data Produk yang dipilih akan terhapus')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    <!-- End of Delete Section -->                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $produk->currentPage() }} <br />
    Jumlah Data : {{ $produk->total() }} <br />
    Data Per Halaman : {{ $produk->perPage() }} <br />
    {{ $produk->links() }}
    <!--akhir pagination-->

    <!-- Modal Tambah Data Produk -->
    <div class="modal fade" id="modalTambahProduk" tabindex="-1" aria-labelledby="modalTambahProduk" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                 </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH DATA PRODUK-->
                    <form name="formproduktambah" id="formproduktambah" action="/produk/tambah " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_produk" class="col-sm-4 col-form-label">Kode produk</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kode_produk" name="kode_produk" placeholder="Masukan Kode Produk">
                            </div>
                        </div>
                        <p>
                        <div class="form-group row">
                            <label for="nama_produk" class="col-sm-4 col-form-label">Nama produk</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukan Nama Produk">
                            </div>
                        </div>
                        <p>
                        <div class="form-group row">
                            <label for="harga_beli" class="col-sm-4 col-form-label">Harga beli</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="harga_beli" name="harga_beli" placeholder="Masukan Harga Beli">
                            </div>
                        </div>
                        <p>
                        <div class="form-group row">
                            <label for="harga_jual" class="col-sm-4 col-form-label">Harga jual</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Masukan Harga Jual">
                            </div>
                        </div>
                        <p>
                        <div class="form-group row">
                            <label for="stok" class="col-sm-4 col-form-label">Stok</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukan Jumlah Stok">
                            </div>
                        </div>
                        <p>
                            
                        <div class="modal-footer">
                            <button type="submit" name="produktambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                    <!--END FORM TAMBAH DATA PRODUK-->
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Tambah Data Produk -->
    
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
@stop