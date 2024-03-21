<?php 
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Administrator extends CI_Controller
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
        $this->load->model('Admin');

        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
    //=======================================DASHBOARD ADMIN=================================================
    function index()// halaman dashboard admin
    {
        if ($this->session->userdata('admin_login') != 'TRUE')
            redirect(base_url().'administrator/login', 'refresh');
        $this->load->view('backend/admin/header');
        $this->load->view('backend/admin/index');
        $this->load->view('backend/admin/footer');
    }
    //=======================================================================================================
    //========================================ARTIKEL========================================================
    function artikel()// halaman artikel
    {
        $data['artikel'] = $this->Admin->artikel();
        $this->load->view('backend/admin/header');
        $this->load->view('backend/admin/artikel',$data);
        $this->load->view('backend/admin/footer');
    }

    function tambah_artikel()// form tambah artikel
    {
        $data['folder_img'] = $this->Admin->cekFolderGambarArtikel();//cek folder gambar di database

        foreach ($data['folder_img'] as $key => $folder_img);// menampikan foler
        $folder_imgnew = $folder_img+1;//nama folder di tambah 1

        if (file_exists("assets/upload_artikel/".$folder_imgnew)) { // cek folder 
            $files = glob("assets/upload_artikel/".$folder_imgnew."/*"); //get all file names
            foreach($files as $file){
                if(is_file($file))
                unlink($file); //delete file
        }
            rmdir("assets/upload_artikel/".$folder_imgnew);//hapus folder      
        }
        mkdir("assets/upload_artikel/".$folder_imgnew);//buat folder

        $this->load->view('backend/admin/header');
        $this->load->view('backend/admin/artikel_form',$data);
        $this->load->view('backend/admin/footer');
    }
    function simpan_artikel()// simmpan artikel
    {

        $sumber_gambar = $this->input->post('sumber_gambar',TRUE);
        $judul = $this->input->post('judul',TRUE);
        $kategori = $this->input->post('kategori',TRUE);
        $artikel = $this->input->post('artikel');
        $status = "1";
        $folder_img = $this->input->post('folder_img');
        
         if(isset($_FILES["gambar"]["name"])){
                $config['upload_path'] = './assets/upload_artikel/'.$folder_img;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('gambar')){
                    $this->upload->display_errors();
                    return FALSE;
                }else{
                    $data = $this->upload->data();
                //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./assets/upload_artikel/'.$folder_img.'/'.$data['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= TRUE;
                    $config['quality']= '100%';
                    $config['width']= 720;
                    $config['height']= 300;
                    $config['new_image']= './assets/upload_artikel/'.$folder_img.'/'.$data['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    echo base_url().'assets/upload_artikel/'.$folder_img.'/'.$data['file_name'];
                }
            }

        $gambar = $data['file_name'];

        if ($this->Admin->simpan_artikel($judul,$gambar, $sumber_gambar, $kategori, $artikel, $status, $folder_img) == TRUE) {
                $this->session->set_flashdata('notif' , true);
                $this->session->set_flashdata('teks_notif' , "Artikel berhasil ditambahkan");
            }else{
                $this->session->set_flashdata('notif' , false);
                $this->session->set_flashdata('teks_notif' , "Artikrel gagal ditambahkan");
            }
        
        redirect(base_url() . "Administrator/tambah_artikel/". 'refresh');
    }
    
    function upload_froala()
    {

        $data['folder_img'] = $this->Admin->cekFolderGambarArtikel();//cek folder gambar di database

        foreach ($data['folder_img'] as $key => $folder_img);// menampikan foler
        $folder_imgnew = $folder_img+1;//nama folder di tambah 1

        try {

          // File Route.
          $fileRoute = 'assets/upload_artikel/';

          $fieldname = 'file';

          // Get filename.
          $filename = explode(".", $_FILES[$fieldname]["name"]);

          // Validate uploaded files.
          // Do not use $_FILES["file"]["type"] as it can be easily forged.
          $finfo = finfo_open(FILEINFO_MIME_TYPE);

          // Get temp file name.
          $tmpName = $_FILES[$fieldname]["tmp_name"];

          // Get mime type.
          $mimeType = finfo_file($finfo, $tmpName);

          // Get extension. You must include fileinfo PHP extension.
          $extension = end($filename);

          // Allowed extensions.
          $allowedExts = array('gif', 'jpeg', 'jpg', 'png', 'svg', 'blob');

          // Allowed mime types.
          $allowedMimeTypes = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png', 'image/svg+xml');

          // Validate image.
          if (!in_array(strtolower($mimeType), $allowedMimeTypes) || !in_array(strtolower($extension), $allowedExts)) {
            throw new \Exception('File does not meet the validation.');
          }

          // Generate new random name.
          $name = sha1(microtime()) . "." . $extension;
          $fullNamePath = $fileRoute . $name;

          // Save file in the uploads folder.
          move_uploaded_file($tmpName, $fullNamePath);

          // Generate response.
          $response = new \StdClass;
          $response->link = $fileRoute . $name;

          // Send response.
          echo stripslashes(json_encode($response));
        } catch (Exception $e) {

          // Send error response.
          echo $e->getMessage();
          http_response_code(404);
        }
    }
    function detail_artikel($id_artikel)// halaman kelola artikel
    {
        //jika id di url d ubah maka akan dicek disini
        $cek_id = $this->db->get_where('artikel' , array('id_artikel' => $id_artikel))->num_rows();
        if ($cek_id < 1) {
            redirect(base_url() . "administrator/artikel");
        }
        //memanggil data artikel
        $data['artikel'] = $this->Admin->detail_artikel($id_artikel); 

        
        $this->load->view('backend/admin/header');
        $this->load->view('backend/admin/artikel_detail',$data);
        $this->load->view('backend/admin/footer');
    }
     function hapus_artikel($id_artikel, $folder_img)// hapus kategori
    {
        if ($this->Admin->hapus_artikel($id_artikel) == TRUE) {
            $files = glob("assets/upload_artikel/".$folder_img."/*"); //get all file names
            foreach($files as $file){
                if(is_file($file))
                unlink($file); //delete file
            }
            rmdir("assets/upload_artikel/".$folder_img);//hapus folder   

            $this->session->set_flashdata('notif' , true);
            $this->session->set_flashdata('teks_notif' , "Kategori <span style='font-weight: bold;'>".ucwords($kategori_baru_notif)."</span> berhasil dihapus");
        }else{
            $this->session->set_flashdata('notif' , false);
            $this->session->set_flashdata('teks_notif' , "Kategori <span style='font-weight: bold;'>".ucwords($kategori_baru_notif)."</span> gagal dihapus");
        }                             
        redirect("administrator/artikel/");
    }
    //=======================================================================================================
    //==========================================ADMIN========================================================
    function admin()
    {
        $data['admin'] = $this->Admin->admin();
        $this->load->view('backend/admin/header');
        $this->load->view('backend/admin/admin',$data);
        $this->load->view('backend/admin/footer');
    }
     function simpan_admin()// simmpan artikel
    {

        $nama = $this->input->post('nama',TRUE);
        $username = $this->input->post('username',TRUE);
        $password = sha1($this->input->post('password'));
        $level = $this->input->post('level');
        
        if ($this->Admin->simpan_admin($nama,$username, $password, $level) == TRUE) {
                $this->session->set_flashdata('notif' , true);
                $this->session->set_flashdata('teks_notif' , "Admin berhasil ditambahkan");
            }else{
                $this->session->set_flashdata('notif' , false);
                $this->session->set_flashdata('teks_notif' , "Admin gagal ditambahkan");
            }
        
        redirect(base_url() . "administrator/admin/");
    }
    function update_admin()// update admin
    {
        $id_admin = $this->input->post('id_admin',TRUE);
        $nama = $this->input->post('nama',TRUE);
        $username = $this->input->post('username',TRUE);
        $password = sha1($this->input->post('password'));
        $level = $this->input->post('level');
        if ($this->Admin->update_admin($id_admin, $nama,$username, $password, $level) == TRUE) {
                $this->session->set_flashdata('notif' , true);
                $this->session->set_flashdata('teks_notif' , "Admin berhasil diupdate");
            }else{
                $this->session->set_flashdata('notif' , false);
                $this->session->set_flashdata('teks_notif' , "Admin gagal diupdate");
            }
        redirect(base_url() . "administrator/admin/");
    }
      function hapus_admin($id_admin)// hapus admin
    {
        if ($this->Admin->hapus_admin($id_admin) == TRUE) {  

                $this->session->set_flashdata('notif' , true);
                $this->session->set_flashdata('teks_notif' , "Admin berhasil dihapus");
            }else{
                $this->session->set_flashdata('notif' , false);
                $this->session->set_flashdata('teks_notif' , "Admin gagal dihapus");
            }
                         
        redirect("administrator/admin/");
    }
    
    //=======================================================================================================
     //==========================================ADMIN========================================================
    function rekening()
    {
        $data['rekening'] = $this->Admin->tampil_rekening();
        $this->load->view('backend/admin/header');
        $this->load->view('backend/admin/rekening',$data);
        $this->load->view('backend/admin/footer');
    }
     function simpan_rekening()// simmpan artikel
    {

        $nama_rekening = $this->input->post('nama_rekening',TRUE);
        $nomor_rekening = $this->input->post('nomor_rekening',TRUE);
        $bank = $this->input->post('bank');
        
        if ($this->Admin->simpan_rekening($nama_rekening, $bank, $nomor_rekening) == TRUE) {
                $this->session->set_flashdata('notif' , true);
                $this->session->set_flashdata('teks_notif' , "Rekening berhasil ditambahkan");
            }else{
                $this->session->set_flashdata('notif' , false);
                $this->session->set_flashdata('teks_notif' , "Rekening gagal ditambahkan");
            }
        
        redirect(base_url() . "administrator/rekening/");
    }
    function update_rekening()// update admin
    {
        $id_rekening = $this->input->post('id_rekening',TRUE);
        $nama_rekening = $this->input->post('nama_rekening',TRUE);
        $nomor_rekening = $this->input->post('nomor_rekening',TRUE);
        $bank = $this->input->post('bank');
        
        if ($this->Admin->update_rekening($id_rekening, $nama_rekening,$nomor_rekening, $bank) == TRUE) {
                $this->session->set_flashdata('notif' , true);
                $this->session->set_flashdata('teks_notif' , "Rekening berhasil diupdate");
            }else{
                $this->session->set_flashdata('notif' , false);
                $this->session->set_flashdata('teks_notif' , "Rekening gagal diupdate");
            }
        
        redirect(base_url() . "administrator/rekening/");
    }
      function hapus_rekening($id_rekening)// hapus admin
    {
        if ($this->Admin->hapus_rekening($id_rekening) == TRUE) {  

                $this->session->set_flashdata('notif' , true);
                $this->session->set_flashdata('teks_notif' , "Rekening berhasil dihapus");
            }else{
                $this->session->set_flashdata('notif' , false);
                $this->session->set_flashdata('teks_notif' , "Rekening gagal dihapus");
            }
                         
        redirect(base_url()."administrator/rekening/");
    }
    
    //=======================================================================================================
    //==========================================MEDIA SOSIAL=================================================
      function media_sosial()
    {

        $data['email'] = $this->Admin->media_sosial('email');
        $data['facebook'] = $this->Admin->media_sosial('facebook');
        $data['instagram'] = $this->Admin->media_sosial('instagram');
        $data['linkedin'] = $this->Admin->media_sosial('linkedin');
        $data['pinterest'] = $this->Admin->media_sosial('pinterest');
        $data['telegram'] = $this->Admin->media_sosial('telegram');
        $data['telepon'] = $this->Admin->media_sosial('telepon');
        $data['twitter'] = $this->Admin->media_sosial('twitter');
        $data['whatsapp'] = $this->Admin->media_sosial('whatsapp');
        $data['youtube'] = $this->Admin->media_sosial('youtube');
        $this->load->view('backend/admin/header');
        $this->load->view('backend/admin/media_sosial',$data);
        $this->load->view('backend/admin/footer');
    }
     function update_medsos()// update medsos
    {
       $email = $this->Admin->update_medsos('email', $this->input->post('email',TRUE));
       $facebook = $this->Admin->update_medsos('facebook', $this->input->post('facebook',TRUE));
       $instagram = $this->Admin->update_medsos('instagram', $this->input->post('instagram',TRUE));
       $linkedin = $this->Admin->update_medsos('linkedin', $this->input->post('linkedin',TRUE));
       $pinterest = $this->Admin->update_medsos('pinterest', $this->input->post('pinterest',TRUE));
       $telegram = $this->Admin->update_medsos('telegram', $this->input->post('telegram',TRUE));
       $twitter = $this->Admin->update_medsos('twitter', $this->input->post('twitter',TRUE));
       $whatsapp = $this->Admin->update_medsos('whatsapp', $this->input->post('whatsapp',TRUE));
       $youtube = $this->Admin->update_medsos('youtube', $this->input->post('youtube',TRUE));

       if ($email == TRUE || $facebook == TRUE || $instagram == TRUE || $linkedin == TRUE || $pinterest == TRUE || $telegram == TRUE || $telepon == TRUE || $twitter == TRUE || $whatsapp == TRUE || $youtube == TRUE) {  

                $this->session->set_flashdata('notif' , true);
                $this->session->set_flashdata('teks_notif' , "Media Sosial & Kontak berhasil diupdate");
            }else{
                $this->session->set_flashdata('notif' , false);
                $this->session->set_flashdata('teks_notif' , "Media Sosial & Kontak gagal diupdate");
            }
       
        redirect(base_url() . "administrator/media_sosial");
    }
    //========================================================================================================
    //==========================================WEBSITE========================================================
    function website()
    {

        $data['website'] = $this->Admin->website();
        $this->load->view('backend/admin/header');
        $this->load->view('backend/admin/website',$data);
        $this->load->view('backend/admin/footer');
    }
     function update_website()// update medsos
    {
        $jenis = $this->input->post('jenis',TRUE);
        if ($jenis == 'alamat') {
            $alamat = $this->input->post('alamat',TRUE);
            $cekPost = $this->Admin->update_website($jenis, $alamat);
        }elseif ($jenis == 'meta') {
            $meta_description = $this->input->post('meta_description',TRUE);
            $meta_keyword = $this->input->post('meta_keyword',TRUE);
            $cekPost = $this->Admin->update_website($jenis, $meta_description, $meta_keyword);
        }
    
       if ($cekPost == TRUE) {  
                $this->session->set_flashdata('notif' , true);
                $this->session->set_flashdata('teks_notif' , "Update Berhasil");
            }else{
                $this->session->set_flashdata('notif' , false);
                $this->session->set_flashdata('teks_notif' , "Update Gagal ");
            }
       
        redirect(base_url() . "administrator/website");
    }
    //========================================================================================================
    //==========================================LOGIN========================================================
    function login()// halaman dashboard admin
    {
        if ($this->session->userdata('pageLoginAdmin') != 'TRUE')
            redirect(base_url().'home', 'refresh');
        $this->load->view('backend/admin/login');
    }
    function ajax_validate_login()
    {
        $data = array(
            'username'=>$this->input->post('username'),
            'password'=>sha1($this->input->post('password'))
        );
      // Checking login credential for admin
     $query = $this->db->get_where('admin', $data);
      if ($query->num_rows() > 0) {
          $row = $query->row();
          echo "TRUE";
      }else{
            echo "FALSE";
      }
    }
    function validate_login() 
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
       // $password = $this->input->post('password');
        $credential = array('username' => $username, 'password' => sha1($password));
          // Checking login credential for admin
        $query = $this->db->get_where('admin', $credential);
        $row = $query->row();

        $this->session->set_userdata('admin_login', 'TRUE');
        $this->session->set_userdata('id_admin', $row->id_admin);
        $this->session->set_userdata('name', $row->nama);
        $this->session->set_userdata('username', $row->username);
        $this->session->set_userdata('pass', $row->password);
        $this->session->set_userdata('level', $row->level);
        redirect(base_url(). 'administrator');
    }
    function logout(){
        //$this->session->unset_tempdata('item');
        $this->session->sess_destroy();
        redirect(base_url() . 'setadmin');
    } 

    //=======================================================================================================
    //========================================perusahaan========================================================
    function user_baru()// halaman artikel
    {
        $data['user'] = $this->Admin->tampil_user_baru();
        $this->load->view('backend/admin/header',$data);
        $this->load->view('backend/admin/user_baru');
        $this->load->view('backend/admin/footer');
    } 
    function user()// halaman artikel
    {
        $data['user'] = $this->Admin->tampil_user_terverifikasi();
        $this->load->view('backend/admin/header',$data);
        $this->load->view('backend/admin/user');
        $this->load->view('backend/admin/footer');
    }
     function detail_user($id_user)// halaman artikel
    {
       
        $get_user = $this->db->get_where('user_view', array('id_user_view'=> $id_user));
        $data['user']=  $get_user->row();

        $this->load->view('backend/admin/header',$data);
        $this->load->view('backend/admin/user_detail');
        $this->load->view('backend/admin/footer');
    }
    //========================================perusahaan========================================================
    function perusahaan_baru()// halaman artikel
    {
        $data['perusahaan'] = $this->Admin->tampil_perusahaan_baru();
        $this->load->view('backend/admin/header',$data);
        $this->load->view('backend/admin/perusahaan');
        $this->load->view('backend/admin/footer');
    }
     function perusahaan_terverifikasi()// halaman artikel
    {
        $data['perusahaan'] = $this->Admin->tampil_perusahaan_terverifikasi();
        $this->load->view('backend/admin/header',$data);
        $this->load->view('backend/admin/perusahaan');
        $this->load->view('backend/admin/footer');
    }
      //========================================perusahaan========================================================
    function produk()// halaman artikel
    {
        $data['produk'] = $this->Admin->tampil_produk();
        $this->load->view('backend/admin/header',$data);
        $this->load->view('backend/admin/produk');
        $this->load->view('backend/admin/footer');
    }
    function pemasang_baru()// halaman artikel
    {
        $data['pemasang'] = $this->Admin->tampil_pemasang_baru();
        $this->load->view('backend/admin/header',$data);
        $this->load->view('backend/admin/pemasang_baru');
        $this->load->view('backend/admin/footer');
    }
    function pemasang()// halaman artikel
    {
        $data['pemasang'] = $this->Admin->tampil_pemasang();
        $this->load->view('backend/admin/header',$data);
        $this->load->view('backend/admin/pemasang');
        $this->load->view('backend/admin/footer');
    }
     
}
?>