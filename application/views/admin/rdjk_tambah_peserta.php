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
            <?php echo form_open('rdjk/pro_tambah_peserta'); ?>
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">NIP</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nip">
            </div>
          </div>
          <div class="form-group">
            <label for="tglmulai" class="col-sm-2 control-label">Nama Peserta</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_peserta">
            </div>
          </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <a class="btn btn-danger" href="<?php echo base_url('rdjk/');?>">Batal</a>
          <button type="submit" class="btn btn-info pull-right">Simpan</button>
        </div><!-- /.box-footer -->
        <?php echo form_close(); ?>
        <!-- /.box-header -->
        </div>

    </section>
    <!-- /.content -->
  </div>

        
<?php
  $this->load->view('admin/footer.php');
  ?>