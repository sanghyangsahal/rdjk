<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  $this->load->view('admin/header.php');
  $this->load->view('admin/sidebar.php');
  ?>
        <!-- Your Page Content Here -->
      <div class="row">
          <div class="col-xs-2">
              <!--<a class="btn btn-primary btn-social" href="<?php /*echo base_url('rdjk/tambah_rapat');*/?>">-->
              <!-- <a class="btn btn-primary btn-social" data-toggle="modal" data-target="#tambahRapat">
                  <i class="fa fa-plus"></i> Tambah
              </a> -->
              <button class="btn btn-primary" onclick="tambah_rapat()"><i class="fa fa-plus"></i>Tambah</button>
          </div> </br></br>
          <div class="col-xs-12">
              <div class="box box-info">
                  <div class="box-header">
                      <h3 class="box-title">Daftar RDJK</h3>
                  </div>
                  <div class="box-body">
                      <table id="table_rdjk" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama Kegiatan</th>
                              <th>Tempat</th>
                              <th>Jumlah Peserta</th>
                              <th>Tgl Mulai</th>
                              <th>Tgl Selesai</th>
                              <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Nama Kegiatan</th>
                              <th>Tempat</th>
                              <th>Jumlah Peserta</th>
                              <th>Tgl Mulai</th>
                              <th>Tgl Selesai</th>
                              <th>Action</th>
                          </tr>
                          </tfoot>
                      </table>
                  </div>
                  <!-- /.box-body -->
              </div>
            <!-- /.box-body -->
          </div>
<?php
  $this->load->view('admin/footer.php');
  ?>

<!-- Tambah Rapat -->
<div id="tambahRapat" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah RDJK</h4>
            </div>
            <?php echo form_open('rdjk/pro_tambah_rapat',['class' => 'form-horizontal','role' => 'form']); ?>
            <div class="modal-body">
                <!--<form class="form-horizontal" role="form" method="post" action="<?php /*echo site_url('http://rdjk/pro_tambah_rapat')*/?>">-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_kegiatan">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tglmulai" class="col-sm-2 control-label">Tanggal Mulai</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tgl_mulai" id="tglmulai">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tglselesai" class="col-sm-2 control-label">Tanggal Selesai</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tgl_selesai" id="tglselesai">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tempatrapat" class="col-sm-2 control-label">Tempat Rapat</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="id_ruang">
                                <option value="">Pilih</option>
                                <option value="1">Ruang Rapat biro Kepegawaian</option>
                                <option value="2">Ruang Rapat Kepala BUA</option>
                                <option value="3">Ruang Rapat Sekma</option>
                                <option value="4">Ruang Rapat Mudjono</option>
                                <option value="5">Ruang rapat Wiryono</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jml_peserta" class="col-sm-2 control-label">Jumlah Peserta</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="jml_peserta">
                        </div>
                    </div>
                <!--</form>-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>

        <!-- Ubah Rapat -->
        <div id="ubahRapat" tabindex="-1" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah RDJK</h4>
                    </div>
                    <?php echo form_open('rdjk/pro_tambah_rapat',['class' => 'form-horizontal','role' => 'form']); ?>
                    <div class="modal-body">
                        <!--<form class="form-horizontal" role="form" method="post" action="<?php /*echo site_url('http://rdjk/pro_tambah_rapat')*/?>">-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Kegiatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tglmulai" class="col-sm-2 control-label">Tanggal Mulai</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tgl_mulai" id="tglmulai">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tglselesai" class="col-sm-2 control-label">Tanggal Selesai</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tgl_selesai" id="tglselesai">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tempatrapat" class="col-sm-2 control-label">Tempat Rapat</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="id_ruang">
                                    <option value="">Pilih</option>
                                    <option value="1">Ruang Rapat biro Kepegawaian</option>
                                    <option value="2">Ruang Rapat Kepala BUA</option>
                                    <option value="3">Ruang Rapat Sekma</option>
                                    <option value="4">Ruang Rapat Mudjono</option>
                                    <option value="5">Ruang rapat Wiryono</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jml_peserta" class="col-sm-2 control-label">Jumlah Peserta</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jml_peserta" id="jmlpeserta">
                            </div>
                        </div>
                        <!--</form>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
        <?php echo form_close(); ?>

    </div>
</div>
<script type="text/javascript">

  var table;
  var save_method; //for save method string

  $(document).ready(function(){

    //datatables
    table = $('#table_rdjk').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('ajax/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

  });

  function tambah_rapat()
  {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
  }
</script>
