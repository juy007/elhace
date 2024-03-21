<?php 
   define("BASEPATH", dirname(__FILE__));
   include 'config/api_config.php';

   $page = $_POST['page'];
   //$type_page = $_POST['type'];
   //if ($_POST['type']=='type_page') {

      $get_news_page = file_get_contents($url_api.'news_page/'.$page.'/'.$key_api);
      $data_get_news_page = json_decode($get_news_page, true);

      $get_news_count = file_get_contents($url_api.'news/'.$key_api);
      $data_get_news_count = json_decode($get_news_count, true);
   //}else if ($_POST['type']=='type_search') {
   // $news_title = $_POST['news_title'];
   // $get_news_page = file_get_contents($url_api.'news_search/'.$page.'/'.$news_title.'/'.$key_api);
   //}

   

   $data_news = count($data_get_news_count['news']);
   if ($data_news >0) {
    $total = ceil($data_news/6);
   }else{
    $total = 0;
   }

?>
<!--
<div class="tokyo_tm_title">
   <div class="title_flex">
      <div class="left">
         <h4 style="font-size:17px;">Page <?php echo $_POST['page']; ?> / <?php echo $total; ?></h4>
      </div>
   </div>
</div>
-->
<ul>   
  <?php
      if ($data_news > 0) {
         foreach($data_get_news_page['news'] as $news){
   ?>
   <li>
      <div class="list_inner">
         <div class="" style="height: 200px; background-repeat: no-repeat; background-size: cover; background-image: url(<?php echo $back_root; ?>upload_file/news/<?php echo $news['news_folder']; ?>/image_news.png);background-position: center center;">
                     <!--   
                        <img style="" src="<?php echo $back_root; ?>upload_file/news/<?php echo $news['news_folder']; ?>/image_news.png" alt="" />-->
            <a class="tokyo_tm_full_link" href="<?php echo $root; ?>news/<?php echo $news['url_slug']; ?>"></a>
         </div>
         <div class="details" style="height: 250px;">
            <div class="extra">
               <div class="short">
                  <p class="date">By <a href="#">Bodro Bilowo</a> <span><?php echo date('d/m/Y', strtotime($news['create_date'])); ?></span></p>
                  <span>Category : <?php echo $news['news_category_name']; ?></span>
               </div>
            </div>
            <h3 class="title">
               <a href="<?php echo $root; ?>news/<?php echo $news['url_slug']; ?>">
                  <?php 
                     if(strlen($news['news_title']) > 80){
                        echo substr($news['news_title'], 0, 80).'...'; 
                     }else{
                        echo $news['news_title'];
                     }
                  ?>
               </a>
            </h3>
            <div class="tokyo_tm_read_more">
               <a href="<?php echo $root; ?>news/<?php echo $news['url_slug']; ?>"><span>Read More</span></a>
            </div>
         </div>
         <div class="main_content">
            <div class="descriptions">
              <p class="bigger">
                <?php echo $news['news_text']; ?>
             </p>
         </div>
         <div class="news_share">
            <span>Share:</span>
            <ul>
               <li><a href="#"><img class="svg" src="assets/img/svg/social/facebook.svg" alt="" /></a></li>
               <li><a href="#"><img class="svg" src="assets/img/svg/social/twitter.svg" alt="" /></a></li>
               <li><a href="#"><img class="svg" src="assets/img/svg/social/instagram.svg" alt="" /></a></li>
               <li><a href="#"><img class="svg" src="assets/img/svg/social/dribbble.svg" alt="" /></a></li>
               <li><a href="#"><img class="svg" src="assets/img/svg/social/tik-tok.svg" alt="" /></a></li>
            </ul>
         </div>
      </div>
   </li>
<?php 
      }
   }else{
      echo "<h3 style='text-align:center;'>not available</h3>";
   }
?>
<li style="width:100%;">
   <?php 
          //$total = 22;//ceil($data_news/6);//pembulatan
          $page_get=$page;
          ?>
          <div class="pagination-wrapper">
            <div class="pagination">

               <?php if ($page_get > 1) { ?>
                  <a id="page_prev" class="prev page-numbers" onclick="news_load_page('<?php echo $page_get-1;?>','type_page','page_load')"></a>
               <?php } ?>

               <?php if ($page_get <= 3) {

                        if ($total <=5) {$page_limit = $total;}else{$page_limit = 5;}

                        for ($i=1; $i <= $page_limit; $i++) { 
                           if ($i==$page_get) {
               ?>
                              <a class="page-numbers current" onclick="news_load_page('<?php echo $i; ?>','type_page','page_load');">
                                 <?php echo $i; ?>
                              </a>
               <?php       }else{
               ?>
                              <a class="page-numbers" onclick="news_load_page('<?php echo $i; ?>','type_page','page_load');">
                                 <?php echo $i; ?>
                              </a>
               <?php       }
                        }
               ?>
               <?php }else if ($page_get > 3) {

                        if ($total-$page_get > 2) {   $page_limit = $page_get+2;}else if($total-$page_get <= 2){$page_limit = $total;}

                        for ($i=$page_get-2; $i <= $page_limit; $i++) { 
                           if ($i==$page_get) {
                              ?>
                              <a class="page-numbers current" onclick="news_load_page('<?php echo $i; ?>','type_page','page_load');">
                                 <?php echo $i; ?>
                              </a>
               <?php       }else{
               ?>
                              <a class="page-numbers" onclick="news_load_page('<?php echo $i; ?>','type_page','page_load');">
                                 <?php echo $i; ?>
                              </a>
               <?php       }
                        }
                     }
               ?>

               <?php if ($page_get< $total) { ?>
                  <a id="page_next" class="next page-numbers" onclick="news_load_page('<?php echo $page_get+1;?>','type_page','page_load')"></a>
               <?php } ?>

            </div>
         </div>
      </li>
   </ul>

<script src="assets/js/jquery.js"></script>
<!--[if lt IE 10]> <script type="text/javascript" src="assets/js/ie8.js"></script> <![endif]-->
<script src="assets/js/plugins.js"></script>
<script src="assets/js/init.js"></script>