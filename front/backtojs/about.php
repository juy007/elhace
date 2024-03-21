<?php 
define("BASEPATH", dirname(__FILE__));
include 'config/api_config.php';
include 'config/api_address.php';
$meta_description = 'Elhace about - '.$data_get_website['meta_description'];
$meta_keyword = 'Elhace about, '.$data_get_website['meta_keyword'];
include 'nav_start.php';
?>
<div id="about" class="tokyo_tm_section">
    <div class="container">
        <div class="tokyo_tm_about">
            <div class="about_image">
                <img src="assets/img/thumbs/4-2.jpg" alt="" />
                <div class="main" data-img-url="assets/img/slider/4.jpg"></div>
            </div>
            <div class="description">
                <h3 class="name">About Me</h3>
                <div class="description_inner">
                    <div class="left">
                        <p>Jakarta Based Illustrator & NFT Maker<br>
                        Managing ELHACE Studio & Some Random Stuff</p>
                    </div>
                    <div class="right">
                        <ul>
                            <li><p><span>Email:</span><a href="mailto:bilowo@gmail.com">bilowo@gmail.com</a></p></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'nav_end.php'; ?>
<script type="text/javascript">
$(document).ready(function() {
     document.querySelector('#about').classList.add('active');
     document.querySelector('#m_about').classList.add('active');
 })

</script>    