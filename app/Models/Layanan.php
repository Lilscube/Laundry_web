<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'detail_layanan',
        'berat',
        'durasi',
        'harga',
        'metode_pembayaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function layananExpress()
    {
        return $this->hasOne(LayananExpress::class, 'id_layanan_exspres');
    }

    public function layananReguler()
    {
        return $this->hasOne(LayananReguler::class, 'id_layanan_reguler');
    }
}
