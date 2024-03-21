<?php 
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Client extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
      $this->load->library('upload');
      $this->load->library('encryption');
      $this->load->helper('security');
      $this->load->helper('url');
      $this->load->library('curl');
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
      $data['dat'] = json_decode($this->curl->simple_get('https://api-alquranid.herokuapp.com/surah'));
      $this->load->view('client',$data);

   }  
   function get_buka($no)
   {
      $data['dat'] = json_decode($this->curl->simple_get('https://api-alquranid.herokuapp.com/surah/'.$no));
      $this->load->view('get',$data);
   }

   function kemenag()
   {
      $data['dat'] = json_decode($this->curl->simple_get('https://quran.kemenag.go.id/api/v1/surah'));
      $this->load->view('kemenag',$data);
   }
    function kemenag_detail($id, $jml_ayat)
   {
      $data['dat'] = json_decode($this->curl->simple_get('https://quran.kemenag.go.id/api/v1/ayatweb/'.$id.'/0/0/'.$jml_ayat));

      if ($id < 10) { $aa= '00'.$id; }elseif($id >= 10 && $id < 100){ $aa = '0'.$id; }else{$aa=$id;}
      

      $data['link_mp3']= $aa;
      $this->load->view('kemenag_detail',$data);
   }


}


?>