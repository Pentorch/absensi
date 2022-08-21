<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class Jurusan extends CI_Controller
{
    // create akan menampilkan form
    public function __construct()
        {
                parent::__construct();
                $this->load->model('mjur');
                $this->load->helper(array('url','html'));
                $this->load->library('session');
                $this->load->library('form_validation');
                $this->load->database();
        }

    public function index()
    {
        $jur = $this->mjur->listing();
        $data = array('jur' => $jur,
                      'isi' => 'data/jur');
        $this->load->view('homepage/header');
        $this->load->view('jurusan/lihat_jur',$data);
        $this->load->view('homepage/footer');
    }

    public function tambah()
    {
        $this->load->view('homepage/header');
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('jurusan','Jurusan','required', array('required' => 'Jurusan harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Tambah Jurusan',
                           'isi'   => 'jur/tambah');
            $this->load->view('jurusan/tambah_jur',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $i = $this->input;
            $data=array( 'jurusan' => $i->post('jurusan'));
            $this->mjur->tambah($data);
            $this->session->set_flashdata('Sukses','Data Jurusan telah ditambah');
            redirect(site_url('jurusan'));
        }
    }

    public function edit($id_jur)
    {
        $this->load->view('homepage/header');

         $jur = $this->mjur->detail($id_jur);
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('jurusan','Jurusan','required', array('required' => 'Jurusan harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Edit Jurusan',
                           'jur' => $jur,
                           'isi'   => 'jurusan/edit');
            $this->load->view('jurusan/edit_jur',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $i = $this->input;
            $data=array( 'id_jur' => $id_jur,
                'jurusan' => $i->post('jurusan'));
            $this->mjur->edit($data);
            $this->session->set_flashdata('Sukses','Data Jurusan telah diedit');
            redirect(site_url('jurusan'));
        }
    }

    public function delete($id_jur)
    {
        $data = array('id_jur'=>$id_jur);
        $this->mjur->delete($data);
        $this->session->set_flashdata('Sukses','Data Jurusan telah dihapus');
        redirect(site_url('jurusan'));
    }

    }