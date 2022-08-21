<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class Mjur extends CI_Model
{
	public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

    public function listing(){
		$query = $this->db->get('jurusan');
		return $query->result();           
	}

	public function detail($id_jur)
	{
		$query = $this->db->get_where('jurusan',array('id_jur' => $id_jur));
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('jurusan',$data);
	}

	public function edit($data)
	{
		$this->db->where('id_jur',$data['id_jur']);
		$this->db->update('jurusan',$data);
	}

	public function delete($data)
	{
		$this->db->where('id_jur',$data['id_jur']);
		$this->db->delete('jurusan',$data);
	}
}
