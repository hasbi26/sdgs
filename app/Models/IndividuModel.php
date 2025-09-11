<?php

namespace App\Models;

use CodeIgniter\Model;

class IndividuModel extends Model
{
    protected $table            = 'individu';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    // Aktifkan created_at dan updated_at otomatis
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime'; // default ke timestamp/datetime
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Field yang boleh diisi
    protected $allowedFields = [
        'keluarga_id',
        'nomor_kk',
        'nik',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'status_pernikahan',
        'agama',
        'suku_bangsa',
        'warga_negara',
        'nomor_hp',
        'nomor_whatsapp',
        'email',
        'facebook',
        'twitter',
        'instagram',
    ];

    // Optional: validasi langsung di model
    // protected $validationRules = [
    //     'keluarga_id'       => 'required|integer',
    //     'nomor_kk'          => 'required|max_length[20]',
    //     'nik'               => 'required|exact_length[16]|is_unique[individu.nik,id,{id}]',
    //     'nama'              => 'required|max_length[255]',
    //     'jenis_kelamin'     => 'permit_empty|in_list[1,2]',
    //     'tanggal_lahir'     => 'permit_empty|valid_date',
    //     'status_pernikahan' => 'permit_empty|in_list[1,2,3]',
    //     'agama'             => 'permit_empty|in_list[1,2,3,4,5,6,7]',
    //     'warga_negara'      => 'permit_empty|in_list[1,2]',
    //     'email'             => 'permit_empty|valid_email|max_length[100]',
    //     'nomor_hp'          => 'permit_empty|max_length[20]',
    //     'nomor_whatsapp'    => 'permit_empty|max_length[20]',
    //     'suku_bangsa'       => 'permit_empty|max_length[50]',
    //     'facebook'          => 'permit_empty|max_length[100]',
    //     'twitter'           => 'permit_empty|max_length[100]',
    //     'instagram'         => 'permit_empty|max_length[100]',
    // ];

    // protected $validationMessages = [
    //     'nik' => [
    //         'is_unique' => 'NIK sudah terdaftar.',
    //         'exact_length' => 'NIK harus 16 digit.',
    //     ],
    //     'email' => [
    //         'valid_email' => 'Format email tidak valid.',
    //     ],
    // ];

    // protected $skipValidation = false;
}