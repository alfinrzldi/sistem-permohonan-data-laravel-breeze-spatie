<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    protected $table = 'permohonan';

    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_iden',
        'alamat',
        'telephone',
        'pekerjaan',
        'nama_perusahaan',
        'alamat_perusahaan',
        'rincian_informasi',
        'jenis_informasi',
        'informasi_lainnya',
        'tujuan_penggunaan',
        'tujuan_lainnya',
        'file_identitas',
        'waktu_selesai',
        'file_upload',
        'waktu_dibuat', // Tambahkan ini
    ];
    
    
    
}
