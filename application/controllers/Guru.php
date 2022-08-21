<?php
 
if (!defined('BASEPATH'))exit('No direct script access allowed');
 
class Guru extends CI_Controller
{
    // create akan menampilkan form
    public function __construct()
        {
                parent::__construct();
                $this->load->model('mguru');
                $this->load->model('msiswa');
                $this->load->model('mabsen');
                $this->load->model('mguru');
                $this->load->model('msem');
                $this->load->model('mjur');
                $this->load->model('mjadwal');
                $this->load->model('mrekap');
                $this->load->helper(array('url','html'));
                $this->load->library('session');
                $this->load->library('form_validation');
                $this->load->database();
        }

    public function index()
    {
        $guru = $this->mguru->listing();
        $data = array('guru' => $guru,
                      'isi'             => 'guru/guru');
        $this->load->view('homepage/header');
        $this->load->view('guru/lihat_guru',$data);
        $this->load->view('homepage/footer');
    }

    public function lihat_guru()
    {
        $absen = $this->mabsen->guru();
        $data = array( 'title' => 'Absen',
                      'absen' => $absen,
                      'isi' => 'data/absen');
        $this->load->view('homepage/head1');
        $this->load->view('guru/lht_guru',$data);
        $this->load->view('homepage/footer');
    }

    public function lihat_gr($id_guru)
    {
        $guru = $this->mguru->detail2($id_guru);
        $data = array('guru' => $guru,
                      'isi'  => 'guru/guru');
        $this->load->view('homepage/head3');
        $this->load->view('guru/guru',$data);
        $this->load->view('homepage/footer');
    }

    public function lihat_wk($id_guru)
    {
        $guru = $this->mguru->detail2($id_guru);
        $data = array('guru' => $guru,
                      'isi'  => 'guru/guru');
        $this->load->view('homepage/head1');
        $this->load->view('guru/guru1',$data);
        $this->load->view('homepage/footer');
    }

    public function tambah()
    {
        $this->load->view('homepage/header');

        
        $akhir = $this->mguru->akhir();
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('nip','nip','required', array('required' => 'ID Guru harus diisi'));
        $valid->set_rules('nama_guru','nama_guru','required', array('required' => 'Nama Guru harus diisi'));

        if($valid->run())
        {

            $config['upload_path'] ='asset/upload/img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|svg';
            $config['max_size'] = '12000'; //Kb
            $this->load->library('upload',$config);
            if (! $this->upload->do_upload('foto')) {

            $data = array( 'title' => 'Tambah Guru',
                           'error'     => $this->upload->display_errors(),
                           'isi'   => 'guru/tambah');
            $this->load->view('guru/tambah_guru',$data);
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
            $url_akhir = $akhir->id_guru+1;

            $data=array( 
                'nip'     => $i->post('nip'),
                'nama_guru'     =>$i->post('nama_guru'),
                'jabatan'       =>$i->post('jabatan'),
                'bid_studi'       =>$i->post('bid_studi'),
                'alamat'       =>$i->post('alamat'),
                'no_hp'       =>$i->post('no_hp'),
                'jk'       =>$i->post('jk'),
                'tempat'       =>$i->post('tempat'),
                'tanggal'       =>$i->post('tanggal'),
                'foto'    =>$upload_data['uploads']['file_name']);
            $this->mguru->tambah($data);
            $this->session->set_flashdata('Sukses','Data Guru telah ditambah');
            redirect(site_url('guru'));
        }
    }
    $data = array( 'title' => 'Tambah Guru',                
               // 'error'     => $this->upload->display_errors(),
                           'isi'   => 'guru/tambah');
            $this->load->view('guru/tambah_guru',$data);
            $this->load->view('homepage/footer');
    }

    public function tambah_guru()
    {
        $this->load->view('homepage/head1');

        
        $akhir = $this->mguru->akhir();
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('nip','nip','required', array('required' => 'ID Guru harus diisi'));
        $valid->set_rules('nama_guru','nama_guru','required', array('required' => 'Nama Guru harus diisi'));

        if($valid->run())
        {

            $config['upload_path'] ='asset/upload/img/';
            $config['allowed_types'] = 'gif|jpg|png|svg';
            $config['max_size'] = '12000'; //Kb
            $this->load->library('upload',$config);
            if (! $this->upload->do_upload('foto')) {

            $data = array( 'title' => 'Tambah Guru',
                           'error'     => $this->upload->display_errors(),
                           'isi'   => 'guru/tambah_guru');
            $this->load->view('guru/tmb_guru',$data);
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
            $url_akhir = $akhir->id_guru+1;

            $data=array( 
                'nip'     => $i->post('nip'),
                'nama_guru'     =>$i->post('nama_guru'),
                'jabatan'       =>$i->post('jabatan'),
                'bid_studi'       =>$i->post('bid_studi'),
                'alamat'       =>$i->post('alamat'),
                'no_hp'       =>$i->post('no_hp'),
                'jk'       =>$i->post('jk'),
                'tempat'       =>$i->post('tempat'),
                'tanggal'       =>$i->post('tanggal'),
                'foto'    =>$upload_data['uploads']['file_name']);
            $this->mguru->tambah($data);
            $this->session->set_flashdata('Sukses','Data Guru telah ditambah');
            redirect(site_url('guru/lihat_guru'));
        }
    }
    $data = array( 'title' => 'Tambah Guru',                
               // 'error'     => $this->upload->display_errors(),
                           'isi'   => 'guru/tambah_guru');
            $this->load->view('guru/tmb_guru',$data);
            $this->load->view('homepage/footer');
    }

    public function edit($id_guru)
    {

        $guru = $this->mguru->detail($id_guru);
         $akhir = $this->mguru->akhir();
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('nip','nip','required', array('required' => 'ID Guru harus diisi'));
        $valid->set_rules('nama_guru','nama_guru','required', array('required' => 'Nama Guru harus diisi'));

        if($valid->run())
        {
            if(!empty($_FILES['foto']['name'])){
            $config['upload_path'] ='asset/upload/img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|svg';
            $config['max_size'] = '12000'; //Kb
            $this->load->library('upload',$config);
            if (! $this->upload->do_upload('foto')) {

            $data = array( 'title'      => 'Tambah Guru',
                           'guru'       => $guru,
                           'error'      => $this->upload->display_errors(),
                           'isi'        => 'guru/edit');
            $this->load->view('homepage/header');
            $this->load->view('guru/edit_guru',$data);
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
        if($guru->foto != ""){
            unlink('/asset/upload/img/'.$guru->foto);
            unlink('/asset/upload/img/thumbs/'.$guru->foto);
        }

            $i = $this->input;
            $data=array( 
                'id_guru'        =>$id_guru,
                'nip' => $i->post('nip'),
                'nama_guru' => $i->post('nama_guru'),
                'jabatan'       =>$i->post('jabatan'),
                'bid_studi'       =>$i->post('bid_studi'),
                'alamat'       =>$i->post('alamat'),
                'no_hp'       =>$i->post('no_hp'),
                'jk'       =>$i->post('jk'),
                'tempat'       =>$i->post('tempat'),
                'tanggal'       =>$i->post('tanggal'),
                'foto'    =>$upload_data['uploads']['file_name']
                );
            $this->mguru->edit($data);
            $this->session->set_flashdata('Sukses','Data Guru telah diedit');
            redirect(site_url('guru'));
        }
    }else{
        //update tanpa ganti gambar
        $i = $this->input;
            $data=array( 
                'id_guru'        =>$id_guru,
                'nip' => $i->post('nip'),
                'nama_guru' => $i->post('nama_guru'),
                'jabatan'       =>$i->post('jabatan'),
                'bid_studi'       =>$i->post('bid_studi'),
                'alamat'       =>$i->post('alamat'),
                'no_hp'       =>$i->post('no_hp'),
                'jk'       =>$i->post('jk'),
                'tempat'       =>$i->post('tempat'),
                'tanggal'       =>$i->post('tanggal')
                );
            $this->mguru->edit($data);
            $this->session->set_flashdata('Sukses','Data Guru telah diedit');
            redirect(site_url('guru'));
    }}
    $data = array(  'title'     => 'Tambah Guru',               
                    'guru'    => $guru,
                    'isi'       => 'guru/tambah');
            $this->load->view('homepage/header');
            $this->load->view('guru/edit_guru',$data);
            $this->load->view('homepage/footer');
    }

    public function edit_guru($id_guru)
    {

        $guru = $this->mguru->detail($id_guru);
         $akhir = $this->mguru->akhir();
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('nip','nip','required', array('required' => 'ID Guru harus diisi'));
        $valid->set_rules('nama_guru','nama_guru','required', array('required' => 'Nama Guru harus diisi'));

        if($valid->run())
        {
            if(!empty($_FILES['foto']['name'])){
            $config['upload_path'] ='asset/upload/img/';
            $config['allowed_types'] = 'gif|jpg|png|svg';
            $config['max_size'] = '12000'; //Kb
            $this->load->library('upload',$config);
            if (! $this->upload->do_upload('foto')) {

            $data = array( 'title'      => 'Tambah Guru',
                           'guru'       => $guru,
                           'error'      => $this->upload->display_errors(),
                           'isi'        => 'guru/edit');
            $this->load->view('homepage/head1');
            $this->load->view('guru/edt_guru',$data);
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
        if($guru->foto != ""){
            unlink('/asset/upload/img/'.$guru->foto);
            unlink('/asset/upload/img/thumbs/'.$guru->foto);
        }

            $i = $this->input;
            $data=array( 
                'id_guru'        =>$id_guru,
                'nip' => $i->post('nip'),
                'nama_guru' => $i->post('nama_guru'),
                'jabatan'       =>$i->post('jabatan'),
                'bid_studi'       =>$i->post('bid_studi'),
                'alamat'       =>$i->post('alamat'),
                'no_hp'       =>$i->post('no_hp'),
                'jk'       =>$i->post('jk'),
                'tempat'       =>$i->post('tempat'),
                'tanggal'       =>$i->post('tanggal'),
                'foto'    =>$upload_data['uploads']['file_name']
                );
            $this->mguru->edit($data);
            $this->session->set_flashdata('Sukses','Data Guru telah diedit');
            redirect(site_url('guru/lihat_guru'));
        }
    }else{
        //update tanpa ganti gambar
        $i = $this->input;
            $data=array( 
                'id_guru'        =>$id_guru,
                'nip' => $i->post('nip'),
                'nama_guru' => $i->post('nama_guru'),
                'jabatan'       =>$i->post('jabatan'),
                'bid_studi'       =>$i->post('bid_studi'),
                'alamat'       =>$i->post('alamat'),
                'no_hp'       =>$i->post('no_hp'),
                'jk'       =>$i->post('jk'),
                'tempat'       =>$i->post('tempat'),
                'tanggal'       =>$i->post('tanggal')
                );
            $this->mguru->edit($data);
            $this->session->set_flashdata('Sukses','Data Guru telah diedit');
            redirect(site_url('guru/lihat_guru'));
    }}
    $data = array(  'title'     => 'Tambah Guru',               
                    'guru'    => $guru,
                    'isi'       => 'guru/tambah');
            $this->load->view('homepage/head1');
            $this->load->view('guru/edt_guru',$data);
             $this->load->view('homepage/footer');
    }

    public function delete($id_guru)
    {
        $guru = $this->mguru->detail($id);
        //hapus gambar
        if($guru->foto != ""){
            unlink('/asset/upload/img/'.$guru->foto);
            unlink('/asset/upload/img/thumbs/'.$guru->foto);
        }

        $data = array('id_guru'=>$id_guru);
        $this->mguru->delete($data);
        $this->session->set_flashdata('Sukses','Data Guru telah dihapus');
        redirect(site_url('guru'));
    }

    public function delete_guru($id_guru)
    {
        $guru = $this->mguru->detail($id);
        //hapus gambar
        if($guru->foto != ""){
            unlink('/asset/upload/img/'.$guru->foto);
            unlink('/asset/upload/img/thumbs/'.$guru->foto);
        }

        $data = array('id_guru'=>$id_guru);
        $this->mguru->delete($data);
        $this->session->set_flashdata('Sukses','Data Guru telah dihapus');
        redirect(site_url('guru/lihat_guru'));
    }

    public function edit_gr($id_guru)
    { 
        $this->load->view('homepage/head3');

        $guru = $this->mguru->detail2($id_guru);
         $akhir = $this->mguru->akhir();
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('nip','nip','required', array('required' => 'ID Guru harus diisi'));
        $valid->set_rules('nama_guru','nama_guru','required', array('required' => 'Nama Guru harus diisi'));

        if($valid->run())
        {
            if(!empty($_FILES['foto']['name'])){
            $config['upload_path'] ='asset/upload/img/';
            $config['allowed_types'] = 'gif|jpg|png|svg';
            $config['max_size'] = '12000'; //Kb
            $this->load->library('upload',$config);
            if (! $this->upload->do_upload('foto')) {

            $data = array( 'title'      => 'Tambah Guru',
                           'guru'       => $guru,
                           'error'      => $this->upload->display_errors(),
                           'isi'        => 'guru/edit');
            $this->load->view('guru/edt_guru',$data);
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
        if($guru->foto != ""){
            unlink('/asset/upload/img/'.$guru->foto);
            unlink('/asset/upload/img/thumbs/'.$guru->foto);
        }

            $i = $this->input;
            $data=array( 
                'id_guru'        =>$id_guru,
                'nip' => $i->post('nip'),
                'nama_guru' => $i->post('nama_guru'),
                'jabatan'       =>$i->post('jabatan'),
                'bid_studi'       =>$i->post('bid_studi'),
                'alamat'       =>$i->post('alamat'),
                'no_hp'       =>$i->post('no_hp'),
                'jk'       =>$i->post('jk'),
                'ttl'       =>$i->post('ttl'),
                'foto'    =>$upload_data['uploads']['file_name']
                );
            $this->mguru->edit($data);
            $this->session->set_flashdata('Sukses','Data Guru telah diedit');
            redirect(site_url('guru/lihat_gr/'.$guru->nip));
        }
    }else{
        //update tanpa ganti gambar
        $i = $this->input;
            $data=array( 
                'id_guru'        =>$id_guru,
                'nip' => $i->post('nip'),
                'nama_guru' => $i->post('nama_guru'),
                'jabatan'       =>$i->post('jabatan'),
                'bid_studi'       =>$i->post('bid_studi'),
                'alamat'       =>$i->post('alamat'),
                'no_hp'       =>$i->post('no_hp'),
                'jk'       =>$i->post('jk'),
                'tempat'       =>$i->post('tempat'),
                'tanggal'       =>$i->post('tanggal')
                );
            $this->mguru->edit($data);
            $this->session->set_flashdata('Sukses','Data Guru telah diedit');
            redirect(site_url('guru/lihat_gr/'.$guru->nip));
    }}
    $data = array(  'title'     => 'Tambah Guru',               
                    'guru'    => $guru,
                    'isi'       => 'guru/tambah');
            $this->load->view('guru/edt_guru',$data);
             $this->load->view('homepage/footer');
    }

    public function edit_wk($id_guru)
    {
        $this->load->view('homepage/head1');

        $guru = $this->mguru->detail2($id_guru);
         $akhir = $this->mguru->akhir();
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('nip','nip','required', array('required' => 'ID Guru harus diisi'));
        $valid->set_rules('nama_guru','nama_guru','required', array('required' => 'Nama Guru harus diisi'));

        if($valid->run())
        {
            if(!empty($_FILES['foto']['name'])){
            $config['upload_path'] ='asset/upload/img/';
            $config['allowed_types'] = 'gif|jpg|png|svg';
            $config['max_size'] = '12000'; //Kb
            $this->load->library('upload',$config);
            if (! $this->upload->do_upload('foto')) {

            $data = array( 'title'      => 'Tambah Guru',
                           'guru'       => $guru,
                           'error'      => $this->upload->display_errors(),
                           'isi'        => 'guru/edit');
            $this->load->view('guru/edit_guru1',$data);
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
        if($guru->foto != ""){
            unlink('/asset/upload/img/'.$guru->foto);
            unlink('/asset/upload/img/thumbs/'.$guru->foto);
        }

            $i = $this->input;
            $data=array( 
                'id_guru'        =>$id_guru,
                'nip' => $i->post('nip'),
                'nama_guru' => $i->post('nama_guru'),
                'jabatan'       =>$i->post('jabatan'),
                'bid_studi'       =>$i->post('bid_studi'),
                'alamat'       =>$i->post('alamat'),
                'no_hp'       =>$i->post('no_hp'),
                'jk'       =>$i->post('jk'),
                'ttl'       =>$i->post('ttl'),
                'foto'    =>$upload_data['uploads']['file_name']
                );
            $this->mguru->edit($data);
            $this->session->set_flashdata('Sukses','Data Guru telah diedit');
            redirect(site_url('homepage/lihat_wk/'.$guru->nip));
        }
    }else{
        //update tanpa ganti gambar
        $i = $this->input;
            $data=array( 
                'id_guru'        =>$id_guru,
                'nip' => $i->post('nip'),
                'nama_guru' => $i->post('nama_guru'),
                'jabatan'       =>$i->post('jabatan'),
                'bid_studi'       =>$i->post('bid_studi'),
                'alamat'       =>$i->post('alamat'),
                'no_hp'       =>$i->post('no_hp'),
                'jk'       =>$i->post('jk'),
                'tempat'       =>$i->post('tempat'),
                'tanggal'       =>$i->post('tanggal')
                );
            $this->mguru->edit($data);
            $this->session->set_flashdata('Sukses','Data Guru telah diedit');
            redirect(site_url('homepage/lihat_wk/'.$guru->nip));
    }}
    $data = array(  'title'     => 'Tambah Guru',               
                    'guru'    => $guru,
                    'isi'       => 'guru/tambah');
            $this->load->view('guru/edit_guru1',$data);
             $this->load->view('homepage/footer');
    }

    public function guru()
       {
        $this->load->model('mabsen');

        $hari = $this->input->post('id_hari');
        $gethari = $this->mabsen->gethari();
        $records = $this->mabsen->getguru($hari);
        
        $this->load->view('homepage/head1');
        $this->load->view('absen/tampil_wakil',['gethari'=>$gethari, 'records'=>$records]);
        $this->load->view('homepage/footer');
       }

    public function guru2()
       {
        $this->load->model('mabsen');

        $hari = $this->input->post('id_hari');
        $gethari = $this->mabsen->gethari();
        $records = $this->mabsen->getguru($hari);
        
        $this->load->view('homepage/head2');
        $this->load->view('absen/tampil_piket',['gethari'=>$gethari, 'records'=>$records]);
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
                $this->load->view('homepage/head1');
                $this->load->view('absen/berhasil2');
                $this->load->view('homepage/footer');
                //redirect('absen/guru');
            }else{
                echo "Absen gagal disimpan";
            }
        }
       }

       public function simpan_guru2(){
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
                $this->load->view('homepage/head2');
                $this->load->view('absen/berhasil1');
                $this->load->view('homepage/footer');
                //redirect('absen/guru');
            }else{
                echo "Absen gagal disimpan";
            }
        }
       }

}
