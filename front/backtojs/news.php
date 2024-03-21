<?php 
    define("BASEPATH", dirname(__FILE__));
    include 'config/api_config.php';
    include 'config/api_address.php';

    $meta_description = 'Elhace news - '.$data_get_website['meta_description'];
    $meta_keyword = 'elhace news, '.$data_get_website['meta_keyword'];
    include 'nav_start.php';

    $get_news_latest = file_get_contents($url_api.'news_latest/'.$key_api);//ok
    $data_get_news_latest = json_decode($get_news_latest, true);

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
                                                                    <!--
                                                                    <div class="my_like">
                                                                        <a href="#"><img class="svg" src="assets/img/svg/like.svg" alt="" /><span>35</span></a>
                                                                    </div>
                                                                     -->
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
                                                <div id="page_news" class="container">
                                                   <div class="loader_page"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php include 'nav_end.php'; ?>
<script type="text/javascript">
    eval(function(p,a,c,k,e,d){e=function(c){return c};if(!''.replace(/^/,String)){while(c--){d[c]=k[c]||c}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('$(0).5(6(){0.2(\'#7\').3.4(\'1\');0.2(\'#8\').3.4(\'1\')})',9,9,'document|active|querySelector|classList|add|ready|function|news|m_news'.split('|'),0,{}))

    /*
    $(document).ready(function() {
         document.querySelector('#news').classList.add('active');
         document.querySelector('#m_news').classList.add('active');
    })*/
</script>
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
-->
<script>
    var root = '<?php echo $root; ?>';
    function _0x74c1(){var _0x51c532=['20626HdBIRx','type_search','9FmmjgU','ready','9bRqApy','51420BxyLzY','news_load.php','POST','#page_news','<div\x20class=\x22loader_page\x22></div>','#form-search','3GoJUUK','1091216dJKSEs','3144799RiOxUi','3718yhplHZ','9078960gkUuVI','news_load_page(\x271\x27,\x27type_page\x27,\x27load\x27)','6VTqrbn','3059630wsyBZy','ajax','#news','scrollTop','val','1169956GqFqDh','type_page','html'];_0x74c1=function(){return _0x51c532;};return _0x74c1();}function _0x3819(_0x399096,_0x4c5d0a){var _0x74c14e=_0x74c1();return _0x3819=function(_0x3819f2,_0x74cf77){_0x3819f2=_0x3819f2-0x127;var _0x2c77d7=_0x74c14e[_0x3819f2];return _0x2c77d7;},_0x3819(_0x399096,_0x4c5d0a);}var _0x527513=_0x3819;(function(_0x26b847,_0x55dd3f){var _0x1e1a84=_0x3819,_0x28d646=_0x26b847();while(!![]){try{var _0x3169ab=-parseInt(_0x1e1a84(0x137))/0x1*(-parseInt(_0x1e1a84(0x135))/0x2)+parseInt(_0x1e1a84(0x140))/0x3*(-parseInt(_0x1e1a84(0x132))/0x4)+parseInt(_0x1e1a84(0x12d))/0x5+-parseInt(_0x1e1a84(0x12c))/0x6*(-parseInt(_0x1e1a84(0x128))/0x7)+parseInt(_0x1e1a84(0x127))/0x8*(parseInt(_0x1e1a84(0x139))/0x9)+parseInt(_0x1e1a84(0x12a))/0xa+parseInt(_0x1e1a84(0x129))/0xb*(-parseInt(_0x1e1a84(0x13a))/0xc);if(_0x3169ab===_0x55dd3f)break;else _0x28d646['push'](_0x28d646['shift']());}catch(_0xfe8105){_0x28d646['push'](_0x28d646['shift']());}}}(_0x74c1,0x6fb07),$(document)[_0x527513(0x138)](function(){var _0x29c70d=_0x527513;news_load_page('1',_0x29c70d(0x133),'load');}));function news_search(){var _0x2a2420=_0x527513;setTimeout(_0x2a2420(0x12b),0xbb8);}function news_load_page(_0x1433b9,_0x161090,_0x5f1394){var _0x44cf2c=_0x527513;if($(_0x44cf2c(0x13f))[_0x44cf2c(0x131)]()=='')_0x5f1394=='page_load'&&$('#news')[_0x44cf2c(0x130)](0x334),$(_0x44cf2c(0x13d))['html'](_0x44cf2c(0x13e)),$[_0x44cf2c(0x12e)]({'url':root+_0x44cf2c(0x13b),'method':'POST','data':{'page':_0x1433b9,'type':_0x161090},'processData':!![],'cache':![],'async':!![],'success':function(_0xe31e39){var _0x3a7f6e=_0x44cf2c;$('#page_news')[_0x3a7f6e(0x134)](_0xe31e39);}});else{var _0x2500d5=$('#form-search')[_0x44cf2c(0x131)](),_0x161090=_0x44cf2c(0x136);$(_0x44cf2c(0x12f))[_0x44cf2c(0x130)](0x334),$(_0x44cf2c(0x13d))[_0x44cf2c(0x134)](_0x44cf2c(0x13e)),$[_0x44cf2c(0x12e)]({'url':root+_0x44cf2c(0x13b),'method':_0x44cf2c(0x13c),'data':{'news_title':_0x2500d5,'page':_0x1433b9,'type':_0x161090},'processData':!![],'cache':![],'async':!![],'success':function(_0x3e92b4){var _0x359c84=_0x44cf2c;$(_0x359c84(0x13d))[_0x359c84(0x134)](_0x3e92b4);}});}}
    /*
    $(document).ready(function(){
        news_load_page('1','type_page','load');
    });
 
    function news_search()
    {
        setTimeout(
            "news_load_page('1','type_page','load')",
            3000
        );  
    }

    function news_load_page(page, type, status)
    {
        if ($('#form-search').val() == '') {
            if (status == 'page_load') {
                $("#news").scrollTop(820);
            }

            $('#page_news').html('<div class="loader_page"></div>');
            $.ajax({
                url:root+"news_load.php",
                method:"POST",
                data:{'page':page,'type':type},
                processData: true,
                cache: false,
                async: true,
                success:function(data){
                    $('#page_news').html(data);

                }
            })    
        }else{
            var $news_title = $('#form-search').val();
            var type= 'type_search';

            $("#news").scrollTop(820);
            //$("#news").animate({scrollTop: '820'});
            
            $('#page_news').html('<div class="loader_page"></div>');
            $.ajax({
                url:root+"news_load.php",
                method:"POST",
                data:{'news_title': $news_title,'page':page,'type':type},
                processData: true,
                cache: false,
                async: true,
                success:function(data){
                    $('#page_news').html(data);
                }
            })
        }
    }
    */
</script>    