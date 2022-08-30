

        

      

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
            

                    <a href="<?= base_url('menu/tambahSubmenu'); ?>" class="text-white"><button class="btn btn-info mb-3"><i class=" fas fa-plus"></i> Tambah SubMenu</button></a>

                    <div class="row">
                        <div class="col-lg">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sub Menu</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Url</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Aktif</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($subMenu as $sm): ?>
                                <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $sm->title; ?></td>
                                <td><?= $sm->menu; ?></td>
                                <td><?= $sm->url; ?></td>
                                <td><?= $sm->icon; ?></td>
                                <td><?= $sm->is_active; ?></td>
                                <td>
                                <a href="<?= base_url('menu/editSubmenu/').$sm->id; ?>"
											 class="btn btn-small text-warning"><i class="fas fa-edit"></i> Edit</a>
											
                                                 <a 
											 href="<?= base_url('menu/hapusSubmenu/').$sm->id; ?>" class="btn btn-small text-danger tombol-hapus"><i class="fas fa-trash"></i> Hapus</a>
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


