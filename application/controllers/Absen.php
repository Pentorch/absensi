<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class Absen extends CI_Controller
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
                $this->load->model('mjadwal');
                $this->load->model('mrekap');
                $this->load->helper(array('url','html'));
                $this->load->helper('form');
                $this->load->library('session');
                $this->load->library('form_validation');
                $this->load->database();
        }

    public function index()
    {
        $absen = $this->mabsen->coba();
        $data = array( 'title' => 'Absen',
                      'absen' => $absen,
                      'isi' => 'data/absen');
        $this->load->view('homepage/header');
        $this->load->view('absen/absen',$data);
        $this->load->view('homepage/footer');
    }

    public function piket()
    {
        $absen = $this->mabsen->coba();
        $data = array( 'title' => 'Absen',
                      'absen' => $absen,
                      'isi' => 'data/absen');
        $this->load->view('homepage/head2');
        $this->load->view('absen/absen2',$data);
        $this->load->view('homepage/footer');
    }

    public function coba()
    {
        $data['jurusan'] = $this->mjadwal->get_jur();
        $data['path'] = base_url('asset');
        $this->load->view('homepage/header');
        $this->load->view('rekap/tampil_rekap',$data);
        $this->load->view('homepage/footer');
    }

    public function coba1()
    {
        $data['jurusan'] = $this->mjadwal->get_jur();
        $data['path'] = base_url('asset');
        $this->load->view('homepage/head1');
        $this->load->view('rekap/tampil_rekap1',$data);
        $this->load->view('homepage/footer');
    }

    public function coba2()
    {
        $data['jurusan'] = $this->mjadwal->get_jur();
        $data['path'] = base_url('asset');
        $this->load->view('homepage/head2');
        $this->load->view('rekap/tampil_rekap2',$data);
        $this->load->view('homepage/footer');
    }

    public function coba_a()
    {
        $data['jurusan'] = $this->mjadwal->get_jur();
        $data['path'] = base_url('asset');
        $this->load->view('homepage/head3');
        $this->load->view('rekap/tampil_rekap_a',$data);
        $this->load->view('homepage/footer');
    }

    public function cobalagi()
    {
        $siswa = $this->msiswa->akhir();
        $mapel = $this->input->get('mapel', TRUE);
        $kls = $this->input->get('kelas', TRUE);
        $jrs = $this->input->get('jrs', TRUE);
        $data = $this->mabsen->rekap($kls,$jrs,$mapel);
        $this->load->view('homepage/header');
        $this->load->view('rekap/rekap_siswa',['siswa'=>$siswa, 'data'=>$data]);
        $this->load->view('homepage/footer');
    }

    public function cobalagi1()
    {
        $siswa = $this->msiswa->akhir();
        $mapel = $this->input->get('mapel', TRUE);
        $kls = $this->input->get('kelas', TRUE);
        $jrs = $this->input->get('jrs', TRUE);
        $data = $this->mabsen->rekap($kls,$jrs,$mapel);
        $this->load->view('homepage/head1');
        $this->load->view('rekap/rekap_siswa1',['siswa'=>$siswa, 'data'=>$data]);
        $this->load->view('homepage/footer');
    }

    public function cobalagi2()
    {
        $siswa = $this->msiswa->akhir();
        $mapel = $this->input->get('mapel', TRUE);
        $kls = $this->input->get('kelas', TRUE);
        $jrs = $this->input->get('jrs', TRUE);
        $data = $this->mabsen->rekap($kls,$jrs,$mapel);
        $this->load->view('homepage/head2');
        $this->load->view('rekap/rekap_siswa2',['siswa'=>$siswa, 'data'=>$data]);
        $this->load->view('homepage/footer');
    }

    public function cobalagi_a()
    {
        $siswa = $this->msiswa->akhir();
        $mapel = $this->input->get('mapel', TRUE);
        $kls = $this->input->get('kelas', TRUE);
        $jrs = $this->input->get('jrs', TRUE);
        $data = $this->mabsen->rekap($kls,$jrs,$mapel);
        $this->load->view('homepage/head3');
        $this->load->view('rekap/rekap_siswa_a',['siswa'=>$siswa, 'data'=>$data]);
        $this->load->view('homepage/footer');
    }

    public function coba_detail()
    {
        $nis=$this->input->post('nis');
        $mapel = $this->input->post('id_mapel');
        $getnis = $this->mabsen->getnis();
        $getmapel = $this->mabsen->getmapel();
        $absen = $this->mabsen->detail($nis,$mapel);
        
        $this->load->view('homepage/header');
        $this->load->view('absen/detail_absen',['getnis'=>$getnis, 'getmapel'=>$getmapel, 'absen'=>$absen]);
        $this->load->view('homepage/footer');
        
    }

    public function rekap()
    {
        $jam = $this->input->post('id_jam');
        $kls=$this->input->post('id_kelas');
        $jrs = $this->input->post('id_jur');
        $getkls = $this->mabsen->getkls();
        $getjrs = $this->mabsen->getjrs();
        $getjam = $this->mabsen->getjam();
        $records = $this->mabsen->rekap($kls,$jrs,$jam);
       
        $this->load->view('homepage/header');
        $this->load->view('absen/rekap_absen',['getkls'=>$getkls, 'getjrs'=>$getjrs, 'getjam'=>$getjam, 'records'=>$records]);
        $this->load->view('homepage/footer');
    }

    public function tampil()
    {
        $this->load->model('mabsen');
        $jam = $this->mjadwal->listing();
        $mapel = $this->mjadwal->akhir_mapel();

        $kls=$this->input->post('id_kelas');
        $jrs = $this->input->post('id_jur');
        $getkls = $this->mabsen->getkls();
        $getjrs = $this->mabsen->getjrs();
         $records = $this->mabsen->getrecord($kls,$jrs);
        
        $this->load->view('homepage/header');
        $this->load->view('absen/tampil_absen',['getkls'=>$getkls, 'getjrs'=>$getjrs, 'records'=>$records, 'jam'=>$jam, 'mapel'=>$mapel]);
        $this->load->view('homepage/footer');
    }

    public function tampil_a()
    {
        $data['jurusan'] = $this->mjadwal->get_jur();
      $mapel = $this->input->get('mapel', TRUE);
        $kls = $this->input->get('kelas', TRUE);
        $jrs = $this->input->get('jrs', TRUE);
      $data['records'] = $this->mabsen->getrecord2($kls,$jrs,$mapel);
      $data['path'] = base_url('asset');
        $this->load->view('homepage/head3');
        $this->load->view('absen/tampil_absen_a',$data);
        $this->load->view('homepage/footer');
    }

    public function tampil_guru()
    {
        $absen = $this->mabsen->coba();
        $data = array( 'title' => 'Absen',
                      'absen' => $absen,
                      'isi' => 'data/absen');
        $this->load->view('homepage/head33');
        $this->load->view('absen/lihat_absen',$data);
        $this->load->view('homepage/footer');
    }

    public function edit($id_absen)
    {
        $this->load->view('homepage/header');

         $absen = $this->mabsen->detail_absen($id_absen);
         $getkls = $this->mabsen->getkls();
        $getjrs = $this->mabsen->getjrs();
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('id_guru','id_guru','required', array('required' => 'ID guru harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Edit absen',
                           'absen' => $absen,
                           'kelas' => $getkls,
                           'jurusan'=> $getjrs,
                           'isi'   => 'absen/edit');
            $this->load->view('absen/edit_absen',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $i = $this->input;
            $data=array( 'id_absen' => $id_absen,
                         'id_siswa' => $i->post('id_siswa'),
                         'id_kelas' => $i->post('id_kelas'),
                         'id_jur' => $i->post('id_jur'),
                         'id_guru' => $i->post('id_guru'),
                         'id_sem' => $i->post('id_sem'),
                         'absen' => $i->post('absen'),
                         'ket' => $i->post('ket'),);
            $this->mabsen->edit($data);
            $this->session->set_flashdata('Sukses','Data Absen telah diedit');
            redirect(site_url('absen'));
        }
    }

    public function edit2($id_absen)
    {
        $this->load->view('homepage/head2');

         $absen = $this->mabsen->detail_absen($id_absen);
         $getkls = $this->mabsen->getkls();
        $getjrs = $this->mabsen->getjrs();
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('id_guru','id_guru','required', array('required' => 'ID guru harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Edit absen',
                           'absen' => $absen,
                           'kelas' => $getkls,
                           'jurusan'=> $getjrs,
                           'isi'   => 'absen/edit');
            $this->load->view('absen/edit_absen1',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $i = $this->input;
            $data=array( 'id_absen' => $id_absen,
                         'id_siswa' => $i->post('id_siswa'),
                         'id_kelas' => $i->post('id_kelas'),
                         'id_jur' => $i->post('id_jur'),
                         'id_guru' => $i->post('id_guru'),
                         'id_sem' => $i->post('id_sem'),
                         'absen' => $i->post('absen'),
                         'ket' => $i->post('ket'),);
            $this->mabsen->edit($data);
            $this->session->set_flashdata('Sukses','Data Absen telah diedit');
            redirect(site_url('absen/piket'));
        }
    }

       public function save(){
        $this->form_validation->set_rules('id_siswa[]','id_siswa','required|trim');
        $this->form_validation->set_rules('id_kelas[]','id_kelas');
        $this->form_validation->set_rules('id_jur[]','id_jur');
        $this->form_validation->set_rules('id_guru[]','id_guru');
        $this->form_validation->set_rules('absen[]','absen');
        $this->form_validation->set_rules('ket[]','ket');
        $this->form_validation->set_rules('id_sem[]','id_sem');
        $this->form_validation->set_rules('tanggal[]','tanggal');

        if ($this->form_validation->run()==False) {
            echo validation_errors();
        }else{
            $id_siswa = $this->input->post('id_siswa');
            $id_sem = 1;
            $tanggal = date('Y-m-d G:i:sa');
            $result = array();
            foreach ($id_siswa as $key => $val) {
                $result[] = array( 
                                    "id_siswa" => $_POST['id_siswa'][$key],
                                   "id_kelas" => $_POST['id_kelas'][$key],
                                   "id_jur" => $_POST['id_jur'][$key],
                                   "id_guru" => $_POST['id_guru'][$key],
                                   "absen" => $_POST['absen'][$key],
                                   "ket" => $_POST['ket'][$key],
                                   "id_sem" => $id_sem,
                                   "tanggal" => $tanggal,
                                   "id_mapel" => $_POST['id_mapel'][$key],
                                   );
            }
            $test = $this->db->insert_batch('absen',$result);
            if($test){
                echo "Absen sukses disimpan";
                redirect('absen');
            }else{
                echo "Absen gagal disimpan";
            }
        }
       }

        public function save_a(){
        $this->form_validation->set_rules('id_siswa[]','id_siswa','required|trim');
        $this->form_validation->set_rules('id_kelas[]','id_kelas');
        $this->form_validation->set_rules('id_jur[]','id_jur');
        $this->form_validation->set_rules('id_guru[]','id_guru');
        $this->form_validation->set_rules('absen[]','absen');
        $this->form_validation->set_rules('ket[]','ket');
        $this->form_validation->set_rules('id_sem[]','id_sem');
        $this->form_validation->set_rules('tanggal[]','tanggal');

        if ($this->form_validation->run()==False) {
            echo validation_errors();
        }else{
            $id_siswa = $this->input->post('id_siswa');
            $id_sem = 1;
           $tanggal = date('Y-m-d G:i:sa');
            $result = array();
            foreach ($id_siswa as $key => $val) {
                $result[] = array( 
                                    "id_siswa" => $_POST['id_siswa'][$key],
                                   "id_kelas" => $_POST['id_kelas'][$key],
                                   "id_jur" => $_POST['id_jur'][$key],
                                   "id_guru" => $_POST['id_guru'][$key],
                                   "absen" => $_POST['absen'][$key],
                                   "ket" => $_POST['ket'][$key],
                                   "id_sem" => $id_sem,
                                   "tanggal" => $tanggal,
                                   "id_mapel" => $_POST['id_mapel'][$key],
                                   );
            }
            $test = $this->db->insert_batch('absen',$result);
            if($test){
                echo "Absen sukses disimpan";
                redirect('rekap/siswa_a');
            }else{
                echo "Absen gagal disimpan";
            }
        }
       }

       public function simpan(){
        $this->form_validation->set_rules('id_siswa[]','id_siswa','required|trim');
        $this->form_validation->set_rules('id_kelas[]','id_kelas');
        $this->form_validation->set_rules('id_jur[]','id_jur');
        $this->form_validation->set_rules('id_guru[]','id_guru');
        $this->form_validation->set_rules('absen[]','absen');
        $this->form_validation->set_rules('ket[]','ket');
        $this->form_validation->set_rules('id_sem[]','id_sem');

        if ($this->form_validation->run()==False) {
            echo validation_errors();
        }else{
            $id_siswa = $this->input->post('id_siswa');
            $id_sem = 1;
            $id_guru = $this->input->post('id_guru');
            $result = array();
            foreach ($id_siswa as $key => $val) {
                $result[] = array( 
                                    "id_siswa" => $_POST['id_siswa'][$key],
                                   "id_kelas" => $_POST['id_kelas'][$key],
                                   "id_jur" => $_POST['id_jur'][$key],
                                   "id_guru" => $id_guru,
                                   "absen" => $_POST['absen'][$key],
                                   "ket" => $_POST['ket'][$key],
                                   "id_sem" => $id_sem,
                                   );
            }
            $test = $this->db->insert_batch('absen',$result);
            if($test){
                echo "Absen sukses disimpan";
                redirect('absen/tampil_guru');
            }else{
                echo "Absen gagal disimpan";
            }
        }
       }

       public function delete($id_absen)
       {
        $data = array('id_absen'=>$id_absen);
        $this->mabsen->delete($data);
        $this->session->set_flashdata('Sukses','Data telah dihapus');
        redirect(site_url('absen'));
       }

       public function guru()
       {
        $this->load->model('mabsen');

        $hari = $this->input->post('id_hari');
        $gethari = $this->mabsen->gethari();
        $records = $this->mabsen->getguru($hari);
        
        $this->load->view('homepage/header');
		$this->load->view('absen/absen_guru',array('records'=>$records,'gethari'=>$gethari));
        $this->load->view('homepage/footer');
       }

       public function lihat_guru()
       {
        $absen = $this->mabsen->guru();
        $data = array( 'title' => 'Absen',
                      'absen' => $absen,
                      'isi' => 'data/absen');
        $this->load->view('homepage/header');
        $this->load->view('absen/absen_guru',$data);
        $this->load->view('homepage/footer');
       }

       public function lihat_guru2()
       {
        $absen = $this->mabsen->guru();
        $data = array( 'title' => 'Absen',
                      'absen' => $absen,
                      'isi' => 'data/absen');
        $this->load->view('homepage/head2');
        $this->load->view('absen/absen_guru2',$data);
        $this->load->view('homepage/footer');
       }

        public function simpan_guru(){
        $this->form_validation->set_rules('id_guru[]','id_guru','required|trim');
        $this->form_validation->set_rules('id_kelas[]','id_kelas');
        $this->form_validation->set_rules('id_jur[]','id_jur');
        $this->form_validation->set_rules('id_jam[]','id_jam');
        $this->form_validation->set_rules('id_mapel[]','id_mapel');
        $this->form_validation->set_rules('absen[]','absen');
        $this->form_validation->set_rules('ket[]','ket');
        $this->form_validation->set_rules('id_sem[]','id_sem');
        $this->form_validation->set_rules('id_hari[]','id_hari');
        $jam = $this->mjadwal->listing();

        if ($this->form_validation->run()==False) {
            echo validation_errors();
        }else{
            $id_guru = $this->input->post('id_guru');
            $id_sem = 1;
            $result = array();
            foreach ($id_guru as $key => $val) {
                $result[] = array( "id_guru" => $_POST['id_guru'][$key],
                                   "id_kelas" => $_POST['id_kelas'][$key],
                                   "id_jur" => $_POST['id_jur'][$key],
                                   "id_jam" => $_POST['id_jam'][$key],
                                   "id_hari" => $_POST['id_hari'][$key],
                                   "id_sem" => $id_sem,
                                   "absen" => $_POST['absen'][$key],
                                   "id_mapel" => $_POST['id_mapel'][$key],
                                   "ket" => $_POST['ket'][$key]
                                   );
            }
            $test = $this->db->insert_batch('absen_guru',$result);
            if($test){
                $this->load->view('homepage/header');
                $this->load->view('absen/berhasil');
                $this->load->view('homepage/footer');
                //redirect('absen/guru');
            }else{
                echo "Absen gagal disimpan";
            }
        }
       }

       public function delete_guru($id_absenguru)
       {
        $data = array('id_absenguru'=>$id_absenguru);
        $this->mabsen->delete_guru($data);
        $this->session->set_flashdata('Sukses','Data telah dihapus');
        redirect(site_url('absen/lihat_guru'));
       }

       public function edit_guru($id_absenguru)
    {
        $this->load->view('homepage/header');

         $absen = $this->mabsen->detail_guru($id_absenguru);
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('absen','absen','required', array('required' => 'Absen harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Edit absen',
                           'absen' => $absen,
                           'isi'   => 'absen/edit');
            $this->load->view('absen/edit_absenguru',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $i = $this->input;
            $data=array( 'id_absenguru' => $id_absenguru,
                         'id_mapel' => $i->post('id_mapel'),
                         'id_kelas' => $i->post('id_kelas'),
                         'id_jur' => $i->post('id_jur'),
                         'id_guru' => $i->post('id_guru'),
                         'id_sem' => $i->post('id_sem'),
                         'id_jam' => $i->post('id_jam'),
                         'absen' => $i->post('absen'),
                         'ket' => $i->post('ket'),);
            $this->mabsen->edit_guru($data);
            $this->session->set_flashdata('Sukses','Data Absen telah diedit');
            redirect(site_url('absen/lihat_guru'));
        }
    }

    public function edit_guru2($id_absenguru)
    {
        $this->load->view('homepage/head2');

         $absen = $this->mabsen->detail_guru($id_absenguru);
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('absen','absen','required', array('required' => 'Absen harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Edit absen',
                           'absen' => $absen,
                           'isi'   => 'absen/edit');
            $this->load->view('absen/edit_absen2',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $i = $this->input;
            $data=array( 'id_absenguru' => $id_absenguru,
                         'id_mapel' => $i->post('id_mapel'),
                         'id_kelas' => $i->post('id_kelas'),
                         'id_jur' => $i->post('id_jur'),
                         'id_guru' => $i->post('id_guru'),
                         'id_sem' => $i->post('id_sem'),
                         'id_jam' => $i->post('id_jam'),
                         'absen' => $i->post('absen'),
                         'ket' => $i->post('ket'),);
            $this->mabsen->edit_guru($data);
            $this->session->set_flashdata('Sukses','Data Absen telah diedit');
            redirect(site_url('absen/lihat_guru2'));
        }
    }

    public function detail($nis,$mapel)
    {
        $this->load->view('homepage/header');
        $absen = $this->mabsen->detail($nis,$mapel);
        $sd = $this->mabsen->getsiswa($nis);
        $this->load->view('absen/detail_absen',['sd'=>$sd, 'data'=>$absen]);
        $this->load->view('homepage/footer');

    }

    public function detail1($nis,$mapel)
    {
        $this->load->view('homepage/head1');
        $absen = $this->mabsen->detail($nis,$mapel);
        $sd = $this->mabsen->getsiswa($nis);
        $this->load->view('absen/detail_absen',['sd'=>$sd, 'data'=>$absen]);
        $this->load->view('homepage/footer');

    }

    public function detail2($nis,$mapel)
    {
        $this->load->view('homepage/head2');
        $absen = $this->mabsen->detail($nis,$mapel);
        $sd = $this->mabsen->getsiswa($nis);
        $this->load->view('absen/detail_absen',['sd'=>$sd, 'data'=>$absen]);
        $this->load->view('homepage/footer');

    }

    public function detail_a($nis,$mapel)
    {
        $this->load->view('homepage/head3');
        $absen = $this->mabsen->detail($nis,$mapel);
        $sd = $this->mabsen->getsiswa($nis);
        $this->load->view('absen/detail_absen',['sd'=>$sd, 'data'=>$absen]);
        $this->load->view('homepage/footer');

    }
}
