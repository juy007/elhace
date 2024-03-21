<?php 
define("BASEPATH", dirname(__FILE__));
include 'config/api_config.php';
include 'config/api_address.php';
/*
$get_portfolio_category = file_get_contents($url_api.'portfolio_category/'.$key_api);
$data_get_portfolio_category = json_decode($get_portfolio_category, true);
*/
$get_portfolio = file_get_contents($url_api.'portfolio/1/'.$key_api);
$data_get_portfolio = json_decode($get_portfolio, true);


$meta_description = 'Elhace portfolio - '.$data_get_website['meta_description'];
$meta_keyword = 'elhace portfolio, '.$data_get_website['meta_keyword'];
include 'nav_start.php';

?> 
<link rel="stylesheet" type="text/css" href="assets/slick/slick-theme.css"/>
<link rel="stylesheet" type="text/css" href="assets/slick/slick.css"/>
<div class="tokyo_tm_portfolio_titles">
</div>

<div id="portfolio" class="tokyo_tm_section">
   <div class="container-portfolio">
      <div class="tokyo_tm_portfolio">
         <div class="tokyo_tm_title">
            <div class="title_flex">
               <div class="left" style="padding-left: 20px;">
                  <span>Portfolio</span>
                  <!--<h3>The Awesome Stuff</h3>-->
               </div>
               <!--
               <div class="portfolio_filter">
                  <ul>
                     <li><a href="#" id="all_categories" class="" onclick="portfolio_load_page('1','all','all');">All categories</a></li>
                     <?php foreach ($data_get_portfolio_category['category'] as $key => $valueCategory) { ?>
                     <li><a href="#" id="<?php echo "btn-categorie-".strtolower(str_replace(' ','_',$valueCategory['category_name'])); ?>" class="" onclick="portfolio_load_page('1','<?php echo "btn-categorie-".strtolower(str_replace(' ','_',$valueCategory['category_name'])); ?>','<?php echo $valueCategory['id_category']; ?>');"><?php echo $valueCategory['category_name']; ?></a></li>
                            <?php } ?>
                  </ul>
               </div>
               -->
            </div>
         </div>
         <div id="portfolio-list" class="list_wrapper">
            <div class="slider">
               <?php 
                  foreach ($data_get_portfolio['portfolio'] as $key => $valuePort) {
                   $valuePort
                ?>
               <div class="img-slide" style="background-image: url(<?php echo $back_root.'upload_file/portfolio/'.$valuePort['image']; ?>)">
                     <a class="link-slide" href="<?php echo $root; ?>portfolio/<?php echo $valuePort['url_slug']; ?>"></a>
                     <!--
                     <span style="background:rgba(0, 0, 0, 0.45);color: #FFF;padding: 2px 10px;z-index: 2;position: absolute;margin-top: -30px;margin-left: 12px;border-radius: 10px;"><?php echo $valuePort['category_name']; ?></span>
                     -->
               </div>

               <?php } ?>
               
           </div>
         </div>
      </div>
   </div>
</div>
<?php include 'nav_end.php'; ?>
<script type="text/javascript" src="assets/slick/slick.js"></script>
 <script>
        $(document).ready(function(){
            $('.slider').slick({
            autoplay: false,
            autoplaySpeed: 2500
            });
        });
    </script>
<script type="text/javascript">
    function _0x1958(_0xda5741,_0x2f78e5){var _0x1a5b55=_0x1a5b();return _0x1958=function(_0x1958ed,_0x262e1b){_0x1958ed=_0x1958ed-0x7b;var _0x4c211a=_0x1a5b55[_0x1958ed];return _0x4c211a;},_0x1958(_0xda5741,_0x2f78e5);}var _0x170b04=_0x1958;function _0x1a5b(){var _0x46acc7=['active','278757qYFuLS','6081925wTcixi','4732710nNciRW','56jbnhCL','11AxyvKC','112708cXNtZY','44ScoOHI','5508976EHQdIl','classList','70005AgWZSE','1467776ksQEhI','6BiqNnE','ready','#m_portfolio','add','querySelector'];_0x1a5b=function(){return _0x46acc7;};return _0x1a5b();}(function(_0x332a29,_0x54fcc3){var _0x4143b5=_0x1958,_0x4ca2fe=_0x332a29();while(!![]){try{var _0x5e57c2=-parseInt(_0x4143b5(0x8a))/0x1*(parseInt(_0x4143b5(0x8b))/0x2)+parseInt(_0x4143b5(0x7e))/0x3*(parseInt(_0x4143b5(0x7b))/0x4)+parseInt(_0x4143b5(0x87))/0x5*(-parseInt(_0x4143b5(0x80))/0x6)+parseInt(_0x4143b5(0x89))/0x7*(parseInt(_0x4143b5(0x7f))/0x8)+parseInt(_0x4143b5(0x86))/0x9+parseInt(_0x4143b5(0x88))/0xa+parseInt(_0x4143b5(0x7c))/0xb;if(_0x5e57c2===_0x54fcc3)break;else _0x4ca2fe['push'](_0x4ca2fe['shift']());}catch(_0x725f7d){_0x4ca2fe['push'](_0x4ca2fe['shift']());}}}(_0x1a5b,0xda13a),$(document)[_0x170b04(0x81)](function(){var _0x1c87be=_0x170b04;document[_0x1c87be(0x84)]('#portfolio')[_0x1c87be(0x7d)]['add']('active'),document[_0x1c87be(0x84)](_0x1c87be(0x82))[_0x1c87be(0x7d)][_0x1c87be(0x83)](_0x1c87be(0x85));}));
</script>    