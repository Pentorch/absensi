<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class Mabsen extends CI_Model
{
	public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

    public function listing(){
    	$this->db->select('absen.*, kelas.kelas, siswa.nama, jurusan.jurusan, guru.nama_guru, jam.jam');
    	$this->db->from('siswa');
    	$this->db->join('kelas','kelas.id_kelas = siswa.id_kelas','INNER');
    	$this->db->join('absen','siswa.id_siswa = absen.id_siswa','INNER');
    	$this->db->join('guru','guru.id_guru = absen.id_guru','INNER');
    	$this->db->join('jurusan','siswa.id_jur = jurusan.id_jur','INNER');
    	$this->db->join('jam','absen.id_jam = jam.id_jam','LEFT');
    	$this->db->order_by('nis','DESC');
    	//$this->db->like('siswa.nama','s');
		$query = $this->db->get();
		return $query->result();           
	}

	public function guru(){
		$this->db->select('absen_guru.*, kelas.kelas, guru.nama_guru, jurusan.jurusan, jam.jam, mapel.mapel');
    	$this->db->from('absen_guru');
    	$this->db->join('kelas','kelas.id_kelas = absen_guru.id_kelas','INNER');
    	$this->db->join('jam','jam.id_jam = absen_guru.id_jam','INNER');
    	$this->db->join('guru','guru.id_guru = absen_guru.id_guru','INNER');
    	$this->db->join('jurusan','absen_guru.id_jur = jurusan.id_jur','INNER');
    	$this->db->join('mapel','mapel.id_mapel = absen_guru.id_mapel','INNER');
    	$this->db->order_by('absen_guru.tanggal');
    	//$this->db->like('absen.tanggal',$tgl);
    	//$this->db->limit('1');
		$query = $this->db->get();
		return $query->result();  
	}

	public function detail($nis,$mapel)
	{
		$this->db->select('absen.*, kelas.kelas, siswa.nama, jurusan.jurusan, guru.nama_guru, jam.jam, mapel.id_mapel, mapel.mapel');
    	$this->db->from('siswa');
    	$this->db->join('kelas','kelas.id_kelas = siswa.id_kelas','INNER');
    	$this->db->join('absen','siswa.id_siswa = absen.id_siswa','INNER');
    	$this->db->join('guru','guru.id_guru = absen.id_guru','INNER');
    	$this->db->join('jurusan','siswa.id_jur = jurusan.id_jur','INNER');
    	$this->db->join('mapel','absen.id_mapel = mapel.id_mapel','INNER');
    	$this->db->join('jam','mapel.id_jam = jam.id_jam','INNER');
    	$this->db->order_by('nis','DESC');
    	$this->db->where('mapel.id_mapel', $mapel);
    	$this->db->where('siswa.nis', $nis);
		$query = $this->db->get();
		return $query->result();  
	}

	public function carii($key)
	{
		$this->db->select('absen.*, kelas.kelas, siswa.*, jurusan.jurusan, guru.nama_guru, jam.jam, mapel.id_mapel, mapel.mapel');
    	$this->db->from('siswa');
    	$this->db->join('kelas','kelas.id_kelas = siswa.id_kelas','INNER');
    	$this->db->join('absen','siswa.id_siswa = absen.id_siswa','INNER');
    	$this->db->join('guru','guru.id_guru = absen.id_guru','INNER');
    	$this->db->join('jurusan','siswa.id_jur = jurusan.id_jur','INNER');
    	$this->db->join('mapel','absen.id_mapel = mapel.id_mapel','INNER');
    	$this->db->join('jam','mapel.id_jam = jam.id_jam','INNER');
    	$this->db->order_by('siswa.nis','DESC');
    	$this->db->like('siswa.nisn', $key)->or_like('siswa.nis',$key);
		$query = $this->db->get();
		return $query->result();  
	}

	public function getsiswa($nis)
	{
		$this->db->select('siswa.*, kelas.id_kelas, kelas.kelas, jurusan.id_jur, jurusan.jurusan');
    	$this->db->from('siswa');
    	$this->db->join('kelas','kelas.id_kelas = siswa.id_kelas','INNER');
    	$this->db->join('jurusan','siswa.id_jur = jurusan.id_jur','INNER');
    	$this->db->where('siswa.nis', $nis);
		$query = $this->db->get();
		return $query->result();  
	}

	public function siswa($key)
	{
		$this->db->select('siswa.*, kelas.id_kelas, kelas.kelas, jurusan.id_jur, jurusan.jurusan');
    	$this->db->from('siswa');
    	$this->db->join('kelas','kelas.id_kelas = siswa.id_kelas','INNER');
    	$this->db->join('jurusan','siswa.id_jur = jurusan.id_jur','INNER');
    	$this->db->like('siswa.nisn', $key)->or_like('siswa.nis',$key);
		$query = $this->db->get();
		return $query->result();  
	}

	public function detail_absen($id_absen)
	{
		$query = $this->db->get_where('absen',array('id_absen' => $id_absen));
		return $query->row();
	}

	public function detail_guru($id_absenguru)
	{
		$query = $this->db->get_where('absen_guru',array('id_absenguru' => $id_absenguru));
		return $query->row();
	}

	public function akhir()
	{
		$query = $this->db->query('select * from absen');
		return $query->result();
	}

	public function tambah($result = array())
	{
		$total_array = count($result);
		if($total_array !=0){
			$this->db->insert_batch('absen',$result);
		}
	}

	public function edit($data)
	{
		$this->db->where('id_absen',$data['id_absen']);
		$this->db->update('absen',$data);
	}

	public function edit_guru($data)
	{
		$this->db->where('id_absenguru',$data['id_absenguru']);
		$this->db->update('absen_guru',$data);
	}

	public function delete($data)
	{
		$this->db->where('id_absen',$data['id_absen']);
		$this->db->delete('absen',$data);
	}

	public function delete_guru($data)
	{
		$this->db->where('id_absenguru',$data['id_absenguru']);
		$this->db->delete('absen_guru',$data);
	}

	public function gettgl()
	{
		$query = $this->db->get('absen');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function getkls()
	{
		$query = $this->db->get('kelas');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function getjrs()
	{
		$query = $this->db->get('jurusan');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function getjam()
	{
		$query = $this->db->get('jam');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function gethari()
	{
		$query = $this->db->get('hari');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function getmapel()
    {
        $query = $this->db->get('mapel');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function getmapell($user)
    {
        $this->db->select('mapel.*, guru.id_guru');
    	$this->db->from('mapel');
    	$this->db->join('guru','mapel.id_guru = guru.id_guru','INNER');
    	$this->db->where('mapel.id_guru', $user);
		$query = $this->db->get();
		return $query->result(); 
    }

    public function getnis()
    {
        $query = $this->db->get('siswa');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

	public function getguru($hari)
	{
		

		$this->db->select('absen_guru.*, guru.id_guru, guru.nama_guru, mapel.id_mapel, mapel.mapel, jam.id_jam, jam.jam, hari.id_hari, hari.hari');
		$this->db->from('absen_guru');
		$this->db->join('guru','guru.id_guru = absen_guru.id_guru','INNER');
		$this->db->join('mapel','mapel.id_mapel = absen_guru.id_mapel','INNER');
		$this->db->join('jam','jam.id_jam = absen_guru.id_jam','INNER');
		$this->db->join('hari','hari.id_hari = absen_guru.id_hari','INNER');
		$this->db->where('absen_guru.id_hari', $hari);
	}


	public function getrecord($kls,$jrs)
	{
		
		$this->db->select('siswa.nama, siswa.nis, kelas.id_kelas, kelas.kelas, jurusan.id_jur, jurusan.jurusan');
    	$this->db->from('siswa');
    	$this->db->join('kelas','kelas.id_kelas = siswa.id_kelas','INNER');
    	$this->db->join('jurusan','siswa.id_jur = jurusan.id_jur','INNER');
    	$this->db->where('kelas.id_kelas', $kls);
    	$this->db->where( 'jurusan.id_jur',$jrs);
		$query = $this->db->get();
		return $query->result();   
	}

	public function getrecord2($kls,$jrs,$mapel)
	{
		
		$this->db->select('siswa.*, siswa.id_siswa, kelas.id_kelas, kelas.kelas, jurusan.id_jur, jurusan.jurusan, mapel.id_mapel, mapel.mapel, mapel.id_guru');
    	$this->db->from('siswa');
    	$this->db->join('kelas','kelas.id_kelas = siswa.id_kelas','INNER');
    	$this->db->join('mapel','kelas.id_kelas = mapel.id_kelas','INNER');
    	$this->db->join('jurusan','siswa.id_jur = jurusan.id_jur','INNER');
    	$this->db->where('kelas.id_kelas', $kls);
    	$this->db->where( 'jurusan.id_jur',$jrs);
    	$this->db->where( 'mapel.id_mapel',$mapel);
		$query = $this->db->get();
		return $query->result();   
	}

	public function rekap($kls,$jrs,$mapel)
	{
		$this->db->select("absen.*, kelas.kelas, kelas.id_kelas, siswa.*, jurusan.jurusan, jurusan.id_jur, guru.nama_guru, jam.jam, mapel.id_mapel, mapel.mapel, COUNT(IF(absen.absen='Hadir',absen,NULL)) as Hadir, COUNT(IF(absen.absen='Alfa',absen,NULL)) as Alfa, COUNT(IF(absen.absen='Sakit',absen,NULL)) as Sakit, COUNT(IF(absen.absen='Izin',absen,NULL)) as Izin, COUNT(IF(absen.absen='Terlambat',absen,NULL)) as Terlambat");
    	$this->db->from('siswa');
    	$this->db->join('kelas','kelas.id_kelas = siswa.id_kelas','INNER');
    	$this->db->join('absen','siswa.id_siswa = absen.id_siswa','INNER');
    	$this->db->join('guru','guru.id_guru = absen.id_guru','INNER');
    	$this->db->join('jurusan','siswa.id_jur = jurusan.id_jur','INNER');
        $this->db->join('mapel','absen.id_mapel = mapel.id_mapel','INNER');
    	$this->db->join('jam','mapel.id_jam = jam.id_jam','INNER');
    	$this->db->group_by('absen.id_siswa');
    	$this->db->like('mapel.id_mapel', $mapel);
    	$this->db->like('kelas.id_kelas', $kls);
    	$this->db->like('jurusan.id_jur', $jrs);
		$query = $this->db->get();
		return $query->result();   
	}

	public function coba()
	{
		$query = $this->db->query("SELECT absen.*,siswa.*, kelas.kelas, jurusan.jurusan, mapel.mapel, guru.nama_guru
		 FROM siswa INNER JOIN (kelas INNER JOIN (jurusan INNER JOIN (absen INNER JOIN (mapel INNER JOIN guru ON mapel.id_guru=guru.id_guru) ON absen.id_mapel=mapel.id_mapel)  ON absen.id_jur=jurusan.id_jur) ON absen.id_kelas=kelas.id_kelas) ON siswa.id_siswa=absen.id_siswa ");
		return $query->result();
	}

	public function getabsen($mapel)
	{
		
		$this->db->select("absen.*,siswa.nama, siswa.nis, kelas.id_kelas, kelas.kelas, jurusan.id_jur, jurusan.jurusan, jam.id_jam, jam.jam, mapel.id_mapel, mapel.mapel, COUNT(IF(absen.absen='Hadir',absen,NULL)) as Hadir, COUNT(IF(absen.absen='Alfa',absen,NULL)) as Alfa, COUNT(IF(absen.absen='Sakit',absen,NULL)) as Sakit, COUNT(IF(absen.absen='Izin',absen,NULL)) as Izin, COUNT(IF(absen.absen='Terlambat',absen,NULL)) as Terlambat");
    	$this->db->from('siswa');
    	$this->db->join('kelas','kelas.id_kelas = siswa.id_kelas','INNER');
    	$this->db->join('jurusan','siswa.id_jur = jurusan.id_jur','INNER');
    	$this->db->join('absen','absen.id_siswa = siswa.id_siswa','INNER');
    	$this->db->join('guru','guru.id_guru = absen.id_guru','INNER');
    	$this->db->join('mapel','mapel.id_jam = jam.id_jam','INNER');
    	$this->db->join('jam','mapel.id_jam = jam.id_jam','INNER');
    	$this->db->where('absen.id_mapel', $mapel);
    	$this->db->group_by('absen.id_siswa');
		$query = $this->db->get();
		return $query->result();   
	}

}
