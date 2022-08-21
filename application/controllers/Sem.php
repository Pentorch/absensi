<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class sem extends CI_Controller
{
    // create akan menampilkan form
    public function __construct()
        {
                parent::__construct();
                $this->load->model('msem');
                $this->load->helper(array('url','html'));
                $this->load->library('session');
                $this->load->library('form_validation');
                $this->load->database();
        }

    public function index()
    {
        $sem = $this->msem->listing();
        $data = array('sem' => $sem,
                      'isi' => 'data/sem');
        $this->load->view('homepage/header');
        $this->load->view('sem/lihat_sem',$data);
        $this->load->view('homepage/footer');
    }

    public function tambah()
    {
        $this->load->view('homepage/header');
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('sem','Sem','required', array('required' => 'semester harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Tambah Semester',
                           'isi'   => 'sem/tambah');
            $this->load->view('sem/tambah_sem',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $i = $this->input;
            $data=array( 'sem' => $i->post('sem'));
            $this->msem->tambah($data);
            $this->session->set_flashdata('Sukses','Data Semester telah ditambah');
            redirect(site_url('sem'));
        }
    }

    public function edit($id_sem)
    {
        $this->load->view('homepage/header');

         $sem = $this->msem->detail($id_sem);
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('sem','Sem','required', array('required' => 'Semester harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Edit Semester',
                           'sem' => $sem,
                           'isi'   => 'sem/edit');
            $this->load->view('sem/edit_sem',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $i = $this->input;
            $data=array( 'id_sem' => $id_sem,
                'sem' => $i->post('sem'));
            $this->msem->edit($data);
            $this->session->set_flashdata('Sukses','Data Semester telah diedit');
            redirect(site_url('sem'));
        }
    }

    public function delete($id_sem)
    {
        $data = array('id_sem'=>$id_sem);
        $this->msem->delete($data);
        $this->session->set_flashdata('Sukses','Data Semester telah dihapus');
        redirect(site_url('sem'));
    }

    }