
            <div>    <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <div class="col-lg-6 col-sm-12">
                    <div class="card mb-4">
                        <div class="card-header text-center"><span class="fas fa-clock mr-1"></span>Absensi</div>
                        <div class="card-body text-center">
                            <div id="infoabsensi"></div>
                            <?php if ($dataapp['maps_use'] == 1) : ?>
                                <div id='maps-absen' style='width: 100%; height:250px;'></div>
                                <hr>
                            <?php endif; ?>
                            <div id="location-maps" style="display: none;"></div>
                            <div id="date-and-clock">
                                <h3 id="clocknow"></h3>
                                <h3 id="datenow"></h3>
                            </div>
                            <!-- <input type="hidden" class="form-control form-control-user" id="nipeg" name="nipeg" value="<?= $user['nipeg'] ?>">
                            <input type="hidden" class="form-control form-control-user" id="nama" name="nama" value="<?= $user['nama']?>"> -->
                            <?= form_dropdown('ket_absen', ['Bekerja Di Kantor' => 'Bekerja Di Kantor', 'Bekerja Di Rumah / WFH' => 'Bekerja Di Rumah / WFH', 'Sakit' => 'Sakit', 'Cuti' => 'Cuti'], '', ['class' => 'form-control align-content-center my-2', 'id' => 'ket_absen']); ?>
                            <div class="mt-2">
                                <div id="func-absensi">
                                    <p class="font-weight-bold">Status Kehadiran: <?= $statuspegawai = (empty($dbabsensi['status_pegawai'])) ? '<span class="badge badge-primary">Belum Absen</span>' : (($dbabsensi['status_pegawai'] == 1) ? '<span class="badge badge-success">Sudah Absen</span>' : '<span class="badge badge-danger">Absen Terlambat</span>'); ?></p>
                                    <div id="jamabsen">
                                        <p>Waktu Datang: <?= $jammasuk = (empty($dbabsensi['jam_masuk'])) ? '00:00:00' : $dbabsensi['jam_masuk']; ?></p>
                                        <p>Waktu Pulang: <?= $jammasuk = (empty($dbabsensi['jam_pulang'])) ? '00:00:00' : $dbabsensi['jam_pulang']; ?></p>
                                    </div>
                                </div>
                                <button class="btn btn-dark" id="btn-absensi">Absen</button>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="text-muted">Absen Datang Jam: <?= $dataapp['absen_mulai'] ?></div>
                                <div class="text-muted">Absen Pulang Jam: <?= $dataapp['absen_pulang']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                  
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->