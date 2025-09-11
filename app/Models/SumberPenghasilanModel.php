<?php

namespace App\Models;

use CodeIgniter\Model;

class SumberPenghasilanModel extends Model
{
    protected $table            = 'sumber_penghasilan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    // Aktifkan created_at dan updated_at otomatis
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime'; // default ke timestamp/datetime
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Field yang boleh diisi
    protected $allowedFields = [
        'id', 
        'pekerjaan_id',
        'jenis_penghasilan_id',
        'sumber_penghasilan',
        'volume',
        'satuan',
        'penghasilan_setahun',
        'ekspor',
    ];

   
}