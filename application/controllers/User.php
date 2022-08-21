<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class User extends CI_Controller
{
    // create akan menampilkan form
    public function __construct()
        {
                parent::__construct();
                $this->load->model('muser');
                $this->load->model('mguru');
                $this->load->model('mkelas');
                $this->load->helper(array('url','html'));
                $this->load->library('session');
                $this->load->library('form_validation');
                $this->load->database();
        }

    public function index()
    {
        $user = $this->muser->listing();
        $data = array('user' => $user,
                      'isi' => 'data/user');
        $this->load->view('homepage/header');
        $this->load->view('user/lihat_user',$data);
        $this->load->view('homepage/footer');
    }

    public function preview()
    {
        $user = $this->muser->listing();

        $data = array('title'     => 'Detail User', 
                    'user'        => $user,
                    'isi'       => 'user/detail');
        $this->load->view('user/preview',$data);

    }

    public function T_print()
    {
        
        ob_start();
        $data['user']= $this->muser->listing();
        $this->load->view('user/print_user', $data);
        $html = ob_get_contents();
        ob_end_clean();
        
        require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/absensmk/asset/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P','A4','en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data User.pdf', 'D');
    }

    public function tambah()
    {
        $this->load->view('homepage/header');
        $akhir = $this->muser->akhir();
       $guru = $this->mguru->listing();
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('username','Username','required', array('required' => 'Username harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Tambah Username',
                            'guru' => $guru,
                           'isi'   => 'user/tambah');
            $this->load->view('user/tambah',$data);
             $this->load->view('homepage/footer');
            //masuk database
        }else{
            $i = $this->input;
            $data=array( 'username' => $i->post('username'),
                         'password' => $i->post('password'),
                         'nama' => $i->post('nama'),

                         'level'    => $i->post('level'));
            $this->muser->tambah($data);
            $this->session->set_flashdata('Sukses','Data user telah ditambah');
            redirect(site_url('user'));
        }
    }

    public function edit($id_user)
        {
                $this->load->view('homepage/header');

                $pengguna = $this->muser->detail($id_user);
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('username','Username','required', array('required' => 'Username harus diisi'));
        $valid->set_rules('password','Password','required', array('required' => 'Password harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Edit User',
                           'user' => $pengguna,
                           'isi'   => 'user/edit');
            $this->load->view('user/edit_user',$data);
             $this->load->view('homepage/footer');
            //masuk database
        }else{
            $i = $this->input;
            $data=array( 'id_user' => $id_user,
                         'username' => $i->post('username'),
                         'password' => $i->post('password'),
                         'level'    => $i->post('level'));
            $this->muser->edit($data);
            $this->session->set_flashdata('Sukses','Data User telah diedit');
            redirect(site_url('user'));
        }
        }

    public function delete($id_user)
    {
        $data = array('id_user'=>$id_user);
        $this->muser->delete($data);
        $this->session->set_flashdata('Sukses','Data User telah dihapus');
        redirect(site_url('user'));
    }

    public function detail($id_user)
    {
        $this->load->view('homepage/header');
        $username = $this->session->userdata('username');
        $user = $this->muser->detail($username);
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('username','Username','required', array('required' => 'Username harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Edit User',
                           'user' => $user,
                           'isi'   => 'user/detail');
            $this->load->view('user/detail_user',$data);
             $this->load->view('homepage/footer');
            //masuk database
        }else{
            $i = $this->input;
            $data=array( 'username' => $username,
                         'username' => $i->post('username'),
                         'password' => $i->post('password'));
            $this->muser->detail($data);
            $this->session->set_flashdata('Sukses','Data User telah diedit');
            redirect(site_url('user'));
        }

    }

    }
