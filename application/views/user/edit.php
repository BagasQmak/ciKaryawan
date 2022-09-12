

        

      

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex col-sm-8 justify-content-between">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <a href="<?= base_url('user') ?>"><button type="button" class="btn btn-info"><i class="fas fa-arrow-left"></i>
                                        Kembali</button></a>
    </div>

    <div class="row">
        <div class="col-sm-8 card p-3 shadow rounded ml-2">
            <form class="user" action="<?= base_url('user/editProfil'); ?>" method="post">
                <!-- <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email :</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                    </div>
                </div> -->
                <input type="hidden" class="form-control" id="nipeg" name="nipeg" value="<?= $user['nipeg']; ?>">
                <input type="hidden" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                <input type="hidden" class="form-control" id="jabatan" name="jabatan" value="<?= $user['jabatan']; ?>">
                <input type="hidden" class="form-control" id="bagian" name="bagian" value="<?= $user['bagian']; ?>">
                <input type="hidden" class="form-control" id="divisi" name="divisi" value="<?= $user['divisi']; ?>">
                <input type="hidden" class="form-control" id="role_id" name="role_id" value="<?= $user['role_id']; ?>">
                <input type="hidden" class="form-control" id="password" name="password" value="<?= $user['password']; ?>">

                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">email :</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggallahir" class="col-sm-2 col-form-label">tanggallahir :</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" value="<?= $user['tanggallahir']; ?>">
                    </div>
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
                        </div>
                    </div>
                </div>
                </div>
                </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-info">Ubah</button>
                </div>
            </div>
                
            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->