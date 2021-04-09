<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Baju Adat</h3>
                <p class="text-subtitle text-muted">Silahkan Update Baju Adat</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>c_admin">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>c_admin/baju_adat">Input Baju Adat</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Baju Adat</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <?php echo $this->session->flashdata('info'); ?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Baju Adat</h4>
            </div>
            
            <div class="card-body">
                <?php foreach ($baju_adat as $key => $value): ?>
                    <form action="<?php echo site_url('c_admin/updatebaju_adat/'); ?><?php echo $value->id_bajuadat ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput">Pilih Provinsi</label>
                                    <select class="form-select" name="id_provinsi">
                                        <option value="<?php echo $value->provinsi_id; ?>">
                                            <?php echo $value->nama_provinsi; ?>
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Nama Baju Adat</label>
                                    <input type="text" value="<?php echo $value->nama_bajuadat ?>" name="nama_bajuadat" class="form-control" id="basicInput" placeholder="Input baju adat">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Baju Adat</label>
                                    <Textarea  class="form-control" rows="3" type="text" name="desc" placeholder="Deskripsi Baju Adat" required><?php echo $value->desc_bajuadat ?></Textarea>
                                </div>
                                <div class="form-group">
                                    <label for="firstname"><p>Foto Baju Adat <br> <span><b>*Type: .jpeg, .jpg, .png | Max: 5mb </b></span></p>
                                        <?php echo @$error; ?></label>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="file" name="gambar" class="form-control" placeholder="" required>
                                            </div>
                                        </div>
                                        <img style="width: 150px" src="<?= base_url('images/')  ?><?php echo $value->foto ?>">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update Baju Adat</button>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/')?>js/feather-icons/feather.min.js"></script>
    <script src="<?= base_url('assets/')?>vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url('assets/')?>vendors/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url('assets/')?>js/vendors.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/')?>vendors/simple-datatables/style.css">

