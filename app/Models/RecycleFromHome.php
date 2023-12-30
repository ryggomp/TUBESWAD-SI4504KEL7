<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecycleFromHome extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama',
        'vendor_id',
        'alamat',
        'jenisRecycle',
        'jenisSampah',
        'berat',
        'tanggal',
        'deskripsi',
        'file',
        'status'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function usernames(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
