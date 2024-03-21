<?php 
    defined("BASEPATH") or exit("No direct access allowed");

    //=================================================WEBSITE===============================================
    //WEBSITE STAR
    $get_website = file_get_contents($url_api.'website');
    $data_get_website = json_decode($get_website, true);
    
    //INPUT TRAFFIC
    //$get_news = file_get_contents($url_api.'traffic');

    //=================================================NEWS==================================================
    //GET NEWS
    //$get_news = file_get_contents($url_api.'news/'.$key_api);
    //$data_get_news = json_decode($get_news, true);

    //GET NEWS LATEST
    //$get_news_latest = file_get_contents($url_api.'news_latest/'.$key_api);
    //$data_get_news_latest = json_decode($get_news_latest, true);

    //GET NEWS AND PAGE
    //$get_news_page = file_get_contents($url_api.'news_page/'.$page.'/'.$key_api);
    //$data_get_news_page = json_decode($get_news_page, true);

    //GET NEWS SEARCH
    //$get_news_page = file_get_contents($url_api.'news_search/'.$page.'/'.$news_title.'/'.$key_api);
    //$data_get_news_page = json_decode($get_news_page, true);

    //GET NEWS select
    //$get_news_select = file_get_contents($url_api.'news_select/'.$_GET['url_slug'].'/'.$key_api);
    //$data_get_news_select = json_decode($get_news_select, true);

     //GET NEWS VIEW
    //$get_news_select = file_get_contents($url_api.'news_view/'.$_GET['id'].'/'.$key_api);
    //$data_get_news_select = json_decode($get_news_select, true);

    //$get_news_view = file_get_contents($url_api.'news_view_count/'.$data_get_news_select['id_news'].'/'.$key_api);
    //$data_get_news_view = json_decode($get_news_view, true);

    //=================================================PORTFOLIO=============================================   
    //GET PORTFOLIO
    //$get_portfolio = file_get_contents($url_api.'portfolio/'.$key_api);
    //$data_get_portfolio = json_decode($get_portfolio, true);

    //GET PORTFOLIO AND PAGE
    //$get_news_page = file_get_contents($url_api.'portfolio_page/'.$page.'/'.$key_api);
    //$data_get_news_page = json_decode($get_news_page, true);

    //GET PORTFOLIO SELECT
    //$get_portfolio_select = file_get_contents($url_api.'portfolio_select/'.$_GET['url_slug'].'/'.$key_api);
    //$data_get_portfolio_select = json_decode($get_portfolio_select, true);

    //GET PORTFOLIO BY CATEGORY
    //$get_portfolio_page = file_get_contents($url_api.'portfolio_by_category/'.$page.'/'.$category.'/'.$key_api);

    //GET PORTFOLIO CATEGORY
    //$get_portfolio_category = file_get_contents($url_api.'portfolio_category/'.$key_api);
    //$data_get_portfolio_category = json_decode($get_portfolio_category, true);

    //$get_news_select = file_get_contents($url_api.'portfolio_view_count/'.$_GET['id'].'/'.$key_api);
    //$data_get_news_select = json_decode($get_news_select, true);



// Mendapatkan IP pengunjung menggunakan getenv()
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'IP tidak dikenali';
    return $ipaddress;
}
  
  
// Mendapatkan IP pengunjung menggunakan $_SERVER
function get_client_ip_2() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'IP tidak dikenali';
    return $ipaddress;
}
  
  
// Mendapatkan jenis web browser pengunjung
function get_client_browser() {
    $browser = '';
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))
        $browser = 'Netscape';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
        $browser = 'Firefox';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
        $browser = 'Chrome';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
        $browser = 'Opera';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
        $browser = 'Internet Explorer';
    else
        $browser = 'Other';
    return $browser;
}

?>


<script type="text/javascript">
     var ip = '<?php echo get_client_ip(); ?>'; var browser = '<?php echo get_client_browser(); ?>'; var os = '<?php echo $_SERVER['HTTP_USER_AGENT']; ?>'; var url_api = '<?php echo $url_api; ?>';
    /*
    window.onload=traffic();
    function traffic()
    {
       
        $.ajax({
            type    : 'POST',
            url     : url_api+'traffic',
            data    : {'ip': ip, 'browser': browser, 'os':os},
            dataType: "json",
            success : function(response){
                                  
            }
        })
    }*/
</script>