<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php'; 

class Api extends REST_Controller{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('M_api');
       
    }
    function ok_get() {
      $response = $this->M_api->ok();
      foreach ($response['buah'] as $key => $value) {
         echo $value.'<hr>';
      }
    }
    public function index_get()
    {
         $response = $this->M_api->key_error();
         $this->response($response);
    }
   //WEBSITE================================================
    public function website_get()
    {
         $response = $this->M_api->website();
         $this->response($response);
    }

    //NEWS===================================================
    public function news_get($key)
    {
	require APPPATH. "config/key.php";
      if ($key== $key_api) {
         $response = $this->M_api->all_news();
         $this->response($response);
      }else{
         $response = $this->M_api->key_error();
         $this->response($response);
      }
    
    }

     public function news_page_get($page, $key)
    {
      require APPPATH. "config/key.php";
      if ($key== $key_api) {
         $response = $this->M_api->page_news($page);
         $this->response($response);
      }else{
         $response = $this->M_api->key_error();
         $this->response($response);
      }
    
    }

    public function news_latest_get($key)
    {
      require APPPATH. "config/key.php";
      if ($key== $key_api) {
         $response = $this->M_api->latest_news();
         $this->response($response);
      }else{
         $response = $this->M_api->key_error();
         $this->response($response);
      }
    
    }

    public function news_select_get($url_slug, $key)
    {
      require APPPATH. "config/key.php";
      if ($key== $key_api) {
         $response = $this->M_api->select_news($url_slug);
         $this->response($response);
      }else{
         $response = $this->M_api->key_error();
         $this->response($response);
      }
    
    }

    public function news_search_get($page, $news_title, $key)
    {
      require APPPATH. "config/key.php";
      if ($key== $key_api) {
         $response = $this->M_api->search_news($page, $news_title);
         $this->response($response);
      }else{
         $response = $this->M_api->key_error();
         $this->response($response);
      }
    
    }

    public function news_view_post()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: POST, OPTIONS");
        $response = $this->M_api->news_view($this->input->post('id'),$this->input->post('ip'),$this->input->post('browser'),$this->input->post('os'));
        $this->response($response);
    }

    public function news_view_count_get($id_news, $key)
    {
      require APPPATH. "config/key.php";
      if ($key== $key_api) {
         $response = $this->M_api->news_view_count($id_news);
         $this->response($response);
      }else{
         $response = $this->M_api->key_error();
         $this->response($response);
      }
    
    }

    //PORTFOLIO================================================
    public function portfolio_get($page, $key)
    {
      require APPPATH. "config/key.php";
      if ($key== $key_api) {
         $response = $this->M_api->all_portfolio($page);
         $this->response($response);
      }else{
         $response = $this->M_api->key_error();
         $this->response($response);
      }
    
    }

    public function portfolio_select_get($url_slug, $key)
    {
      require APPPATH. "config/key.php";
      if ($key== $key_api) {
         $response = $this->M_api->select_portfolio($url_slug);
         $this->response($response);
      }else{
         $response = $this->M_api->key_error();
         $this->response($response);
      }
    
    }

    function portfolio_select_category_get($category, $key)
    {
        require APPPATH. "config/key.php";
          if ($key== $key_api) {
             $response = $this->M_api->select_select_portfolio_by_category(str_replace('-',' ',$category));
             $this->response($response);
          }else{
             $response = $this->M_api->key_error();
             $this->response($response);
          }
    }

    function portfolio_by_category_get($page, $category, $key)
    {
        require APPPATH. "config/key.php";
          if ($key== $key_api) {
             $response = $this->M_api->select_portfolio_by_category($page, $category);
             $this->response($response);
          }else{
             $response = $this->M_api->key_error();
             $this->response($response);
          }
    }

    public function portfolio_category_get($key)
    {
      require APPPATH. "config/key.php";
      if ($key== $key_api) {
         $response = $this->M_api->category_portfolio();
         $this->response($response);
      }else{
         $response = $this->M_api->key_error();
         $this->response($response);
      }
    
    }

    public function portfolio_view_post()
   {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: POST, OPTIONS");
        $response = $this->M_api->portfolio_view($this->input->post('id'),$this->input->post('ip'),$this->input->post('browser'),$this->input->post('os'));
        $this->response($response);
   }

    public function portfolio_view_count_get($id_portfolio, $key)
    {
      require APPPATH. "config/key.php";
      if ($key== $key_api) {
         $response = $this->M_api->portfolio_view_count($id_portfolio);
         $this->response($response);
      }else{
         $response = $this->M_api->key_error();
         $this->response($response);
      }
    
    }


   //TRAFFIC================================================
   public function traffic_post()
   {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: POST, OPTIONS");
        $response = $this->M_api->traffic($this->input->post('ip'),$this->input->post('browser'),$this->input->post('os'));
        $this->response($response);
   }

   




    /*
    public function index_get($key)
    {
      if ($key== $key_api) {
         $response = $this->M_api->all_news();
         $this->response($response);
      }else{
         $response = $this->M_api->key_error();
         $this->response($response);
      }
    
    }

    public function index_get($key)
    {
      if ($key== '12345') {
         $response = $this->M_api->all_person();
         $this->response($response);
      }else{
         $response = $this->M_api->key_error();
         $this->response($response);
      }
    
  }

  public function where_get($id)
  {
    $response = $this->M_api->where_person($id);
    $this->response($response);
  }
// untuk menambah person menaggunakan method post
  public function add_post()
  {
    $response = $this->M_api->add_person(
        $this->post('name'),
        $this->post('address'),
        $this->post('phone')
      );
    $this->response($response);
  }
// update data person menggunakan method put
  public function update_put()
  {
    $response = $this->M_api->update_person(
        $this->put('id'),
        $this->put('name'),
        $this->put('address'),
        $this->put('phone')
      );
    $this->response($response);
  }
// hapus data person menggunakan method delete
  public function delete_delete()
  {
    $response = $this->M_api->delete_person(
        $this->delete('id')
      );
    $this->response($response);
  }*/
}


?>