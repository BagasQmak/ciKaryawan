<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Absensi</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Absensi</h6>
        </div>

        <div class="card-body">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
            <?php if ($this->session->flashdata('success')) : ?>

            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <!-- <a href="<?php echo base_url('admin/rekapAbsen') ?>" class="text-white"><button class="btn btn-info mb-3"><i class=" fas fa-plus"></i> Tambah Data</button></a> -->

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Pegawai</th>
                            <th>Shift</th>
                            <th>Waktu Datang</th>
                            <th>Waktu Pulang</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($absensi as $absen) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $absen->tgl_absen; ?></td>
                                <td><?= $absen->nama; ?></td>
                                <?php if ($absen->shift == 0) : ?>
                                    <td>Belum ada Shift</td>
                                <?php elseif ($absen->shift == 1) : ?>
                                    <td>Pagi</td>
                                <?php elseif ($absen->shift == 2) : ?>
                                    <td>Siang</td>
                                <?php endif; ?>
                                <td><?= $absen->jam_masuk; ?></td>
                                <td><?= $absen->jam_pulang; ?></td>
                                <?php if ($absen->status_pegawai == 0) : ?>
                                    <td><span class="badge badge-primary">Belum Absen</span></td>
                                <?php elseif ($absen->status_pegawai == 1) : ?>
                                    <td><span class="badge badge-success">Hadir</span></td>
                                <?php elseif ($absen->status_pegawai == 2) : ?>
                                    <td><span class="badge badge-danger">Terlambat</span></td>
                                <?php endif; ?>

                                <?php if ($absen->keterangan_absen == 1) : ?>
                                    <td>Bekerja di Kantor</td>
                                <?php elseif ($absen->keterangan_absen == 2) : ?>
                                    <td>Bekerja di Rumah / WFH</td>
                                <?php elseif ($absen->keterangan_absen == 3) : ?>
                                    <td>Cuti</td>
                                <?php elseif ($absen->keterangan_absen == 4) : ?>
                                    <td>Sakit</td>
                                <?php endif; ?>
                                <td>
                                    <a href="<?= base_url('admin/hapus/' . $absen->kode_absen) ?>" class="btn btn-small text-danger tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->