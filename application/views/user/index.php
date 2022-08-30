

        

      

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                     <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
                    

                    <div class="card mb-3" style="max-width: 540px">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/profile/') . $user['image'];?>" class="img-thumbnail">
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-10">
                            <div class="card-body">
                                <h5 class="card-title"><?= $user['name']; ?></h5>
                                    <p class="card-text"><?= $user['email']; ?></p>
                                    <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a href="<?= base_url('user/editProfil'); ?>"><button type="button" class="btn btn btn-info mt-3">Edit</button></a>
                        </div>
                    </div>
        </div>
</div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->