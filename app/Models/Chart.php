<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;

    protected $table = 'chart';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'category', 'qty','date','price','total', 'status'];
}
