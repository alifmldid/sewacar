
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Form Penambahan Mobil</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <?php
                                  $notif = $this->session->flashdata('notif');
                                  if (!empty($notif))
                                    echo "<div class='alert alert-danger'>$notif</div>";
                                  ?>
                                  <form role="form" action="<?php echo base_url(); ?>index.php/mobil/tambah_mobil" enctype="multipart/form-data" method="post">
                                      <div class="form-group">
                                          <label>No Seri</label>
                                          <input class="form-control" type="text" name="no_seri" required>
                                      </div>
                                      <div class="form-group">
                                          <label>Merk Mobil</label>
                                          <input class="form-control" type="text" name="merk_mobil" required>
                                      </div>
                                      <div class="form-group">
                                        <label>Jenis</label>
                                        <select class="form-control" name="jenis" required>
                                          <option value="Hatchback">Hatchback</option>
                                          <option value="SUV">SUV</option>
                                          <option value="MPV">MPV</option>
                                          <option value="Sedan">Sedan</option>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                          <label>Deskripsi</label>
                                          <textarea class="form-control" name="deskripsi" required></textarea>
                                      </div>
                                      <div class="form-group">
                                          <label>Harga Sewa Per hari</label>
                                          <input class="form-control" type="number" name="harga_sewa" required>
                                      </div>
                                      <div class="form-group">
                                        <label>Foto</label>
                                        <input type='file' id="imgInp" class="form-control" name="foto" required/>
                                      </div>
                                      <input type="submit" class="btn btn-primary" value="Tambah" name="submit">
                                      <input type="reset" class="btn btn-default" value="Reset">
                                  </form>
                                  </div>
                                  <!-- /.col-lg-6 (nested) -->
                                  <div class="col-lg-6">
                                  <img id="blah" src="#" alt="your image" class="form-control" style="height:250px; width:100%; margin-top:10px"/>



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
