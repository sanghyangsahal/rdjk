<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  $this->load->view('admin/header.php');
  $this->load->view('admin/sidebar.php');
  ?>
        <!-- Your Page Content Here -->
      <div class="row">
        <div class="col-xs-2">
          <a class="btn btn-primary btn-social" href="<?php echo base_url('rdjk/tambah_rapat');?>">
            <i class="fa fa-plus"></i> Tambah
          </a>
        </div> </br></br>
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Daftar RDJK</h3>
            </div>
            <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
            <thead>
              <tr>
                  <th>NO</th>
                  <th>Nama Kegiatan</th>
                  <th>Tempat</th>
                  <th>Jumlah Peserta</th>
                  <th>tgl mulai</th>
                  <th>tgl selesai</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                foreach ($listing->result() as $row) { ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $row->nama_kegiatan; ?></td>
                  <td><?php echo $row->nama_ruang; ?></td>
                  <td><?php echo $row->jml_peserta; ?></td>
                  <td><?php echo $row->tgl_mulai; ?></td>
                  <td><?php echo $row->tgl_selesai; ?></td>
                  <td>
                    <!--<a href="<?php echo base_url('rdjk/edit/'.$row->id_rdjk); ?>" title="Edit"><i class="material-icons">border_color</i></a>-->
                    <a href="<?php echo base_url('rdjk/edit/'.$row->id_rdjk);?>" title="Edit"><i class="material-icons">border_color</i></a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="<?php echo base_url('rdjk/delete/'.$row->id_rdjk); ?>" onclick="return confirm('Kamu yakin mau hapus data ini ?');"> <i class="material-icons">delete</i></a> &nbsp;
                    <a href="<?php echo base_url('rdjk/rdjk_detail/'.$row->id_rdjk); ?>" title="detail"> <i class="material-icons">supervisor_account</i></a>
                  </td>
                </tr>

                <?php
                $no++;
                }?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

  </div>

        
<?php
  $this->load->view('admin/footer.php');
  ?>