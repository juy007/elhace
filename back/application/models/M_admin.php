<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_admin extends CI_Model {
 	function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

  	function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
      
    }

    

    function validation_login($username, $password)
    {
        $this->db->where('username' , $username);
        $this->db->where('password' , sha1($password));
        return $this->db->get('admin')->result_array();
    }

    function validation_forgot($email)
    {
        $this->db->where('email' , $email);
        return $this->db->get('admin')->result_array();
    }

    function delete_otp($id_admin)
    {
        $this->db->where('id_admin', $id_admin);
        $this->db->delete('admin_otp');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function new_password_save($email, $repassword)
    {
         $data = array(
            'password' => sha1($repassword)
        );   
        $this->db->where('email' , $email);
        $this->db->update('admin' , $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function save_login($id_admin)
    {
        $data = array(
            'id_admin' => $id_admin,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'access_date' => date('Y-m-d'),
            'time' => date('H:i:s')
        );
        $this->db->insert('login_history',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function save_news($category, $news_title, $meta_description, $meta_keyword, $news_text, $news_views, $news_status, $news_folder, $tag, $created_date, $updated_date)
    {
        date_default_timezone_set('Asia/Jakarta');
        $number_news = 'news'.date('YmdHis');
        $data = array(
            'id_news_category'=> $category,
            'number_news' => $number_news,
            'meta_description' => $meta_description,
            'meta_keyword' => $meta_keyword,
            'news_title' => $news_title,
            'news_text' => $news_text,
            'news_views' =>  $news_views,
            'create_date' => $created_date,
            //'updated_date' => $updated_date,
            'news_status' => $news_status,
            'news_folder' => $news_folder,
            'url_slug'  => strtolower(url_title(str_replace("_","-",str_replace(".","-",$news_title))))
        );
        $this->db->insert('news',$data);
        
        if (!empty($tag)) {
           
            $tag_array=explode(',', $tag);            
            foreach ($tag_array as $key => $value_tag) {
                $data_tag = array(
                    'number_news' => $number_news,
                    'tagar' => $value_tag,
                    'tag_slug'  => strtolower(url_title(str_replace("_","-",str_replace(".","-",$value_tag))))
                );
                $this->db->insert('news_tag',$data_tag);
            }
        }
        
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function save_news_update($id_news, $news_title, $meta_description, $meta_keyword, $news_text, $created_date, $updated_date)
    {
        $data = array(
            'meta_description' => $meta_description,
            'meta_keyword' => $meta_keyword,
            'news_title' => $news_title,
            'news_text' => $news_text,
            'create_date' => $created_date,
            'updated_date' => $updated_date,
            'url_slug'  => strtolower(url_title($news_title))
        );   
        $this->db->where('id_news' , $id_news);
        $this->db->update('news' , $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function read_news()
    {
        //$this->db->order_by('id_news', 'DESC');
        //return $this->db->get('news')->result_array();

        $this->db->select('*');
        $this->db->from('news');
        $this->db->join('news_category','news_category.id_news_category = news.id_news_category');
        $this->db->order_by('id_news', 'DESC');
        return $this->db->get()->result_array();
    }

    function news_status_update($id_news, $news_status)
    {
        $data = array(
            'news_status' => $news_status
        );   
        $this->db->where('id_news' , $id_news);
        $this->db->update('news' , $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function news_select($id_news)
    {
        $this->db->select('*');
        $this->db->from('news');
        $this->db->join('news_category','news_category.id_news_category = news.id_news_category');
        $this->db->where('id_news', $id_news);
        return $this->db->get()->row();
    }

     function news_delete($id_news)
    {
        $this->db->where('id_news', $id_news);
        $this->db->delete('news');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function news_category_read()
    {
        $this->db->order_by('id_news_category', 'DESC');
        return $this->db->get('news_category')->result_array();
    }

    function save_news_category($category)
    {
        $data = array(
            'news_category_name' => $category
        );
        $this->db->insert('news_category',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

     function save_news_category_update($id_news_category, $category)
    {
        $data = array(
            'news_category_name' => $category
        );   
        $this->db->where('id_news_category' , $id_news_category);
        $this->db->update('news_category' , $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function news_category_delete($id)
    {
        $this->db->where('id_news_category', $id);
        $this->db->delete('news_category');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function portfolio_read()
    {
        $this->db->select('*');
        $this->db->from('portfolio');
        $this->db->join('portfolio_category','portfolio_category.id_category = portfolio.id_category');
        $this->db->order_by('id_portfolio', 'DESC');
        return $this->db->get()->result_array();
    }

    function portfolio_category_read()
    {
        $this->db->order_by('id_category', 'DESC');
        return $this->db->get('portfolio_category')->result_array();
    }

    function save_portfolio($category, $meta_description, $meta_keyword, $title, $image_name, $description, $create_date, $publish_status)
    {
        $url_slug = str_replace(".","-",$image_name);
        $data = array(
            'id_category' => $category,
            'meta_description'=> substr($meta_description,0,499),
            'meta_keyword'=> $meta_keyword,
            'title'=> $title,
            'image' => $image_name,
            'description' => $description,
            'create_date' => $create_date,
            'portfolio_status' => $publish_status,
            'url_slug'  => strtolower(url_title(str_replace("_","-",$url_slug)))
        );
        $this->db->insert('portfolio',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function save_portfolio_update($id_portfolio ,$category, $meta_description, $meta_keyword, $title, $image_name, $description, $create_date, $updated_date)
    {
    
        $data = array(
            'id_category' => $category,
            'meta_description'=> substr($meta_description,0,499),
            'meta_keyword'=> $meta_keyword,
            'title'=> $title,
            'image' => $image_name,
            'description' => $description,
            'create_date' => $create_date,
            'updated_date'=> $updated_date
        );
        $this->db->where('id_portfolio' , $id_portfolio);
        $this->db->update('portfolio' , $data);
         return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function save_category($category)
    {
        $data = array(
            'category_name' => $category
        );
        $this->db->insert('portfolio_category',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function save_category_update($id_category, $category)
    {
        $data = array(
            'category_name' => $category
        );   
        $this->db->where('id_category' , $id_category);
        $this->db->update('portfolio_category' , $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function portfolio_category_delete($id)
    {
        $this->db->where('id_category', $id);
        $this->db->delete('portfolio_category');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function portfolio_status_update($id_portfolio, $portfolio_status)
    {
        $data = array(
            'portfolio_status' => $portfolio_status
        );   
        $this->db->where('id_portfolio' , $id_portfolio);
        $this->db->update('portfolio' , $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

     function portfolio_delete($id_portfolio)
    {
        $this->db->where('id_portfolio', $id_portfolio);
        $this->db->delete('portfolio');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function save_meta($meta_description, $meta_keyword)
    {
        $data = array(
            'meta_description' => $meta_description,
            'meta_keyword' => $meta_keyword
        );
        $this->db->where('id_website' , '1');
        $this->db->update('website' , $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function save_social_media($email, $facebook, $twitter, $instagram)
    {
        $data = array(
            'email_link' => $email,
            'facebook_link' => $facebook,
            'twitter_link'   => $twitter,
            'instagram_link' => $instagram
        );
        $this->db->where('id_website' , '1');
        $this->db->update('website' , $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function save_embed_map($embed_map)
    {
        $data = array(
            'embed_map' => $embed_map
        );
        $this->db->where('id_website' , '1');
        $this->db->update('website' , $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function save_footer($footer)
    {
        $data = array(
            'footer' => $footer
        );
        $this->db->where('id_website' , '1');
        $this->db->update('website' , $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function save_setting($name, $email, $username, $id_admin)
    {
         $data = array(
            'nama_admin' => $name,
            'email' => $email,
            'username'=> $username
        );
        $this->db->where('id_admin' , $id_admin);
        $this->db->update('admin' , $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    
    }
    function save_setting_password($pass, $id_admin)
    {
         $data = array(
            'password' => sha1($pass)
        );
        $this->db->where('id_admin' , $id_admin);
        $this->db->update('admin' , $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    
    }

    function visitor_today()
    {
        $this->db->where('access_date' , date('Y-m-d'));
        return $this->db->get('traffic')->result_array();
    }
     function visitor_month($tgl_awal, $tgl_akhir)
    {
        $this->db->where('access_date >=',$tgl_awal);
        $this->db->where('access_date <=',$tgl_akhir);
        return $this->db->get('traffic')->result_array();
    }
    function news_view_today()
    {
        $this->db->where('access_date' , date('Y-m-d'));
        return $this->db->get('news_view')->result_array();
    }
    function portfolio_view_today()
    {
        $this->db->where('access_date' , date('Y-m-d'));
        return $this->db->get('portfolio_view')->result_array();
    }

    function email_admin()
    {
        $this->db->where('id_website' , '1');
        return $this->db->get('website')->row();
    }

    function check_email_message($email)
    {
        $this->db->where('email', $email);
        $this->db->where('create', date('Y-m-d'));
        return $this->db->get('email_message')->result_array();   
    }
    //=================================================================================================
    //===========================================ARTIKEL================================================
    function artikel()
    {   $this->db->order_by('id_artikel', 'DESC');
        return $this->db->get('artikel')->result_array();
    }
    function cekFolderGambarArtikel() //mengambil folder gambar terbaru
    {
        $this->db->select_max('folder_img','folder_terbaru');
        $query = $this->db->get('artikel');
        return $query->row();   
    }
     function simpan_artikel($judul,$gambar, $sumber_gambar, $kategori, $artikel, $status, $folder_img)
    {
        $status_artikel = 'verifikasi';
        $tgl_post = date('d/m/Y');
        $data = array(
            'judul' => $judul,
            'baner' => $gambar,
            'kategori' => $kategori,
            'sumber_gambar' => $sumber_gambar,
            'teks' => $artikel,
            'tgl_post' => $tgl_post,
            'status' => $status,
            'folder_img' => $folder_img,
            'input_artikel'=>date("Y-m-d")
        );
        $this->db->insert('artikel',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
     function detail_artikel($id_artikel) //menampilkan detail artikel
    {
        $this->db->where('id_artikel' , $id_artikel);
        return $this->db->get('artikel')->result_array();
    }
     function hapus_artikel($id_artikel)
    {
        $this->db->where('id_artikel', $id_artikel);
        $this->db->delete('artikel');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function simpan_update_artikel($id_artikel, $judul,$gambar, $sumber_gambar, $kategori, $artikel, $status, $folder_img)
    {

        if (empty($gambar)) {
             $data = array(
                'judul' => $judul,
                'kategori' => $kategori,
                'sumber_gambar' => $sumber_gambar,
                'teks' => $artikel
            );   
            $this->db->where('id_artikel' , $id_artikel);
            $this->db->update('artikel' , $data);
            return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
        }else{
            $data = array(
                'judul' => $judul,
                'baner' => $gambar,
                'kategori' => $kategori,
                'sumber_gambar' => $sumber_gambar,
                'teks' => $artikel
            );   
            $this->db->where('id_artikel' , $id_artikel);
            $this->db->update('artikel' , $data);
            return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
        }
     
    }

    //=================================================================================================
     function publikasi()
    {
        return $this->db->get('publikasi')->result_array();
    }
     function detail_publikasi($id_publikasi) //menampilkan detail artikel
    {
        $this->db->where('id_publikasi' , $id_publikasi);
        return $this->db->get('publikasi')->row();
    }
    function simpan_publikasi($judul,$teks,$folder, $dokumen)
    {
            $data = array(
            'judul_publikasi' => $judul,
            'teks' => $teks,
            'link_dokumen' => $folder,
            'dokumen' => $dokumen,
            'input_publikasi'=>date("Y-m-d")
        );
        $this->db->insert('publikasi',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function simpan_update_publikasi($id_publikasi,$judul,$teks)
    {
         $data = array(
           'judul_publikasi' => $judul,
            'teks' => $teks
        );
        $this->db->where('id_publikasi' , $id_publikasi);
        $this->db->update('publikasi' , $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }


     function hapus_publikasi($id_publikasi)
    {
        $this->db->where('id_publikasi', $id_publikasi);
        $this->db->delete('publikasi');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    //============================================ADMIN================================================
    function admin()//menampilkan data admin
    {
        return $this->db->get('admin')->result_array();
    }
      function simpan_admin($nama,$username, $password, $level)//menyimpan data admin
    {
        $tgl_dibuat = date('d/m/Y');
        $data = array(
            'nama_admin' => $nama,
            'username' => $username,
            'password' => $password,
            'level' => $level,
            'tgl_dibuat' => $tgl_dibuat
        );
        $this->db->insert('admin',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function update_admin($id_admin, $nama,$username, $password, $level)//mengupate data admin
    {
        $data = array(
            'nama_admin' => $nama,
            'username' => $username,
            'password' => $password,
            'level' => $level
        );
        $this->db->where('id_admin' , $id_admin);
        $this->db->update('admin' , $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
       function hapus_admin($id_admin)//menghapus data admin
    {
        $this->db->where('id_admin', $id_admin);
        $this->db->delete('admin');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    //=================================================================================================
    function tampil_rekening()
    {   
        $this->db->ORDER_BY('bank', 'DESC');
        return $this->db->get('rekening')->result_array();
    }
     function simpan_rekening($nama_rekening,$bank, $nomor_rekening)//menyimpan data admin
    {
        $data = array(
            'nama_rekening' => $nama_rekening,
            'bank' => $bank,
            'nomor_rekening' => $nomor_rekening,
            'input_rekening' => date('Y-m-d')
        );
        $this->db->insert('rekening',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
     function update_rekening($id_rekening,$nama_rekening,$nomor_rekening, $bank)//mengupate data admin
    {
        $data = array(
            'nama_rekening' => $nama_rekening,
            'nomor_rekening' => $nomor_rekening,
            'bank' => $bank
        );
        $this->db->where('id_rekening' , $id_rekening);
        $this->db->update('rekening' , $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
       function hapus_rekening($id_rekening)//menghapus data admin
    {
        $this->db->where('id_rekening', $id_rekening);
        $this->db->delete('rekening');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    //============================================MEDIA SOSIAL=========================================
     function media_sosial($nama_medos)//menampilkan data medsos
    {
        $this->db->where('nama' , $nama_medos);
        return $this->db->get('media_sosial')->result_array();
    }
     function update_medsos($nama, $link)//mengupate data medoso
    {
        $data = array(
            'link' => $link
        );
        $this->db->where('nama' , $nama);
        $this->db->update('media_sosial' , $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
     //=================================================================================================
    //============================================WEBSITE================================================
      function website() //menampilkan detail artikel
    {
        $this->db->where('id_website' , '1');
        return $this->db->get('website')->result_array();
    }
    function update_website($jenis, $data1, $data2)//mengupate data medoso
    {
        if($jenis == 'alamat') {
            $data = array(
            'alamat' => $data1
            );
        }elseif($jenis == 'meta') {
            $data = array(
            'meta_description' => $data1,
            'meta_keyword' => $data2
            );
        }
        
        $this->db->where('id_website' , '1');
        $this->db->update('website' , $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }



    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  
   
    function nama_akun($id_akun) // mengambil nama user untuk di detail artikel
    {
        $this->db->where('id_user' , $id_akun);
        return $this->db->get('user')->result_array();
    }
    
   
    //===================================================
    //==============KELOLA KATEGORI======================
    function kategori()//memamnggil data kategori
    {
    	return $this->db->get('attr_kategori')->result_array();
    }

    function simpan_kategori($kategori_baru){
		$data = array(
			'jenis_kategori'    => $kategori_baru
		);
		$this->db->insert('attr_kategori',$data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	function update_kategori($kategori_baru, $id)
	{
		$data = array(
			'jenis_kategori' => $kategori_baru
		);
		$this->db->where('id_kategori' , $id);
  		$this->db->update('attr_kategori' , $data);
  		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

   

	//===================================================
    function tampil_user_baru()
    {   
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_verifikasi','user_verifikasi.id_user = user.id_user');
        $this->db->where('status_verifikasi', 'false');
        return $this->db->get()->result_array();
       // $this->db->where('status_perusahaan', 'proses');
        //return $this->db->get('perusahaan')->result_array();
    }
     function tampil_user_terverifikasi()
    {   
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_verifikasi','user_verifikasi.id_user = user.id_user');
        $this->db->where('status_verifikasi', 'true');
        return $this->db->get()->result_array();
       // $this->db->where('status_perusahaan', 'proses');
        //return $this->db->get('perusahaan')->result_array();
    }
    function tampil_perusahaan_baru()
    {   
        $this->db->select('*');
        $this->db->from('perusahaan');
        $this->db->join('user','user.id_user = perusahaan.id_user');
        $this->db->where('jenis_perusahaan', 'komersial');
        $this->db->where('status_perusahaan', 'menunggu_verifikasi');
        return $this->db->get()->result_array();
       // $this->db->where('status_perusahaan', 'proses');
        //return $this->db->get('perusahaan')->result_array();
    }

    function tampil_perusahaan_terverifikasi()
    {   
        $this->db->select('*');
        $this->db->from('perusahaan');
        $this->db->join('user','user.id_user = perusahaan.id_user');
        $this->db->where_in('status_perusahaan', array('aktiv','nonaktiv'));
        return $this->db->get()->result_array();
       // $this->db->where('status_perusahaan', 'proses');
        //return $this->db->get('perusahaan')->result_array();
    }
    function tampil_perusahaan_komersial()
    {   
        $this->db->select('*');
        $this->db->from('perusahaan');
        $this->db->join('user','user.id_user = perusahaan.id_user');
        $this->db->where('jenis_perusahaan', 'komersial');
        return $this->db->get()->result_array();
    }
        function tampil_perusahaan_individu()
    {   
        $this->db->select('*');
        $this->db->from('perusahaan');
        $this->db->join('user','user.id_user = perusahaan.id_user');
         $this->db->where('jenis_perusahaan', 'individu');
        return $this->db->get()->result_array();
    }
    function profil_perusahaan($id_perusahaan)
  {
 
      $this->db->select('*');
        $this->db->from('perusahaan');
        $this->db->join('user','user.id_user = perusahaan.id_user');
        $this->db->where('id_perusahaan', $id_perusahaan);
        return $this->db->get()->row();

  }
  function profil_medsos($id_perusahaan)
  {
     $this->db->where('id_perusahaan' , $id_perusahaan);
        //$this->db->where_not_in('jenis' , $id_perusahaan);
     return $this->db->get('perusahaan_medsos')->result_array();
  }
  function profil_produk($id_perusahaan)
  {
       $this->db->where('id_perusahaan' , $id_perusahaan);
       $this->db->where('status_hapus', 'false');
       return $this->db->get('perusahaan_produk')->result_array();
    }
    function profil_teknisi($id_perusahaan)
    {
      $this->db->where('id_perusahaan' , $id_perusahaan);
      $this->db->where('status_hapus_pemasang', 'false');
      return $this->db->get('perusahaan_pemasang')->result_array();
    }

    function tampil_produk()
    {   
        $this->db->where('status_hapus', 'false');
        return $this->db->get('produk_view')->result_array();
    }
     function tampil_detail_produk($id_produk)
    {   
        $this->db->where('status_hapus', 'false');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get('produk_view')->row();
    }
     function simpan_edit_produk($id, $nama, $kategori, $ukuran_sistem, $deskripsi, $harga, $garansi){

       $data = array(
         'nama_produk' => $nama,
         'kategori' => $kategori,
         'ukuran_sistem' => str_replace(",",".",$ukuran_sistem),
         'deskripsi' => $deskripsi,
         'harga' => str_replace(".","",$harga),
         'garansi' => $garansi
      );
       $this->db->where('id_produk' , $id);
       $this->db->update('perusahaan_produk' , $data);
       return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

     function tampil_pemasang_baru()
    {   
        $this->db->where('status_publis_pemasang', 'menunggu_verifikasi');
        return $this->db->get('pemasang_view')->result_array();
    }
     function tampil_pemasang()
    {   
        $this->db->where('status_hapus_pemasang', 'false');
        $this->db->where('status_publis_pemasang', 'true');
        return $this->db->get('pemasang_view')->result_array();
    }
    function tampil_portofolio_pemasang($get_send) //menampilkan detail artikel
     {
       $this->db->where('id_pemasang' , $get_send);
       $this->db->order_by('id_portofolio', 'DESC');
       return $this->db->get('pemasang_portofolio')->result_array();
    }
    function simpan_sertifikat_pemasang($id_pemasang, $nama_sertifikat, $new_name){

       $data = array(
         'id_pemasang' => $id_pemasang,
         'nama_sertifikat' => $nama_sertifikat,
         'sertifikat' => $new_name,
         'input_sertifikat' => date('Y-m-d')

      );
       $this->db->insert('pemasang_sertifikat',$data);
       return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function simpan_edit_pemasang($id, $nama_pemasang, $tanggal_lahir, $jenis_kelamin, $alamat, $kelurahan, $kecamatan, $kabupaten, $provinsi, $kodepos, $harga, $telepon)
     {

        $data = array(
           'nama_pemasang' => $nama_pemasang,
           'tanggal_lahir_pemasang' => $tanggal_lahir,
           'jenis_kelamin' => $jenis_kelamin,
           'alamat_pemasang' => $alamat,
           'desa_pemasang' => $kelurahan,
           'kecamatan_pemasang' => $kecamatan,
           'kabupaten_pemasang' => $kabupaten,
           'provinsi_pemasang' => $provinsi,
           'kodepos_pemasang' => $kodepos,
           'harga_pemasang' => str_replace(".","",$harga),
           'telepon_pemasang' => $telepon
        );
        $this->db->where('id_pemasang' , $id);
        $this->db->update('perusahaan_pemasang' , $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
     }
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
        //chmod("upload_file/".$this->session->userdata('folder')."/img/perusahaan/pemasang/".$folder_pemasang."/portofolio/".$new_folder, 0777, true);

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
            'ukuran_sistem' => str_replace(",",".",$ukuran_sistem),
            'folder' => $new_folder,
            'input_portofolio' => date('Y-m-d')
        );
         $this->db->insert('pemasang_portofolio',$data);

         $this->session->set_flashdata('notif' , true);
         $this->session->set_flashdata('teks_notif' , "Slide Berhasil ditambah");
     }

     redirect(base_url()."administrator/detail_pemasang/".$id);
 }
     
     function tampil_sertifikat_pemasang($get_send) //menampilkan detail artikel
     {
       $this->db->where('id_pemasang' , $get_send);
       $this->db->order_by('id_sertifikat', 'DESC');
       return $this->db->get('pemasang_sertifikat')->result_array();
    }
     function tampil_keahlian_pemasang($id_pemasang)
   {
    $this->db->where('id_pemasang' , $id_pemasang);
    return $this->db->get('pemasang_keahlian')->result_array();
 }
  function tampil_area_pemasang($id_pemasang)
{
    $this->db->where('id_pemasang' , $id_pemasang);
    return $this->db->get('pemasang_area_kerja')->result_array();
 }
      function tampil_provinsi()
    {
       $this->db->order_by('provinsi', 'ASC');
       return $this->db->get('wilayah_prov')->result_array();
    }

        function tampil_cari_kota($provinsi) //=====MENAMPILKAN KOTA DI DROPDOWN AUTOFILL
    {
         
        $this->db->like('provinsi', $provinsi);
        $queryProv = $this->db->get('wilayah_prov')->row();
        
         $this->db->order_by('kabupaten', 'ASC');
        $query = $this->db->get_where('wilayah_kab', array('id_provinsi' => $queryProv->id));
        return $query;
    }
    function tampil_cari_kecamatan($kabupaten) //=====MENAMPILKAN KOTA DI DROPDOWN AUTOFILL
    {
         
        $this->db->like('kabupaten', $kabupaten);
        $queryKab = $this->db->get('wilayah_kab')->row();
        
         $this->db->order_by('kecamatan', 'ASC');
        $query = $this->db->get_where('wilayah_kec', array('id_kabupaten' => $queryKab->id));
        return $query;
    }
    function tampil_cari_kelurahan($kecamatan) //=====MENAMPILKAN KOTA DI DROPDOWN AUTOFILL
    {
         
        $this->db->like('kecamatan', $kecamatan);
        $queryKec = $this->db->get('wilayah_kec')->row();
        
         $this->db->order_by('kelurahan', 'ASC');
        $query = $this->db->get_where('wilayah_kel', array('id_kecamatan' => $queryKec->id));
        return $query;
    }
     function tampil_cari_kodepos($kelurahan, $kecamatan, $kabupaten, $provinsi) //=====MENAMPILKAN KOTA DI DROPDOWN AUTOFILL
    {
         
        $this->db->like('kelurahan', $kelurahan);
        $this->db->like('kecamatan', $kecamatan);
        $hilangkan_kab= str_replace("KAB ", "", $kabupaten);
        $kab= str_replace("KOTA ", "", $hilangkan_kab);
        $this->db->like('kabupaten', $kab);
        $this->db->like('provinsi', $provinsi);
        $query = $this->db->get_where('wilayah_pos');
        return $query;
    }
    //===================================================PEMBELIAN
    function tampil_pembayaran()
    {
        $this->db->where('status_pembayaran', 'menunggu_verifikasi_pembayaran');
        $this->db->or_where('status_pembayaran', 'terverifikasi');
        $this->db->order_by('id', 'DESC');
        return $this->db->get('order_invoice')->result_array();
    }
    function tampil_detail_invoice($id_invoice)
    {
       $this->db->where('id_invoice', $id_invoice);
        return $this->db->get('order_invoice')->row();
    }
     function detail_invoice_pembelian($id_order)
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('order_invoice','order.id_invoice = order_invoice.id_invoice');
        $this->db->where('id_order', $id_order);
        return $this->db->get()->row();
    }
    function tampil_daftar_invoice($id_invoice)
    {
        $this->db->select('*');
        $this->db->from('order_invoice');
        $this->db->join('order','order_invoice.id_invoice = order.id_invoice');
        $this->db->join('perusahaan_produk','order.id_produk = perusahaan_produk.id_produk');
        $this->db->join('perusahaan','perusahaan_produk.id_perusahaan = perusahaan.id_perusahaan');
        $this->db->where('order_invoice.id_invoice', $id_invoice);
        $this->db->group_by('order_invoice.id_invoice', $id_invoice);
        return $this->db->get()->result_array();
    }
      function tampil_pembelian($status)
    {
        $this->db->select('*');
        $this->db->from('order_invoice');
        $this->db->join('order','order_invoice.id_invoice=order.id_invoice');
        $this->db->join('perusahaan_produk','order.id_produk=perusahaan_produk.id_produk');
        $this->db->where('status_order', $status);
        $this->db->order_by('id_order', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }
         function tampil_detail_pembelian($id_order)
    {
        $this->db->select('*');
        $this->db->from('order_invoice');
        $this->db->join('order','order_invoice.id_invoice=order.id_invoice');
        $this->db->join('perusahaan_produk','order.id_produk=perusahaan_produk.id_produk');
        $this->db->where('id_order', $id_order);
        $query = $this->db->get()->row();
        return $query;
    }
      function tampil_riwayat_pembelian()
    {
        $this->db->select('*');
        $this->db->from('order_invoice');
        $this->db->join('order','order_invoice.id_invoice=order.id_invoice');
        $this->db->join('perusahaan_produk','order.id_produk=perusahaan_produk.id_produk');
        $this->db->where_in('status_order', array('selesai','batal'));
        $this->db->order_by('id_order', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }
    function tampil_bukti_pembelian()
    {
        $this->db->select('*');
        $this->db->from('order_bukti');
        $this->db->join('order','order_bukti.id_order=order.id_order');
        $this->db->join('perusahaan_produk','perusahaan_produk.id_produk = order.id_produk'); 
        //$this->db->join('perusahaan','perusahaan_produk.id_perusahaan = perusahaan.id_perusahaan');   
       // $this->db->join('user','perusahaan.id_user = user.id_user');       
        $this->db->where('status_order', 'selesai');
        $this->db->where_in('status_bukti', array('menunggu_verifikasi','terverifikasi'));
       // $this->db->group_by('id_invoice');
        $this->db->order_by('id_order_bukti', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }
    function tampil_transfer_pembelian()
    {
        $this->db->select('*');
        $this->db->from('order_transfer');
        $this->db->join('order','order_transfer.id_order=order.id_order');
        $this->db->join('perusahaan_produk','perusahaan_produk.id_produk = order.id_produk'); 
        $this->db->join('perusahaan','perusahaan_produk.id_perusahaan = perusahaan.id_perusahaan');   
        //$this->db->join('user','perusahaan.id_user = user.id_user');       
        $this->db->where('status_order', 'selesai');
        $this->db->where_in('status_transfer', array('menunggu_transfer','sudah_ditransfer'));
       // $this->db->group_by('id_invoice');
        $this->db->order_by('id_order_transfer', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }
    function bukti_pembayaran($id_invoice)
    {
        $this->db->where('id_invoice', $id_invoice);
        return $this->db->get('order_pembayaran')->result_array();
    }
    function verifikasi_pembayaran($id_invoice)
    {
        $data = array(
            'status_pembayaran' =>'terverifikasi'
        );
        $this->db->where('id_invoice' , $id_invoice);
        $this->db->update('order_invoice' , $data);

        $data2 = array(
            'status_order' =>'terverifikasi'
        );
        $this->db->where('id_invoice' , $id_invoice);
        $this->db->update('order' , $data2);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    function verifikasi_bidding()
    {
        $this->db->select('*');
        $this->db->from('bidding');
        $this->db->join('user','bidding.id_user = user.id_user');
        $this->db->where('status_bidding', 'menunggu_verifikasi');
        $this->db->order_by('id_bidding', 'DESC');
        return $this->db->get()->result_array();
    }
      function bidding_berlangsung()
    {
        $this->db->select('*');
        $this->db->from('bidding');
        $this->db->join('user','bidding.id_user = user.id_user');
        $this->db->where('status_bidding', 'berlangsung');
        $this->db->order_by('id_bidding', 'DESC');
        return $this->db->get()->result_array();
    }
    function bidding_menunggu_pembayaran()
    {
        $this->db->select('*');
        $this->db->from('bidding');
        $this->db->join('bidding_take','bidding.id_bidding = bidding_take.id_bidding');
        $this->db->where('status_bidding', 'diproses');
        $this->db->where('status_bidding_take', 'menunggu_pembayaran');
        $this->db->order_by('id_bidding_take', 'DESC');
        return $this->db->get()->result_array();
    }
      function bidding_diproses()
    {
        $this->db->select('*');
        $this->db->from('bidding');
        $this->db->join('bidding_take','bidding.id_bidding = bidding_take.id_bidding');
        $this->db->where('status_bidding', 'diproses');
        $this->db->where('status_bidding_take', 'menang');
        $this->db->order_by('id_bidding_take', 'DESC');
        return $this->db->get()->result_array();
    }
      function bidding_dikerjakan()
    {
        $this->db->select('*');
        $this->db->from('bidding');
        $this->db->join('bidding_take','bidding.id_bidding = bidding_take.id_bidding');
        $this->db->where('status_bidding', 'dikerjakan');
        $this->db->where('status_bidding_take', 'menang');
        $this->db->order_by('id_bidding_take', 'DESC');
        return $this->db->get()->result_array();
    }
      function bidding_selesai()
    {
        $this->db->select('*');
        $this->db->from('bidding');
        $this->db->join('bidding_take','bidding.id_bidding = bidding_take.id_bidding');
        $this->db->where_in('status_bidding', array('selesai','batal'));
        //$this->db->where('status_bidding_take', 'menang');
        $this->db->order_by('id_bidding_take', 'DESC');
        return $this->db->get()->result_array();
    }
    function detail_bidding($id_bidding)
    {
        $this->db->where('id_bidding' , $id_bidding);
        return $this->db->get('bidding')->row();
    }
    function area_bidding($id_bidding)
    {
        $this->db->where('id_bidding' , $id_bidding);
        return $this->db->get('bidding_area')->result_array();
    }
    
     function pembayaran_lelang()
    {

        $this->db->select('*');
        $this->db->from('bidding');
        $this->db->join('bidding_take','bidding.id_bidding = bidding_take.id_bidding'); 
       // $this->db->join('perusahaan','perusahaan_pemasang.id_perusahaan = perusahaan.id_perusahaan');   
        $this->db->where('status_bidding_take' , 'menunggu_verifikasi_pembayaran');
        $this->db->order_by('id_bidding_take', 'DESC');
        return $this->db->get()->result_array();
    }
       function tampil_bukti_lelang()
    {
        $this->db->select('*');
        $this->db->from('bidding_bukti');
        $this->db->join('bidding','bidding_bukti.id_bidding=bidding.id_bidding');
        $this->db->join('user','bidding.id_user = user.id_user'); 
        //$this->db->join('perusahaan','perusahaan_produk.id_perusahaan = perusahaan.id_perusahaan');   
       // $this->db->join('user','perusahaan.id_user = user.id_user');       
        $this->db->where('status_bidding', 'selesai');
        $this->db->where_in('status_bukti', array('menunggu_verifikasi','terverifikasi'));
       // $this->db->group_by('id_invoice');
        $this->db->order_by('id_bidding_bukti', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }
    function tampil_transfer_lelang()
    {
        $this->db->select('*');
        $this->db->from('bidding_transfer');
        $this->db->join('bidding_take','bidding_transfer.id_bidding=bidding_take.id_bidding');
        $this->db->join('bidding','bidding_take.id_bidding=bidding.id_bidding');
        $this->db->join('user','bidding.id_user = user.id_user');
        //$this->db->join('perusahaan','perusahaan_produk.id_perusahaan = perusahaan.id_perusahaan');   
        //$this->db->join('user','perusahaan.id_user = user.id_user');       
        $this->db->where('status_bidding', 'selesai');
        $this->db->where('status_bidding_take', 'menang');
        $this->db->where_in('status_transfer', array('menunggu_transfer','sudah_ditransfer'));
       // $this->db->group_by('id_invoice');
        $this->db->order_by('id_bidding_transfer', 'DESC');
        $query = $this->db->get()->result_array();
        return $query;
    }
    function tampil_perusahaan_send_bidding()
    {
        $this->db->select('*');
        $this->db->from('perusahaan');
        $this->db->join('perusahaan_medsos','perusahaan.id_perusahaan = perusahaan_medsos.id_perusahaan');
        $this->db->where('jenis_perusahaan', 'komersial');
        $this->db->where('status_perusahaan', 'aktiv');
        $this->db->where('jenis', 'email');
        return $this->db->get()->result_array();
      
    }
    //========================================================================================

    function menunggu_pembayaran_penawaran()
    {
        $this->db->select('*');
        $this->db->from('pemasang_penawaran');
        $this->db->join('perusahaan_pemasang','pemasang_penawaran.id_pemasang = perusahaan_pemasang.id_pemasang'); 
        $this->db->join('perusahaan','perusahaan_pemasang.id_perusahaan = perusahaan.id_perusahaan');   
        $this->db->where('status_penawaran' , 'menunggu_pembayaran');
        $this->db->order_by('id_penawaran', 'DESC');
        return $this->db->get()->result_array();
    }
    function pembayaran_penawaran()
    {
        $this->db->select('*');
        $this->db->from('pemasang_penawaran');
        $this->db->join('perusahaan_pemasang','pemasang_penawaran.id_pemasang = perusahaan_pemasang.id_pemasang'); 
        $this->db->join('perusahaan','perusahaan_pemasang.id_perusahaan = perusahaan.id_perusahaan');   
        $this->db->where('status_penawaran' , 'menunggu_verifikasi_pembayaran');
        $this->db->order_by('id_penawaran', 'DESC');
        return $this->db->get()->result_array();
    }
    function menunggu_ditanggapi_penawaran()
    {
        $this->db->select('*');
        $this->db->from('pemasang_penawaran');
        $this->db->join('perusahaan_pemasang','pemasang_penawaran.id_pemasang = perusahaan_pemasang.id_pemasang'); 
        $this->db->join('perusahaan','perusahaan_pemasang.id_perusahaan = perusahaan.id_perusahaan');   
        $this->db->where('status_penawaran' , 'menunggu_tanggapan');
        $this->db->order_by('id_penawaran', 'DESC');
        return $this->db->get()->result_array();
    }
     function penawaran_ditanggapi()
    {
        $this->db->select('*');
        $this->db->from('pemasang_penawaran');
        $this->db->join('perusahaan_pemasang','pemasang_penawaran.id_pemasang = perusahaan_pemasang.id_pemasang'); 
        $this->db->join('perusahaan','perusahaan_pemasang.id_perusahaan = perusahaan.id_perusahaan');   
        $this->db->where('status_penawaran' , 'ditanggapi');
        $this->db->order_by('id_penawaran', 'DESC');
        return $this->db->get()->result_array();
    }
    function penawaran_dikerjakan()
    {
        $this->db->select('*');
        $this->db->from('pemasang_penawaran');
        $this->db->join('perusahaan_pemasang','pemasang_penawaran.id_pemasang = perusahaan_pemasang.id_pemasang'); 
        $this->db->join('perusahaan','perusahaan_pemasang.id_perusahaan = perusahaan.id_perusahaan');   
        $this->db->where('status_penawaran' , 'dikerjakan');
        $this->db->order_by('id_penawaran', 'DESC');
        return $this->db->get()->result_array();
    }
      function penawaran_selesai()
    {
        $this->db->select('*');
        $this->db->from('pemasang_penawaran');
        $this->db->join('perusahaan_pemasang','pemasang_penawaran.id_pemasang = perusahaan_pemasang.id_pemasang'); 
        $this->db->join('perusahaan','perusahaan_pemasang.id_perusahaan = perusahaan.id_perusahaan');   
        $this->db->where_in('status_penawaran' , array('batal','selesai'));
        $this->db->order_by('id_penawaran', 'DESC');
        return $this->db->get()->result_array();
    }

    function bukti_penawaran()
    {

        $this->db->select('*');
        $this->db->from('penawaran_bukti');
        $this->db->join('pemasang_penawaran','penawaran_bukti.id_penawaran=pemasang_penawaran.id_penawaran');
        $this->db->join('perusahaan_pemasang','pemasang_penawaran.id_pemasang = perusahaan_pemasang.id_pemasang'); 
        //$this->db->join('perusahaan','perusahaan_pemasang.id_perusahaan = perusahaan.id_perusahaan');   
        $this->db->where('status_bukti' , 'menunggu_verifikasi');
        $this->db->order_by('id_penawaran_bukti', 'DESC');
        return $this->db->get()->result_array();
    }
       function tampil_transfer_teknisi()
    {

        $this->db->select('*');
        $this->db->from('penawaran_transfer');
        $this->db->join('pemasang_penawaran','penawaran_transfer.id_penawaran=pemasang_penawaran.id_penawaran');
        $this->db->join('perusahaan_pemasang','pemasang_penawaran.id_pemasang = perusahaan_pemasang.id_pemasang'); 
        $this->db->join('perusahaan','perusahaan_pemasang.id_perusahaan = perusahaan.id_perusahaan');   
        $this->db->where_in('status_transfer' , array('menunggu_transfer','sudah_ditransfer'));
        $this->db->order_by('id_penawaran_transfer', 'DESC');
        return $this->db->get()->result_array();
    }
    function tampil_pembayaran_iklan()
    {
         $this->db->select('*');
         $this->db->from('iklan_pembayaran');
         $this->db->join('iklan', 'iklan_pembayaran.id_iklan=iklan.id_iklan');
         //$this->db->join('iklan_paket', 'iklan.id_iklan_paket=iklan_paket.id_iklan_paket');
         $this->db->where_in('status_pembayaran', array('menunggu_verifikasi','terverifikasi'));
         $this->db->order_by('id_iklan_pembayaran', 'DESC');
         return $this->db->get()->result_array();
    }
       function tampil_verifikasi_iklan()
    {
         $this->db->select('*');
         $this->db->from('iklan_pembayaran');
         $this->db->join('iklan', 'iklan_pembayaran.id_iklan=iklan.id_iklan');
         //$this->db->join('iklan_paket', 'iklan.id_iklan_paket=iklan_paket.id_iklan_paket');
         $this->db->where_in('status_iklan', array('menunggu_verifikasi','tangguhkan'));
         $this->db->where('status_pembayaran', 'terverifikasi');
         $this->db->order_by('id_iklan_pembayaran', 'DESC');
         return $this->db->get()->result_array();
    }
    function tampil_detail_iklan($id_iklan)
    {
        $this->db->select('*');
         $this->db->from('iklan_pembayaran');
         $this->db->join('iklan', 'iklan_pembayaran.id_iklan=iklan.id_iklan');
         //$this->db->join('iklan_paket', 'iklan.id_iklan_paket=iklan_paket.id_iklan_paket');
         $this->db->where('iklan.id_iklan', $id_iklan);
         return $this->db->get()->row();
    }
      function tampil_daftar_iklan()
    {
         $this->db->select('*');
         $this->db->from('iklan_pembayaran');
         $this->db->join('iklan', 'iklan_pembayaran.id_iklan=iklan.id_iklan');
         //$this->db->join('iklan_paket', 'iklan.id_iklan_paket=iklan_paket.id_iklan_paket');
         $this->db->where_in('status_iklan', array('terverifikasi','tayang','selesai','batal'));
         $this->db->order_by('id_iklan_pembayaran', 'DESC');
         return $this->db->get()->result_array();
    }
    function simpan_perbaiki_iklan($id_iklan, $nama_kampanye, $ket_nama, $link, $ket_link, $banner, $ket_banner, $sidebar, $ket_sidebar, $detail_pustaka, $ket_detail_pustaka, $produk, $ket_produk,$news, $ket_news)
    {
         $data = array(
                'status_iklan' => 'perbaikan'
            );   
        $this->db->where('id_iklan', $id_iklan);
        $this->db->update('iklan', $data);

        $data2 = array(
          'id_iklan'=>$id_iklan,
          'nama_kampanye'=>$nama_kampanye,
          'ket_nama'=>$ket_nama,
          'link'=>$link,
          'ket_link'=>$ket_link,
          'iklan_banner'=>$banner,
          'ket_iklan_banner'=>$ket_banner,
          'iklan_sidebar'=>$sidebar,
          'ket_iklan_sidebar'=>$ket_sidebar,
          'iklan_detail_pustaka'=>$detail_pustaka,
          'ket_iklan_detail_pustaka'=>$ket_detail_pustaka,
          'iklan_produk'=>$produk,
          'ket_iklan_produk'=>$ket_produk,
          'iklan_newsletter'=>$news,
          'ket_iklan_newsletter'=>$ket_news,
          'input_perbaikan'=>date("Y-m-d")
        );
        $this->db->insert('iklan_perbaikan',$data2);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function get_notif_pembelian($tipe)
    {
        if ($tipe=="pembayaran") {
            $this->db->where('status_pembayaran', 'menunggu_verifikasi_pembayaran');
            return $this->db->get('order_invoice')->result_array();
        }else if ($tipe=="bukti_pengerjaan") {
            $this->db->select('*');
            $this->db->from('order_bukti');
            $this->db->join('order','order_bukti.id_order=order.id_order');
            $this->db->join('perusahaan_produk','perusahaan_produk.id_produk = order.id_produk'); 
            $this->db->where('status_order', 'selesai');
            $this->db->where('status_bukti','menunggu_verifikasi');
            $query = $this->db->get()->result_array();
            return $query;
        }else if ($tipe=="transfer_pembayaran") {
             $this->db->select('*');
            $this->db->from('penawaran_transfer');
            $this->db->join('pemasang_penawaran','penawaran_transfer.id_penawaran=pemasang_penawaran.id_penawaran');
            $this->db->join('perusahaan_pemasang','pemasang_penawaran.id_pemasang = perusahaan_pemasang.id_pemasang');  
            $this->db->where('status_transfer' , 'menunggu_transfer');
            return $this->db->get()->result_array();
        }
    }
    function get_notif_penawaran($tipe)
    {
         if ($tipe=="pembayaran") {
            $this->db->select('*');
            $this->db->from('pemasang_penawaran');
            $this->db->join('perusahaan_pemasang','pemasang_penawaran.id_pemasang = perusahaan_pemasang.id_pemasang'); 
            $this->db->join('perusahaan','perusahaan_pemasang.id_perusahaan = perusahaan.id_perusahaan');   
            $this->db->where('status_penawaran' , 'menunggu_verifikasi_pembayaran');
            return $this->db->get()->result_array();
        }else if ($tipe=="bukti_pengerjaan") {
            $this->db->select('*');
            $this->db->from('penawaran_bukti');
            $this->db->join('pemasang_penawaran','penawaran_bukti.id_penawaran=pemasang_penawaran.id_penawaran');
            $this->db->join('perusahaan_pemasang','pemasang_penawaran.id_pemasang = perusahaan_pemasang.id_pemasang');  
            $this->db->where('status_bukti' , 'menunggu_verifikasi');
            return $this->db->get()->result_array();
        }else if ($tipe=="transfer_pembayaran") {
            $this->db->select('*');
            $this->db->from('penawaran_transfer');
            $this->db->join('pemasang_penawaran','penawaran_transfer.id_penawaran=pemasang_penawaran.id_penawaran');
            $this->db->join('perusahaan_pemasang','pemasang_penawaran.id_pemasang = perusahaan_pemasang.id_pemasang');   
            $this->db->where('status_transfer', 'menunggu_transfer');
            return $this->db->get()->result_array();
        }
    }
    function get_notif_lelang($tipe)
    {
        if ($tipe=="verif_lelang") {
              $this->db->select('*');
              $this->db->from('bidding');
              $this->db->join('user','bidding.id_user = user.id_user');
              $this->db->where('status_bidding', 'menunggu_verifikasi');
              return $this->db->get()->result_array();
        }else if ($tipe=="verif_pembayaran") {
            $this->db->select('*');
           $this->db->from('bidding');
           $this->db->join('bidding_take','bidding.id_bidding = bidding_take.id_bidding');    
           $this->db->where('status_bidding_take' , 'menunggu_verifikasi_pembayaran');
           return $this->db->get()->result_array();
        }else if ($tipe=="bukti_pengerjaan") {
            $this->db->select('*');
           $this->db->from('bidding_bukti');
           $this->db->join('bidding','bidding_bukti.id_bidding=bidding.id_bidding');
           $this->db->join('user','bidding.id_user = user.id_user'); 
           $this->db->where('status_bidding', 'selesai');
           $this->db->where('status_bukti','menunggu_verifikasi');
           $query = $this->db->get()->result_array();
           return $query;
        }else if ($tipe=="transfer_pembayaran") {
            $this->db->select('*');
           $this->db->from('bidding_transfer');
           $this->db->join('bidding_take','bidding_transfer.id_bidding=bidding_take.id_bidding');
           $this->db->join('bidding','bidding_take.id_bidding=bidding.id_bidding');
           $this->db->join('user','bidding.id_user = user.id_user');   
           $this->db->where('status_bidding', 'selesai');
           $this->db->where('status_bidding_take', 'menang');
           $this->db->where_in('status_transfer','menunggu_transfer');
           $query = $this->db->get()->result_array();
           return $query;
        }
    }
    function get_notif_iklan($tipe)
    {
        if ($tipe=="pembayaran") {
           $this->db->select('*');
            $this->db->from('iklan_pembayaran');
            $this->db->join('iklan', 'iklan_pembayaran.id_iklan=iklan.id_iklan');
            $this->db->where('status_pembayaran', 'menunggu_verifikasi');
            return $this->db->get()->result_array();
        }else if ($tipe=="verif_iklan") {
           $this->db->select('*');
            $this->db->from('iklan_pembayaran');
            $this->db->join('iklan', 'iklan_pembayaran.id_iklan=iklan.id_iklan');
            $this->db->where('status_iklan', 'menunggu_verifikasi');
            return $this->db->get()->result_array();
        }
   }

}
 ?>