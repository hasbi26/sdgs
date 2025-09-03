<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Data Kuesioner SDGS</h6>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kuesionerModal">
                <i class="fas fa-plus"></i> Tambah Data
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No. KK</th>
                            <th>Enumerator</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data akan diisi oleh DataTables -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

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
                <div id="modalContent">
                    <div class="text-center py-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Memuat form...</p>
                    </div>
                </div>
            </div>
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

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
$(document).ready(function() {
    // Inisialisasi DataTables
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '<?= site_url('kuesioner/getData') ?>',
            type: 'POST'
        },
        columns: [
            { data: 'nomor_kk' },
            { data: 'enumerator_nama' },
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
$('#kuesionerModal').on('show.bs.modal', function () {
    $('#modalContent').html(`
        <div class="text-center py-4">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <p class="mt-2">Memuat form...</p>
        </div>
    `);

    $.get('<?= site_url('kuesioner/create') ?>', function(response) {
        if (response.fields_enumerators) {
            let formHtml = `<form id="formKuesioner">`;

            response.fields_enumerators.forEach(field => {
                // skip kalau field 'id' atau 'created_at'
                if (field === 'id' || field === 'created_at') return;

                formHtml += `
                    <div class="mb-3">
                        <label for="${field}" class="form-label text-capitalize">${field.replace('_',' ')}</label>
                        <input type="text" class="form-control" id="${field}" name="${field}" placeholder="Masukkan ${field}">
                    </div>
                `;
            });

            formHtml += `
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>`;

            $('#modalContent').html(formHtml);
        } else {
            $('#modalContent').html(`
                <div class="alert alert-warning">
                    Tidak ada field ditemukan.
                </div>
            `);
        }
    }, 'json').fail(function() {
        $('#modalContent').html(`
            <div class="alert alert-danger">
                Gagal memuat form. Silakan refresh halaman dan coba lagi.
            </div>
        `);
    });
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
