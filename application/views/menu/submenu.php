

        

      

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    <a href="" class="text-white" data-toggle="modal" data-target="#tambahSubmenu"><button class="btn btn-info mb-3" ><i class=" fas fa-plus"></i> Tambah SubMenu</button></a>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
            


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

                <!-- Modal -->
                <div class="modal fade" id="tambahSubmenu" tabindex="-1" aria-labelledby="tambahSubmenuLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahSubmenuLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="user" action="<?= base_url('menu/submenu'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                        <label for="title">title</label>
                                        <input type="text" class="form-control form-control-user" id="title" name="title" value="<?= set_value('title'); ?>" required>
                                        <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="menu_id">Menu</label>
                                        <select name="menu_id" id="menu_id" class="form-control">
                                            <option value="">Select Menu</option>
                                            <?php foreach($menu as $m): ?>
                                                <option value="<?= $m->id; ?>"><?= $m->menu; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('menu_id', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="url">Url</label>
                                        <input type="text" class="form-control form-control-user" id="url" name="url" value="<?= set_value('url'); ?>" required>
                                        <?= form_error('url', '<small class="text-danger pl-3">', '</small>'); ?>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="icon">Icon</label>
                                        <input type="text" class="form-control form-control-user" id="icon" name="icon" value="<?= set_value('icon'); ?>" required>
                                        <?= form_error('icon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                                            <label for="is_active" class="form-check-label">Aktif ?</label>
                                        </div>
                                    </div>

                                    <hr>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Main Content -->


            <!-- Button trigger modal -->
                                    <!-- Button trigger modal -->






