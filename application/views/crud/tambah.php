<div class="container">

        <div class="card border-0 col-lg-6 shadow-lg mx-auto my-5">
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
                                <h1 class="h4 text-gray-900 mb-4">Tambah Data</h1>
                            </div>
                            <form class="user" action="<?= base_url('crud/tambah'); ?>" method="post">
                                <div class="form-group" >
                                    <label for="nipeg">Nipeg</label>
                                    <input type="text" class="form-control form-control-user" id="nipeg" name="nipeg" value="<?= set_value('nipeg'); ?>" required>
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

                                <hr>
                                
                                <input class="btn btn-primary" type="submit" name="btn" value="Save" />
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>