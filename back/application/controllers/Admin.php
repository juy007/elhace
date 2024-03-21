<?php 
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
      $this->load->library('upload');
      $this->load->library('encryption');
      $this->load->helper('security');
      $this->load->helper('url');
      $this->load->library('session');
      $this->load->model('M_admin');
      $this->load->helper(array('url','form'));

      /*cache control*/
      $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
      $this->output->set_header('Pragma: no-cache');

       date_default_timezone_set('Asia/Jakarta');
   }
//BERANDA START====================================================================
   function index()
   {
      $this->session->sess_destroy();
      $data['web'] = $this->db->get_where('website', array('id_website'=>'1'))->row();
      $this->load->view('backend/login', $data);
   }

   function validation_login()
   {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $check = $this->M_admin->validation_login($username, $password);

      if (count($check) > 0) {

          $query = $this->db->get_where('admin', array('username' => $username, 'password' => sha1($password)));
         $row = $query->row();
         
         $this->session->set_userdata('admin_login', 'TRUE');
         $this->session->set_userdata('id_admin', $row->id_admin);
         $this->session->set_userdata('nama_admin', $row->nama_admin);
         $this->session->set_userdata('email', $row->email);
         $this->session->set_userdata('username', $row->username);
         $this->session->set_userdata('password', $row->password);

         $this->M_admin->save_login($row->id_admin);

          redirect(base_url() ."admin-dashboard", 'refresh');
       }elseif (count($check) < 1) {
         $this->session->set_flashdata('username' , $username);
         $this->session->set_flashdata('password' , $password);
         $this->session->set_flashdata('notif' , 'false');
         $this->session->set_flashdata('teks_notif' , "wrong username or password");
         redirect(base_url() ."admin", 'refresh');
      }
   }
   function forgot_password()
   {
      $this->session->sess_destroy();
      $data['web'] = $this->db->get_where('website', array('id_website'=>'1'))->row();
      $this->load->view('backend/forgot_password', $data);
   }
   function cekemail()
   {
       $this->load->library('mailer');
         $verification_code = rand(1000, 9999);
         $recipient_email = 'brajamusti570@gmail.com';
         $subject = 'Verification Code';
         $message = $verification_code;
                
         $content = 'halo gais sehat';//$this->load->view('backend/email/email_forgot_otp', array('message'=>$message), true); 
         $sendmail = array(
            'recipient_email'=>$recipient_email,
            'subject'=>$subject,
            'content'=>$content
                  //'attachment'=>$attachment
         );
         $send = $this->mailer->send($sendmail);
   }
   function validation_forgot()
   {
      $email = $this->input->post('email');

      $check = $this->M_admin->validation_forgot($email);

      if (count($check) > 0) {
         $admin = $this->db->get_where('admin', array('email'=>$email))->row();
         $this->session->set_userdata('id_admin_otp', $admin->id_admin);
         $this->session->set_userdata('email_otp', $admin->email);

         $check_otp = $this->db->get_where('admin_otp', array('id_admin'=>$admin->id_admin))->result_array();
         if (count($check_otp)>0) {
            $this->M_admin->delete_otp($admin->id_admin);
         }
         
         
         $this->load->library('mailer');
         $verification_code = rand(1000, 9999);
         $recipient_email = $email;
         $subject = 'Verification Code';
         $message = $verification_code;
                
         $content = $this->load->view('backend/email/email_forgot_otp', array('message'=>$message), true); 
         $sendmail = array(
            'recipient_email'=>$recipient_email,
            'subject'=>$subject,
            'content'=>$content
                  //'attachment'=>$attachment
         );
         $send = $this->mailer->send($sendmail);
         
         
         date_default_timezone_set('Asia/Jakarta');
         $this->db->insert('admin_otp', array('id_admin'=> $admin->id_admin, 'code'=>$verification_code, 'date'=> date('Y-m-d'), 'time'=> date('H:i')));

          $this->session->set_userdata('forgot', 'TRUE');  
          redirect(base_url() ."admin-forgot-password-otp", 'refresh');
      }elseif (count($check) < 1) {
         $this->session->set_flashdata('email' , $email);
         $this->session->set_flashdata('notif' , 'false');
         $this->session->set_flashdata('teks_notif' , "email not found");
         redirect(base_url() ."admin-forgot-password", 'refresh');
      }
   }

   function resend_code()
   {

         $this->M_admin->delete_otp( $this->session->userdata('id_admin_otp'));
         
         $this->load->library('mailer');
         $verification_code = rand(1000, 9999);
         $recipient_email = $email;
         $subject = 'Verification Code';
         $message = $verification_code;
                
         $content = $this->load->view('backend/email/email_forgot_otp', array('message'=>$message), true); 
         $sendmail = array(
            'recipient_email'=>$recipient_email,
            'subject'=>$subject,
            'content'=>$content
                  //'attachment'=>$attachment
         );
         $send = $this->mailer->send($sendmail);
         
         
         date_default_timezone_set('Asia/Jakarta');
         $this->db->insert('admin_otp', array('id_admin'=> $admin->id_admin, 'code'=>$verification_code, 'date'=> date('Y-m-d'), 'time'=> date('H:i')));

          $this->session->set_userdata('forgot', 'TRUE');  
     
   }

   function forgot_password_otp()
   {
      if ($this->session->userdata('forgot') != 'TRUE')
      redirect(base_url()."admin-forgot-password", 'refresh');

      $data['web'] = $this->db->get_where('website', array('id_website'=>'1'))->row();
      $this->load->view('backend/forgot_password_otp', $data);
   }

   function validation_forgot_password_otp()
   {
      $code = $this->input->post('code'); 
      $id_admin = $this->input->post('id_admin');

      $check_otp = $this->db->get_where('admin_otp', array('id_admin'=>$id_admin, 'code'=>$code))->result_array();
      if (count($check_otp)>0) {
         $otp = $this->db->get_where('admin_otp', array('id_admin'=>$id_admin, 'code'=>$code))->row();

         $date = new DateTime($otp->time);
         $date_plus = $date->modify("+1 minutes");
         $expired = $date_plus->format("H:i");

         if ($otp->date == date('Y-m-d') && date('H:i') <= $expired) {
            redirect(base_url() ."admin-new-password", 'refresh');
         }else{
            $this->session->set_flashdata('code' , $code);
            $this->session->set_flashdata('notif' , 'false');
            $this->session->set_flashdata('teks_notif' , "expired code");
            redirect(base_url() ."admin-forgot-password-otp", 'refresh');
         }
         
      }else if(count($check_otp)<1){
         $this->session->set_flashdata('code' , $code);
         $this->session->set_flashdata('notif' , 'false');
         $this->session->set_flashdata('teks_notif' , "code not available");
         redirect(base_url() ."admin-forgot-password-otp", 'refresh');
      } 
   }

   function new_password()
   {
      if ($this->session->userdata('forgot') != 'TRUE')
      redirect(base_url()."admin-forgot-password", 'refresh');

      $data['web'] = $this->db->get_where('website', array('id_website'=>'1'))->row();
      $this->load->view('backend/new_password', $data);
   }

   function new_password_save()
   {
      $repassword=$this->input->post('repassword');
      if ($this->M_admin->new_password_save($this->session->userdata('email_otp'), $repassword) == TRUE) {
         $this->session->set_flashdata('notif' , 'true');
         $this->session->set_flashdata('teks_notif' , "password changed successfully");
      }else{
         $this->session->set_flashdata('notif' , 'false');
         $this->session->set_flashdata('teks_notif' , "password failed to change");
      }
        
        redirect(base_url() ."admin", 'refresh');
   }

   function logout()
   {
      //$this->session->unset_tempdata('item');
      $this->session->sess_destroy();
      redirect(base_url());
   } 

   function dashboard()
   {   
      if ($this->session->userdata('admin_login') != 'TRUE')
      redirect(base_url(), 'refresh');
      
      $data['news'] = $this->M_admin->read_news();
      $data['portfolio'] = $this->M_admin->portfolio_read();
      $data['visitor'] = $this->M_admin->visitor_today();
      $data['news_view'] = $this->M_admin->news_view_today();
      $data['portfolio_view'] = $this->M_admin->portfolio_view_today();
      $this->load->view('backend/header');
      $this->load->view('backend/index', $data);
      $this->load->view('backend/footer');
   }

   function news()
   {   
      if ($this->session->userdata('admin_login') != 'TRUE')
      redirect(base_url(), 'refresh');
      $data['read_news'] = $this->M_admin->read_news();
      $this->load->view('backend/header');
      $this->load->view('backend/news', $data);
      $this->load->view('backend/footer');
   }
    
   function news_form()
   {   
      if ($this->session->userdata('admin_login') != 'TRUE')
      redirect(base_url(), 'refresh');


      $open=opendir('upload_file/news') or die('Folder tidak terdeteksi!');
      while ($file=readdir($open)) {
      if($file !='.' && $file !='..'){   
            $read_news = $this->db->get_where('news', array('news_folder'=>$file));
            
            if ($read_news->num_rows()<1) {

                $files_list    =glob('upload_file/news/'.$file.'/*');
               foreach ($files_list as $file_show) {
                  if (is_file($file_show))
                     unlink($file_show);
               }
                  rmdir('upload_file/news/'.$file);
            }
         }
        
      }

      date_default_timezone_set('Asia/Jakarta');
      $this->session->set_userdata('news_folder', date('YmdHis'));
      mkdir('./upload_file/news/'.$this->session->userdata('news_folder'));

      $data['category'] = $this->M_admin->news_category_read();

      $this->load->view('backend/header');
      $this->load->view('backend/news_summernote', $data);
      //$this->load->view('backend/footer');
   }
    
   function news_edit($id_news)
   {   
      if ($this->session->userdata('admin_login') != 'TRUE')
      redirect(base_url(), 'refresh');
     
      $data['news_edit'] = $this->M_admin->news_select($id_news);
      $this->session->set_userdata('news_folder',$data['news_edit']->news_folder);
      $data['category'] = $this->M_admin->news_category_read();

      $this->load->view('backend/header');
      $this->load->view('backend/news_summernote_edit', $data);
   }

   function news_read()
   {   
      $id_news=$this->input->post('id_news');

      $read_news = $this->db->get_where('news', array('id_news'=>$id_news))->row();

      $callback = array(
         'news_folder' => $read_news->news_folder,
         'news_title' => $read_news->news_title,
         'news_text' => $read_news->news_text
      );
       echo json_encode($callback);
   }

   function save_news()
   {
      $news_title = $this->input->post('news_title');
      $category = $this->input->post('category');
      $meta_description = $this->input->post('meta_description');
      $meta_keyword = $this->input->post('meta_keyword');
      $news_text = $this->input->post('news_text');
      $news_views = '0';
      $news_status= $this->input->post('news_status');
      $news_folder= $this->input->post('news_folder');
      $tag= $this->input->post('tag');

      $created_date= $this->input->post('created_date');
      $updated_date= '';//$this->input->post('updated_date');


      
      
      if(isset($_FILES["news_banner"]["name"])){
         $config['upload_path'] = './upload_file/news/'.$this->session->userdata('news_folder');
         $config['allowed_types'] = 'jpg|jpeg|png|gif';
         $config['file_name'] = 'image_news.png';//'bodro-bilowo-elhace-'.$_FILES["news_banner"]["name"];
         $this->upload->initialize($config);
         if(!$this->upload->do_upload('news_banner')){
            $this->upload->display_errors();
            return FALSE;
         }else{
            $data = $this->upload->data();
                //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./upload_file/news/'.$this->session->userdata('news_folder').'/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '60%';
            $config['width']= 800;
            $config['height']= 800;
            $config['new_image']= './upload_file/news/'.$this->session->userdata('news_folder').'/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            //echo base_url().'upload_file/news/'.$this->session->userdata('news_folder').'/'.$data['file_name'];
         }
      }
      
      if ($this->M_admin->save_news($category, $news_title, $meta_description, $meta_keyword, $news_text, $news_views, $news_status, $news_folder,$tag, $created_date, $updated_date) == TRUE) {
         $this->session->set_flashdata('notif' , 'true');
         $this->session->set_flashdata('teks_notif' , "news added successfully");
      }else{
         $this->session->set_flashdata('notif' , 'false');
         $this->session->set_flashdata('teks_notif' , "news failed to add");
      }
        
        redirect(base_url() ."admin-news-form/", 'refresh');
   }

   function save_news_update()
   {
      $id_news = $this->input->post('id_news');
      $news_title = $this->input->post('news_title');
      $meta_description = $this->input->post('meta_description');
      $meta_keyword = $this->input->post('meta_keyword');
      $news_text = $this->input->post('news_text');
      $created_date= $this->input->post('created_date');
      $updated_date= $this->input->post('updated_date');
      $news_folder= $this->input->post('news_folder');

      
      if(!empty($_FILES["news_banner"]["name"])){
         //echo "hai";

         if(file_exists("./upload_file/news/".$news_folder."/image_news.png")){
            unlink('./upload_file/news/'.$news_folder.'/image_news.png');
         }
         
         $config['upload_path'] = './upload_file/news/'.$news_folder;
         $config['allowed_types'] = 'jpg|jpeg|png|gif';
         $config['file_name'] = 'image_news.png';//'bodro-bilowo-elhace-'.$_FILES["news_banner"]["name"];
         $this->upload->initialize($config);
         if(!$this->upload->do_upload('news_banner')){
            $this->upload->display_errors();
            return FALSE;
         }else{
            $data = $this->upload->data();
                //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./upload_file/news/'.$news_folder.'/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '60%';
            $config['width']= 800;
            $config['height']= 800;
            $config['new_image']= './upload_file/news/'.$news_folder.'/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            //echo base_url().'upload_file/news/'.$this->session->userdata('news_folder').'/'.$data['file_name'];
         }
      }
      
      if ($this->M_admin->save_news_update($id_news, $news_title, $meta_description, $meta_keyword, $news_text, $created_date, $updated_date) == TRUE) {
         $this->session->set_flashdata('notif' , 'true');
         $this->session->set_flashdata('teks_notif' , "news edited successfully");
      }else{
         $this->session->set_flashdata('notif' , 'false');
         $this->session->set_flashdata('teks_notif' , "news failed to edit");
      }
        
        redirect(base_url() ."admin-news-edit/".$id_news.'/', 'refresh');
   }

   function upload_image_summernote()
   {
      
        if(isset($_FILES["image"]["name"])){
            $config['upload_path'] = './upload_file/news/'.$this->session->userdata('news_folder');
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('image')){
                $this->upload->display_errors();
                return FALSE;
            }else{
                $data = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./upload_file/news/'.$this->session->userdata('news_folder').'/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '60%';
                $config['width']= 800;
                $config['height']= 800;
                $config['new_image']= './upload_file/news/'.$this->session->userdata('news_folder').'/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url().'upload_file/news/'.$this->session->userdata('news_folder').'/'.$data['file_name'];
            }
        }
   }
    function delete_image_summernote()
   {
       $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name))
        {
            echo 'File Delete Successfully';
        }
   }

   function news_status()
   {   
      $id_news=$this->input->post('id_news');
      $news_status=$this->input->post('news_status');

      if($this->M_admin->news_status_update($id_news, $news_status))
      {
         $result = 'true';
      }else{
         $result = 'false';
      }
      
      $callback = array(
         'notif' => $result
      );
      
      echo json_encode($callback);
   }

    function news_delete($id_news)
   {
      $read_news = $this->db->get_where('news', array('id_news'=>$id_news))->row();

      if ($this->M_admin->news_delete($id_news) == TRUE) {

         $files    =glob('upload_file/news/'.$read_news->news_folder.'/*');
         foreach ($files as $file) {
            if (is_file($file))
            //echo $file.'<br>';
            unlink($file); // hapus file
         }
         rmdir('upload_file/news/'.$read_news->news_folder);

         $this->session->set_flashdata('notif' , 'true');
         $this->session->set_flashdata('teks_notif' , "news deleted successfully");
      }else{
         $this->session->set_flashdata('notif' , 'false');
         $this->session->set_flashdata('teks_notif' , "news failed to delete");
      }
        
        redirect(base_url() ."admin-news", 'refresh');
   }


   function news_category()
   {
      if ($this->session->userdata('admin_login') != 'TRUE')
      redirect(base_url(), 'refresh');
      
      $data['category'] = $this->M_admin->news_category_read();

      $this->load->view('backend/header');
      $this->load->view('backend/news_category', $data);
      $this->load->view('backend/footer');
   }


   function save_news_category()
   {
      $category = $this->input->post('category');
         if ($this->M_admin->save_news_category($category) == TRUE) {
         $this->session->set_flashdata('notif' , 'true');
         $this->session->set_flashdata('teks_notif' , "category added successfully");
         }else{
            $this->session->set_flashdata('notif' , 'false');
            $this->session->set_flashdata('teks_notif' , "category failed to add");
         }
           
           redirect(base_url() ."admin-news-category/", 'refresh');
   }

   function edit_news_category()
   {
      $id_news_category=$this->input->post('id_news_category');

      $category = $this->db->get_where('news_category', array('id_news_category'=>$id_news_category))->row();

      $callback = array(
         'news_category_name' => $category->news_category_name
      );
       echo json_encode($callback);
   }

   function save_news_category_update()
   {
      $id_news_category = $this->input->post('id_news_category');
      $category = $this->input->post('category');
   
      
      if ($this->M_admin->save_news_category_update($id_news_category, $category) == TRUE) {
         $this->session->set_flashdata('notif' , 'true');
         $this->session->set_flashdata('teks_notif' , "category edited successfully");
      }else{
         $this->session->set_flashdata('notif' , 'false');
         $this->session->set_flashdata('teks_notif' , "category failed to edit");
      }
        
        redirect(base_url() ."admin-news-category", 'refresh');
   }

   function news_category_delete($id)
   {
      $check = $this->db->get_where('news', array('id_news_category'=>$id))->result_array();
      if (count($check) > 0) {
         $this->session->set_flashdata('notif' , 'false');
         $this->session->set_flashdata('teks_notif' , "category is still in use");
         redirect(base_url() ."admin-news-category", 'refresh');
      }else if (count($check) < 1) {

         if ($this->M_admin->news_category_delete($id) == TRUE) {

            $this->session->set_flashdata('notif' , 'true');
            $this->session->set_flashdata('teks_notif' , "category deleted successfully");
         }else{
            $this->session->set_flashdata('notif' , 'false');
            $this->session->set_flashdata('teks_notif' , "category failed to delete");
         }
           redirect(base_url() ."admin-news-category", 'refresh');
      }       
   }

   function news_cron()
   {
      $open=opendir('upload_file/news') or die('Folder tidak terdeteksi!');
      while ($file=readdir($open)) {
      if($file !='.' && $file !='..'){   
      //$files[]=$file;
      //}
        
            $read_news = $this->db->get_where('news', array('news_folder'=>$file));
            
            if ($read_news->num_rows()<1) {

                $files_list    =glob('upload_file/news/'.$file.'/*');
               foreach ($files_list as $file_show) {
                  if (is_file($file_show))
                     unlink($file_show);
               }
                  rmdir('upload_file/news/'.$file);
            }
         }
        
      }
   }

   function portfolio()
   {   
      if ($this->session->userdata('admin_login') != 'TRUE')
      redirect(base_url(), 'refresh');
      
      $data['portfolio_read'] = $this->M_admin->portfolio_read();

      $this->load->view('backend/header');
      $this->load->view('backend/portfolio', $data);
      $this->load->view('backend/footer');
   }

   function portfolio_form()
   {   
      if ($this->session->userdata('admin_login') != 'TRUE')
      redirect(base_url(), 'refresh');

      $data['category'] = $this->M_admin->portfolio_category_read();

      $this->load->view('backend/header');
      $this->load->view('backend/portfolio_form', $data);
      $this->load->view('backend/footer');
   }

   function portfolio_edit($id)
   {   
      if ($this->session->userdata('admin_login') != 'TRUE')
      redirect(base_url(), 'refresh');

      $data['category'] = $this->M_admin->portfolio_category_read();

      $this->db->select('*');
      $this->db->from('portfolio');
      $this->db->join('portfolio_category','portfolio_category.id_category = portfolio.id_category');
      $this->db->where('id_portfolio', $id);
      $data['data'] = $this->db->get()->row();

      $this->load->view('backend/header');
      $this->load->view('backend/portfolio_edit', $data);
      $this->load->view('backend/footer');
   }

   function portfolio_category()
   {
      if ($this->session->userdata('admin_login') != 'TRUE')
      redirect(base_url(), 'refresh');
      
      $data['category'] = $this->M_admin->portfolio_category_read();

      $this->load->view('backend/header');
      $this->load->view('backend/portfolio_category', $data);
      $this->load->view('backend/footer');
   }

   function save_category()
   {
      $category = $this->input->post('category');
         if ($this->M_admin->save_category($category) == TRUE) {
         $this->session->set_flashdata('notif' , 'true');
         $this->session->set_flashdata('teks_notif' , "category added successfully");
         }else{
            $this->session->set_flashdata('notif' , 'false');
            $this->session->set_flashdata('teks_notif' , "category failed to add");
         }
           
           redirect(base_url() ."admin-portfolio-category/", 'refresh');
   }
   function edit_category()
   {
      $id_category=$this->input->post('id_category');

      $category = $this->db->get_where('portfolio_category', array('id_category'=>$id_category))->row();

      $callback = array(
         'category_name' => $category->category_name
      );
       echo json_encode($callback);
   }
   function save_category_update()
   {
      $id_category = $this->input->post('id_category');
      $category = $this->input->post('category');
   
      
      if ($this->M_admin->save_category_update($id_category, $category) == TRUE) {
         $this->session->set_flashdata('notif' , 'true');
         $this->session->set_flashdata('teks_notif' , "category edited successfully");
      }else{
         $this->session->set_flashdata('notif' , 'false');
         $this->session->set_flashdata('teks_notif' , "category failed to edit");
      }
        
        redirect(base_url() ."admin-portfolio-category", 'refresh');
   }

   function category_delete($id)
   {
      $check = $this->db->get_where('portfolio', array('id_category'=>$id))->result_array();
      if (count($check) > 0) {
         $this->session->set_flashdata('notif' , 'false');
         $this->session->set_flashdata('teks_notif' , "category is still in use");
         redirect(base_url() ."admin-portfolio-category", 'refresh');
      }else if (count($check) < 1) {

         if ($this->M_admin->portfolio_category_delete($id) == TRUE) {

            $this->session->set_flashdata('notif' , 'true');
            $this->session->set_flashdata('teks_notif' , "category deleted successfully");
         }else{
            $this->session->set_flashdata('notif' , 'false');
            $this->session->set_flashdata('teks_notif' , "category failed to delete");
         }
           redirect(base_url() ."admin-portfolio-category", 'refresh');
      }       
   }


   function upcek()
   {
      //echo $_FILES["pail"]["name"];
      echo str_replace(".","-",$_FILES["pail"]["name"]);
   }

   function save_portfolio()
   {
      $category = $this->input->post('category');
      $meta_description = $this->input->post('meta_description');
      $meta_keyword = $this->input->post('meta_keyword');
      $title = $this->input->post('port_title');
      $description = $this->input->post('description');
      $create_date= $this->input->post('created_date');
      $publish_status = $this->input->post('publish_status');

      //$category, $meta_description, $meta_keyword, $title, $image_name, $description, $create_date, $publish_status
     
      $string_replace = array(' ', '_');
      if(file_exists("upload_file/portfolio/".$_FILES["image_portfolio"]["name"])){
         $image_name=date('is').'-bodro-bilowo-elhace-'.str_replace($string_replace, '-',$_FILES["image_portfolio"]["name"]);
      }else{
         $image_name='bodro-bilowo-elhace-'.str_replace($string_replace, '-',$_FILES["image_portfolio"]["name"]);
      }

      if(isset($_FILES["image_portfolio"]["name"])){
         $config['upload_path'] = './upload_file/portfolio';
         $config['allowed_types'] = 'jpg|jpeg|png|gif';
         $config['file_name'] = $image_name;
         $this->upload->initialize($config);
         if(!$this->upload->do_upload('image_portfolio')){
            $this->upload->display_errors();
            return FALSE;
         }else{
            $data = $this->upload->data();
                //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./upload_file/portfolio'.'/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            //$config['quality']= '60%';
            //$config['width']= 800;
            //$config['height']= 800;
            $config['new_image']= './upload_file/portfolio'.'/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            //echo base_url().'upload_file/news/'.$this->session->userdata('news_folder').'/'.$data['file_name'];
         }
      }

      if ($this->M_admin->save_portfolio($category, $meta_description, $meta_keyword, $title, $image_name, $description, $create_date, $publish_status) == TRUE) {
         $this->session->set_flashdata('notif' , 'true');
         $this->session->set_flashdata('teks_notif' , "portfolio added successfully");
      }else{
         $this->session->set_flashdata('notif' , 'false');
         $this->session->set_flashdata('teks_notif' , "portfolio failed to add");
      }
           
      redirect(base_url() ."admin-portfolio-form/", 'refresh');

   }

   function save_portfolio_update()
   {
      $id_portfolio = $this->input->post('id');
      $category = $this->input->post('category');
      $name_image = $this->input->post('name_image');
      $meta_description = $this->input->post('meta_description');
      $meta_keyword = $this->input->post('meta_keyword');
      $title = $this->input->post('port_title');
      $description = $this->input->post('description');
      $create_date= $this->input->post('created_date');
      $updated_date= $this->input->post('updated_date');


      if(!empty($_FILES["image_portfolio"]["name"])){
         
         unlink('./upload_file/portfolio/'.$name_image);

         $config['upload_path'] = './upload_file/portfolio';
         $config['allowed_types'] = 'jpg|jpeg|png|gif';
         $config['file_name'] = $name_image;
         $this->upload->initialize($config);
         if(!$this->upload->do_upload('image_portfolio')){
            $this->upload->display_errors();
            return FALSE;
         }else{
            $data = $this->upload->data();
                //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./upload_file/portfolio'.'/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= TRUE;
            //$config['quality']= '60%';
            //$config['width']= 800;
            //$config['height']= 800;
            $config['new_image']= './upload_file/portfolio'.'/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            //echo base_url().'upload_file/news/'.$this->session->userdata('news_folder').'/'.$data['file_name'];
         }
         
      }
      

      if ($this->M_admin->save_portfolio_update($id_portfolio ,$category, $meta_description, $meta_keyword, $title, $name_image, $description, $create_date, $updated_date) == TRUE) {
         $this->session->set_flashdata('notif' , 'true');
         $this->session->set_flashdata('teks_notif' , "portfolio has been successfully updated");
      }else{
         $this->session->set_flashdata('notif' , 'false');
         $this->session->set_flashdata('teks_notif' , "portfolio failed to update");
      }
           
      redirect(base_url() ."admin-portfolio-edit/".$id_portfolio, 'refresh');
      
      
   }

   function portfolio_read()
   {   
      $id_portfolio=$this->input->post('id_portfolio');

      //$read_portfolio = $this->db->get_where('portfolio', array('id_portfolio'=>$id_portfolio))->row();

      $this->db->select('*');
      $this->db->from('portfolio');
      $this->db->join('portfolio_category','portfolio_category.id_category = portfolio.id_category');
      $this->db->where('id_portfolio', $id_portfolio);
      $read_portfolio = $this->db->get()->row();

      $callback = array(
         'category_name' => $read_portfolio->category_name,
         'meta_description' => $read_portfolio->meta_description,
         'meta_keyword' => $read_portfolio->meta_keyword,
         'title' => $read_portfolio->title,
         'image' => $read_portfolio->image,
         'description' => $read_portfolio->description,
         'create_date' => date('d-m-Y', strtotime($read_portfolio->create_date)),
         'url_slug' => $read_portfolio->url_slug
      );
       echo json_encode($callback);
   }

   function portfolio_status()
   {   
      $id_portfolio=$this->input->post('id_portfolio');
      $portfolio_status=$this->input->post('portfolio_status');

      if($this->M_admin->portfolio_status_update($id_portfolio, $portfolio_status))
      {
         $result = 'true';
      }else{
         $result = 'false';
      }
      
      $callback = array(
         'notif' => $result
      );
      
      echo json_encode($callback);
   }

   function portfolio_delete($id_portfolio)
   {
      $read_portfolio = $this->db->get_where('portfolio', array('id_portfolio'=>$id_portfolio))->row();

      if ($this->M_admin->portfolio_delete($id_portfolio) == TRUE) {

         unlink('upload_file/portfolio/'.$read_portfolio->image);

         $this->session->set_flashdata('notif' , 'true');
         $this->session->set_flashdata('teks_notif' , "portfolio deleted successfully");
      }else{
         $this->session->set_flashdata('notif' , 'false');
         $this->session->set_flashdata('teks_notif' , "portfolio failed to delete");
      }
        
        redirect(base_url() ."admin-portfolio", 'refresh');
   }


    function logo()
   {   
      if ($this->session->userdata('admin_login') != 'TRUE')
      redirect(base_url(), 'refresh');
      
      $this->load->view('backend/header');
      $this->load->view('backend/logo_form');
      $this->load->view('backend/footer');
   }

   function save_logo()
   {
      unlink('assets/frontend/img/main_logo.png');
      $config['upload_path'] = './assets/frontend/img';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $config['file_name'] = 'main_logo.png';
      $this->upload->initialize($config);
      if(!$this->upload->do_upload('logo')){
         $this->upload->display_errors();
         return FALSE;
      }else{
         $data = $this->upload->data();
          //Compress Image
         $config['image_library']='gd2';
         $config['source_image']='./assets/frontend/img'.'/'.$data['file_name'];
         $config['create_thumb']= FALSE;
         $config['maintain_ratio']= TRUE;
            //$config['quality']= '60%';
            //$config['width']= 800;
            //$config['height']= 800;
         $config['new_image']= './assets/frontend/img'.'/'.$data['file_name'];
         $this->load->library('image_lib', $config);
         $this->image_lib->resize();
      }
      $this->session->set_flashdata('notif' , 'true');
      $this->session->set_flashdata('teks_notif' , "successfully updated");
           
      redirect(base_url() ."admin-logo/", 'refresh');
   }

    function footer()
   {   
      if ($this->session->userdata('admin_login') != 'TRUE')
      redirect(base_url(), 'refresh');
      
      $data['web'] = $this->db->get_where('website', array('id_website'=>'1'))->row();
      $this->load->view('backend/header');
      $this->load->view('backend/footer_form', $data);
      $this->load->view('backend/footer');
   }
    function save_footer()
   {
      $footer = $this->input->post('footer');
     
         if ($this->M_admin->save_footer($footer) == TRUE) {
         $this->session->set_flashdata('notif' , 'true');
         $this->session->set_flashdata('teks_notif' , "successfully updated");
         }else{
            $this->session->set_flashdata('notif' , 'false');
            $this->session->set_flashdata('teks_notif' , "failed to update");
         }
           
           redirect(base_url() ."admin-footer/", 'refresh');
   }

    function meta()
   {   
      if ($this->session->userdata('admin_login') != 'TRUE')
      redirect(base_url(), 'refresh');
      $data['web'] = $this->db->get_where('website', array('id_website'=>'1'))->row();
      $this->load->view('backend/header');
      $this->load->view('backend/meta', $data);
      $this->load->view('backend/footer');
   }

   function save_meta()
   {
      $meta_description = $this->input->post('meta_description');
      $meta_keyword = $this->input->post('meta_keyword');
     
         if ($this->M_admin->save_meta($meta_description, $meta_keyword) == TRUE) {
         $this->session->set_flashdata('notif' , 'true');
         $this->session->set_flashdata('teks_notif' , "successfully updated");
         }else{
            $this->session->set_flashdata('notif' , 'false');
            $this->session->set_flashdata('teks_notif' , "failed to update");
         }
           
           redirect(base_url() ."admin-meta/", 'refresh');
   }


    function social_media()
   {   
      if ($this->session->userdata('admin_login') != 'TRUE')
      redirect(base_url(), 'refresh');
       $data['web'] = $this->db->get_where('website', array('id_website'=>'1'))->row();
      $this->load->view('backend/header');
      $this->load->view('backend/media_social', $data);
      $this->load->view('backend/footer');
   }

   function save_social_media()
      {
         $email = $this->input->post('email');
         $facebook = $this->input->post('facebook');
         $twitter = $this->input->post('twitter');
         $instagram = $this->input->post('instagram');
        
            if ($this->M_admin->save_social_media($email, $facebook, $twitter, $instagram) == TRUE) {
            $this->session->set_flashdata('notif' , 'true');
            $this->session->set_flashdata('teks_notif' , "successfully updated");
            }else{
               $this->session->set_flashdata('notif' , 'false');
               $this->session->set_flashdata('teks_notif' , "failed to update");
            }
              
              redirect(base_url() ."admin-social-media/", 'refresh');
      }

   function embed_map()
   {   
      if ($this->session->userdata('admin_login') != 'TRUE')
      redirect(base_url(), 'refresh');
       $data['web'] = $this->db->get_where('website', array('id_website'=>'1'))->row();
      $this->load->view('backend/header');
      $this->load->view('backend/embed_map', $data);
      $this->load->view('backend/footer');
   }

    function save_embed_map()
      {
         $embed_map = $this->input->post('embed_map');
        
            if ($this->M_admin->save_embed_map($embed_map) == TRUE) {
            $this->session->set_flashdata('notif' , 'true');
            $this->session->set_flashdata('teks_notif' , "successfully updated");
            }else{
               $this->session->set_flashdata('notif' , 'false');
               $this->session->set_flashdata('teks_notif' , "failed to update");
            }
              
              redirect(base_url() ."admin-embed-map/", 'refresh');
      }
   function setting()
   {   
      if ($this->session->userdata('admin_login') != 'TRUE')
      redirect(base_url(), 'refresh');
      $data['web'] = $this->db->get_where('website', array('id_website'=>'1'))->row();
      $this->load->view('backend/header');
      $this->load->view('backend/profile', $data);
      $this->load->view('backend/footer');
   }

   function save_setting()
   {
      $name = $this->input->post('name');
      $email = $this->input->post('email');
      $username = $this->input->post('username');

      if ($this->M_admin->save_setting($name, $email, $username, $this->session->userdata('id_admin')) == TRUE) {
            $this->session->set_flashdata('notif' , 'true');
            $this->session->set_flashdata('teks_notif' , "successfully updated");

            $this->session->set_userdata('nama_admin', $name);
            $this->session->set_userdata('email', $email);
            $this->session->set_userdata('username', $username);

      }else{
            $this->session->set_flashdata('notif' , 'false');
            $this->session->set_flashdata('teks_notif' , "failed to update");
      }
           
           redirect(base_url() ."admin-edit-profile/", 'refresh');

      
   }
   function setting_check_pass()
   {
      $id_admin=$this->input->post('id_admin');
      $pass=$this->input->post('pass');

      $check= $this->db->get_where('admin', array('id_admin'=>$id_admin, 'password'=>sha1($pass)))->result_array();

      if (count($check)>0) {
         $result = 'true';
      }elseif (count($check)<1){
         $result = 'false';
      }

      $callback = array(
         'notif' => $result
      );
       echo json_encode($callback);
   }
    function save_setting_password()
   {
      $repassword = $this->input->post('repassword');

      if ($this->M_admin->save_setting_password($repassword, $this->session->userdata('id_admin')) == TRUE) {
            $this->session->set_flashdata('notif' , 'true');
            $this->session->set_flashdata('teks_notif' , "password updated successfully");

      }else{
            $this->session->set_flashdata('notif' , 'false');
            $this->session->set_flashdata('teks_notif' , "password failed to update");
      }
           
           redirect(base_url() ."admin-edit-profile/", 'refresh');

      
   }

   function send_message()
   {
         header('Access-Control-Allow-Origin: *');
         header("Access-Control-Allow-Methods: POST, OPTIONS");
         $name = $this->input->post('name');
         $email = $this->input->post('email');
         $message = $this->input->post('message');
         
         $ip = $this->input->post('ip');
         $browser = $this->input->post('browser');
         $os = $this->input->post('os');
         $create = date('Y-m-d');
         $time = date('H:i');
         
         $check_email = $this->M_admin->check_email_message($email);
         if (count($check_email)<1) {
            
            $email_admin = $this->M_admin->email_admin();
            $this->load->library('mailer2');
            $recipient_email = $email_admin->email_link;
            $subject = 'Elhace Message';
                   
            $content = $this->load->view('backend/email/message', array('name'=>$name,'email'=>$email,'message'=>$message), true); 
            $sendmail = array(
               'recipient_email'=>$recipient_email,
               'subject'=>$subject,
               'content'=>$content
                     //'attachment'=>$attachment
            );
            $send = $this->mailer2->send($sendmail);
            
            date_default_timezone_set('Asia/Jakarta');
            $this->db->insert('email_message', array('name'=>$name, 'email'=>$email, 'message'=>$message, 'ip'=>$ip, 'browser'=>$browser, 'os'=>$os, 'create'=> $create, 'time'=> $time));
            
            $callback = array(
               'notif_email' => $send['status']
            );
            echo json_encode($callback);
         }else{
            $callback = array(
               'notif_email' => 'no'
            );
            echo json_encode($callback);
         }
   }


   function notif_mail()
   {
      $this->load->library('mailer');

      $content =  $this->load->view('frontend/template_email/notif_email', array(), true);
      $recipient_email = 'brajamusti570@gmail.com';
      $subject = 'Lengkapi Perusahaan Anda';
      // Ambil isi file content.php dan masukan ke variabel $content
      $sendmail = array(
         'email_penerima'=>$recipient_email,
         'subject'=>$subject,
         'content'=>$content
        //'attachment'=>$attachment
      );
      $send = $this->mailer->send($sendmail);
   }
//TIDAK DIPAKAI END--====================================================== 
 }


?>