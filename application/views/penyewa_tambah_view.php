
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Form Penambahan Penyewa</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-7">
                                  <?php
                                  $notif = $this->session->flashdata('notif');
                                  if (!empty($notif))
                                    echo "<div class='alert alert-danger'>$notif</div>";
                                  ?>
                                    <form role="form" action="<?php echo base_url(); ?>index.php/penyewa/tambah_penyewa" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <label>No Identitas</label>
                                            <input class="form-control" type="text" name="no_identitas" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input class="form-control" type="text" name="nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" type="text" name="alamat" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control" name="jk" required>
                                              <option value="L">Laki-laki</option>
                                              <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                          <label>Agama</label>
                                          <select class="form-control" name="agama" required>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Konghucu">Konghucu</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor HP</label>
                                            <input class="form-control" type="number" name="no_hp" min="0" required>
                                        </div>
                                        <div class="form-group">
                                          <label>Tempat Lahir</label>
                                        <input class="form-control" type="text" name="tmp_lahir" min="0" required>
                                        </div>
                                        <div class="form-group">
                                          <label>Tanggal Lahir</label>
                                          <input class="form-control" type="date" name="tgl_lahir" required>
                                        </div>
                                        <div class="form-group">
                                          <label>Email</label>
                                        <input class="form-control" type="email" name="email" min="0" required>
                                        </div>
                                        <div class="form-group">
                                          <label>Foto</label>
                                          <input type='file' id="imgInp" class="form-control" name="foto"/>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Tambah" name="submit">
                                        <input type="reset" class="btn btn-default" value="Reset">
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-5">
                                    <img id="blah" src="#" alt="your image" class="form-control" style="height:220px; width:50%; margin:100px; margin-top:20px"/>



                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
