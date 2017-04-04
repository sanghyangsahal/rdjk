<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: afm
 * Date: 04/04/2017
 * Time: 14.20
 */
class Ajax_model extends CI_Model
{
    public function listing()
    {
        $data = $this->db->query(
            "select a.*,
				b.nama_ruang
				from rdjk a
				left join rapat_ruang b on b.id_ruang = a.id_ruang");
        return $data;
    }

    public function input_data($data, $table){
        $this->db->insert($table, $data);
    }

    function edit_data($where, $table) {
        return $this->db->get_where($table, $where);
    }

    function update_data ($where, $data, $table){
        $this->db->where($where);
        $this->db->update('rdjk', $data);
    }

    function update ($where, $data, $table) {

        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function ruang () {
        $data = $this->db->query("SELECT * FROM rapat_ruang order by id_ruang asc");
        return $data;
    }

    function pegawai() {
        $sql = $this->db->query("SELECT * FROM pegawai where status = '1' order by nama_pegawai asc");
        return $sql;
    }

    function delete($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    function ambil_where($where, $table){
        return $this->db->get_where($table, $where);
    }

    function rdjk_detail ($where, $table){
        return $this->db->get_where($table, $where);
    }

    function tambah_peserta($data, $table){
        $this->db->insert($table, $data);
    }
    function get_detail($data) {
        $this->db->select('*');
        $this->db->from('rapat_pegawai');
        $this->db->join('pegawai','rapat_pegawai.id_pegawai = pegawai.id_pegawai', 'left');
        $this->db->join('rdjk', 'rapat_pegawai.id_rdjk = rdjk.id_rdjk', 'left');
        $this->db->join('rapat_ruang', 'rdjk.id_ruang = rapat_ruang.id_ruang', 'left');
        $this->db->join('golongan', 'pegawai.id_golongan = golongan.id_golongan', 'left');
        $this->db->where('rdjk.id_rdjk', $data['id_rdjk']);
        $query = $this->db->get();
        return $query->result();
    }

    function opt_ruang($data) {
        $this->db->select('*');
        $this->db->from('rapat_ruang');
        $this->db->join('rdjk','rapat_ruang.id_ruang = rdjk.id_ruang', 'left');
        $this->db->where('rdjk.id_rdjk', $data['id_rdjk']);
        $query = $this->db->get();
        return $query->result();
    }

    function get_detail_rdjk($id)
    {
        $this->db->select('*');
        $this->db->from('rapat_pegawai');
        $this->db->join('pegawai','rapat_pegawai.id_pegawai = pegawai.id_pegawai', 'left');
        $this->db->join('rdjk', 'rapat_pegawai.id_rdjk = rdjk.id_rdjk', 'left');
        $this->db->join('rapat_ruang', 'rdjk.id_ruang = rapat_ruang.id_ruang', 'left');
        $this->db->join('golongan', 'pegawai.id_golongan = golongan.id_golongan', 'left');
        $this->db->where('rdjk.id_rdjk', $id);
        $query = $this->db->get();
        return $query;
    }
}