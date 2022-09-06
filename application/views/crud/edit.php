<div class="container">

        <div class="card border-0 col-lg-8 shadow-lg mx-auto my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                            <?php if (validation_errors() == true): ?>
                                    <div class="alert alert-danger" role="alert">
                                        
                                        <?= $this->session->flashdata('error'); ?>
                                    </div>
                                   
                            <?php endif; ?>
                                

                                    <a href="<?= base_url('crud') ?>"><i class="mb-3 fas fa-arrow-left"></i>
                                        Kembali</a>
                               
                                <h1 class="h4 text-gray-900 mb-4">Edit Data</h1>
                            </div>
                            <form class="user" action="" method="post">
                                <div class="form-group" >
                                    <label for="nipeg">Nipeg</label>
                                    <input type="text" class="form-control form-control-user" id="nipeg" name="nipeg" value="<?= $crud->nipeg ?>" readonly>
                                    <?= form_error('nipeg', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= $crud->nama ?>" required>
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control form-control-user" id="jabatan" name="jabatan" value="<?= $crud->jabatan ?>" required>
                                    <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="bagian">Bagian</label>
                                    <input type="text" class="form-control form-control-user" id="bagian" name="bagian" value="<?= $crud->bagian ?>" required>
                                    <?= form_error('bagian', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="divisi">Divisi</label>
                                    <input type="text" class="form-control form-control-user" id="divisi" name="divisi" value="<?= $crud->divisi ?>" required>
                                    <?= form_error('divisi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                 <div class="form-group">
                                  
                                    <input type="hidden" class="form-control form-control-user" name="username" value="<?= $crud->username ?>" required>
                                    
                                </div>
                                <div class="form-group">
                                  
                                    <input type="hidden" class="form-control form-control-user" name="password" value="<?= $crud->password ?>" required>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="role_id">Role</label>
                                    <select name="role_id" id="role_id" class="custom-select">
                                            <?php if($crud->role_id == 1) : ?>
                                                <option value="1" selected>Administrator</option>
                                                <option value="2">Karyawan</option>
                                            <?php endif; ?>
                
                                            <?php if($crud->role_id == 2) : ?>
                                                <option value="2" selected>Karyawan</option>
                                                <option value="1">Administrator</option>
                                            <?php endif; ?>
                                         
                                        </select>
                                    <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <hr>
                                
                                <input class="btn btn-primary" type="submit" name="btn" value="Save" />
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>