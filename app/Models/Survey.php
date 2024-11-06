<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $table = 'survey'; // Nama tabel di database

    protected $fillable = [
        'user_id', // Tambahkan user_id ke mass assignment
        'question_1',
        'question_2',
        'question_3',
        'question_4',
        'question_5',
        'question_6',
        'question_7',
        'question_8',
        'question_9',
        'question_10',
        'saran',
    ];

    // Relasi ke model Permohonan, jika diperlukan
    public function permohonan()
    {
        return $this->belongsTo(Permohonan::class);
    }
}
    
