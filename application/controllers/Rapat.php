<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Rapat extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('model_rapat');
	}

	public function index()
	{
		$data['rapat'] = $this->model_rapat->getrapat();
		$this->load->view('rapat_view', $data);
	}

	public function addrapat()
	{
		$this->load->view('rapat_add');
	}

	public function addrapatdata()
	{
		if($_POST)
		{
			$data = array('nama_rapat' => $this->input->post('nama_rapat'),
					'id_ruang' => $this->input->post('id_ruang'),
					'id_rincian' => $this->input->post('id_rincian'));
			if ($this->model_rapat->insertrapat($data)) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Rapat Berhasil Ditambahkan.</div>');
				redirect(base_url().'rapat','refresh');
			}
			else
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Rapat Gagal Ditambahkan!!!!</div>');
				redirect(base_url().'rapat/addrapat','refresh');
			}
		}
		else
		{
			redirect(base_url());
		}
	}

	public function editrapat()
	{
		$this->load->view('rapat_edit');
	}

	public function updaterapatdetail($id)
	{
		if ($_POST) {
			$data = array('nama_rapat' => $this->input->post('name'),
				'id_ruang' => $this->input->post('d_ruang'),
				'id_rincian' => $this->input->post('id_rincian'));
			if ($this->model_rapat->updaterapatdetail($data, $id) > 0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Student details updated successfully.</div>');
					redirect(base_url().'rapat/editrapat/'.$id, 'refresh');
			}
			else{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please Try Again...</div>');
       redirect(base_url().'rapat/editrapat/'.$id, 'refresh');
			}
		}
		else{
			redirect(base_url().'rapat/editrapat/'.$id);
		}
	}

	public function deleterapatdetail($id)
	{
		$this->model_rapat->delete_detail($id);

		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Details  deleted successfully!</div>');

		redirect(base_url());
	}
}