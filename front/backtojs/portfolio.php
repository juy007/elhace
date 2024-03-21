<?php 
    define("BASEPATH", dirname(__FILE__));
    include 'config/api_config.php';
    include 'config/api_address.php';

    $get_portfolio_category = file_get_contents($url_api.'portfolio_category/'.$key_api);
    $data_get_portfolio_category = json_decode($get_portfolio_category, true);

    $meta_description = 'Elhace portfolio - '.$data_get_website['meta_description'];
    $meta_keyword = 'elhace portfolio, '.$data_get_website['meta_keyword'];
    include 'nav_start.php';

 ?> 
                                    <div class="tokyo_tm_portfolio_titles">
                                    </div>

                                    <div id="portfolio" class="tokyo_tm_section">
                                        <div class="container">
                                            <div class="tokyo_tm_portfolio">
                                                <div class="tokyo_tm_title">
                                                    <div class="title_flex">
                                                        <div class="left">
                                                            <span>Portfolio</span>
                                                            <h3>The Awesome Stuff</h3>
                                                        </div>
                                                        <div class="portfolio_filter">
                                                            <ul>
                                                                <li><a href="#" id="all_categories" class="" onclick="portfolio_load_page('1','all','all');">All categories</a></li>
                                                                <?php foreach ($data_get_portfolio_category['category'] as $key => $valueCategory) { ?>
                                                                <li><a href="#" id="<?php echo "btn-categorie-".strtolower(str_replace(' ','_',$valueCategory['category_name'])); ?>" class="" onclick="portfolio_load_page('1','<?php echo "btn-categorie-".strtolower(str_replace(' ','_',$valueCategory['category_name'])); ?>','<?php echo $valueCategory['id_category']; ?>');"><?php echo $valueCategory['category_name']; ?></a></li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="portfolio-list" class="list_wrapper">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php include 'nav_end.php'; ?>
<script type="text/javascript">
    function _0x1958(_0xda5741,_0x2f78e5){var _0x1a5b55=_0x1a5b();return _0x1958=function(_0x1958ed,_0x262e1b){_0x1958ed=_0x1958ed-0x7b;var _0x4c211a=_0x1a5b55[_0x1958ed];return _0x4c211a;},_0x1958(_0xda5741,_0x2f78e5);}var _0x170b04=_0x1958;function _0x1a5b(){var _0x46acc7=['active','278757qYFuLS','6081925wTcixi','4732710nNciRW','56jbnhCL','11AxyvKC','112708cXNtZY','44ScoOHI','5508976EHQdIl','classList','70005AgWZSE','1467776ksQEhI','6BiqNnE','ready','#m_portfolio','add','querySelector'];_0x1a5b=function(){return _0x46acc7;};return _0x1a5b();}(function(_0x332a29,_0x54fcc3){var _0x4143b5=_0x1958,_0x4ca2fe=_0x332a29();while(!![]){try{var _0x5e57c2=-parseInt(_0x4143b5(0x8a))/0x1*(parseInt(_0x4143b5(0x8b))/0x2)+parseInt(_0x4143b5(0x7e))/0x3*(parseInt(_0x4143b5(0x7b))/0x4)+parseInt(_0x4143b5(0x87))/0x5*(-parseInt(_0x4143b5(0x80))/0x6)+parseInt(_0x4143b5(0x89))/0x7*(parseInt(_0x4143b5(0x7f))/0x8)+parseInt(_0x4143b5(0x86))/0x9+parseInt(_0x4143b5(0x88))/0xa+parseInt(_0x4143b5(0x7c))/0xb;if(_0x5e57c2===_0x54fcc3)break;else _0x4ca2fe['push'](_0x4ca2fe['shift']());}catch(_0x725f7d){_0x4ca2fe['push'](_0x4ca2fe['shift']());}}}(_0x1a5b,0xda13a),$(document)[_0x170b04(0x81)](function(){var _0x1c87be=_0x170b04;document[_0x1c87be(0x84)]('#portfolio')[_0x1c87be(0x7d)]['add']('active'),document[_0x1c87be(0x84)](_0x1c87be(0x82))[_0x1c87be(0x7d)][_0x1c87be(0x83)](_0x1c87be(0x85));}));
    /*
    $(document).ready(function() {
         document.querySelector('#portfolio').classList.add('active');
         document.querySelector('#m_portfolio').classList.add('active');
    })
    */
</script>    

<script type="text/javascript">
    var root = '<?php echo $root; ?>';

    var _0x272533=_0x372b;function _0x4600(){var _0x63ad81=['55DBlUFy','2205268wUlxHM','10ZDQeZX','html','5174652fNdmSf','querySelector','current','2274767ZjqmTN','928359XEsZAj','14528dymqHv','161630anFnCi','132616HSvTRj','all','84CtfTcu','ready','153kaQpED','portfolio_load','classList','add','<div\x20class=\x22loader_page\x22></div>','5JpXPHt','POST','#portfolio-list'];_0x4600=function(){return _0x63ad81;};return _0x4600();}(function(_0x476a3a,_0x45fe38){var _0x29f5d2=_0x372b,_0x411c76=_0x476a3a();while(!![]){try{var _0x511b6b=parseInt(_0x29f5d2(0x9c))/0x1*(-parseInt(_0x29f5d2(0x8e))/0x2)+parseInt(_0x29f5d2(0x8d))/0x3+parseInt(_0x29f5d2(0x9d))/0x4*(parseInt(_0x29f5d2(0x99))/0x5)+parseInt(_0x29f5d2(0x92))/0x6*(parseInt(_0x29f5d2(0x8f))/0x7)+-parseInt(_0x29f5d2(0x90))/0x8*(parseInt(_0x29f5d2(0x94))/0x9)+-parseInt(_0x29f5d2(0x87))/0xa*(-parseInt(_0x29f5d2(0x8c))/0xb)+-parseInt(_0x29f5d2(0x89))/0xc;if(_0x511b6b===_0x45fe38)break;else _0x411c76['push'](_0x411c76['shift']());}catch(_0x59134d){_0x411c76['push'](_0x411c76['shift']());}}}(_0x4600,0x43f05),$(document)[_0x272533(0x93)](function(){var _0x310ae4=_0x272533;portfolio_load_page('1','all',_0x310ae4(0x91));}));function _0x372b(_0x4097fa,_0xeed5a2){var _0x46009c=_0x4600();return _0x372b=function(_0x372b56,_0x1657a9){_0x372b56=_0x372b56-0x87;var _0x2debb1=_0x46009c[_0x372b56];return _0x2debb1;},_0x372b(_0x4097fa,_0xeed5a2);}function portfolio_load_page(_0x2736c0,_0x2d2358,_0x4eadeb){var _0x2ccbd0=_0x272533;_0x4eadeb==_0x2ccbd0(0x91)?document[_0x2ccbd0(0x8a)]('#all_categories')[_0x2ccbd0(0x96)][_0x2ccbd0(0x97)](_0x2ccbd0(0x8b)):document[_0x2ccbd0(0x8a)]('#'+_0x2d2358)[_0x2ccbd0(0x96)][_0x2ccbd0(0x97)]('current'),$(_0x2ccbd0(0x9b))['scrollTop'](0x334),$(_0x2ccbd0(0x9b))[_0x2ccbd0(0x88)](_0x2ccbd0(0x98)),$['ajax']({'url':root+_0x2ccbd0(0x95),'method':_0x2ccbd0(0x9a),'data':{'page':_0x2736c0,'category':_0x4eadeb},'processData':!![],'cache':![],'async':!![],'success':function(_0x3f1a21){var _0x3e87ca=_0x2ccbd0;$(_0x3e87ca(0x9b))[_0x3e87ca(0x88)](_0x3f1a21);}});}

    /*
    $(document).ready(function(){
        portfolio_load_page('1','all','all');
          
    });
 

    function portfolio_load_page(page, idcategory, category)
    {
            if (category== 'all') {
                document.querySelector('#all_categories').classList.add('current');
            }else{
                document.querySelector('#'+idcategory).classList.add('current');
            }
            $("#portfolio-list").scrollTop(820);

            $('#portfolio-list').html('<div class="loader_page"></div>');
            $.ajax({
                url:root+"portfolio_load",
                method:"POST",
                data:{'page':page,'category':category},
                processData: true,
                cache: false,
                async: true,
                success:function(data){
                    $('#portfolio-list').html(data);

                }
            })    
        
    }
    */
</script>