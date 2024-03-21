<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller 
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
        $this->load->model('M_perusahaan');
        $this->load->helper(array('url','form'));

        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        if ($this->session->userdata('user_login') != 'TRUE')
            redirect(base_url(), 'refresh');

        $get_id_perusahaan = $this->db->get_where('perusahaan', array('id_user'=>$this->session->userdata('id_user')));
        $value_get_id = $get_id_perusahaan->row();
            $query = $this->db->get_where('perusahaan_medsos', array('id_perusahaan' => $value_get_id->id_perusahaan));
            $query2 = $this->db->get_where('perusahaan_jadwal', array('id_perusahaan' => $value_get_id->id_perusahaan));
            $query3 = $this->db->get_where('perusahaan_portofolio', array('id_perusahaan' => $value_get_id->id_perusahaan));
            if ($query->num_rows() <= 0) {
                redirect(base_url().'user/form_kontak','refresh');
            }elseif ($query2->num_rows() <= 0) {
                redirect(base_url().'user/form_jadwal','refresh');
            }elseif ($query3->num_rows() <= 0) {
                redirect(base_url().'user/form_portofolio','refresh');
            }
    }
    //=======================================DASHBOARD ADMIN=================================================
    public function index()
    {
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();
        $data['perusahaan'] = $this->M_perusahaan->perusahaan();

        $this->load->view('frontend/perusahaan/header');
        $this->load->view('frontend/perusahaan/index');
        $this->load->view('frontend/perusahaan/footer');
    }
    function ok(){
        $this->load->view('frontend/perusahaan/ok');
    }
    //========================================================================================================
    ////=======================================PRODUK=================================================
    public function produk()
    {
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();

        $data['produk'] = $this->M_perusahaan->tampil_produk();
        
        $this->load->view('frontend/perusahaan/header', $data);
        $this->load->view('frontend/perusahaan/produk');
        $this->load->view('frontend/perusahaan/footer');
    }
    //////=======================================DASHBOARD ADMIN=================================================
    public function edit_produk($id_produk)
    {
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();

        $get_produk = $this->db->get_where('perusahaan_produk', array('id_produk'=>$id_produk));
        $data['produk']=  $get_produk->row();
        $this->load->view('frontend/perusahaan/header', $data);
        $this->load->view('frontend/perusahaan/produk_form_edit');
        $this->load->view('frontend/perusahaan/footer');
    }
    //========================================================================================================
      ////=======================================DASHBOARD ADMIN=================================================
    function simpan_edit_produk2()//halaman verifikasi OTP
    {
        if (!isset($_POST['nama'])){
            redirect(base_url()."perusahaan/tambah_produk");
        }
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $kategori = $this->input->post('kategori');
        $ukuran_sistem = $this->input->post('ukuran_sistem');
        $deskripsi = $this->input->post('deskripsi');
        $harga = $this->input->post('harga');
        $garansi = $this->input->post('garansi');

        if (!isset($_FILES["foto"]["name"])) {
         
            $folder = $this->input->post('folder');
            unlink('upload_file/'.$this->session->userdata('folder').'/img/perusahaan/produk/'.$folder.'/coverProduk.png');
          $_FILES["foto"]["name"];

            $config['upload_path'] = './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/produk/'.$folder.'/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
            $config['file_name'] = 'coverProduk.png';
            $this->upload->initialize($config);
            $this->upload->do_upload('foto');
            $data = $this->upload->data();
                //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./upload_file/'.$this->session->userdata('folder').'/img/perusahaan/produk/'.$folder.'/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '100%';
                //$config['width']= 720;
                //$config['height']= 300;
            $config['new_image']= './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/produk/'.$folder.'/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
                //  echo base_url().'./upload_file/'.$this->session->userdata('folder').'/img/perusahaan/'.$data['file_name'];      
                //______________________________________________________________________________________________
        }    
        if($this->M_perusahaan->simpan_edit_produk($id, $nama, $kategori, $ukuran_sistem, $deskripsi, $harga, $garansi) == TRUE){
            redirect(base_url()."perusahaan/produk");
        }else{
            redirect(base_url()."perusahaan/produk");
        }
    }
    //========================================================================================================
    //////=======================================DASHBOARD ADMIN=================================================
    public function detail_produk($id_produk)
    {
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();

        $get_produk = $this->db->get_where('perusahaan_produk', array('id_produk'=>$id_produk));
        $data['produk']=  $get_produk->row();
        $this->load->view('frontend/perusahaan/header', $data);
        $this->load->view('frontend/perusahaan/produk_detail');
        $this->load->view('frontend/perusahaan/footer');
    }
    //========================================================================================================
    ////=======================================DASHBOARD ADMIN=================================================
    public function tambah_produk()
    {
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();

        $this->load->view('frontend/perusahaan/header');
        $this->load->view('frontend/perusahaan/produk_form');
        $this->load->view('frontend/perusahaan/footer');
    }
    //========================================================================================================
    ////=======================================DASHBOARD ADMIN=================================================
    function simpan_produk()//halaman verifikasi OTP
    {
        if (!isset($_POST['nama'])){
            redirect(base_url()."perusahaan/tambah_produk");
        }
        $nama = $this->input->post('nama');
        $kategori = $this->input->post('kategori');
        $ukuran_sistem = $this->input->post('ukuran_sistem');
        $solarpanel = $this->input->post('solarpanel');
        $inverter = $this->input->post('inverter');
        $estimated = $this->input->post('estimated');
        $accessories = $this->input->post('accessories');
        $operation = $this->input->post('operation');
        $pengajuan_pln = $this->input->post('pengajuan_pln');
        $deskripsi = $this->input->post('deskripsi');
        $harga = $this->input->post('harga');
        $garansi = $this->input->post('garansi');

        $folder = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789'), 0, 7);
        date_default_timezone_set('Asia/Jakarta');
        $new_folder = 'produk_'.$folder.'_'.date("d").''.date("m").''.date("y").''.date("H").''.date("i").''.date("s");
        //mkdir("upload_file/".$this->session->userdata('folder')."/img/perusahaan/produk");
        mkdir("upload_file/".$this->session->userdata('folder')."/img/perusahaan/produk/".$new_folder);
        mkdir("upload_file/".$this->session->userdata('folder')."/img/perusahaan/produk/".$new_folder."/slide");

        if($this->M_perusahaan->simpan_produk($nama, $kategori, $ukuran_sistem, $deskripsi, $solarpanel, $inverter, $estimated, $accessories, $operation, $pengajuan_pln, $harga, $garansi, $new_folder) == TRUE){

            $_FILES["foto"]["name"];

            $config['upload_path'] = './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/produk/'.$new_folder.'/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
            $config['file_name'] = 'coverProduk.png';
            $this->upload->initialize($config);
            $this->upload->do_upload('foto');
            $data = $this->upload->data();
                //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./upload_file/'.$this->session->userdata('folder').'/img/perusahaan/produk/'.$new_folder.'/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '100%';
                //$config['width']= 720;
                //$config['height']= 300;
            $config['new_image']= './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/produk/'.$new_folder.'/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
                //  echo base_url().'./upload_file/'.$this->session->userdata('folder').'/img/perusahaan/'.$data['file_name'];      
                //______________________________________________________________________________________________
            $this->session->set_flashdata('notif' , true);
            $this->session->set_flashdata('teks_notif' , "Produk berhasil ditambah");
            redirect(base_url()."perusahaan/tambah_produk");
        }else{
            $this->session->set_flashdata('notif' , false);
            $this->session->set_flashdata('teks_notif' , "Produk gagal ditambah");
            redirect(base_url()."perusahaan/tambah_produk");
        }
    }
    //========================================================================================================
     ////=======================================DASHBOARD ADMIN=================================================
    function simpan_edit_produk()//halaman verifikasi OTP
    {
        if (!isset($_POST['nama'])){
            redirect(base_url()."perusahaan/tambah_produk");
        }
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $kategori = $this->input->post('kategori');
        $ukuran_sistem = $this->input->post('ukuran_sistem');
        $deskripsi = $this->input->post('deskripsi');
        $harga = $this->input->post('harga');
        $garansi = $this->input->post('garansi');

        if($this->M_perusahaan->simpan_edit_produk($id, $nama, $kategori, $ukuran_sistem, $deskripsi, $harga, $garansi) == TRUE){
            redirect(base_url()."perusahaan/detail_produk/".$id);
        }else{
            redirect(base_url()."perusahaan/detail_produk/".$id);
        }
    }
    //========================================================================================================
    //=======================================DASHBOARD ADMIN=================================================
    function simpan_edit_gambar_produk(){

         $id = $this->input->post('id');
         $folder = $this->input->post('folder');
         unlink('upload_file/'.$this->session->userdata('folder').'/img/perusahaan/produk/'.$folder.'/coverProduk.png');
          $_FILES["foto"]["name"];

            $config['upload_path'] = './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/produk/'.$folder.'/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
            $config['file_name'] = 'coverProduk.png';
            $this->upload->initialize($config);
            $this->upload->do_upload('foto');
            $data = $this->upload->data();
                //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./upload_file/'.$this->session->userdata('folder').'/img/perusahaan/produk/'.$folder.'/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '100%';
                //$config['width']= 720;
                //$config['height']= 300;
            $config['new_image']= './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/produk/'.$folder.'/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
                //  echo base_url().'./upload_file/'.$this->session->userdata('folder').'/img/perusahaan/'.$data['file_name'];      
                //______________________________________________________________________________________________

            redirect(base_url()."perusahaan/detail_produk/".$id);
    }
    //========================================================================================================
     //=======================================DASHBOARD ADMIN=================================================
    function simpan_slide_produk(){

        $id = $this->input->post('id');
        $folder = $this->input->post('folder');
        $_FILES["slide"]["name"];

        $filesCount = count($_FILES['slide']['name']);
        for($i = 0; $i < $filesCount; $i++){
            $new_name_generate = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789'), 0, 5);
            date_default_timezone_set('Asia/Jakarta');
            $new_name = 'slide_'.$new_name_generate.'_'.date("d").''.date("m").''.date("y").''.date("H").''.date("i").''.date("s");

            $_FILES['file']['name']     = $_FILES['slide']['name'][$i];
            $_FILES['file']['type']     = $_FILES['slide']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['slide']['tmp_name'][$i];
            $_FILES['file']['error']     = $_FILES['slide']['error'][$i];
            $_FILES['file']['size']     = $_FILES['slide']['size'][$i];
             
            // File upload configuration
            $config['upload_path'] = './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/produk/'.$folder.'/slide/';
                
            $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
            $config['file_name'] = $new_name.'.png';
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '100%';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
             
            if($this->upload->do_upload('file')){
                $fileData = $this->upload->data();
                $uploadData[$i]['file_name'] = $fileData['file_name'];
                $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");

                $data = array(
                'id_produk' => $id,
                'slide' => $fileData['file_name'],
                'input_slide' => date('Y-m-d')
                );
            //  $insert = $this->file->insert($uploadData);
            }
        }
         
        if(!empty($uploadData)){
            //  $insert = $this->file->insert($uploadData);
             
            $this->session->set_flashdata('notif' , true);
            $this->session->set_flashdata('teks_notif' , "Slide Berhasil ditambah");
        }

            redirect(base_url()."perusahaan/detail_produk/".$id);
    }
    //========================================================================================================
    // //=======================================DASHBOARD ADMIN=================================================
    function hapus_slide_produk($id, $folder, $slide){
        
        unlink('upload_file/'.$this->session->userdata('folder').'/img/perusahaan/produk/'.$folder.'/slide/'.$slide);
        redirect(base_url()."perusahaan/detail_produk/".$id);
    }
    //========================================================================================================
    //=======================================DASHBOARD ADMIN=================================================
    function hapus_produk($id_produk, $folder)
    {   
        $this->db->where('id_produk' , $id_produk);
        $this->db->update('perusahaan_produk' , array('status_hapus' => 'true'));
        if ($this->db->affected_rows() > 0){

            $files =glob('upload_file/'.$this->session->userdata('folder').'/img/perusahaan/produk/'.$folder.'/slide/*');
            foreach ($files as $file) {
                if (is_file($file))
                unlink($file); // hapus file
            }

            $this->session->set_flashdata('notif' , true);
            $this->session->set_flashdata('teks_notif' , "Produk berhasil dihapus");
            redirect(base_url()."perusahaan/produk");
        }else{
            $this->session->set_flashdata('notif' , false);
            $this->session->set_flashdata('teks_notif' , "Produk gagal dihapus");
            redirect(base_url()."perusahaan/produk");
        }
    }
    //========================================================================================================
    //=======================================DASHBOARD ADMIN=================================================
    public function produk_telah_dihapus()
    {
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();

        $data['produk'] = $this->M_perusahaan->tampil_produk_dihapus();
        $this->load->view('frontend/perusahaan/header', $data);
        $this->load->view('frontend/perusahaan/produk_dihapus');
        $this->load->view('frontend/perusahaan/footer');
    }
    //========================================================================================================
     //=======================================DASHBOARD ADMIN=================================================
    function status_publish($id_produk, $status)
    {   
        if ($status == 'true') {
            $status_publish = 'false';
            $status_notif = 'tidak dipublish';
        }elseif ($status == 'false'){
            $status_publish = 'true';
            $status_notif = 'dipublish';
        }
        $this->db->where('id_produk' , $id_produk);
        $this->db->update('perusahaan_produk' , array('status_publis' => $status_publish));
        if ($this->db->affected_rows() > 0){
            $this->session->set_flashdata('notif' , true);
            $this->session->set_flashdata('teks_notif' , "Produk ".$status_notif);
            redirect(base_url()."perusahaan/detail_produk/".$id_produk);
        }else{
            $this->session->set_flashdata('notif' , false);
            redirect(base_url()."perusahaan/detail_produk/".$id_produk);
            $this->session->set_flashdata('teks_notif' , "Gagal merubah status publish");
        }
    }
    //========================================================================================================
    //=======================================PEMASANG=================================================
    public function pemasang()
    {
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();

        $data['pemasang'] = $this->M_perusahaan->tampil_pemasang();
        
        $this->load->view('frontend/perusahaan/header', $data);
        $this->load->view('frontend/perusahaan/pemasang');
        $this->load->view('frontend/perusahaan/footer');
    }
    //========================================================================================================
     //=======================================PEMASANG=================================================
    public function detail_pemasang($id_pemasang)
    {
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();

        $get_pemasang = $this->db->get_where('perusahaan_pemasang', array('id_pemasang'=>$id_pemasang));
        $data['pemasang']=  $get_pemasang->row();
        $get = $get_pemasang->row();
        $get_send = $get->id_pemasang;

        $data['portofolio'] = $this->M_perusahaan->tampil_portofolio_pemasang($get_send);
        $data['sertifikat'] = $this->M_perusahaan->tampil_sertifikat_pemasang($get_send);
        $data['keahlian'] = $this->M_perusahaan->tampil_keahlian_pemasang($id_pemasang);
       
        
        $this->load->view('frontend/perusahaan/header', $data);
        $this->load->view('frontend/perusahaan/pemasang_detail');
        $this->load->view('frontend/perusahaan/footer');
    }
    //========================================================================================================
    //=======================================DASHBOARD ADMIN=================================================
    public function tambah_pemasang()
    {
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();

        $this->load->view('frontend/perusahaan/header');
        $this->load->view('frontend/perusahaan/pemasang_form');
        $this->load->view('frontend/perusahaan/footer');
    }
    //========================================================================================================
    function simpan_pemasang()
    {
        $get_id_perusahaan = $this->db->get_where('perusahaan', array('id_user'=>$this->session->userdata('id_user')));
        $value_get_id = $get_id_perusahaan->row();
      

    //    if (isset($_POST['nama_pemasang'])){
            $nama_pemasang = $this->input->post('nama_pemasang');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $alamat = $this->input->post('alamat');
            $desa = $this->input->post('desa');
            $kecamatan = $this->input->post('kecamatan');
            $kabupaten = $this->input->post('kabupaten');
            $provinsi = $this->input->post('provinsi');
            $keahlian = $this->input->post('keahlian');
            $harga = $this->input->post('harga');
            $telepon = $this->input->post('telepon');

            $folder = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789'), 0, 5);
            date_default_timezone_set('Asia/Jakarta');
            $new_folder = 'pemasang_'.$folder.'_'.date("d").''.date("m").''.date("y").''.date("H").''.date("i").''.date("s");

            //mkdir("upload_file/".$this->session->userdata('folder')."/img/perusahaan/produk");
            mkdir("upload_file/".$this->session->userdata('folder')."/img/perusahaan/pemasang/".$new_folder);
            mkdir("upload_file/".$this->session->userdata('folder')."/img/perusahaan/pemasang/".$new_folder."/slide");
            mkdir("upload_file/".$this->session->userdata('folder')."/img/perusahaan/pemasang/".$new_folder."/portofolio");
             mkdir("upload_file/".$this->session->userdata('folder')."/img/perusahaan/pemasang/".$new_folder."/sertifikat");

            if($this->M_perusahaan->simpan_pemasang($nama_pemasang, $tanggal_lahir, $jenis_kelamin, $alamat, $desa, $kecamatan, $kabupaten, $provinsi, $harga, $telepon, $new_folder) == TRUE){

                //mkdir("upload_file/".$this->session->userdata('folder')."/img/perusahaan");

                $_FILES["gambar_ktp"]["name"];

                $config['upload_path'] = './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/pemasang/'.$new_folder.'/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
                $config['file_name'] = 'ktp.png';
                $this->upload->initialize($config);
                $this->upload->do_upload('gambar_ktp');
                $data = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./upload_file/'.$this->session->userdata('folder').'/img/perusahaan/pemasang/'.$new_folder.'/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '100%';
                //$config['width']= 720;
                //$config['height']= 300;
                $config['new_image']= './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/pemasang/'.$new_folder.'/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                //  echo base_url().'./upload_file/'.$this->session->userdata('folder').'/img/perusahaan/'.$data['file_name'];      
                //______________________________________________________________________________________________
                $_FILES["foto_profil"]["name"];
                
                $config1['upload_path'] = './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/pemasang/'.$new_folder.'/';
                $config1['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
                $config1['file_name'] = 'profil.png';
                $this->upload->initialize($config1);
                $this->upload->do_upload('foto_profil');
                $data = $this->upload->data();
                //Compress Image
                $config1['image_library']='gd2';
                $config1['source_image']='./upload_file/'.$this->session->userdata('folder').'/img/perusahaan/pemasang/'.$new_folder.'/'.$data['file_name'];
                $config1['create_thumb']= FALSE;
                $config1['maintain_ratio']= TRUE;
                $config1['quality']= '100%';
                $config1['width']= 720;
                $config1['height']= 300;
                $config1['new_image']= './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/pemasang/'.$new_folder.'/'.$data['file_name'];
                $this->load->library('image_lib', $config1);
                $this->image_lib->resize();
                //______________________________________________________________________________________________

                $this->M_perusahaan->simpan_keahlian_pemasang($keahlian);

                $data['lang'] = $this->Website->lang($this->session->userdata('lang'));
                $data['medsos'] = $this->Website->medsosweb();
         
                $this->load->view('frontend/perusahaan/header',$data);
                $this->load->view('frontend/perusahaan/pemasang_form');
                $this->load->view('frontend/perusahaan/footer');
            }else{
                 redirect(base_url()."user/form_perusahaan");
            }
    //    }else{
           
    //    } 
    }
     ////=======================================DASHBOARD ADMIN=================================================
    function simpan_edit_pemasang()//halaman verifikasi OTP
    {
         $id = $this->input->post('id');
          $nama_pemasang = $this->input->post('nama_pemasang');
          $tanggal_lahir = $this->input->post('tanggal_lahir');
          $jenis_kelamin = $this->input->post('jenis_kelamin');
          $alamat = $this->input->post('alamat');
          $desa = $this->input->post('desa');
          $kecamatan = $this->input->post('kecamatan');
          $kabupaten = $this->input->post('kabupaten');
          $provinsi = $this->input->post('provinsi');
          $keahlian = $this->input->post('keahlian');
          $harga = $this->input->post('harga');
          $telepon = $this->input->post('telepon');

        if($this->M_perusahaan->simpan_edit_pemasang($id, $nama_pemasang, $tanggal_lahir, $jenis_kelamin, $alamat, $desa, $kecamatan, $kabupaten, $provinsi, $keahlian, $harga, $telepon) == TRUE){
            redirect(base_url()."perusahaan/detail_pemasang/".$id);
        }else{
            redirect(base_url()."perusahaan/detail_pemasang/".$id);
        }
    }
    //========================================================================================================
     function status_publish_pemasang($id_pemasang, $status)
    {   
        if ($status == 'true') {
            $status_publish = 'false';
            $status_notif = 'tidak dipublish';
        }elseif ($status == 'false'){
            $status_publish = 'true';
            $status_notif = 'dipublish';
        }
        $this->db->where('id_pemasang' , $id_pemasang);
        $this->db->update('perusahaan_pemasang' , array('status_publis_pemasang' => $status_publish));
        if ($this->db->affected_rows() > 0){
            $this->session->set_flashdata('notif' , true);
            $this->session->set_flashdata('teks_notif' , "Pemasang ".$status_notif);
            redirect(base_url()."perusahaan/detail_pemasang/".$id_pemasang);
        }else{
            $this->session->set_flashdata('notif' , false);
            redirect(base_url()."perusahaan/detail_pemasang/".$id_pemasang);
            $this->session->set_flashdata('teks_notif' , "Gagal merubah status publish");
        }
    }
     //=======================================DASHBOARD ADMIN=================================================
    function simpan_edit_gambar_pemasang(){

         $id = $this->input->post('id');
         $folder = $this->input->post('folder');
         unlink('upload_file/'.$this->session->userdata('folder').'/img/perusahaan/pemasang/'.$folder.'/profil.png');
          $_FILES["foto"]["name"];

            $config['upload_path'] = './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/pemasang/'.$folder.'/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
            $config['file_name'] = 'profil.png';
            $this->upload->initialize($config);
            $this->upload->do_upload('foto');
            $data = $this->upload->data();
                //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./upload_file/'.$this->session->userdata('folder').'/img/perusahaan/pemasang/'.$folder.'/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '100%';
                //$config['width']= 720;
                //$config['height']= 300;
            $config['new_image']= './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/pemasang/'.$folder.'/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
                //  echo base_url().'./upload_file/'.$this->session->userdata('folder').'/img/perusahaan/'.$data['file_name'];      
                //______________________________________________________________________________________________

            redirect(base_url()."perusahaan/detail_pemasang/".$id);
    }
    //========================================================================================================
    //=======================================DASHBOARD ADMIN=================================================
    function hapus_pemasang($id_pemasang, $folder)
    {   
        $this->db->where('id_pemasang' , $id_pemasang);
        $this->db->update('perusahaan_pemasang' , array('status_hapus_pemasang' => 'true'));
        if ($this->db->affected_rows() > 0){

            $files =glob('upload_file/'.$this->session->userdata('folder').'/img/perusahaan/pemasang/'.$folder.'/slide/*');
            foreach ($files as $file) {
                if (is_file($file))
                unlink($file); // hapus file
            }

            $this->session->set_flashdata('notif' , true);
            $this->session->set_flashdata('teks_notif' , "Pemasang berhasil dihapus");
            redirect(base_url()."perusahaan/Pemasang");
        }else{
            $this->session->set_flashdata('notif' , false);
            $this->session->set_flashdata('teks_notif' , "Pemasang gagal dihapus");
            redirect(base_url()."perusahaan/Pemasang");
        }
    }
    //========================================================================================================
     function simpan_portofolio_pemasang(){

        $id = $this->input->post('id');
        $nama_pekerjaan = $this->input->post('nama_pekerjaan');
        $ukuran_sistem = $this->input->post('ukuran_sistem');
        $folder_pemasang = $this->input->post('folder_pemasang');
        $_FILES["slide"]["name"];
        $new_folder_portofolio = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789'), 0, 7);
        date_default_timezone_set('Asia/Jakarta');
        $new_folder = 'portofolio_'.$new_folder_portofolio.'_'.date("d").''.date("m").''.date("y").''.date("H").''.date("i").''.date("s");



        mkdir("upload_file/".$this->session->userdata('folder')."/img/perusahaan/pemasang/".$folder_pemasang."/portofolio/".$new_folder);

        $filesCount = count($_FILES['slide']['name']);
        for($i = 0; $i < $filesCount; $i++){
            $new_name_generate = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789'), 0, 5);
            date_default_timezone_set('Asia/Jakarta');
            $new_name = 'portofolio_'.$new_name_generate.'_'.date("d").''.date("m").''.date("y").''.date("H").''.date("i").''.date("s");

            $_FILES['file']['name']     = $_FILES['slide']['name'][$i];
            $_FILES['file']['type']     = $_FILES['slide']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['slide']['tmp_name'][$i];
            $_FILES['file']['error']     = $_FILES['slide']['error'][$i];
            $_FILES['file']['size']     = $_FILES['slide']['size'][$i];
             
            // File upload configuration
            $config['upload_path'] = './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/pemasang/'.$folder_pemasang.'/portofolio/'.$new_folder;
                
            $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
            $config['file_name'] = $new_name.'.png';
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
                'id_pemasang' => $id,
                'nama_pekerjaan' => $nama_pekerjaan,
                'ukuran_sistem' => $ukuran_sistem,
                'folder' => $new_folder,
                'input_portofolio' => date('Y-m-d')
                );
           $this->db->insert('pemasang_portofolio',$data);
             
            $this->session->set_flashdata('notif' , true);
            $this->session->set_flashdata('teks_notif' , "Slide Berhasil ditambah");
        }

            redirect(base_url()."perusahaan/detail_pemasang/".$id);
    }
     //=======================================DASHBOARD ADMIN=================================================
    function simpan_edit_portofolio()
    {
        $id = $this->input->post('id');
        $id_portofolio = $this->input->post('id_portofolio');
        $nama_pekerjaan = $this->input->post('nama_pekerjaan');
        $ukuran_sistem = $this->input->post('ukuran_sistem');
        $data =array(
            'nama_pekerjaan' => $nama_pekerjaan,
            'ukuran_sistem' => $ukuran_sistem
        );
        $this->db->where('id_portofolio' , $id_portofolio);
        $this->db->update('pemasang_portofolio' , $data);
        if ($this->db->affected_rows() > 0){
            $this->session->set_flashdata('notif' , true);
            $this->session->set_flashdata('teks_notif' , "Portofolio berhasil diupdate");
            redirect(base_url()."perusahaan/detail_pemasang/".$id);
        }else{
            $this->session->set_flashdata('notif' , false);
            $this->session->set_flashdata('teks_notif' , "Portofolio gagal diupdate");
            redirect(base_url()."perusahaan/detail_pemasang/".$id);
        }
    }
    function simpan_slide_portofolio(){

        $id = $this->input->post('id');
        $folder = $this->input->post('folder');
        $_FILES["slide"]["name"];

        $filesCount = count($_FILES['slide']['name']);
        for($i = 0; $i < $filesCount; $i++){
            $new_name_generate = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789'), 0, 5);
            date_default_timezone_set('Asia/Jakarta');
            $new_name = 'portofolio_'.$new_name_generate.'_'.date("d").''.date("m").''.date("y").''.date("H").''.date("i").''.date("s");

            $_FILES['file']['name']     = $_FILES['slide']['name'][$i];
            $_FILES['file']['type']     = $_FILES['slide']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['slide']['tmp_name'][$i];
            $_FILES['file']['error']     = $_FILES['slide']['error'][$i];
            $_FILES['file']['size']     = $_FILES['slide']['size'][$i];
             
            // File upload configuration
            $config['upload_path'] = $folder;
                
            $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
            $config['file_name'] = $new_name.'.png';
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

            $this->session->set_flashdata('notif' , true);
            $this->session->set_flashdata('teks_notif' , "Slide Berhasil ditambah");
        }

            redirect(base_url()."perusahaan/detail_pemasang/".$id);
    }
    function simpan_sertifikat_pemasang()
    {

        $id_pemasang = $this->input->post('id_pemasang');
        $nama_sertifikat = $this->input->post('nama_sertifikat');
        $folder_pemasang = $this->input->post('folder_pemasang');
        $_FILES["sertifikat"]["name"];
        $new_name_generate = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789'), 0, 5);
            date_default_timezone_set('Asia/Jakarta');
        $new_name = 'sertifikat_'.$new_name_generate.'_'.date("d").''.date("m").''.date("y").''.date("H").''.date("i").''.date("s").'.png';

        if($this->M_perusahaan->simpan_sertifikat_pemasang($id_pemasang, $nama_sertifikat, $new_name) == TRUE){

            $config['upload_path'] = './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/pemasang/'.$folder_pemasang.'/sertifikat/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
            $config['file_name'] = $new_name;
            $this->upload->initialize($config);
            $this->upload->do_upload('sertifikat');
            $data = $this->upload->data();
                //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./upload_file/'.$this->session->userdata('folder').'/img/perusahaan/pemasang/'.$folder_pemasang.'/sertifikat/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '100%';
            //$config['width']= 720;
            //$config['height']= 300;
            $config['new_image']= './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/pemasang/'.$folder_pemasang.'/sertifikat/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
                    //  echo base_url().'./upload_file/'.$this->session->userdata('folder').'/img/perusahaan/'.$data['file_name'];      
                    //__________________________________________________________________________________________
            $this->session->set_flashdata('notif' , true);
            $this->session->set_flashdata('teks_notif' , "Sertifikat berhasil ditambah");
            redirect(base_url()."perusahaan/detail_pemasang/".$id_pemasang);
        }else{
            $this->session->set_flashdata('notif' , false);
            $this->session->set_flashdata('teks_notif' , "Sertifikat Gagal ditambahs");
            redirect(base_url()."perusahaan/detail_pemasang/".$id_pemasang);
        }
    }
    //========================================================================================================
    function hapus_sertifikat($id_pemasang, $id_sertifikat, $folder_pemasang, $sertifikat )
    {   
        $this->db->where('id_sertifikat', $id_sertifikat);
        $this->db->delete('pemasang_sertifikat');

        unlink("./upload_file/".$this->session->userdata('folder')."/img/perusahaan/pemasang/".$folder_pemasang."/sertifikat/".$sertifikat);

        redirect(base_url()."perusahaan/detail_pemasang/".$id_pemasang);
    }
    ////=======================================Pembelian=================================================
    function pembelian()
    {
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();

        $data['pembelian'] = $this->M_perusahaan->tampil_pembelian();
        
        $this->load->view('frontend/perusahaan/header', $data);
        $this->load->view('frontend/perusahaan/pembelian');
        $this->load->view('frontend/perusahaan/footer');
    }
    function detail_pembelian($id_order)
    {
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();

        $data['order'] = $this->M_perusahaan->detail_order($id_order);
        
        $this->load->view('frontend/perusahaan/header', $data);
        $this->load->view('frontend/perusahaan/pembelian_detail');
        $this->load->view('frontend/perusahaan/footer');
    }
    //========================================================================================================
      ////=======================================Pembelian=================================================
    function banner()
    {
        $data['lang'] = $this->Website->lang($this->session->userdata('lang')); //menampilkan meta title, keyword, deskripsi
        $data['medsos'] = $this->Website->medsosweb();

        $data['banner'] = $this->M_perusahaan->tampil_banner();
        
        $this->load->view('frontend/perusahaan/header', $data);
        $this->load->view('frontend/perusahaan/banner');
        $this->load->view('frontend/perusahaan/footer');
    }
    function simpan_banner()
    {
       if (isset($_POST['banner'])){
            redirect(base_url()."perusahaan/banner");
        }
        $ket_banner = $this->input->post('ket_banner');

        $generate = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789'), 0, 7);
        date_default_timezone_set('Asia/Jakarta');
        $new_name = 'banner_'.$generate.'_'.date("d").''.date("m").''.date("y").''.date("H").''.date("i").''.date("s").'.png';

        if($this->M_perusahaan->simpan_banner($ket_banner, $new_name) == TRUE){

            $_FILES["banner"]["name"];

            $config['upload_path'] = './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/banner/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
            $config['file_name'] = $new_name;
            $this->upload->initialize($config);
            $this->upload->do_upload('banner');
            $data = $this->upload->data();
                //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./upload_file/'.$this->session->userdata('folder').'/img/perusahaan/banner/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '100%';
                //$config['width']= 720;
                //$config['height']= 300;
            $config['new_image']= './upload_file/'.$this->session->userdata('folder').'/img/perusahaan/banner/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
                //  echo base_url().'./upload_file/'.$this->session->userdata('folder').'/img/perusahaan/'.$data['file_name'];      
                //______________________________________________________________________________________________
            $this->session->set_flashdata('notif' , true);
            $this->session->set_flashdata('teks_notif' , "Banner berhasil ditambah");
            redirect(base_url()."perusahaan/banner");
        }else{
            $this->session->set_flashdata('notif' , false);
            $this->session->set_flashdata('teks_notif' , "Banner gagal ditambah");
            redirect(base_url()."perusahaan/banner");
        }
    }
    
    
     //========================================================================================================
}

/* End of file Perusahaan.php */
/* Location: ./application/controllers/Perusahaan.php */