<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class orderItem extends Model
{
    use HasFactory;
    protected $table='order_items';
    protected $fillable =[
        'order_id',
        'pro_id',
        'cat_id',
        'subcat_id',
        'size',
        'qty',
        'price',
    ];

    public function products():BelongsTo
    {
        return $this->belongsTo(Product::class, 'pro_id','id');
    }
}
