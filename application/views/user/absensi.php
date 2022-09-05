
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-header text-center"><span class="fas fa-clock mr-1"></span>Absensi</div>
                            <div class="card-body text-center">
                            <div id="infoabsensi"></div>
                            
                                <div id='maps-absen' style='width: 100%; height:250px;'></div>
                                <hr>
                          
                           
                            <div id="date-and-clock">
                                <h3 id="clocknow"></h3>
                                <h3 id="datenow"></h3>
                            </div>
                                <?= form_dropdown('ket_absen', ['Bekerja Di Kantor' => 'Bekerja Di Kantor', 'Sakit' => 'Sakit', 'Cuti' => 'Cuti'], '', ['class' => 'form-control align-content-center my-2', 'id' => 'ket_absen']); ?>
                                <div class="mt-2">
                                    <div id="func-absensi">
                                        <p class="font-weight-bold">Status Kehadiran: <?= $statuspegawai = (empty($dbabsensi['status_pegawai'])) ? '<span class="badge badge-primary">Belum Absen</span>' : (($dbabsensi['status_pegawai'] == 1) ? '<span class="badge badge-success">Sudah Absen</span>' : '<span class="badge badge-danger">Absen Terlambat</span>'); ?></p>
                                        <button class="btn btn-info mb-4" id="btn-absensi">Absen</button>
                                        <div id="jamabsen" class="d-flex justify-content-center align-items-center gap-5">
                                            <p class="mr-3">Jam Masuk: <?= $jammasuk = (empty($dbabsensi['jam_masuk'])) ? '08:00:00' : $dbabsensi['jam_masuk']; ?></p>
                                            <p>Jam Pulang: <?= $jammasuk = (empty($dbabsensi['jam_pulang'])) ? '16:00:00' : $dbabsensi['jam_pulang']; ?></p>
                                        </div>
                                    </div>
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