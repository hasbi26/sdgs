<?php

namespace App\Models;

use CodeIgniter\Model;

class KesehatanModel extends Model
{
    protected $table            = 'kesehatan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields    = [
        'individu_id',
        'muntaber_diare',
        'demam_berdarah',
        'campak',
        'malaria',
        'flu_burung_sars',
        'covid_19',
        'hepatitis_b',
        'hepatitis_e',
        'difteri',
        'chikungunya',
        'leptospirosis',
        'kolera',
        'gizi_buruk',
        'jantung',
        'tbc_paru',
        'kanker',
        'diabetes',
        'lumpuh',
        'lainnya_penyakit',
           // fasilitas kesehatan (p402)
        'rumah_sakit',
        'rumah_sakit_bersalin',
        'puskesmas_rawat_inap',
        'puskesmas_tanpa_rawat_inap',
        'puskesmas_pembantu',
        'poliklinik',
        'praktik_dokter',
        'rumah_bersalin',
        'praktik_bidan',
        'poskesdes',
        'polindes',
        'apotik',
        'toko_obat_jamu',
        'posyandu',
        'posbindu',
        'praktik_dukun',

           // jaminan kesehatan & disabilitas (p403 & p404)
        'jaminan_sosial_kesehatan',
        'tunanetra',
        'tunarungu',
        'tunarungu_wicara',
        'tunawicara',
        'tuli_bisu',
        'tunadaksa',
        'tunagrahita',
        'tunalaras',
        'cacat_kusta',
        'cacat_ganda',
        'dipasung',


        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
}