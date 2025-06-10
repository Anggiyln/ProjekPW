<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Konsultasi extends Model
{
    use HasFactory;

    protected $table = 'konsultasis';
    protected $primaryKey = 'id_konsultasi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_konsultasi',
        'id_dokter',
        'user_id',
        'pertanyaan',
        'jawaban',
    ];

    // Generate ID Otomatis
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $prefix = 'KST';
            $latest = static::orderBy('id_konsultasi', 'desc')->first();

            $lastNumber = $latest ? (int) substr($latest->id_konsultasi, -5) : 0;
            $newNumber = $lastNumber + 1;
            $model->id_konsultasi = $prefix . '-' . str_pad($newNumber, 5, '0', STR_PAD_LEFT);
        });
    }

    // Relasi ke Dokter
    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id_dokter');
    }

    // Relasi ke User (Pasien)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
