<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable =[
        'cus_id',
        'pro_id',
        'pro_name',
    ];
    public function products(){
        return $this->belongsTo(Product::class,'pro_id','id');
    }
}
