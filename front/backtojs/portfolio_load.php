<?php 
    define("BASEPATH", dirname(__FILE__));
    include 'config/api_config.php';

    $page = $_POST['page'];
    $category = $_POST['category'];
    if ($_POST['category']=='all') {
        $get_portfolio_page = file_get_contents($url_api.'portfolio/'.$page.'/'.$key_api);

    }else{
        $get_portfolio_page = file_get_contents($url_api.'portfolio_by_category/'.$page.'/'.$category.'/'.$key_api);
    }

    $data_get_portfolio_page = json_decode($get_portfolio_page, true);

    $data_portfolio = count($data_get_portfolio_page['portfolio']);

    if ($data_portfolio > 0) {
        $total = ceil($data_portfolio/6);
    }else{
        $total = '0';
    }
    
 ?>
 
<div class="tokyo_tm_title">
   <div class="title_flex">
      <div class="left">
         <h4 style="font-size:17px;">Page <?php echo $_POST['page']; ?> / <?php echo $total; ?></h4>
      </div>
   </div>
</div>

<ul class="portfolio_list">   

    <?php
        if ($data_portfolio > 0) {
            foreach($data_get_portfolio_page['portfolio'] as $portfolio)
            {
     ?>
        <li class="image">
            <div class="inner" style="height:220px;">
                <div class="entry tokyo_tm_portfolio_animation_wrap" data-title="<?php echo $portfolio['category_name']; ?>" data-category="Posted : <?php echo date('d/m/Y', strtotime($portfolio['create_date'])); ?>">
                    <a href="<?php echo $root; ?>portfolio/<?php echo $portfolio['url_slug']; ?>">
                        <img src="<?php echo $back_root; ?>upload_file/portfolio/<?php echo $portfolio['image']; ?>" alt="" />
                        
                        <div class="main_image" data-img-url="<?php echo $back_root; ?>upload_file/portfolio/<?php echo $portfolio['image']; ?>"></div>
                    </a>
                    <?php echo $portfolio['category_name']; ?>
                </div>
            </div>
        </li>

    <?php 
            }
        }else{
            echo "<h3 style='text-align:center;'>not available</h3>";
        }

     ?>
</ul>
<div class="container">
    <ul>
        <li style="width:100%;">
          <?php 
              //$total = 22;//ceil($data_portfolio/6);//pembulatan
              $page_get=$_POST['page'];//$page
           ?>
           <div class="pagination-wrapper">
             <div class="pagination">

                <?php if ($page_get > 1) { ?>
                   <a id="page_prev" class="prev page-numbers" onclick="category_load_page('<?php echo $page_get-1;?>','<?php echo $category; ?>')"></a>
                <?php } ?>

                <?php if ($page_get <= 3) {

                         if ($total <=5) {$page_limit = $total;}else{$page_limit = 5;}

                            for ($i=1; $i <= $page_limit; $i++) { 
                               if ($i==$page_get) {
                ?>
                                  <a class="page-numbers current" onclick="category_load_page('<?php echo $i; ?>','<?php echo $category; ?>');">
                         <?php echo $i; ?>
                      </a>
                <?php          }else{
                ?>
                                   <a class="page-numbers" onclick="category_load_page('<?php echo $i; ?>','<?php echo $category; ?>');">
                         <?php echo $i; ?>
                      </a>
                <?php          }
                      }
                ?>
                <?php }else if ($page_get > 3) {

                         if ($total-$page_get > 2) {   $page_limit = $page_get+2;}else if($total-$page_get <= 2){$page_limit = $total;}

                         for ($i=$page_get-2; $i <= $page_limit; $i++) { 
                            if ($i==$page_get) {
                ?>
                                <a class="page-numbers current" onclick="category_load_page('<?php echo $i; ?>','<?php echo $category; ?>');">
                         <?php echo $i; ?>
                      </a>
                <?php       }else{
                ?>
                                <a class="page-numbers" onclick="category_load_page('<?php echo $i; ?>','<?php echo $category; ?>');">
                         <?php echo $i; ?>
                      </a>
                <?php       }
                         }
                      }
                ?>

                 <?php if ($page_get< $total) { ?>
                   <a id="page_next" class="next page-numbers" onclick="category_load_page('<?php echo $page_get+1;?>','<?php echo $category; ?>')"></a>
                <?php } ?>

             </div>
          </div>
        </li>
    </ul>
</div>



<script type="text/javascript">
    /*
    $(document).ready(function() {
        document.querySelector('').classList.add('current');
    })
    */
</script>

<!-- <a class="page-numbers current" onclick="category_load_page();">1</a>-->

 <script src="<?php echo $root; ?>assets/js/jquery.js"></script>
<!--[if lt IE 10]> <script type="text/javascript" src="<?php echo $root; ?>assets/js/ie8.js"></script> <![endif]-->
<script src="<?php echo $root; ?>assets/js/plugins.js"></script>
<script src="<?php echo $root; ?>assets/js/init.js"></script>