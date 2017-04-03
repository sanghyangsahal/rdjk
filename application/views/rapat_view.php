<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admin/header.php');
  $this->load->view('admin/sidebar.php');
?>


<div class="row">
        <div class="col-xs-2">
          <a class="btn btn-primary btn-social" href="<?php echo base_url();?>rapat/addrapat">
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
                  <th>No</th>
                  <th>Nama Rapat</th>
                  <th>Ruang Rapat</th>
                  <th>Rincian</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                foreach ($rapat as $row) { 
                	$id = $row['id'];
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $row['nama_rapat']; ?></td>
                  <td><?php echo $row['id_ruang']; ?></td>
                  <td><?php echo $row['id_rincian']; ?></td>
                  <td>
                    <a href="<?php echo base_url();?>rapat/editrapat/<?php echo $row["id"] ?>"><i class="material-icons">border_color</i></a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="<?php echo base_url('rapat/delete/'.$id); ?>" onclick="return confirm('Kamu yakin mau hapus data ini ?');"> <i class="material-icons">delete</i></a> &nbsp;
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

