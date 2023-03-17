@extends('adminlte::page')

@section('title', 'Halaman Data Outlet')

@section('content_header')
<h1>Halaman Data Outlet</h1>
@stop

@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahOutlet">
        Tambah Data Outlet
    </button>
    <p>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Outlet</td>
                <td align="center">Kode Outlet</td>
                <td align="center">Nama Outlet</td>
                <td align="center">Alamat</td>
                <td align="center">Telepon</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($outlet as $index=>$ot)
                <tr>
                    <td align="center" scope="row">{{ $index + $outlet->firstItem() }}</td>
                    <td>{{$ot->id_outlet}}</td>
                    <td>{{$ot->kode_outlet}}</td>
                    <td>{{$ot->nama}}</td>
                    <td>{{$ot->alamat}}</td>
                    <td>{{$ot->telepon}}</td>
                    <td align="center">

                    <!-- Edit Section -->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditOutlet{{$ot->id_outlet}}">
                        Edit
                    </button>

                    <!-- Modal Edit Data outlet -->
                    <div class="modal fade" id="modalEditOutlet{{$ot->id_outlet}}" tabindex="-1" aria-labelledby="modalEditOutlet" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Data Outlet</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                    <div class="modal-body">
                                    <!--FORM EDIT DATA OUTLET-->
                                    <form name="formoutletedit" id="formoutletedit" action="/outlet/edit/{{$ot->id_outlet}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        <div class="form-group row">
                                            <label for="id_outlet" class="col-sm-4 col-form-label">Kode Outlet</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="kode_outlet" name="kode_outlet" placeholder="{{ $ot->kode_outlet}}">
                                            </div>
                                        </div>

                                        <p>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-4 col-form-label">Nama Outlet</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="{{ $ot->nama}}">
                                            </div>
                                        </div>
                                        <p>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="{{ $ot->alamat}}">
                                            </div>
                                        </div>
                                        <p>
                                        <div class="form-group row">
                                            <label for="telepon" class="col-sm-4 col-form-label">Telepon</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="{{ $ot->telepon}}">
                                            </div>
                                        </div>
                                        <p>
                                            
                                        <div class="modal-footer">
                                            <button type="submit" name="outlettambah" class="btn btn-success">Edit</button>
                                        </div>
                                    </form>
                                    <!--END FORM EDIT DATA outlet-->
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Akhir Modal Edit-->

                    <!-- End of Edit Section -->

                    <!-- Delete Section -->
                    <a href="outlet/hapus/{{$ot->id_outlet}}" onclick="return confirm('Data outlet yang dipilih akan terhapus')">
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
    Halaman : {{ $outlet->currentPage() }} <br />
    Jumlah Data : {{ $outlet->total() }} <br />
    Data Per Halaman : {{ $outlet->perPage() }} <br />
    {{ $outlet->links() }}
    <!--akhir pagination-->

    <!-- Modal Tambah Data Outlet -->
    <div class="modal fade" id="modalTambahOutlet" tabindex="-1" aria-labelledby="modalTambahOutlet" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Outlet</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                 </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH DATA OUTLET-->
                    <form name="formoutlettambah" id="formoutlettambah" action="/outlet/tambah " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_outlet" class="col-sm-4 col-form-label">Kode Outlet</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kode_outlet" name="kode_outlet" placeholder="Masukan Kode Outlet">
                            </div>
                        </div>
                        <p>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama outlet</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Outlet">
                            </div>
                        </div>
                        <p>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat">
                            </div>
                        </div>
                        <p>
                        <div class="form-group row">
                            <label for="telepon" class="col-sm-4 col-form-label">Telepon</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Masukan Telepon">
                            </div>
                        </div>
                        <p>
                            
                        <div class="modal-footer">
                            <button type="submit" name="outlettambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                    <!--END FORM TAMBAH DATA OUTLET-->
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Tambah Data Outlet -->
    
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
@stop