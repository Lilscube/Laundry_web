<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Admin extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'email',
    ];


    public function karyawan(): HasMany
    {
        return $this->hasMany(Karyawan::class, 'id_admin');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(OrderPerHari::class, 'id_admin');
    }

    public function totalTransaksi(): HasMany
    {
        return $this->hasMany(TotalTransaksi::class, 'id_admin');
    }
}
