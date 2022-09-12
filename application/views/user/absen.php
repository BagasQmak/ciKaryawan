<!-- Begin Page Content -->
<div class="container-fluid mb-5">

    <!-- Page Heading -->
    <div class="d-flex col-sm-6 justify-content-between">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <a href="<?= base_url('user') ?>"><button type="button" class="btn btn-info"><i class="fas fa-arrow-left"></i>
                Kembali</button></a>
    </div>

    <div class="row">
        <div class="absen-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>

        <div class="col-sm-6 card p-3 shadow rounded ml-2">
            <form class="user" action="<?= base_url('user/absen'); ?>" method="post">

                <input type="hidden" class="form-control" id="nipeg" name="nipeg" value="<?= $user['nipeg']; ?>">
                <input type="hidden" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                <input type="hidden" class="form-control" id="mapAbsen" name="map">


                <div id='maps-absen' style='width: 100%; height:250px;'></div>
                <hr>
                <div id="date-and-clock" class="text-center">
                    <h4 id="clocknow"></h4>
                    <h4 id="datenow"></h4>
                </div>

                <div class="form-group">
                    <label for="shift">Shift</label>
                    <select name="shift" id="shift" class="form-control">
                        <option value="1">Pagi</option>
                        <option value="2">Siang</option>

                    </select>
                    <?= form_error('keterangan_absen', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="keterangan_absen">Keterangan</label>
                    <select name="keterangan_absen" id="keterangan_absen" class="form-control">
                        <option value="1">Bekerja Di Kantor</option>
                        <option value="2">Bekerja di Rumah / WFH</option>
                        <option value="3">Izin</option>
                        <option value="4">Sakit</option>
                    </select>
                    <?= form_error('keterangan_absen', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>



                <div class="col-sm-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-info col-3">Absen</button>
                </div>
        </div>

        </form>

    </div>
</div>

</div>
<!-- /.container-fluid -->