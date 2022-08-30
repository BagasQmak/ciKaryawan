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
                                

                                    <a href="<?= base_url('pendapatan') ?>"><i class="mb-3 fas fa-arrow-left"></i>
                                        Kembali</a>
                               
                                <h1 class="h4 text-gray-900 mb-4">Edit Data</h1>
                            </div>
                            <form class="pendapatan" action="" method="post">
                                <div class="form-group" >
                                    <label for="no">No</label>
                                    <input type="text" class="form-control form-control-user" id="no" name="no" value="<?= $pendapatan->no ?>" readonly>
                                    <?= form_error('no', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="nominal">Nominal</label>
                                    <input type="text" class="form-control form-control-user" id="nominal" name="nominal" value="<?= $pendapatan->nominal ?>" required>
                                    <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control form-control-user" id="keterangan" name="keterangan" value="<?= $pendapatan->keterangan ?>">
                                     <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control form-control-user" id="tanggal" name="tanggal" value="<?= $pendapatan->tanggal ?>" required>
                                    <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <hr>
                                
                                <input class="btn btn-primary" type="submit" name="btn" value="Save" />
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>