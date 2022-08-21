<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class Mkelas extends CI_Model
{
	public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

    public function listing(){
    	$this->db->select('kelas.*, guru.nama_guru, jurusan.jurusan');
    	$this->db->from('kelas');
    	$this->db->join('guru','guru.id_guru = kelas.id_guru','INNER');
    	$this->db->join('jurusan','kelas.id_jur = jurusan.id_jur','LEFT');
    	$this->db->order_by('id_kelas','DESC');
		$query = $this->db->get();
		return $query->result();           
	}

	public function detail($id_kelas)
	{
		$query = $this->db->get_where('kelas',array('id_kelas' => $id_kelas));
		return $query->row();
	}

	public function akhir()
	{
		$query = $this->db->query('select * from kelas');
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('kelas',$data);
	}

	public function edit($data)
	{
		$this->db->where('id_kelas',$data['id_kelas']);
		$this->db->update('kelas',$data);
	}

	public function delete($data)
	{
		$this->db->where('id_kelas',$data['id_kelas']);
		$this->db->delete('kelas',$data);
	}
}
