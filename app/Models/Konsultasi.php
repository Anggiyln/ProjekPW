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
    protected $fillable = ['id_konsultasi', 'id_dokter', 'user_id', 'pertanyaan', 'jawaban'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $latest = static::latest()->first(); // Ambil data terakhir
            $prefix = 'KST'; // Prefix untuk menetukan isian awal
            
            if ($latest) {
                $number = (int) substr($latest->id_konsultasi, -5) + 1; // Tetap ambil 3 digit terakhir
            } else {
                $number = 1;
            }

            $model->id_konsultasi = $prefix . '-' . str_pad($number, 5, '0', STR_PAD_LEFT); // Format: ABCDE-001
        });
    }

    public function satuKonsultasiKeDokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id_dokter');
    }

    public function satuaKonsultasikePasien(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
