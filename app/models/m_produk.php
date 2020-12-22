<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class m_produk extends Model
{
    protected $table = "produk";
    protected $primaryKey = "id_produk";
    protected $fillable = ['nama','kategori','stok','harga','tgl_pembelian'];
    public $timestamps = false;
}
