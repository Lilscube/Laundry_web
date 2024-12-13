<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LayananExpress extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'detail_layanan',
        'berat',
        'durasi',
        'harga',
        'metode_pembayaran',
    ];

    /**
     * Define a one-to-many relationship with the OrderPerHari model.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(OrderPerHari::class, 'id_layanan');
    }
}
