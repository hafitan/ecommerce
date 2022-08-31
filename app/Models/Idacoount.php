<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idacoount extends Model
{
    use HasFactory;

    protected $table = 'id_account';

    protected $fillable = ['user_id'];
}
