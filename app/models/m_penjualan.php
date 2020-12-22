<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class m_penjualan extends Model
{
    protected $table = "penjualan";
    protected $primaryKey = "id_penjualan";
    protected $fillable = ['nama_produk','jumlah_barang','created_at'];
}
