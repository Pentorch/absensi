<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class Msiswa extends CI_Model
{
	public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

    public function listing(){
    	$this->db->select('siswa.*, kelas.kelas, jurusan.jurusan');
    	$this->db->from('siswa');
    	$this->db->join('kelas','kelas.id_kelas = siswa.id_kelas','INNER');
    	$this->db->join('jurusan','siswa.id_jur = jurusan.id_jur','LEFT');
    	$this->db->order_by('id_kelas','DESC');
		$query = $this->db->get();
		return $query->result();           
	}

	public function detail($nis)
	{
		$query = $this->db->get_where('siswa',array('nis' => $nis));
		return $query->row();
	}

	public function akhir()
	{
		$query = $this->db->query('select * from siswa');
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('siswa',$data);
	}

	public function edit($data)
	{
		$this->db->where('nis',$data['nis']);
		$this->db->update('siswa',$data);
	}

	public function delete($data)
	{
		$this->db->where('nis',$data['nis']);
		$this->db->delete('siswa',$data);
	}
}
