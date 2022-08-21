<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class Mlogin extends CI_Model
{

	function proseslogin($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get('user')->row();
	}

	function edit($data)
	{
		$this->db->where('id_user',$data['id_user']);
		$this->db->update('user',$data);
	}
}