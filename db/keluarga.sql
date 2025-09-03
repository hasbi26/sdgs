CREATE TABLE enumerator (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    alamat TEXT,
    hp_telepon VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE lokasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    provinsi VARCHAR(100) NOT NULL,
    kabupaten_kota VARCHAR(100) NOT NULL,
    kecamatan VARCHAR(100) NOT NULL,
    desa VARCHAR(100) NOT NULL,
    rt_rw VARCHAR(10),
    nama_responden VARCHAR(255),
    alamat_responden TEXT,
    nomor_hp VARCHAR(20),
    nomor_telepon_rumah VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE keluarga (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomor_kk VARCHAR(20) NOT NULL,
    nik_kepala_keluarga VARCHAR(16) NOT NULL,
    lokasi_id INT,
    enumerator_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (lokasi_id) REFERENCES lokasi(id),
    FOREIGN KEY (enumerator_id) REFERENCES enumerator(id)
);


CREATE TABLE permukiman (
    id INT AUTO_INCREMENT PRIMARY KEY,
    keluarga_id INT NOT NULL,
    -- P401-P420
    tempat_tinggal INT COMMENT '1. Milik sendiri, 2. Kontrak/Sewa, 3. Bebas Sewa, 4. Dipinjami, 5. Dinas, 6. Lainnya',
    status_lahan INT COMMENT '1. Milik sendiri, 2. Milik orang lain, 3. Tanah negara, 4. Lainnya',
    luas_lantai DECIMAL(10,2),
    luas_lahan DECIMAL(10,2),
    jenis_lantai INT COMMENT '1-10 sesuai kuesioner',
    jenis_dinding INT COMMENT '1-3 sesuai kuesioner',
    jendela INT COMMENT '1. Ada berfungsi, 2. Ada tidak berfungsi, 3. Tidak ada',
    atap INT COMMENT '1. Genteng, 2. Kayu/Jerami, 3. Lainnya',
    penerangan INT COMMENT '1-5 sesuai kuesioner',
    energi_masak INT COMMENT '1-4 sesuai kuesioner',
    sumber_kayu_bakar INT COMMENT '1-4 sesuai kuesioner',
    pembuangan_sampah INT COMMENT '1-5 sesuai kuesioner',
    fasilitas_mck INT COMMENT '1-4 sesuai kuesioner',
    sumber_air_mandi INT COMMENT '1-6 sesuai kuesioner',
    fasilitas_bab INT COMMENT '1-4 sesuai kuesioner',
    sumber_air_minum INT COMMENT '1-5 sesuai kuesioner',
    pembuangan_limbah_cair INT COMMENT '1-4 sesuai kuesioner',
    bawah_sutet INT COMMENT '1. Ya, 2. Tidak',
    bantaran_sungai INT COMMENT '1. Ya, 2. Tidak',
    lereng_bukit INT COMMENT '1. Ya, 2. Tidak',
    kondisi_rumah INT COMMENT '1. Kumuh, 2. Tidak kumuh',
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (keluarga_id) REFERENCES keluarga(id)
);

CREATE TABLE akses_pendidikan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    permukiman_id INT NOT NULL,
    fasilitas VARCHAR(100) NOT NULL,
    jarak_km DECIMAL(5,2),
    waktu_tempuh_jam DECIMAL(4,2),
    kemudahan INT COMMENT '1. Mudah, 2. Sulit',
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (permukiman_id) REFERENCES permukiman(id)
);


CREATE TABLE akses_kesehatan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    permukiman_id INT NOT NULL,
    fasilitas VARCHAR(100) NOT NULL,
    jarak_km DECIMAL(5,2),
    waktu_tempuh_jam DECIMAL(4,2),
    kemudahan INT COMMENT '1. Mudah, 2. Sulit',
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (permukiman_id) REFERENCES permukiman(id)
);

CREATE TABLE akses_tenaga_kesehatan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    permukiman_id INT NOT NULL,
    tenaga_kesehatan VARCHAR(100) NOT NULL,
    jarak_km DECIMAL(5,2),
    waktu_tempuh_jam DECIMAL(4,2),
    kemudahan INT COMMENT '1. Mudah, 2. Sulit',
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (permukiman_id) REFERENCES permukiman(id)
);

CREATE TABLE akses_transportasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    permukiman_id INT NOT NULL,
    tujuan VARCHAR(100) NOT NULL,
    jenis_transportasi INT COMMENT '1. Darat, 2. Air, 3. Udara',
    transportasi_umum INT COMMENT '1. Ya, 2. Tidak',
    waktu_tempuh_jam DECIMAL(4,2),
    biaya_perjalanan DECIMAL(12,2),
    kemudahan INT COMMENT '1. Mudah, 2. Sulit',
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (permukiman_id) REFERENCES permukiman(id)
);

CREATE TABLE program_pemerintah (
    id INT AUTO_INCREMENT PRIMARY KEY,
    permukiman_id INT NOT NULL,
    blt_dana_desa INT COMMENT '1. Ya, 2. Tidak',
    pkh INT COMMENT '1. Ya, 2. Tidak',
    bst INT COMMENT '1. Ya, 2. Tidak',
    banpres INT COMMENT '1. Ya, 2. Tidak',
    bantuan_umkm INT COMMENT '1. Ya, 2. Tidak',
    bantuan_pekerja INT COMMENT '1. Ya, 2. Tidak',
    bantuan_pendidikan INT COMMENT '1. Ya, 2. Tidak',
    lainnya INT COMMENT '1. Ya, 2. Tidak',
    keterangan_lainnya TEXT,
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (permukiman_id) REFERENCES permukiman(id)
);

