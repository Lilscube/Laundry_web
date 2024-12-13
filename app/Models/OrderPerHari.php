<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderPerHari extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'id_user',
        'id_admin',
        'id_layanan',
        'nama_pelanggan',
        'berat',
        'durasi',
        'detail_layanan',
        'harga',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }

    public function layananExpress(): BelongsTo
    {
        return $this->belongsTo(LayananExpress::class, 'id_layanan');
    }

    public function layananReguler(): BelongsTo
    {
        return $this->belongsTo(LayananReguler::class, 'id_layanan');
    }

    public function riwayatTransaksi(): HasMany
    {
        return $this->hasMany(RiwayatTransaksiUser::class, 'id_order');
    }
}
