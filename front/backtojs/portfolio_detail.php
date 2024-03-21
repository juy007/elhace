 <?php 
     define("BASEPATH", dirname(__FILE__));
     include 'config/api_config.php';
     include 'config/api_address.php';

    $get_portfolio_select = file_get_contents($url_api.'portfolio_select/'.$_GET["post_url"].'/'.$key_api);
    $data_get_portfolio_select = json_decode($get_portfolio_select, true);

    $get_portfolio_view = file_get_contents($url_api.'portfolio_view_count/'.$data_get_portfolio_select['id_portfolio'].'/'.$key_api);
    $data_get_portfolio_view = json_decode($get_portfolio_view, true);

    if (empty($data_get_portfolio_select['image'])) { header("Location: ".$root."portofolio"); }

    $meta_description = 'Portfolio '.$data_get_portfolio_select['image'].' - '.$data_get_website['meta_description'];
    $meta_keyword = $data_get_portfolio_select['image'].', '.$data_get_website['meta_keyword'];
    include 'nav_start.php';
?>
    <div id="portfolio_detail" class="tokyo_tm_section">
        <div class="container">
            <div class="tokyo_tm_about">
                <div class="about_image gallery_zoom">
                    <a class="zoom" href="<?php echo $back_root; ?>upload_file/portfolio/<?php echo $data_get_portfolio_select['image']; ?>">
                        <img src="<?php echo $back_root; ?>upload_file/portfolio/<?php echo $data_get_portfolio_select['image']; ?>" alt="" />

                        <div class="main" data-img-url="<?php echo $back_root; ?>upload_file/portfolio/<?php echo $data_get_portfolio_select['image']; ?>"></div>
                    </a>
                </div>
                <h4 style="text-align: center;margin-top: -40px;">Category : <?php echo $data_get_portfolio_select['category_name']; ?></h4><hr>
                <div class="description-inner">
                   <div class="info-inner-left">
                      <p class="date">By Bodro Bilowo</p>
                   </div>
                   <div class="info-inner-right">
                      <span>
                        Posted : <?php echo date('d/m/Y', strtotime($data_get_portfolio_select['create_date'])); ?>
                        <br><?php echo count($data_get_portfolio_view['portfolio']); ?> Views
                      </span>
                   </div>
                </div>
               
            </div><br><br><br><br>
            <div class="btn-tokyo">
                <a href="<?php echo $root; ?>portfolio">< Back</a>
            </div>
        </div>
    </div>
</div>
<?php include 'nav_end.php'; ?>
<script type="text/javascript">
    var _0x1eccee=_0xbbd2;function _0x2304(){var _0x12519c=['querySelector','active','1359120EMIRWm','34602eyQMvT','32vIeYug','6323270auPqZH','9uBILZa','677944hAIYdR','#m_portfolio','classList','501159sFKKrl','19878QusCnM','add','ready','#portfolio_detail','69952JGOgst','847nbKTLh'];_0x2304=function(){return _0x12519c;};return _0x2304();}function _0xbbd2(_0x119a8b,_0x373753){var _0x2304eb=_0x2304();return _0xbbd2=function(_0xbbd264,_0x5c8906){_0xbbd264=_0xbbd264-0x1a4;var _0x1ff6d3=_0x2304eb[_0xbbd264];return _0x1ff6d3;},_0xbbd2(_0x119a8b,_0x373753);}(function(_0x2ad53a,_0x4ab5a5){var _0x304d82=_0xbbd2,_0x2f3b0d=_0x2ad53a();while(!![]){try{var _0x3b41ca=-parseInt(_0x304d82(0x1b2))/0x1+parseInt(_0x304d82(0x1af))/0x2+parseInt(_0x304d82(0x1ab))/0x3*(-parseInt(_0x304d82(0x1ac))/0x4)+parseInt(_0x304d82(0x1aa))/0x5+-parseInt(_0x304d82(0x1b3))/0x6*(parseInt(_0x304d82(0x1a7))/0x7)+parseInt(_0x304d82(0x1a6))/0x8*(parseInt(_0x304d82(0x1ae))/0x9)+parseInt(_0x304d82(0x1ad))/0xa;if(_0x3b41ca===_0x4ab5a5)break;else _0x2f3b0d['push'](_0x2f3b0d['shift']());}catch(_0x482b43){_0x2f3b0d['push'](_0x2f3b0d['shift']());}}}(_0x2304,0x3ee1b),$(document)[_0x1eccee(0x1a4)](function(){var _0x32a522=_0x1eccee;document['querySelector'](_0x32a522(0x1a5))[_0x32a522(0x1b1)][_0x32a522(0x1b4)](_0x32a522(0x1a9)),document[_0x32a522(0x1a8)](_0x32a522(0x1b0))[_0x32a522(0x1b1)][_0x32a522(0x1b4)](_0x32a522(0x1a9));}));
    /*
    $(document).ready(function() {
         document.querySelector('#portfolio_detail').classList.add('active');
         document.querySelector('#m_portfolio').classList.add('active');
    })
    */
</script>
<script type="text/javascript">
    var id_portfolio ="<?php echo $data_get_portfolio_select['id_portfolio']; ?>";
    function _0x11ce(){var _0x3eedd5=['json','portfolio_view','5930pKeSql','992112PKkQFH','2934820CJLmrv','672620pGDWEq','29202FVvwlY','6jzEjpl','1716350JGFnFP','POST','4005fQSuBg','8iPJXjv','270747nvvYff','onload','156dfiKdv'];_0x11ce=function(){return _0x3eedd5;};return _0x11ce();}function _0x4894(_0x1b455b,_0x1ed8ed){var _0x11ce44=_0x11ce();return _0x4894=function(_0x489416,_0x1796c4){_0x489416=_0x489416-0x1d8;var _0x4b1b73=_0x11ce44[_0x489416];return _0x4b1b73;},_0x4894(_0x1b455b,_0x1ed8ed);}var _0x4e70d3=_0x4894;(function(_0x2e0289,_0x5cc29c){var _0x55c9e6=_0x4894,_0x493e35=_0x2e0289();while(!![]){try{var _0x5b9314=parseInt(_0x55c9e6(0x1e4))/0x1+-parseInt(_0x55c9e6(0x1dd))/0x2+parseInt(_0x55c9e6(0x1de))/0x3*(parseInt(_0x55c9e6(0x1e6))/0x4)+-parseInt(_0x55c9e6(0x1e0))/0x5*(parseInt(_0x55c9e6(0x1df))/0x6)+parseInt(_0x55c9e6(0x1dc))/0x7*(parseInt(_0x55c9e6(0x1e3))/0x8)+-parseInt(_0x55c9e6(0x1e2))/0x9*(parseInt(_0x55c9e6(0x1da))/0xa)+parseInt(_0x55c9e6(0x1db))/0xb;if(_0x5b9314===_0x5cc29c)break;else _0x493e35['push'](_0x493e35['shift']());}catch(_0x419d8c){_0x493e35['push'](_0x493e35['shift']());}}}(_0x11ce,0x34d28),window[_0x4e70d3(0x1e5)]=news_views());function news_views(){var _0x2955d9=_0x4e70d3;$['ajax']({'type':_0x2955d9(0x1e1),'url':url_api+_0x2955d9(0x1d9),'data':{'id':id_portfolio,'ip':ip,'browser':browser,'os':os},'dataType':_0x2955d9(0x1d8),'success':function(_0x860aaa){}});}
    /*
    window.onload=news_views();
    function news_views()
    {
        $.ajax({
            type    : 'POST',
            url     : url_api+'portfolio_view',
            data    : {'id': id_portfolio, 'ip': ip, 'browser': browser, 'os':os},
            dataType: "json",
            success : function(response){
                                  
            }
        })
      }
      */
  </script>