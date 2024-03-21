<?php 
   define("BASEPATH", dirname(__FILE__));
   include 'config/api_config.php';
   include 'config/api_address.php';
 ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
    <!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
        <!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
            <!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <meta name="description" content="<?php echo $data_get_website['meta_description']; ?>">
                    <meta name="keywords" content="<?php echo $data_get_website['meta_keyword']; ?>">
                    <meta name="author" content="bodro-bilowo">
                    <link rel="shortcut icon" href="http://localhost/elhace/back/assets/frontend/img/favicon.ico">
                    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
                    <title>Elhace Studio by Bodro Bilowo</title>

                    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
                    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
                    <link rel="stylesheet" type="text/css" href="assets/css/plugins.css" />
                    <link rel="stylesheet" type="text/css" href="assets/css/dark.css" />
                    <link rel="stylesheet" type="text/css" href="assets/css/colors.css" />
                    <link rel="stylesheet" type="text/css" href="assets/css/stylec.css" />
                    <!--[if lt IE 9]> <script type="text/javascript" src="assets/js/modernizr.custom.js"></script> <![endif]-->
                        
                    </head>
                    <body>
                        <!--
                        <div id="preloader">
                            <div class="loader_line"></div>
                        </div>
                        -->

                        <div class="tokyo_tm_all_wrap" data-magic-cursor="" data-color="black"> 

                            <div class="tokyo_tm_modalbox">
                                <div class="box_inner">
                                    <div class="close">
                                        <a href="#"><img class="svg" src="assets/img/svg/cancel.png" alt="" /></a>
                                    </div>
                                    <div class="description_wrap"></div>
                                </div>
                            </div>


                            <div class="tokyo_tm_modalbox_about">
                                <div class="box_inner">
                                    <div class="close">
                                        <a href="#"><img class="svg" src="assets/img/svg/cancel.png" alt="" /></a>
                                    </div>
                                    <div class="description_wrap">
                                        <div class="my_box">
                                            <div class="left">
                                                <div class="about_title">
                                                    <h3>Photography Skills</h3>
                                                </div>
                                                <div class="tokyo_progress">
                                                    <div class="progress_inner" data-value="95">
                                                        <span><span class="label">Wedding Photography</span><span class="number">95%</span></span>
                                                        <div class="background"><div class="bar"><div class="bar_in"></div></div></div>
                                                    </div>
                                                    <div class="progress_inner" data-value="80">
                                                        <span><span class="label">Lifestyle Photography</span><span class="number">80%</span></span>
                                                        <div class="background"><div class="bar"><div class="bar_in"></div></div></div>
                                                    </div>
                                                    <div class="progress_inner" data-value="90">
                                                        <span><span class="label">Family Photography</span><span class="number">90%</span></span>
                                                        <div class="background"><div class="bar"><div class="bar_in"></div></div></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="about_title">
                                                    <h3>Language Skills</h3>
                                                </div>
                                                <div class="tokyo_progress">
                                                    <div class="progress_inner" data-value="95">
                                                        <span><span class="label">English</span><span class="number">95%</span></span>
                                                        <div class="background"><div class="bar"><div class="bar_in"></div></div></div>
                                                    </div>
                                                    <div class="progress_inner" data-value="90">
                                                        <span><span class="label">Japanese</span><span class="number">90%</span></span>
                                                        <div class="background"><div class="bar"><div class="bar_in"></div></div></div>
                                                    </div>
                                                    <div class="progress_inner" data-value="85">
                                                        <span><span class="label">Arabian</span><span class="number">85%</span></span>
                                                        <div class="background"><div class="bar"><div class="bar_in"></div></div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="counter">
                                            <div class="about_title">
                                                <h3>Fun Facts</h3>
                                            </div>
                                            <ul>
                                                <li>
                                                    <div class="list_inner">
                                                        <h3><span class="tokyo_tm_counter" data-from="0" data-to="777" data-speed="1500">0</span></h3>
                                                        <span class="name">Projects Completed</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="list_inner">
                                                        <h3><span class="tokyo_tm_counter" data-from="0" data-to="500" data-speed="1500">0</span>+</h3>
                                                        <span class="name">Happy Clients</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="list_inner">
                                                        <h3><span class="tokyo_tm_counter" data-from="0" data-to="100" data-speed="1500">0</span>K+</h3>
                                                        <span class="name">Lines of Code</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="partners">
                                            <div class="about_title">
                                                <h3>Our Partners</h3>
                                            </div>
                                            <ul class="owl-carousel">
                                                <li class="item"><a href="#"><img src="assets/img/partners/1.png" alt="" /></a></li>
                                                <li class="item"><a href="#"><img src="assets/img/partners/2.png" alt="" /></a></li>
                                                <li class="item"><a href="#"><img src="assets/img/partners/3.png" alt="" /></a></li>
                                                <li class="item"><a href="#"><img src="assets/img/partners/4.png" alt="" /></a></li>
                                                <li class="item"><a href="#"><img src="assets/img/partners/5.png" alt="" /></a></li>
                                                <li class="item"><a href="#"><img src="assets/img/partners/6.png" alt="" /></a></li>
                                                <li class="item"><a href="#"><img src="assets/img/partners/7.png" alt="" /></a></li>
                                                <li class="item"><a href="#"><img src="assets/img/partners/8.png" alt="" /></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tokyo_tm_mobile_menu">
                                <div class="menu_inner">
                                    <div class="logo">
                                        <img src="assets/img/logo/dark.png" alt="" />
                                    </div>
                                    <div class="menu">
                                        <ul>
                                            <li><a href="#home"><img class="svg" src="assets/img/svg/home-run.svg" alt="" /></a></li>
                                            <li><a href="#about"><img class="svg" src="assets/img/svg/avatar.svg" alt="" /></a></li>
                                            <li><a href="#portfolio"><img class="svg" src="assets/img/svg/briefcase.svg" alt="" /></a></li>
                                            <li><a href="#news"><img class="svg" src="assets/img/svg/paper.svg" alt="" /></a></li>
                                            <li><a href="#contact"><img class="svg" src="assets/img/svg/mail.svg" alt="" /></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                 <style type="text/css">
                                 ::-webkit-scrollbar {
                                     width: 10px;
                                 }
                                  
                                 ::-webkit-scrollbar-track {
                                     -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);     
                                     background: #666;    
                                     opacity: 0.1;
                                 }
                                  
                                 ::-webkit-scrollbar-thumb {
                                     background: #232323;
                                 }
                                 .tokyo_tm_home .avatar .image-home {
                                     position: absolute;
                                     top: 0;
                                     bottom: 0;
                                     left: 0;
                                     right: 0;
                                     background-repeat: no-repeat;
                                     background-position: center;
                                     background-size: cover;
                                     animation: morph 8s ease-in-out infinite 1s;
                                     background-blend-mode: multiply;
                                     -webkit-box-shadow: inset 0 0 0 9px rgb(255 255 255 / 30%);
                                     -moz-box-shadow: inset 0 0 0 9px rgba(255,255,255,.3);
                                     box-shadow: inset 0 0 0 9px rgb(255 255 255 / 30%);
                                 }
                                  .image-home {
                                     position: absolute;
                                     top: 0;
                                     bottom: 0;
                                     left: 0;
                                     right: 0;
                                     background-repeat: no-repeat;
                                     background-position: 50%;
                                     background-size: cover;
                                     /* -webkit-animation: morph 8s ease-in-out 1s infinite; */
                                     /* animation: morph 8s ease-in-out 1s infinite; */
                                     background-blend-mode: multiply;
                                     box-shadow: inset 0 0 0 9px hsl(0deg 0% 100% / 30%);
                                     border-radius: 60% 40% 30% 70%/60% 30% 70% 40%;
                                     overflow: hidden;
                                 }
                                 .avatar{
                                        min-width: 350px;
                                        min-height: 350px;
                                        position: relative;
                                        border-radius: 100%;
                                 }
                            
                              
                                 @media (max-width: 1600px){
                                    .tokyo_tm_all_wrap .leftpart {
                                        width: 400px;
                                        padding: 0 100px;
                                    }
                                 }
                                 @media (max-width: 1200px){
                                    .tokyo_tm_about, .tokyo_tm_contact, .tokyo_tm_home, .tokyo_tm_news, .tokyo_tm_portfolio {
                                        padding-top: 170px;
                                    }
                                 }
                                 @media (min-width: 961px){
                                     .tokyo_tm_news .lates_news {
                                         margin: 0 0 50px;
                                         float: left;
                                         width: 34%;
                                         padding-left: 30px;
                                     }

                                     .tokyo_tm_news .embed_news {
                                         margin: 0 0 50px;
                                         float: left;
                                         width: 33%;
                                         padding-left: 10px;

                                     }
                                }
                                @media (min-width: 769px) and  (max-width: 960px){
                                     .tokyo_tm_news .lates_news {
                                         margin: 0 0 50px;
                                         float: left;
                                         width: 50%;
                                         padding-left: 40px;
                                     }

                                     .tokyo_tm_news .embed_news {
                                         margin: 0 0 50px;
                                         float: left;
                                         width: 50%;
                                         padding-left: 40px;

                                     }
                                }
                                @media (max-width: 768px){
                                     .tokyo_tm_news .lates_news {
                                         margin: 0 0 40px 0;
                                         float: left;
                                         width: 100%;
                                     }

                                     .tokyo_tm_news .embed_news {
                                         margin: 0 0 40px 0;
                                         float: left;
                                         width: 100%;
                                         text-align: center;

                                     }
                                }
                            </style>

                            <div class="leftpart">
                                <div class="leftpart_inner">
                                    <div class="logo">
                                        <a href="#"><img src="assets/img/logo/dark.png" alt="" /></a>
                                    </div>
                                    <div class="menu">
                                        <ul>
                                            <li class="active"><a href="#home">Home</a></li>
                                            <li><a href="#about">About</a></li>
                                            <li><a href="#portfolio">Portfolio</a></li>
                                            <li><a href="#news" onclick="news_load('1','all');">News</a></li>
                                            <li><a href="#contact">Contact</a></li>
                                        </ul>
                                    </div>
                                    <div class="copyright" style="padding-right: 10px;">
                                        <p>&copy; <?php echo date('Y').' '.$data_get_website['footer']; ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="rightpart">
                                <div class="rightpart_in">

                                    <div id="home" class="tokyo_tm_section">
                                        <div class="container">
                                            <div class="tokyo_tm_home">
                                                <div class="home_content">
                                                    <div class="avatar">
                                                        <div class="image-home" data-img-url="assets/img/slider/bodro-bilowo.jpeg"></div>
                                                    </div>
                                                    <div class="details">
                                                        <h3 class="name">BODRO BILOWO</h3>
                                                        <p class="job">Insta.Lust.Traitor<br>Most of the time doing illustration & Chasing Coin at<br>the NFT World</p>
                                                        <div class="social">
                                                            <ul>
                                                                <li><a href="<?php echo $data_get_website['facebook_link']; ?>" target="_blank"><img class="svg" src="assets/img/svg/social/facebook.svg" alt="" /></a></li>
                                                                <li><a href="<?php echo $data_get_website['twitter_link']; ?>" target="_blank"><img class="svg" src="assets/img/svg/social/twitter.svg" alt="" /></a></li>
                                                                <li><a href="<?php echo $data_get_website['instagram_link']; ?>" target="_blank"><img class="svg" src="assets/img/svg/social/instagram.svg" alt="" /></a></li>
                                                                <!--
                                                                <li><a href="#"><img class="svg" src="assets/img/svg/social/dribbble.svg" alt="" /></a></li>
                                                                <li><a href="#"><img class="svg" src="assets/img/svg/social/tik-tok.svg" alt="" /></a></li>
                                                                  -->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div id="about" class="tokyo_tm_section active">
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
                                                            <!--            
                                                            <div class="tokyo_tm_button">
                                                                <a href="#">Learn More</a>
                                                            </div>
                                                            -->
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

                                    <div class="tokyo_tm_portfolio_titles">
                                    </div>

                                    <div id="portfolio" class="tokyo_tm_section">
                                        <div class="container">
                                            <div class="tokyo_tm_portfolio">
                                                <div class="tokyo_tm_title">
                                                    <div class="title_flex">
                                                        <div class="left">
                                                            <span>Portfolio</span>
                                                            <h3>Creative Portfolio</h3>
                                                        </div>
                                                        <div class="portfolio_filter">
                                                            <ul>
                                                                <li><a href="#" class="current" data-filter="*">All</a></li>
                                                                <li><a href="#" data-filter=".vimeo">Vimeo</a></li>
                                                                <li><a href="#" data-filter=".youtube">Youtube</a></li>
                                                                <li><a href="#" data-filter=".soundcloud">Soundcloud</a></li>
                                                                <li><a href="#" data-filter=".image">Image</a></li>
                                                                <li><a href="#" data-filter=".detail">Detail</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list_wrapper">
                                                    <ul class="portfolio_list gallery_zoom">
                                                        <li class="vimeo">
                                                            <div class="inner">
                                                                <div class="entry tokyo_tm_portfolio_animation_wrap" data-title="Teresa Butler" data-category="Vimeo">
                                                                    <a class="popup-vimeo" href="https://vimeo.com/312334044">
                                                                        <img src="assets/img/thumbs/1-1.jpg" alt="" />
                                                                        <div class="main_image" data-img-url="assets/img/portfolio/5.jpg"></div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="youtube">
                                                            <div class="inner">
                                                                <div class="entry tokyo_tm_portfolio_animation_wrap" data-title="Ashley Flores" data-category="Youtube">
                                                                    <a class="popup-youtube" href="https://www.youtube.com/watch?v=Amq-qlqbjYA">
                                                                        <img src="assets/img/thumbs/1-1.jpg" alt="" />
                                                                        <div class="main_image" data-img-url="assets/img/portfolio/6.jpg"></div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="soundcloud">
                                                            <div class="inner">
                                                                <div class="entry tokyo_tm_portfolio_animation_wrap" data-title="Derek Smith" data-category="Soundcloud">
                                                                    <a class="soundcloude_link mfp-iframe audio" href="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/252739311&amp;color=%23ff5500&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true">
                                                                        <img src="assets/img/thumbs/1-1.jpg" alt="" />
                                                                        <div class="main_image" data-img-url="assets/img/portfolio/4.jpg"></div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="image">
                                                            <div class="inner">
                                                                <div class="entry tokyo_tm_portfolio_animation_wrap" data-title="Gloria Jenkins" data-category="Image">
                                                                    <a class="zoom" href="assets/img/portfolio/3.jpg">
                                                                        <img src="assets/img/thumbs/1-1.jpg" alt="" />
                                                                        <div class="main_image" data-img-url="assets/img/portfolio/3.jpg"></div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="detail">
                                                            <div class="inner">
                                                                <div class="entry tokyo_tm_portfolio_animation_wrap" data-title="Selena Gomez" data-category="Detail">
                                                                    <a class="popup_info" href="#">
                                                                        <img src="assets/img/thumbs/1-1.jpg" alt="" />
                                                                        <div class="main_image" data-img-url="assets/img/portfolio/7.jpg"></div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="details_all_wrap">
                                                                <div class="popup_details">
                                                                    <div class="top_image"></div>
                                                                    <div class="portfolio_main_title"></div>
                                                                    <div class="main_details">
                                                                        <div class="textbox">
                                                                            <p>We live in a world where we need to move quickly and iterate on our ideas as flexibly as possible. Building mockups strikes the ideal balance between true-life representation of the end product and ease of modification.</p>
                                                                            <p>Mockups are useful both for the creative phase of the project - for instance when you're trying to figure out your user flows or the proper visual hierarchy - and the production phase when they will represent the target product. Making mockups a part of your creative and development process allows you to quickly and easily ideate.</p>
                                                                        </div>
                                                                        <div class="detailbox">
                                                                            <ul>
                                                                                <li>
                                                                                    <span class="first">Client</span>
                                                                                    <span>Alvaro Morata</span>
                                                                                </li>
                                                                                <li>
                                                                                    <span class="first">Category</span>
                                                                                    <span><a href="#">Detail</a></span>
                                                                                </li>
                                                                                <li>
                                                                                    <span class="first">Date</span>
                                                                                    <span>March 07, 2021</span>
                                                                                </li>
                                                                                <li>
                                                                                    <span class="first">Share</span>
                                                                                    <ul class="share">
                                                                                        <li><a href="#"><img class="svg" src="assets/img/svg/social/facebook.svg" alt="" /></a></li>
                                                                                        <li><a href="#"><img class="svg" src="assets/img/svg/social/twitter.svg" alt="" /></a></li>
                                                                                        <li><a href="#"><img class="svg" src="assets/img/svg/social/instagram.svg" alt="" /></a></li>
                                                                                        <li><a href="#"><img class="svg" src="assets/img/svg/social/dribbble.svg" alt="" /></a></li>
                                                                                        <li><a href="#"><img class="svg" src="assets/img/svg/social/tik-tok.svg" alt="" /></a></li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="additional_images">
                                                                        <ul>
                                                                            <li>
                                                                                <div class="list_inner">
                                                                                    <div class="my_image">
                                                                                        <img src="assets/img/thumbs/4-2.jpg" alt="" />
                                                                                        <div class="main" data-img-url="assets/img/portfolio/1.jpg"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="list_inner">
                                                                                    <div class="my_image">
                                                                                        <img src="assets/img/thumbs/4-2.jpg" alt="" />
                                                                                        <div class="main" data-img-url="assets/img/portfolio/2.jpg"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="list_inner">
                                                                                    <div class="my_image">
                                                                                        <img src="assets/img/thumbs/4-2.jpg" alt="" />
                                                                                        <div class="main" data-img-url="assets/img/portfolio/3.jpg"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="detail">
                                                            <div class="inner">
                                                                <div class="entry tokyo_tm_portfolio_animation_wrap" data-title="Ave Simone" data-category="Detail">
                                                                    <a class="popup_info" href="#">
                                                                        <img src="assets/img/thumbs/1-1.jpg" alt="" />
                                                                        <div class="main_image" data-img-url="assets/img/portfolio/8.jpg"></div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="details_all_wrap">
                                                                <div class="popup_details">
                                                                    <div class="top_image"></div>
                                                                    <div class="portfolio_main_title"></div>
                                                                    <div class="main_details">
                                                                        <div class="textbox">
                                                                            <p>We live in a world where we need to move quickly and iterate on our ideas as flexibly as possible. Building mockups strikes the ideal balance between true-life representation of the end product and ease of modification.</p>
                                                                            <p>Mockups are useful both for the creative phase of the project - for instance when you're trying to figure out your user flows or the proper visual hierarchy - and the production phase when they will represent the target product. Making mockups a part of your creative and development process allows you to quickly and easily ideate.</p>
                                                                        </div>
                                                                        <div class="detailbox">
                                                                            <ul>
                                                                                <li>
                                                                                    <span class="first">Client</span>
                                                                                    <span>Alvaro Morata</span>
                                                                                </li>
                                                                                <li>
                                                                                    <span class="first">Category</span>
                                                                                    <span><a href="#">Detail</a></span>
                                                                                </li>
                                                                                <li>
                                                                                    <span class="first">Date</span>
                                                                                    <span>March 07, 2021</span>
                                                                                </li>
                                                                                <li>
                                                                                    <span class="first">Share</span>
                                                                                    <ul class="share">
                                                                                        <li><a href="#"><img class="svg" src="assets/img/svg/social/facebook.svg" alt="" /></a></li>
                                                                                        <li><a href="#"><img class="svg" src="assets/img/svg/social/twitter.svg" alt="" /></a></li>
                                                                                        <li><a href="#"><img class="svg" src="assets/img/svg/social/instagram.svg" alt="" /></a></li>
                                                                                        <li><a href="#"><img class="svg" src="assets/img/svg/social/dribbble.svg" alt="" /></a></li>
                                                                                        <li><a href="#"><img class="svg" src="assets/img/svg/social/tik-tok.svg" alt="" /></a></li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="additional_images">
                                                                        <ul>
                                                                            <li>
                                                                                <div class="list_inner">
                                                                                    <div class="my_image">
                                                                                        <img src="assets/img/thumbs/4-2.jpg" alt="" />
                                                                                        <div class="main" data-img-url="assets/img/portfolio/1.jpg"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="list_inner">
                                                                                    <div class="my_image">
                                                                                        <img src="assets/img/thumbs/4-2.jpg" alt="" />
                                                                                        <div class="main" data-img-url="assets/img/portfolio/2.jpg"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="list_inner">
                                                                                    <div class="my_image">
                                                                                        <img src="assets/img/thumbs/4-2.jpg" alt="" />
                                                                                        <div class="main" data-img-url="assets/img/portfolio/3.jpg"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


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
                                                        <div class="list_inner">
                                                            <div class="image">
                                                                <img src="http://localhost/elhace/back/upload_file/news/<?php echo $valueNewsLatest['news_folder']; ?>/image_news.png" alt="" />
                                                                <div class="main" data-img-url="http://localhost/elhace/back/upload_file/news/<?php echo $valueNewsLatest['news_folder']; ?>/image_news.png"></div>
                                                                <a class="tokyo_tm_full_link" href="#"></a>
                                                            </div>
                                                            <div class="details">
                                                                <div class="extra">
                                                                    <div class="short">
                                                                        <p class="date">By <a href="#">Bodro Bilowo</a> <span><?php echo $valueNewsLatest['create_date']; ?></span></p>
                                                                    </div>
                                                                    <!--
                                                                    <div class="my_like">
                                                                        <a href="#"><img class="svg" src="assets/img/svg/like.svg" alt="" /><span>35</span></a>
                                                                    </div>
                                                                     -->
                                                                </div>
                                                                <h3 class="title"><a href="#"><?php echo $valueNewsLatest['news_title']; ?></a></h3>
                                                                <div class="tokyo_tm_read_more">
                                                                    <a href="www.youtube.com"><span>Read More</span></a>
                                                                </div>
                                                            </div>
                                                            <div class="main_content">
                                                               <div class="descriptions">
                                                                    <p class="bigger"><?php echo $valueNewsLatest['news_text']; ?></p>
                                                                </div>
                                                                <div class="news_share">
                                                                    <span>Share:</span>
                                                                    <ul>
                                                                        <li><a href="#"><img class="svg" src="assets/img/svg/social/facebook.svg" alt="" /></a></li>
                                                                        <li><a href="#"><img class="svg" src="assets/img/svg/social/twitter.svg" alt="" /></a></li>
                                                                        <li><a href="#"><img class="svg" src="assets/img/svg/social/instagram.svg" alt="" /></a></li>
                                                                        <!--
                                                                        <li><a href="#"><img class="svg" src="assets/img/svg/social/dribbble.svg" alt="" /></a></li>
                                                                        <li><a href="#"><img class="svg" src="assets/img/svg/social/tik-tok.svg" alt="" /></a></li>
                                                                        -->
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                   </li>
                                                   <?php } ?>
                                                   <li class="embed_news">
                                                        <div class="list_inner">
                                                            <center>
                                                            <?php echo $data_get_website['embed_twitter']; ?>
                                                            </center>
                                                        </div>
                                                   </li>
                                                   <li class="embed_news">
                                                      <div class="list_inner">
                                                            <center>
                                                             <?php echo $data_get_website['embed_instagram']; ?>
                                                            </center>
                                                      </div>
                                                   </li>
                                                </ul>
                                                <div id="page_news">
                                                   
                                                </div>
                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
                                                <script>
                                                     //$(document).ready(function(){
                                                         // news_load('1');
                                                          function news_load(page){
                                                                $.ajax({
                                                                    url:"news_load.php",
                                                                    method:"POST",
                                                                    data:{'page':page,},
                                                                    success:function(data){
                                                                         $('#page_news').html(data);
                                                                    }
                                                               })
                                                          }
                                                          /*
                                                          $(document).on('click', '.halaman', function(){
                                                               var page = $(this).attr("id");
                                                               news_load(page);
                                                          });*/
                                                     //});
                                                     </script>
                                             </div>
                                          </div>
                                       </div>


                                <div id="contact" class="tokyo_tm_section">
                                    <div class="container">
                                        <div class="tokyo_tm_contact">
                                            <div class="tokyo_tm_title">
                                                <div class="title_flex">
                                                    <div class="left">
                                                        <span>Contact</span>
                                                        <h3>Get in Touch</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="map_wrap">
                                                <div class="map" id="ieatmaps"></div>
                                            </div>
                                            <div class="fields">
                                                <form action="https://marketifythemes.net/" method="post" class="contact_form" id="contact_form" autocomplete="off">
                                                    <div class="returnmessage" data-success="Your message has been received, We will contact you soon."></div>
                                                    <div class="empty_notice"><span>Please Fill Required Fields</span></div>
                                                    <div class="first">
                                                        <ul>
                                                            <li>
                                                                <input id="name" type="text" placeholder="Name">
                                                            </li>
                                                            <li>
                                                                <input id="email" type="text" placeholder="Email">
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="last">
                                                        <textarea id="message" placeholder="Message"></textarea>
                                                    </div>
                                                    <div class="tokyo_tm_button" data-position="left">
                                                        <a id="send_message" href="#">
                                                            <span>Send Message</span>
                                                        </a>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--
                        <div class="mouse-cursor cursor-outer"></div>
                        <div class="mouse-cursor cursor-inner"></div>
                        -->

                    </div>


                    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.js"></script>
                    <!--[if lt IE 10]> <script type="text/javascript" src="assets/js/ie8.js"></script> <![endif]-->
                        <script src="assets/js/plugins.js"></script>
                        <script src="assets/js/init.js"></script>
                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5bpEs3xlB8vhxNFErwoo3MXR64uavf6Y&amp;callback=initMap"></script>

                       
 
<script type="text/javascript">
    window.onload=set();
    function set() {
       // $('#about').add('active');
    }
    $(document).ready(function() {
         
    })
</script> 
                    </body>
                    </html>