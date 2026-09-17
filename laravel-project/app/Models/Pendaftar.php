<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftars';

    protected $fillable = [
        'no_pendaftaran',
        'full_name',
        'email',
        'phone',
        'birth_place',
        'birth_date',
        'gender',
        'address',
        'school',
        'graduation_year',
        'program',
        'parent_name',
        'parent_phone',
        'status',
        'admin_notes',
        'verified_at',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'verified_at' => 'datetime',
    ];

    /**
     * Generate nomor pendaftaran unik
     */
    public static function generateNoPendaftaran(): string
    {
        $year = date('Y');
        $random = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        return "STT-{$year}-{$random}";
    }

    /**
     * Scope untuk filter berdasarkan status
     */
    public function scopeByStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope untuk filter berdasarkan program studi
     */
    public function scopeByProgram($query, string $program)
    {
        return $query->where('program', $program);
    }

    /**
     * Get label status berwarna
     */
    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'pending' => 'Menunggu Verifikasi',
            'verified' => 'Terverifikasi',
            'rejected' => 'Ditolak',
            default => 'Unknown',
        };
    }

    /**
     * Get warna badge status
     */
    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'pending' => 'warning',
            'verified' => 'success',
            'rejected' => 'danger',
            default => 'gray',
        };
    }
}
