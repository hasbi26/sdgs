<?php

namespace App\Models;

use CodeIgniter\Model;

class PekerjaanModel extends Model
{
    protected $table            = 'pekerjaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    // Aktifkan created_at dan updated_at otomatis
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime'; // default ke timestamp/datetime
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Field yang boleh diisi
    protected $allowedFields = [
        'individu_id',
        'kondisi_pekerjaan',
        'pekerjaan_utama',
        'jaminan_sosial_ketenagakerjaan',
        'penghasilan_setahun',
    ];


}