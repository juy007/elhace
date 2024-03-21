<?php 
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
       	$this->load->library('upload');
        $this->load->library('encryption');
        $this->load->helper('security');
		$this->load->library('session');
        $this->load->model('M_home');
        $this->load->model('M_user');
        $this->load->model('Website');
        
        //pengaturan bahasa
        $cek_lang = $this->session->userdata('lang');
        if (empty($cek_lang)) { $this->session->set_userdata('lang', 'indonesia');}
        else{ $this->session->set_userdata('lang', $cek_lang); }
        //_________________

        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

      //  $this->session->sess_destroy();
    }
  function coba(){
        echo $this->input->post('a');
         echo $this->input->post('b');
          echo $this->input->post('c');
    }
     //======================================HALAMAN AWAL=================================================
    function index()// halaman awal front end
    {
        //===================harus di pakai semua fungction controller======================
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        $this->load->view('frontend/header',$data);
        $this->load->view('frontend/index');
        $this->load->view('frontend/footer');
    }
    //=====================================================================================================
    //============================================GANTI BAHASA=============================================
    function ok(){
        $this->load->view('frontend/ok');
    }
    function lang($get_lang)//mengganti bahasa
    {
        $this->session->set_userdata('lang', $get_lang);
        redirect(base_url());
    }
    //=======================================================================================================
    //============================================Menu=======================================================
     function tentang()// halaman awal front end
    {
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
       // $this->load->view('frontend/top');
        $this->load->view('frontend/header',$data);
        $this->load->view('frontend/tentang');
        $this->load->view('frontend/footer');
    }
    //=====================================================================================================
  
    function tentang_plts_atap()// halaman awal front end
    {
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
       // $this->load->view('frontend/top');
        $this->load->view('frontend/header',$data);
        $this->load->view('frontend/faq_plts_atap');
        $this->load->view('frontend/footer');
    }
    //=====================================================================================================
     function tentang_solarhub()// halaman awal front end
    {
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
       // $this->load->view('frontend/top');
        $this->load->view('frontend/header',$data);
        $this->load->view('frontend/faq_solarhub');
        $this->load->view('frontend/footer');
    }
    //=====================================================================================================
     function tentang_kalkulator_surya()// halaman awal front end
    {
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
       // $this->load->view('frontend/top');
        $this->load->view('frontend/header',$data);
        $this->load->view('frontend/faq_kalkulator_surya');
        $this->load->view('frontend/footer');
    }
    //=====================================================================================================
    //==========================================REGISTRASI++++++++=========================================
    function registrasi()// halaman register akun
    {
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        $this->load->view('frontend/header',$data);
        $this->load->view('frontend/registrasi');
        $this->load->view('frontend/footer');
    }
    function ajax_validate_email()//cek email saat register akun
    {
        $data = array(
            'email'=>$this->input->post('emailRegister'));
         $query = $this->db->get_where('user', $data);
          if ($query->num_rows() > 0) {
             //$row = $query->row();
              echo 1;
          }else{
                echo 0;
          }
    }

    function simpan_register()//penyimpan register akun
    {
         date_default_timezone_set('Asia/Jakarta');
        $this->load->library('mailer');
        $kode_verifikasi = rand(1000, 9999);
        $email_penerima = $this->input->post('emailRegister',TRUE);
        $subjek = 'kode_verifikasi';
        $pesan = $kode_verifikasi;
            //$attachment = $_FILES['attachment'];
         $content = $this->load->view('frontend/template_email/verifikasi_email', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
        $sendmail = array(
            'email_penerima'=>$email_penerima,
            'subjek'=>$subjek,
            'content'=>$content
              //'attachment'=>$attachment
        );
        $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
        
        $this->session->set_userdata('simpan_kode_verifikasi' , $kode_verifikasi);
        $this->session->set_userdata('simpan_email' , $this->input->post('emailRegister',TRUE));

        $nama_depan = $this->input->post('nama_depan',TRUE);
        $nama_belakang = $this->input->post('nama_belakang',TRUE);
        $emailRegister = $this->input->post('emailRegister',TRUE);
        $telepon = $this->input->post('telepon',TRUE);
        $alamat = $this->input->post('alamat',TRUE);
        $kecamatan = $this->input->post('kecamatan',TRUE);
        $kota = $this->input->post('kota',TRUE);
        $provinsi = $this->input->post('provinsi',TRUE);
        $pos = $this->input->post('pos',TRUE);
        $password = sha1($this->input->post('password',TRUE));

        $folder = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789'), 0, 7);
       
        $new_folder = 'user_'.$folder.'_'.date("d").''.date("m").''.date("y").''.date("H").''.date("i").''.date("s");
        mkdir("upload_file/".$new_folder);
        mkdir("upload_file/".$new_folder."/img");
        mkdir("upload_file/".$new_folder."/img/foto_profil");
        mkdir("upload_file/".$new_folder."/img/perusahaan");
        mkdir("upload_file/".$new_folder."/img/perusahaan/produk");
        mkdir("upload_file/".$new_folder."/img/perusahaan/pemasang");
        mkdir("upload_file/".$new_folder."/img/perusahaan/portofolio");
        mkdir("upload_file/".$new_folder."/img/perusahaan/banner");

        if(isset($_FILES["gambarProfil"]["name"])){
                $config['upload_path'] = './upload_file/'.$new_folder.'/img/foto_profil/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = 'profil_'.time().'.png';
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('gambarProfil')){
                    $this->upload->display_errors();
                    return FALSE;
                }else{
                    $data = $this->upload->data();
                //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./upload_file/'.$new_folder.'/img/foto_profil/'.$data['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= TRUE;
                    $config['quality']= '100%';
                    $config['width']= 720;
                    $config['height']= 300;
                    $config['new_image']= './upload_file/'.$new_folder.'/img/foto_profil/'.$data['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    echo base_url().'./upload_file/'.$new_folder.'/img/foto_profil/'.$data['file_name'];
                }
            }

        $gambar = $data['file_name'];
        
        if ($this->M_home->simpan_register($nama_depan, $nama_belakang, $emailRegister, $telepon, $alamat, $kecamatan, $kota, $provinsi, $pos, $password, $folder, $gambar) == TRUE) {

           
            redirect(base_url() . "home/simpan_kode_verifikasi");
        }else{
            $this->session->set_flashdata('notif' , false);
            $this->session->set_flashdata('teks_notif' , "Registrasi Gagal");
            redirect(base_url() . "home/registrasi");
        }
    }

    function simpan_kode_verifikasi()//menyimpan kode verifikasi ke databse setelah selesai register
    {
        $simpan_kode_verifikasi = $this->session->userdata('simpan_kode_verifikasi');
        $simpan_email = $this->session->userdata('simpan_email');

        $query = $this->db->get_where('user', array('email'=>$simpan_email));
        $id_userReg = $query->row();

        //$this->db->delete('user_verifikasi', array('id_user'=> $id_userReg->id_user,'status_verifikasi'=> 'true'));
        $this->session->set_userdata('id_userReg' , $id_userReg->id_user);

        date_default_timezone_set('Asia/Jakarta');

        $this->db->insert('user_verifikasi', array('id_user'=>$id_userReg->id_user, 'kode_verifikasi'=>$simpan_kode_verifikasi, 'tanggal'=> date('d/m/Y'), 'jam'=> date('H:i'), 'status_verifikasi'=>'false'));

        redirect(base_url() . "home/verifikasi");
            
    }
    function verifikasi()//halaman verifikasi OTP
    {
        $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        $query = $this->db->get_where('user_verifikasi', array('id_user'=> $this->session->userdata('id_userReg'),'status_verifikasi'=> 'true'));
        if ($query->num_rows() > 0) {
            redirect(base_url() . "home/registrasi/");
        }else{
           $this->load->view('frontend/header',$data);
           $this->load->view('frontend/verifikasi');
           $this->load->view('frontend/footer');
        }
    }
    function input_verifikasi()// form verifikaksi kode dari email
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl_sekarang = date("d/m/Y");
        $jam_sekarang = date("H:i");
        $id_userReg = $this->session->userdata('id_userReg');

       $this->db->delete('user_verifikasi', array('id_user'=> $id_userReg,'status_verifikasi'=> 'true'));

        $kode_verifikasi = $this->input->post('kode_verifikasi',TRUE);

        $query = $this->db->get_where('user_verifikasi', array('id_user'=> $id_userReg,'kode_verifikasi'=> $kode_verifikasi));

        if ($query->num_rows() > 0) {//1. validasi kode verifikasi
            //[start=============================cek=============================================
            $waktu = $query->row();

            $date = new DateTime($waktu->jam);
            $date_plus = $date->modify("+30 minutes");
            $expired = $date_plus->format("H:i");

            // $this->session->set_flashdata('notif' , "TRUE");
            //$this->session->set_flashdata('teks_notif' , "Kode verifikasi BENAR");
            //redirect(base_url() . "home/verifikasi/");
            //$split_waktu = explode(':', $waktu->jam);// waktu kode verifikasi dari database
            //$split_waktu[1];
            //===============================================================================end]

            if ($waktu->tanggal == $tgl_sekarang && $jam_sekarang <= $expired) {// 2. cek tgl kode verifikasi
                if ($this->M_home->update_verifikasi($id_userReg, $kode_verifikasi) == TRUE) { // 3. update status kode verifikasi
                    $this->session->set_flashdata('notif' , "TRUE");
                    $this->session->set_flashdata('teks_notif' , "Registrasi berhasil, silahkan Log In");
                    redirect(base_url() . "home/registrasi/");
                }else{
                    $this->session->set_flashdata('notif' , "FALSE");
                    $this->session->set_flashdata('teks_notif' , "Registrasi Gagal");
                    redirect(base_url() . "home/verifikasi/");
                }
            }else{
                $this->session->set_flashdata('notif' , "REKODE");
                $this->session->set_flashdata('teks_notif' , "Kode verifikasi tidak berlaku");
                redirect(base_url() . "home/verifikasi/");
            }
        }else{
           $this->session->set_flashdata('notif' , "FALSE");
            $this->session->set_flashdata('teks_notif' , "Kode verifikasi salah");
            redirect(base_url() . "home/verifikasi/");
        }
    }
    function resimpan_kode_verifikasi()//menyimpan kode verifikasi ke databse setelah selesai register
    {
        $this->load->library('mailer');
        $kode_verifikasi = rand(1000, 9999);
        $email_penerima = $this->input->post('emailRegister',TRUE);
        $subjek = 'kode_verifikasi';
        $pesan = $kode_verifikasi;
            //$attachment = $_FILES['attachment'];
         $content = $this->load->view('frontend/template_email/verifikasi_email', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
        $sendmail = array(
            'email_penerima'=>$email_penerima,
            'subjek'=>$subjek,
            'content'=>$content
              //'attachment'=>$attachment
        );
        $send = $this->mailer->send($sendmail); 

        $id_userReg = $this->session->userdata('id_userReg');

        date_default_timezone_set('Asia/Jakarta');

        $this->db->insert('user_verifikasi', array('id_user'=>$id_userReg, 'kode_verifikasi'=>$simpan_kode_verifikasi, 'tanggal'=> date('d/m/Y'), 'jam'=> date('H:i'), 'status_verifikasi'=>'false'));

        redirect(base_url() . "home/verifikasi");
            
    }
    //=======================================================================================================
    //==========================================LOGIN========================================================
    function validate_akun()//cek email dan password ketika login
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = array('email' => $email, 'password' => sha1($password));
        $query = $this->db->get_where('user', $data);
        if ($query->num_rows() > 0) {
             //$row = $query->row();
              echo 1;
          }else{
                echo 0;
          }
    }
    function validate_login()//proses login dan mengecek apakah akun sudah terverifikasi 
    {
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));
        $this->session->set_userdata('emailReg' , $email);
    
        $query = $this->db->get_where('user', array('email' => $email, 'password' => $password));
        $row = $query->row();
        
         $this->session->set_userdata('id_userReg', $row->id_user);
        $query2 = $this->db->get_where('user_verifikasi', array('id_user'=> $row->id_user, 'status_verifikasi'=> 'true'));
        $query_id = $query2->row();

        if ($query2->num_rows() > 0) {
            $this->session->set_userdata('user_login', 'TRUE');
            $this->session->set_userdata('id_user', $row->id_user);
            $this->session->set_userdata('nama_depan', $row->nama_depan);
            $this->session->set_userdata('nama_belakang', $row->nama_belakang);
            $this->session->set_userdata('pass', $row->password);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('telepon', $row->telepon);
            $this->session->set_userdata('alamat', $row->alamat);
            $this->session->set_userdata('kecamatan', $row->kecamatan);
            $this->session->set_userdata('kota', $row->kota);
            $this->session->set_userdata('provinsi', $row->provinsi);
            $this->session->set_userdata('pos', $row->pos);
            $this->session->set_userdata('biografi', $row->biografi);
            $this->session->set_userdata('status', $row->status);
            $this->session->set_userdata('tgl_registrasi', $row->tgl_registrasi);
            $this->session->set_userdata('folder', $row->folder);
            $this->session->set_userdata('foto_profil', $row->foto_profil);

            $get_id_perusahaan = $this->db->get_where('perusahaan', array('id_user'=>$row->id_user));
            $value_get_id = $get_id_perusahaan->row();

            $this->session->set_userdata('id_perusahaan', $value_get_id->id_perusahaan);
            $this->session->set_userdata('nama_perusahaan', $value_get_id->nama_perusahaan);
            $this->session->set_userdata('provinsi_perusahaan', $value_get_id->provinsi_perusahaan);


            redirect(base_url(). 'user');

        }else{
            $this->db->delete('user_verifikasi', array('id_user'=> $row->id_user));
            $this->session->set_userdata('id_userReg', $row->id_user);

            $this->load->library('mailer');
            $kode_verifikasi = rand(1000, 9999);
            $email_penerima = $row->email;
            $subjek = 'Kode Verifikasi';
            $pesan = $kode_verifikasi;
                //$attachment = $_FILES['attachment'];
            $content = $this->load->view('frontend/template_email/verifikasi_email', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
            $sendmail = array(
                'email_penerima'=>$email_penerima,
                'subjek'=>$subjek,
                'content'=>$content
                  //'attachment'=>$attachment
            );
            $send = $this->mailer->send($sendmail);

            date_default_timezone_set('Asia/Jakarta');
            $this->db->insert('user_verifikasi', array('id_user'=> $row->id_user, 'kode_verifikasi'=>$kode_verifikasi, 'tanggal'=> date('d/m/Y'), 'jam'=> date('H:i'), 'status_verifikasi'=>'false'));// input kode verifikasi baru

            redirect(base_url(). 'home/verifikasi');
        }
    }
    function google_login(){
        include_once APPPATH . "libraries/google-api-client/Google_Client.php";
        include_once APPPATH . "libraries/google-api-client/contrib/Google_Oauth2Service.php";
        include_once APPPATH . "config/google.php";
   
        if(isset($_GET['code'])){
            $gclient->authenticate($_GET['code']);
              $this->session->set_userdata('token', $gclient->getAccessToken());
            header('Location: ' . filter_var($redirect_url, FILTER_SANITIZE_URL));
        }

        if (!empty($this->session->userdata('token'))){
            $gclient->setAccessToken($this->session->userdata('token'));
        }

        if ($gclient->getAccessToken()) {

            // Get user profile data from google
            $gpuserprofile = $google_oauthv2->userinfo->get();

            $nama = $gpuserprofile['given_name']." ".$gpuserprofile['family_name']; // Ambil nama dari Akun Google
            $email = $gpuserprofile['email']; // Ambil email Akun Google nya

            // Buat query untuk mengecek apakah data user dengan email tersebut sudah ada atau belum
            // Jika ada, ambil id, username, dan nama dari user tersebut

            $query = $this->db->get_where('user', array('email' => $email));
            $user = $query->row();

            if($query->num_rows() < 1){ // Jika User dengan email tersebut belum ada
                // Ambil username dari kata sebelum simbol @ pada email
                $folder = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789'), 0, 20);
                date_default_timezone_set('Asia/Jakarta');
                $new_folder = 'user'.$folder.''.date("H").''.date("i").''.date("s");
                mkdir("upload_file/".$new_folder);
                mkdir("upload_file/".$new_folder."/img");
                mkdir("upload_file/".$new_folder."/img/foto_profil");
                mkdir("upload_file/".$new_folder."/img/perusahaan");
                mkdir("upload_file/".$new_folder."/img/perusahaan/produk");
                mkdir("upload_file/".$new_folder."/img/perusahaan/pemasang");
                mkdir("upload_file/".$new_folder."/img/perusahaan/portofolio");
                mkdir("upload_file/".$new_folder."/img/perusahaan/banner");

                $ex = explode('@', $email); // Pisahkan berdasarkan "@"
                $username = $ex[0]; // Ambil kata pertama

                 $data = array(
                    'nama_depan' => $nama,
                    'nama_belakang' => '',
                    'email' => $email,
                 
                    'status' => 'true',
                    'tgl_registrasi' => date('d/m/Y'),
                    'folder' => $folder,
                    'foto_profil' => 'profil_'.time().'.png',
                    'input_user' => date('Y-m-d')
                );
                $this->db->insert('user',$data);


                $query = $this->db->get_where('user', array('email' => $email));
                $user = $query->row();

                $this->db->insert('user_verifikasi', array('id_user'=>$user->id_user, 'kode_verifikasi'=> '0000', 'tanggal'=> date('d/m/Y'), 'jam'=> date('H:i'), 'status_verifikasi'=>'true'));



                $this->load->library('mailer');
                $kode_verifikasi = rand(1000, 9999);
                $email_penerima = $email;
                $subjek = 'Terdaftar Sebagai Akun Solarhub.id';
                $pesan = "Email anda telah terdaftar sebagai akun di solarhub.id";
                    //$attachment = $_FILES['attachment'];
                 $content = $this->load->view('frontend/template_email/verifikasi_email', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
                $sendmail = array(
                    'email_penerima'=>$email_penerima,
                    'subjek'=>$subjek,
                    'content'=>$content
                      //'attachment'=>$attachment
                );
                $send = $this->mailer->send($sendmail); 

            }else{
                $id = $user['id']; // Ambil id pada tabel user
                $username = $user['username']; // Ambil username pada tabel user
                $nama = $user['nama']; // Ambil username pada tabel user
                /*
           $_SESSION['user_first_name'] = $data['given_name'];$_SESSION['user_last_name'] = $data['family_name'];        $_SESSION['user_email_address'] = $data['email'];$_SESSION['user_gender'] = $data['gender'];$_SESSION['user_image'] = $data['picture'];
                */

                $this->session->set_userdata('user_login', 'TRUE');
                $this->session->set_userdata('id_user', $user->id_user);
                $this->session->set_userdata('nama_depan', $user->nama_depan);
                $this->session->set_userdata('nama_belakang', $user->nama_belakang);
                $this->session->set_userdata('pass', $user->password);
                $this->session->set_userdata('email', $user->email);
                $this->session->set_userdata('telepon', $user->telepon);
                $this->session->set_userdata('alamat', $user->alamat);
                $this->session->set_userdata('kecamatan', $user->kecamatan);
                $this->session->set_userdata('kota', $user->kota);
                $this->session->set_userdata('provinsi', $user->provinsi);
                $this->session->set_userdata('pos', $user->pos);
                $this->session->set_userdata('biografi', $user->biografi);
                $this->session->set_userdata('status', $user->status);
                $this->session->set_userdata('tgl_registrasi', $user->tgl_registrasi);
                $this->session->set_userdata('folder', $user->folder);
                $this->session->set_userdata('foto_profil', $user->foto_profil);
                $this->session->set_userdata('foto_profil_gmail', $gpuserprofile['picture']);
            }

            //header("location: welcome.php");
                redirect(base_url().'user');
        } else {
            $authUrl = $gclient->createAuthUrl();
            header("location: ".$authUrl);
        }
    }
  
    //=======================================================================================================
    function reset_step1(){
          $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
        $data['medsos'] = $this->Website->medsosweb();
         $this->load->view('frontend/reset_pass_email',$data);
    }
    function reset_cek_email()//cek email dan password ketika login
    {
        $email = $this->input->post('email');

        $data = array('email' => $email);
        $query = $this->db->get_where('user', $data);
        if ($query->num_rows() > 0) {
              echo 1;
          }else{
                echo 0;
          }
    }
    function reset_step2()
    {
        if (isset($_POST['email'])) {
           $this->load->library('mailer');
            $kode_verifikasi = rand(1000, 9999);
            $email_penerima = $this->input->post('email',TRUE);
            $subjek = 'Kode Verifikasi Reset Password';
            $pesan = $kode_verifikasi;
                //$attachment = $_FILES['attachment'];
             $content = $this->load->view('frontend/template_email/verifikasi_email', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
            $sendmail = array(
                'email_penerima'=>$email_penerima,
                'subjek'=>$subjek,
                'content'=>$content
                  //'attachment'=>$attachment
            );
            $send = $this->mailer->send($sendmail); 

            $get_user = $this->db->get_where('user',  array('email' => $email_penerima ));
            $id_user = $get_user->row();
            $data['id_user'] = $get_user->row()->id_user;

            $this->db->where('id_user',$id_user->id_user);
            $this->db->update('user_verifikasi' , array('kode_verifikasi' => $kode_verifikasi ));

            $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
            $data['medsos'] = $this->Website->medsosweb();
             $this->load->view('frontend/reset_pass_verifikasi',$data);
        }else{
            redirect(base_url().'home/reset_step1');
        }
    }
     function reset_cek_kode_verifikasi()//cek email dan password ketika login
    {
        $kode_verifikasi = $this->input->post('kode_verifikasi');
        $id_user = $this->input->post('id_user');

        $data = array('id_user' => $id_user,'kode_verifikasi' => $kode_verifikasi);
        $query = $this->db->get_where('user_verifikasi', $data);
        if ($query->num_rows() > 0) {
              echo 1;
          }else{
                echo 0;
          }
    }
    function reset_step3()
    {
        if (isset($_POST['kode_verifikasi'])) {
            $data['id_user'] = $this->input->post('id_user');
            $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
            $data['medsos'] = $this->Website->medsosweb();
            $this->load->view('frontend/reset_password',$data);
        }else{
            redirect(base_url().'home/reset_step1');
        }
    }
    function reset_finish()
    {
        if (isset($_POST['id_user'])) {
            $id_user = $this->input->post('id_user');
            $password = sha1($this->input->post('password2'));
        
            $this->db->where('id_user',$id_user);
            $this->db->update('user' , array('password' => $password));
            $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
            $data['medsos'] = $this->Website->medsosweb();
            $this->load->view('frontend/reset_password_finish',$data);
        }else{
            $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
            $data['medsos'] = $this->Website->medsosweb();
             $this->load->view('frontend/reset_password_finish',$data);
        }
      
        
        
    }
    //==========================================REGISTRASI & LOGIN===========================================
    //======================================HALAMAN tentang=================================================
    function artikel()// halaman awal front end
    {
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $this->load->view('frontend/header',$data);
        $this->load->view('frontend/artikel');
        $this->load->view('frontend/footer');
    }
       function detail_artikel()// halaman awal front end
    {
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $this->load->view('frontend/header',$data);
        $this->load->view('frontend/artikel_detail');
        $this->load->view('frontend/footer');
    }

    function publikasi()// halaman awal front end
    {
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $this->load->view('frontend/header',$data);
        $this->load->view('frontend/publikasi');
        $this->load->view('frontend/footer');
    }
    //=====================================================================================================
    function produk()
    {
        //===================harus di pakai semua fungction controller======================
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        //if (isset($_POST['cari'])) {
            $data['cari'] = $this->input->post('cari');
       /* }else{
            $data['cari'] = '';
        }*/

        $data['kota'] = $this->M_user->tampil_kota();
        $data['provinsi'] = $this->M_user->tampil_provinsi();
        $data['produk'] = $this->M_user->tampil_produk();

        $this->load->view('frontend/header_1',$data);
        $this->load->view('frontend/produk');
        $this->load->view('frontend/footer');
    }
    function produk_search()// halaman awal front end
    {
        $nama_produk = $this->input->post('nama_produk');
        $lokasi_kota = $this->input->post('lokasi_kota');
        $lokasi_provinsi = $this->input->post('lokasi_provinsi');
       /* $sistem_on_grid = $this->input->post('sistem_on_grid');                           
        $sistem_off_grid = $this->input->post('sistem_off_grid');
        $sistem_hybrid = $this->input->post('sistem_hybrid');                             
        $pju = $this->input->post('pju');
        $panel = $this->input->post('panel');
        $inverter = $this->input->post('inverter');
        $kabel = $this->input->post('kabel');*/
        $harga_minimal = $this->input->post('harga_minimal');
        $harga_maximal = $this->input->post('harga_maximal');
        $pembayaran_cash = $this->input->post('pembayaran_cash');
        $pembayaran_kredit = $this->input->post('pembayaran_kredit');
        $garansi = $this->input->post('garansi');
        $ukuran_sistem = $this->input->post('ukuran_sistem');
        $rating = $this->input->post('rating');
        $sortir = $this->input->post('sortir');
        
         $kategori = $this->input->post('kategori');                           

        $produk = $this->M_user->search_produk($nama_produk, $kategori, $lokasi_kota, $lokasi_provinsi, $harga_minimal, $harga_maximal, $pembayaran_cash, $pembayaran_kredit, $garansi, $ukuran_sistem, $rating, $sortir);

        if (!empty($produk)) {

           
           // Kita load file view.php sambil mengirim data siswa hasil query function search di SiswaModel
            $hasil = $this->load->view('frontend/produk_view1', array('produk'=>$produk,'kategori'=>$kategori,'lokasi_kota' => $lokasi_kota,'lokasi_provinsi' => $lokasi_provinsi,'harga_minimal' =>$harga_minimal,'harga_maximal' =>$harga_maximal,'pembayaran_cash' => $pembayaran_cash,'pembayaran_kredit' => $pembayaran_kredit,'garansi' =>$garansi,'ukuran_sistem' => $ukuran_sistem,'rating'=> $rating), true);
        }else{
            $hasil = "<h4 style='text-align: center;margin:auto;margin-top:100px;'>Tidak ditemukan</h4>";
        }
        
        
        // Buat sebuah array
        $callback = array(
          'hasil' => $hasil, // Set array hasil dengan isi dari view.php yang diload tadi
        );
        echo json_encode($callback); // konversi varibael $callback menjadi JSON

    }
    function produk_detail($id_produk)// halaman awal front end
    {
        //===================harus di pakai semua fungction controller======================
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $get_produk = $this->db->get_where('perusahaan_produk', array('id_produk'=>$id_produk, 'status_publis'=>'true', 'status_hapus'=>'false'));
        $data['produk']=  $get_produk->row();

        $this->load->view('frontend/header_1',$data);
        $this->load->view('frontend/produk_detail');
        $this->load->view('frontend/footer');
    }
    function perusahaan()// halaman awal front end
    {
        //===================harus di pakai semua fungction controller======================
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data['perusahaan'] = $this->M_user->tampil_perusahaan();
        $this->load->view('frontend/header_1',$data);
        $this->load->view('frontend/perusahaan');
        $this->load->view('frontend/footer');
    }
     //============================================GANTI BAHASA=============================================
    function perusahaan_detail($id_perusahaan)// halaman awal front end
    {
        //===================harus di pakai semua fungction controller======================
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data['banner'] = $this->M_user->tampil_banner($id_perusahaan);
        $data['perusahaan'] = $this->M_user->detail_perusahaan($id_perusahaan);
        $data['produk_terbaru'] = $this->M_user->detail_perusahaan_produk_terbaru($id_perusahaan);
        $this->load->view('frontend/header_1',$data);
        $this->load->view('frontend/perusahaan_detail');
        $this->load->view('frontend/perusahaan_beranda');
        $this->load->view('frontend/footer');
    }
        //============================================GANTI BAHASA=============================================
    function perusahaan_produk($id_perusahaan)// halaman awal front end
    {
        //===================harus di pakai semua fungction controller======================
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data['perusahaan'] = $this->M_user->detail_perusahaan($id_perusahaan);
        $data['produk'] = $this->M_user->detail_perusahaan_produk($id_perusahaan);
        $this->load->view('frontend/header_1',$data);
        $this->load->view('frontend/perusahaan_detail');
        $this->load->view('frontend/perusahaan_produk');
        $this->load->view('frontend/footer');
    }
     function perusahaan_pemasang($id_perusahaan)// halaman awal front end
    {
        //===================harus di pakai semua fungction controller======================
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data['perusahaan'] = $this->M_user->detail_perusahaan($id_perusahaan);
        $data['produk'] = $this->M_user->detail_perusahaan_produk($id_perusahaan);
        $this->load->view('frontend/header_1',$data);
        $this->load->view('frontend/perusahaan_detail');
        $this->load->view('frontend/perusahaan_pemasang');
        $this->load->view('frontend/footer');
    }
         //============================================GANTI BAHASA=============================================
    function perusahaan_ulasan($id_perusahaan)// halaman awal front end
    {
        //===================harus di pakai semua fungction controller======================
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data['perusahaan'] = $this->M_user->detail_perusahaan($id_perusahaan);
        $data['produk'] = $this->M_user->detail_perusahaan_produk($id_perusahaan);
        $this->load->view('frontend/header_1',$data);
        $this->load->view('frontend/perusahaan_detail');
        $this->load->view('frontend/perusahaan_ulasan');
        $this->load->view('frontend/footer');
    }
     //============================================GANTI BAHASA=============================================
    function pemasang()// halaman awal front end
    {
        //===================harus di pakai semua fungction controller======================
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data['pemasang'] = $this->M_user->tampil_pemasang();
        $this->load->view('frontend/header_1',$data);
        $this->load->view('frontend/pemasang');
        $this->load->view('frontend/footer');
    }
     //============================================GANTI BAHASA=============================================
    function pemasang_detail()// halaman awal front end
    {
        //===================harus di pakai semua fungction controller======================
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $this->load->view('frontend/header_1',$data);
        $this->load->view('frontend/pemasang_detail');
        $this->load->view('frontend/footer');
    }





     function email(){
            $this->load->library('mailer');
            $email_penerima = 'brajamusti570@gmail.com';
            $subjek = 'subjek ok';
            $pesan = 'pesan ok';
            $attachment = $_FILES['attachment'];
            $content = $this->load->view('content', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
            $sendmail = array(
              'email_penerima'=>$email_penerima,
              'subjek'=>$subjek,
              'content'=>$content,
              'attachment'=>$attachment
            );
            if(empty($attachment['name'])){ // Jika tanpa attachment
              $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
            }else{ // Jika dengan attachment
              $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
            }
            echo "<b>".$send['status']."</b><br />";
            echo $send['message'];
            echo "<br /><a href='".base_url("index.php/email")."'>Kembali ke Form</a>";
    }
 
}
 ?>