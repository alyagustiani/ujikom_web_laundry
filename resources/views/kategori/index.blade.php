@extends('adminlte::page')

@section('title', 'Halaman Data Kategori')

@section('content_header')
<h1>Halaman Data Kategori</h1>
@stop

@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahKategori">
        Tambah Data Kategori
    </button>
    <p>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID kategori</td>
                <td align="center">Kode kategori</td>
                <td align="center">Nama kategori</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $index=>$kg)
                <tr>
                    <td align="center" scope="row">{{ $index + $kategori->firstItem() }}</td>
                    <td>{{$kg->id_kategori}}</td>
                    <td>{{$kg->kode_kategori}}</td>
                    <td>{{$kg->nama}}</td>
                    <td align="center">

                    <!-- Edit Section -->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditkategori{{$kg->id_kategori}}">
                        Edit
                    </button>

                    <!-- Modal Edit Data Kategori -->
                    <div class="modal fade" id="modalEditKategori{{$kg->id_kategori}}" tabindex="-1" aria-labelledby="modalEditKategori" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Data Kategori</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                    <div class="modal-body">
                                    <!--FORM EDIT DATA KATEGORI-->
                                    <form name="formkategoriedit" id="formkategoriedit" action="/kategori/edit/{{$kg->id_kategori}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        <div class="form-group row">
                                            <label for="id_kategori" class="col-sm-4 col-form-label">Kode Kategori</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="kode_kategori" name="kode_kategori" placeholder="{{ $kg->kode_kategori}}">
                                            </div>
                                        </div>

                                        <p>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-4 col-form-label">Nama Kategori</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="{{ $kg->nama}}">
                                            </div>
                                        </div>
                                        <p>
                                            
                                        <div class="modal-footer">
                                            <button type="submit" name="kategoritambah" class="btn btn-success">Edit</button>
                                        </div>
                                    </form>
                                    <!--END FORM EDIT DATA kategori-->
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Akhir Modal Edit-->

                    <!-- End of Edit Section -->

                    <!-- Delete Section -->
                    <a href="kategori/hapus/{{$kg->id_kategori}}" onclick="return confirm('Data kategori yang dipilih akan terhapus')">
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
    Halaman : {{ $kategori->currentPage() }} <br />
    Jumlah Data : {{ $kategori->total() }} <br />
    Data Per Halaman : {{ $kategori->perPage() }} <br />
    {{ $kategori->links() }}
    <!--akhir pagination-->

    <!-- Modal Tambah Data Kategori -->
    <div class="modal fade" id="modalTambahKategori" tabindex="-1" aria-labelledby="modalTambahKategori" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                 </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH DATA KATEGORI-->
                    <form name="formkategoritambah" id="formkategoritambah" action="/kategori/tambah " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_kategori" class="col-sm-4 col-form-label">Kode Kategori</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kode_kategori" name="kode_kategori" placeholder="Masukan Kode Kategori">
                            </div>
                        </div>
                        <p>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama Kategori</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Kategori">
                            </div>
                        </div>
                        <p>
                            
                        <div class="modal-footer">
                            <button type="submit" name="kategoritambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                    <!--END FORM TAMBAH DATA KATEGORI-->
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Tambah Data Kategori -->
    
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
@stop