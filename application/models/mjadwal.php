<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class Mjadwal extends CI_Model
{
	public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

    public function listing(){
		$query = $this->db->query('select * from jam order by jam');
		return $query->result();          
	}

	 public function hari(){
		$query = $this->db->query('select * from hari order by id_hari');
		return $query->result();          
	}

	public function detail($id_jam)
	{
		$query = $this->db->get_where('jam',array('id_jam' => $id_jam));
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('jam',$data);
	}

	public function edit($data)
	{
		$this->db->where('id_jam',$data['id_jam']);
		$this->db->update('jam',$data);
	}

	public function delete($data)
	{
		$this->db->where('id_jam',$data['id_jam']);
		$this->db->delete('jam',$data);
	}

	public function mapel(){
    	$this->db->select('mapel.*, guru.nama_guru, jam.jam, kelas.kelas, jurusan.jurusan');
    	$this->db->from('mapel');
    	$this->db->join('guru','guru.id_guru = mapel.id_guru','INNER');
    	$this->db->join('jam','jam.id_jam = mapel.id_jam','INNER');
    	$this->db->join('kelas','kelas.id_kelas = mapel.id_kelas','INNER');
    	$this->db->join('jurusan','jurusan.id_jur = kelas.id_jur','INNER');
    	$this->db->order_by('mapel.id_jam','DESC');
		$query = $this->db->get();
		return $query->result();           
	}

	public function detail_mapel($id_mapel)
	{
		$query = $this->db->get_where('mapel',array('id_mapel' => $id_mapel));
		return $query->row();
	}

	public function akhir_mapel()
	{
		$query = $this->db->query('select * from mapel order by id_mapel');
		return $query->result();
	}

	public function tambah_mapel($data)
	{
		$this->db->insert('mapel',$data);
	}

	public function edit_mapel($data)
	{
		$this->db->where('id_mapel',$data['id_mapel']);
		$this->db->update('mapel',$data);
	}

	public function delete_mapel($data)
	{
		$this->db->where('id_mapel',$data['id_mapel']);
		$this->db->delete('mapel',$data);
	}

	public function jadwal(){
    	$this->db->select('jadwal.*, guru.nama_guru, jurusan.jurusan, kelas.kelas, jam.jam, mapel.*, hari.hari');
    	$this->db->from('jadwal');
    	$this->db->join('jurusan','jadwal.id_jur = jurusan.id_jur','INNER');
    	$this->db->join('kelas','kelas.id_kelas = jadwal.id_kelas','INNER');
    	$this->db->join('mapel','mapel.id_mapel = jadwal.id_mapel','INNER');
    	$this->db->join('jam','jam.id_jam = mapel.id_jam','INNER');
    	$this->db->join('guru','guru.id_guru = mapel.id_guru','INNER');
    	$this->db->join('hari','hari.id_hari = jadwal.id_hari','INNER');
    	$this->db->order_by('id_jadwal','DESC');
		$query = $this->db->get();
		return $query->result();           
	}

	public function jadwalh($hari){
    	$this->db->select('jadwal.*, guru.nama_guru, jurusan.jurusan, kelas.kelas, jam.jam, mapel.*, hari.hari');
    	$this->db->from('jadwal');
    	$this->db->join('jurusan','jadwal.id_jur = jurusan.id_jur','INNER');
    	$this->db->join('kelas','kelas.id_kelas = jadwal.id_kelas','INNER');
    	$this->db->join('mapel','mapel.id_mapel = jadwal.id_mapel','INNER');
    	$this->db->join('jam','jam.id_jam = mapel.id_jam','INNER');
    	$this->db->join('guru','guru.id_guru = mapel.id_guru','INNER');
    	$this->db->join('hari','hari.id_hari = jadwal.id_hari','INNER');
    	$this->db->order_by('id_jadwal','DESC');
    	$this->db->where('hari.hari', $hari);
		$query = $this->db->get();
		return $query->result();           
	}

	public function jadwal_a($user){
    	$this->db->select('jadwal.*, guru.nama_guru, jurusan.jurusan, kelas.kelas, jam.jam, mapel.*, hari.hari');
    	$this->db->from('jadwal');
    	$this->db->join('jurusan','jadwal.id_jur = jurusan.id_jur','INNER');
    	$this->db->join('kelas','kelas.id_kelas = jadwal.id_kelas','INNER');
    	$this->db->join('mapel','mapel.id_mapel = jadwal.id_mapel','INNER');
    	$this->db->join('jam','jam.id_jam = mapel.id_jam','INNER');
    	$this->db->join('guru','guru.id_guru = mapel.id_guru','INNER');
    	$this->db->join('hari','hari.id_hari = jadwal.id_hari','INNER');
    	$this->db->order_by('id_jadwal','DESC');
    	$this->db->where('guru.nip', $user);
		$query = $this->db->get();
		return $query->result();           
	}

	public function detail_jadwal($id_jadwal)
	{
		$query = $this->db->get_where('jadwal',array('id_jadwal' => $id_jadwal));
		return $query->row();
	}

	public function akhir_jadwal()
	{
		$query = $this->db->query('select * from jadwal');
		return $query->row();
	}

	public function tambah_jadwal($data)
	{
		$this->db->insert('jadwal',$data);
	}

	public function edit_jadwal($data)
	{
		$this->db->where('id_jadwal',$data['id_jadwal']);
		$this->db->update('jadwal',$data);
	}

	public function delete_jadwal($data)
	{
		$this->db->where('id_jadwal',$data['id_jadwal']);
		$this->db->delete('jadwal',$data);
	}

	public function get_jur()
	{
		$this->db->select('*');
    	$this->db->from('jurusan');
    	$query = $this->db->get();
		return $query->result();
	}

	public function get_kelas()
	{
		//joinkan tabel kelas dan jurusan
		$this->db->order_by('kelas','asc');
		$this->db->join('jurusan','jurusan.id_jur = kelas.id_jur');
		return $this->db->get('kelas')->result();
	}

	public function get_mapel()
	{
		//joinkan tabel kelas dan mapel
		$this->db->order_by('mapel','asc');
		$this->db->join('kelas','mapel.id_kelas = kelas.id_kelas');
		return $this->db->get('mapel')->result();
	}

	//untuk edit ambil dari id level paling bawah
	public function get_selected($id_mapel)
	{
		$this->db->where('id_mapel',$id_mapel);
		$this->db->join('kelas','mapel.id_kelas = kelas.id_kelas');
		$this->db->join('jurusan','kelas.id_jur = jurusan.id_jur');
		return $this->db->get('mapel')->row();
	}
}

