<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;

    protected $table = 'chart';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'id_product', 'category', 'qty','date','price','total', 'status', 'image'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
