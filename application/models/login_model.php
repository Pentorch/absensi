<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Login_model extends CI_Model{
	public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

	//cek nip dan password dosen
	function auth_admin($username,$password){
		$this->db->select('user.*');
    	$this->db->from('user');
    	$this->db->where('user.username', $username);
    	$this->db->where( 'user.password',$password);
		$query = $this->db->get();
		return $query->result();   
	}

	//cek nim dan password mahasiswa
	function auth_guru_piket($username,$password){
		$query=$this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password'  LIMIT 1");
		return $query->row();
	}

}
