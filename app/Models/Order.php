<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'user_id',
        'barang_id',
        'quantity',
        'totalPrice'
    ];

    public function users(){
       return $this->belongsTo(User::class, 'user_id');
    }

    public function stores(){
        return $this->belongsTo(Store::class, 'barang_id');
    }
}
