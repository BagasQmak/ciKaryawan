

        

       

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Pendapatan</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pendapatan</h6>
                        </div>
                        
                        <div class="card-body">
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
                            <?php if($this->session->flashdata('success')): ?>

                            <?php endif; ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <a href="<?php echo base_url('pendapatan/tambah') ?>" class="text-white"><button class="btn btn-info mb-3"><i class=" fas fa-plus"></i> Tambah Data</button></a>
                                
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nominal</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach($tabel_pendapatan as $pendapatan) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td>Rp. <?= number_format($pendapatan->nominal); ?></td>
                                            <td><?= $pendapatan->keterangan; ?></td>
                                            <td><?= format_indo($pendapatan->tanggal); ?></td>
                                            <td>
                                                <a href="<?php echo base_url('pendapatan/edit/'.$pendapatan->no) ?>"
											 class="btn btn-small text-warning"><i class="fas fa-edit"></i> Edit</a>
											
                                                 <a 
											 href="<?= base_url('pendapatan/hapus/'.$pendapatan->no) ?>" class="btn btn-small text-danger tombol-hapus"><i class="fas fa-trash"></i> Hapus</a></td>
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

          