<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tabel Penyewa</h1>
                    <a href="<?php echo base_url(); ?>index.php/penyewa/tambah"> <button style="float: right;margin-top: -60px" class="btn btn-primary">Tambah penyewa</button></a>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                          <?php
                          $notif = $this->session->flashdata('notif');
                          if (!empty($notif))
                            echo "<div class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>$notif</div>";
                          ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                      <th>No Identitas</th>
                                      <th>Nama Lengkap</th>
                                      <th>Alamat</th>
                                      <th>Jenis Kelamin</th>
                                      <th>Agama</th>
                                      <th>Nomor HP</th>
                                      <th>Email</th>
                                      <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    foreach ($penyewa as $user) {
                                      echo "
                                        <tr>
                                          <td>$user->NO_IDENTITAS</td>
                                          <td>$user->NAMA</td>
                                          <td>$user->ALAMAT</td>
                                          <td>"; if($user->JK=='L'){echo 'Laki-laki';}else{echo 'Perempuan';} echo "</td>
                                          <td>"; if($user->AGAMA=='I'){echo 'Islam';}else{echo $user->AGAMA;} echo "</td>
                                          <td>$user->NO_HP</td>
                                          <td>$user->EMAIL</td>
                                          <td>
                                            <button class='btn btn-info' data-toggle='modal' data-target='#modal$user->ID_USER'>Edit</button>
                                          </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class='modal fade' id='modal$user->ID_USER' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                  <form role='form' action='".base_url()."index.php/penyewa/edit/".$user->ID_USER."' method='post'>
                                                    <div class='modal-header'>
                                                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                        <h4 class='modal-title' id='myModalLabel'>Edit Data penyewa</h4>
                                                    </div>
                                                    <div class='modal-body'>";?>
                                                      <div class="form-group">
                                                        <label>No Identitas</label>
                                                        <input class="form-control" type="text" name="no_identitas" required value="<?php echo $user->NO_IDENTITAS; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Nama Lengkap</label>
                                                        <input class="form-control" type="text" name="nama" required value="<?php echo $user->NAMA; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Alamat</label>
                                                        <textarea class="form-control" type="textarea" name="alamat" required value=""><?php echo $user->ALAMAT; ?></textarea>
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <select class="form-control" name="jk" required>
                                                          <option value="L">Laki-laki</option>
                                                          <option value="P" <?php if($user->JK=='P'){echo 'selected';} ?>>Perempuan</option>
                                                        </select>
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Agama</label>
                                                        <select class="form-control" name="agama" required>
                                                          <option value="Islam">Islam</option>
                                                          <option value="Kristen" <?php if($user->AGAMA=='Kristen'){echo 'selected';} ?>>Kristen</option>
                                                          <option value="Protestan" <?php if($user->AGAMA=='Protestan'){echo 'selected';} ?>>Protestan</option>
                                                          <option value="Konghucu" <?php if($user->AGAMA=='Konghucu'){echo 'selected';} ?>>Konghucu</option>
                                                          <option value="Hindu" <?php if($user->AGAMA=='Hindu'){echo 'selected';} ?>>Hindu</option>
                                                          <option value="Budha" <?php if($user->AGAMA=='Budha'){echo 'selected';} ?>>Budha</option>
                                                        </select>
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Nomor HP</label>
                                                        <input class="form-control" type="number" name="no_hp" min="0" required value="<?php echo $user->NO_HP; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Tempat Lahir</label>
                                                        <input class="form-control" type="text" name="tmp_lahir" min="0" required value="<?php echo $user->TMP_LAHIR; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Tanggal Lahir</label>
                                                        <input class="form-control" type="date" name="tgl_lahir" required value="<?php echo $user->TGL_LAHIR; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" type="email" name="email" min="0" required value="<?php echo $user->EMAIL; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Foto</label>
                                                        <img id="blah" src="<?php echo base_url('/uploads/profil/'); echo $user->FOTO; ?>" alt="your image" class="form-control" style="height:250px; width:40%; margin:150px; margin-top:10px; margin-bottom:10px"/>

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
            <!-- /.row -->
        </div>
