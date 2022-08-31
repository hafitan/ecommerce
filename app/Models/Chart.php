<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Chart extends Model
{
    use HasFactory;

    protected $table = 'chart';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'user_id' , 'id_product', 'category', 'qty','date','price','total', 'status', 'image'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo('App\Models\user' , 'user_id');
    }
}
