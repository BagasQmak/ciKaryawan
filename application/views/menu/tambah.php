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
                                 <a href="<?= base_url('menu') ?>" class=""><i class="mb-3 fas fa-arrow-left"></i>
                                        Kembali</a>
                                <h1 class="h4 text-gray-900 mb-4">Tambah Menu</h1>
                            </div>
                            <form class="user" action="<?= base_url('menu/tambah'); ?>" method="post">
                               
                                <div class="form-group">
                                <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama Menu">
                                    <?= form_error('menu', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                               
                                <hr>
                                
                                <input class="btn btn-primary" type="submit" name="btn" value="Tambah" />
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>