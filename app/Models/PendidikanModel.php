<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanModel extends Model
{
    protected $table            = 'pendidikan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'individu_id',
        'pendidikan_tertinggi',
        'bahasa_rumah',
        'bahasa_formal',
        'kerja_bakti',
        'siskamling',
        'pesta_rakyat',
        'menolong_kematian',
        'menolong_sakit',
        'menolong_kecelakaan',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}