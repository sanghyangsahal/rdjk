<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  $this->load->view('admin/header.php');
  $this->load->view('admin/sidebar.php');
  ?>
        <!-- Your Page Content Here -->

        <div class=" fixed row">
          <div class="col-xs-12">
            <div class="box box-solid">
              <div class="box-header with-border">
                <i class="fa fa-bar-chart-o"></i>
                <h3 class="box-title">RDJK Detail</h3>
              </div>
              <?php
                foreach ($rdjk_detail as $row) {
                  foreach ($opt_ruang as $ruang) {

              ?>
              <div class="box-body">
              <div class="row">
                <div class="col-lg-4">
                <input type="hidden" class="form-control" name="id_rdjk" placeholder="<?php echo $row->id_rdjk; ?>" readonly>
                  <label>Nama Kegiatan</label>
                  <textarea type="text" class="form-control" placeholder="<?php echo $row->nama_kegiatan; ?>" readonly></textarea></br>
                  <label>Tempat Rapat</label>
                  <input type="text" class="form-control" placeholder="<?php echo $ruang->nama_ruang; ?>" readonly>
                </div>
                <div class="col-sx-4 col-lg-4">
                  <label>Tanggal Mulai</label>
                  <input type="text" class="form-control" placeholder="<?php
                    $date=date_create($row->tgl_mulai);
                   echo date_format($date, "D, d/m/Y"); ?>" readonly></br></br>
                  <label>Tanggal Selesai</label>
                  <input type="text" class="form-control" placeholder="<?php
                    $date=date_create($row->tgl_selesai);
                   echo date_format($date, "D, d/m/Y"); ?>" readonly>
                </div>
                <div class="col-md-4">
                  <label>Jumlah Peserta</label>
                  <input type="text" class="form-control" placeholder="<?php echo $row->jml_peserta; ?>" readonly></br></br></br><?php }} ?>
                  <a class="btn btn-primary btn-social" href="<?php echo base_url('rdjk/tambah_rapat');?>">
                    <i class="material-icons">assignment_turned_in</i> Print Daftar Hadir
                  </a>&nbsp;
                  <a class="btn btn-primary btn-social" href="<?php echo base_url('rdjk/print_undangan/'.$row->id_rdjk);?>" target="_blank">
                    <i class="material-icons">print</i>Print Undangan
                  </a>
                </div>
              </div>
              </div>
            </div><!--box-->
          </div><!--col-->
        </div><!--row-->
      <div class="row">
        <div class="col-xs-2">
          <a class="btn btn-primary btn-social" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i> Tambah Peserta
          </a>
        </div> </br></br>
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Daftar Peserta Rapat</h3>
            </div>
            <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
            <thead>
              <tr>
                  <th>NO</th>
                  <th>NIP</th>
                  <th>Nama Peserta</th>
                  <th>Jabatan</th>
                  <th>Golongan</th>
                  <th>Rincian</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
            foreach ($hasiltransaksi as $data) :
          ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $data->nip; ?></td>
                  <td><?php echo $data->nama_pegawai; ?></td>
                  <td><?php echo $data->jabatan; ?></td>
                  <td><?php echo $data->id_golongan; ?></td>
                  <td><?php echo $data->rincian; ?></td>
                  <td>
                    <a class="btn-sm btn-primary btn-social" href="<?php echo base_url('rdjk/tambah_rapat');?>">
                    <i class="material-icons">delete</i>Hapus
                  </a>
                  </td>
                </tr>
              <?php 
              $no++;
              endforeach ?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
  </div>



  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Peserta Rapat</h4>
        </div>
      <div class="modal-body">
      <form class="form-horizontal" action="<?php echo base_url('rdjk/tambah_peserta');?>" method="post">
      <input type="hidden" name="id_rdjk" value="<?php echo $row->id_rdjk;?>">
        <div class="form-group">
          <label for="inputpegawai" class="col-sm-2 control-label">Cari Pegawai</label>
          <div class="col-sm-10">
            <select class="form-control" name="id_pegawai">
              <option>---Pilih---</option>
                <?php 
                  foreach($pegawai as $rowpg){  
                    echo "<option value=".$rowpg->id_pegawai."> ".$rowpg->nama_pegawai."</option>";} ?>
            </select>
          </div>
        </div>
         <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Save changes</button>
    </div>
  </div>
</div>
</div>

        
<?php
  $this->load->view('admin/footer.php');
  ?>