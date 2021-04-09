

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Input Baju Adat</h3>
                <p class="text-subtitle text-muted">Silahkan Inputkan Baju Adat</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Input</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <?php echo $this->session->flashdata('info'); ?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input Baju Adat</h4>
            </div>
            
            <div class="card-body">
                <form action="<?php echo site_url('c_admin/inputbaju_adat'); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Pilih Provinsi</label>
                                <select class="form-select" name="id_provinsi">
                                    <?php foreach ($provinsi as $key => $value): ?>
                                        <option value="<?php echo $value->provinsi_id; ?>">
                                            <?php echo $value->nama_provinsi; ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Nama Baju Adat</label>
                                <input type="text" name="nama_bajuadat" class="form-control" id="basicInput" placeholder="Input baju adat">
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Baju Adat</label>
                                <Textarea  class="form-control" rows="3" type="text" name="desc" placeholder="Deskripsi Baju Adat" required></Textarea>
                            </div>
                            <div class="form-group">
                                <label for="firstname"><p>Foto Baju Adat <br> <span><b>*Type: .jpeg, .jpg, .png | Max: 5mb </b></span></p>
                                    <?php echo @$error; ?></label>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="file" name="gambar" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                            <button class="btn btn-primary" type="submit">Simpan Baju Adat</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="card">
            <div class="card-header">
                Baju Adat
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">Provinsi</th>
                            <th class="text-center">Nama Baju Adat</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Deskripsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($baju_adat as $key => $value): ?>                        
                            <tr>
                                <td class="text-center"><?php echo $value->nama_provinsi; ?></td>
                                <td class="text-center"><?php echo $value->nama_bajuadat; ?></td>
                                <td class="text-center"> <a href="<?php echo base_url('images/'.$value->foto) ?>">
                                   <img src="<?php echo base_url('images/'.$value->foto) ?>" style="width:50px; height:50px">
                               </a></td>
                               <td class="text-center"><?php echo $value->desc_bajuadat; ?></td>
                               <td class="text-center">
                                <a class="btn btn-outline-light" href="<?php base_url() ?>edit_bajuadat/<?php echo $value->id_bajuadat; ?>" title="Ubah">
                                    <i class="fas fa-edit" style='font-size:15px;color: blue;'></i></a>
                                    <a class="btn btn-outline-light btn-xs" href="<?php base_url() ?>delete_bajuadat/<?php echo $value->id_bajuadat; ?>" title="Hapus"><i class="fas fa-trash" style='font-size:15px;color:red;text-align: center;'></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- Basic Inputs end -->

    <!-- Input Style start -->


</div>
<script src="<?= base_url('assets/')?>js/feather-icons/feather.min.js"></script>
<script src="<?= base_url('assets/')?>vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('assets/')?>vendors/simple-datatables/simple-datatables.js"></script>
<script src="<?= base_url('assets/')?>js/vendors.js"></script>
<link rel="stylesheet" href="<?= base_url('assets/')?>vendors/simple-datatables/style.css">

