

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Input Tarian Daerah</h3>
                <p class="text-subtitle text-muted">Silahkan Inputkan Tarian Daerah</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>c_admin">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Input Tarian Daerah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <?php echo $this->session->flashdata('info'); ?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input Tarian Daerah</h4>
            </div>
            
            <div class="card-body">
                <form action="<?php echo site_url('c_admin/input_tarian_daerah'); ?>" method="post" enctype="multipart/form-data">
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
                                <label for="basicInput">Nama Tarian Daerah</label>
                                <input type="text" name="nama_tarian" class="form-control" id="basicInput" placeholder="Input Tarian Daerah" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Tarian Daerah</label>
                                <Textarea  class="form-control" rows="3" type="text" name="desc_tarian" placeholder="Deskripsi Tarian Daerah" required></Textarea>
                            </div>
                            <div class="form-group">
                                <label for="firstname"><p>Foto Tarian Daerah <br> <span><b>*Type: .jpeg, .jpg, .png | Max: 5mb </b></span></p>
                                    <?php echo @$error; ?></label>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="file" name="gambar" class="form-control" placeholder="Foto Tarian Daerah" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="firstname"><p>Video Tarian Daerah <br> <span><b>*mp4 |mkv |avi |3gp | Max: 20mb </b></span></p>
                                        <?php echo @$error; ?></label>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="file" name="video" class="form-control" placeholder="Video Tarian Daerah" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Simpan Tarian Daerah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Tarian Daerah
                    </div>
                    <div class="card-body">
                        <table class='table table-striped' id="table1">
                            <thead>
                                <tr>
                                    <th class="text-center">Provinsi</th>
                                    <th class="text-center">Nama Tarian Daerah</th>
                                    <th class="text-center">Foto Tarian Daerah</th>
                                    <th class="text-center">Video Tarian Daerah</th>
                                    <th class="text-center">Deskripsi Tarian Daerah</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tarian as $key => $value): ?>                        
                                    <tr>
                                        <td class="text-center"><?php echo $value->nama_provinsi; ?></td>
                                        <td class="text-center"><?php echo $value->nama_tarian; ?></td>
                                        <td class="text-center"> 
                                            <a href="<?php echo base_url('images/'.$value->foto_tarian) ?>">
                                               <img src="<?php echo base_url('images/'.$value->foto_tarian) ?>" style="width:50px; height:50px">
                                           </a>
                                       </td>
                                       <td>
                                        <a href="<?= base_url('images/') ?><?php echo $value->video_tarian ?>">
                                            <video width="150" height="150" controls>
                                                <source src="<?= base_url('images/') ?><?php echo $value->video_tarian ?>" type="video/mp4">
                                                  <source src="<?= base_url('images/') ?><?php echo $value->video_tarian ?>" type="video/ogg">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </a>
                                        </td>

                                        <td class="text-center">
                                            <?php echo $value->desk_tarian; ?>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-outline-light" href="<?php base_url() ?>edit_tarian_daerah/<?php echo $value->tarian_id; ?>" title="Ubah">
                                                <i class="fas fa-edit" style='font-size:15px;color: blue;'></i></a>
                                                <a class="btn btn-outline-light btn-xs" href="<?php base_url() ?>delete_tarian_daerah/<?php echo $value->tarian_id; ?>" title="Hapus"><i class="fas fa-trash" style='font-size:15px;color:red;text-align: center;'></i>
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

