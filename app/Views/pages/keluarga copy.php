<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 mt-4 text-gray-800"><?= $title ?></h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kuesioner SDGS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No. KK</th>
                            <th>Desa</th>
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

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '<?= site_url('kuesioner/getData') ?>',
            type: 'POST'
        },
        columns: [
            { data: 'nomor_kk' },
            { data: 'desa' },
            { data: 'enumerator_nama' },
            {
                data: null,
                render: function(data, type, row) {
                    return `
                        <a href="<?= site_url('kuesioner/edit/') ?>${row.id}" class="btn btn-sm btn-primary">Edit</a>
                        <button onclick="confirmDelete(${row.id})" class="btn btn-sm btn-danger">Hapus</button>
                    `;
                }
            }
        ]
    });
});

function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        window.location.href = '<?= site_url('kuesioner/delete/') ?>' + id;
    }
}
</script>



<?= $this->endSection() ?>
