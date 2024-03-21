<?php 
//echo  $_GET["post_url"];$adr=$_SERVER["PHP_SELF"]; $alamat=explode("/",$adr);$post=$alamat[3];$result=str_replace("$post","",$adr);
 ?>
 <?php 
    define("BASEPATH", dirname(__FILE__));
    include 'config/api_config.php';
    include 'config/api_address.php';

    $get_news_select = file_get_contents($url_api.'news_select/'.$_GET["post_url"].'/'.$key_api);//ok
    $data_get_news_select = json_decode($get_news_select, true);

    if (empty($data_get_news_select['news_text'])) { header("Location: ".$root."news"); }
   
    $meta_description = 'News - '.$data_get_news_select['meta_description'].' - '.$data_get_website['meta_description'];
    $meta_keyword = $data_get_news_select['meta_keyword'].', '.$data_get_website['meta_keyword'];

    $get_news_view = file_get_contents($url_api.'news_view_count/'.$data_get_news_select['id_news'].'/'.$key_api);
    $data_get_news_view = json_decode($get_news_view, true);

    include 'nav_start.php';
 ?>
 
    <div id="news_detail" class="tokyo_tm_section">
      <div class="container">
         <div class="tokyo_tm_about">
            <div class="about_image">
               <img src="<?php echo $back_root; ?>upload_file/news/<?php echo $data_get_news_select['news_folder']; ?>/image_news.png" alt="" />
               <div class="main" data-img-url="<?php echo $back_root; ?>upload_file/news/<?php echo $data_get_news_select['news_folder']; ?>/image_news.png"></div>
            </div>
            <div class="description-inner">
               <div class="info-inner-left">
                  <p class="date">By Bodro Bilowo</p>
               </div>
               <div class="info-inner-right">
                  <span>
                     Posted : <?php echo date('d/m/Y', strtotime($data_get_news_select['create_date'])); ?>
                     <?php 
                        if (!empty($data_get_news_select['updated_date'])) {
                            echo "<br>Updated : ".date('d/m/Y', strtotime($data_get_news_select['updated_date']));
                        }
                     ?>
                     <br><?php echo count($data_get_news_view['news']); ?> Views
                  </span>
               </div>
            </div><hr>
            <br>
            <h3 class="name"><?php  echo $data_get_news_select['news_title']; ?></h3>
            <div class="description_inner">
               <?php echo $data_get_news_select['news_text']; ?>
            </div>
            <br>
            <div class="btn-tokyo">
               <a href="<?php echo $root; ?>news">< Back</a>
            </div>
         </div>                  
      </div>
   </div>
                                                        
<?php include 'nav_end.php'; ?>
<script type="text/javascript">
    function _0x4a34(_0x599a17,_0x1e4e3b){var _0xfd9944=_0xfd99();return _0x4a34=function(_0x4a34a7,_0x12cdd9){_0x4a34a7=_0x4a34a7-0x11a;var _0x310af6=_0xfd9944[_0x4a34a7];return _0x310af6;},_0x4a34(_0x599a17,_0x1e4e3b);}function _0xfd99(){var _0x4e23fa=['#news_detail','active','3195997XpRImU','querySelector','1020138QHIZPA','818GpRwHi','8eWUjQx','955790lNmsqk','ready','classList','add','119FjUtEL','902844XOuXDs','5209245sZktFB','#m_news','988176niAmdL'];_0xfd99=function(){return _0x4e23fa;};return _0xfd99();}var _0x2b908f=_0x4a34;(function(_0x23f5f5,_0x5eb1e1){var _0x20da6f=_0x4a34,_0x5142f6=_0x23f5f5();while(!![]){try{var _0xb846a6=-parseInt(_0x20da6f(0x11b))/0x1*(-parseInt(_0x20da6f(0x125))/0x2)+parseInt(_0x20da6f(0x124))/0x3+-parseInt(_0x20da6f(0x11c))/0x4+parseInt(_0x20da6f(0x127))/0x5+-parseInt(_0x20da6f(0x11f))/0x6+parseInt(_0x20da6f(0x122))/0x7*(-parseInt(_0x20da6f(0x126))/0x8)+parseInt(_0x20da6f(0x11d))/0x9;if(_0xb846a6===_0x5eb1e1)break;else _0x5142f6['push'](_0x5142f6['shift']());}catch(_0x5d834d){_0x5142f6['push'](_0x5142f6['shift']());}}}(_0xfd99,0x4c196),$(document)[_0x2b908f(0x128)](function(){var _0x4bd41f=_0x2b908f;document[_0x4bd41f(0x123)](_0x4bd41f(0x120))[_0x4bd41f(0x129)][_0x4bd41f(0x11a)](_0x4bd41f(0x121)),document['querySelector'](_0x4bd41f(0x11e))[_0x4bd41f(0x129)][_0x4bd41f(0x11a)](_0x4bd41f(0x121));}));
    /*
    $(document).ready(function() {
         document.querySelector('#news_detail').classList.add('active');
         document.querySelector('#m_news').classList.add('active');
    })
    */
</script>

<script type="text/javascript">
   var id_news ="<?php echo $data_get_news_select['id_news'] ?>";
   var _0x37159d=_0x2d19;(function(_0x27808,_0x4a209f){var _0x51439c=_0x2d19,_0x3bea73=_0x27808();while(!![]){try{var _0x47a329=-parseInt(_0x51439c(0x1e9))/0x1+-parseInt(_0x51439c(0x1f0))/0x2*(parseInt(_0x51439c(0x1ea))/0x3)+-parseInt(_0x51439c(0x1e2))/0x4*(-parseInt(_0x51439c(0x1e3))/0x5)+parseInt(_0x51439c(0x1ed))/0x6*(parseInt(_0x51439c(0x1e6))/0x7)+parseInt(_0x51439c(0x1e5))/0x8*(parseInt(_0x51439c(0x1ef))/0x9)+-parseInt(_0x51439c(0x1e4))/0xa+parseInt(_0x51439c(0x1e1))/0xb*(parseInt(_0x51439c(0x1e0))/0xc);if(_0x47a329===_0x4a209f)break;else _0x3bea73['push'](_0x3bea73['shift']());}catch(_0x36cda3){_0x3bea73['push'](_0x3bea73['shift']());}}}(_0x2e6a,0xa4b56),window[_0x37159d(0x1ec)]=news_views());function _0x2d19(_0x3860a9,_0x4d211e){var _0x2e6ae4=_0x2e6a();return _0x2d19=function(_0x2d19c4,_0x32dbb7){_0x2d19c4=_0x2d19c4-0x1e0;var _0x5c78a9=_0x2e6ae4[_0x2d19c4];return _0x5c78a9;},_0x2d19(_0x3860a9,_0x4d211e);}function _0x2e6a(){var _0x450c9d=['POST','306038UjjVIS','3hetyWj','news_view','onload','13884SpVLKD','json','237996vqHaxO','2225358WkUXMH','8778204pSSZLw','11jrfroV','2111624xAnkbL','10QmuMij','6767000mneaxX','256DbbjmO','413yyClwn','ajax'];_0x2e6a=function(){return _0x450c9d;};return _0x2e6a();}function news_views(){var _0x3b7960=_0x37159d;$[_0x3b7960(0x1e7)]({'type':_0x3b7960(0x1e8),'url':url_api+_0x3b7960(0x1eb),'data':{'id':id_news,'ip':ip,'browser':browser,'os':os},'dataType':_0x3b7960(0x1ee),'success':function(_0x3e9627){}});}
   /*
      window.onload=news_views();
    function news_views()
    {
        $.ajax({
            type    : 'POST',
            url     : url_api+'news_view',
            data    : {'id': id_news, 'ip': ip, 'browser': browser, 'os':os},
            dataType: "json",
            success : function(response){
                                  
            }
        })
      }*/
</script>