@extends('adminlte::page')

@section('title', 'Halaman Data Member')

@section('content_header')
<h1>Halaman Data Member</h1>
@stop

@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahMember">
        Tambah Data Member
    </button>
    <p>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Member</td>
                <td align="center">Kode Member</td>
                <td align="center">Nama Member</td>
                <td align="center">Alamat</td>
                <td align="center">Telepon</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($member as $index=>$mbr)
                <tr>
                    <td align="center" scope="row">{{ $index + $member->firstItem() }}</td>
                    <td>{{$mbr->id_member}}</td>
                    <td>{{$mbr->kode_member}}</td>
                    <td>{{$mbr->nama}}</td>
                    <td>{{$mbr->alamat}}</td>
                    <td>{{$mbr->telepon}}</td>
                    <td align="center">

                    <!-- Edit Section -->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditMember{{$mbr->id_member}}">
                        Edit
                    </button>

                    <!-- Modal Edit Data Member -->
                    <div class="modal fade" id="modalEditMember{{$mbr->id_member}}" tabindex="-1" aria-labelledby="modalEditMember" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Data Member</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                    <div class="modal-body">
                                    <!--FORM EDIT DATA MEMBER-->
                                    <form name="formmemberedit" id="formmemberedit" action="/member/edit/{{$mbr->id_member}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        <div class="form-group row">
                                            <label for="id_member" class="col-sm-4 col-form-label">Kode member</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="kode_member" name="kode_member" placeholder="{{ $mbr->kode_member}}">
                                            </div>
                                        </div>

                                        <p>
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-4 col-form-label">Nama member</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="{{ $mbr->nama}}">
                                            </div>
                                        </div>
                                        <p>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="{{ $mbr->alamat}}">
                                            </div>
                                        </div>
                                        <p>
                                        <div class="form-group row">
                                            <label for="telepon" class="col-sm-4 col-form-label">Telepon</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="{{ $mbr->telepon}}">
                                            </div>
                                        </div>
                                        <p>
                                            
                                        <div class="modal-footer">
                                            <button type="submit" name="membertambah" class="btn btn-success">Edit</button>
                                        </div>
                                    </form>
                                    <!--END FORM EDIT DATA member-->
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Akhir Modal Edit-->

                    <!-- End of Edit Section -->

                    <!-- Delete Section -->
                    <a href="member/hapus/{{$mbr->id_member}}" onclick="return confirm('Data member yang dipilih akan terhapus')">
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
    Halaman : {{ $member->currentPage() }} <br />
    Jumlah Data : {{ $member->total() }} <br />
    Data Per Halaman : {{ $member->perPage() }} <br />
    {{ $member->links() }}
    <!--akhir pagination-->

    <!-- Modal Tambah Data member -->
    <div class="modal fade" id="modalTambahMember" tabindex="-1" aria-labelledby="modalTambahMember" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Member</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                 </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH DATA MEMBER-->
                    <form name="formmembertambah" id="formmembertambah" action="/member/tambah " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_member" class="col-sm-4 col-form-label">Kode Member</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kode_member" name="kode_member" placeholder="Masukan Kode Member">
                            </div>
                        </div>
                        <p>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama Member</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Member">
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
                            <button type="submit" name="membertambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                    <!--END FORM TAMBAH DATA member-->
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Tambah Data member -->
    
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
@stop