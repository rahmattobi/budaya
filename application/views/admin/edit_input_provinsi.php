

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Data Provinsi</h3>
                <p class="text-subtitle text-muted">Silahkan masukkan data provinsi</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>c_admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>c_admin/input_provinsi">Input Data Pronvisi</a></li>
                        <li class="breadcrumb-item">Edit Data Pronvisi</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <div class="col-md-12">
        <div class="card">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
            <div class="card-header">
                <h4 class="card-title">Edit Provinsi</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php foreach($data as $a): ?>
                            <form action="<?php echo site_url('c_admin/eksekusi_edit_provinsi/') ?><?php echo $a->provinsi_id ?>" method="post" enctype="multipart/form-data">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicInput">Nama Provinsi</label>
                                    <input type="text" class="form-control" id="nama_provinsi" placeholder="Input nama provinsi" name="nama_provinsi" value="<?php echo($a->nama_provinsi);?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="firstname"><p>Foto Provinsi <br> <span><b>*Type: .jpeg, .jpg, .png | Max: 5mb </b></span></p>
                                    <?php echo @$error; ?></label>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="file" name="gambar" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div>

                                <img style="width: 150px" src="<?= base_url('images/') ?><?php echo $a->foto_provinsi ?>">

                                <div class="form-group mb-4">
                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Provinsi</label>
                                    <textarea class="form-control" id="desk_provinsi" name="desk_provinsi" rows="3"><?php echo $a->desk_provinsi;?></textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            <?php endforeach; ?> 
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>   

</div>
<script src="<?= base_url('assets/')?>js/feather-icons/feather.min.js"></script>
<script src="<?= base_url('assets/')?>vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('assets/')?>vendors/simple-datatables/simple-datatables.js"></script>
<script src="<?= base_url('assets/')?>js/vendors.js"></script>
<link rel="stylesheet" href="<?= base_url('assets/')?>vendors/simple-datatables/style.css">

