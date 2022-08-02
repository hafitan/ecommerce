<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    protected $table = 'chart';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_product', 'kategori', 'qty','tgl_order','total_harga','status'];
}
