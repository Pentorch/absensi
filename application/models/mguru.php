<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class Mguru extends CI_Model
{
	public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

    public function listing(){
    	$query = $this->db->get('guru');
		return $query->result();           
	}

	public function detail($id_guru)
	{
		$query = $this->db->get_where('guru',array('id_guru' => $id_guru));
		return $query->row();
	}

	public function detail2($id_guru)
	{
		$query = $this->db->get_where('guru',array('nip' => $id_guru));
		return $query->row();
	}

	public function akhir()
	{
		$query = $this->db->query('select * from guru');
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('guru',$data);
	}

	public function edit($data)
	{
		$this->db->where('id_guru',$data['id_guru']);
		$this->db->update('guru',$data);
	}

	public function delete($data)
	{
		$this->db->where('id_guru',$data['id_guru']);
		$this->db->delete('guru',$data);
	}
}
