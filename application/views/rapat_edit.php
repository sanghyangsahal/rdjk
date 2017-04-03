<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->view('admin/header.php');
  $this->load->view('admin/sidebar.php');
  ?>
        <!-- Your Page Content Here -->
        <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">RDJK</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <?php echo $this->session->flashdata('msg'); ?>
        <?php
          foreach ($rapat as $key => $value) { ?>
        <form class="form-horizontal" action="<?php echo base_url('');?>rapat/updaterapatdetail/<?php echo $value['id']; ?>" method="post">
          <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Rapat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_rapat" value="<?php echo $value ['nama_rapat'] ?>">
                  </div>
                </div>

                

                <div class="form-group">
                <label for="id_ruang" class="col-sm-2 control-label">id_ruang</label>
                <div class="col-sm-10">
                  <input class="form-control" name="id_ruang" value="<?php echo $value ['id_ruang'] ?>">
                </div>
                </div>

                <div class="form-group">
                <label for="id_rincian" class="col-sm-2 control-label">id_rincian</label>
                <div class="col-sm-10">
                  <input class="form-control" name="id_rincian" value="<?php echo $value ['id_rincian'] ?>">
                </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-danger" href="<?php echo base_url('rdjk/rapat');?>">Batal</a>
                <input type="submit" class="form-control btn btn-primary pull-right" id="submit" value="Simpan">
              </div>
              <!-- /.box-footer -->
        </form>
        <!-- /.box-header -->
        <?php }?>
        </div>

        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Peserta Rapat</h3>
              <p></p>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>NO</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>Golongan</th>
                </tr>
                <tr>
                  <td>1</td>
                  <td>1301110001</td>
                  <td>Ahmad Fuady Mustahal</td>
                  <td></td>
                  <td></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

        
<?php
  $this->load->view('admin/footer.php');
  ?>