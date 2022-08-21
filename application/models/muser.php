<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class Muser extends CI_Model
{
	public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

    public function listing(){
		$query = $this->db->get('user');
		return $query->result();           
	}

	public function detail($id_user)
	{
		$query = $this->db->get_where('user',array('id_user' => $id_user));
		return $query->row();
	}

	public function akhir()
	{
		$query = $this->db->query('select * from user');
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('user',$data);
	}

	public function edit($data)
	{
		$this->db->where('id_user',$data['id_user']);
		$this->db->update('user',$data);
	}

	public function delete($data)
	{
		$this->db->where('id_user',$data['id_user']);
		$this->db->delete('user',$data);
	}
}
