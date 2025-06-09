<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poli extends Model
{
    use HasFactory;

    protected $table = 'polis';
    protected $primaryKey = 'id_poli';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_pasien', 'nama_pasien', 'jenis_kelamin', 'tanggal_lahir', 'no_telp', 'alamat'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $latest = static::latest()->first(); // Ambil data terakhir
            $prefix = 'POL'; // Prefix untuk menetukan isian awal
            
            if ($latest) {
                $number = (int) substr($latest->id_poli, -5) + 1; // Tetap ambil 3 digit terakhir
            } else {
                $number = 1;
            }

            $model->id_poli = $prefix . '-' . str_pad($number, 5, '0', STR_PAD_LEFT); // Format: ABCDE-001
        });
    }

    public function keDokter(): HasMany
    {
        return $this->hasMany(Dokter::class, 'id_dokter', 'id_dokter');
    }
}
