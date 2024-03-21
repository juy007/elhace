<?php 
   define("BASEPATH", dirname(__FILE__));
   include 'config/api_config.php';
   include 'config/api_address.php';

   $meta_description = 'Elhace news - '.$data_get_website['meta_description'];
   $meta_keyword = 'elhace news, '.$data_get_website['meta_keyword'];
   include 'nav_start.php';

    //$get_news_latest = file_get_contents($url_api.'news_latest/'.$key_api);//ok
    //$data_get_news_latest = json_decode($get_news_latest, true);

?> 
    <div id="news" class="tokyo_tm_section">
       <div class="container">
         <div class="tokyo_tm_news">
           <div class="tokyo_tm_title">
             <div class="title_flex">
               <div class="left">
                 <span>News</span>
                 <h3>Latest News</h3>
               </div>
            </div>
         </div>
         <!--
         <ul>
            <?php 
               foreach ($data_get_news_latest['news'] as $key => $valueNewsLatest) {
            ?>
            <li class="lates_news">
               <div class="list_inner" style="height:430px;overflow-y: hidden;overflow-x: hidden;">
                  <div class="" style="height: 200px; background-repeat: no-repeat; background-size: cover; background-image: url(<?php echo $back_root; ?>/upload_file/news/<?php echo $valueNewsLatest['news_folder']; ?>/image_news.png) ;">

                     <a class="tokyo_tm_full_link" href="<?php echo $root; ?>news/<?php echo $valueNewsLatest['url_slug']; ?>"></a>
                  </div>
                  <div class="details">
                     <div class="extra">
                        <div class="short">
                          <p class="date">By <a href="#">Bodro Bilowo</a> <span><?php echo date('d/m/Y', strtotime($valueNewsLatest['create_date'])); ?></span></p>
                        </div>

                     </div>
                     <h3 class="title">
                        <a style="font-size:12px;" href="<?php echo $root; ?>news/<?php echo $valueNewsLatest['url_slug']; ?>">
                           <?php 
                              echo $valueNewsLatest['news_title']; 
                              if(strlen($valueNewsLatest['news_title']) > 14){
                                 echo substr($valueNewsLatest['news_title'], 0, 14).'...'; 
                              }else{
                                 echo $valueNewsLatest['news_title'];
                              }
                           ?>
                        </a>
                     </h3>
                     <div class="tokyo_tm_read_more">
                        <a href="www.youtube.com"><span>Read More</span></a>
                     </div>
                  </div>
                  <div class="main_content">
                     <div class="descriptions">
                        <p class="bigger"><?php echo $valueNewsLatest['news_text']; ?></p>
                     </div>
                  </div>
               </div>
            </li>
            <?php } ?>

            <?php if (!empty($data_get_website['embed_twitter'])) { ?>
            <li class="embed_news">
               <div class="list_inner" style="height:430px;overflow-y: auto;">
                  <?php echo $data_get_website['embed_twitter']; ?>

               </div>
            </li>
            <?php 
            } 
               if (!empty($data_get_website['embed_instagram'])) {
            ?>
            <li class="embed_news">
               <div class="list_inner" style="height:430px;overflow-y: hidden;overflow-x: hidden;">
                  <?php echo $data_get_website['embed_instagram']; ?>
               </div>
            </li>
            <?php } ?>
         </ul>

         <div class="container">
            <div class="group-search">
               <input class="group-search-input" type="text" id="form-search" name="search" placeholder="Search">
               <button class="group-search-btn" onclick="news_search();"><img style="width: 70%;" src="assets/img/news/search.png"></button>
            </div>
         </div>
         -->
         <div id="page_news" class="container">
            <!--<div class="loader_page"></div>-->
         </div>
      </div>
   </div>
</div>
<?php include 'nav_end.php'; ?>
<script type="text/javascript">
  eval(function(p,a,c,k,e,d){e=function(c){return c};if(!''.replace(/^/,String)){while(c--){d[c]=k[c]||c}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('$(0).5(6(){0.2(\'#7\').3.4(\'1\');0.2(\'#8\').3.4(\'1\')})',9,9,'document|active|querySelector|classList|add|ready|function|news|m_news'.split('|'),0,{}))
</script>
<script>
  var root = '<?php echo $root; ?>';
  var _0xc0d0eb=_0x316a;function _0x316a(_0x454df2,_0x39295e){var _0x562910=_0x5629();return _0x316a=function(_0x316a15,_0x4a1f62){_0x316a15=_0x316a15-0x164;var _0x15c4da=_0x562910[_0x316a15];return _0x15c4da;},_0x316a(_0x454df2,_0x39295e);}(function(_0x2a69a7,_0x43f7f2){var _0x27ef7a=_0x316a,_0x275591=_0x2a69a7();while(!![]){try{var _0x1ceeb2=parseInt(_0x27ef7a(0x169))/0x1*(parseInt(_0x27ef7a(0x175))/0x2)+parseInt(_0x27ef7a(0x178))/0x3+parseInt(_0x27ef7a(0x164))/0x4*(parseInt(_0x27ef7a(0x16f))/0x5)+parseInt(_0x27ef7a(0x16a))/0x6+parseInt(_0x27ef7a(0x165))/0x7+-parseInt(_0x27ef7a(0x179))/0x8*(-parseInt(_0x27ef7a(0x174))/0x9)+-parseInt(_0x27ef7a(0x16d))/0xa*(parseInt(_0x27ef7a(0x16b))/0xb);if(_0x1ceeb2===_0x43f7f2)break;else _0x275591['push'](_0x275591['shift']());}catch(_0xca7b51){_0x275591['push'](_0x275591['shift']());}}}(_0x5629,0xc3769),$(document)[_0xc0d0eb(0x166)](function(){var _0x17ca37=_0xc0d0eb;news_load_page('1',_0x17ca37(0x177),'load');}));function _0x5629(){var _0x1b7d84=['2317431PXDaVj','8SIeMLe','1000uSfrYu','911568ZtXITb','ready','#news','#form-search','1RRjkkm','9269196uhDtwH','803NucglX','#page_news','390820hRyrGK','news_load.php','7490hLBibu','val','POST','news_load_page(\x271\x27,\x27type_page\x27,\x27load\x27)','scrollTop','1390941nfWKzq','1353974vaPNjJ','ajax','type_page'];_0x5629=function(){return _0x1b7d84;};return _0x5629();}function news_search(){var _0x4e0fdf=_0xc0d0eb;setTimeout(_0x4e0fdf(0x172),0xbb8);}function news_load_page(_0x205cf7,_0x5625c1,_0x288bc2){var _0x31e821=_0xc0d0eb;if($(_0x31e821(0x168))[_0x31e821(0x170)]()=='')_0x288bc2=='page_load'&&$(_0x31e821(0x167))['scrollTop'](0x64),$[_0x31e821(0x176)]({'url':root+_0x31e821(0x16e),'method':'POST','data':{'page':_0x205cf7,'type':_0x5625c1},'processData':!![],'cache':![],'async':!![],'success':function(_0x478f9e){var _0x1cabef=_0x31e821;$(_0x1cabef(0x16c))['html'](_0x478f9e);}});else{var _0x1dae00=$('#form-search')['val'](),_0x5625c1='type_search';$(_0x31e821(0x167))[_0x31e821(0x173)](0x64),$[_0x31e821(0x176)]({'url':root+_0x31e821(0x16e),'method':_0x31e821(0x171),'data':{'news_title':_0x1dae00,'page':_0x205cf7,'type':_0x5625c1},'processData':!![],'cache':![],'async':!![],'success':function(_0x261935){$('#page_news')['html'](_0x261935);}});}}
</script>    