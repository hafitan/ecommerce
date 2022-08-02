<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_product', 'kategori', 'qty','tgl_order','total_harga','status'];
}
