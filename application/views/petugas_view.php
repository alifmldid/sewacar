<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">Tabel Petugas</h1>
                        <a href="<?php echo base_url(); ?>index.php/petugas/tambah"><button style="float: right;margin-top: -60px" class="btn btn-primary">Tambah Petugas</button></a>
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
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Role</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    foreach ($petugas as $admin) {
                                      echo "
                                        <tr>
                                          <td>$admin->USERNAME</td>
                                          <td>$admin->NAMA</td>
                                          <td>"; if($admin->ROLE=='SuperAdmin'){echo 'SuperAdmin';}else{echo 'Admin';} echo "</td>
                                          <td>
                                            <button class='btn btn-info' data-toggle='modal' data-target='#modal$admin->ID_PETUGAS'>Edit</button>
                                            <a href='".base_url()."index.php/petugas/hapus/$admin->ID_PETUGAS' type='button' class='btn btn-danger'>Delete</a>
                                          </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class='modal fade' id='modal$admin->ID_PETUGAS' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                  <form role='form' action='".base_url()."index.php/petugas/edit/".$admin->ID_PETUGAS."' method='post'>
                                                    <div class='modal-header'>
                                                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                        <h4 class='modal-title' id='myModalLabel'>Edit Data petugas</h4>
                                                    </div>
                                                    <div class='modal-body'>";?>
                                                      <div class="form-group">
                                                        <label>Username</label>
                                                        <input class="form-control" type="text" name="username" required value="<?php echo $admin->USERNAME; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Password</label>
                                                        <input class="form-control" type="text" name="password" required value="<?php echo $admin->PASSWORD; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Nama Lengkap</label>
                                                        <input class="form-control" type="text" name="nama" required value="<?php echo $admin->NAMA; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Role</label>
                                                        <select class="form-control" name="role" required>
                                                          <option value="SuperAdmin">SuperAdmin</option>
                                                          <option value="Admin" <?php if($admin->ROLE=='Admin'){echo 'selected';} ?>>Admin</option>
                                                        </select>
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
