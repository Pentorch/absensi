<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class Mrekap extends CI_Model
{
	public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

    public function cari($keyword)
    {
    	$this->db->select("absen.*, kelas.kelas, siswa.nama, jurusan.jurusan, guru.nama_guru, jam.jam, mapel.id_mapel, mapel.mapel, COUNT(IF(absen.absen='Hadir',absen,NULL)) as Hadir, COUNT(IF(absen.absen='Alfa',absen,NULL)) as Alfa, COUNT(IF(absen.absen='Sakit',absen,NULL)) as Sakit, COUNT(IF(absen.absen='Izin',absen,NULL)) as Izin, COUNT(IF(absen.absen='Terlambat',absen,NULL)) as Terlambat");
    	$this->db->from('siswa');
    	$this->db->join('kelas','kelas.id_kelas = siswa.id_kelas','INNER'); 
    	$this->db->join('absen','siswa.nis = absen.nis','INNER');
    	$this->db->join('guru','guru.id_guru = absen.id_guru','INNER');
    	$this->db->join('jurusan','siswa.id_jur = jurusan.id_jur','INNER');
    	$this->db->join('jam','absen.id_jam = jam.id_jam','INNER');
        $this->db->join('mapel','absen.id_mapel = mapel.id_mapel','INNER');
    	$this->db->group_by('absen.nis');
    	$this->db->like('mapel.id_mapel', $keyword)->or_like('mapel.id_mapel',$keyword);
		$query = $this->db->get();
		return $query->result();          
    }

    public function data()
    {
    	return $this->db->get('absen')->result();
    }

    public function guru()
    {
    	return $this->db->get('absen_guru')->result();
    }

    public function getguru($id_guru)
    {
        $this->db->select('guru.*, count(absen_guru.absen) as absen');
        $this->db->from('guru');
        $this->db->join('absen_guru','guru.id_guru = absen_guru.id_guru','INNER');
        $this->db->where('guru.id_guru', $id_guru);
        $query = $this->db->get();
        return $query->result();  
    }

    public function getguru2($id_guru)
    {
        $this->db->select('guru.*, count(absen_guru.absen) as absen');
        $this->db->from('guru');
        $this->db->join('absen_guru','guru.id_guru = absen_guru.id_guru','INNER');
        $this->db->where('guru.nip', $id_guru);
        $query = $this->db->get();
        return $query->result();  
    }

    public function getmapel()
    {
        $query = $this->db->get('mapel');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function rekap_guru($tanggal){
        $this->db->select('absen_guru.*, kelas.kelas, guru.*, jurusan.jurusan, jam.jam, mapel.mapel, mapel.id_mapel');
        $this->db->from('absen_guru');
        $this->db->join('kelas','kelas.id_kelas = absen_guru.id_kelas','INNER');
        $this->db->join('jam','jam.id_jam = absen_guru.id_jam','INNER');
        $this->db->join('guru','guru.id_guru = absen_guru.id_guru','INNER');
        $this->db->join('jurusan','absen_guru.id_jur = jurusan.id_jur','INNER');
        $this->db->join('mapel','mapel.id_mapel = absen_guru.id_mapel','INNER');
        $this->db->join('hari','hari.id_hari = absen_guru.id_hari','INNER');
        //$this->db->order_by('absen_guru.tanggal');
        $this->db->like('absen_guru.tanggal', $tanggal);
        $query = $this->db->get();
        return $query->result();  
    }

    public function rekap_siswa($tanggal,$kls,$jrs){
        $this->db->select("absen.*, kelas.kelas, siswa.*, jurusan.jurusan, jam.jam, mapel.mapel, mapel.id_mapel, COUNT(IF(absen.absen='Hadir',absen,NULL)) as Hadir, COUNT(IF(absen.absen='Alfa',absen,NULL)) as Alfa, COUNT(IF(absen.absen='Sakit',absen,NULL)) as Sakit, COUNT(IF(absen.absen='Izin',absen,NULL)) as Izin, COUNT(IF(absen.absen='Terlambat',absen,NULL)) as Terlambat, date(absen.tanggal) as tgl");
        $this->db->from('absen');
        $this->db->join('kelas','kelas.id_kelas = absen.id_kelas','INNER');
        $this->db->join('siswa','siswa.id_siswa = absen.id_siswa','INNER');
        $this->db->join('jurusan','absen.id_jur = jurusan.id_jur','INNER');
        $this->db->join('mapel','mapel.id_mapel = absen.id_mapel','INNER');
        $this->db->join('jam','jam.id_jam = mapel.id_jam','INNER');
        $this->db->group_by('absen.id_siswa');
        $this->db->like('absen.tanggal', $tanggal);
        $this->db->like('kelas.id_kelas', $kls);
        $this->db->like('jurusan.id_jur', $jrs);
        $query = $this->db->get();
        return $query->result();  
    }

    public function detail_guru($id_guru){
        $this->db->select('absen_guru.*, kelas.kelas, guru.nama_guru, jurusan.jurusan, jam.jam, mapel.mapel, mapel.id_mapel');
        $this->db->from('absen_guru');
        $this->db->join('kelas','kelas.id_kelas = absen_guru.id_kelas','INNER');
        $this->db->join('jam','jam.id_jam = absen_guru.id_jam','INNER');
        $this->db->join('guru','guru.id_guru = absen_guru.id_guru','INNER');
        $this->db->join('jurusan','absen_guru.id_jur = jurusan.id_jur','INNER');
        $this->db->join('mapel','mapel.id_mapel = absen_guru.id_mapel','INNER');
        $this->db->order_by('absen_guru.tanggal');
        $this->db->where('absen_guru.id_guru', $id_guru);
        $query = $this->db->get();
        return $query->result();  
    }

    public function detail_guru2($id_guru){
        $this->db->select('absen_guru.*, kelas.kelas, guru.nama_guru, jurusan.jurusan, jam.jam, mapel.mapel, mapel.id_mapel');
        $this->db->from('absen_guru');
        $this->db->join('kelas','kelas.id_kelas = absen_guru.id_kelas','INNER');
        $this->db->join('jam','jam.id_jam = absen_guru.id_jam','INNER');
        $this->db->join('guru','guru.id_guru = absen_guru.id_guru','INNER');
        $this->db->join('jurusan','absen_guru.id_jur = jurusan.id_jur','INNER');
        $this->db->join('mapel','mapel.id_mapel = absen_guru.id_mapel','INNER');
        $this->db->order_by('absen_guru.tanggal');
        $this->db->where('guru.nip', $id_guru);
        $query = $this->db->get();
        return $query->result();  
    }

    public function cari_guru(){
		$this->db->select("absen_guru.*, kelas.kelas, guru.*, jurusan.jurusan, jam.jam, mapel.mapel, mapel.id_mapel, COUNT(IF(absen_guru.absen='Hadir',absen,NULL)) as Hadir, COUNT(IF(absen_guru.absen='Alfa',absen,NULL)) as Alfa, COUNT(IF(absen_guru.absen='Sakit',absen,NULL)) as Sakit, COUNT(IF(absen_guru.absen='Izin',absen,NULL)) as Izin, COUNT(IF(absen_guru.absen='Terlambat',absen,NULL)) as Terlambat");
        $this->db->from('absen_guru');
        $this->db->join('kelas','kelas.id_kelas = absen_guru.id_kelas','INNER');
        $this->db->join('jam','jam.id_jam = absen_guru.id_jam','INNER');
        $this->db->join('guru','guru.id_guru = absen_guru.id_guru','INNER');
        $this->db->join('jurusan','absen_guru.id_jur = jurusan.id_jur','INNER');
        $this->db->join('mapel','mapel.id_mapel = absen_guru.id_mapel','INNER');
        $this->db->group_by('absen_guru.id_guru');
		$query = $this->db->get();
		return $query->result();  
	}

    public function listing(){
        $this->db->select('absen.*, kelas.kelas, siswa.*, jurusan.jurusan, guru.nama_guru, jam.jam, mapel.mapel');
        $this->db->from('siswa');
        $this->db->join('kelas','kelas.id_kelas = siswa.id_kelas','INNER');
        $this->db->join('absen','siswa.nis = absen.nis','INNER');
        $this->db->join('guru','guru.id_guru = absen.id_guru','INNER');
        $this->db->join('jurusan','siswa.id_jur = jurusan.id_jur','INNER');
        $this->db->join('jam','absen.id_jam = jam.id_jam','INNER');
        $this->db->join('mapel','guru.id_mapel = mapel.id_mapel','INNER');
        $this->db->order_by('nis','DESC');
        $query = $this->db->get();
        return $query->result();           
    }

    public function akhir()
    {
        $query = $this->db->query('select * from absen_guru');
        return $query->result();
    }

    public function detail($nis,$tanggal)
    {
        $this->db->select('absen.*, kelas.kelas, siswa.nama, jurusan.jurusan, guru.nama_guru, jam.jam, mapel.id_mapel, mapel.mapel');
        $this->db->from('siswa');
        $this->db->join('kelas','kelas.id_kelas = siswa.id_kelas','INNER');
        $this->db->join('absen','siswa.id_siswa = absen.id_siswa','INNER');
        $this->db->join('guru','guru.id_guru = absen.id_guru','INNER');
        $this->db->join('jurusan','siswa.id_jur = jurusan.id_jur','INNER');
        $this->db->join('mapel','absen.id_mapel = mapel.id_mapel','INNER');
        $this->db->join('jam','mapel.id_jam = jam.id_jam','INNER');
        $this->db->order_by('absen.id_siswa','DESC');
        $this->db->like('absen.tanggal', $tanggal);
        $this->db->where('siswa.nis', $nis);
        $query = $this->db->get();
        return $query->result();  
    }
}
