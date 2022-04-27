<?=
$this->extend('layout/template');
?>

<?= $this->section('content'); ?>
<div class="container">
    <h2><?= $judul; ?></h2>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('/unitDetail/' . $unit['unit_id'] . '/' . $unit['segment_id']); ?>" class="text-decoration-none">Detail Ruangan - <?= $unit['code'] ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $job['name'] ?></li>
        </ol>
    </nav>
    <div class="row ms-0 justify-content-start">
        <div class="detail-summary col-6">
            <ul class="list-group list-group-horizontal-md row">
                <li class="list-group-item col-6">
                    <span>Progress Pekerjaan</span>
                </li>
                <li class="list-group-item col-6 d-flex flex-column justify-content-center">
                    <div class="progress gx-0">
                        <div class="progress-bar" role="progressbar" style="width: <?= $job['progress'] ?>%;" aria-valuenow="<?= $job['progress'] ?>" aria-valuemin="0" aria-valuemax="100"><?= $job['progress'] ?>%</div>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-horizontal-md row">
                <li class="list-group-item col-6">
                    <span>Target Penyelesaian</span>
                </li>
                <li class="list-group-item col-6">
                    <span> <?= date('d M Y', strtotime($job['duedate'])) ?></span>
                </li>
            </ul>
            <ul class="list-group list-group-horizontal-md row">
                <li class="list-group-item col-6">
                    <span>Sisa Waktu</span>
                </li>
                <li class="list-group-item col-6">
                    <span class="text-danger"><?= $job['datediff'] ?> Hari</span>
                </li>
            </ul>
            <ul class="list-group list-group-horizontal-md row">
                <li class="list-group-item col-6">
                    <span>Gambar Pekerjaan</span>
                </li>
                <li class="list-group-item col-6">
                    <div class="d-grid gap-2">
                        <button class="btn btn-sm btn-info" type="button" data-bs-toggle="modal" data-bs-target="#modalGambarPekerjaan">Lihat</button>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-horizontal-md row">
                <li class="list-group-item col-6">
                    <span>Metode Pekerjaan</span>
                </li>
                <li class="list-group-item col-6">
                    <div class="d-grid gap-2">
                        <button class="btn btn-sm btn-info" type="button">Lihat</button>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-4">
            <button class="btn btn-sm btn-outline-info" style="width:200px;" data-bs-toggle="modal" data-bs-target="#modalEditJob" data-segmentid="<?= $unit['segment_id'] ?>" data-jobname="<?= $job['name'] ?>" onclick="populate(this, <?= htmlentities(json_encode($job)); ?>); ">Ubah Detail</button>
            <div class="dropdown">
                <button class="btn btn-sm btn-outline-success dropdown-toggle mt-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width: 200px;">
                    <?= $job['name'] ?>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item disabled">Jenis Pekerjaan</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <?php foreach ($jobList as $jobs) : ?>
                        <li>
                            <a class="dropdown-item <?= ($jobs['name'] == $job['name']) ? 'active disabled' : '' ?>" href="<?= base_url('/jobDetail/' . $jobs['job_id'] . '/' . $unit['unit_id']) ?>">
                                <?= $jobs['name'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col">
            <h3>Forum Koordinasi Lapangan</h3>
            <button class="btn btn-sm btn-primary" type="button" style="width: 200px;">Buat Diskusi</button>

            <table class="table table-hover align-middle text-center">
                <thead>
                    <th>Topik Diskusi</th>
                    <th>Dimulai oleh</th>
                    <th>Balasan</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-start">
                            <a href="#">Penyelesaian Pemasangan Bata</a>
                        </td>
                        <td>
                            <div class="topic-author d-flex flex-row align-items-center justify-content-center">
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                                <div class="name-time d-flex flex-column ms-3">
                                    <span>Nama Author</span>
                                    <span>DD-MMM-YYYY</span>
                                </div>
                            </div>
                        </td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td class="text-start">
                            <a href="#">Pemasangan Bata ZZZ</a>
                        </td>
                        <td>
                            <div class="topic-author d-flex flex-row align-items-center justify-content-center">
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                                <div class="name-time d-flex flex-column ms-3">
                                    <span>Nama Author</span>
                                    <span>DD-MMM-YYYY</span>
                                </div>
                            </div>
                        </td>
                        <td>16</td>
                    </tr>
                    <tr>
                        <td class="text-start">
                            <a href="#">Pemasangan Bata YYY</a>
                        </td>
                        <td>
                            <div class="topic-author d-flex flex-row align-items-center justify-content-center">
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                                <div class="name-time d-flex flex-column ms-3">
                                    <span>Nama Author</span>
                                    <span>DD-MMM-YYYY</span>
                                </div>
                            </div>
                        </td>
                        <td>22</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- Modal Gambar Pekerjaan -->
<div class="modal fade" id="modalGambarPekerjaan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalGambarPekerjaanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalGambarPekerjaanLabel">Daftar Gambar Pekerjaan - Pemasangan Bata</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <label for="unggahGambarPekerjaan" class="form-label">Unggah Berkas</label>
                    <div class="input-group">
                        <input type="file" class="form-control" id="unggahGambarPekerjaan" aria-describedby="inputgroupspk" aria-label="Upload" name="GambarPekerjaan">
                        <button class="btn btn-outline-primary" type="submit" id="inputGambarPekerjaan">Unggah</button>
                    </div>
                </form>
                <ul class="list-group my-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="col">Gambar Pemasangan Bata A</span>
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-sm btn-outline-danger me-2" type="button">Hapus</button>
                            <button class="btn btn-sm btn-outline-warning me-0" type="button">Unduh</button>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="col">Gambar Pemasangan Bata B</span>
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-sm btn-outline-danger me-2" type="button">Hapus</button>
                            <button class="btn btn-sm btn-outline-warning me-0" type="button">Unduh</button>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="col">Gambar Pemasangan Bata C</span>
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-sm btn-outline-danger me-2" type="button">Hapus</button>
                            <button class="btn btn-sm btn-outline-warning me-0" type="button">Unduh</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Pekerjaan -->
<div class="modal fade" id="modalEditJob" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditJobLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/editJob') ?>" method="POST" id="editJob" novalidate>
                    <?php csrf_field(); ?>
                    <input type="hidden" class="form-control" name="job_id" value="">
                    <input type="hidden" class="form-control" name="unit_id" value="">
                    <input type="hidden" class="form-control" name="form_id" value="">
                    <input type="hidden" class="form-control" name="segment_id" value="">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Pekerjaan</label>
                        <input type="text" class="form-control" name="name" autocomplete="off" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="progress" class="form-label">Progress Pekerjaan</label>
                        <input type="number" class="form-control" name="progress" value="" min="0" max="100" autocomplete="off" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="duedate" class="form-label">Target Penyelesaian</label>
                        <input type="date" class="form-control" name="duedate" autocomplete="off" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Ubah Detail</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>