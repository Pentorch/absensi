<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class Login extends CI_Controller
{
	public function __construct()
        {
                parent::__construct();
                $this->load->model('mlogin');
                $this->load->model('muser');
                $this->load->helper(array('url','html'));
                $this->load->library('session');
                $this->load->library('form_validation');
                $this->load->database();
        }

	public function index()
	{
		$this->load->view('user/login');
	}

	function ceklogin()
	{
		if (isset($_POST['login'])) {
			$username = $this->input->post('username',true);
			$password = $this->input->post('password',true);

			$cek = $this->mlogin->proseslogin($username,$password);
			$hasil = count($cek);
			if ($hasil > 0) {
				$yglogin = $this->db->get_where('user',array('username'=>$username,'password'=>$password))->row();
				$data = array(	'udahmasuk'=>true,
								'id_user'=>$yglogin->id_user,
								'username'=>$yglogin->username,
								'password'=>$yglogin->password,
								'level' =>$yglogin->level,
								'nama' =>$yglogin->nama,
								'id_guru' =>$yglogin->id_guru
							);
				$this->session->set_userdata($data);
				if ($yglogin->level == 'admin') {
					redirect('homepage');
				}elseif ($yglogin->level == 'guru') {
					redirect('homepage/guru');
				}elseif ($yglogin->level == 'piket') {
					redirect('homepage/piket');
				}elseif ($yglogin->level == 'wakil') {
					redirect('homepage/wakil');
				}
			}else{
				echo $this->session->set_flashdata('msg','Username Atau Password Salah');
				redirect('login');
			}
		}
	}


	function keluar()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}