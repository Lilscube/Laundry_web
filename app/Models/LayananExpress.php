<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananExpress extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_layanan_exspres',
        'metode_pembayaran',
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan_exspres');
    }
}
