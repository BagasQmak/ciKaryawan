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
                                 <a href="<?= base_url('menu/submenu') ?>"><i class="mb-3 fas fa-arrow-left"></i>
                                        Kembali</a>
                                <h1 class="h4 text-gray-900 mb-4">Tambah SubMenu</h1>
                            </div>
                            <form class="user" action="<?= base_url('menu/tambahSubmenu'); ?>" method="post">
                             <div class="form-group">
                                    <label for="menu">menu</label>
                                    <input type="text" class="form-control form-control-user" id="menu" name="menu" value="<?= set_value('menu'); ?>" readonly>
                                    <?= form_error('menu', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
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
                                
                                <input class="btn btn-primary" type="submit" name="btn" value="Save" />
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>