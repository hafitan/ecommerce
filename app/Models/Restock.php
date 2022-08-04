<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restock extends Model
{
    use HasFactory;

    protected $table = 'restock';
    protected $primarykey = 'id';
    protected $fillable = ['name' , 'qty'];
}
