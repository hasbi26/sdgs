<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<style>
th h6 {
    display: inline-block;
    margin: 0;
    font-size: 14px;
    /* sesuai tema */
}

.select2-search__field {
    user-select: text !important;
}


/* pastikan input search Select2 bisa diketik */
.select2-container .select2-search__field {
    display: block !important;
    width: 100% !important;
    padding: 6px 8px !important;
    font-size: 14px !important;
    color: #000 !important;
    background-color: #fff !important;
    pointer-events: auto !important;
    opacity: 1 !important;
}

/* Pastikan selalu ada border */
.select2-container--bootstrap-5 .select2-selection {
    border: 1px solid #ced4da !important;
    /* default bootstrap border */
    border-radius: 0.375rem !important;
    /* biar sama dengan form-control */
    min-height: calc(1.5em + .75rem + 2px) !important;
    padding: .375rem .75rem !important;
    display: flex !important;
    align-items: center !important;
    /* biar text selalu di tengah */
    min-height: calc(1.5em + .75rem + 2px) !important;
    /* sama dgn .form-select */
    padding: .375rem .75rem !important;
}

/* Saat fokus tetap ada border biru Bootstrap */
.select2-container--bootstrap-5 .select2-selection:focus {
    border-color: #86b7fe !important;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, .25) !important;
    outline: 0 !important;
}

.select2-container--bootstrap-5 .select2-selection__rendered {
    line-height: 1.5 !important;
    padding-left: 0 !important;
    margin: 0 !important;
}


/* biar dropdown selalu kelihatan di atas modal */
.select2-container.select2-container--open {
    z-index: 9999 !important;
}
</style>

<section class="section">
    <!-- ========== table components start ========== -->
    <section class="table-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Form SDGs</h2>
                        </div>
                    </div>
                    <!-- end col -->

                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->

            <!-- ========== tables-wrapper start ========== -->
            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#kuesionerModal">
                                        Tambah Data <i class="lni lni-circle-plus"></i>
                                    </button>
                                </div>

                                <div class="col-md-4 ms-auto">
                                    <input type="text" id="searchBox" class="form-control"
                                        placeholder="Cari nama, alamat atau telepon...">
                                </div>
                            </div>


                            <div class="table-wrapper table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="lead-info">
                                                <h6>Enumerator</h6>
                                            </th>
                                            <th class="lead-email">
                                                <h6>No KK</h6>
                                            </th>
                                            <th class="lead-phone">
                                                <h6>Nik</h6>
                                            </th>
                                            <th class="lead-company">
                                                <h6>Nama</h6>
                                            </th>
                                            <th>
                                                <h6>Action</h6>
                                            </th>
                                        </tr>
                                        <!-- end table row-->
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-text">
                                                        <p>Sujali</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="min-width">
                                                <p>3211934803458093</p>
                                            </td>
                                            <td class="min-width">
                                                <p>3211934803458093</p>
                                            </td>
                                            <td class="min-width">
                                                <p>Ahmad</p>
                                            </td>
                                            <td>
                                                <div class="action">
                                                    <button class="text-info">
                                                        <i class="lni lni-list"></i>
                                                    </button>
                                                    <button class="text-warning">
                                                        <i class="lni lni-pencil-alt"></i>
                                                    </button>
                                                    <button class="text-danger">
                                                        <i class="lni lni-trash-can"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- end table -->
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== tables-wrapper end ========== -->
        </div>
        <!-- end container -->
    </section>
    <!-- Modal Kuesioner -->
    <div class="modal fade" id="kuesionerModal" tabindex="-1" aria-labelledby="kuesionerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kuesionerModalLabel">Tambah Data Kuesioner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form akan dimuat via AJAX -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <!-- form create -->
                            <form id="sdgsForm">
                                <div class="card-style mb-10">
                                    <h6 class="mb-25">P1. Deskripsi Enumerator</h6>

                                    <label for="enumeratorSelect">Select Enumerator</label>
                                    <div class="select-position">
                                        <select name="enumerator_id" id="enumeratorSelect" style="width: 100%"></select>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card-style mb-10" style="height: 155px">
                                <!-- P2 DESKRIPSI LOKASI -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <h6 class="mb-25">P2. Deskripsi Lokasi</h6>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- <label for="p205" class="form-label">RT/RW</label> -->
                                        <input type="text" class="form-control" id="rt_rw" name="rt_rw"
                                            placeholder="RT/RW">
                                    </div>
                                    <div class="col-md-4">
                                        <!-- <label for="p206" class="form-label">Nama</label> -->
                                        <input type="text" class="form-control" id="nama_responden"
                                            name="nama_responden" placeholder="Nama">
                                    </div>

                                </div>
                                <div class="row pt-4">
                                    <div class="col-md-5">
                                        <!-- <label for="p207" class="form-label">Alamat</label> -->
                                        <input type="text" class="form-control" id="alamat_responden"
                                            name="alamat_responden" placeholder="Alamat">
                                    </div>
                                    <div class="col-md-3">
                                        <!-- <label for="p208" class="form-label">Nomor HP</label> -->
                                        <input type="text" class="form-control" id="nomor_hp" name="nomor_hp"
                                            placeholder="Nomor HP">
                                    </div>
                                    <div class="col-md-4">
                                        <!-- <label for="p209" class="form-label">No Telp Kabel/Rumah</label> -->
                                        <input type="text" class="form-control" id="no_telepon_rumah"
                                            name="no_telepon_rumah" placeholder="No Telp Kabel/Rumah">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                    <!-- P3 DESKRIPSI KELUARGA -->
                    <div class="card-style mb-10">
                        <h5 class="mt-3">P3. Deskripsi Keluarga</h5>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="no_kk" class="form-label">Nomor KK</label>
                                <input type="text" class="form-control" id="no_kk" name="no_kk">
                            </div>
                            <div class="col-md-4">
                                <label for="nik_kepala_keluarga" class="form-label">NIK Kepala Keluarga</label>
                                <input type="text" class="form-control" id="nik_kepala_keluarga"
                                    name="nik_kepala_keluarga">
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Permukiman</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="akses-tab" data-bs-toggle="tab" data-bs-target="#akses"
                                type="button" role="tab" aria-controls="akses" aria-selected="false">Akses</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="individu-tab" data-bs-toggle="tab" data-bs-target="#individu"
                                type="button" role="tab" aria-controls="individu"
                                aria-selected="false">Individu</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pekerjaan-tab" data-bs-toggle="tab" data-bs-target="#pekerjaan"
                                type="button" role="tab" aria-controls="pekerjaan"
                                aria-selected="false">Pekerjaan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="kesehatan-tab" data-bs-toggle="tab" data-bs-target="#kesehatan"
                                type="button" role="tab" aria-controls="kesehatan"
                                aria-selected="false">Kesehatan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pendidikan-tab" data-bs-toggle="tab"
                                data-bs-target="#pendidikan" type="button" role="tab" aria-controls="pendidikan"
                                aria-selected="false">Pendidikan</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <!-- pemukiman -->
                            <!-- P4 PERMUKIMAN -->
                            <h5 class="mt-3">P4. Permukiman</h5>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="tempat_tinggal" class="form-label">Tempat tinggal yang ditempati</label>
                                    <select class="form-select" id="tempat_tinggal" name="tempat_tinggal">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Milik sendiri</option>
                                        <option value="2">Kontrak/Sewa</option>
                                        <option value="3">Bebas Sewa</option>
                                        <option value="4">Dipinjami</option>
                                        <option value="5">Dinas</option>
                                        <option value="6">Lainnya</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="status_lahan" class="form-label">Status lahan tempat tinggal</label>
                                    <select class="form-select" id="status_lahan" name="status_lahan">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Milik sendiri</option>
                                        <option value="2">Milik orang lain</option>
                                        <option value="3">Tanah negara</option>
                                        <option value="4">Lainnya</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Luas tempat tinggal</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" id="luas_lantai"
                                                name="luas_lantai" placeholder="Luas lantai (m2)">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" id="luas_lahan" name="luas_lahan"
                                                placeholder="Luas lahan (m2)">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <!-- P404 -->
                                <div class="col-md-3">
                                    <label for="jenis_lantai" class="form-label">Jenis lantai tempat tinggal
                                        terluas</label>
                                    <select class="form-select" id="jenis_lantai" name="jenis_lantai">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Marmer/granit</option>
                                        <option value="2">Keramik</option>
                                        <option value="3">Parket/vinil/permadani</option>
                                        <option value="4">Ubin/tegel/teraso</option>
                                        <option value="5">Kayu/papan kualitas tinggi</option>
                                        <option value="6">Semen/bata merah</option>
                                        <option value="7">Bambu</option>
                                        <option value="8">Kayu/papan kualitas rendah</option>
                                        <option value="9">Bambu</option>
                                        <option value="10">Lainnya</option>
                                    </select>
                                </div>

                                <!-- P405 -->
                                <div class="col-md-3">
                                    <label for="jenis_dinding" class="form-label">Dinding sebagian besar rumah</label>
                                    <select class="form-select" id="jenis_dinding" name="jenis_dinding">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Semen/beton/kayu berkualitas tinggi</option>
                                        <option value="2">Kayu berkualitas rendah/bambu</option>
                                        <option value="3">Lainnya</option>
                                    </select>
                                </div>

                                <!-- P406 -->
                                <div class="col-md-3">
                                    <label for="jendela" class="form-label">Jendela</label>
                                    <select class="form-select" id="jendela" name="jendela">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Ada, berfungsi</option>
                                        <option value="2">Ada, tidak berfungsi</option>
                                        <option value="3">Tidak ada</option>
                                    </select>
                                </div>

                                <!-- P407 -->
                                <div class="col-md-3">
                                    <label for="atap" class="form-label">Atap</label>
                                    <select class="form-select" id="atap" name="atap">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Genteng</option>
                                        <option value="2">Kayu/Jerami</option>
                                        <option value="3">Lainnya</option>
                                    </select>
                                </div>

                            </div>
                            <!-- P408 -->
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="penerangan" class="form-label">Penerangan rumah</label>
                                    <select class="form-select" id="penerangan" name="penerangan">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Listrik PLN</option>
                                        <option value="2">Listrik non PLN</option>
                                        <option value="3">Lampu minyak/lilin</option>
                                        <option value="4">Sumber penerangan lainnya</option>
                                        <option value="5">Tidak ada</option>
                                    </select>
                                </div>

                                <!-- P409 -->
                                <div class="col-md-3">
                                    <label for="energi_masak" class="form-label">Energi untuk memasak</label>
                                    <select class="form-select" id="energi_masak" name="energi_masak">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Gas kota / LPG / Biogas</option>
                                        <option value="2">Minyak tanah / Batu bara</option>
                                        <option value="3">Kayu bakar</option>
                                        <option value="4">Lainnya</option>
                                    </select>
                                </div>

                                <!-- P410 -->
                                <div class="col-md-4">
                                    <label for="sumber_kayu_bakar" class="form-label">Jika menggunakan kayu bakar,
                                        sumber
                                        kayu</label>
                                    <select class="form-select" id="sumber_kayu_bakar" name="sumber_kayu_bakar">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Pembelian</option>
                                        <option value="2">Diambil dari hutan</option>
                                        <option value="3">Diambil di luar/bukan hutan</option>
                                        <option value="4">Lainnya</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <!-- P411 -->
                                <div class="col-md-3">
                                    <label for="pembuangan_sampah" class="form-label">Tempat pembuangan sampah</label>
                                    <select class="form-select" id="pembuangan_sampah" name="pembuangan_sampah">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Tidak ada</option>
                                        <option value="2">Di kebun/sungai/drainase</option>
                                        <option value="3">Dibakar</option>
                                        <option value="4">Tempat sampah</option>
                                        <option value="5">Tempat sampah diangkut reguler</option>
                                    </select>
                                </div>


                                <!-- P412 -->
                                <div class="col-md-3">
                                    <label for="fasilitas_mck" class="form-label">Fasilitas MCK</label>
                                    <select class="form-select" id="fasilitas_mck" name="fasilitas_mck">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Sendiri</option>
                                        <option value="2">Berkelompok/tetangga</option>
                                        <option value="3">MCK umum</option>
                                        <option value="4">Tidak ada</option>
                                    </select>
                                </div>

                                <!-- P413 -->
                                <div class="col-md-3">
                                    <label for="sumber_air_mandi" class="form-label">Sumber air mandi terbanyak
                                        dari</label>
                                    <select class="form-select" id="sumber_air_mandi" name="sumber_air_mandi">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Ledeng/perpipaan berbayar/air isi ulang/kemasan</option>
                                        <option value="2">Perpipaan</option>
                                        <option value="3">Mata air / Sumur</option>
                                        <option value="4">Sungai, danau, embung</option>
                                        <option value="5">Tadah air hujan</option>
                                        <option value="6">Lainnya</option>
                                    </select>
                                </div>

                                <!-- P414 -->
                                <div class="col-md-3">
                                    <label for="fasilitas_bab" class="form-label">Fasilitas buang air besar</label>
                                    <select class="form-select" id="fasilitas_bab" name="fasilitas_bab">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Jamban sendiri</option>
                                        <option value="2">Jamban bersama/tetangga</option>
                                        <option value="3">Jamban umum</option>
                                        <option value="4">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <!-- P415 -->
                                <div class="col-md-5">
                                    <label for="sumber_air_minum" class="form-label">Sumber air minum terbanyak
                                        dari</label>
                                    <select class="form-select" id="sumber_air_minum" name="sumber_air_minum">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Ledeng/perpipaan berbayar/air isi ulang/kemasan</option>
                                        <option value="2">Mata air / Perpipaan / Sumur</option>
                                        <option value="3">Sungai, danau, embung</option>
                                        <option value="4">Tadah air hujan</option>
                                        <option value="5">Lainnya</option>
                                    </select>
                                </div>

                                <!-- P416 -->
                                <div class="col-md-5">
                                    <label for="pembuangan_limbah_cair" class="form-label">Tempat pembuangan limbah
                                        cair</label>
                                    <select class="form-select" id="pembuangan_limbah_cair"
                                        name="pembuangan_limbah_cair">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Tangki/instalasi pengelolaan limbah</option>
                                        <option value="2">Sawah/kolam/sungai/drainase/laut</option>
                                        <option value="3">Lubang di tanah</option>
                                        <option value="4">Lainnya</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <!-- P417 -->
                                <div class="col-md-5">
                                    <label for="bawah_sutet" class="form-label">Rumah berada di bawah
                                        SUTET/SUTT/SUTTAS</label>
                                    <select class="form-select" id="bawah_sutet" name="bawah_sutet">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                </div>

                                <!-- P418 -->
                                <div class="col-md-5">
                                    <label for="bantaran_sungai" class="form-label">Rumah di bantaran sungai</label>
                                    <select class="form-select" id="bantaran_sungai" name="bantaran_sungai">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <!-- P419 -->
                                <div class="col-md-5">
                                    <label for="lereng_bukit" class="form-label">Rumah di lereng bukit/gunung</label>
                                    <select class="form-select" id="lereng_bukit" name="lereng_bukit">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                </div>

                                <!-- P420 -->
                                <div class="col-md-5">
                                    <label for="kondisi_rumah" class="form-label">Secara keseluruhan kondisi
                                        rumah</label>
                                    <select class="form-select" id="kondisi_rumah" name="kondisi_rumah">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Kumuh</option>
                                        <option value="2">Tidak kumuh</option>
                                    </select>
                                </div>

                            </div>
                            <!-- pemukiman -->
                        </div>
                        <div class="tab-pane fade" id="akses" role="tabpanel" aria-labelledby="akses-tab">
                            <!-- akses  -->
                            <!-- P421 -->
                            <div class="container-fluid mt-4">
                                <!-- Row 1: P421 & P422 -->
                                <div class="row mb-3">
                                    <!-- P421 -->
                                    <div class="col-md-6">
                                        <div class="card-style mb-30">
                                            <h6 class="mb-10">P421 - Akses Pendidikan terdekat</h6>
                                            <div class="table-wrapper table-responsive">
                                                <table class="table striped-table">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <h6>No</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Fasilitas</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Jarak (km)</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Waktu Tempuh (jam)</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Kemudahan</h6>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- daftar fasilitas pendidikan -->
                                                        <tr>
                                                            <td>
                                                                <p>1</p>
                                                            </td>
                                                            <td>
                                                                <p>PAUD</p>
                                                                <input type="hidden"
                                                                    name="akses_pendidikan[0][fasilitas]" value="PAUD">
                                                                <input type="hidden"
                                                                    name="akses_pendidikan[0][id_fasilitas]" value="1">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="akses_pendidikan[0][jarak_km]" step="0.01">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="akses_pendidikan[0][waktu_tempuh_jam]"
                                                                    step="0.01">
                                                            </td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="akses_pendidikan[0][kemudahan]">
                                                                    <option value="">-- pilih --</option>
                                                                    <option value="1">Mudah</option>
                                                                    <option value="2">Sulit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>2</p>
                                                            </td>
                                                            <td>
                                                                <p>TK/RA</p>
                                                                <input type="hidden"
                                                                    name="akses_pendidikan[1][fasilitas]" value="TK/RA">
                                                                <input type="hidden"
                                                                    name="akses_pendidikan[1][id_fasilitas]" value="2">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="akses_pendidikan[1][jarak_km]" step="0.01">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="akses_pendidikan[1][waktu_tempuh_jam]"
                                                                    step="0.01">
                                                            </td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="akses_pendidikan[1][kemudahan]">
                                                                    <option value="">-- pilih --</option>
                                                                    <option value="1">Mudah</option>
                                                                    <option value="2">Sulit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>3</p>
                                                            </td>
                                                            <td>
                                                                <p>SD/MI</p>
                                                                <input type="hidden"
                                                                    name="akses_pendidikan[2][fasilitas]" value="SD/MI">
                                                                <input type="hidden"
                                                                    name="akses_pendidikan[2][id_fasilitas]" value="3">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="akses_pendidikan[2][jarak_km]" step="0.01">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="akses_pendidikan[2][waktu_tempuh_jam]"
                                                                    step="0.01">
                                                            </td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="akses_pendidikan[2][kemudahan]">
                                                                    <option value="">-- pilih --</option>
                                                                    <option value="1">Mudah</option>
                                                                    <option value="2">Sulit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>4</p>
                                                            </td>
                                                            <td>
                                                                <p>SMP/MTs</p>
                                                                <input type="hidden"
                                                                    name="akses_pendidikan[3][fasilitas]"
                                                                    value="SMP/MTs">
                                                                <input type="hidden"
                                                                    name="akses_pendidikan[3][id_fasilitas]" value="4">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="akses_pendidikan[3][jarak_km]" step="0.01">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="akses_pendidikan[3][waktu_tempuh_jam]"
                                                                    step="0.01">
                                                            </td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="akses_pendidikan[3][kemudahan]">
                                                                    <option value="">-- pilih --</option>
                                                                    <option value="1">Mudah</option>
                                                                    <option value="2">Sulit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>5</p>
                                                            </td>
                                                            <td>
                                                                <p>SMA/MA</p>
                                                                <input type="hidden"
                                                                    name="akses_pendidikan[4][fasilitas]"
                                                                    value="SMA/MA">
                                                                <input type="hidden"
                                                                    name="akses_pendidikan[4][id_fasilitas]" value="5">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="akses_pendidikan[4][jarak_km]" step="0.01">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="akses_pendidikan[4][waktu_tempuh_jam]"
                                                                    step="0.01">
                                                            </td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="akses_pendidikan[4][kemudahan]">
                                                                    <option value="">-- pilih --</option>
                                                                    <option value="1">Mudah</option>
                                                                    <option value="2">Sulit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>6</p>
                                                            </td>
                                                            <td>
                                                                <p>Perguruan tinggi</p>
                                                                <input type="hidden"
                                                                    name="akses_pendidikan[5][fasilitas]"
                                                                    value="Perguruan tinggi">
                                                                <input type="hidden"
                                                                    name="akses_pendidikan[5][id_fasilitas]" value="6">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="akses_pendidikan[5][jarak_km]" step="0.01">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="akses_pendidikan[5][waktu_tempuh_jam]"
                                                                    step="0.01">
                                                            </td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="akses_pendidikan[5][kemudahan]">
                                                                    <option value="">-- pilih --</option>
                                                                    <option value="1">Mudah</option>
                                                                    <option value="2">Sulit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>7</p>
                                                            </td>
                                                            <td>
                                                                <p>Pesantren</p>
                                                                <input type="hidden"
                                                                    name="akses_pendidikan[6][fasilitas]"
                                                                    value="Pesantren">
                                                                <input type="hidden"
                                                                    name="akses_pendidikan[6][id_fasilitas]" value="7">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="akses_pendidikan[6][jarak_km]" step="0.01">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="akses_pendidikan[6][waktu_tempuh_jam]"
                                                                    step="0.01">
                                                            </td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="akses_pendidikan[6][kemudahan]">
                                                                    <option value="">-- pilih --</option>
                                                                    <option value="1">Mudah</option>
                                                                    <option value="2">Sulit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>8</p>
                                                            </td>
                                                            <td>
                                                                <p>Seminari</p>
                                                                <input type="hidden"
                                                                    name="akses_pendidikan[7][fasilitas]"
                                                                    value="Seminari">
                                                                <input type="hidden"
                                                                    name="akses_pendidikan[7][id_fasilitas]" value="8">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="akses_pendidikan[7][jarak_km]" step="0.01">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="akses_pendidikan[7][waktu_tempuh_jam]"
                                                                    step="0.01">
                                                            </td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="akses_pendidikan[7][kemudahan]">
                                                                    <option value="">-- pilih --</option>
                                                                    <option value="1">Mudah</option>
                                                                    <option value="2">Sulit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>9</p>
                                                            </td>
                                                            <td>
                                                                <p>Pendidikan keagamaan lain</p>
                                                                <input type="hidden"
                                                                    name="akses_pendidikan[8][fasilitas]"
                                                                    value="Pendidikan keagamaan lain">
                                                                <input type="hidden"
                                                                    name="akses_pendidikan[8][id_fasilitas]" value="9">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="akses_pendidikan[8][jarak_km]" step="0.01">
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="akses_pendidikan[8][waktu_tempuh_jam]"
                                                                    step="0.01">
                                                            </td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="akses_pendidikan[8][kemudahan]">
                                                                    <option value="">-- pilih --</option>
                                                                    <option value="1">Mudah</option>
                                                                    <option value="2">Sulit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>

                                    <!-- P422 -->
                                    <div class="col-md-6">
                                        <div class="card-style mb-30">
                                            <h6 class="mb-10">P422 - Akses Fasilitas Kesehatan terdekat</h6>
                                            <div class="table-wrapper table-responsive">
                                                <table class="table striped-table">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <h6>No</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Fasilitas</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Jarak (km)</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Waktu Tempuh (jam)</h6>
                                                            </th>
                                                            <th>
                                                                <h6>Kemudahan</h6>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- daftar fasilitas kesehatan -->
                                                        <tr>
                                                            <td>
                                                                <p>1</p>
                                                            </td>
                                                            <td>
                                                                <p>Rumah sakit</p>
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[0][fasilitas]"
                                                                    value="Rumah sakit">
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[0][id_fasilitas]" value="1">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[0][jarak_km]" step="0.01">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[0][waktu_tempuh_jam]"
                                                                    step="0.01"></td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="akses_kesehatan[0][kemudahan]">
                                                                    <option value="">-- pilih --</option>
                                                                    <option value="1">Mudah</option>
                                                                    <option value="2">Sulit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>2</p>
                                                            </td>
                                                            <td>
                                                                <p>Rumah sakit bersalin</p>
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[1][fasilitas]"
                                                                    value="Rumah sakit bersalin">
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[1][id_fasilitas]" value="2">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[1][jarak_km]" step="0.01">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[1][waktu_tempuh_jam]"
                                                                    step="0.01"></td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="akses_kesehatan[1][kemudahan]">
                                                                    <option value="">-- pilih --</option>
                                                                    <option value="1">Mudah</option>
                                                                    <option value="2">Sulit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>3</p>
                                                            </td>
                                                            <td>
                                                                <p>Poliklinik</p>
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[2][fasilitas]"
                                                                    value="Poliklinik">
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[2][id_fasilitas]" value="3">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[2][jarak_km]" step="0.01">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[2][waktu_tempuh_jam]"
                                                                    step="0.01"></td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="akses_kesehatan[2][kemudahan]">
                                                                    <option value="">-- pilih --</option>
                                                                    <option value="1">Mudah</option>
                                                                    <option value="2">Sulit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>4</p>
                                                            </td>
                                                            <td>
                                                                <p>Puskesmas</p>
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[3][fasilitas]"
                                                                    value="Puskesmas">
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[3][id_fasilitas]" value="4">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[3][jarak_km]" step="0.01">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[3][waktu_tempuh_jam]"
                                                                    step="0.01"></td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="akses_kesehatan[3][kemudahan]">
                                                                    <option value="">-- pilih --</option>
                                                                    <option value="1">Mudah</option>
                                                                    <option value="2">Sulit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>5</p>
                                                            </td>
                                                            <td>
                                                                <p>Pustu</p>
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[4][fasilitas]" value="Pustu">
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[4][id_fasilitas]" value="5">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[4][jarak_km]" step="0.01">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[4][waktu_tempuh_jam]"
                                                                    step="0.01"></td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="akses_kesehatan[4][kemudahan]">
                                                                    <option value="">-- pilih --</option>
                                                                    <option value="1">Mudah</option>
                                                                    <option value="2">Sulit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>6</p>
                                                            </td>
                                                            <td>
                                                                <p>Polindes</p>
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[5][fasilitas]"
                                                                    value="Polindes">
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[5][id_fasilitas]" value="6">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[5][jarak_km]" step="0.01">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[5][waktu_tempuh_jam]"
                                                                    step="0.01"></td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="akses_kesehatan[5][kemudahan]">
                                                                    <option value="">-- pilih --</option>
                                                                    <option value="1">Mudah</option>
                                                                    <option value="2">Sulit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>7</p>
                                                            </td>
                                                            <td>
                                                                <p>Poskesdes</p>
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[6][fasilitas]"
                                                                    value="Poskesdes">
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[6][id_fasilitas]" value="7">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[6][jarak_km]" step="0.01">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[6][waktu_tempuh_jam]"
                                                                    step="0.01"></td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="akses_kesehatan[6][kemudahan]">
                                                                    <option value="">-- pilih --</option>
                                                                    <option value="1">Mudah</option>
                                                                    <option value="2">Sulit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>8</p>
                                                            </td>
                                                            <td>
                                                                <p>Posyandu</p>
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[7][fasilitas]"
                                                                    value="Posyandu">
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[7][id_fasilitas]" value="8">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[7][jarak_km]" step="0.01">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[7][waktu_tempuh_jam]"
                                                                    step="0.01"></td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="akses_kesehatan[7][kemudahan]">
                                                                    <option value="">-- pilih --</option>
                                                                    <option value="1">Mudah</option>
                                                                    <option value="2">Sulit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>9</p>
                                                            </td>
                                                            <td>
                                                                <p>Apotik</p>
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[8][fasilitas]" value="Apotik">
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[8][id_fasilitas]" value="9">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[8][jarak_km]" step="0.01">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[8][waktu_tempuh_jam]"
                                                                    step="0.01"></td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="akses_kesehatan[8][kemudahan]">
                                                                    <option value="">-- pilih --</option>
                                                                    <option value="1">Mudah</option>
                                                                    <option value="2">Sulit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>10</p>
                                                            </td>
                                                            <td>
                                                                <p>Toko obat</p>
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[9][fasilitas]"
                                                                    value="Toko obat">
                                                                <input type="hidden"
                                                                    name="akses_kesehatan[9][id_fasilitas]" value="10">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[9][jarak_km]" step="0.01">
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    name="akses_kesehatan[9][waktu_tempuh_jam]"
                                                                    step="0.01"></td>
                                                            <td>
                                                                <select class="form-control"
                                                                    name="akses_kesehatan[9][kemudahan]">
                                                                    <option value="">-- pilih --</option>
                                                                    <option value="1">Mudah</option>
                                                                    <option value="2">Sulit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row 2: P423 & P424 -->
                                    <div class="row mb-3">
                                        <!-- P424 -->
                                        <div class="col-md-6">
                                            <div class="card-style mb-30">
                                                <h6 class="mb-10">P424 - Akses Prasarana & Sarana Transportasi</h6>
                                                <div class="table-wrapper table-responsive">
                                                    <table class="table striped-table"
                                                        style="table-layout: fixed; width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th style="width:40px;">
                                                                    <h6>No</h6>
                                                                </th>
                                                                <th style="width:120px;">
                                                                    <h6>Tujuan</h6>
                                                                </th>
                                                                <th style="width:120px;">
                                                                    <h6>Jenis Transportasi</h6>
                                                                </th>
                                                                <th style="width:120px;">
                                                                    <h6>Transportasi Umum</h6>
                                                                </th>
                                                                <th style="width:120px;">
                                                                    <h6>Waktu Tempuh (jam)</h6>
                                                                </th>
                                                                <th style="width:120px;">
                                                                    <h6>Biaya (Rp)</h6>
                                                                </th>
                                                                <th style="width:120px;">
                                                                    <h6>Kemudahan</h6>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <p>1</p>
                                                                </td>
                                                                <td>
                                                                    <p>Lokasi pekerjaan utama</p>
                                                                    <input type="hidden" name="transportasi[0][tujuan]"
                                                                        value="Lokasi pekerjaan utama">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="transportasi[0][jenis]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Darat</option>
                                                                        <option value="2">Air</option>
                                                                        <option value="3">Udara</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="transportasi[0][umum]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Ya</option>
                                                                        <option value="2">Tidak</option>
                                                                    </select>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="transportasi[0][waktu]"></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="transportasi[0][biaya]"></td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="transportasi[0][kemudahan]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Mudah</option>
                                                                        <option value="2">Sulit</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>2</p>
                                                                </td>
                                                                <td>
                                                                    <p>Lahan pertanian</p>
                                                                    <input type="hidden" name="transportasi[1][tujuan]"
                                                                        value="Lahan pertanian">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="transportasi[1][jenis]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Darat</option>
                                                                        <option value="2">Air</option>
                                                                        <option value="3">Udara</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="transportasi[1][umum]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Ya</option>
                                                                        <option value="2">Tidak</option>
                                                                    </select>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="transportasi[1][waktu]"></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="transportasi[1][biaya]"></td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="transportasi[1][kemudahan]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Mudah</option>
                                                                        <option value="2">Sulit</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>3</p>
                                                                </td>
                                                                <td>
                                                                    <p>Sekolah</p>
                                                                    <input type="hidden" name="transportasi[2][tujuan]"
                                                                        value="Sekolah">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="transportasi[2][jenis]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Darat</option>
                                                                        <option value="2">Air</option>
                                                                        <option value="3">Udara</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="transportasi[2][umum]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Ya</option>
                                                                        <option value="2">Tidak</option>
                                                                    </select>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="transportasi[2][waktu]"></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="transportasi[2][biaya]"></td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="transportasi[2][kemudahan]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Mudah</option>
                                                                        <option value="2">Sulit</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>4</p>
                                                                </td>
                                                                <td>
                                                                    <p>Berobat</p>
                                                                    <input type="hidden" name="transportasi[3][tujuan]"
                                                                        value="Berobat">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="transportasi[3][jenis]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Darat</option>
                                                                        <option value="2">Air</option>
                                                                        <option value="3">Udara</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="transportasi[3][umum]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Ya</option>
                                                                        <option value="2">Tidak</option>
                                                                    </select>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="transportasi[3][waktu]"></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="transportasi[3][biaya]"></td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="transportasi[3][kemudahan]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Mudah</option>
                                                                        <option value="2">Sulit</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>5</p>
                                                                </td>
                                                                <td>
                                                                    <p>Beribadah</p>
                                                                    <input type="hidden" name="transportasi[4][tujuan]"
                                                                        value="Beribadah">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="transportasi[4][jenis]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Darat</option>
                                                                        <option value="2">Air</option>
                                                                        <option value="3">Udara</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="transportasi[4][umum]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Ya</option>
                                                                        <option value="2">Tidak</option>
                                                                    </select>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="transportasi[4][waktu]"></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="transportasi[4][biaya]"></td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="transportasi[4][kemudahan]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Mudah</option>
                                                                        <option value="2">Sulit</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>6</p>
                                                                </td>
                                                                <td>
                                                                    <p>Rekreasi</p>
                                                                    <input type="hidden" name="transportasi[5][tujuan]"
                                                                        value="Rekreasi">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="transportasi[5][jenis]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Darat</option>
                                                                        <option value="2">Air</option>
                                                                        <option value="3">Udara</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="transportasi[5][umum]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Ya</option>
                                                                        <option value="2">Tidak</option>
                                                                    </select>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="transportasi[5][waktu]"></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="transportasi[5][biaya]"></td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="transportasi[5][kemudahan]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Mudah</option>
                                                                        <option value="2">Sulit</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>


                                                </div>
                                            </div>
                                        </div>

                                        <!-- P423 -->
                                        <div class="col-md-6">
                                            <div class="card-style mb-30">
                                                <h6 class="mb-10">P423 - Akses Tenaga Kesehatan terdekat</h6>
                                                <div class="table-wrapper table-responsive">
                                                    <!-- <table class="table striped-table">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <h6>Fasilitas</h6>
                                                                </th>
                                                                <th>
                                                                    <h6>Jarak (km)</h6>
                                                                </th>
                                                                <th>
                                                                    <h6>Waktu Tempuh (jam)</h6>
                                                                </th>
                                                                <th>
                                                                    <h6>Kemudahan</h6>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <p>Dokter spesialis</p>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_spesialis_jarak"></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_spesialis_waktu"></td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="tenaga_spesialis_kemudahan">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Mudah</option>
                                                                        <option value="2">Sulit</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <p>Dokter umum</p>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_umum_jarak"></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_umum_waktu"></td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="tenaga_umum_kemudahan">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Mudah</option>
                                                                        <option value="2">Sulit</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <p>Bidan</p>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_bidan_jarak"></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_bidan_waktu"></td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="tenaga_bidan_kemudahan">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Mudah</option>
                                                                        <option value="2">Sulit</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <p>Tenaga kesehatan lain</p>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_kesehatanlain_jarak"></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_kesehatanlain_waktu"></td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="tenaga_kesehatanlain_kemudahan">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Mudah</option>
                                                                        <option value="2">Sulit</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <p>Dukun</p>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_dukun_jarak"></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_dukun_waktu"></td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="tenaga_dukun_kemudahan">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Mudah</option>
                                                                        <option value="2">Sulit</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table> -->
                                                    <table class="table striped-table">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <h6>Fasilitas</h6>
                                                                </th>
                                                                <th>
                                                                    <h6>Jarak (km)</h6>
                                                                </th>
                                                                <th>
                                                                    <h6>Waktu Tempuh (jam)</h6>
                                                                </th>
                                                                <th>
                                                                    <h6>Kemudahan</h6>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <p>Dokter spesialis</p>
                                                                    <input type="hidden"
                                                                        name="tenaga_kesehatan[0][fasilitas]"
                                                                        value="Dokter spesialis">
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_kesehatan[0][jarak]"></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_kesehatan[0][waktu]"></td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="tenaga_kesehatan[0][kemudahan]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Mudah</option>
                                                                        <option value="2">Sulit</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>Dokter umum</p>
                                                                    <input type="hidden"
                                                                        name="tenaga_kesehatan[1][fasilitas]"
                                                                        value="Dokter umum">
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_kesehatan[1][jarak]"></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_kesehatan[1][waktu]"></td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="tenaga_kesehatan[1][kemudahan]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Mudah</option>
                                                                        <option value="2">Sulit</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>Bidan</p>
                                                                    <input type="hidden"
                                                                        name="tenaga_kesehatan[2][fasilitas]"
                                                                        value="Bidan">
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_kesehatan[2][jarak]"></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_kesehatan[2][waktu]"></td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="tenaga_kesehatan[2][kemudahan]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Mudah</option>
                                                                        <option value="2">Sulit</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>Tenaga kesehatan lain</p>
                                                                    <input type="hidden"
                                                                        name="tenaga_kesehatan[3][fasilitas]"
                                                                        value="Tenaga kesehatan lain">
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_kesehatan[3][jarak]"></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_kesehatan[3][waktu]"></td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="tenaga_kesehatan[3][kemudahan]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Mudah</option>
                                                                        <option value="2">Sulit</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>Dukun</p>
                                                                    <input type="hidden"
                                                                        name="tenaga_kesehatan[4][fasilitas]"
                                                                        value="Dukun">
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_kesehatan[4][jarak]"></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="tenaga_kesehatan[4][waktu]"></td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="tenaga_kesehatan[4][kemudahan]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Mudah</option>
                                                                        <option value="2">Sulit</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- P425 -->
                                    <div class="row mb-3">
                                        <div class="ccard-style mb-30">
                                            <h6 class="mb-10">P425 - Pemanfaat / Penerima Program Pemerintah</h6>
                                            <div class="table-wrapper table-responsive">
                                                <table class="table striped-table">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:70%;">Program</th>
                                                            <th style="width:30%;">Pilihan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1. BLT Dana Desa</td>
                                                            <td>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="blt_dana_desa" value="1">
                                                                    <label class="form-check-label">Ya</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="blt_dana_desa" value="0">
                                                                    <label class="form-check-label">Tidak</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2. Program Keluarga Harapan (PKH)</td>
                                                            <td>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="pkh" value="1">
                                                                    <label class="form-check-label">Ya</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="pkh" value="0">
                                                                    <label class="form-check-label">Tidak</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3. Bantuan Sosial Tunai (BST)</td>
                                                            <td>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="bst" value="1">
                                                                    <label class="form-check-label">Ya</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="bst" value="0">
                                                                    <label class="form-check-label">Tidak</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4. Bantuan Presiden (Banpres)</td>
                                                            <td>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="banpres" value="1">
                                                                    <label class="form-check-label">Ya</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="banpres" value="0">
                                                                    <label class="form-check-label">Tidak</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>5. Bantuan UMKM</td>
                                                            <td>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="bantuan_umkm" value="1">
                                                                    <label class="form-check-label">Ya</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="bantuan_umkm" value="0">
                                                                    <label class="form-check-label">Tidak</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>6. Bantuan untuk pekerja</td>
                                                            <td>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="bantuan_pekerja" value="1">
                                                                    <label class="form-check-label">Ya</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="bantuan_pekerja" value="0">
                                                                    <label class="form-check-label">Tidak</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>7. Bantuan pendidikan anak</td>
                                                            <td>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="bantuan_pendidikan" value="1">
                                                                    <label class="form-check-label">Ya</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="bantuan_pendidikan" value="2">
                                                                    <label class="form-check-label">Tidak</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>8. Lainnya</td>
                                                            <td>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="lainnya" value="1">
                                                                    <label class="form-check-label">Ya</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="lainnya" value="0">
                                                                    <label class="form-check-label">Tidak</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- akses  -->
                                </div>
                            </div>
                            <!-- lanjutkan untuk P404 - P414 dengan select/option sesuai daftar pilihan -->








                            <!-- form create -->





                            <!-- <div id="modalContent">
                    <div class="text-center py-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Memuat form...</p>
                    </div>
                </div> -->
                        </div>

                        <div class="tab-pane fade" id="individu" role="tabpanel" aria-labelledby="individu-tab">
                            <!-- individu -->
                            <div class="col-md-12">
                                <div class="card-style mb-10" style="min-height: 300px">
                                    <!-- P101 - P116 DATA PRIBADI -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control mb-3" id="nomor_kk" name="nomor_kk"
                                                placeholder="P101. Nomor Kartu Keluarga">
                                        </div>
                                        <div class="col-md-4">
                                            <!-- <input type="text" class="form-control mb-3" id="nik" name="nik"
                                                placeholder="P102. NIK"> -->
                                            <input type="text" class="form-control mb-3" id="nik" name="nik"
                                                placeholder="P102. NIK" pattern="\d{16}"
                                                title="NIK harus 16 digit angka" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control mb-3" id="nama" name="nama"
                                                placeholder="P103. Nama">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <select class="form-control mb-3" id="jenis_kelamin" name="jenis_kelamin">
                                                <option value="">P104. Jenis Kelamin</option>
                                                <option value="1">Laki-laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control mb-3" id="tempat_lahir"
                                                name="tempat_lahir" placeholder="P105. Tempat Lahir">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control mb-3" id="tanggal_lahir"
                                                name="tanggal_lahir" placeholder="P106. Tanggal Lahir">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <select class="form-control mb-3" id="status_pernikahan"
                                                name="status_pernikahan">
                                                <option value="">P107. Status Pernikahan</option>
                                                <option value="1">Kawin</option>
                                                <option value="2">Tidak Kawin</option>
                                                <option value="3">Duda/Janda</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control mb-3" id="agama" name="agama">
                                                <option value="">P108. Agama</option>
                                                <option value="1">Islam</option>
                                                <option value="2">Kristen</option>
                                                <option value="3">Katolik</option>
                                                <option value="4">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control mb-3" id="suku_bangsa"
                                                name="suku_bangsa" placeholder="P109. Suku Bangsa">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <select class="form-control mb-3" id="warga_negara" name="warga_negara">
                                                <option value="">P110. Warganegara</option>
                                                <option value="1">WNI</option>
                                                <option value="2">WNA</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control mb-3" id="no_hp" name="no_hp"
                                                placeholder="P111. Nomor HP">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control mb-3" id="nomor_whatsapp"
                                                name="nomor_whatsapp" placeholder="P112. Nomor Whatsapp">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="email" class="form-control mb-3" id="email" name="email"
                                                placeholder="P113. Email Pribadi">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control mb-3" id="facebook" name="facebook"
                                                placeholder="P114. Facebook Pribadi">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control mb-3" id="twitter" name="twitter"
                                                placeholder="P115. Twitter Pribadi">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control mb-3" id="instagram" name="instagram"
                                                placeholder="P116. Instagram Pribadi">
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!-- individu -->
                        </div>

                        <div class="tab-pane fade" id="pekerjaan" role="tabpanel" aria-labelledby="pekerjaan-tab">
                            <div class="col-md-12">
                                <div class="card-style mb-10" style="min-height: 200px">
                                    <!-- P201 - P203 PEKERJAAN -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select class="form-control mb-3" id="kondisi_pekerjaan"
                                                name="kondisi_pekerjaan">
                                                <option value="">P201. Kondisi Pekerjaan</option>
                                                <option value="1">Bersekolah</option>
                                                <option value="2">Ibu rumah tangga</option>
                                                <option value="3">Tidak bekerja</option>
                                                <option value="4">Sedang mencari pekerjaan</option>
                                                <option value="5">Bekerja</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control mb-3" id="pekerjaan_utama"
                                                name="pekerjaan_utama">
                                                <option value="">P202. Pekerjaan Utama</option>
                                                <option value="1">Petani pemilik lahan</option>
                                                <option value="2">Petani penyewa</option>
                                                <option value="3">Buruh tani</option>
                                                <option value="4">Nelayan pemilik kapal/perahu</option>
                                                <option value="5">Nelayan penyewa kapal/perahu</option>
                                                <option value="6">Buruh nelayan</option>
                                                <option value="7">Guru</option>
                                                <option value="8">Guru agama</option>
                                                <option value="9">Pedagang</option>
                                                <option value="10">Pengolahan/industri</option>
                                                <option value="11">PNS</option>
                                                <option value="12">TNI</option>
                                                <option value="13">Perangkat desa</option>
                                                <option value="14">Pegawai kantor desa</option>
                                                <option value="15">TKI</option>
                                                <option value="16">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <select class="form-control mb-3" id="jaminan_sosial_ketenagakerjaan"
                                                name="jaminan_sosial_ketenagakerjaan">
                                                <option value="">P203. Jaminan Sosial Ketenagakerjaan</option>
                                                <option value="1">Peserta</option>
                                                <option value="2">Bukan Peserta</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control mb-3" id="penghasilan_setahun"
                                                name="penghasilan_setahun"
                                                placeholder="Penghasilan setahun terakhir dari (Rp):">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- P424 -->
                                        <div class="col-md-12">
                                            <div class="card-style mb-30">
                                                <h6 class="mb-10">P424 - Sumber Penghasilan Utama</h6>
                                                <div class="table-wrapper table-responsive">
                                                    <table class="table striped-table">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <h6>No</h6>
                                                                </th>
                                                                <th>
                                                                    <h6>Sumber Penghasilan</h6>
                                                                </th>
                                                                <th>
                                                                    <h6>Volume</h6>
                                                                </th>
                                                                <th>
                                                                    <h6>Penghasilan Setahun (Rp)</h6>
                                                                </th>
                                                                <th>
                                                                    <h6>Diekspor</h6>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h6>Jumlah</h6>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <h6>Satuan</h6>
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <th></th>
                                                                <th>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <p>1</p>
                                                                </td>
                                                                <td>
                                                                    <p>Padi</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[1][jenis_penghasilan]"
                                                                        value="1">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[1][nama]" value="Padi">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input type="number" class="form-control"
                                                                                name="sumber_penghasilan[1][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="ton" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[1][satuan]"
                                                                                value="ton">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <input type="number" class="form-control"
                                                                        name="sumber_penghasilan[1][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[1][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>2</p>
                                                                </td>
                                                                <td>
                                                                    <p>Palawija (jagung, kacang, ubi, dll)</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[2][jenis_penghasilan]"
                                                                        value="2">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[2][nama]"
                                                                        value="Palawija">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input type="number" class="form-control"
                                                                                name="sumber_penghasilan[2][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="ton" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[2][satuan]"
                                                                                value="ton">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <input type="number" class="form-control"
                                                                        name="sumber_penghasilan[2][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[2][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>3</p>
                                                                </td>
                                                                <td>
                                                                    <p>Hortikultura (buah, sayur, tanaman hias, obat,
                                                                        dll)</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[3][jenis_penghasilan]"
                                                                        value="3">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[3][nama]"
                                                                        value="Hortikultura">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input type="number" class="form-control"
                                                                                name="sumber_penghasilan[3][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="kg" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[3][satuan]"
                                                                                value="kg">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <input type="number" class="form-control"
                                                                        name="sumber_penghasilan[3][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[3][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <p>4</p>
                                                                </td>
                                                                <td>
                                                                    <p>Karet</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[4][jenis_penghasilan]"
                                                                        value="4">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[4][nama]"
                                                                        value="Karet">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input type="number" class="form-control"
                                                                                name="sumber_penghasilan[4][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="ton" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[4][satuan]"
                                                                                value="ton">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[4][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[4][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>5</p>
                                                                </td>
                                                                <td>
                                                                    <p>Kelapa sawit</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[5][jenis_penghasilan]"
                                                                        value="5">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[5][nama]"
                                                                        value="Kelapa sawit">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input type="number" class="form-control"
                                                                                name="sumber_penghasilan[5][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="ton" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[5][satuan]"
                                                                                value="ton">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[5][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[5][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>6</p>
                                                                </td>
                                                                <td>
                                                                    <p>Kopi</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[6][jenis_penghasilan]"
                                                                        value="6">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[6][nama]" value="Kopi">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input type="number" class="form-control"
                                                                                name="sumber_penghasilan[6][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="kg" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[6][satuan]"
                                                                                value="kg">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[6][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[6][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>7</p>
                                                                </td>
                                                                <td>
                                                                    <p>Kakao</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[7][jenis_penghasilan]"
                                                                        value="7">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[7][nama]"
                                                                        value="Kakao">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input type="number" class="form-control"
                                                                                name="sumber_penghasilan[7][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="ton" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[7][satuan]"
                                                                                value="ton">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[7][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[7][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>8</p>
                                                                </td>
                                                                <td>
                                                                    <p>Kelapa</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[8][jenis_penghasilan]"
                                                                        value="8">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[8][nama]"
                                                                        value="Kelapa">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input type="number" class="form-control"
                                                                                name="sumber_penghasilan[8][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="ton" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[8][satuan]"
                                                                                value="ton">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[8][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[8][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>9</p>
                                                                </td>
                                                                <td>
                                                                    <p>Lada</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[9][jenis_penghasilan]"
                                                                        value="9">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[9][nama]" value="Lada">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input type="number" class="form-control"
                                                                                name="sumber_penghasilan[9][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="kg" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[9][satuan]"
                                                                                value="kg">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[9][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[9][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>10</p>
                                                                </td>
                                                                <td>
                                                                    <p>Cengkeh</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[10][jenis_penghasilan]"
                                                                        value="10">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[10][nama]"
                                                                        value="Cengkeh">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input type="number" class="form-control"
                                                                                name="sumber_penghasilan[10][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="kg" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[10][satuan]"
                                                                                value="kg">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[10][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[10][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>11</p>
                                                                </td>
                                                                <td>
                                                                    <p>Tembakau</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[11][jenis_penghasilan]"
                                                                        value="11">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[11][nama]"
                                                                        value="Tembakau">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input type="number" class="form-control"
                                                                                name="sumber_penghasilan[11][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="ton" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[11][satuan]"
                                                                                value="ton">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[11][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[11][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>12</p>
                                                                </td>
                                                                <td>
                                                                    <p>Tebu</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[12][jenis_penghasilan]"
                                                                        value="12">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[12][nama]"
                                                                        value="Tebu">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input type="number" class="form-control"
                                                                                name="sumber_penghasilan[12][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="kg" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[12][satuan]"
                                                                                value="kg">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[12][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[12][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>13</p>
                                                                </td>
                                                                <td>
                                                                    <p>Sapi potong</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[13][jenis_penghasilan]"
                                                                        value="13">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[13][nama]"
                                                                        value="Sapi potong">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input type="number" class="form-control"
                                                                                name="sumber_penghasilan[13][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="kg" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[13][satuan]"
                                                                                value="kg">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[13][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[13][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>14</p>
                                                                </td>
                                                                <td>
                                                                    <p>Susu sapi</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[14][jenis_penghasilan]"
                                                                        value="14">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[14][nama]"
                                                                        value="Susu sapi">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input type="number" class="form-control"
                                                                                name="sumber_penghasilan[14][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="m³" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[14][satuan]"
                                                                                value="m³">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[14][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[14][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>15</p>
                                                                </td>
                                                                <td>
                                                                    <p>Domba</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[15][jenis_penghasilan]"
                                                                        value="15">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[15][nama]"
                                                                        value="Domba">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input type="number" class="form-control"
                                                                                name="sumber_penghasilan[15][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="kg" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[15][satuan]"
                                                                                value="kg">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[15][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[15][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>16</p>
                                                                </td>
                                                                <td>
                                                                    <p>Ternak besar lainnya (kuda, kerbau, dll)</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[16][jenis_penghasilan]"
                                                                        value="16">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[16][nama]"
                                                                        value="Ternak besar lainnya (kuda, kerbau, dll)">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[16][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="ekor" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[16][satuan]"
                                                                                value="ekor">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[16][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[16][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>17</p>
                                                                </td>
                                                                <td>
                                                                    <p>Ayam pedaging</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[17][jenis_penghasilan]"
                                                                        value="17">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[17][nama]"
                                                                        value="Ayam pedaging">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[17][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="ekor" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[17][satuan]"
                                                                                value="ekor">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[17][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[17][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>18</p>
                                                                </td>
                                                                <td>
                                                                    <p>Telur ayam</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[18][jenis_penghasilan]"
                                                                        value="18">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[18][nama]"
                                                                        value="Telur ayam">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[18][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="butir" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[18][satuan]"
                                                                                value="butir">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[18][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[18][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>19</p>
                                                                </td>
                                                                <td>
                                                                    <p>Ternak kecil lainnya (bebek, burung, dll)</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[19][jenis_penghasilan]"
                                                                        value="19">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[19][nama]"
                                                                        value="Ternak kecil lainnya (bebek, burung, dll)">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[19][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="ekor" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[19][satuan]"
                                                                                value="ekor">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[19][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[19][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>20</p>
                                                                </td>
                                                                <td>
                                                                    <p>Perikanan tangkap (termasuk biota lainnya)</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[20][jenis_penghasilan]"
                                                                        value="20">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[20][nama]"
                                                                        value="Perikanan tangkap (termasuk biota lainnya)">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[20][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="kg" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[20][satuan]"
                                                                                value="kg">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[20][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[20][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>21</p>
                                                                </td>
                                                                <td>
                                                                    <p>Perikanan budidaya (termasuk biota lainnya)</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[21][jenis_penghasilan]"
                                                                        value="21">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[21][nama]"
                                                                        value="Perikanan budidaya (termasuk biota lainnya)">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[21][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="kg" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[21][satuan]"
                                                                                value="kg">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[21][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[21][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>22</p>
                                                                </td>
                                                                <td>
                                                                    <p>Bambu</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[22][jenis_penghasilan]"
                                                                        value="22">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[22][nama]"
                                                                        value="Bambu">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[22][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="batang" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[22][satuan]"
                                                                                value="batang">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[22][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[22][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>23</p>
                                                                </td>
                                                                <td>
                                                                    <p>Budidaya tanaman kehutanan (jati, mahoni, sengon,
                                                                        dll)</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[23][jenis_penghasilan]"
                                                                        value="23">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[23][nama]"
                                                                        value="Budidaya tanaman kehutanan (jati, mahoni, sengon, dll)">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[23][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="batang" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[23][satuan]"
                                                                                value="batang">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[23][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[23][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>24</p>
                                                                </td>
                                                                <td>
                                                                    <p>Pemungutan hasil hutan (madu, gaharu,
                                                                        buah-buahan, kayu bakar, rotan, dll)</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[24][jenis_penghasilan]"
                                                                        value="24">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[24][nama]"
                                                                        value="Pemungutan hasil hutan (madu, gaharu, buah-buahan, kayu bakar, rotan, dll)">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[24][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="kg" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[24][satuan]"
                                                                                value="kg">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[24][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[24][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>25</p>
                                                                </td>
                                                                <td>
                                                                    <p>Penangkapan satwa liar (babi, ayam hutan, kijang,
                                                                        dll)</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[25][jenis_penghasilan]"
                                                                        value="25">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[25][nama]"
                                                                        value="Penangkapan satwa liar (babi, ayam hutan, kijang, dll)">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[25][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="ekor" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[25][satuan]"
                                                                                value="ekor">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[25][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[25][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>26</p>
                                                                </td>
                                                                <td>
                                                                    <p>Penangkaran satwa liar (arwana, buaya, dll)</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[26][jenis_penghasilan]"
                                                                        value="26">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[26][nama]"
                                                                        value="Penangkaran satwa liar (arwana, buaya, dll)">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[26][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="ekor" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[26][satuan]"
                                                                                value="ekor">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[26][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[26][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>27</p>
                                                                </td>
                                                                <td>
                                                                    <p>Jasa pertanian (sewa traktor, penggilingan, dll)
                                                                    </p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[27][jenis_penghasilan]"
                                                                        value="27">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[27][nama]"
                                                                        value="Jasa pertanian (sewa traktor, penggilingan, dll)">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[27][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="unit" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[27][satuan]"
                                                                                value="unit">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[27][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[27][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>28</p>
                                                                </td>
                                                                <td>
                                                                    <p>Pertambangan dan penggalian</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[28][jenis_penghasilan]"
                                                                        value="28">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[28][nama]"
                                                                        value="Pertambangan dan penggalian">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[28][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="ton" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[28][satuan]"
                                                                                value="ton">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[28][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[28][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>29</p>
                                                                </td>
                                                                <td>
                                                                    <p>Industri kerajinan</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[29][jenis_penghasilan]"
                                                                        value="29">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[29][nama]"
                                                                        value="Industri kerajinan">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[29][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="unit" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[29][satuan]"
                                                                                value="unit">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[29][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[29][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>30</p>
                                                                </td>
                                                                <td>
                                                                    <p>Industri pengolahan</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[30][jenis_penghasilan]"
                                                                        value="30">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[30][nama]"
                                                                        value="Industri pengolahan">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[30][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="unit" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[30][satuan]"
                                                                                value="unit">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[30][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[30][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>31</p>
                                                                </td>
                                                                <td>
                                                                    <p>Perdagangan</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[31][jenis_penghasilan]"
                                                                        value="31">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[31][nama]"
                                                                        value="Perdagangan">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[31][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="unit" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[31][satuan]"
                                                                                value="unit">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[31][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[31][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>32</p>
                                                                </td>
                                                                <td>
                                                                    <p>Warung dan rumah makan</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[32][jenis_penghasilan]"
                                                                        value="32">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[32][nama]"
                                                                        value="Warung dan rumah makan">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[32][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="unit" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[32][satuan]"
                                                                                value="unit">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[32][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[32][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>33</p>
                                                                </td>
                                                                <td>
                                                                    <p>Angkutan</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[33][jenis_penghasilan]"
                                                                        value="33">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[33][nama]"
                                                                        value="Angkutan">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[33][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="unit" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[33][satuan]"
                                                                                value="unit">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[33][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[33][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>34</p>
                                                                </td>
                                                                <td>
                                                                    <p>Pergudangan</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[34][jenis_penghasilan]"
                                                                        value="34">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[34][nama]"
                                                                        value="Pergudangan">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[34][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="unit" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[34][satuan]"
                                                                                value="unit">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[34][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[34][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>35</p>
                                                                </td>
                                                                <td>
                                                                    <p>Komunikasi</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[35][jenis_penghasilan]"
                                                                        value="35">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[35][nama]"
                                                                        value="Komunikasi">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[35][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="unit" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[35][satuan]"
                                                                                value="unit">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[35][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[35][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>36</p>
                                                                </td>
                                                                <td>
                                                                    <p>Jasa di luar pertanian</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[36][jenis_penghasilan]"
                                                                        value="36">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[36][nama]"
                                                                        value="Jasa di luar pertanian">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[36][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="unit" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[36][satuan]"
                                                                                value="unit">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[36][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[36][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>37</p>
                                                                </td>
                                                                <td>
                                                                    <p>Lainnya</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[37][jenis_penghasilan]"
                                                                        value="37">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[37][nama]"
                                                                        value="Lainnya">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[37][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="unit" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[37][satuan]"
                                                                                value="unit">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[37][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[37][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>38</p>
                                                                </td>
                                                                <td>
                                                                    <p>Karyawan tetap</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[38][jenis_penghasilan]"
                                                                        value="38">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[38][nama]"
                                                                        value="Karyawan tetap">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[38][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="orang" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[38][satuan]"
                                                                                value="orang">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[38][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[38][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>39</p>
                                                                </td>
                                                                <td>
                                                                    <p>Karyawan tidak tetap</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[39][jenis_penghasilan]"
                                                                        value="39">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[39][nama]"
                                                                        value="Karyawan tidak tetap">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[39][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="orang" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[39][satuan]"
                                                                                value="orang">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[39][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[39][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>40</p>
                                                                </td>
                                                                <td>
                                                                    <p>TNI</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[40][jenis_penghasilan]"
                                                                        value="40">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[40][nama]" value="TNI">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[40][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="orang" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[40][satuan]"
                                                                                value="orang">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[40][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[40][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>41</p>
                                                                </td>
                                                                <td>
                                                                    <p>PNS</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[41][jenis_penghasilan]"
                                                                        value="41">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[41][nama]" value="PNS">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[41][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="orang" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[41][satuan]"
                                                                                value="orang">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[41][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[41][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>42</p>
                                                                </td>
                                                                <td>
                                                                    <p>TKI di luar negeri</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[42][jenis_penghasilan]"
                                                                        value="42">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[42][nama]"
                                                                        value="TKI di luar negeri">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[42][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="orang" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[42][satuan]"
                                                                                value="orang">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[42][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[42][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>43</p>
                                                                </td>
                                                                <td>
                                                                    <p>Sumbangan (dari keluarga, dari pemerintah)</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[43][jenis_penghasilan]"
                                                                        value="43">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[43][nama]"
                                                                        value="Sumbangan (dari keluarga, dari pemerintah)">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[43][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="Rp" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[43][satuan]"
                                                                                value="Rp">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[43][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[43][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <p>44</p>
                                                                </td>
                                                                <td>
                                                                    <p>Lainnya</p>
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[44][jenis_penghasilan]"
                                                                        value="44">
                                                                    <input type="hidden"
                                                                        name="sumber_penghasilan[44][nama]"
                                                                        value="Lainnya">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-6"><input type="number"
                                                                                class="form-control"
                                                                                name="sumber_penghasilan[44][volume]">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                value="unit" readonly>
                                                                            <input type="hidden"
                                                                                name="sumber_penghasilan[44][satuan]"
                                                                                value="unit">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" class="form-control"
                                                                        name="sumber_penghasilan[44][penghasilan_setahun]">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="sumber_penghasilan[44][ekspor]">
                                                                        <option value="">-- pilih --</option>
                                                                        <option value="1">Semua</option>
                                                                        <option value="2">Sebagian besar</option>
                                                                        <option value="3">Tidak</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="tab-pane fade" id="kesehatan" role="tabpanel" aria-labelledby="kesehatan-tab">

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="card-style mb-30">
                                        <h6 class="mb-10">P401 - Penyakit yang diderita setahun terakhir</h6>
                                        <div class="table-wrapper table-responsive">
                                            <table class="table striped-table">
                                                <thead>
                                                    <tr>
                                                        <th style="width:70%;">Penyakit</th>
                                                        <th style="width:30%;">Pilihan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1. Muntaber / diare</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_muntaber" value="1">
                                                                <label class="form-check-label">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_muntaber" value="0">
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2. Demam berdarah</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_dbd" value="1">
                                                                <label class="form-check-label">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_dbd" value="0">
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3. Campak</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_campak" value="1">
                                                                <label class="form-check-label">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_campak" value="0">
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4. Malaria</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_malaria" value="1">
                                                                <label class="form-check-label">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_malaria" value="0">
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>5. Flu burung / SARS</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_sars" value="1">
                                                                <label class="form-check-label">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_sars" value="0">
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>6. Covid-19</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_covid" value="1">
                                                                <label class="form-check-label">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_covid" value="0">
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>7. Hepatitis B</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_hepb" value="1">
                                                                <label class="form-check-label">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_hepb" value="0">
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>8. Hepatitis E</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_hepe" value="1">
                                                                <label class="form-check-label">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_hepe" value="0">
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>9. Difteri</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_difteri" value="1">
                                                                <label class="form-check-label">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_difteri" value="0">
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>10. Chikungunya</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_chikungunya" value="1">
                                                                <label class="form-check-label">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_chikungunya" value="0">
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>11. Leptospirosis</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_lepto" value="1">
                                                                <label class="form-check-label">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_lepto" value="0">
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>12. Kolera</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_kolera" value="1">
                                                                <label class="form-check-label">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_kolera" value="0">
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>13. Gizi buruk (marasmus/kwasiorkor)</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_gizi" value="1">
                                                                <label class="form-check-label">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_gizi" value="0">
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>14. Jantung</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_jantung" value="1">
                                                                <label class="form-check-label">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_jantung" value="0">
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>15. TBC paru-paru</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_tbc" value="1">
                                                                <label class="form-check-label">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_tbc" value="0">
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>16. Kanker</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_kanker" value="1">
                                                                <label class="form-check-label">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_kanker" value="0">
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>17. Diabetes / kencing manis</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_diabetes" value="1">
                                                                <label class="form-check-label">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_diabetes" value="0">
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>18. Lumpuh</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_lumpuh" value="1">
                                                                <label class="form-check-label">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_lumpuh" value="0">
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>19. Lainnya</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_lainnya" value="1">
                                                                <label class="form-check-label">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="p401_lainnya" value="0">
                                                                <label class="form-check-label">Tidak</label>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <!-- lanjutkan sampai 19 penyakit -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card-style mb-30">
                                        <h6 class="mb-10">P402 - Kunjungan Fasilitas Kesehatan (setahun terakhir)</h6>
                                        <div class="table-wrapper table-responsive">
                                            <table class="table striped-table">
                                                <thead>
                                                    <tr>
                                                        <th style="width:70%;">Fasilitas</th>
                                                        <th style="width:30%;">Jumlah Kunjungan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1. Rumah sakit</td>
                                                        <td><input type="number" class="form-control" name="p402_rs">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2. Rumah sakit bersalin</td>
                                                        <td><input type="number" class="form-control" name="p402_rsb">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3. Puskesmas dengan rawat inap</td>
                                                        <td><input type="number" class="form-control"
                                                                name="p402_puskesmas_inap"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>4. Puskesmas tanpa rawat inap</td>
                                                        <td><input type="number" class="form-control"
                                                                name="p402_puskesmas_noninap"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>5. Puskesmas pembantu</td>
                                                        <td><input type="number" class="form-control" name="p402_pustu">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>6. Poliklinik / balai pengobatan</td>
                                                        <td><input type="number" class="form-control"
                                                                name="p402_poliklinik"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>7. Tempat praktik dokter</td>
                                                        <td><input type="number" class="form-control"
                                                                name="p402_praktik_dokter"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>8. Rumah bersalin</td>
                                                        <td><input type="number" class="form-control"
                                                                name="p402_rumah_bersalin"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>9. Tempat praktik bidan</td>
                                                        <td><input type="number" class="form-control"
                                                                name="p402_praktik_bidan"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>10. Poskesdes</td>
                                                        <td><input type="number" class="form-control"
                                                                name="p402_poskesdes"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>11. Polindes</td>
                                                        <td><input type="number" class="form-control"
                                                                name="p402_polindes"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>12. Apotik</td>
                                                        <td><input type="number" class="form-control"
                                                                name="p402_apotik"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>13. Toko khusus obat / jamu</td>
                                                        <td><input type="number" class="form-control"
                                                                name="p402_toko_obat"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>14. Posyandu</td>
                                                        <td><input type="number" class="form-control"
                                                                name="p402_posyandu"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>15. Posbindu</td>
                                                        <td><input type="number" class="form-control"
                                                                name="p402_posbindu"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>16. Tempat praktik dukun bayi / bersalin / paraji</td>
                                                        <td><input type="number" class="form-control" name="p402_dukun">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="card-style mb-30">
                                    <h6 class="mb-10">P403 - Jaminan Sosial Kesehatan & Disabilitas</h6>
                                    <div class="table-wrapper table-responsive">
                                        <table class="table striped-table">
                                            <thead>
                                                <tr>
                                                    <th style="width:70%;">Kategori</th>
                                                    <th style="width:30%;">Pilihan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Jaminan Sosial Kesehatan -->
                                                <tr>
                                                    <td>Jaminan sosial kesehatan</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_jamsoskes" value="1">
                                                            <label class="form-check-label">Peserta</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_jamsoskes" value="0">
                                                            <label class="form-check-label">Bukan Peserta</label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Disabilitas -->
                                                <tr>
                                                    <td>1. Tunanetra (buta)</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_tunanetra" value="1">
                                                            <label class="form-check-label">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_tunanetra" value="0">
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2. Tunarungu (tuli)</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_tunarungu" value="1">
                                                            <label class="form-check-label">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_tunarungu" value="0">
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3. Tunawicara (bisu)</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_tunawicara" value="1">
                                                            <label class="form-check-label">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_tunawicara" value="0">
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4. Tunarungu–wicara (tuli–bisu)</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_tuli_bisu" value="1">
                                                            <label class="form-check-label">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_tuli_bisu" value="0">
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5. Tunadaksa (cacat tubuh)</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_tunadaksa" value="1">
                                                            <label class="form-check-label">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_tunadaksa" value="0">
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6. Tunagrahita (cacat mental, keterbelakangan mental)</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_tunagrahita" value="1">
                                                            <label class="form-check-label">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_tunagrahita" value="0">
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>7. Tunalaras (eks–sakit jiwa, gangguan emosi & sosial)</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_tunalaras" value="1">
                                                            <label class="form-check-label">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_tunalaras" value="0">
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>8. Cacat eks–sakit kusta (sudah sembuh dokter)</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_kusta" value="1">
                                                            <label class="form-check-label">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_kusta" value="0">
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>9. Cacat ganda (fisik & mental)</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_cacat_ganda" value="1">
                                                            <label class="form-check-label">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_cacat_ganda" value="0">
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>10. Dipasung</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_dipasung" value="1">
                                                            <label class="form-check-label">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="p403_dipasung" value="0">
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>




                        </div>


                        <div class="tab-pane fade" id="pendidikan" role="tabpanel" aria-labelledby="pendidikan-tab">
                            <div class="row mb-3">
                                <div class="card-style mb-30">
                                    <h6 class="mb-10">P501 - Pendidikan Tertinggi yang Ditamatkan</h6>
                                    <div class="table-wrapper table-responsive">
                                        <table class="table striped-table">
                                            <thead>
                                                <tr>
                                                    <th style="width:70%;">Tingkat Pendidikan</th>
                                                    <th style="width:30%;">Pilihan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1. Tidak sekolah</td>
                                                    <td><input type="radio" name="p501_pendidikan" value="1"></td>
                                                </tr>
                                                <tr>
                                                    <td>2. SD dan sederajat</td>
                                                    <td><input type="radio" name="p501_pendidikan" value="2"></td>
                                                </tr>
                                                <tr>
                                                    <td>3. SMP dan sederajat</td>
                                                    <td><input type="radio" name="p501_pendidikan" value="3"></td>
                                                </tr>
                                                <tr>
                                                    <td>4. SMA dan sederajat</td>
                                                    <td><input type="radio" name="p501_pendidikan" value="4"></td>
                                                </tr>
                                                <tr>
                                                    <td>5. Diploma 1-3</td>
                                                    <td><input type="radio" name="p501_pendidikan" value="5"></td>
                                                </tr>
                                                <tr>
                                                    <td>6. S1 dan sederajat</td>
                                                    <td><input type="radio" name="p501_pendidikan" value="6"></td>
                                                </tr>
                                                <tr>
                                                    <td>7. S2 dan sederajat</td>
                                                    <td><input type="radio" name="p501_pendidikan" value="7"></td>
                                                </tr>
                                                <tr>
                                                    <td>8. S3 dan sederajat</td>
                                                    <td><input type="radio" name="p501_pendidikan" value="8"></td>
                                                </tr>
                                                <tr>
                                                    <td>9. Pesantren, seminari, wihara dan sejenisnya</td>
                                                    <td><input type="radio" name="p501_pendidikan" value="9"></td>
                                                </tr>
                                                <tr>
                                                    <td>10. Lainnya</td>
                                                    <td><input type="radio" name="p501_pendidikan" value="10"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="card-style mb-30">
                                    <h6 class="mb-10">P502 - Bahasa digunakan di rumah dan permukiman</h6>
                                    <input type="text" class="form-control" name="p502_bahasa_rumah"
                                        placeholder="Tuliskan bahasa...">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="card-style mb-30">
                                    <h6 class="mb-10">P503 - Bahasa digunakan di lembaga formal (sekolah, tempat kerja)
                                    </h6>
                                    <input type="text" class="form-control" name="p503_bahasa_formal"
                                        placeholder="Tuliskan bahasa...">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="card-style mb-30">
                                    <h6 class="mb-10">P504 - Kerja bakti setahun terakhir</h6>
                                    <input type="number" class="form-control" name="p504_kerjabakti"
                                        placeholder="Jumlah kegiatan">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="card-style mb-30">
                                    <h6 class="mb-10">P505 - Siskamling setahun terakhir</h6>
                                    <input type="number" class="form-control" name="p505_siskamling"
                                        placeholder="Jumlah kegiatan">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="card-style mb-30">
                                    <h6 class="mb-10">P506 - Pesta rakyat/adat setahun terakhir</h6>
                                    <input type="number" class="form-control" name="p506_pesta"
                                        placeholder="Jumlah kegiatan">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="card-style mb-30">
                                    <h6 class="mb-10">P507 - Menolong warga yang mengalami kematian keluarga</h6>
                                    <input type="number" class="form-control" name="p507_kematian"
                                        placeholder="Jumlah kegiatan">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="card-style mb-30">
                                    <h6 class="mb-10">P508 - Menolong warga yang sedang sakit</h6>
                                    <input type="number" class="form-control" name="p508_sakit"
                                        placeholder="Jumlah kegiatan">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="card-style mb-30">
                                    <h6 class="mb-10">P509 - Menolong warga yang kecelakaan</h6>
                                    <input type="number" class="form-control" name="p509_kecelakaan"
                                        placeholder="Jumlah kegiatan">
                                </div>
                            </div>

                        </div>

                        <button type="submit" id="saveSDGS" class="btn btn-primary mt-3">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Edit -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Data Kuesioner</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form edit akan dimuat via AJAX -->
                            <div id="editModalContent">
                                <div class="text-center py-4">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <p class="mt-2">Memuat form
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
<?= $this->endSection(); ?>



<?= $this->section('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
$('#enumeratorSelect').on('select2:open', function() {
    // Fokus paksa ke input search ketika dropdown terbuka
    let searchField = document.querySelector('.select2-search__field');
    if (searchField) {
        searchField.focus();
    }
});



$(document).ready(function() {

    $('#enumeratorSelect').select2({
        theme: 'bootstrap-5', // cocok dengan Bootstrap 5 (PlainAdmin)
        placeholder: 'Pilih Enumerator',
        dropdownParent: $('#kuesionerModal'), // penting kalau dipakai dalam modal
        allowClear: true,
        ajax: {
            url: "<?= base_url('enumerator/options') ?>", // endpoint CI4
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term
                }; // kirim keyword pencarian
            },
            processResults: function(data) {
                return {
                    results: data
                };
            }
        }
    });



    // Simpan data (sementara alert, nanti diisi AJAX insert)
    $("#saveSDGS").click(function(e) {
        e.preventDefault(); // Pastikan untuk mencegah reload halaman

        let formData = $("#sdgsForm").serialize();
        console.log("Data yang dikirim:", formData);

        $.ajax({
            url: "/survey/simpan", // route CI4
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response.status === "success") {
                    // $("#kuesionerModal").modal("hide");
                    // $("#sdgsForm")[0].reset(); // Pastikan ini adalah id form yang benar
                    // loadEnumerators(1, ""); // reload data
                    alert(response.message);
                } else {
                    // Menampilkan error validasi atau server
                    let errorMessage = "Gagal: " + response.message;

                    // Jika ada error detail
                    if (response.errors) {
                        errorMessage += "\n\nDetail Error:";
                        for (let key in response.errors) {
                            errorMessage += "\n- " + response.errors[key];
                        }
                    }

                    alert(errorMessage);
                }
            },
            error: function(xhr, status, error) {
                console.error("XHR Response:", xhr.responseText);
                console.error("Status:", status);
                console.error("Error:", error);

                let errorMessage = "Terjadi kesalahan AJAX!\n";

                try {
                    // Coba parsing response JSON jika ada
                    const response = JSON.parse(xhr.responseText);
                    if (response.message) {
                        errorMessage += "Pesan: " + response.message;
                    }
                } catch (e) {
                    // Jika bukan JSON, tampilkan response text biasa
                    errorMessage += "Response: " + xhr.responseText;
                }

                alert(errorMessage);
            }
        });
    });


    // Inisialisasi DataTables
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '<?= site_url('kuesioner/getData') ?>',
            type: 'POST'
        },
        columns: [{
                data: 'nomor_kk'
            },
            {
                data: 'enumerator_nama'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `
                        <button class="btn btn-sm btn-primary btn-edit" data-id="${row.id}">Edit</button>
                        <button class="btn btn-sm btn-danger btn-delete" data-id="${row.id}">Hapus</button>
                    `;
                }
            }
        ]
    });

    // Load form tambah ke modal
    $('#kuesionerModal').on('show.bs.modal', function() {
        $('#modalContent').html(`
        <div class="text-center py-4">
            <div class="spinner-border text-primary" role="status">
            </div>
            <p class="mt-2">Memuat form...</p>
        </div>
    `);
    });


    // Load form edit ke modal
    $(document).on('click', '.btn-edit', function() {
        const id = $(this).data('id');
        $('#editModal').modal('show');

        $('#editModalContent').html(`
            <div class="text-center py-4">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <p class="mt-2">Memuat form...</p>
            </div>
        `);

        $.get('<?= site_url('kuesioner/edit/') ?>' + id, function(data) {
            $('#editModalContent').html(data);
        }).fail(function() {
            $('#editModalContent').html(`
                <div class="alert alert-danger">
                    Gagal memuat form edit. Silakan coba lagi.
                </div>
            `);
        });
    });

    // Handle delete
    $(document).on('click', '.btn-delete', function() {
        const id = $(this).data('id');
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            window.location.href = '<?= site_url('kuesioner/delete/') ?>' + id;
        }
    });

    // Handle submit form dalam modal
    $(document).on('submit', '#kuesionerForm', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const url = $(this).attr('action');
        const isEdit = $('#editModal').hasClass('show');

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    // Tutup modal dan refresh table
                    if (isEdit) {
                        $('#editModal').modal('hide');
                    } else {
                        $('#kuesionerModal').modal('hide');
                    }

                    // Tampilkan pesan sukses
                    alert(response.message);

                    // Refresh DataTables
                    $('#dataTable').DataTable().ajax.reload();
                } else {
                    // Tampilkan error
                    alert(response.message || 'Terjadi kesalahan');
                }
            },
            error: function(xhr) {
                alert('Terjadi kesalahan: ' + xhr.responseText);
            }
        });
    });
});
</script>

<?= $this->endSection() ?>