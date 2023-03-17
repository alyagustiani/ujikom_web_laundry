<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_member',
        'id_kategori',
        'id_produk',
        'berat',
        'harga_per_kg',
        'total'
    ];
    //relasi ke member
    public function member()
    {
        return $this->belongsTo(Member::class, 'id_member');
    }

    //relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    //relasi ke produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
