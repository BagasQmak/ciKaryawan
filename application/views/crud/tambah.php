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
                                <h1 class="h4 text-gray-900 mb-4">Tambah Pegawai</h1>
                            </div>
                            <form class="user" action="<?= base_url('crud/tambah'); ?>" method="post">
                                <div class="form-group" >
                                    <!-- <label for="nipeg">Nipeg</label> -->
                                    <input type="hidden" class="form-control form-control-user" id="nipeg" name="nipeg" value="<?= set_value('nipeg'); ?>">
                                    <?= form_error('nipeg', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= set_value('nama'); ?>" required>
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="tanggallahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control form-control-user" id="tanggallahir" name="tanggallahir" value="<?= set_value('tanggallahir'); ?>">
                                    <?= form_error('tanggallahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <small class=" pl-3">* optional</small>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control form-control-user" id="jabatan" name="jabatan" value="<?= set_value('jabatan'); ?>" required>
                                    <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="bagian">Bagian</label>
                                    <input type="text" class="form-control form-control-user" id="bagian" name="bagian" value="<?= set_value('bagian'); ?>" required>
                                    <?= form_error('bagian', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="divisi">Divisi</label>
                                    <input type="text" class="form-control form-control-user" id="divisi" name="divisi" value="<?= set_value('divisi'); ?>" required>
                                    <?= form_error('divisi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                 <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control form-control-user" id="username" name="username" value="<?= set_value('username'); ?>" required>
                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                 <div class="form-group">
                                    <label for="password1">Password</label>
                                    <input type="text" class="form-control form-control-user" id="password1" name="password1" value="<?= set_value('password1'); ?>" required>
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="password2">Ulangi Password</label>
                                    <input type="text" class="form-control form-control-user" id="password2" name="password2" value="<?= set_value('password2'); ?>" required>
                                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                 <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control form-control-user" id="email" name="email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <small class=" pl-3">* optional</small>
                                </div>
                                <div class="form-group row">
                                    <label for="avatar" class="col-sm-2 col-form-label">Avatar :</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image" name="image">
                                                    <label for="image" class="custom-file-label">Pilih Avatar</label>
                                                    <small class=" pl-3">* optional</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="role_id">Role</label>
                                    <input type="text" class="form-control form-control-user" id="role_id" name="role_id" value="<?= set_value('role_id'); ?>" required>
                                    <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="is_active">is_active</label> -->
                                    <input type="hidden" class="form-control form-control-user" id="is_active" name="is_active" value="<?= set_value('is_active'); ?>" required>
                                    <?= form_error('is_active', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="date_created">date_created</label> -->
                                    <input type="hidden" class="form-control form-control-user" id="date_created" name="date_created" value="<?= set_value('date_created'); ?>" required>
                                    <?= form_error('date_created', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <hr>
                                
                                <input class="btn btn-primary" type="submit" name="btn" value="Save" />
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>