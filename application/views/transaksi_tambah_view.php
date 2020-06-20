
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Form Peminjaman</h2>
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
                                    <form role="form" action="<?php echo base_url(); ?>index.php/transaksi/tambah_transaksi" method="post">
                                        <div class="form-group">
                                            <label>Peminjam</label>
                                            <select class="form-control" name="peminjam">
                                              <option value="">---</option>
                                              <?php foreach ($penyewa as $user): ?>
                                                <option value="<?php echo $user->ID_USER; ?>"><?php echo $user->NO_IDENTITAS." - ".$user->NAMA; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobil</label>
                                            <select class="form-control" name="mobil">
                                              <option value="">---</option>
                                              <?php foreach ($mobil as $car): ?>
                                                <option value="<?php echo $car->ID_MOBIL; ?>"><?php echo $car->NO_SERI." - ".$car->MERK_MOBIL; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Kembali</label>
                                            <input class="form-control" type="date" name="tanggal_kembali" id="minToday">
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Tambah" name="submit">
                                        <input type="reset" class="btn btn-default" value="Reset">
                                    </form>
                                    <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
                                </div>
                                <div class="col-lg-6">
                                </div>
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

        <script>
        function getISODate(){
  var d = new Date();
  return d.getFullYear() + '-' +
          ('0' + (d.getMonth()+1)).slice(-2) + '-' +
          ('0' + d.getDate()).slice(-2);
}

window.onload = function() {
  document.getElementById('minToday').setAttribute('min',getISODate());
}
 </script>
