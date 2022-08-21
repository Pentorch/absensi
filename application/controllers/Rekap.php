<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class Rekap extends CI_Controller
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
                $this->load->library('form_validation');
                $this->load->database();
        }

    public function index()
    {
        $data['absen'] = $this->mrekap->cari_guru();
        $this->load->view('homepage/header');
        $this->load->view('rekap/lihat_rekap',$data);
        $this->load->view('homepage/footer');
    }

    public function wakil()
    {
        $data['absen'] = $this->mrekap->cari_guru();
        $this->load->view('homepage/head1');
        $this->load->view('rekap/lihat_rekap1',$data);
        $this->load->view('homepage/footer');
    }

    public function piket()
    {
        $data['absen'] = $this->mrekap->cari_guru();
        $this->load->view('homepage/head2');
        $this->load->view('rekap/lihat_rekap2',$data);
        $this->load->view('homepage/footer');
    }

    public function tampil()
    {
        $tanggal = $this->input->get('cari', TRUE);
        $data['absen'] = $this->mrekap->rekap_guru($tanggal);
        $this->load->view('homepage/header');
        $this->load->view('rekap/tampil_guru', $data);
        $this->load->view('homepage/footer');
    }

    public function tampil1()
    {
        $tanggal = $this->input->get('cari', TRUE);
        $data['absen'] = $this->mrekap->rekap_guru($tanggal);
        $this->load->view('homepage/head1');
        $this->load->view('rekap/tampil_guru', $data);
        $this->load->view('homepage/footer');
    }

    public function tampil2()
    {
        $tanggal = $this->input->get('cari', TRUE);
        $data['absen'] = $this->mrekap->rekap_guru($tanggal);
        $this->load->view('homepage/head2');
        $this->load->view('rekap/tampil_guru', $data);
        $this->load->view('homepage/footer');
    }

     public function guru()
    {
        $data['absen'] = $this->mrekap->guru();
        $this->load->view('homepage/header');
        $this->load->view('rekap/rekap_guru',$data);
        $this->load->view('homepage/footer');
    }

    public function guru1()
    {
        $data['absen'] = $this->mrekap->guru();
        $this->load->view('homepage/head1');
        $this->load->view('rekap/rekap_guru1',$data);
        $this->load->view('homepage/footer');
    }

    public function guru2()
    {
        $data['absen'] = $this->mrekap->guru();
        $this->load->view('homepage/head2');
        $this->load->view('rekap/rekap_guru2',$data);
        $this->load->view('homepage/footer');
    }


    public function siswa()
    {
        $data['jurusan'] = $this->mjadwal->get_jur();
        $mapel = $this->input->get('mapel', TRUE);
        $kls = $this->input->get('kelas', TRUE);
        $jrs = $this->input->get('jrs', TRUE);
        $data['records'] = $this->mabsen->getrecord2($kls,$jrs,$mapel);
        $data['path'] = base_url('asset');
        $this->load->view('homepage/header');
        $this->load->view('rekap/rekaph',$data);
        $this->load->view('homepage/footer');
    }

    public function siswa1()
    {
        $data['jurusan'] = $this->mjadwal->get_jur();
        $mapel = $this->input->get('mapel', TRUE);
        $kls = $this->input->get('kelas', TRUE);
        $jrs = $this->input->get('jrs', TRUE);
        $data['records'] = $this->mabsen->getrecord2($kls,$jrs,$mapel);
        $data['path'] = base_url('asset');
        $this->load->view('homepage/head1');
        $this->load->view('rekap/rekap1',$data);
        $this->load->view('homepage/footer');
    }

    public function siswa2()
    {
        $data['jurusan'] = $this->mjadwal->get_jur();
        $mapel = $this->input->get('mapel', TRUE);
        $kls = $this->input->get('kelas', TRUE);
        $jrs = $this->input->get('jrs', TRUE);
        $data['records'] = $this->mabsen->getrecord2($kls,$jrs,$mapel);
        $data['path'] = base_url('asset');
        $this->load->view('homepage/head2');
        $this->load->view('rekap/rekap2',$data);
        $this->load->view('homepage/footer');
    }

    public function siswa_a()
    {
        $data['jurusan'] = $this->mjadwal->get_jur();
        $mapel = $this->input->get('mapel', TRUE);
        $kls = $this->input->get('kelas', TRUE);
        $jrs = $this->input->get('jrs', TRUE);
        $data['records'] = $this->mabsen->getrecord2($kls,$jrs,$mapel);
        $data['path'] = base_url('asset');
        $this->load->view('homepage/head3');
        $this->load->view('rekap/rekapa',$data);
        $this->load->view('homepage/footer');
    }

    public function detail_siswa($nis,$tanggal)
    {
        $this->load->view('homepage/header');
        $absen = $this->mrekap->detail($nis,$tanggal);
        $sd = $this->mabsen->getsiswa($nis);
        $this->load->view('absen/detail_absen',['sd'=>$sd, 'data'=>$absen]);
        $this->load->view('homepage/footer');

    }

    public function detail_siswa1($nis,$tanggal)
    {
        $this->load->view('homepage/head1');
        $absen = $this->mrekap->detail($nis,$tanggal);
        $sd = $this->mabsen->getsiswa($nis);
        $this->load->view('absen/detail_absen',['sd'=>$sd, 'data'=>$absen]);
        $this->load->view('homepage/footer');

    }

    public function detail_siswa2($nis,$tanggal)
    {
        $this->load->view('homepage/head2');
        $absen = $this->mrekap->detail($nis,$tanggal);
        $sd = $this->mabsen->getsiswa($nis);
        $this->load->view('absen/detail_absen',['sd'=>$sd, 'data'=>$absen]);
        $this->load->view('homepage/footer');

    }

    public function detail_siswa_a($nis,$tanggal)
    {
        $this->load->view('homepage/head3');
        $absen = $this->mrekap->detail($nis,$tanggal);
        $sd = $this->mabsen->getsiswa($nis);
        $this->load->view('absen/detail_absen',['sd'=>$sd, 'data'=>$absen]);
        $this->load->view('homepage/footer');

    }

    public function tampil_siswa()
    {
        $data['jurusan'] = $this->mjadwal->get_jur();
        $kls = $this->input->get('kelas', TRUE);
        $jrs = $this->input->get('jrs', TRUE);
        $tanggal = $this->input->get('cari', TRUE);
        $data['path'] = base_url('asset');
        $data['absen'] = $this->mrekap->rekap_siswa($tanggal,$kls,$jrs);
        $this->load->view('homepage/header');
        $this->load->view('rekap/tampil_siswa',$data);
        $this->load->view('homepage/footer');
    }

    public function tampil_siswa1()
    {
        $data['jurusan'] = $this->mjadwal->get_jur();
        $kls = $this->input->get('kelas', TRUE);
        $jrs = $this->input->get('jrs', TRUE);
        $tanggal = $this->input->get('cari', TRUE);
        $data['path'] = base_url('asset');
        $data['absen'] = $this->mrekap->rekap_siswa($tanggal,$kls,$jrs);
        $this->load->view('homepage/head1');
        $this->load->view('rekap/tampil_siswa1',$data);
        $this->load->view('homepage/footer');
    }

    public function tampil_siswa2()
    {
        $data['jurusan'] = $this->mjadwal->get_jur();
        $kls = $this->input->get('kelas', TRUE);
        $jrs = $this->input->get('jrs', TRUE);
        $tanggal = $this->input->get('cari', TRUE);
        $data['path'] = base_url('asset');
        $data['absen'] = $this->mrekap->rekap_siswa($tanggal,$kls,$jrs);
        $this->load->view('homepage/head2');
        $this->load->view('rekap/tampil_siswa2',$data);
        $this->load->view('homepage/footer');
    }

    public function tampil_siswa_a()
    {
        $data['jurusan'] = $this->mjadwal->get_jur();
        $kls = $this->input->get('kelas', TRUE);
        $jrs = $this->input->get('jrs', TRUE);
        $tanggal = $this->input->get('cari', TRUE);
        $data['path'] = base_url('asset');
        $data['absen'] = $this->mrekap->rekap_siswa($tanggal,$kls,$jrs);
        $this->load->view('homepage/head3');
        $this->load->view('rekap/tampil_siswa_a',$data);
        $this->load->view('homepage/footer');
    }

    public function detail($id_guru)
    {
        $this->load->view('homepage/header');
        $guru = $this->mrekap->getguru($id_guru);
        $absen = $this->mrekap->detail_guru($id_guru);
        $akhir = $this->mrekap->akhir();
        $this->load->view('rekap/detail_rekap',['guru'=>$guru, 'absen'=>$absen]);
        $this->load->view('homepage/footer');

    }

    public function detail1($id_guru)
    {
        $this->load->view('homepage/head1');
        $guru = $this->mrekap->getguru($id_guru);
        $absen = $this->mrekap->detail_guru($id_guru);
        $akhir = $this->mrekap->akhir();
        $this->load->view('rekap/detail_rekap',['guru'=>$guru, 'absen'=>$absen]);
        $this->load->view('homepage/footer');

    }

    public function detail2($id_guru)
    {
        $this->load->view('homepage/head2');
        $guru = $this->mrekap->getguru($id_guru);
        $absen = $this->mrekap->detail_guru($id_guru);
        $akhir = $this->mrekap->akhir();
        $this->load->view('rekap/detail_rekap',['guru'=>$guru, 'absen'=>$absen]);
        $this->load->view('homepage/footer');

    }

    public function detail_a($id_guru)
    {
        $this->load->view('homepage/head3');
        $guru = $this->mrekap->getguru2($id_guru);
        $absen = $this->mrekap->detail_guru2($id_guru);
        $akhir = $this->mrekap->akhir();
        $this->load->view('rekap/detail_rekap_a',['guru'=>$guru, 'absen'=>$absen]);
        $this->load->view('homepage/footer');

    }

    public function cetak()
    {
        $this->load->model('mrekap');
        $jam = $this->mjadwal->listing();

        $kls=$this->input->post('id_kelas');
        $jrs = $this->input->post('id_jur');
        $mapel = $this->input->post('id_mapel');
        $getkls = $this->mrekap->getkls();
        $getjrs = $this->mrekap->getjrs();
        $getmapel = $this->mrekap->getmapel();
         $records = $this->mrekap->getrecord($kls,$jrs,$mapel);
        
        $this->load->view('absen/cetak_absen',['getkls'=>$getkls, 'getjrs'=>$getjrs, 'records'=>$records, 'jam'=>$jam, 'mapel'=>$mapel]);
    }

}