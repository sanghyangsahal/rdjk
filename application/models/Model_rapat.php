<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Model_rapat extends CI_Model
{
	
	public function getrapat()
	{
		$sql = 'SELECT * from tb_rapat';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function insertrapat($data)
	{
		return $this->db->insert('tb_rapat', $data);
	}

	public function update_detail($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('student', $data);
		return $this->db->affected_rows();
	}

	public function delete_detail($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_rapat');
	
}
}