

        

      

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
            

                    <a href="<?= base_url('menu/tambah'); ?>" class="text-white"><button class="btn btn-info mb-3"><i class=" fas fa-plus"></i> Tambah Menu</button></a>

                    <div class="row">
                        <div class="col-lg-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($menu as $m): ?>
                                <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $m->menu; ?></td>
                                <td>
                                <a href="<?= base_url('menu/edit/').$m->id; ?>"
											 class="btn btn-small text-warning"><i class="fas fa-edit"></i> Edit</a>
											
                                                 <a 
											 href="<?= base_url('menu/hapus/').$m->id; ?>" class="btn btn-small text-danger tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <!-- Button trigger modal -->


