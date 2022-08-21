<?php
class Homepage extends CI_Controller{
	public function __construct()
        {
                parent::__construct();
                $this->load->model('muser');
                $this->load->model('mjadwal');
                $this->load->model('mabsen');
                $this->load->helper(array('url','html'));
                $this->load->library('session');
                $this->load->library('form_validation');
                $this->load->database();
        }

        public function index()
        {
            $tanggal = date('d-m-Y');
            $day = date('D', strtotime($tanggal));
            $dayList = array(
                'Sun' => 'Minggu',
                'Mon' => 'Senin',
                'Tue' => 'Selasa',
                'Wed' => 'Rabu',
                'Thu' => 'Kamis',
                'Fri' => 'Jumat',
                'Sat' => 'Sabtu'
            );
            $hari = $dayList[$day];
            $jadwal = $this->mjadwal->jadwalh($hari);
            $data = array('jadwal' => $jadwal,
                        'tanggal' => $tanggal,
                      'isi' => 'jadwal/jadwal');
            $this->load->view('homepage/header');
        	$this->load->view('admin/jadwal',$data);
        	$this->load->view('homepage/footer');
        }

        public function edit($id_user)
        {
                $this->load->view('homepage/header');

                $user = $this->muser->detail($id_user);
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('username','Username','required', array('required' => 'Username harus diisi'));
        $valid->set_rules('password','Password','required', array('required' => 'Password harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Edit User',
                           'user' => $user,
                           'isi'   => 'user/edit');
            $this->load->view('user/profil',$data);
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
            redirect(site_url('homepage'));
        }
        }

        public function edit_wakil($id_user)
        {
                $this->load->view('homepage/head1');

                $user = $this->muser->detail($id_user);
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('username','Username','required', array('required' => 'Username harus diisi'));
        $valid->set_rules('password','Password','required', array('required' => 'Password harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Edit User',
                           'user' => $user,
                           'isi'   => 'user/edit');
            $this->load->view('user/profil',$data);
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
            redirect(site_url('homepage'));
        }
        }

        public function edit_piket($id_user)
        {
                $this->load->view('homepage/head2');

                $user = $this->muser->detail($id_user);
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('username','Username','required', array('required' => 'Username harus diisi'));
        $valid->set_rules('password','Password','required', array('required' => 'Password harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Edit User',
                           'user' => $user,
                           'isi'   => 'user/edit');
            $this->load->view('user/profil',$data);
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
            redirect(site_url('homepage'));
        }
        }

        public function edit_guru($id_user)
        {
                $this->load->view('homepage/head3');

                $user = $this->muser->detail($id_user);
        //validasi
        $valid = $this->form_validation;
        $valid->set_rules('username','Username','required', array('required' => 'Username harus diisi'));
        $valid->set_rules('password','Password','required', array('required' => 'Password harus diisi'));

        if($valid->run()===False)
        {
            $data = array( 'title' => 'Edit User',
                           'user' => $user,
                           'isi'   => 'user/edit');
            $this->load->view('user/profil',$data);
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
            redirect(site_url('homepage'));
        }
        }


        function wakil()
        {$tanggal = date('d-m-Y');
            $day = date('D', strtotime($tanggal));
            $dayList = array(
                'Sun' => 'Minggu',
                'Mon' => 'Senin',
                'Tue' => 'Selasa',
                'Wed' => 'Rabu',
                'Thu' => 'Kamis',
                'Fri' => 'Jumat',
                'Sat' => 'Sabtu'
            );
            $hari = $dayList[$day];
            $jadwal = $this->mjadwal->jadwalh($hari);
            $data = array('jadwal' => $jadwal,
                        'tanggal' => $tanggal,
                      'isi' => 'jadwal/jadwal');
                $this->load->view('homepage/head1');
                $this->load->view('admin/jadwal',$data);
                $this->load->view('homepage/footer');
        }

        function piket()
        {
            $tanggal = date('d-m-Y');
            $day = date('D', strtotime($tanggal));
            $dayList = array(
                'Sun' => 'Minggu',
                'Mon' => 'Senin',
                'Tue' => 'Selasa',
                'Wed' => 'Rabu',
                'Thu' => 'Kamis',
                'Fri' => 'Jumat',
                'Sat' => 'Sabtu'
            );
            $hari = $dayList[$day];
            $jadwal = $this->mjadwal->jadwalh($hari);
            $data = array('jadwal' => $jadwal,
                        'tanggal' => $tanggal,
                      'isi' => 'jadwal/jadwal');
                $this->load->view('homepage/head2');
                $this->load->view('admin/jadwal',$data);
                $this->load->view('homepage/footer');
        }

        function guru()
        {
            $tanggal = date('d-m-Y');
            $day = date('D', strtotime($tanggal));
            $dayList = array(
                'Sun' => 'Minggu',
                'Mon' => 'Senin',
                'Tue' => 'Selasa',
                'Wed' => 'Rabu',
                'Thu' => 'Kamis',
                'Fri' => 'Jumat',
                'Sat' => 'Sabtu'
            );
            $hari = $dayList[$day];
            $jadwal = $this->mjadwal->jadwalh($hari);
            $data = array('jadwal' => $jadwal,
                        'tanggal' => $tanggal,
                      'isi' => 'jadwal/jadwal');
                $this->load->view('homepage/head3');
                $this->load->view('admin/jadwal',$data);
                $this->load->view('homepage/footer');
        }        
}