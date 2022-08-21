<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class Siswa extends CI_Controller
{
    // create akan menampilkan form
    public function __construct()
        {
                parent::__construct();
                $this->load->model('mkelas');
                $this->load->model('msiswa');
                $this->load->model('mjur');
                $this->load->model('mabsen');
                $this->load->model('mjadwal');
                $this->load->helper(array('url','html'));
                $this->load->library('session');
                $this->load->library('form_validation');
                $this->load->database();
        }

    public function index()
    {
        $siswa = $this->msiswa->listing();
        $data = array('siswa' => $siswa,
                      'isi' => 'data/kelas');
        $this->load->view('homepage/header');
        $this->load->view('siswa/lihat_siswa',$data);
        $this->load->view('homepage/footer');
    }

    public function test()
    {
      $data['jurusan'] = $this->mjadwal->get_jur();
      $data['path'] = base_url('asset');
      $this->load->view('homepage/header');
      $this->load->view('kelas/test',$data);
      $this->load->view('homepage/footer');
    }

    public function tambah()
    {
        $jurusan = $this->mjadwal->get_jur();
        $path = base_url('asset');
        $this->load->view('homepage/header');
        $akhir = $this->msiswa->akhir();
        $kelas = $this->mkelas->listing();
        $jur = $this->mjur->listing();
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('nis','NIS','required', array('required' => 'NIS harus diisi'));

        if($valid->run())
        {

            $config['upload_path'] ='asset/upload/img/';
            $config['allowed_types'] = 'gif|jpg|png|svg';
            $config['max_size'] = '12000'; //Kb
            $this->load->library('upload',$config);
            if (! $this->upload->do_upload('foto')) {

            $data = array( 'title' => 'Tambah Siswa',
                           'kelas' => $kelas,
                           'jur'   => $jur,
                           'jurusan' => $jurusan,
                   'path'  => $path,
                           'error' => $this->upload->display_errors(),
                           'isi'   => 'siswa/tambah');
            $this->load->view('siswa/tambah_siswa',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $upload_data   = array('uploads' =>$this->upload->data());
            //image editor
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'asset/upload/img/'.$upload_data['uploads']['file_name'];
            $config['new_image'] = 'asset/upload/img/thumbs/';
            $config['create_thumb'] = TRUE;
            $config['quality'] = "100%";
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 360;
            $config['height'] = 360;
            $config['x_axis'] = 0;
            $config['y_axis'] = 0;
            $config['thumb_marker'] = '';
            $this->load->library('image_lib',$config);
            $this->image_lib->resize();

            $i = $this->input;
            $url_akhir = $akhir->nis+1;

            $data=array( 
                'nis'              => $i->post('nis'),
                'nisn'             =>$i->post('nisn'),
                'id_kelas'         =>$i->post('id_kelas'),
                'id_jur'           =>$i->post('id_jur'),
                'nama'             =>$i->post('nama'),
                'jk'               =>$i->post('jk'),
                'ttl'              =>$i->post('ttl'),
                'alamat'           =>$i->post('alamat'),
                'no_hp'            =>$i->post('no_hp'),
                'agama'            =>$i->post('agama'),
                'umur'             =>$i->post('umur'),
                'status'           =>$i->post('status'),
                'anak_ke'          =>$i->post('anak_ke'),
                'foto'             =>$upload_data['uploads']['file_name'],
                'tgl_masuk'        =>$i->post('tgl_masuk'),
                'asal_sklh'        =>$i->post('asal_sklh'),
                'alamat_asal_sklh' =>$i->post('alamat_asal_sklh'),
                'no_ijazah'        =>$i->post('no_ijazah'),
                'th_ijazah'        =>$i->post('th_ijazah'),
                'no_skhu'          =>$i->post('no_skhu'),
                'th_skhu'          =>$i->post('th_skhu'),
                'nama_ibu'         =>$i->post('nama_ibu'),
                'nama_ayah'        =>$i->post('nama_ayah'),
                'pkj_ibu'          =>$i->post('pkj_ibu'),
                'pkj_ayah'         =>$i->post('pkj_ayah'),
                'nohp_ortu'        =>$i->post('nohp_ortu'),
                'alamat_ortu'      =>$i->post('alamat_ortu'),
                'wali'             =>$i->post('wali'),
                'pkj_wali'         =>$i->post('pkj_wali'),
                'alamat_wali'      =>$i->post('alamat_wali'),
                'tlp_wali'         =>$i->post('tlp_wali'));

            $this->msiswa->tambah($data);
            $this->session->set_flashdata('Sukses','Data Siswa telah ditambah');
            redirect(site_url('siswa'));
        }
    }
    $data = array( 'title' => 'Tambah Siswa',                
                   'kelas' => $kelas,
                   'jur'   => $jur,
                   'jurusan' => $jurusan,
                   'path'  => $path,
                   'isi'   => 'siswa/tambah');
            $this->load->view('siswa/tambah_siswa',$data);
        $this->load->view('homepage/footer');

    }

    public function edit($nis)
    {
        $this->load->view('homepage/header');
        $jurusan = $this->mjadwal->get_jur();
        $path = base_url('asset');
        $siswa = $this->msiswa->detail($nis);
        $kelas = $this->mkelas->listing();
        $akhir = $this->msiswa->akhir();
        $jur   = $this->mjur->listing();
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('nis','NIS','required', array('required' => 'NIS harus diisi'));

        if($valid->run())
        {
            if(!empty($_FILES['foto']['name'])){
            $config['upload_path'] ='asset/upload/img/';
            $config['allowed_types'] = 'gif|jpg|png|svg';
            $config['max_size'] = '12000'; //Kb
            $this->load->library('upload',$config);
            if (! $this->upload->do_upload('foto')) {

            $data = array( 'title'      => 'Tambah Siswa',
                           'siswa'      => $siswa,
                           'kelas'      => $kelas,
                           'jur'        => $jur,
                           'jurusan' => $jurusan,
                            'path'  => $path,
                           'error'      => $this->upload->display_errors(),
                           'isi'        => 'siswa/edit');
            $this->load->view('siswa/edit_siswa',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $upload_data   = array('uploads' =>$this->upload->data());
            //image editor
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'asset/upload/img/'.$upload_data['uploads']['file_name'];
            $config['new_image'] = 'asset/upload/img/thumbs/';
            $config['create_thumb'] = TRUE;
            $config['quality'] = "100%";
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 360;
            $config['height'] = 360;
            $config['x_axis'] = 0;
            $config['y_axis'] = 0;
            $config['thumb_marker'] = '';
            $this->load->library('image_lib',$config);
            $this->image_lib->resize();

            //hapus gambar
        if($siswa->foto != ""){
            unlink('/asset/upload/img/'.$siswa->foto);
            unlink('/asset/upload/img/thumbs/'.$siswa->foto);
        }

            $i = $this->input;
            $data=array( 
                'nis'              => $nis,
                'nisn'             =>$i->post('nisn'),
                'id_kelas'         =>$i->post('id_kelas'),
                'id_jur'           =>$i->post('id_jur'),
                'nama'             =>$i->post('nama'),
                'jk'               =>$i->post('jk'),
                'ttl'              =>$i->post('ttl'),
                'alamat'           =>$i->post('alamat'),
                'no_hp'            =>$i->post('no_hp'),
                'agama'            =>$i->post('agama'),
                'umur'             =>$i->post('umur'),
                'status'           =>$i->post('status'),
                'anak_ke'          =>$i->post('anak_ke'),
                'foto'             =>$upload_data['uploads']['file_name'],
                'tgl_masuk'        =>$i->post('tgl_masuk'),
                'asal_sklh'        =>$i->post('asal_sklh'),
                'alamat_asal_sklh' =>$i->post('alamat_asal_sklh'),
                'no_ijazah'        =>$i->post('no_ijazah'),
                'th_ijazah'        =>$i->post('th_ijazah'),
                'no_skhu'          =>$i->post('no_skhu'),
                'th_skhu'          =>$i->post('th_skhu'),
                'nama_ibu'         =>$i->post('nama_ibu'),
                'nama_ayah'        =>$i->post('nama_ayah'),
                'pkj_ibu'          =>$i->post('pkj_ibu'),
                'pkj_ayah'         =>$i->post('pkj_ayah'),
                'nohp_ortu'        =>$i->post('nohp_ortu'),
                'alamat_ortu'      =>$i->post('alamat_ortu'),
                'wali'             =>$i->post('wali'),
                'pkj_wali'         =>$i->post('pkj_wali'),
                'alamat_wali'      =>$i->post('alamat_wali'),
                'tlp_wali'         =>$i->post('tlp_wali')
                );
            $this->msiswa->edit($data);
            $this->session->set_flashdata('Sukses','Data Siswa telah diedit');
            redirect(site_url('siswa'));
        }
    }else{
        //update tanpa ganti gambar
        $i = $this->input;
            $data=array( 
                'nis'              => $nis,
                'nisn'             =>$i->post('nisn'),
                'id_kelas'         =>$i->post('id_kelas'),
                'id_jur'           =>$i->post('id_jur'),
                'nama'             =>$i->post('nama'),
                'jk'               =>$i->post('jk'),
                'ttl'              =>$i->post('ttl'),
                'alamat'           =>$i->post('alamat'),
                'no_hp'            =>$i->post('no_hp'),
                'agama'            =>$i->post('agama'),
                'umur'             =>$i->post('umur'),
                'status'           =>$i->post('status'),
                'anak_ke'          =>$i->post('anak_ke'),
                'tgl_masuk'        =>$i->post('tgl_masuk'),
                'asal_sklh'        =>$i->post('asal_sklh'),
                'alamat_asal_sklh' =>$i->post('alamat_asal_sklh'),
                'no_ijazah'        =>$i->post('no_ijazah'),
                'th_ijazah'        =>$i->post('th_ijazah'),
                'no_skhu'          =>$i->post('no_skhu'),
                'th_skhu'          =>$i->post('th_skhu'),
                'nama_ibu'         =>$i->post('nama_ibu'),
                'nama_ayah'        =>$i->post('nama_ayah'),
                'pkj_ibu'          =>$i->post('pkj_ibu'),
                'pkj_ayah'         =>$i->post('pkj_ayah'),
                'nohp_ortu'        =>$i->post('nohp_ortu'),
                'alamat_ortu'      =>$i->post('alamat_ortu'),
                'wali'             =>$i->post('wali'),
                'pkj_wali'         =>$i->post('pkj_wali'),
                'alamat_wali'      =>$i->post('alamat_wali'),
                'tlp_wali'         =>$i->post('tlp_wali')
                );
            $this->msiswa->edit($data);
            $this->session->set_flashdata('Sukses','Data Siswa telah diedit');
            redirect(site_url('siswa'));
    }}
    $data = array(  'title'     => 'Tambah Siswa',               
                    'siswa'      => $siswa,
                    'kelas'      => $kelas,
                    'jur'        => $jur,
                    'jurusan' => $jurusan,
                   'path'  => $path,
                    'isi'       => 'siswa/tambah');
            $this->load->view('siswa/edit_siswa',$data);
        $this->load->view('homepage/footer');

    }

    public function preview($nis)
    {
        
        $siswa = $this->msiswa->detail($nis);
        $kelas = $this->mkelas->listing();
        $akhir = $this->msiswa->akhir();
        $jur   = $this->mjur->listing();

        $data = array('title'     => 'Detail Siswa',               
                    'siswa'      => $siswa,
                    'kelas'      => $kelas,
                    'jur'        => $jur,
                    'isi'       => 'siswa/detail');
        $this->load->view('siswa/preview',$data);

    }

    public function delete($nis)
    {
        $siswa = $this->msiswa->detail($nis);
        //hapus gambar
        if($siswa->foto != ""){
            unlink('/asset/upload/img/'.$siswa->foto);
            unlink('/asset/upload/img/thumbs/'.$siswa->foto);
        }

        $data = array('nis'=>$nis);
        $this->msiswa->delete($data);
        $this->session->set_flashdata('Sukses','Data Siswa telah dihapus');
        redirect(site_url('siswa'));
    }

    public function detail($nis)
    {
        $this->load->view('homepage/header');

        $siswa = $this->msiswa->detail($nis);
        $kelas = $this->mkelas->listing();
        $akhir = $this->msiswa->akhir();
        $jur   = $this->mjur->listing();

        $data = array('title'     => 'Detail Siswa',               
                    'siswa'      => $siswa,
                    'kelas'      => $kelas,
                    'jur'        => $jur,
                    'isi'       => 'siswa/detail');
        $this->load->view('siswa/detail_siswa',$data);
        $this->load->view('homepage/footer');

    }

    public function lihat_siswa()
    {
        $siswa = $this->msiswa->listing();
        $data = array('siswa' => $siswa,
                      'isi' => 'data/kelas');
        $this->load->view('homepage/head1');
        $this->load->view('siswa/lihat',$data);
        $this->load->view('homepage/footer');
    }

    public function tambah_siswa()
    {
        $this->load->view('homepage/head1');
        
        $jurusan = $this->mjadwal->get_jur();
        $path = base_url('asset');
        $akhir = $this->msiswa->akhir();
        $kelas = $this->mkelas->listing();
        $jur = $this->mjur->listing();
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('nis','NIS','required', array('required' => 'NIS harus diisi'));

        if($valid->run())
        {

            $config['upload_path'] ='asset/upload/img/';
            $config['allowed_types'] = 'gif|jpg|png|svg';
            $config['max_size'] = '12000'; //Kb
            $this->load->library('upload',$config);
            if (! $this->upload->do_upload('foto')) {

            $data = array( 'title' => 'Tambah Siswa',
                           'kelas' => $kelas,
                           'jur'   => $jur,
                           'jurusan' => $jurusan,
                            'path'  => $path,
                           'error' => $this->upload->display_errors(),
                           'isi'   => 'siswa/tambah');
            $this->load->view('siswa/tambah',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $upload_data   = array('uploads' =>$this->upload->data());
            //image editor
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'asset/upload/img/'.$upload_data['uploads']['file_name'];
            $config['new_image'] = 'asset/upload/img/thumbs/';
            $config['create_thumb'] = TRUE;
            $config['quality'] = "100%";
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 360;
            $config['height'] = 360;
            $config['x_axis'] = 0;
            $config['y_axis'] = 0;
            $config['thumb_marker'] = '';
            $this->load->library('image_lib',$config);
            $this->image_lib->resize();

            $i = $this->input;
            $url_akhir = $akhir->nis+1;

            $data=array( 
                'nis'              => $i->post('nis'),
                'nisn'             =>$i->post('nisn'),
                'id_kelas'         =>$i->post('id_kelas'),
                'id_jur'           =>$i->post('id_jur'),
                'nama'             =>$i->post('nama'),
                'jk'               =>$i->post('jk'),
                'ttl'              =>$i->post('ttl'),
                'alamat'           =>$i->post('alamat'),
                'no_hp'            =>$i->post('no_hp'),
                'agama'            =>$i->post('agama'),
                'umur'             =>$i->post('umur'),
                'status'           =>$i->post('status'),
                'anak_ke'          =>$i->post('anak_ke'),
                'foto'             =>$upload_data['uploads']['file_name'],
                'tgl_masuk'        =>$i->post('tgl_masuk'),
                'asal_sklh'        =>$i->post('asal_sklh'),
                'alamat_asal_sklh' =>$i->post('alamat_asal_sklh'),
                'no_ijazah'        =>$i->post('no_ijazah'),
                'th_ijazah'        =>$i->post('th_ijazah'),
                'no_skhu'          =>$i->post('no_skhu'),
                'th_skhu'          =>$i->post('th_skhu'),
                'nama_ibu'         =>$i->post('nama_ibu'),
                'nama_ayah'        =>$i->post('nama_ayah'),
                'pkj_ibu'          =>$i->post('pkj_ibu'),
                'pkj_ayah'         =>$i->post('pkj_ayah'),
                'nohp_ortu'        =>$i->post('nohp_ortu'),
                'alamat_ortu'      =>$i->post('alamat_ortu'),
                'wali'             =>$i->post('wali'),
                'pkj_wali'         =>$i->post('pkj_wali'),
                'alamat_wali'      =>$i->post('alamat_wali'),
                'tlp_wali'         =>$i->post('tlp_wali'));

            $this->msiswa->tambah($data);
            $this->session->set_flashdata('Sukses','Data Siswa telah ditambah');
            redirect(site_url('siswa/lihat_siswa'));
        }
    }
    $data = array( 'title' => 'Tambah Siswa',                
                   'kelas' => $kelas,
                   'jur'   => $jur,
                   'jurusan' => $jurusan,
                   'path'  => $path,
                   'isi'   => 'siswa/tambah');
            $this->load->view('siswa/tambah',$data);
        $this->load->view('homepage/footer');

    }

    public function edit_siswa($nis)
    {
        $this->load->view('homepage/head1');
        $jurusan = $this->mjadwal->get_jur();
        $path = base_url('asset');
        $siswa = $this->msiswa->detail($nis);
        $kelas = $this->mkelas->listing();
        $akhir = $this->msiswa->akhir();
        $jur   = $this->mjur->listing();
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('nis','NIS','required', array('required' => 'NIS harus diisi'));

        if($valid->run())
        {
            if(!empty($_FILES['foto']['name'])){
            $config['upload_path'] ='asset/upload/img/';
            $config['allowed_types'] = 'gif|jpg|png|svg';
            $config['max_size'] = '12000'; //Kb
            $this->load->library('upload',$config);
            if (! $this->upload->do_upload('foto')) {

            $data = array( 'title'      => 'Tambah Siswa',
                           'siswa'      => $siswa,
                           'kelas'      => $kelas,
                           'jur'        => $jur,
                           'jurusan' => $jurusan,
                            'path'  => $path,
                           'error'      => $this->upload->display_errors(),
                           'isi'        => 'siswa/edit');
            $this->load->view('siswa/edit',$data);
        $this->load->view('homepage/footer');
            //masuk database
        }else{
            $upload_data   = array('uploads' =>$this->upload->data());
            //image editor
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'asset/upload/img/'.$upload_data['uploads']['file_name'];
            $config['new_image'] = 'asset/upload/img/thumbs/';
            $config['create_thumb'] = TRUE;
            $config['quality'] = "100%";
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 360;
            $config['height'] = 360;
            $config['x_axis'] = 0;
            $config['y_axis'] = 0;
            $config['thumb_marker'] = '';
            $this->load->library('image_lib',$config);
            $this->image_lib->resize();

            //hapus gambar
        if($siswa->foto != ""){
            unlink('/asset/upload/img/'.$siswa->foto);
            unlink('/asset/upload/img/thumbs/'.$siswa->foto);
        }

            $i = $this->input;
            $data=array( 
                'nis'              => $nis,
                'nisn'             =>$i->post('nisn'),
                'id_kelas'         =>$i->post('id_kelas'),
                'id_jur'           =>$i->post('id_jur'),
                'nama'             =>$i->post('nama'),
                'jk'               =>$i->post('jk'),
                'ttl'              =>$i->post('ttl'),
                'alamat'           =>$i->post('alamat'),
                'no_hp'            =>$i->post('no_hp'),
                'agama'            =>$i->post('agama'),
                'umur'             =>$i->post('umur'),
                'status'           =>$i->post('status'),
                'anak_ke'          =>$i->post('anak_ke'),
                'foto'             =>$upload_data['uploads']['file_name'],
                'tgl_masuk'        =>$i->post('tgl_masuk'),
                'asal_sklh'        =>$i->post('asal_sklh'),
                'alamat_asal_sklh' =>$i->post('alamat_asal_sklh'),
                'no_ijazah'        =>$i->post('no_ijazah'),
                'th_ijazah'        =>$i->post('th_ijazah'),
                'no_skhu'          =>$i->post('no_skhu'),
                'th_skhu'          =>$i->post('th_skhu'),
                'nama_ibu'         =>$i->post('nama_ibu'),
                'nama_ayah'        =>$i->post('nama_ayah'),
                'pkj_ibu'          =>$i->post('pkj_ibu'),
                'pkj_ayah'         =>$i->post('pkj_ayah'),
                'nohp_ortu'        =>$i->post('nohp_ortu'),
                'alamat_ortu'      =>$i->post('alamat_ortu'),
                'wali'             =>$i->post('wali'),
                'pkj_wali'         =>$i->post('pkj_wali'),
                'alamat_wali'      =>$i->post('alamat_wali'),
                'tlp_wali'         =>$i->post('tlp_wali')
                );
            $this->msiswa->edit($data);
            $this->session->set_flashdata('Sukses','Data Siswa telah diedit');
            redirect(site_url('siswa/lihat_siswa'));
        }
    }else{
        //update tanpa ganti gambar
        $i = $this->input;
            $data=array( 
                'nis'              => $nis,
                'nisn'             =>$i->post('nisn'),
                'id_kelas'         =>$i->post('id_kelas'),
                'id_jur'           =>$i->post('id_jur'),
                'nama'             =>$i->post('nama'),
                'jk'               =>$i->post('jk'),
                'ttl'              =>$i->post('ttl'),
                'alamat'           =>$i->post('alamat'),
                'no_hp'            =>$i->post('no_hp'),
                'agama'            =>$i->post('agama'),
                'umur'             =>$i->post('umur'),
                'status'           =>$i->post('status'),
                'anak_ke'          =>$i->post('anak_ke'),
                'tgl_masuk'        =>$i->post('tgl_masuk'),
                'asal_sklh'        =>$i->post('asal_sklh'),
                'alamat_asal_sklh' =>$i->post('alamat_asal_sklh'),
                'no_ijazah'        =>$i->post('no_ijazah'),
                'th_ijazah'        =>$i->post('th_ijazah'),
                'no_skhu'          =>$i->post('no_skhu'),
                'th_skhu'          =>$i->post('th_skhu'),
                'nama_ibu'         =>$i->post('nama_ibu'),
                'nama_ayah'        =>$i->post('nama_ayah'),
                'pkj_ibu'          =>$i->post('pkj_ibu'),
                'pkj_ayah'         =>$i->post('pkj_ayah'),
                'nohp_ortu'        =>$i->post('nohp_ortu'),
                'alamat_ortu'      =>$i->post('alamat_ortu'),
                'wali'             =>$i->post('wali'),
                'pkj_wali'         =>$i->post('pkj_wali'),
                'alamat_wali'      =>$i->post('alamat_wali'),
                'tlp_wali'         =>$i->post('tlp_wali')
                );
            $this->msiswa->edit($data);
            $this->session->set_flashdata('Sukses','Data Siswa telah diedit');
            redirect(site_url('siswa/lihat_siswa'));
    }}
    $data = array(  'title'     => 'Tambah Siswa',               
                    'siswa'      => $siswa,
                    'kelas'      => $kelas,
                    'jur'        => $jur,
                    'jurusan' => $jurusan,
                    'path'  => $path,
                    'isi'       => 'siswa/tambah');
            $this->load->view('siswa/edit',$data);
        $this->load->view('homepage/footer');

    }

    public function delete_siswa($nis)
    {
        $siswa = $this->msiswa->detail($nis);
        //hapus gambar
        if($siswa->foto != ""){
            unlink('/asset/upload/img/'.$siswa->foto);
            unlink('/asset/upload/img/thumbs/'.$siswa->foto);
        }

        $data = array('nis'=>$nis);
        $this->msiswa->delete($data);
        $this->session->set_flashdata('Sukses','Data Siswa telah dihapus');
        redirect(site_url('siswa/lihat_siswa'));
    }

    public function detail_siswa($nis)
    {
        $this->load->view('homepage/head1');

        $siswa = $this->msiswa->detail($nis);
        $kelas = $this->mkelas->listing();
        $akhir = $this->msiswa->akhir();
        $jur   = $this->mjur->listing();

        $data = array('title'     => 'Detail Siswa',               
                    'siswa'      => $siswa,
                    'kelas'      => $kelas,
                    'jur'        => $jur,
                    'isi'       => 'siswa/detail');
        $this->load->view('siswa/detail',$data);
        $this->load->view('homepage/footer');

    }

     public function absen()
    {
        $absen = $this->mabsen->coba();
        $data = array( 'title' => 'Absen',
                      'absen' => $absen,
                      'isi' => 'data/absen');
        $this->load->view('homepage/head1');
        $this->load->view('absen/absen',$data);
        $this->load->view('homepage/footer');
    }

    public function T_print($nis)
    {
        
        ob_start();
        $data['siswa'] = $this->msiswa->detail($nis);
        $this->load->view('siswa/print_siswa', $data);
        $html = ob_get_contents();
        ob_end_clean();
        
        require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/absensmk/asset/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P','A4','en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Siswa.pdf', 'D');
    }


    public function tampil()
    {
        $data['jurusan'] = $this->mjadwal->get_jur();
      $mapel = $this->input->get('mapel', TRUE);
        $kls = $this->input->get('kelas', TRUE);
        $jrs = $this->input->get('jrs', TRUE);
      $data['records'] = $this->mabsen->getrecord2($kls,$jrs,$mapel);
      $data['path'] = base_url('asset');
        $this->load->view('homepage/head1');
        $this->load->view('siswa/tampil_absen',$data);
        $this->load->view('homepage/footer');
    }

    public function tampil2()
    {
        $data['jurusan'] = $this->mjadwal->get_jur();
      $mapel = $this->input->get('mapel', TRUE);
        $kls = $this->input->get('kelas', TRUE);
        $jrs = $this->input->get('jrs', TRUE);
      $data['records'] = $this->mabsen->getrecord2($kls,$jrs,$mapel);
      $data['path'] = base_url('asset');
        $this->load->view('homepage/head2');
        $this->load->view('siswa/tampil_absen2',$data);
        $this->load->view('homepage/footer');
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
            $tanggal = date('Y-m-d h:i:sa');
            $result = array();
            foreach ($id_siswa as $key => $val) {
                $result[] = array( "id_siswa" => $_POST['id_siswa'][$key],
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
                redirect('siswa/tampil');
            }else{
                echo "Absen gagal disimpan";
            }
        }
       }

       public function save2(){
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
            $tanggal = date('Y-m-d h:i:sa');
            $result = array();
            foreach ($nis as $key => $val) {
                $result[] = array( "id_siswa" => $_POST['id_siswa'][$key],
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
                redirect('siswa/tampil2');
            }else{
                echo "Absen gagal disimpan";
            }
        }
       }

    }