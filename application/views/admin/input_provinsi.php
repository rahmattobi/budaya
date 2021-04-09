

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Input Data Provinsi</h3>
                <p class="text-subtitle text-muted">Silahkan masukkan data provinsi</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>c_admin">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Input Data Pronvisi</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <div class="col-md-12">
        <?php echo $this->session->flashdata('info'); ?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input Provinsi</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                       <form action="<?php echo site_url('c_admin/simpan_data_provinsi') ?>" method="post" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="basicInput">Nama Provinsi</label>
                                <input type="text" class="form-control" id="nama_provinsi" placeholder="Input nama provinsi" name="nama_provinsi">
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

                            <div class="form-group mb-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Provinsi</label>
                                <textarea class="form-control" id="desk_provinsi" name="desk_provinsi" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="card">
            <div class="card-header">
                Simple Datatable
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <!-- <div class="container-fluid"> -->
                            <tr class="container-fluid">
                                <th class="text-center">No.</th>
                                <th class="text-center">Nama Provinsi</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Desk</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                            <!-- </div> -->
                        </thead>
                        <tbody>
                            <?php 
                            if($c_pvs>0){
                                $no = 0;
                                foreach($pvs as $list){
                                    ?>
                                    <tr>
                                        <!-- <div class="container-fluid"> -->
                                            <td class="text-center">
                                                <?php echo ++$no;?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $list->nama_provinsi;?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url('images/'.$list->foto_provinsi) ?>">
                                                   <img src="<?php echo base_url('images/'.$list->foto_provinsi) ?>" style="width:50px; height:50px">
                                               </a>
                                           </td>
                                           <td class="text-center">
                                                <?php echo $list->desk_provinsi;?>
                                            </td>
                                           <td class="text-center">
                                             <a class="btn btn-outline-light" href="<?php echo site_url('c_admin/edit_data_provinsi/'.$list->provinsi_id)?>" title="Ubah">
                                                <i class="fas fa-edit" style='font-size:15px;color: blue;'></i></a>
                                                <a class="btn btn-outline-light btn-xs" href="<?php echo site_url('c_admin/hapus_data_provinsi/'.$list->provinsi_id)?>" title="Hapus"><i class="fas fa-trash" style='font-size:15px;color:red;text-align: center;'></i>
                                                </a>
                                            </td>
                                            <!-- </div> -->

                                        </tr>
                                        <?php 
                                    }
                                } else { ?>
                                    <tr>
                                        <td colspan="5"><center>Data Provinsi Kosong</center></td>
                                    </tr>
                                    <?php
                                }
                                ?>
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

