<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once(APPPATH."third_party/PhpWord/Autoloader.php");

use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;
Autoloader::register();
Settings::loadConfig();

class Ajax extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ajax_model','model');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function index()
    {
        $data['listing'] = $this->model->listing();
        $data['ruang'] = $this->model->ruang();
        $this->load->view('admin/ajax_v', $data);
    }

   /* public function tambah_rapat()
    {
        $data['ruang'] = $this->model_rdjk->ruang();
        $this->load->view('admin/rdjk_create');
    }*/

    public function pro_tambah_rapat()
    {
        $namakegiatan = $this->input->post('nama_kegiatan');
        $tglmulai = $this->input->post('tgl_mulai');
        $tglselesai = $this->input->post('tgl_selesai');
        $jumlahpeserta = $this->input->post('jml_peserta');
        $ruangrapat = $this->input->post('id_ruang');

        $data=array(
            'nama_kegiatan' => $namakegiatan,
            'tgl_mulai' => date('Y-m-d', strtotime($tglmulai)),
            'tgl_selesai' => date('Y-m-d', strtotime($tglselesai)),
            'jml_peserta' => $jumlahpeserta,
            'id_ruang' => $ruangrapat
        );
        $this->model_rdjk->input_data($data, 'rdjk');
        if($data){
            echo "<script language=javascript>
                    alert('Penambahan RDJK Berhasil');
                    window.location='".base_url('rdjk')."';
                    </script>";
        }else{
            echo "<script language=javascript>
                    alert('Penambahan RDJK Gagal!');
                    window.location='".base_url('rdjk')."';
                    </script>";
        }
    }


    function edit($id_rdjk) {

        $where=array('id_rdjk' => $id_rdjk);
        $data['rdjk'] = $this->model_rdjk->ambil_where($where,'rdjk')->result();
        $data['opt_ruang'] = $this->model_rdjk->ruang()->result();
        $this->load->view('admin/rdjk_edit', $data);
        /*
                    $where = array( 'id_rdjk' => $id);
        $data['rdjk'] = $this->model_rdjk->edit_data($where, 'rdjk')->result();
        $data['ruang'] = $this->model_rdjk->ruang()->result();
        $this->load->view('admin/rdjk_edit', $data);
                     */
    }

    function proses_edit(){
        $id_rdjk        = $this->input->post('id_rdjk');
        $nama_kegiatan  = $this->input->post('nm_kegiatan');
        $tgl_mulai      = $this->input->post('tglmulai');
        $tgl_selesai    = $this->input->post('tglselesai');
        $jml_peserta    = $this->input->post('jml_peserta');
        $id_ruang       = $this->input->post('id_ruang');

        $data = array(
            'nama_kegiatan' => $nama_kegiatan,
            'tgl_mulai'	=> date('Y-m-d', strtotime($tgl_mulai)),
            'tgl_selesai'	=> date('Y-m-d', strtotime($tgl_selesai)),
            'jml_peserta'	=> $jml_peserta,
            'id_ruang'	=> $id_ruang
        );
        $where=array('id_rdjk'=>$id_rdjk);
        $this->model_rdjk->update($where,$data,'rdjk');

        if($data){
            echo "<script language=javascript>
				alert('Penambahan RDJK Berhasil');
				window.location='".base_url('rdjk')."';
		        </script>";
        }else{
            echo "<script language=javascript>
				alert('Penambahan RDJK Gagal!');
				window.location='".base_url('rdjk')."';
		        </script>";
        }
    }

    function update() {
        $id_rdjk 	= $this->input->post('id_rdjk');
        $nama_kegiatan 	= $this->input->post('nm_kegiatan');
        $tgl_mulai 	= $this->input->post('tgl_mulai');
        $tgl_selesai 	= $this->input->post('tgl_selesai');
        $jml_peserta 	= $this->input->post('jml_peserta');
        $id_ruang	= $this->input->post('id_ruang');

        $data = array(
            'nama_kegiatan' => $nama_kegiatan,
            'tgl_mulai'		=> $tgl_mulai,
            'tgl_selesai'	=> $tgl_selesai,
            'jml_peserta'	=> $jml_peserta,
            'id_ruang' 		=> $id_ruang
        );
        $table = 'rdjk';

        $where = array(
            'id_rdjk' => $id_rdjk);

        $this->model_rdjk->update_data($where, $data, $table);
        if($data){
            echo "<script language=javascript>
                    alert('Perubahan RDJK Berhasil');
                    window.location='".base_url('rdjk')."';
                    </script>";
        }elseif($where){
            echo "<script language=javascript>
                    alert('Perubahan RDJK Berhasil');
                    window.location='".base_url('rdjk')."';
                    </script>";
        }elseif ('rdjk') {
            echo "<script language=javascript>
                    alert('Perubahan RDJK Berhasil');
                    window.location='".base_url('rdjk')."';
                    </script>";
        }else{
            echo "<script language=javascript>
                    alert('Perubahan RDJK Gagal!');
                    window.location='".base_url('rdjk')."';
                    </script>";
        }
    }

    function delete($id_rdjk)
    {
        $where=array('id_rdjk' => $id_rdjk);
        $this->model_rdjk->delete($where, 'rdjk');
        //redirect('rdjk/');
        if($where){
            echo "<script language=javascript>
				alert('Data Berhasil di Hapus!');
				window.location='".base_url('rdjk')."';
		        </script>";
        }else{
            echo "<script language=javascript>
				alert('Data gagal di Hapus!');
				window.location='".base_url('rdjk')."';
		        </script>";
        }
    }

    function rdjk_detail()
    {
        $id = $this->uri->segment(3);
        //$data['id_rdjk'] = $id;
        $where=array('id_rdjk' => $id);
        $data['id_rdjk'] = $id;
        $data['rdjk_detail'] = $this->model_rdjk->rdjk_detail($where,'rdjk')->result();
        $data['pegawai'] = $this->model_rdjk->pegawai()->result();
        $data['hasiltransaksi'] = $this->model_rdjk->get_detail($data);
        $data['opt_ruang'] = $this->model_rdjk->opt_ruang($data);
        $this->load->view('admin/rdjk_detail', $data);
        //$this->nativesession->set_flash_session('rdjk', $id);

    }

    function tambah_peserta(){

        $id_rdjk = $this->input->post('id_rdjk');
        $id_pegawai = $this->input->post('id_pegawai');

        $data = array(
            'id_rdjk' => $id_rdjk,
            'id_pegawai' => $id_pegawai,
            'status' => '1'
        );
        $this->model_rdjk->tambah_peserta($data, 'rapat_pegawai');
        if($data){
            echo "<script language=javascript>
				alert('Penambahan RDJK Berhasil');
				window.location='".base_url('rdjk')."';
		        </script>";
        }else{
            echo "<script language=javascript>
				alert('Penambahan RDJK Gagal!');
				window.location='".base_url('rdjk')."';
		        </script>";
        }

    }

    function fetch_data()
    {
        $id = $this->uri->segment(3);
        $where = array('id_rdjk' => $id);
        $data['id_rdjk'] = $id;
        $data['bahan'] = $this->model_rdjk->pegawai()->result();
        $this->load->library('CreateWordDoc');
        foreach ($data['bahan'] as $key) {
            echo $key->nama_pegawai;
            $arrayValue = array(
                'id_pegawai' => $key->id_pegawai,
                'nama_pegawai' => $key->nama_pegawai,
                'nip' => $key->nip,
                'jabatan' => $key->jabatan,
            );
            $templateSrc = 'resources/templates/template_.docx';
            $destination = 'uploads/undangan_.docx';
            $source = 'uploads/undangan_.docx';
            $output = 'undangan_.docx';
            $this->createworddoc->CreateWordDoc($templateSrc, $destination, $arrayValue);
        }
        $this->createworddoc->downloadWordDoc($source, $output);

    }

    function tester()
    {
        $id_rdjk = $this->nativesession->get_flash_session('rdjk');
        $this->load->model('model_rdjk');
        $data = $this->model_rdjk->get_detail_rdjk($id_rdjk);
        foreach ($data as $row){
            echo $row->id_rdjk;
        }
    }

    function print_undangan($id_rdjk) {
        $templateSrc = ('resources/templates/UNDANGAN.docx');
        $destination = ('resources/hasil_.docx');
        $source = 'resources/generating_doc/generate_hasil.docx';
        $output = 'hasil_.docx';
        $id = $this->uri->segment(3);
        $this->load->model('model_rdjk','rdjk');
        $data = $this->rdjk->get_detail_rdjk($id);
        foreach ($data->result() as $row){
            $arrayValue=array(
                'nama_kegiatan' => $row->nama_kegiatan,
                'tgl_header' => $this->tanggalhelper->convertFullDate($row->tgl_mulai),
                'tgl_mulai' => $this->tanggalhelper->convertDateOnly($row->tgl_mulai),
                'tgl_selesai' => $this->tanggalhelper->convertDateFullMonth($row->tgl_selesai),
                'nama_ruang' => $row->nama_ruang,
                'hari_mulai' => $this->tanggalhelper->getNamaHari($row->tgl_mulai),
                'hari_selesai' => $this->tanggalhelper->getNamaHari($row->tgl_selesai),
            );
        }
        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor($templateSrc);
        foreach ($arrayValue as $key => $value){
            $phpWord->setValue($key, $value);
        }
        $phpWord->saveAs($destination);
        exit;
    }
}
