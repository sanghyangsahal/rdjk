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
            <?php echo form_open('rdjk/pro_tambah_rapat'); ?>
        
          <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Kegiatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_kegiatan">
                  </div>
                </div>

                <div class="form-group">
                <label for="tglmulai" class="col-sm-2 control-label">Tanggal Mulai</label>
                <div class="col-sm-10">
                  <input class="form-control" name="tgl_mulai" id="tglmulai">
                </div>
                </div>

                <div class="form-group">
                <label for="tglselesai" class="col-sm-2 control-label">Tanggal Selesai</label>
                <div class="col-sm-10">
                  <input class="form-control" name="tgl_selesai" id="tglselesai">
                </div>
                </div>

                <div class="form-group">
                <label for="tempatrapat" class="col-sm-2 control-label">Tempat Rapat</label>
                <div class="col-sm-4">
                  <select class="form-control" name="id_ruang">
                      <option value="">Pilih</option>
                      <option value="1">Ruang 1</option>
                      <option value="2">Ruang 2</option>
                      <option value="3">Ruang 3</option>
                      <option value="4">Ruang 4</option>
                  </select>
                </div>
                </div>

                <div class="form-group">
                <label for="jml_peserta" class="col-sm-2 control-label">Jumlah Peserta</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="jml_peserta">
                </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-danger" href="<?php echo base_url('rdjk/');?>">Batal</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
        <?php echo form_close(); ?>
        <!-- /.box-header -->
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