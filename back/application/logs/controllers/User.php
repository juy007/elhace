<?php 
if (!defined('BASEPATH'))exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
        $this->load->library('upload');
        $this->load->library('encryption');
        $this->load->helper('security');
        $this->load->library('session');
        $this->load->model('Website');
        $this->load->model('M_user');
        $this->load->helper(array('url','form'));

        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        if ($this->session->userdata('user_login') != 'TRUE')
            redirect(base_url(), 'refresh');

        date_default_timezone_set('Asia/Jakarta');
        
    }
    //=======================================DASHBOARD ADMIN=================================================
    function index()// halaman user
    {   
        if ($this->session->userdata('user_login') != 'TRUE')
            redirect(base_url(), 'refresh');
        //===================harus di pakai semua fungction controller======================
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $this->load->view('frontend/user/header_user',$data);
        $this->load->view('frontend/user/index');
        $this->load->view('frontend/user/footer');
    }
    //========================================================================================================//
     //=======================================DASHBOARD ADMIN=================================================
    function user_menu()// halaman user
    {   
        if ($this->session->userdata('user_login') != 'TRUE')
            redirect(base_url(), 'refresh');
        //===================harus di pakai semua fungction controller======================
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $this->load->view('frontend/user/header_user',$data);
        $this->load->view('frontend/user/menu_user');
        $this->load->view('frontend/user/footer');
    }
    //========================================================================================================
    //=======================================DASHBOARD ADMIN=================================================
    function akun()// halaman akun
    {   
        if ($this->session->userdata('user_login') != 'TRUE')
            redirect(base_url(), 'refresh');
        //===================harus di pakai semua fungction controller======================
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

        $query = $this->db->get_where('user', array('id_user' => $this->session->userdata('id_user')));
        $data['data_user'] = $query->row();
        
        $this->load->view('frontend/user/header_user',$data);
        $this->load->view('frontend/user/akun', $data);
        $this->load->view('frontend/user/footer');
    }
    function update_foto_user()
    {
         unlink('upload_file/'.$this->session->userdata('folder').'/img/foto_profil/'.$this->session->userdata('foto_profil'));
          $_FILES["gambar"]["name"];

            $config['upload_path'] = './upload_file/'.$this->session->userdata('folder').'/img/foto_profil/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
            $config['file_name'] = $this->session->userdata('foto_profil');
            $this->upload->initialize($config);
            $this->upload->do_upload('gambar');
            $data = $this->upload->data();
                //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./upload_file/'.$this->session->userdata('folder').'/img/foto_profil/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '100%';
                //$config['width']= 720;
                //$config['height']= 300;
            $config['new_image']= './upload_file/'.$this->session->userdata('folder').'/img/foto_profil/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
                //  echo base_url().'./upload_file/'.$this->session->userdata('folder').'/img/perusahaan/'.$data['file_name'];      
                //______________________________________________________________________________________________

            redirect(base_url()."user/akun");
    }
    function update_data_user()
    {
      $nama_depan = $this->input->post('nama_depan',TRUE);
      $nama_belakang = $this->input->post('nama_belakang',TRUE);
      $email = $this->input->post('email',TRUE);
      $telepon = $this->input->post('telepon',TRUE);
      $alamat = $this->input->post('alamat',TRUE);
      $kecamatan = $this->input->post('kecamatan',TRUE);
      $kota = $this->input->post('kota',TRUE);
      $provinsi = $this->input->post('provinsi',TRUE);
      $pos = $this->input->post('pos',TRUE);
      if ($this->M_user->simpan_update_data_user($nama_depan, $nama_belakang, $email, $telepon, $alamat, $kecamatan, $kota, $provinsi, $pos) == TRUE) {
            redirect(base_url() . "user/akun");
        }else{
            $this->session->set_flashdata('notif' , false);
            $this->session->set_flashdata('teks_notif' , "Registrasi Gagal");
            redirect(base_url() . "user/akun/gagal");
        }
    }
    function update_password_user()
    {
      $password = $this->input->post('password2',TRUE);
      if ($this->M_user->simpan_update_password_user($password) == TRUE) {
            redirect(base_url() . "user/akun");
        }else{
            $this->session->set_flashdata('notif' , false);
            $this->session->set_flashdata('teks_notif' , "Registrasi Gagal");
            redirect(base_url() . "user/akun/gagal");
        }
    }
    //==========================================================1==============================================
    //========================================LOGOUT==========================================================
      function logout(){
        //$this->session->unset_tempdata('item');
        $this->session->sess_destroy();
        redirect(base_url());
    } 

    //======================================HALAMAN tentang=================================================
    function artikel()// halaman awal front end
    {
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $this->load->view('frontend/user/header_user',$data);
        $this->load->view('frontend/user/artikel');
        $this->load->view('frontend/user/footer');
    }
       function detail_artikel()// halaman awal front end
    {
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $this->load->view('frontend/user/header_user',$data);
        $this->load->view('frontend/user/artikel_detail');
        $this->load->view('frontend/user/footer');
    }

    function publikasi()// halaman awal front end
    {
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $this->load->view('frontend/user/header_user',$data);
        $this->load->view('frontend/user/publikasi');
        $this->load->view('frontend/user/footer');
    }
    //=====================================================================================================
    // //============================================Menu=======================================================
     function tentang()// halaman awal front end
    {
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
       // $this->load->view('frontend/top');
        $this->load->view('frontend/user/header_1',$data);
        $this->load->view('frontend/tentang');
        $this->load->view('frontend/user/footer');
    }
    //=====================================================================================================
  
    function tentang_plts_atap()// halaman awal front end
    {
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
       // $this->load->view('frontend/top');
        $this->load->view('frontend/user/header_1',$data);
        $this->load->view('frontend/faq_plts_atap');
        $this->load->view('frontend/user/footer');
    }
    //=====================================================================================================
     function tentang_solarhub()// halaman awal front end
    {
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
       // $this->load->view('frontend/top');
        $this->load->view('frontend/user/header_1',$data);
        $this->load->view('frontend/faq_solarhub');
        $this->load->view('frontend/user/footer');
    }
    //=====================================================================================================

     //============================================GANTI BAHASA=============================================
    function produk()// halaman awal front end
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

        $this->load->view('frontend/user/header_1',$data);
        $this->load->view('frontend/user/produk');
        $this->load->view('frontend/user/footer');
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
            $hasil = $this->load->view('frontend/user/produk_view1', array('produk'=>$produk,'kategori'=>$kategori,'lokasi_kota' => $lokasi_kota,'lokasi_provinsi' => $lokasi_provinsi,'harga_minimal' =>$harga_minimal,'harga_maximal' =>$harga_maximal,'pembayaran_cash' => $pembayaran_cash,'pembayaran_kredit' => $pembayaran_kredit,'garansi' =>$garansi,'ukuran_sistem' => $ukuran_sistem,'rating'=> $rating), true);
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
        if($get_produk->num_rows() < 1){ redirect(base_url().'user/produk'); }
        $data['produk']=  $get_produk->row();

        $this->load->view('frontend/user/header_1',$data);
        $this->load->view('frontend/user/produk_detail');
        $this->load->view('frontend/user/footer');
    }

     //============================================GANTI BAHASA=============================================
    function perusahaan()// halaman awal front end
    {
        //===================harus di pakai semua fungction controller======================
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data['perusahaan'] = $this->M_user->tampil_perusahaan();
        $this->load->view('frontend/user/header_1',$data);
        $this->load->view('frontend/user/perusahaan');
        $this->load->view('frontend/user/footer');
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
       
        if(count($data['perusahaan']) < 1){ redirect(base_url().'user/perusahaan'); }
        $data['produk_terbaru'] = $this->M_user->detail_perusahaan_produk_terbaru($id_perusahaan);
        $this->load->view('frontend/user/header_1',$data);
        $this->load->view('frontend/user/perusahaan_detail');
        $this->load->view('frontend/user/perusahaan_beranda');
        $this->load->view('frontend/user/footer');
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
        if(count($data['perusahaan']) < 1){ redirect(base_url().'user/perusahaan'); }
        $data['produk'] = $this->M_user->detail_perusahaan_produk($id_perusahaan);
        $this->load->view('frontend/user/header_1',$data);
        $this->load->view('frontend/user/perusahaan_detail');
        $this->load->view('frontend/user/perusahaan_produk');
        $this->load->view('frontend/user/footer');
    }
     function perusahaan_pemasang($id_perusahaan)// halaman awal front end
    {
        //===================harus di pakai semua fungction controller======================
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data['perusahaan'] = $this->M_user->detail_perusahaan($id_perusahaan);
        if(count($data['perusahaan']) < 1){ redirect(base_url().'user/perusahaan'); }
        $data['produk'] = $this->M_user->detail_perusahaan_produk($id_perusahaan);
        $this->load->view('frontend/user/header_1',$data);
        $this->load->view('frontend/user/perusahaan_detail');
        $this->load->view('frontend/user/perusahaan_pemasang');
        $this->load->view('frontend/user/footer');
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
        if(count($data['perusahaan']) < 1){ redirect(base_url().'user/perusahaan'); }
        $data['produk'] = $this->M_user->detail_perusahaan_produk($id_perusahaan);
        $this->load->view('frontend/user/header_1',$data);
        $this->load->view('frontend/user/perusahaan_detail');
        $this->load->view('frontend/user/perusahaan_ulasan');
        $this->load->view('frontend/user/footer');
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
        $this->load->view('frontend/user/header_1',$data);
        $this->load->view('frontend/user/pemasang');
        $this->load->view('frontend/user/footer');
    }
     //============================================GANTI BAHASA=============================================
    function pemasang_detail($id_pemasang)// halaman awal front end
    {
        //===================harus di pakai semua fungction controller======================
        //  $data['seo'] = $this->home->seo(); //menampilkan meta title, keyword, deskripsi
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data['pemasang'] = $this->M_user->tampil_detail_pemasang($id_pemasang);
        if(count($data['pemasang']) < 1){ redirect(base_url().'user/pemasang'); }
        $data['keahlian'] = $this->M_user->tampil_keahlian_pemasang($id_pemasang);
        $data['portofolio'] = $this->M_user->tampil_portofolio_pemasang($id_pemasang);

        $this->load->view('frontend/user/header_1',$data);
        $this->load->view('frontend/user/pemasang_detail');
        $this->load->view('frontend/user/footer');
    }

     function riwayat()//halaman verifikasi OTP
    {
        $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
        $data['medsos'] = $this->Website->medsosweb();
     
           $this->load->view('frontend/user/header_user',$data);
           $this->load->view('frontend/user/riwayat');
           $this->load->view('frontend/user/footer');
    }
     function pembelian()//halaman verifikasi OTP
    {

        $data['daftar_pembayaran']= $this->M_user->daftar_pembayaran();
        $data['proses_order']= $this->M_user->proses_order();
        $data['kirim_order']= $this->M_user->kirim_order();
        $data['selesai_order']= $this->M_user->selesai_order();


        $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
        $data['medsos'] = $this->Website->medsosweb();
     
           $this->load->view('frontend/user/header_user',$data);
           $this->load->view('frontend/user/pembelian');
           $this->load->view('frontend/user/footer');
    }    
     function pembelian_detail()//halaman verifikasi OTP
    {
        $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
        $data['medsos'] = $this->Website->medsosweb();
     
           $this->load->view('frontend/user/header_user',$data);
           $this->load->view('frontend/user/pembelian_detail');
           $this->load->view('frontend/user/footer');
    }    
     function form_perusahaan()//halaman verifikasi OTP
    {
        $get_id_perusahaan = $this->db->get_where('perusahaan', array('id_user'=>$this->session->userdata('id_user')));
        $value_get_id = $get_id_perusahaan->row();
       // $query = $this->db->get_where('perusahaan', array('id_perusahaan' => $value_get_id->id_perusahaan));
        if ($get_id_perusahaan->num_rows() > 0) {
             redirect(base_url().'user/finish','refresh');
        }

        $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
        $data['medsos'] = $this->Website->medsosweb();
     
           $this->load->view('frontend/user/header_user',$data);
           $this->load->view('frontend/user/form_perusahaan');
           $this->load->view('frontend/user/footer');
    }
     function form_kontak()//halaman verifikasi OTP
    {
        $get_id_perusahaan = $this->db->get_where('perusahaan', array('id_user'=>$this->session->userdata('id_user')));
        $value_get_id = $get_id_perusahaan->row();
      
       if ($get_id_perusahaan->num_rows() > 0) {
            $query = $this->db->get_where('perusahaan_medsos', array('id_perusahaan' => $value_get_id->id_perusahaan));
            if ($query->num_rows() > 0) {
             redirect(base_url().'user/form_jadwal','refresh');
        }
       }
       

        if (isset($_POST['namaPerusahaan'])){
            $namaPerusahaan = $this->input->post('namaPerusahaan');
            $taglinePerusahaan = $this->input->post('taglinePerusahaan');
            $alamatPerusahaan = $this->input->post('alamatPerusahaan');
            $kecamatanPerusahaan = $this->input->post('kecamatanPerusahaan');
            $kabupatenPerusahaan = $this->input->post('kabupatenPerusahaan');
            $provinsiPerusahaan = $this->input->post('provinsiPerusahaan');
            $latitudePerusahaan = $this->input->post('latitudePerusahaan');
            $longitudePerusahaan = $this->input->post('longitudePerusahaan');
            $deskripsiPerusahaan = $this->input->post('deskripsiPerusahaan');

            if($this->M_user->simpan_perusahaan($namaPerusahaan, $taglinePerusahaan, $alamatPerusahaan, $kecamatanPerusahaan, $kabupatenPerusahaan, $provinsiPerusahaan, $latitudePerusahaan, $longitudePerusahaan, $deskripsiPerusahaan) == TRUE){

                //mkdir("upload_file/".$this->session->userdata('folder')."/img/perusahaan");

                $_FILES["logoPerusahaan"]["name"];

                $config['upload_path'] = './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
                $config['file_name'] = 'logoPerusahaan.png';
                $this->upload->initialize($config);
                $this->upload->do_upload('logoPerusahaan');
                $data = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./upload_file/'.$this->session->userdata('folder').'/img/perusahaan/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '100%';
                //$config['width']= 720;
                //$config['height']= 300;
                $config['new_image']= './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                //  echo base_url().'./upload_file/'.$this->session->userdata('folder').'/img/perusahaan/'.$data['file_name'];      
                //______________________________________________________________________________________________
                $_FILES["bannerPerusahaan"]["name"];
                
                $config1['upload_path'] = './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/';
                $config1['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
                $config1['file_name'] = 'bannerPerusahaan.png';
                $this->upload->initialize($config1);
                $this->upload->do_upload('bannerPerusahaan');
                $data = $this->upload->data();
                //Compress Image
                $config1['image_library']='gd2';
                $config1['source_image']='./upload_file/'.$this->session->userdata('folder').'/img/perusahaan/'.$data['file_name'];
                $config1['create_thumb']= FALSE;
                $config1['maintain_ratio']= TRUE;
                $config1['quality']= '100%';
                $config1['width']= 720;
                $config1['height']= 300;
                $config1['new_image']= './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/'.$data['file_name'];
                $this->load->library('image_lib', $config1);
                $this->image_lib->resize();
                //______________________________________________________________________________________________
                
                $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
                $data['medsos'] = $this->Website->medsosweb();
         
                $this->load->view('frontend/user/header_user',$data);
                $this->load->view('frontend/user/form_kontak');
                $this->load->view('frontend/user/footer');
            }else{
                 redirect(base_url()."user/form_perusahaan");
            }
        }else{
            $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
            $data['medsos'] = $this->Website->medsosweb();
         
            $this->load->view('frontend/user/header_user',$data);
            $this->load->view('frontend/user/form_kontak');
            $this->load->view('frontend/user/footer');
        } 
    }
     function form_jadwal()//halaman verifikasi OTP
    {
        $get_id_perusahaan = $this->db->get_where('perusahaan', array('id_user'=>$this->session->userdata('id_user')));
        $value_get_id = $get_id_perusahaan->row();
        $this->session->set_userdata('id_perusahaan', $value_get_id->id_perusahaan);
        if ($get_id_perusahaan->num_rows() > 0) {
            $query = $this->db->get_where('perusahaan_jadwal', array('id_perusahaan' => $value_get_id->id_perusahaan));
            if ($query->num_rows() > 0) {
                redirect(base_url().'user/form_portofolio','refresh');
             }
        }
        if (isset($_POST['emailPerusahaan'])){
            $emailPerusahaan = $this->input->post('emailPerusahaan');
            $teleponPerusahaan = $this->input->post('teleponPerusahaan');
            $whatsappPerusahaan = $this->input->post('whatsappPerusahaan');
           

            if($this->M_user->simpan_kontakEmail($emailPerusahaan) == TRUE && $this->M_user->simpan_kontakTelepon($teleponPerusahaan) == TRUE && $this->M_user->simpan_kontakWhatsapp($whatsappPerusahaan) == TRUE){
                if (isset($_POST['websitePerusahaan'])){
                    $websitePerusahaan = $this->input->post('websitePerusahaan');
                    $this->M_user->simpan_kontakWebsite($websitePerusahaan);
                }

                if (isset($_POST['linkvideoPerusahaan'])){
                    $linkvideoPerusahaan = $this->input->post('linkvideoPerusahaan');
                     $this->M_user->simpan_kontakVideo($linkvideoPerusahaan);
                }

                $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
                $data['medsos'] = $this->Website->medsosweb();
     
                $this->load->view('frontend/user/header_user',$data);
                $this->load->view('frontend/user/form_jadwal');
                $this->load->view('frontend/user/footer');
            }else{
                 redirect(base_url()."user/form_kontak");
            }

        }else{
            $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
            $data['medsos'] = $this->Website->medsosweb();
     
           $this->load->view('frontend/user/header_user',$data);
           $this->load->view('frontend/user/form_jadwal');
           $this->load->view('frontend/user/footer');
        }
           
    }
    function form_portofolio()//halaman verifikasi OTP
    {
        $get_id_perusahaan = $this->db->get_where('perusahaan', array('id_user'=>$this->session->userdata('id_user')));
        $value_get_id = $get_id_perusahaan->row();
      
        if ($get_id_perusahaan->num_rows() > 0) {
            $query = $this->db->get_where('perusahaan_portofolio', array('id_perusahaan' => $value_get_id->id_perusahaan));
            if ($query->num_rows() > 0) {
                redirect(base_url().'user/finish','refresh');
            }
        }
        if (isset($_POST['hari'])){
            $hari = $this->input->post('hari');
            $kondisi = $this->input->post('kondisi');
            $jam_buka = $this->input->post('jam_buka');
            $jam_tutup = $this->input->post('jam_tutup');
           

            if($this->M_user->simpan_jadwal($hari, $kondisi, $jam_buka, $jam_tutup) == TRUE){

                $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
                $data['medsos'] = $this->Website->medsosweb();
     
                $this->load->view('frontend/user/header_user',$data);
                $this->load->view('frontend/user/form_portofolio');
                $this->load->view('frontend/user/footer');
            }else{
                 redirect(base_url()."user/form_jadwal");
            }

        }else{
            $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
            $data['medsos'] = $this->Website->medsosweb();
     
            $this->load->view('frontend/user/header_user',$data);
            $this->load->view('frontend/user/form_portofolio');
            $this->load->view('frontend/user/footer');
        }
    }
     function finish()//halaman verifikasi OTP
    {
        $get_id_perusahaan = $this->db->get_where('perusahaan', array('id_user'=>$this->session->userdata('id_user')));
        $value_get_id = $get_id_perusahaan->row();

        $nama_projek = $this->input->post('nama_projek');
        $kapasitas = $this->input->post('kapasitas');
        $informasi_tambahan = $this->input->post('informasi_tambahan');
        $folder = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789'), 0, 8);
        $_FILES["slide"]["name"];

        //mkdir("upload_file/".$this->session->userdata('folder')."/img/perusahaan/portofolio/".$folder);

        $filesCount = count($_FILES['slide']['name']);
        for($i = 0; $i < $filesCount; $i++){
            $new_name = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789'), 0, 5);
            
            $_FILES['file']['name']     = $_FILES['slide']['name'][$i];
            $_FILES['file']['type']     = $_FILES['slide']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['slide']['tmp_name'][$i];
            $_FILES['file']['error']     = $_FILES['slide']['error'][$i];
            $_FILES['file']['size']     = $_FILES['slide']['size'][$i];
             
            // File upload configuration
            $config['upload_path'] = './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/portofolio/'.$folder.'/';
                
            $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
            $config['file_name'] = 'slide_'.$new_name.'.png';
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '100%';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
             
            if($this->upload->do_upload('file')){
                $fileData = $this->upload->data();
                $uploadData[$i]['file_name'] = $fileData['file_name'];
                $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");

                
            //  $insert = $this->file->insert($uploadData);
            }
        }
         
        if(!empty($uploadData)){
            $data = array(
                'id_perusahaan' => $value_get_id->id_perusahaan,
                'projek' => $nama_projek,
                'kapasitas' => $kapasitas,
                'informasi_tambahan' => $informasi_tambahan,
                'folder' => $folder,
                'input_portofolio_perusahaan' => date('Y-m-d')
                );
            $this->db->insert('perusahaan_portofolio',$data);
             
            $this->session->set_flashdata('notif' , true);
            $this->session->set_flashdata('teks_notif' , "Slide Berhasil ditambah");
        }
            $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
            $data['medsos'] = $this->Website->medsosweb();

            $this->load->view('frontend/user/header_user',$data);
            $this->load->view('frontend/user/form_finish');
            $this->load->view('frontend/user/footer');
    }

    function wishlist()//halaman verifikasi OTP
    {
        $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
        $data['medsos'] = $this->Website->medsosweb();
        $data['wishlist'] = $this->M_user->tampil_wishlist();
           $this->load->view('frontend/user/header_user',$data);
           $this->load->view('frontend/user/wishlist');
           $this->load->view('frontend/user/footer');
    }
     function tambah_wishlist_produk()// halaman awal front end
    {
        $id_user = $this->input->post('id_user');
        $id_etalase = $this->input->post('id_produk');
        $jenis= $this->input->post('jenis');
         $produk_wishlist = $this->M_user->tambah_wishlist_produk($id_user, $id_etalase, $jenis);

            if ($produk_wishlist == TRUE) {
               echo 'sukses';
            }else{
                echo 'gagal';
            } 

    }
    function hapus_wishlist($id_wishlist)
    {
        $this->db->where('id_wishlist', $id_wishlist);
        $this->db->delete('user_wishlist');
        redirect(base_url().'user/wishlist');
    }
     function produk_tambah_keranjang()// halaman awal front end
    {
        $id_user = $this->input->post('id_user');
        $id_produk = $this->input->post('id_produk');
        $jml_item = $this->input->post('jml_item');
        $total_harga = $this->input->post('total_harga');
        $catatan = $this->input->post('catatan');

        $cek_keranjang = $this->db->get_where('order', array('id_user'=>$id_user,'id_produk'=>$id_produk,'status_order'=>'keranjang'));
        $value_order = $cek_keranjang->row();
       
        if ($cek_keranjang->num_rows() > 0) {
            $jml_update = $value_order->jumlah+$jml_item;
            //$harga_update = $value_order->harga+$total_harga;
            $this->db->where('id_user' , $id_user);
            $this->db->where('id_produk' , $id_produk);
            $this->db->where('status_order' , 'keranjang');
            $this->db->update('order', array('jumlah'=>$jml_update));
            echo 'sukses';
        }else{
           $produk_keranjang = $this->M_user->tambah_keranjang_produk($id_user, $id_produk, $jml_item, $total_harga, $catatan);

            if ($produk_keranjang == TRUE) {
               echo 'sukses';
            }else{
                echo 'gagal';
            } 
        }
        
        
        
    }
     function keranjang()//halaman verifikasi OTP
    {

        if (isset($_POST['Fid_order'])) {
            $id = $this->input->post('Fid_order');
            $catatan = $this->input->post('Fcatatan');
            $jumlah = $this->input->post('Fjumlah');

            $result = array();
            foreach($id AS $key => $val){
             $result[] = array(
              "id_order" => $id[$key],
              "catatan"  => $_POST['Fcatatan'][$key],
              "jumlah"  => $_POST['Fjumlah'][$key]
             );
            }
            $this->db->update_batch('order', $result, 'id_order');
            redirect(base_url().'user/beli', 'refresh');
        }
        
        $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
        $data['medsos'] = $this->Website->medsosweb();

        $data['keranjang'] = $this->M_user->tampil_keranjang();
     
           $this->load->view('frontend/user/header_user',$data);
           $this->load->view('frontend/user/keranjang');
           $this->load->view('frontend/user/footer');
    }
    function hapus_keranjang($id_keranjang)
    {
        $this->db->where('id_order', $id_keranjang);
        $this->db->delete('order');
        redirect(base_url().'user/keranjang');
    }
    function beli()
    {
        $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
        $data['medsos'] = $this->Website->medsosweb();
        
        $cek_keranjang = $this->db->get_where('order', array('id_user'=>$this->session->userdata('id_user'),'status_order'=>'keranjang'));
       
        if ($cek_keranjang->num_rows() < 1) {
            redirect(base_url().'user');
        }

        $data['rekening'] = $this->M_user->tampil_rekening();
        $data['checkout'] = $this->M_user->tampil_beli();
        $this->load->view('frontend/user/header_user',$data);
        $this->load->view('frontend/user/beli');
        $this->load->view('frontend/user/footer');
    } 
    function ambil_data_rekening()
    {
    // Ambil data ID Provinsi yang dikirim via ajax post
        $id_rekening = $this->input->post('id_rekening');
        
        $data_rekening = $this->M_user->get_rekening($id_rekening);
       
       // $form_input = "<option value=''>Pilih</option>";
        
       
          $bank = $data_rekening->bank;
          $nomor_rekening = $data_rekening->nomor_rekening;
          $nama_rekening = $data_rekening->nama_rekening;
        
        
        $callback = array('bank'=>$bank,'nomor_rekening'=>$nomor_rekening, 'nama_rekening'=>$nama_rekening); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }
    function simpan_beli()
    {
        if (!empty($_POST['nama_penerima'])) {
            $id_invoice = 'INV/U'.$this->session->userdata('id_user').'/'.date("Ymd/His");
            $nama = $this->input->post('nama_penerima');
            $telepon = $this->input->post('telepon_penerima');
            $alamat = $this->input->post('alamat_penerima');
            $kecamatan  = $this->input->post('kecamatan_penerima');
            $kabupaten = $this->input->post('kabupaten_penerima');
            $provinsi = $this->input->post('provinsi_penerima');
            $pos = $this->input->post('pos_penerima');
            $total = $this->input->post('total');
            $bank = $this->input->post('bank');
            $nomor_rekening = $this->input->post('nomor_rekening');
            $nama_rekening = $this->input->post('nama_rekening');
            $this->M_user->tambah_invoice($id_invoice, $nama, $telepon, $alamat, $kecamatan, $kabupaten, $provinsi, $pos, $total, $bank, $nama_rekening, $nomor_rekening);
           
            $id = $this->input->post('Fid_order');
            $Fno_invoice = $this->input->post('Fno_invoice');
            $jumlah = $this->input->post('Fjumlah');

            $result = array();
            $no = 0;
            foreach($id AS $key => $val){
                $no++;
                $result[] = array(
                  "id_order" => $id[$key],
                  "id_invoice" => $id_invoice,
                  "no_invoice"  => $_POST['Fno_invoice'].''.$no.''.[$key],
                  "tanggal" => date("Y-m-d"),
                  "jam" => date("H:i:s"),
                  "status_order" => 'menunggu_pembayaran'
                 );
            }
            $this->db->update_batch('order', $result, 'id_order');
            redirect(base_url().'user/invoice/'.$id_invoice);
        }else{  
           redirect(base_url().'user', 'refresh');
        }

      
    }
    function invoice($id_invoice)
    {
       /* if (empty($id_invoice)) {
            redirect(base_url().'user', 'refresh');
        }*/
        $get_id_user = $this->db->get_where('user', array('id_user'=>$this->session->userdata('id_user')));
        $data['user'] = $get_id_user->row();

        $data['invoice'] = $this->M_user->tampil_invoice($id_invoice);
        $data['daftar_invoice'] = $this->M_user->daftar_invoice($id_invoice);

        $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
        $data['medsos'] = $this->Website->medsosweb();

        $this->load->view('frontend/user/header_user',$data);
        $this->load->view('frontend/user/invoice');
        $this->load->view('frontend/user/footer');
    }

    function hapusfolderproduk()
    {

       $dir_produk = 'upload_file/12345/img/perusahaan/produk/mantap';

      $glob_slide_produk = glob($dir_produk.'/slide/*');
        foreach ($glob_slide_produk as $glob_slide_produk_ex) {
            unlink($glob_slide_produk_ex);
           // $sf = scandir($g,1);
           /*  foreach ($sf as $sfc) {
                if ($sfc != '.' && $sfc != '..') {
                     echo $dir2,$sfc.'<br>';
                }
            }   */
           // echo $g.'<br>';
           
        }
        unlink($dir_produk.'/coverProduk.png'); 
        rmdir($dir_produk.'/slide');
        rmdir($dir_produk);
     }

    function hapusfolderpemasang()
    {

       $dir_pemasang = 'upload_file/12345/img/perusahaan/pemasang/paman';

      /*  $glob_slide_pemasang = glob($dir_pemasang.'/slide/*');
        foreach ($glob_slide_pemasang as $glob_slide_pemasang_ex) {
            unlink($glob_slide_pemasang_ex);
        }

        $glob_sertifikat_pemasang = glob($dir_pemasang.'/sertifikat/*');
        foreach ($glob_sertifikat_pemasang as $glob_sertifikat_pemasang_ex) {
            unlink($glob_sertifikat_pemasang_ex);
        }*/

        $scandir_portofolio_pemasang = scandir($dir_pemasang.'/portofolio',1);
        foreach ($scandir_portofolio_pemasang as $scandir_portofolio_pemasang_ex) {
           // unlink($glob_sertifikat_pemasang_ex);
            if ($scandir_portofolio_pemasang_ex != '.' && $scandir_portofolio_pemasang_ex != '..'){
               // echo $dir_pemasang.'/portofolio/'.$scandir_portofolio_pemasang_ex.'/<br>';

                $glob_protofolio_pemasang = glob($dir_pemasang.'/portofolio/'.$scandir_portofolio_pemasang_ex.'/*');
                  echo $dir_pemasang.'/portofolio/'.$scandir_portofolio_pemasang_ex.'<br>';
               /* foreach ($glob_protofolio_pemasang as $glob_protofolio_pemasang_ex) {
                    //unlink($glob_protofolio_pemasang_ex);
                    echo $glob_protofolio_pemasang.'<br>';
                }*/
            }
            
        }

     /*   unlink($dir_pemasang.'/ktp.png'); unlink($dir_pemasang.'/profil.png'); 
        rmdir($dir_pemasang.'/slide');
        rmdir($dir_pemasang.'/sertifikat');
        rmdir($dir_pemasang.'/portofolio');*/
     }


}
?>