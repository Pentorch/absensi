<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class Msem extends CI_Model
{
	public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

    public function listing(){
		$query = $this->db->get('semester');
		return $query->result();           
	}

	public function detail($id_sem)
	{
		$query = $this->db->get_where('sem',array('id_sem' => $id_sem));
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('sem',$data);
	}

	public function edit($data)
	{
		$this->db->where('id_sem',$data['id_sem']);
		$this->db->update('sem',$data);
	}

	public function delete($data)
	{
		$this->db->where('id_sem',$data['id_sem']);
		$this->db->delete('sem',$data);
	}
}
