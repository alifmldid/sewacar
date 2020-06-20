<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">Tabel Mobil</h1>
                                       <a href="<?php echo base_url(); ?>index.php/mobil/tambah"><button style="float: right;margin-top: -60px" class="btn btn-primary">Tambah mobil</button></a>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <?php
                          $notif = $this->session->flashdata('notif');
                          if (!empty($notif))
                            echo "<div class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>$notif</div>";
                          ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No Seri</th>
                                        <th>Merk Mobil</th>
                                        <th>Jenis</th>
                                        <th>Deskripsi</th>
                                        <th>Harga Sewa</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    foreach ($mobil as $car) {
                                      echo "
                                        <tr>
                                          <td>$car->NO_SERI</td>
                                          <td>$car->MERK_MOBIL</td>
                                          <td>$car->JENIS</td>
                                          <td>$car->DESKRIPSI</td>
                                          <td>$car->HARGA_SEWA</td>
                                          <td>$car->STATUS</td>
                                          <td>
                                            <button class='btn btn-info' data-toggle='modal' data-target='#modal$car->ID_MOBIL'>Edit</button>
                                            <a href='".base_url()."index.php/mobil/hapus/$car->ID_MOBIL' type='button' class='btn btn-danger'>Delete</a>
                                          </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class='modal fade' id='modal$car->ID_MOBIL' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                  <form role='form' action='".base_url()."index.php/mobil/edit/".$car->ID_MOBIL."' method='post'>
                                                    <div class='modal-header'>
                                                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                        <h4 class='modal-title' id='myModalLabel'>Edit Data mobil</h4>
                                                    </div>
                                                    <div class='modal-body'>";?>
                                                      <div class="form-group">
                                                        <label>No Seri</label>
                                                        <input class="form-control" type="text" name="no_seri" required value="<?php echo $car->NO_SERI; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Merk Mobil</label>
                                                        <input class="form-control" type="text" name="merk_mobil" required value="<?php echo $car->MERK_MOBIL; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Jenis</label>
                                                        <select class="form-control" name="jenis" required>
                                                          <option value="Hatchback">Hatchback</option>
                                                          <option value="SUV" <?php if($car->JENIS=='SUV'){echo 'selected';} ?>>SUV</option>
                                                          <option value="MPV" <?php if($car->JENIS=='MPV'){echo 'selected';} ?>>MPV</option>
                                                          <option value="Sedan" <?php if($car->JENIS=='Sedan'){echo 'selected';} ?>>Sedan</option>
                                                        </select>
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Deskripsi</label>
                                                        <textarea class="form-control" type="text" name="deskripsi"><?php echo $car->DESKRIPSI; ?></textarea>
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Harga Sewa Per hari</label>
                                                        <input class="form-control" type="text" name="harga_sewa" required value="<?php echo $car->HARGA_SEWA; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Foto</label>
                                                        <img id="blah" src="<?php echo base_url('/uploads/mobil/'); echo $car->FOTO_MOBIL; ?>" alt="your image" class="form-control" style="height:250px; width:100%; margin-top:10px"/>
                                                      </div>
                                                    <?php echo "</div>
                                                    <div class='modal-footer'>
                                                    <input type='submit' class='btn btn-info' value='Edit' name='submit'>
                                                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                                                    </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                      ";
                                    }
                                  ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
