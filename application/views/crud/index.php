

        

       

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Pegawai</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
                        </div>
                        
                        <div class="card-body">
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
                            <?php if($this->session->flashdata('success')): ?>

                            <?php endif; ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <a href="<?php echo base_url('crud/tambah') ?>" class="text-white"><button class="btn btn-info mb-3"><i class=" fas fa-plus"></i> Tambah Data</button></a>
                                
                                    <thead>
                                        <tr>
                                            <th>Nipeg</th>
                                            <th>Nama</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jabatan</th>
                                            <th>Bagian</th>
                                            <th>Divisi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($tabel_user as $user) : ?>
                                        <tr>
                                            <td><?= $user->nipeg; ?></td>
                                            <td><?= $user->nama; ?></td>
                                            <td><?= $user->tanggallahir; ?></td>
                                            <td><?= $user->jabatan; ?></td>
                                            <td><?= $user->bagian; ?></td>
                                            <td><?= $user->divisi; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('crud/edit/'.$user->nipeg) ?>"
											 class="btn btn-small text-warning"><i class="fas fa-edit"></i> Edit</a>
											
                                                 <a 
											 href="<?= base_url('crud/hapus/'.$user->nipeg) ?>" class="btn btn-small text-danger tombol-hapus"><i class="fas fa-trash"></i> Hapus</a></td>
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

          