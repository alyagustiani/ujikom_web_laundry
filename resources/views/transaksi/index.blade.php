@extends('adminlte::page')

@section('title', 'Halaman Transaksi')

@section('content_header')
    <h1>Halaman Transaksi</h1>
@stop

@section('content')
    <p>Hello {{ $user }}, welcome to transaksi page</p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahTransaksi">
        Tambah Transaksi
    </button>
    <p>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Transaksi</td>
                <td align="center">ID Member</td>
                <td align="center">Kategori</td>
                <td align="center">Produk</td>
                <td align="center">Harga / Kg (Rp)</td>
                <td align="center">Berat (Kg)</td>
                <td align="center">Total</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $index=>$tr)
                <tr>
                    <td align="center" scope="row">{{ $index + $transaksi->firstItem() }}</td>
                    <td>{{$tr->id_transaksi}}</td>
                    <td>{{$tr->member->nama}}</td>
                    <td>{{$tr->kategori->nama}}</td>
                    <td>{{$tr->produk->nama_produk}}</td>
                    <td>{{$tr->harga_per_kg}}</td>
                    <td>{{$tr->berat}}</td>
                    <td>{{$tr->total}}</td>
                    <td align="center">

                    <!-- Edit Section -->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEditTransaksi{{$tr->id_transaksi}}">
                        Edit
                    </button>

                    <!-- Modal Edit Data Transaksi -->
                    <div class="modal fade" id="modalEditTransaksi{{$tr->id_transaksi}}" tabindex="-1" aria-labelledby="modalEditTransaksi" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Data Transaksi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                    <div class="modal-body">
                                    <!--FORM EDIT DATA TRANSAKSI-->
                                    <form name="formtransaksiedit" id="formtransaksiedit" action="/transaksi/edit/{{$tr->id_transaksi}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        {{ method_field('PUT') }}

                                        <div class="form-group row">
                                            <label for="id_member" class="col-sm-4 col-form-label">Nama Member</label>
                                            <div class="col-sm-8">
                                                <select type="text" class="form-control" id="id_member" name="id_member" placeholder="{{ $tr->id_member }}">
                                                    <option></option>
                                                    @foreach($member as $mr)
                                                        <option value="{{ $mr->id_member }}">{{ $mr->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <p>

                                        <div class="form-group row">
                                            <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                                            <div class="col-sm-8">
                                                <select type="text" class="form-control" id="kategori" name="kategori" placeholder="{{ $tr->id_kategori }}">
                                                    <option></option>
                                                    @foreach($kategori as $kt)
                                                        <option value="{{ $kt->kategori }}">{{ $kt->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <p>

                                        <div class="form-group row">
                                            <label for="produk" class="col-sm-4 col-form-label">Produk</label>
                                            <div class="col-sm-8">
                                            <select type="text" class="form-control" id="produk" name="produk" placeholder="{{ $tr->id_produk }}">
                                                    <option></option>
                                                    @foreach($produk as $pd)
                                                        <option value="{{ $pd->produk }}">{{ $pd->nama_produk }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <p>

                                        <div class="form-group row">
                                            <label for="harga_per_kg" class="col-sm-4 col-form-label">Harga / Kg (Rp)</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="harga_per_kg" name="harga_per_kg" placeholder="{{ $tr->harga_per_kg }}">
                                            </div>
                                        </div>
                                        <p>

                                        <div class="form-group row">
                                            <label for="total" class="col-sm-4 col-form-label">Total Harga (Rp)</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="total" name="total" value="{{ old('total') }}" readonly>
                                            </div>
                                        </div>
                                        <p>
                                            
                                        <div class="modal-footer">
                                            <button type="submit" name="transaksitambah" class="btn btn-success">Edit</button>
                                        </div>
                                    </form>
                                    <!--END FORM EDIT DATA transaksi-->
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Akhir Modal Edit-->

                    <!-- End of Edit Section -->

                    <!-- Delete Section -->
                    <a href="transaksi/hapus/{{$tr->id_transaksi}}" onclick="return confirm('Data transaksi yang dipilih akan terhapus')">
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
    Halaman : {{ $transaksi->currentPage() }} <br />
    Jumlah Data : {{ $transaksi->total() }} <br />
    Data Per Halaman : {{ $transaksi->perPage() }} <br />
    {{ $transaksi->links() }}
    <!--akhir pagination-->

    <!-- Modal Tambah Data transaksi -->
    <div class="modal fade" id="modalTambahTransaksi" tabindex="-1" aria-labelledby="modalTambahTransaksi" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Transaksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                    <div class="modal-body">
                    <!--FORM TAMBAH DATA TRANSAKSI-->
                    
                    <form name="formtransaksirtambah" id="formtransaksitambah" action="/transaksi/tambah " method="POST" enctype="multipart/form-data">
                    @csrf
                                <div class="form-group row">
                                    <label for="id_member" class="col-sm-4 col-form-label">Nama Member</label>
                                    <div class="col-sm-8">
                                        <select type="text" class="form-control" id="id_member" name="id_member" placeholder="Pilih Nama Member">
                                            <option></option>
                                            @foreach($member as $mbr)
                                                <option value="{{ $mbr->id_member }}">{{ $mbr->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <p>

                                <div class="form-group row">
                                    <label for="id_kategori" class="col-sm-4 col-form-label">Kategori</label>
                                    <div class="col-sm-8">
                                        <select type="text" class="form-control" id="id_kategori" name="id_kategori" placeholder="Pilih Kategori">
                                            <option></option>
                                            @foreach($kategori as $kg)
                                                <option value="{{ $kg->id_kategori }}">{{ $kg->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <p>
                                
                                <div class="form-group row">
                                    <label for="id_produk" class="col-sm-4 col-form-label">Produk</label>
                                    <div class="col-sm-8">
                                    <select type="text" class="form-control" id="id_produk" name="id_produk" placeholder="Pilih Produk">
                                            <option></option>
                                            @foreach($produk as $p)
                                                <option value="{{ $p->id_produk }}">{{ $p->nama_produk }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <p>

                                <div class="form-group row">
                                    <label for="berat" class="col-sm-4 col-form-label">Berat (kg)</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="berat" name="berat" placeholder="Masukan Berat (Kg)">
                                    </div>
                                </div>
                                <p>

                                <div class="form-group row">
                                    <label for="harga_per_kg" class="col-sm-4 col-form-label">Harga / Kg (Rp)</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="harga_per_kg" name="harga_per_kg" placeholder="Masukan Harga / Kg">
                                    </div>
                                </div>
                                <p>

                                <div class="form-group row">
                                    <label for="total" class="col-sm-4 col-form-label">Total Harga (Rp)</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="total" name="total" value="{{ old('total') }}" readonly>
                                    </div>
                                </div>
                                <p>

                                <div class="modal-footer">
                                    <button type="submit" name="transaksitambah" class="btn btn-success">Tambah</button>
                                </div>
                            </form>

                    <!--END FORM TAMBAH DATA transaksi-->
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Tambah Data Transaksi -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
    <script>
    // ambil element berat dan harga_per_kg
    const berat = document.getElementById('berat');
    const harga_per_kg = document.getElementById('harga_per_kg');

    // ambil element total
    const total = document.getElementById('total');

    // tambahkan event listener untuk berat dan harga_per_kg
    berat.addEventListener('input', hitungTotal);
    harga_per_kg.addEventListener('input', hitungTotal);

    // fungsi untuk menghitung total
    function hitungTotal() {
        const beratVal = parseInt(berat.value);
        const hargaVal = parseInt(harga_per_kg.value);

        if (!isNaN(beratVal) && !isNaN(hargaVal)) {
        const totalVal = beratVal * hargaVal;
        total.value = totalVal;
        }
    }
    </script>
@stop