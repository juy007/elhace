<?php 
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Appadmin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
       	$this->load->library('upload');
        $this->load->library('encryption');
        $this->load->helper('security');
		$this->load->library('session');
        $this->load->model('Admin');

        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
    //==============DASHBOARD ADMIN======================
    function index()// halaman dashboard admin
    {
       $this->load->view('backend/admin/header');
        $this->load->view('backend/admin/index');
        $this->load->view('backend/admin/footer');
    }
    //===================================================
    //==============KELOLA ARTIKEL=======================
    function artikel()// halaman kelola artikel
    {   

        $page_data['artikel'] = $this->Admin->artikel();
        $this->load->view('backend/admin/header');
        $this->load->view('backend/admin/artikel',$page_data);
        $this->load->view('backend/admin/footer');
    }
    function detail_artikel($id_artikel)// halaman kelola artikel
    {
        //dekripsi id
        $id_artikel = $this->encrypt->decode(str_replace(array('-','_','~'),array('=','+','/'),$id_artikel));

        //jika id di url d ubah maka akan dicek disini
        $cek_id = $this->db->get_where('artikel' , array('id_artikel' => $id_artikel))->num_rows();
        if ($cek_id < 1) {
            redirect(base_url() . "appadmin/artikel");
        }
        //memanggil data artikel
        $page_data['artikel'] = $this->Admin->detail_artikel($id_artikel); 

        //memanggil nama user yang memposting
        $ambil_id_artikel = $this->db->get_where('artikel' , array('id_artikel' => $id_artikel))->result_array(); 
        foreach ($ambil_id_artikel as $row)
        $page_data['akun'] = $this->Admin->nama_akun($row['id_akun']);
        
        $this->load->view('backend/admin/header');
        $this->load->view('backend/admin/artikel_detail',$page_data);
        $this->load->view('backend/admin/footer');
    }
    function form_artikel()// halaman form tambah artikel
    {   
        $this->session->set_userdata('id_admin', '1');//sementara penggati login
        //====cek folder berdasarkan nama folder di database======
        $id_admin = $this->session->userdata('id_admin');
        $folder_gambar = $this->Admin->cekFolderGambar();
        $folder_terbaru = $folder_gambar->folder_terbaru;
        $folder_baru = $folder_terbaru+1;
        if (file_exists("./assets/gambar_artikel/admin/".$id_admin."/".$folder_baru)) { // cek folder 
            $files = glob('./assets/gambar_artikel/admin/'.$id_admin.'/'.$folder_baru.'/*'); //get all file names
            foreach($files as $file){
                if(is_file($file))
                unlink($file); //delete file
            }
            rmdir('assets/gambar_artikel/admin/'.$id_admin.'/'.$folder_baru);//buat folder
        }
        //========================================================
        $page_data['kategori'] = $this->Admin->kategori();
        $this->load->view('backend/admin/header');
        $this->load->view('backend/admin/artikel_form2' ,$page_data);
        $this->load->view('backend/admin/footer');
    }
    function simpan_artikel()// simpan artikel
    {
        $gambar = $this->input->post('gambar',TRUE);
        $judul = $this->input->post('judul',TRUE);
        $kategori = $this->input->post('kategori',TRUE);
        $artikel = $this->input->post('artikel'); // agar css bisa di input

        $folder_gambar = $this->Admin->cekFolderGambar();
        $folder_terbaru = $folder_gambar->folder_terbaru;
        $folder_baru = $folder_terbaru+1;

        if ($this->Admin->simpan_artikel($judul, $kategori, $artikel,$folder_baru) == TRUE) {
            $this->session->set_flashdata('notif' , true);
            $this->session->set_flashdata('teks_notif' , "Artikel berhasil ditambahkan");
            $this->session->set_flashdata('id_artikel' , $this->db->insert_id());
        }else{
            $this->session->set_flashdata('notif' , false);
            $this->session->set_flashdata('teks_notif' , "Artikrel gagal ditambahkan");
        }
        
        redirect(base_url() . "appadmin/form_artikel/". 'refresh');
    }
    function upload_gambar()//upload gambar disummernote
    {
        //==============cek folder berdasarkan id admin===========
        $id_admin = $this->session->userdata('id_admin');
        if (!file_exists("./assets/gambar_artikel/admin/".$id_admin)) { // cek folder 
            mkdir('assets/gambar_artikel/admin/'.$id_admin);//buat folder
        }
        //========================================================
        //====cek folder berdasarkan nama folder di database======
        $folder_gambar = $this->Admin->cekFolderGambar();
        $folder_terbaru = $folder_gambar->folder_terbaru;
        $folder_baru = $folder_terbaru+1;
        if (!file_exists("./assets/gambar_artikel/admin/".$id_admin."/".$folder_baru)) { // cek folder 
            mkdir('assets/gambar_artikel/admin/'.$id_admin.'/'.$folder_baru);//buat folder
        }
        //========================================================
        //=================upload gambar==========================
        //rmdir('assets/images/ok'); //hapus folder
        if(isset($_FILES["image"]["name"])){
            $config['upload_path'] = './assets/gambar_artikel/admin/'.$id_admin.'/'.$folder_baru;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('image')){
                $this->upload->display_errors();
                return FALSE;
            }else{
                $data = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/gambar_artikel/admin/'.$id_admin.'/'.$folder_baru.'/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '60%';
                $config['width']= 800;
                $config['height']= 800;
                $config['new_image']= './assets/gambar_artikel/admin/'.$id_admin.'/'.$folder_baru.'/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url().'assets/gambar_artikel/admin/'.$id_admin.'/'.$folder_baru.'/'.$data['file_name'];
            }
        }
        //========================================================
    }
    function form_edit($id_artikel)// halaman form tambah artikel
    {   
        $id_artikel = $this->encrypt->decode(str_replace(array('-','_','~'),array('=','+','/'),$id_artikel));

        //jika id di url d ubah maka akan dicek disini
        $cek_id = $this->db->get_where('artikel' , array('id_artikel' => $id_artikel))->num_rows();
        if ($cek_id < 1) {
            redirect(base_url() . "appadmin/artikel");
        }
        //memanggil data artikel
        $page_data['artikel'] = $this->Admin->detail_artikel($id_artikel); 

        //memanggil nama user yang memposting
        $ambil_id_artikel = $this->db->get_where('artikel' , array('id_artikel' => $id_artikel))->result_array(); 
        foreach ($ambil_id_artikel as $row)
        $page_data['akun'] = $this->Admin->nama_akun($row['id_akun']);
        
        $this->load->view('backend/admin/header');
        $this->load->view('backend/admin/artikel_form_edit',$page_data);
        $this->load->view('backend/admin/footer');
    }
    function hapus_gambar()//hapus gambar disummernote
    {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name)){
            echo 'File Delete Successfully';
        }
    }
    //===================================================
    //==============KELOLA KATEGORI======================
    function kategori()// halaman kelola kategori
    {
        $page_data['kategori'] = $this->Admin->kategori();
        $this->load->view('backend/admin/header');
        $this->load->view('backend/admin/kategori',$page_data);
        $this->load->view('backend/admin/footer');
    }
    function simpan_kategori()// simpan kategori
    {
        $kategori_baru = $this->input->post('kategori_baru',TRUE);
        $kategori_baru_notif = strtolower($kategori_baru);
        if ($this->Admin->simpan_kategori(strtolower($kategori_baru)) == TRUE) {
            $this->session->set_flashdata('notif' , true);
            $this->session->set_flashdata('teks_notif' , "Kategori <span style='font-weight: bold;'>".ucwords($kategori_baru_notif)."</span> berhasil ditambahkan");
        }else{
            $this->session->set_flashdata('notif' , false);
            $this->session->set_flashdata('teks_notif' , "Kategori <span style='font-weight: bold;'>".ucwords($kategori_baru_notif)."</span> gagal ditambahkan");
        }
        
        redirect(base_url() . "appadmin/kategori/". 'refresh');
    }
 
    function update_kategori()// update kategori
    {
        $id = $this->input->post('id',TRUE);
        $kategori_baru = $this->input->post('kategori_baru',TRUE);
        $kategori_lama = $this->input->post('kategori_lama',TRUE);
        $kategori_baru_notif = strtolower($kategori_baru);
        $kategori_lama_notif = strtolower($kategori_lama);
        if ($this->Admin->update_kategori(strtolower($kategori_baru),$id) == TRUE) {
            $this->session->set_flashdata('notif' , true);
            $this->session->set_flashdata('teks_notif' , "Kategori <span style='font-weight: bold;'>".ucwords($kategori_lama_notif)."</span> berhasil diupdate menjadi <span style='font-weight: bold;'>".ucwords($kategori_baru_notif)."</span>");
        }else{
            $this->session->set_flashdata('notif' , false);
            $this->session->set_flashdata('teks_notif' , "Kategori <span style='font-weight: bold;'>".ucwords($kategori_lama_notif)."</span> gagal diupdate menjadi <span style='font-weight: bold;'>".ucwords($kategori_baru_notif)."</span>");
        }
        redirect(base_url() . "appadmin/kategori/". 'refresh');
    }
    function hapus_kategori($id_kategori, $jenis_kategori)// hapus kategori
    {
        $kategori_baru_notif = strtolower($jenis_kategori);
        if ($this->Admin->hapus_kategori($id_kategori) == TRUE) {
            $this->session->set_flashdata('notif' , true);
            $this->session->set_flashdata('teks_notif' , "Kategori <span style='font-weight: bold;'>".ucwords($kategori_baru_notif)."</span> berhasil dihapus");
        }else{
            $this->session->set_flashdata('notif' , false);
            $this->session->set_flashdata('teks_notif' , "Kategori <span style='font-weight: bold;'>".ucwords($kategori_baru_notif)."</span> gagal dihapus");
        }                             
        redirect(base_url() . "appadmin/kategori/". 'refresh');
    }
    //===================================================
}
 ?>