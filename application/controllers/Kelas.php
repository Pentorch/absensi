<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class Kelas extends CI_Controller
{
    // create akan menampilkan form
    public function __construct()
        {
                parent::__construct();
                $this->load->model('mkelas');
                $this->load->model('mguru');
                $this->load->model('mjur');
                $this->load->helper(array('url','html'));
                $this->load->library('session');
                $this->load->library('form_validation');
                $this->load->database();
        }

    public function index()
    {
        $kelas = $this->mkelas->listing();
        $data = array('kelas' => $kelas,
                      'isi' => 'data/kelas');
        $this->load->view('homepage/header');
        $this->load->view('kelas/lihat_kelas',$data);
        $this->load->view('homepage/footer');
    }

    public function tambah()
    {
        $this->load->view('homepage/header');
        
        
        $akhir = $this->mkelas->akhir();
        $guru = $this->mguru->listing();
        $jur = $this->mjur->listing();
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('kelas','Kelas','required', array('required' => 'Kelas harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Tambah Kelas',
                           'guru'  => $guru,
                           'jur'   => $jur,
                           'isi'   => 'kelas/tambah');
            $this->load->view('kelas/tambah_kelas',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $i = $this->input;
            $data=array( 'kelas' => $i->post('kelas'),
                         'id_jur' => $i->post('id_jur'),
                         'id_guru'    => $i->post('id_guru'));
            $this->mkelas->tambah($data);
            $this->session->set_flashdata('Sukses','Data Kelas telah ditambah');
            redirect(site_url('kelas'));
        }
       
    }

    public function edit($id_kelas)
    {
        $this->load->view('homepage/header');

         $kelas = $this->mkelas->detail($id_kelas);
         $guru = $this->mguru->listing();
          $akhir = $this->mkelas->akhir();
          $jur = $this->mjur->listing();
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('kelas','Kelas','required', array('required' => 'Kelas harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Edit Kelas',
                           'guru'  => $guru,
                           'kelas' => $kelas,
                           'jur'   => $jur,
                           'isi'   => 'kelas/edit');
            $this->load->view('kelas/edit_kelas',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $i = $this->input;
            $data=array( 'id_kelas' => $id_kelas,
                         'kelas' => $i->post('kelas'),
                         'id_jur' => $i->post('id_jur'),
                         'id_guru'    => $i->post('id_guru'));
            $this->mkelas->edit($data);
            $this->session->set_flashdata('Sukses','Data Kelas telah diedit');
            redirect(site_url('kelas'));
        }
    }

    public function delete($id_kelas)
    {
        $data = array('id_kelas'=>$id_kelas);
        $this->mkelas->delete($data);
        $this->session->set_flashdata('Sukses','Data kategori telah dihapus');
        redirect(site_url('kelas'));
    }

    }