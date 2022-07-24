<?php

namespace App\Models;

use App\Models\orderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $table='orders';
    protected $fillable =[
        'uid',
        'name',
        'phone',
        'email',
        'address1',
        'address2',
        'town',
        'district',
        'zipcode',
        'status',
        'tracking_no',
        'totPrice',

    ];

    public function orderItems(){
        return $this->hasMany(orderItem::class);
    }

    public function orderitem(){
        return $this->belongsTo(orderItem::class, 'order_id','id');
    }
}
