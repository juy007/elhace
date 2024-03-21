<?php 
     defined("BASEPATH") or exit("No direct access allowed");
 ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
    <!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
        <!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
            <!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <meta name="description" content="<?php echo $meta_description; ?>">
                    <meta name="keywords" content="<?php echo $meta_keyword; ?>">
                    <meta name="author" content="bodro-bilowo">
                    <link rel="shortcut icon" href="<?php echo $back_root; ?>assets/frontend/img/favicon.ico">
                    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
                    <title>Elhace Studio by Bodro Bilowo</title>

                    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
                    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
                    <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>assets/css/plugins.css" />
                    <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>assets/css/dark.css" />
                    <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>assets/css/colors.css" />
                    <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>assets/css/style.css?v=<?php echo date('s'); ?>" />
                    <!--[if lt IE 9]> <script type="text/javascript" src="<?php echo $root; ?>assets/js/modernizr.custom.js"></script> <![endif]-->
                    <style type="text/css">                                       
                        /* 
                        .avatar{
                            min-width: 350px;
                            min-height: 350px;
                            position: relative;
                            border-radius: 100%;
                       }
                       */     
                    </style>
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
                                        <a href="#"><img class="svg" src="<?php echo $root; ?>assets/img/svg/cancel.png" alt="" /></a>
                                    </div>
                                    <div class="description_wrap"></div>
                                </div>
                            </div>


                            <div class="tokyo_tm_modalbox_about">
                                <div class="box_inner">
                                    <div class="close">
                                        <a href="#"><img class="svg" src="<?php echo $root; ?>assets/img/svg/cancel.png" alt="" /></a>
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
                                                <li class="item"><a href="#"><img src="<?php echo $root; ?>assets/img/partners/1.png" alt="" /></a></li>
                                                <li class="item"><a href="#"><img src="<?php echo $root; ?>assets/img/partners/2.png" alt="" /></a></li>
                                                <li class="item"><a href="#"><img src="<?php echo $root; ?>assets/img/partners/3.png" alt="" /></a></li>
                                                <li class="item"><a href="#"><img src="<?php echo $root; ?>assets/img/partners/4.png" alt="" /></a></li>
                                                <li class="item"><a href="#"><img src="<?php echo $root; ?>assets/img/partners/5.png" alt="" /></a></li>
                                                <li class="item"><a href="#"><img src="<?php echo $root; ?>assets/img/partners/6.png" alt="" /></a></li>
                                                <li class="item"><a href="#"><img src="<?php echo $root; ?>assets/img/partners/7.png" alt="" /></a></li>
                                                <li class="item"><a href="#"><img src="<?php echo $root; ?>assets/img/partners/8.png" alt="" /></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <style type="text/css">

                            </style>
                            <div class="tokyo_tm_mobile_menu">
                               
                                <div class="menu_inner" style="">
                                    <div class="logo">
                                        <img src="<?php echo $root; ?>assets/img/logo/dark.png" alt="" />
                                    </div>
                                    <div class="menu">
                                        <!--
                                        <ul>
                                            
                                            <li><a href="<?php echo $root; ?>"><img class="svg" src="<?php echo $root; ?>assets/img/svg/home-run.svg" alt="" /></a></li>
                                            <li><a href="<?php echo $root; ?>about"><img class="svg" src="<?php echo $root; ?>assets/img/svg/avatar.svg" alt="" /></a></li>
                                            <li><a href="<?php echo $root; ?>portfolio"><img class="svg" src="<?php echo $root; ?>assets/img/svg/briefcase.svg" alt="" /></a></li>
                                            <li><a href="<?php echo $root; ?>news"><img class="svg" src="<?php echo $root; ?>assets/img/svg/paper.svg" alt="" /></a></li>
                                            <li><a href="<?php echo $root; ?>contact"><img class="svg" src="<?php echo $root; ?>assets/img/svg/mail.svg" alt="" /></a></li>
                                            
                                            <li><a href="#"><img height="50" class="" src="<?php echo $root; ?>assets/img/svg/menu-app.svg" alt="" /></a></li>
                                        </ul>
                                        -->
                                        <div id=icon-nav class="container_app" onclick="icon_app_click(this,'open');">
                                          <div class="bar_app1"></div>
                                          <div class="bar_app2"></div>
                                          <div class="bar_app3"></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="list_menu_app" class="menu_app menu_app_close">
                                        <ul class="ul_app">
                                            <li class="li_app" id="m_home">
                                                <a class="a_app" href="<?php echo $root; ?>">
                                                    <!--<img class="icon_app" class="" src="<?php echo $root; ?>assets/img/svg/home-run.svg" alt="" />--> 
                                                    Home
                                                </a>
                                            </li>
                                            <li class="li_app" id="m_about">
                                                <a class="a_app" href="<?php echo $root; ?>about">
                                                    <!--<img class="icon_app" class="" src="<?php echo $root; ?>assets/img/svg/avatar.svg" alt="" />--> 
                                                    About
                                                </a>
                                            </li>
                                            <li class="li_app" id="m_portfolio">
                                                <a class="a_app" href="<?php echo $root; ?>portfolio">
                                                    <!--<img class="icon_app" class="" src="<?php echo $root; ?>assets/img/svg/briefcase.svg" alt="" />--> 
                                                    Portfolio
                                                </a>
                                            </li>
                                            <li class="li_app" id="m_news">
                                                <a class="a_app" href="<?php echo $root; ?>news">
                                                    <!--<img class="icon_app" class="" src="<?php echo $root; ?>assets/img/svg/paper.svg" alt="" />--> 
                                                    News
                                                </a>
                                            </li>
                                            <li class="li_app" id="m_contact">
                                                <a class="a_app" href="<?php echo $root; ?>contact"> 
                                                    <!--<img class="icon_app" class="" src="<?php echo $root; ?>assets/img/svg/mail.svg" alt="" />--> 
                                                    Contact
                                                </a>
                                            </li>
                                            <li class="li_app">
                                            </li>
                                        </ul>
                                </div>
                            </div>
                           

                            <div class="leftpart">
                                <div class="leftpart_inner">
                                    <div class="logo">
                                        <a href="<?php echo $root; ?>"><img src="<?php echo $root; ?>assets/img/logo/dark.png" alt="" /></a>
                                    </div>
                                    <div class="menu">
                                        <ul>
                                            <li id="m_home" class=""><a href="<?php echo $root; ?>">Home</a></li>
                                            <li id="m_about"><a href="<?php echo $root; ?>about">About</a></li>
                                            <li id="m_portfolio"><a href="<?php echo $root; ?>portfolio">Portfolio</a></li>
                                            <li id="m_news"><a href="<?php echo $root; ?>news">News</a></li>
                                            <li id="m_contact"><a href="<?php echo $root; ?>contact">Contact</a></li>
                                        </ul>
                                    </div>
                                    <div class="copyright" style="padding-right: 10px;">
                                        <p>&copy; <?php echo date('Y').' '.$data_get_website['footer']; ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="rightpart">
                                <div class="rightpart_in">