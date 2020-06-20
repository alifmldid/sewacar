<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tabel Peminjaman</h1>
                    <a href="<?php echo base_url(); ?>index.php/transaksi/tambah" style="float: right;margin-top: -60px" class="btn btn-primary">Tambah Peminjaman</a>
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
                          <form method="post" action="<?php echo base_url(); ?>index.php/transaksi/search">
                          </form>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Penyewa</th>
                                        <th>Mobil</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Deadline</th>
                                        <th>Denda</th>
                                        <th>Status</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($peminjaman as $pinjam): ?><tr>
                                    <td><?php echo $pinjam->NAMA; ?></td>
                                    <td><?php echo $pinjam->MERK_MOBIL; ?></td>
                                    <td><?php $tanggalkembali = date_create($pinjam->TANGGAL_KEMBALI);echo date_format($tanggalkembali, "d M Y"); ?></td>
                                    <td><?php
                                          $tanggalkembali = strtotime($pinjam->TANGGAL_KEMBALI);
                                          $today = time();
                                          $deadline = 0;
                                              if(strtotime(date("Y-m-d")) > $tanggalkembali) {
                                                $diff = $today - $tanggalkembali;
                                                $deadline = floor($diff / 86400);
                                                echo $deadline.' Hari Terlambat';
                                              } else if(strtotime(date("Y-m-d")) < $tanggalkembali) {
                                                $diff = $tanggalkembali - $today;
                                                echo (floor($diff / 86400)+1).' Hari lagi';
                                              } else {
                                                echo 'Hari ini deadline';
                                              } ?></td>
                                    <td><?php
                                          $tanggalkembali = strtotime($pinjam->TANGGAL_KEMBALI);
                                          $today = time();
                                          $denda = 0;
                                              if(strtotime(date("Y-m-d")) > $tanggalkembali) {
                                                $diff = $today - $tanggalkembali;
                                                $denda = floor($diff / 86400)*50000;
                                                echo 'Rp'.$denda;
                                              } else if(strtotime(date("Y-m-d")) < $tanggalkembali) {
                                                $diff = $tanggalkembali - $today;
                                                echo ' Rp.0';
                                              } else {
                                                echo 'Rp.0';
                                              } ?></td>
                                    <td><?php echo $pinjam->STATUS_PINJAM; ?></td>
                                    <td>
                                      <a href='<?php echo base_url(); ?>index.php/transaksi/kembali/<?php echo $pinjam->ID_PINJAM; ?>/<?php echo $denda; ?>' type='button' class='btn btn-success'>Kembali</a>
                                      <a href='<?php echo base_url(); ?>index.php/transaksi/struk/<?php echo $pinjam->ID_PINJAM; ?>' type='button' class='btn btn-success'>Struk</a>
                                    </td>
                                  </tr>
                                  <?php endforeach; ?></tbody>
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
