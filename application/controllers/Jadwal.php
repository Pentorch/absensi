<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class Jadwal extends CI_Controller
{
    // create akan menampilkan form
    public function __construct()
        {
                parent::__construct();
                $this->load->model('mjadwal');
                $this->load->model('mguru');
                $this->load->model('mkelas');
                $this->load->model('mjur');
                $this->load->model('mabsen');
                $this->load->helper(array('url','html'));
                $this->load->library('session');
                $this->load->library('form_validation');
                $this->load->database();
        }

    public function index()
    {
        $jam = $this->mjadwal->listing();
        $data = array('jam' => $jam,
                      'isi' => 'data/jam');
        $this->load->view('homepage/header');
        $this->load->view('admin/lihat_jam',$data);
        $this->load->view('homepage/footer');
    }

    public function tambah()
    {
        $this->load->view('homepage/header');
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('jam','Jam','required', array('required' => 'Jam harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Tambah Jam',
                           'isi'   => 'jadwal/tambah');
            $this->load->view('admin/tambah_jam',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $i = $this->input;
            $data=array( 'jam' => $i->post('jam'),
                         'durasi' => $i->post('durasi'));
            $this->mjadwal->tambah($data);
            $this->session->set_flashdata('Sukses','Data Jam telah ditambah');
            redirect(site_url('jadwal'));
        }
    }

    public function edit($id_jam)
    {
        $this->load->view('homepage/header');

         $jam = $this->mjadwal->detail($id_jam);
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('jam','Jam','required', array('required' => 'Jam harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Edit Jam',
                           'jam' => $jam,
                           'isi'   => 'jadwal/edit');
            $this->load->view('admin/edit_jam',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $i = $this->input;
            $data=array( 'id_jam' => $id_jam,
                         'jam' => $i->post('jam'),
                         'durasi' => $i->post('durasi'));
            $this->mjadwal->edit($data);
            $this->session->set_flashdata('Sukses','Data Jam telah diedit');
            redirect(site_url('jadwal'));
        }
    }

    public function delete($id_jam)
    {
        $data = array('id_jam'=>$id_jam);
        $this->mjadwal->delete($data);
        $this->session->set_flashdata('Sukses','Data Jam telah dihapus');
        redirect(site_url('jadwal'));
    }

    public function lihat_mapel()
    {
        $mapel = $this->mjadwal->mapel();
        $data = array('mapel' => $mapel,
                      'isi' => 'data/mapel');
        $this->load->view('homepage/header');
        $this->load->view('admin/lihat_mapel',$data);
        $this->load->view('homepage/footer');
    }

    public function tambah_mapel()
    {
        $this->load->view('homepage/header');
        
        $akhir = $this->mjadwal->akhir_mapel();
        $guru = $this->mguru->listing();
        $jam = $this->mjadwal->listing();
        $kelas = $this->mkelas->listing();
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('mapel','Mapel','required', array('required' => 'Mapel harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Tambah Mapel',
                           'guru'  => $guru,
                           'jam'   => $jam,
                           'kelas'   => $kelas,
                           'isi'   => 'jadwal/tambah_mapel');
            $this->load->view('admin/tambah_mapel',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $i = $this->input;
            $data=array( 'mapel' => $i->post('mapel'),
                         'id_jam' => $i->post('id_jam'),
                         'id_kelas' => $i->post('id_kelas'),
                         'id_guru'    => $i->post('id_guru'));
            $this->mjadwal->tambah_mapel($data);
            $this->session->set_flashdata('Sukses','Data Mapel telah ditambah');
            redirect(site_url('jadwal/lihat_mapel'));
        }
       
    }

    public function edit_mapel($id_mapel)
    {
        $this->load->view('homepage/header');

         $mapel = $this->mjadwal->detail_mapel($id_mapel);
         $guru = $this->mguru->listing();
          $akhir = $this->mjadwal->akhir_mapel();
          $jam = $this->mjadwal->listing();
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('mapel','Mapel','required', array('required' => 'Mapel harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Edit Mapel',
                           'guru'  => $guru,
                           'mapel' => $mapel,
                           'jam'   => $jam,
                           'isi'   => 'jadwal/edit_mapel');
            $this->load->view('admin/edit_mapel',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $i = $this->input;
            $data=array( 'id_mapel' => $id_mapel,
                         'mapel' => $i->post('mapel'),
                         'id_jam' => $i->post('id_jam'),
                         'id_guru'    => $i->post('id_guru'));
            $this->mjadwal->edit_mapel($data);
            $this->session->set_flashdata('Sukses','Data Mapel telah diedit');
            redirect(site_url('jadwal/lihat_mapel'));
        }
    }

    public function delete_mapel($id_mapel)
    {
        $data = array('id_mapel'=>$id_mapel);
        $this->mjadwal->delete_mapel($data);
        $this->session->set_flashdata('Sukses','Data Mapel telah dihapus');
        redirect(site_url('jadwal/lihat_mapel'));
    }

    public function jadwal()
    {
        $jadwal = $this->mjadwal->jadwal();
        $data = array('jadwal' => $jadwal,
                      'isi' => 'jadwal/jadwal');
        $this->load->view('homepage/header');
        $this->load->view('admin/lihat_jadwal',$data);
        $this->load->view('homepage/footer');
    }

    public function jadwal1()
    {
        $jadwal = $this->mjadwal->jadwal();
        $data = array('jadwal' => $jadwal,
                      'isi' => 'jadwal/jadwal');
        $this->load->view('homepage/head1');
        $this->load->view('admin/jadwal',$data);
        $this->load->view('homepage/footer');
    }

    public function tambah_jadwal()
    {
        $this->load->view('homepage/header');
        $jur = $this->mjadwal->get_jur();
        $path = base_url('asset');
        $kelas = $this->mkelas->listing();
        $akhir = $this->mjadwal->akhir_jadwal();
        $mapel = $this->mjadwal->mapel();
        $hari = $this->mjadwal->hari();
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('sem','Sem','required', array('required' => 'Semester harus dipilih'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Tambah Mapel',
                           'kelas' => $kelas,
                           'jur'   => $jur,
                           'mapel' => $mapel,
                           'hari'  => $hari,
                           'path'  => $path,
                           'isi'   => 'jadwal/tambah_mapel');
            $this->load->view('admin/tambah_jadwal',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $i = $this->input;
            $data=array( 'sem'    => $i->post('sem'),
                         'id_hari'    => $i->post('id_hari'),
                         'id_kelas'   => $i->post('id_kelas'),
                         'id_jur'     => $i->post('id_jur'),
                         'id_mapel'   => $i->post('id_mapel'));
            $this->mjadwal->tambah_jadwal($data);
            $this->session->set_flashdata('Sukses','Data Jadwal telah ditambah');
            redirect(site_url('jadwal/jadwal'));
        }
       
    }

    public function edit_jadwal($id_jadwal)
    {
        $this->load->view('homepage/header');

         $jadwal = $this->mjadwal->detail_jadwal($id_jadwal);
         $jur = $this->mjadwal->get_jur();
        $path = base_url('asset');
          $akhir = $this->mjadwal->akhir_jadwal();
          $jam = $this->mjadwal->listing();
          $mapel = $this->mjadwal->mapel();
          $kelas = $this->mkelas->listing();
          $hari = $this->mjadwal->hari();
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('sem','Sem','required', array('required' => 'Semester harus dipilih'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Edit Jadwal',
                           'jadwal' => $jadwal,
                           'mapel' => $mapel,
                           'jur'   => $jur,
                           'kelas' => $kelas,
                           'hari'  => $hari,
                           'path'  => $path,
                           'isi'   => 'jadwal/edit_jadwal');
            $this->load->view('admin/edit_jadwal',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $i = $this->input;
            $data=array( 'id_jadwal'    => $id_jadwal,
                         'id_mapel'     => $i->post('id_mapel'),
                         'id_jur'       => $i->post('id_jur'),
                         'id_kelas'     => $i->post('id_kelas'),
                         'id_hari'      => $i->post('id_hari'),
                         'sem'          => $i->post('sem'));
            $this->mjadwal->edit_jadwal($data);
            $this->session->set_flashdata('Sukses','Data Jadwal telah diedit');
            redirect(site_url('jadwal/jadwal'));
        }
    }

    public function delete_jadwal($id_jadwal)
    {
        $data = array('id_jadwal'=>$id_jadwal);
        $this->mjadwal->delete_jadwal($data);
        $this->session->set_flashdata('Sukses','Data Jadwal telah dihapus');
        redirect(site_url('jadwal/jadwal'));
    }

    public function tampil()
    {
        $jadwal = $this->mjadwal->jadwal();
        $data = array('jadwal' => $jadwal,
                      'isi' => 'jadwal/jadwal');
        $this->load->view('homepage/head3');
        $this->load->view('admin/tampil_jadwal',$data);
        $this->load->view('homepage/footer');
    }

    public function tampil_a($user)
    {
        $jadwal = $this->mjadwal->jadwal_a($user);
        $username = $this->uri->segment('2');
        $user = $this->input->get($username, TRUE);
        $data = array('jadwal' => $jadwal,
                      'isi' => 'jadwal/jadwal');
        $this->load->view('homepage/head3');
        $this->load->view('admin/tampil_jadwal',$data);
        $this->load->view('homepage/footer');
    }

    public function tampil_1($user)
    {
        $jadwal = $this->mjadwal->jadwal_a($user);
        $username = $this->uri->segment('2');
        $user = $this->input->get($username, TRUE);
        $data = array('jadwal' => $jadwal,
                      'isi' => 'jadwal/jadwal');
        $this->load->view('homepage/head1');
        $this->load->view('admin/tampil_jadwal',$data);
        $this->load->view('homepage/footer');
    }

    public function tampil2()
    {
        $jadwal = $this->mjadwal->jadwal();
        $data = array('jadwal' => $jadwal,
                      'isi' => 'jadwal/jadwal');
        $this->load->view('homepage/head2');
        $this->load->view('admin/tampil_jadwal',$data);
        $this->load->view('homepage/footer');
    }


    public function chain()
    {
      $data['jurusan'] = $this->mjadwal->get_jur();
      $mapel = $this->input->get('mapel', TRUE);
        $kls = $this->input->get('kelas', TRUE);
        $jrs = $this->input->get('jrs', TRUE);
      $data['records'] = $this->mabsen->getrecord2($kls,$jrs,$mapel);
      $data['path'] = base_url('asset');
      $this->load->view('homepage/header');
      $this->load->view('kelas/absen',$data);
      $this->load->view('homepage/footer');
    }

    public function add_ajax_kelas($id_jur)
    {
      $query = $this->db->get_where('kelas',array('id_jur'=>$id_jur));
      $data = "<option value=''>- Pilih Kelas -</option>";
      foreach ($query->result() as $value) {
        $data .= "<option value='".$value->id_kelas."'>".$value->kelas."</option>";
      }
      echo $data;
    }

    public function add_ajax_mapel($id_kelas)
    {
      $query = $this->db->get_where('mapel',array('id_kelas'=>$id_kelas));
      $data = "<option value=''>- Pilih Mata Pelajaran -</option>";
      foreach ($query->result() as $value) {
        $data .= "<option value='".$value->id_mapel."'>".$value->mapel."</option>";
      }
      echo $data;
    }

    public function cobalagi()
    {
      $data['jurusan'] = $this->mjadwal->get_jur();
      $data['path'] = base_url('asset');
        $mapel = $this->input->get('mapel', TRUE);
        $kls = $this->input->get('kelas', TRUE);
        $jrs = $this->input->get('jrs', TRUE);
        $data['records'] = $this->mabsen->getrecord2($kls,$jrs,$mapel);
        $this->load->view('homepage/header');
        $this->load->view('kelas/absen',$data);
        $this->load->view('homepage/footer');
    }
}