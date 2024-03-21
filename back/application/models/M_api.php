<?php
// extends class Model
class M_api extends CI_Model{
  
// response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }
  function ok(){
    $response = ['buah'=>['jeruk','pisang','anggur'],'umbi'=>'boled'];
    return $response;
  }
  //WEBSITE
  public function website()
  {
    $this->db->where('id_website', '1');
    $result = $this->db->get("website")->row();
    $response['meta_description']=$result->meta_description;
    $response['meta_keyword']=$result->meta_keyword;
    $response['facebook_link']=$result->facebook_link;
    $response['twitter_link']=$result->twitter_link;
    $response['instagram_link']=$result->instagram_link;
     $response['embed_twitter']=$result->embed_twitter;
    $response['embed_instagram']=$result->embed_instagram;
    $response['embed_map']=$result->embed_map;
    $response['footer']=$result->footer;
    return $response;
  }

  //NEWS
  public function all_news()
  {
    //$this->db->where('news_status', 'yes');
    //$this->db->order_by('id_news', 'DESC');
    //$result = $this->db->get("news")->result();

    
    $this->db->select('*');
    $this->db->from('news');
    $this->db->join('news_category','news_category.id_news_category = news.id_news_category');
    $this->db->where('news_status', 'yes');
    $this->db->order_by('id_news', 'DESC');
  
    $result = $this->db->get()->result();
    $response['status']=200;
    $response['error']=false;
    $response['message']="Successfully";
    $response['news']=$result;
    return $response;
  }

   public function page_news($page)
  {
    $page=$page-1;
    $page = $page*6;
    /*
    $this->db->where('news_status', 'yes');
    $this->db->order_by('id_news', 'DESC');
    $this->db->limit(6,$page);
    //$this->db->limit(jumlah tampil, dimulai dari no, 'DESC');
    $result = $this->db->get("news")->result();
    */
    $this->db->select('*');
    $this->db->from('news');
    $this->db->join('news_category','news_category.id_news_category = news.id_news_category');
    $this->db->where('news_status', 'yes');
    $this->db->order_by('id_news', 'DESC');
    $this->db->limit(6,$page);
    $result = $this->db->get()->result();
    $response['status']=200;
    $response['error']=false;
    $response['message']="Successfully";
    $response['news']=$result;
    return $response;
  }

   public function latest_news()
  {
    $this->db->where('news_status', 'yes');
    $this->db->limit(1);
    $this->db->order_by('id_news', 'DESC');
    $result = $this->db->get("news")->result();
    $response['status']=200;
    $response['error']=false;
    $response['message']="Successfully";
    $response['news']=$result;
    return $response;
  }

  public function select_news($url_slug)
  {
      /*
      $this->db->like('url_slug', $url_slug, 'both');
      $this->db->limit(1);
      $result = $this->db->get("news")->row();
      */

      $this->db->select('*');
      $this->db->from('news');
      $this->db->join('news_category','news_category.id_news_category = news.id_news_category');
      $this->db->where('news_status', 'yes');
      $this->db->like('url_slug', $url_slug, 'both');
      $this->db->limit(1);
      $result = $this->db->get()->row();
      $response['id_news']=$result->id_news;
      $response['category']=$result->news_category_name;
      $response['meta_description']=$result->meta_description;
      $response['meta_keyword']=$result->meta_keyword;
      $response['news_title']=$result->news_title;
      $response['news_text']=$result->news_text;
      $response['create_date']=$result->create_date;
      $response['updated_date']=$result->updated_date;
      $response['news_folder']=$result->news_folder;
      $response['url_slug']=$result->url_slug;
      return $response;
  }

  public function search_news($page, $news_title)
  {
    $page=$page-1;
    $page = $page*6;
    $this->db->like('news_title', $news_title);
    $this->db->where('news_status', 'yes');
    $this->db->order_by('id_news', 'DESC');
    $this->db->limit(6,$page);
    //$this->db->limit(jumlah tampil, dimulai dari no, 'DESC');
    $result = $this->db->get("news")->result();
    $response['status']=200;
    $response['error']=false;
    $response['message']="Successfully";
    $response['news']=$result;
    return $response;
  }

  function news_view($id, $ip, $browser, $os)
  {
      date_default_timezone_set('Asia/Jakarta');
      $data = array(
          "id_news"=>$id,
          "ip"=>$ip,
          "browser"=>$browser,
          "os"=>$os,
          "access_date"=> date('Y-m-d'),
          "time" => date('H:i')
        );
      $this->db->insert("news_view", $data);
      $response['notif']='Success';
      return $response;
    
  }

  function news_view_count($id_news)
  {
    $this->db->where('id_news', $id_news);
    $result = $this->db->get("news_view")->result();
    $response['status']=200;
    $response['error']=false;
    $response['message']="Successfully";
    $response['news']=$result;
    return $response;
  }

  //PORTFOLIO
  public function all_portfolio($page)
  {
      $page=$page-1; $page = $page*6;
      $this->db->select('*');
      $this->db->from('portfolio');
      $this->db->join('portfolio_category','portfolio.id_category = portfolio_category.id_category');
      $this->db->where('portfolio_status', 'yes');
      //$this->db->limit(6,$page);
      $this->db->order_by('id_portfolio', 'DESC');
      $result = $this->db->get()->result();
      $response['status']=200;
      $response['error']=false;
      $response['message']="Successfully";
      $response['portfolio']=$result;
      return $response;
  }

  public function select_portfolio($url_slug)
  {

      $this->db->select('*');
      $this->db->from('portfolio');
      $this->db->join('portfolio_category','portfolio.id_category = portfolio_category.id_category');
      $this->db->where('portfolio_status', 'yes');
      $this->db->where('url_slug', $url_slug);
      $this->db->limit(1);
      $result = $this->db->get()->row();
      $response['id_portfolio']=$result->id_portfolio;
      $response['category_name']=$result->category_name;
      $response['title']=$result->title;
      $response['description']=$result->description;
      $response['image']=$result->image;
      $response['create_date']=$result->create_date;
      $response['url_slug']=$result->url_slug;
    return $response;
  }

  function select_select_portfolio_by_category($category)
  {
      $this->db->select('*');
      $this->db->from('portfolio');
      $this->db->join('portfolio_category','portfolio.id_category = portfolio_category.id_category');
      $this->db->where('portfolio_status', 'yes');
      $this->db->where('category_name', $category);
      $this->db->order_by('id_portfolio', 'DESC');
      $result = $this->db->get()->result();

      $response['status']=200;
      $response['error']=false;
      $response['message']="Successfully";
      $response['portfolio']=$result;
      return $response;
  }

  function select_portfolio_by_category($page, $category)
  {
    $page=$page-1; $page = $page*6;
      $this->db->select('*');
      $this->db->from('portfolio');
      $this->db->join('portfolio_category','portfolio.id_category = portfolio_category.id_category');
      $this->db->where('portfolio_status', 'yes');
      $this->db->where('portfolio.id_category', $category);
      $this->db->limit(6,$page);
      $result = $this->db->get()->result();
      $response['status']=200;
      $response['error']=false;
      $response['message']="Successfully";
      $response['portfolio']=$result;
      return $response;
  }

  function category_portfolio()
  {
      $this->db->order_by('id_category', 'DESC');
      $result = $this->db->get("portfolio_category")->result();
      $response['status']=200;
      $response['error']=false;
      $response['message']="Successfully";
      $response['category']=$result;
      return $response;
  }

  function portfolio_view($id, $ip, $browser, $os)
  {
      date_default_timezone_set('Asia/Jakarta');
      $data = array(
          "id_portfolio"=>$id,
          "ip"=>$ip,
          "browser"=>$browser,
          "os"=>$os,
          "access_date"=> date('Y-m-d'),
          "time" => date('H:i')
        );
      $this->db->insert("portfolio_view", $data);
      $response['notif']='Success';
      return $response;
    
  }


  function portfolio_view_count($id_portfolio)
  {
    $this->db->where('id_portfolio', $id_portfolio);
    $result = $this->db->get("portfolio_view")->result();
    $response['status']=200;
    $response['error']=false;
    $response['message']="Successfully";
    $response['portfolio']=$result;
    return $response;
  }

  function traffic($ip, $browser, $os)
  {
    $check = $this->db->get_where("traffic", array('ip'=>$ip, 'access_date'=>date('Y-m-d')))->result_array();
    if (count($check)<1) {
      date_default_timezone_set('Asia/Jakarta');
      $data = array(
          "ip"=>$ip,
          "browser"=>$browser,
          "os"=>$os,
          "access_date"=> date('Y-m-d'),
          "time" => date('H:i')
        );
      $this->db->insert("traffic", $data);
      $response['notif']='Success';
      return $response;
    }else{
      $response['notif']='already available';
      return $response;
    }
    
  }
  function key_error()
   {
      $response['status']=404;
      $response['error']=true;
      $response['message']='Not Found';
      return $response;
   }
/*
// function untuk insert data ke tabel tb_person
  public function add_person($name,$address,$phone){
if(empty($name) || empty($address) || empty($phone)){
      return $this->empty_response();
    }else{
      $data = array(
        "name"=>$name,
        "address"=>$address,
        "phone"=>$phone
      );
$insert = $this->db->insert("tb_person", $data);
if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']="Successfully";
        $response['message']='Data person ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data person gagal ditambahkan.';
        return $response;
      }
    }
}
// mengambil semua data person
  public function all_person(){
$all = $this->db->get("tb_person")->result();
    $response['status']=200;
    $response['error']=false;
    $response['message']="Successfully";
    $response['person']=$all;
    return $response;
}
public function where_person($id){
$all = $this->db->get_where("tb_person", array('id'=>$id))->result();
    $response['status']=200;
    $response['error']=false;
    $response['message']="Successfully";
    $response['person']=$all;
    return $response;
}
// hapus data person
  public function delete_person($id){
if($id == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "id"=>$id
      );
$this->db->where($where);
      $delete = $this->db->delete("tb_person");
      if($delete){
        $response['status']=200;
        $response['error']=false;
        $response['message']="Successfully";
        $response['message']='Data person dihapus.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data person gagal dihapus.';
        return $response;
      }
    }
}

// update person
  public function update_person($id,$name,$address,$phone){
      if($id == '' || empty($name) || empty($address) || empty($phone)){
            return $this->empty_response();
      }else{
               $where = array(
                     "id"=>$id
                );
               $set = array(
                 "name"=>$name,
                 "address"=>$address,
                 "phone"=>$phone
               );
               $this->db->where($where);
               $update = $this->db->update("tb_person",$set);
               if($update){
                 $response['status']=200;
                 $response['error']=false;
                 $response['message']="Successfully";
                 $response['message']='Data person diubah.';
                 return $response;
               }else{
                 $response['status']=502;
                 $response['error']=true;
                 $response['message']='Data person gagal diubah.';
                 return $response;
               }
      }                                   
   }

   function key_error()
   {
      //$favorites = array(array("notif" => "Key Error"));
       $response['person']= 'Key Error';
       return $response;
   }
   */
}