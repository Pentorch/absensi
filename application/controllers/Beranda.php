<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class Beranda extends CI_Controller
{
    // create akan menampilkan form
    public function __construct()
        {
                parent::__construct();
                $this->load->model('mkelas');
                $this->load->model('msiswa');
                $this->load->model('mabsen');
                $this->load->model('mguru');
                $this->load->model('msem');
                $this->load->model('mjur');
                $this->load->model('mrekap');
                $this->load->model('mjadwal');
                $this->load->helper(array('url','html'));
                $this->load->helper('form');
                $this->load->library('session');
                $this->load->library('calendar');
                $this->load->library('form_validation');
                $this->load->database();
        }

    public function index()
    {
        $this->load->view('homepage/head5');
        $this->load->view('homepage/beranda');
        $this->load->view('homepage/footer');
    }

     public function calender(){
    $this->load->library('calendar');
    }

     public function detail()
    {

        $key = $this->input->get('cari', TRUE);
        $data = $this->mabsen->carii($key);
        $sd = $this->mabsen->siswa($key);
        $this->load->view('homepage/head5');
        $this->load->view('homepage/detail',['sd'=>$sd,'data'=>$data]);
        $this->load->view('homepage/footer');

    }
}