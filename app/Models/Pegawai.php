<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'pegawai_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama',
        'alamat',
        'nomor_kontak',
        'jabatan',
        'departemen',
        'tanggal_mulai',
        'gaji_pokok',
        'tunjangan',
        'potongan',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'gaji_pokok' => 'decimal:2',
        'tunjangan' => 'decimal:2',
        'potongan' => 'decimal:2',
    ];
}
