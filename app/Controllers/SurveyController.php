<?php

namespace App\Controllers;

use App\Models\LokasiModel;
use App\Models\KeluargaModel;
use App\Models\PermukimanModel;
use App\Models\AksesPendidikanModel;
use App\Models\AksesKesehatanModel;
use App\Models\AksesTenagaKesehatanModel;
use App\Models\AksesTransportasiModel;
use App\Models\ProgramPemerintahModel;
use App\Models\IndividuModel;
use App\Models\PekerjaanModel;
use App\Models\SumberPenghasilanModel;
use App\Models\PendidikanModel;
use App\Models\KesehatanModel;
use Config\Database;


class SurveyController extends BaseController
{


    public function fetchData()
    {
        $db = Database::connect();
        $builder = $db->table('individu')
            ->select('
                individu.id as individu_id,
                individu.nik,
                individu.nama,
                keluarga.nomor_kk,
                enumerator.nama as enumerator_nama
            ')
            ->join('keluarga', 'keluarga.id = individu.keluarga_id')
            ->join('enumerator', 'enumerator.id = keluarga.enumerator_id');

        // Search
        $search = $this->request->getGet('search');
        if (!empty($search)) {
            $builder->groupStart()
                ->like('individu.nama', $search)
                ->orLike('individu.nik', $search)
                ->orLike('keluarga.nomor_kk', $search)
                ->orLike('enumerator.nama', $search)
                ->groupEnd();
        }

        // Pagination
        $page     = (int) $this->request->getGet('page') ?: 1;
        $perPage  = 10;
        $offset   = ($page - 1) * $perPage;

        $total = $builder->countAllResults(false);
        $builder->limit($perPage, $offset);

        $data = $builder->get()->getResultArray();

        return $this->response->setJSON([
            'data'       => $data,
            'total'      => $total,
            'per_page'   => $perPage,
            'current'    => $page,
            'last_page'  => ceil($total / $perPage)
        ]);
    }


    public function fetchDataDetail($id)
{

    $db = \Config\Database::connect();
        $builder = $db->table('individu')
            ->select('
                individu.*,
                individu.nama AS nama_individu


            ')
            ->join('keluarga', 'keluarga.id = individu.keluarga_id')
            ->join('enumerator', 'enumerator.id = keluarga.enumerator_id')
            ->join('permukiman', 'permukiman.keluarga_id = keluarga.id')
            ->join('lokasi', 'lokasi.id = keluarga.lokasi_id')
            ->where('individu.id', $id);

        $data = $builder->get()->getResultArray();


        $permukiman = $db->table('individu')
        ->select('
            permukiman.*

        ')
        ->join('keluarga', 'keluarga.id = individu.keluarga_id')
        ->join('permukiman', 'permukiman.keluarga_id = keluarga.id')       
        ->where('individu.id', $id);

        $datapermukiman = $permukiman->get()->getResultArray();

        $keluarga = $db->table('individu')
        ->select('
            keluarga.*,
            enumerator.nama as enumerator_nama, enumerator.id as enumerator_id

        ')
        ->join('keluarga', 'keluarga.id = individu.keluarga_id')
        ->join('enumerator', 'enumerator.id = keluarga.enumerator_id')
        ->where('individu.id', $id);

        $datakeluarga = $keluarga->get()->getResultArray();


        $lokasi = $db->table('individu')
        ->select('
            lokasi.*
        ')
        ->join('keluarga', 'keluarga.id = individu.keluarga_id')
        ->join('lokasi', 'lokasi.id = keluarga.lokasi_id')       
        ->where('individu.id', $id);

        $datalokasi = $lokasi->get()->getResultArray();


    // Ambil data utama (hindari penggunaan banyak * pada tabel yang di-join jika ingin aman)
    $individu = $db->table('individu')
        ->select('
            individu.*,
            keluarga.id AS keluarga_id,
            keluarga.nomor_kk,
            permukiman.id AS permukiman_id
        ')
        ->join('keluarga', 'keluarga.id = individu.keluarga_id', 'left')
        ->join('permukiman', 'permukiman.keluarga_id = keluarga.id', 'left')
        ->join('lokasi', 'lokasi.id = keluarga.lokasi_id')
        ->where('individu.id', $id)
        ->get()
        ->getRowArray();

    if ( ! $individu) {
        return $this->response->setJSON([
            'status' => false,
            'message' => 'Data individu tidak ditemukan'
        ]);
    }

    $pekerjaanId = $db->table('individu')
                    ->select('
                    individu.id,
                    pekerjaan.individu_id,
                    pekerjaan.id as pekerjaanId
                ')         
                ->join('pekerjaan', 'individu.id = pekerjaan.individu_id', 'left')
                ->where('individu.id', $id)
                ->get()
                ->getRowArray();


    // Dapatkan permukiman_id dengan fallback: jika tidak ada, cari permukiman berdasarkan keluarga_id
    $permukimanId = $individu['permukiman_id'] ?? null;
    if ( ! $permukimanId && ! empty($individu['keluarga_id'])) {
        $perm = $db->table('permukiman')
                   ->select('id')
                   ->where('keluarga_id', $individu['keluarga_id'])
                   ->get()
                   ->getRowArray();
        $permukimanId = $perm['id'] ?? null;
    }

    // Ambil akses_pendidikan jika ada permukiman
    $aksesPendidikan = [];
    if ($permukimanId) {
        $aksesPendidikan = $db->table('akses_pendidikan')
            ->where('permukiman_id', $permukimanId)
            ->orderBy('id')
            ->get()
            ->getResultArray();
    }

    $aksesFaskes = [];
    if ($permukimanId) {
        $aksesFaskes = $db->table('akses_kesehatan')
            ->where('permukiman_id', $permukimanId)
            ->orderBy('id')
            ->get()
            ->getResultArray();
    }

    $aksesNakes = [];
    if ($permukimanId) {
        $aksesNakes = $db->table('akses_tenaga_kesehatan')
            ->where('permukiman_id', $permukimanId)
            ->orderBy('id')
            ->get()
            ->getResultArray();
    }

    $programPemerintah = [];
    if ($permukimanId) {
        $programPemerintah = $db->table('program_pemerintah')
            ->where('permukiman_id', $permukimanId)
            ->orderBy('id')
            ->get()
            ->getResultArray();
    }



    $aksesTransport = [];
    if ($permukimanId) {
        $aksesTransport = $db->table('akses_transportasi')
            ->where('permukiman_id', $permukimanId)
            ->orderBy('id')
            ->get()
            ->getResultArray();
    }

    $kesehatan = [];
    if ($id) {
        $kesehatan = $db->table('kesehatan')
            ->where('individu_id', $id)
            ->orderBy('id')
            ->get()
            ->getResultArray();
    }

    $pendidikan = [];
    if ($id) {
        $pendidikan = $db->table('pendidikan')
            ->where('individu_id', $id)
            ->orderBy('id')
            ->get()
            ->getResultArray();
    }

    $pekerjaan = [];
    if ($id) {
        $pekerjaan = $db->table('pekerjaan')
            ->where('individu_id', $id)
            ->orderBy('id')
            ->get()
            ->getResultArray();
    }

    $sumberPenghasilan = [];
    if ($id) {
        $sumberPenghasilan = $db->table('sumber_penghasilan')
            ->where('pekerjaan_id', $pekerjaanId['pekerjaanId'])
            ->orderBy('id')
            ->get()
            ->getResultArray();
    }

    return $this->response->setJSON([
        'status' => true,
        'individu' => $data,
        'akses_pendidikan' => $aksesPendidikan,
        'akses_faskes' => $aksesFaskes,
        'akses_nakes' => $aksesNakes,
        'akses_transport' => $aksesTransport,
        'pemerintah' => $programPemerintah,
        'kesehatan' => $kesehatan,
        'pendidikan' => $pendidikan,
        'pekerjaan' => $pekerjaan,
        'sumber_penghasilan' => $sumberPenghasilan,
        'sumber_penghasilan' => $sumberPenghasilan,
        'datapermukiman' => $datapermukiman,
        'datalokasi' => $datalokasi,
        'datakeluarga' => $datakeluarga

    ]);
}





    public function simpanDataSurvey()
    {
        // Validasi input
        if (!$this->validate([
            'enumerator_id' => 'required|integer',
            'rt_rw' => 'permit_empty|string',
            'nama_responden' => 'permit_empty|string',
            'alamat_responden' => 'permit_empty|string',
            'nomor_hp' => 'permit_empty|string|max_length[20]',
            'no_telepon_rumah' => 'permit_empty|string|max_length[20]',
            'no_kk' => 'required|string|max_length[20]',
            'nik_kepala_keluarga' => 'required|string|max_length[16]',
            // Tambahkan validasi untuk field lainnya sesuai kebutuhan
        ])) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(400);
        }

        // Mulai transaction database
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // 1. Simpan data ke tabel lokasi
            $lokasiModel = new LokasiModel();
            $lokasiData = [
                'rt_rw' => $this->request->getPost('rt_rw'),
                'nama_responden' => $this->request->getPost('nama_responden'),
                'alamat_responden' => $this->request->getPost('alamat_responden'),
                'nomor_hp' => $this->request->getPost('nomor_hp'),
                'nomor_telepon_rumah' => $this->request->getPost('no_telepon_rumah'),
                'provinsi' => 'Jawa Barat',
                'kabupaten_kota' => 'Sumedang',
                'kecamatan' => 'Sumedang Utara',
                'desa' => 'Jatimulya',
                'desa_id' => 26
            ];
            
            // Debug: Tampilkan data yang akan disimpan
            log_message('debug', 'Data lokasi: ' . print_r($lokasiData, true));
            
            $lokasiId = $lokasiModel->insert($lokasiData);
            
            if (!$lokasiId) {
                // Dapatkan error dari model
                $error = $lokasiModel->errors();
                log_message('error', 'Error menyimpan lokasi: ' . print_r($error, true));
                
                throw new \Exception('Gagal menyimpan data lokasi: ' . print_r($error, true));
            }

            // 2. Simpan data ke tabel keluarga
            $keluargaModel = new KeluargaModel();
            $keluargaData = [
                'nomor_kk' => $this->request->getPost('no_kk'),
                'nik_kepala_keluarga' => $this->request->getPost('nik_kepala_keluarga'),
                'lokasi_id' => $lokasiId,
                'enumerator_id' => $this->request->getPost('enumerator_id'),
            ];
            
            $keluargaId = $keluargaModel->insert($keluargaData);
            if (!$keluargaId) {
                throw new \Exception('Gagal menyimpan data keluarga');
            }

            // 3. Simpan data ke tabel permukiman
            $permukimanModel = new PermukimanModel();
            $permukimanData = [
                'keluarga_id' => $keluargaId,
                'tempat_tinggal' => $this->request->getPost('tempat_tinggal'),
                'status_lahan' => $this->request->getPost('status_lahan'),
                'luas_lantai' => $this->request->getPost('luas_lantai'),
                'luas_lahan' => $this->request->getPost('luas_lahan'),
                'jenis_lantai' => $this->request->getPost('jenis_lantai'),
                'jenis_dinding' => $this->request->getPost('jenis_dinding'),
                'jendela' => $this->request->getPost('jendela'),
                'atap' => $this->request->getPost('atap'),
                'penerangan' => $this->request->getPost('penerangan'),
                'energi_masak' => $this->request->getPost('energi_masak'),
                'sumber_kayu_bakar' => $this->request->getPost('sumber_kayu_bakar'),
                'pembuangan_sampah' => $this->request->getPost('pembuangan_sampah'),
                'fasilitas_mck' => $this->request->getPost('fasilitas_mck'),
                'sumber_air_mandi' => $this->request->getPost('sumber_air_mandi'),
                'fasilitas_bab' => $this->request->getPost('fasilitas_bab'),
                'sumber_air_minum' => $this->request->getPost('sumber_air_minum'),
                'pembuangan_limbah_cair' => $this->request->getPost('pembuangan_limbah_cair'),
                'bawah_sutet' => $this->request->getPost('bawah_sutet'),
                'bantaran_sungai' => $this->request->getPost('bantaran_sungai'),
                'lereng_bukit' => $this->request->getPost('lereng_bukit'),
                'kondisi_rumah' => $this->request->getPost('kondisi_rumah'),
            ];
            
            $permukimanId = $permukimanModel->insert($permukimanData);
            if (!$permukimanId) {
                throw new \Exception('Gagal menyimpan data permukiman');
            }

            // 4. Simpan data akses pendidikan
            $aksesPendidikanModel = new AksesPendidikanModel();
            $aksesPendidikanData = $this->request->getPost('akses_pendidikan');
            
            if (!empty($aksesPendidikanData)) {
                foreach ($aksesPendidikanData as $data) {
                    // Hanya simpan jika ada data jarak, waktu, atau kemudahan
                    if (!empty($data['jarak_km']) || !empty($data['waktu_tempuh_jam']) || !empty($data['kemudahan'])) {
                        $pendidikanData = [
                            'permukiman_id' => $permukimanId,
                            'fasilitas' => $data['fasilitas'],
                            'jarak_km' => $data['jarak_km'] ?? null,
                            'waktu_tempuh_jam' => $data['waktu_tempuh_jam'] ?? null,
                            'kemudahan' => $data['kemudahan'] ?? null,
                        ];
                        
                        if (!$aksesPendidikanModel->insert($pendidikanData)) {
                            throw new \Exception('Gagal menyimpan data akses pendidikan: ' . $data['fasilitas']);
                        }
                    }
                }
            }

            // 5. Simpan data akses kesehatan
            $aksesKesehatanModel = new AksesKesehatanModel();
            $aksesKesehatanData = $this->request->getPost('akses_kesehatan');
            
            if (!empty($aksesKesehatanData)) {
                foreach ($aksesKesehatanData as $data) {
                    // Hanya simpan jika ada data jarak, waktu, atau kemudahan
                    if (!empty($data['jarak_km']) || !empty($data['waktu_tempuh_jam']) || !empty($data['kemudahan'])) {
                        $KesehatanData = [
                            'permukiman_id' => $permukimanId,
                            'fasilitas' => $data['fasilitas'],
                            'jarak_km' => $data['jarak_km'] ?? null,
                            'waktu_tempuh_jam' => $data['waktu_tempuh_jam'] ?? null,
                            'kemudahan' => $data['kemudahan'] ?? null,
                        ];
                        
                        if (!$aksesKesehatanModel->insert($KesehatanData)) {
                            throw new \Exception('Gagal menyimpan data akses Kesehatan: ' . $data['fasilitas']);
                        }
                    }
                }
            }

                        // 6. Simpan data akses prasarana transportasi
            $aksesTransportasiModel = new AksesTransportasiModel();
            $aksesTransportasiData = $this->request->getPost('transportasi');
                        
            if (!empty($aksesTransportasiData)) {
                            foreach ($aksesTransportasiData as $data) {
                                // Hanya simpan jika ada data jarak, waktu, atau kemudahan
                                if (!empty($data['jenis']) || !empty($data['waktu']) || !empty($data['biaya'] || !empty($data['kemudahan']) )) {
                                    $TransportasiData = [
                                        'permukiman_id' => $permukimanId,
                                        'tujuan' => $data['tujuan'],
                                        'jenis_transportasi' => $data['jenis'] ?? null,
                                        'transportasi_umum' => $data['umum'] ?? null,
                                        'waktu_tempuh_jam' => $data['waktu'] ?? null,
                                        'biaya_perjalanan' => $data['biaya'] ?? null,
                                        'kemudahan' => $data['kemudahan'] ?? null,
                                    ];
                                    
                                    if (!$aksesTransportasiModel->insert($TransportasiData)) {
                                        throw new \Exception('Gagal menyimpan data akses Transportasi: ' . $data['tujuan']);
                                    }
                                }
                            }
                        }

                                                // 7. Simpan data akses nakes
            $aksesTenagaKesehatanModel = new AksesTenagaKesehatanModel();
            $aksesTenagaKesehatanData = $this->request->getPost('tenaga_kesehatan');
                                                
            if (!empty($aksesTenagaKesehatanData)) {
             foreach ($aksesTenagaKesehatanData as $data) {
                                                        // Hanya simpan jika ada data jarak, waktu, atau kemudahan
             if (!empty($data['fasilitas']) || !empty($data['jarak']) || !empty($data['waktu'] || !empty($data['kemudahan']) )) {
                                                            $TenagaKesahatanData = [
                                                                'permukiman_id' => $permukimanId,
                                                                'tenaga_kesehatan' => $data['fasilitas'],
                                                                'jarak_km' => $data['jarak'] ?? null,
                                                                'waktu_tempuh_jam' => $data['waktu'] ?? null,
                                                                'kemudahan' => $data['kemudahan'] ?? null,
                                                            ];
                                                            
                                                            if (!$aksesTenagaKesehatanModel->insert($TenagaKesahatanData)) {
                                                                throw new \Exception('Gagal menyimpan data akses TenagaKesahatan: ' . $data['fasilitas']);
                                                            }
                                                        }
                                                    }
                                                }

                                                // 9. Simpan data program bantuan
            $programPemerintahModel = new ProgramPemerintahModel();

            $programBantuanData = [
                                                    'permukiman_id'       => $permukimanId,
                                                    'blt_dana_desa'       => $this->request->getPost('blt_dana_desa') ?? null,
                                                    'pkh'                 => $this->request->getPost('pkh') ?? null,
                                                    'bst'                 => $this->request->getPost('bst') ?? null,
                                                    'banpres'             => $this->request->getPost('banpres') ?? null,
                                                    'bantuan_umkm'        => $this->request->getPost('bantuan_umkm') ?? null,
                                                    'bantuan_pekerja'     => $this->request->getPost('bantuan_pekerja') ?? null,
                                                    'bantuan_pendidikan'  => $this->request->getPost('bantuan_pendidikan') ?? null,
                                                    'lainnya'             => $this->request->getPost('lainnya') ?? null,
                                                ];

                                                if (!$programPemerintahModel->insert($programBantuanData)) {
                                                    throw new \Exception('Gagal menyimpan data program bantuan');
                                                }

                                                // 10. Simpan data individu
                                                $individuModel = new IndividuModel();

                                                $individuData = [
                                                    'keluarga_id'     => $keluargaId,
                                                    'nomor_kk'          => $this->request->getPost('nomor_kk') ?? null,
                                                    'nik'               => $this->request->getPost('nik') ?? null,
                                                    'nama'              => $this->request->getPost('nama') ?? null,
                                                    'jenis_kelamin'     => $this->request->getPost('jenis_kelamin') ?? null,
                                                    'tempat_lahir'      => $this->request->getPost('tempat_lahir') ?? null,
                                                    'tanggal_lahir'     => $this->request->getPost('tanggal_lahir') ?? null,
                                                    'status_pernikahan' => $this->request->getPost('status_pernikahan') ?? null,
                                                    'agama'             => $this->request->getPost('agama') ?? null,
                                                    'suku_bangsa'       => $this->request->getPost('suku_bangsa') ?? null,
                                                    'warga_negara'      => $this->request->getPost('warga_negara') ?? null,
                                                    'nomor_hp'          => $this->request->getPost('no_hp') ?? null,
                                                    'nomor_whatsapp'    => $this->request->getPost('nomor_whatsapp') ?? null,
                                                    'email'             => $this->request->getPost('email') ?? null,
                                                    'facebook'          => $this->request->getPost('facebook') ?? null,
                                                    'twitter'           => $this->request->getPost('twitter') ?? null,
                                                    'instagram'         => $this->request->getPost('instagram') ?? null,
                                                ];


                                                // $keluargaId = $keluargaModel->insert($keluargaData);
                                                // if (!$keluargaId) {
                                                //     throw new \Exception('Gagal menyimpan data keluarga');
                                                // }

                                                $individu_id = $individuModel->insert($individuData);

                                                if (!$individu_id) {
                                                    $error = $individuModel->errors();                                                    
                                                    throw new \Exception('Gagal menyimpan data ind: ' . print_r($error, true));
                                                }

                                                
                                                // 11. Simpan data pekerjaan
                                                            $pekerjaanModel = new PekerjaanModel();
                                                            $pekerjaanData = [
                                                                'individu_id'                        => $individu_id,
                                                                'kondisi_pekerjaan'                  => $this->request->getPost('kondisi_pekerjaan') ?? null,
                                                                'pekerjaan_utama'                    => $this->request->getPost('pekerjaan_utama') ?? null,
                                                                'jaminan_sosial_ketenagakerjaan'     => $this->request->getPost('jaminan_sosial_ketenagakerjaan') ?? null,
                                                                'penghasilan_setahun'                => $this->request->getPost('penghasilan_setahun') ?? null,

                                                            ];
            
                                                            // if (!$pekerjaanModel->insert($pekerjaanData)) {
                                                            //     $error = $pekerjaanModel->errors();                                                    
                                                            //     throw new \Exception('Gagal menyimpan data ind: ' . print_r($error, true));
                                                            // }

                                                            $pekerjaan_id = $pekerjaanModel->insert($pekerjaanData);

                                                            if (!$pekerjaan_id) {
                                                                $error = $pekerjaanModel->errors();                                                    
                                                                throw new \Exception('Gagal menyimpan data pekerjaan: ' . print_r($error, true));
                                                            }
                                                // 12. sumber penghasilan

                                                $sumberPenghasilanModel = new SumberPenghasilanModel();
                                                $sumberPenghasilanData = $this->request->getPost('sumber_penghasilan');
                                            
                                                if (!empty($sumberPenghasilanData)) {
                                                    foreach ($sumberPenghasilanData as $data) {
                                                        // Hanya simpan jika ada isian (volume, penghasilan, atau ekspor)
                                                        if (
                                                            !empty($data['volume']) ||
                                                            !empty($data['penghasilan_setahun']) ||
                                                            !empty($data['ekspor'])
                                                        ) {
                                                            $insertData = [
                                                                'pekerjaan_id'        => $pekerjaan_id,
                                                                'jenis_penghasilan_id' => $data['jenis_penghasilan'],
                                                                'sumber_penghasilan'   => $data['nama'],
                                                                'volume'              => $data['volume'] ?? null,
                                                                'satuan'              => $data['satuan'] ?? null,
                                                                'penghasilan_setahun' => $data['penghasilan_setahun'] ?? null,
                                                                'ekspor'              => $data['ekspor'] ?? null,
                                                            ];
                                            
                                                            if (!$sumberPenghasilanModel->insert($insertData)) {
                                                                $error = $sumberPenghasilanModel->errors();                                                    


                                                                throw new \Exception(
                                                                    'Gagal menyimpan data sumber penghasilan: ' 
                                                                    . ($data['nama'] ?? '-') 
                                                                    . ' | Error: ' . implode(', ', $error)
                                                                );
                                                            }
                                                        }
                                                    }
                                                }


                                                //13.kesehatan
                                                $kesehatanModel = new KesehatanModel();
                                                
                                                $data = [
                                                    'individu_id'       => $individu_id,
                                                    'muntaber_diare'    => $this->request->getPost('p401_muntaber'),
                                                    'demam_berdarah'    => $this->request->getPost('p401_dbd'),
                                                    'campak'            => $this->request->getPost('p401_campak'),
                                                    'malaria'           => $this->request->getPost('p401_malaria'),
                                                    'flu_burung_sars'   => $this->request->getPost('p401_sars'),
                                                    'covid_19'          => $this->request->getPost('p401_covid'),
                                                    'hepatitis_b'       => $this->request->getPost('p401_hepb'),
                                                    'hepatitis_e'       => $this->request->getPost('p401_hepe'),
                                                    'difteri'           => $this->request->getPost('p401_difteri'),
                                                    'chikungunya'       => $this->request->getPost('p401_chikungunya'),
                                                    'leptospirosis'     => $this->request->getPost('p401_lepto'),
                                                    'kolera'            => $this->request->getPost('p401_kolera'),
                                                    'gizi_buruk'        => $this->request->getPost('p401_gizi'),
                                                    'jantung'           => $this->request->getPost('p401_jantung'),
                                                    'tbc_paru'          => $this->request->getPost('p401_tbc'),
                                                    'kanker'            => $this->request->getPost('p401_kanker'),
                                                    'diabetes'          => $this->request->getPost('p401_diabetes'),
                                                    'lumpuh'            => $this->request->getPost('p401_lumpuh'),
                                                    'lainnya_penyakit'  => $this->request->getPost('p401_lainnya'),
                                                
                                                    // fasilitas kesehatan (p402)
                                                    'rumah_sakit'            => $this->request->getPost('p402_rs'),
                                                    'rumah_sakit_bersalin'   => $this->request->getPost('p402_rsb'),
                                                    'puskesmas_rawat_inap'   => $this->request->getPost('p402_puskesmas_inap'),
                                                    'puskesmas_tanpa_rawat_inap' => $this->request->getPost('p402_puskesmas_noninap'),
                                                    'puskesmas_pembantu'     => $this->request->getPost('p402_pustu'),
                                                    'poliklinik'             => $this->request->getPost('p402_poliklinik'),
                                                    'praktik_dokter'         => $this->request->getPost('p402_praktik_dokter'),
                                                    'rumah_bersalin'         => $this->request->getPost('p402_rumah_bersalin'),
                                                    'praktik_bidan'          => $this->request->getPost('p402_praktik_bidan'),
                                                    'poskesdes'              => $this->request->getPost('p402_poskesdes'),
                                                    'polindes'               => $this->request->getPost('p402_polindes'),
                                                    'apotik'                 => $this->request->getPost('p402_apotik'),
                                                    'toko_obat_jamu'         => $this->request->getPost('p402_toko_obat'),
                                                    'posyandu'               => $this->request->getPost('p402_posyandu'),
                                                    'posbindu'               => $this->request->getPost('p402_posbindu'),
                                                    'praktik_dukun'          => $this->request->getPost('p402_dukun'),

                                                        // jaminan kesehatan & disabilitas (p403 & p404)
                                                    'jaminan_sosial_kesehatan'  => $this->request->getPost('p403_jamsoskes'),
                                                    'tunanetra'      => $this->request->getPost('p403_tunanetra'),
                                                    'tunarungu'      => $this->request->getPost('p403_tunarungu'),
                                                    'tunawicara'     => $this->request->getPost('p403_tunawicara'),
                                                    'tunarungu_wicara'      => $this->request->getPost('p403_tuli_bisu'),
                                                    'tunadaksa'      => $this->request->getPost('p403_tunadaksa'),
                                                    'tunagrahita'    => $this->request->getPost('p403_tunagrahita'),
                                                    'tunalaras'      => $this->request->getPost('p403_tunalaras'),
                                                    'cacat_kusta'          => $this->request->getPost('p403_kusta'),
                                                    'cacat_ganda'    => $this->request->getPost('p403_cacat_ganda'),
                                                    'dipasung'       => $this->request->getPost('p403_dipasung'),



                                                ];

                                                log_message('debug', 'Data yang akan disimpan ke tabel kesehatan: ' . print_r($data, true));
                                                log_message('debug', 'Post data lengkap: ' . print_r($this->request->getPost(), true));
                                                log_message('debug', 'Individu ID: ' . $individu_id);
                                                
                                                if (!$kesehatanModel->insert($data)) {
                                                    log_message('error', 'Gagal insert data kesehatan. Error: ' . print_r($kesehatanModel->errors(), true));
                                                    log_message('error', 'Last Query: ' . $kesehatanModel->getLastQuery());
                                                
                                                    return $this->response->setJSON([
                                                        'status'  => 'error',
                                                        'message' => $kesehatanModel->errors(),
                                                    ]);
                                                }
                                                
                                                log_message('info', 'Berhasil insert data kesehatan dengan ID: ' . $kesehatanModel->getInsertID());

                                                //14 pendidikan 

                                                $pendidikanModel = new PendidikanModel();

                                                $data = [
                                                    'individu_id'          => $individu_id,
                                                    'pendidikan_tertinggi' => $this->request->getPost('p501_pendidikan'),
                                                    'bahasa_rumah'         => $this->request->getPost('p502_bahasa_rumah'),
                                                    'bahasa_formal'        => $this->request->getPost('p503_bahasa_formal'),
                                                    'kerja_bakti'          => $this->request->getPost('p504_kerjabakti'),
                                                    'siskamling'           => $this->request->getPost('p505_siskamling'),
                                                    'pesta_rakyat'         => $this->request->getPost('p506_pesta'),
                                                    'menolong_kematian'    => $this->request->getPost('p507_kematian'),
                                                    'menolong_sakit'       => $this->request->getPost('p508_sakit'),
                                                    'menolong_kecelakaan'  => $this->request->getPost('p509_kecelakaan'),
                                                ];

                                                if (!$pendidikanModel->insert($data)) {
                                                    $error = $pendidikanModel->errors();
                                                    return $this->response->setJSON([
                                                        'status'  => 'error',
                                                        'message' => 'Gagal menyimpan data pendidikan: ' . implode(', ', $error),
                                                    ]);
                                                }
                                    
            // Commit transaction
            $db->transComplete();

            if ($db->transStatus() === FALSE) {
                throw new \Exception('Terjadi kesalahan dalam penyimpanan data');
            }

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'data' => [
                    'lokasi_id' => $lokasiId,
                    'keluarga_id' => $keluargaId,
                    'permukiman_id' => $permukimanId
                ]
            ]);

        } catch (\Exception $e) {
            // Rollback transaction jika terjadi error
            $db->transRollback();
            
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $e->getMessage()
            ])->setStatusCode(500);
        }

    }

    public function update($id)
    {
        $db = \Config\Database::connect();
        $db->transStart();

        $post = $this->request->getPost();

        $id_permukiman = $post['permukiman_id'];
        // log_message('debug', 'POST payload: ' . print_r($id_permukiman, true));

        try {
            $request = $this->request->getPost();
      
        // ================= LOKASI =================

        $lokasiModel = new LokasiModel();
            // Filter data dengan prefix 'lokasi'
            $lokasiData = [];
            foreach ($request as $key => $value) {
                if (strpos($key, 'lokasi_') === 0) {
                    $fieldName = str_replace('lokasi_', '', $key);
                    $lokasiData[$fieldName] = $value;
                }
            }

            log_message('debug', 'lokasi payload: ' . print_r($lokasiData, true));

            // Jika ada lokasi_id, tambahkan ke data
            if (!empty($request['lokasi_id'])) {
                $lokasiData['id'] = $request['lokasi_id'];
            }

            if (!empty($lokasiData)) {
                if (!empty($lokasiData['id'])) {
                    $id = $lokasiData['id'];
                    unset($lokasiData['id']); // Hapus id dari data karena tidak termasuk dalam allowedFields
                    $lokasiModel->update($id, $lokasiData);
                    $lokasiId = $id;
                } else {
                    // Tambahkan keluarga_id jika diperlukan
                    $lokasiData['keluarga_id'] = $request['keluarga_id'] ?? null;
                    $lokasiId = $lokasiModel->insert($lokasiData);
                }
            }


                    // ================= KELUARGA =================

        $keluargaModel = new KeluargaModel();
        // Filter data dengan prefix 'keluarga'
        $keluargaData = [];
        foreach ($request as $key => $value) {
            if (strpos($key, 'keluarga_') === 0) {
                $fieldName = str_replace('keluarga_', '', $key);
                $keluargaData[$fieldName] = $value;
            }

            if ($key === 'enumerator_id') {
                $keluargaData['enumerator_id'] = $value;
            }
        }

        log_message('debug', 'keluarga payload: ' . print_r($keluargaData, true));

        // Jika ada keluarga_id, tambahkan ke data
        if (!empty($request['keluarga_id'])) {
            $keluargaData['id'] = $request['keluarga_id'];
        }

        if (!empty($keluargaData)) {
            if (!empty($keluargaData['id'])) {
                $id = $keluargaData['id'];
                unset($keluargaData['id']); // Hapus id dari data karena tidak termasuk dalam allowedFields
                $keluargaModel->update($id, $keluargaData);
                $keluargaId = $id;
            } else {
                // Tambahkan keluarga_id jika diperlukan
                $keluargaData['keluarga_id'] = $request['keluarga_id'] ?? null;
                $keluargaId = $keluargaModel->insert($keluargaData);
            }
        }


           
        // ================= permukiman =================

            $permukimanModel = new PermukimanModel();
            // Filter data dengan prefix 'permukiman'
            $permukimanData = [];
            foreach ($request as $key => $value) {
                if (strpos($key, 'permukiman_') === 0) {
                    $fieldName = str_replace('permukiman_', '', $key);
                    $permukimanData[$fieldName] = $value;
                }
            }
            // Jika ada permukiman_id, tambahkan ke data
            if (!empty($request['permukiman_id'])) {
                $permukimanData['id'] = $request['permukiman_id'];
            }

            if (!empty($permukimanData)) {
                if (!empty($permukimanData['id'])) {
                    $id = $permukimanData['id'];
                    unset($permukimanData['id']); // Hapus id dari data karena tidak termasuk dalam allowedFields
                    $permukimanModel->update($id, $permukimanData);
                    $permukimanId = $id;
                } else {
                    // Tambahkan keluarga_id jika diperlukan
                    $permukimanData['keluarga_id'] = $request['keluarga_id'] ?? null;
                    $permukimanId = $permukimanModel->insert($permukimanData);
                }
            }


            // ================= INDIVIDU =================

            $individuModel = new IndividuModel();
            $individuData = [];
            foreach ($request as $key => $value) {
                if (strpos($key, 'individu_') === 0) {
                    $fieldName = str_replace('individu_', '', $key);
                    $individuData[$fieldName] = $value;
                }
            }
            // Jika ada individu_id, tambahkan ke data
            if (!empty($request['individu_id'])) {
                $individuData['id'] = $request['individu_id'];
            }

            if (!empty($individuData)) {
                if (!empty($individuData['id'])) {
                    $id = $individuData['id'];
                    unset($individuData['id']); // Hapus id dari data karena tidak termasuk dalam allowedFields
                    $individuModel->update($id, $individuData);
                    $individuId = $id;
                } else {
                    // Tambahkan keluarga_id jika diperlukan
                    // $individuData['keluarga_id'] = $request['keluarga_id'] ?? null;
                    $individuId = $individuModel->insert($individuData);
                }
            }

            // $individuModel = new IndividuModel();
            // if (!empty($request['individu'])) {
            //     $individuData = $request['individu'];
            //     log_message('debug', 'Update Individu: '. print_r($individuData, true));
            //     $individuModel->update($id, $individuData);
            // }

            // ================= AKSES PENDIDIKAN =================
            $aksesPendidikanModel = new AksesPendidikanModel();
            if (!empty($request['akses_pendidikan'])) {
                foreach ($request['akses_pendidikan'] as $row) {
                    if (!empty($row['id'])) {
                        $aksesPendidikanModel->update($row['id'], $row);
                    } else {
                        $row['permukiman_id'] = $id_permukiman;
                        log_message('debug', 'row permukiman?: ' . print_r($row, true));

                        $aksesPendidikanModel->insert($row);
                    }
                }
            }

            // ================= AKSES KESEHATAN =================
            $aksesKesehatanModel = new AksesKesehatanModel();
            if (!empty($request['akses_kesehatan'])) {
                foreach ($request['akses_kesehatan'] as $row) {
                    if (!empty($row['id'])) {
                        $aksesKesehatanModel->update($row['id'], $row);
                    } else {
                        $row['permukiman_id'] = $id_permukiman;
                        $aksesKesehatanModel->insert($row);
                    }
                }
            }

            // ================= AKSES TENAGA KESEHATAN =================
            $aksesTenagaKesehatanModel = new AksesTenagaKesehatanModel();
            if (!empty($request['tenaga_kesehatan'])) {
                foreach ($request['tenaga_kesehatan'] as $row) {
                    if (!empty($row['id'])) {
                        $aksesTenagaKesehatanModel->update($row['id'], $row);
                    } else {
                        $row['permukiman_id'] = $id_permukiman;
                        $aksesTenagaKesehatanModel->insert($row);
                    }
                }
            }

            // ================= AKSES TRANSPORTASI =================
            $aksesTransportasiModel = new AksesTransportasiModel();
            if (!empty($request['transportasi'])) {
                foreach ($request['transportasi'] as $row) {
                    if (!empty($row['id'])) {
                        $aksesTransportasiModel->update($row['id'], $row);
                    } else {
                        $row['permukiman_id'] =$id_permukiman;
                        $aksesTransportasiModel->insert($row);
                    }
                }
            }

            // ================= PROGRAM PEMERINTAH =================
            // $programPemerintahModel = new ProgramPemerintahModel();
            // if (!empty($request['program_pemerintah'])) {
            //     $row = $request['program_pemerintah'];
            //     if (!empty($row['id'])) {
            //         $programPemerintahModel->update($row['id'], $row);
            //     } else {
            //         $row['permukiman_id'] = $request['individu']['permukiman_id'] ?? null;
            //         $programPemerintahModel->insert($row);
            //     }
            // }

            $programPemerintahModel = new ProgramPemerintahModel();
            if (!empty($request['program_pemerintah'])) {
                $row = $request['program_pemerintah'];
                
                // Debug data
                log_message('debug', 'Program pemerintah data: ' . print_r($row, true));
                
                if (!empty($row['id'])) {
                    // UPDATE
                    $result = $programPemerintahModel->update($row['id'], $row);
                    if (!$result) {
                        log_message('error', 'Update error: ' . print_r($programPemerintahModel->errors(), true));
                    }
                } else {
                    // INSERT - Jangan overwrite permukiman_id yang sudah ada
                    // HAPUS BARIS INI: $row['permukiman_id'] = $request['individu']['permukiman_id'] ?? null;
                    
                    $result = $programPemerintahModel->insert($row);
                    if (!$result) {
                        log_message('error', 'Insert error: ' . print_r($programPemerintahModel->errors(), true));
                    } else {
                        log_message('debug', 'Insert successful! New ID: ' . $programPemerintahModel->getInsertID());
                    }
                }
            }

            // ================= KESEHATAN =================

                        $kesehatanModel = new KesehatanModel();
                        $kesehatanData = [];
                        foreach ($request as $key => $value) {
                            if (strpos($key, 'kesehatan_') === 0) {
                                $fieldName = str_replace('kesehatan_', '', $key);
                                $kesehatanData[$fieldName] = $value;
                            }
                        }

                        log_message('debug', 'kesehatanData ' . print_r($kesehatanData, true));

                        // Jika ada kesehatan_id, tambahkan ke data
                        if (!empty($request['kesehatan_id'])) {
                            $kesehatanData['id'] = $request['kesehatan_id'];
                        }
            
                        if (!empty($kesehatanData)) {
                            if (!empty($kesehatanData['id'])) {
                                $id = $kesehatanData['id'];
                                unset($kesehatanData['id']); // Hapus id dari data karena tidak termasuk dalam allowedFields
                                $kesehatanModel->update($id, $kesehatanData);
                                $kesehatanId = $id;
                            } else {
                                // Tambahkan keluarga_id jika diperlukan
                                // $kesehatanData['keluarga_id'] = $request['keluarga_id'] ?? null;
                                $kesehatanId = $kesehatanModel->insert($kesehatanData);
                            }
                        }

            // ================= PENDIDIKAN =================


            $pendidikanModel = new PendidikanModel();
            $pendidikanData = [];
            foreach ($request as $key => $value) {
                if (strpos($key, 'pendidikan_') === 0) {
                    // Khusus untuk "pendidikan_pendidikan_tertinggi"
                    if ($key === 'pendidikan_pendidikan_tertinggi') {
                        $pendidikanData['pendidikan_tertinggi'] = $value;
                    } else {
                        // buang prefix pertama
                        $fieldName = str_replace('pendidikan_', '', $key);
                        $pendidikanData[$fieldName] = $value;
                    }
                }
            }
            

            log_message('debug', 'pendidikanData ' . print_r($pendidikanData, true));

            // Jika ada pendidikan_id, tambahkan ke data
            if (!empty($request['pendidikan_id'])) {
                $pendidikanData['id'] = $request['pendidikan_id'];
            }

            if (!empty($pendidikanData)) {
                if (!empty($pendidikanData['id'])) {
                    $id = $pendidikanData['id'];
                    unset($pendidikanData['id']); // Hapus id dari data karena tidak termasuk dalam allowedFields
                    $pendidikanModel->update($id, $pendidikanData);
                    $pendidikanId = $id;
                } else {
                    // Tambahkan keluarga_id jika diperlukan
                    // $pendidikanData['keluarga_id'] = $request['keluarga_id'] ?? null;
                    $pendidikanId = $pendidikanModel->insert($pendidikanData);
                }
            }
            // $pendidikanModel = new PendidikanModel();
            // if (!empty($request['pendidikan'])) {
            //     $row = $request['pendidikan'];
            //     if (!empty($row['id'])) {
            //         $pendidikanModel->update($row['id'], $row);
            //     } else {
            //         $row['individu_id'] = $id;
            //         $pendidikanModel->insert($row);
            //     }
            // }

            // ================= PEKERJAAN =================
            $pekerjaanModel = new PekerjaanModel();
            if (!empty($request['pekerjaan'])) {
                $row = $request['pekerjaan'];
                if (!empty($row['id'])) {
                    $pekerjaanModel->update($row['id'], $row);
                    $pekerjaanId = $row['id'];
                } else {
                    $row['individu_id'] = $id;
                    $pekerjaanId = $pekerjaanModel->insert($row);
                }
            }

            // ================= SUMBER PENGHASILAN =================
            $sumberPenghasilanModel = new SumberPenghasilanModel();
            if (!empty($request['sumber_penghasilan'])) {
                foreach ($request['sumber_penghasilan'] as $row) {
                    if (isset($row['id']) && !empty($row['id'])) {
                        $id = $row['id'];
                        unset($row['id']); // jangan ikut update primary key
                        if ($sumberPenghasilanModel->update($id, $row) !== false) {
                            // sukses, meski affectedRows = 0
                        }
                    } else {
                        log_message('debug', 'penghasilan?? ' . print_r($row, true));

                        // $sumberPenghasilanModel->insert($row);
                    }
                }
                
            }

            $db->transComplete();

            if ($db->transStatus() === false) {

                $error = $db->error(); // ['code' => ..., 'message' => ...]
                $lastQuery = $db->getLastQuery();
            
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'update data.',
                    'db_error' => $error,
                    'last_query' => (string) $lastQuery
                ]);
                // return $this->response->setJSON(['status' => false, 'message' => 'Gagal update data.']);
            }

            return $this->response->setJSON(['status' => true, 'message' => 'Data berhasil diupdate.']);

        } catch (\Exception $e) {
            $db->transRollback();
            return $this->response->setJSON(['status' => false, 'message' => $e->getMessage()]);
        }
    }




    public function deleteByIndividuId($individuId)
    {
        $db = \Config\Database::connect();
        $db->transStart(); // Start transaction

        try {
            // 1. Delete dari tabel-tabel yang berelasi dengan individu_id
            $this->deleteRelatedToIndividu($individuId);
            
            // 2. Dapatkan keluarga_id dari individu
            $individuModel = new IndividuModel();
            $individu = $individuModel->find($individuId);
            
            if ($individu) {
                $keluargaId = $individu['keluarga_id'];
                
                // 3. Delete individu itu sendiri
                $individuModel->delete($individuId);
                
                // 4. Cek apakah masih ada individu lain dalam keluarga yang sama
                $remainingIndividu = $individuModel->where('keluarga_id', $keluargaId)->countAllResults();


                if ($remainingIndividu == 0) {
                    // ambil data keluarga dulu sebelum dihapus
                    $keluargaModel = new KeluargaModel();
                    $keluarga = $keluargaModel->find($keluargaId);
            
                    if ($keluarga) {
                        $lokasiId = $keluarga['lokasi_id'];
            
                        // hapus semua data terkait keluarga
                        $this->deleteRelatedToKeluarga($keluargaId);
            
                        // hapus keluarga
                        $keluargaModel->delete($keluargaId);
            
                        // hapus lokasi
                        $lokasiModel = new LokasiModel();
                        $lokasiModel->delete($lokasiId);
                    }
                }
                

            }
            
            $db->transComplete(); // Commit transaction
            
            if ($db->transStatus() === FALSE) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Gagal menghapus data'
                ]);
            }
            
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Data berhasil dihapus'
            ]);
            
        } catch (\Exception $e) {
            $db->transRollback(); // Rollback transaction jika error
            
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ]);
        }
    }
    
    private function deleteRelatedToIndividu($individuId)
    {
        $pekerjaanModel = new PekerjaanModel();
        $pendidikanModel = new PendidikanModel();
        $kesehatanModel = new KesehatanModel();
        $sumberPenghasilanModel = new SumberPenghasilanModel();
        
        // Dapatkan pekerjaan_id terkait individu
        $pekerjaan = $pekerjaanModel->where('individu_id', $individuId)->first();
        
        if ($pekerjaan) {
            // Hapus sumber penghasilan terkait pekerjaan
            $sumberPenghasilanModel->where('pekerjaan_id', $pekerjaan['id'])->delete();
            
            // Hapus pekerjaan
            $pekerjaanModel->where('individu_id', $individuId)->delete();
        }
        
        // Hapus pendidikan
        $pendidikanModel->where('individu_id', $individuId)->delete();
        
        // Hapus kesehatan
        $kesehatanModel->where('individu_id', $individuId)->delete();
    }
    
    private function deleteRelatedToKeluarga($keluargaId)
    {
        $permukimanModel = new PermukimanModel();
        $aksesPendidikanModel = new AksesPendidikanModel();
        $aksesKesehatanModel = new AksesKesehatanModel();
        $aksesTenagaKesehatanModel = new AksesTenagaKesehatanModel();
        $aksesTransportasiModel = new AksesTransportasiModel();
        $programPemerintahModel = new ProgramPemerintahModel();
        $lokasiModel = new LokasiModel();
        $keluargaModel = new KeluargaModel();

        
        // Dapatkan permukiman_id terkait keluarga
        $permukiman = $permukimanModel->where('keluarga_id', $keluargaId)->first();
        
        if ($permukiman) {
            $permukimanId = $permukiman['id'];
            
            // Hapus data akses terkait permukiman
            $aksesPendidikanModel->where('permukiman_id', $permukimanId)->delete();
            $aksesKesehatanModel->where('permukiman_id', $permukimanId)->delete();
            $aksesTenagaKesehatanModel->where('permukiman_id', $permukimanId)->delete();
            $aksesTransportasiModel->where('permukiman_id', $permukimanId)->delete();
            $programPemerintahModel->where('permukiman_id', $permukimanId)->delete();
            
            // Hapus permukiman
            $permukimanModel->where('keluarga_id', $keluargaId)->delete();
        }


    }
    
    // Alternative: Hapus hanya individu dan relasinya (tanpa menghapus keluarga)
    public function deleteIndividuOnly($individuId)
    {
        $db = \Config\Database::connect();
        $db->transStart();
        
        try {
            $this->deleteRelatedToIndividu($individuId);
            
            $individuModel = new IndividuModel();
            $individuModel->delete($individuId);
            
            $db->transComplete();
            
            if ($db->transStatus() === FALSE) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Gagal menghapus individu'
                ]);
            }
            
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Individu berhasil dihapus'
            ]);
            
        } catch (\Exception $e) {
            $db->transRollback();
            
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ]);
        }
    
}


}