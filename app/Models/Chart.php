<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    protected $table = 'chart';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'category_id', 'qty','date','price','status'];
}
