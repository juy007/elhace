<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Elhace - Administrator</title>

   <!-- Favicon -->
   <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/frontend/img/favicon.ico">

   <!-- page css -->

   <!-- Core css -->
   <link href="<?php echo base_url(); ?>assets/backend/css/app.min.css" rel="stylesheet">

</head>

<body>
   <div class="app">
      <div class="layout">
         <!-- Header START -->
         <div class="header">
            <div class="logo logo-dark">
               <a href="index.html">
                  <img style="height: 63px;" src="<?php echo base_url(); ?>assets/frontend/img/main_logo.png?l=<?php echo date('s'); ?>" alt="Logo">
                  <img style="height: 60px;"  class="logo-fold" src="<?php echo base_url(); ?>assets/frontend/img/main_logo.png?l=<?php echo date('s'); ?>" alt="Logo">
               </a>
            </div>
            <div class="logo logo-white">
               <a href="index.html">
                  <img src="<?php echo base_url(); ?>assets/frontend/img/main_logo.png?l=<?php echo date('s'); ?>" alt="Logo">
                  <img class="logo-fold" src="<?php echo base_url(); ?>assets/frontend/img/main_logo.png?l=<?php echo date('s'); ?>" alt="Logo">
               </a>
            </div>
            <div class="nav-wrap">
               <ul class="nav-left">
                  <li class="desktop-toggle">
                     <a href="javascript:void(0);">
                        <i class="anticon"></i>
                     </a>
                  </li>
                  <li class="mobile-toggle">
                     <a href="javascript:void(0);">
                        <i class="anticon"></i>
                     </a>
                  </li>
                  <!--
                  <li>
                     <a href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
                        <i class="anticon anticon-search"></i>
                     </a>
                  </li>
                  -->
               </ul>
               <ul class="nav-right">
                  <!--
                  <li class="dropdown dropdown-animated scale-left">
                     <a href="javascript:void(0);" data-toggle="dropdown">
                       <i class="anticon anticon-bell notification-badge"></i>
                     </a>
                     <div class="dropdown-menu pop-notification">
                        
                        <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                           <p class="text-dark font-weight-semibold m-b-0">
                              <i class="anticon anticon-bell"></i>
                              <span class="m-l-10">Notification</span>
                           </p>
                           <a class="btn-sm btn-default btn" href="javascript:void(0);">
                             <small>View All</small>
                           </a>
                        </div>
                        <div class="relative">
                           <div class="overflow-y-auto relative scrollable" style="max-height: 300px">
                              <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                 <div class="d-flex">
                                    <div class="avatar avatar-blue avatar-icon">
                                       <i class="anticon anticon-mail"></i>
                                    </div>
                                    <div class="m-l-15">
                                       <p class="m-b-0 text-dark">You received a new message</p>
                                       <p class="m-b-0"><small>8 min ago</small></p>
                                    </div>
                                 </div>
                              </a>
                              <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                 <div class="d-flex">
                                    <div class="avatar avatar-cyan avatar-icon">
                                      <i class="anticon anticon-user-add"></i>
                                    </div>
                                    <div class="m-l-15">
                                      <p class="m-b-0 text-dark">New user registered</p>
                                      <p class="m-b-0"><small>7 hours ago</small></p>
                                    </div>
                                 </div>
                              </a>
                              <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                 <div class="d-flex">
                                    <div class="avatar avatar-red avatar-icon">
                                       <i class="anticon anticon-user-add"></i>
                                    </div>
                                    <div class="m-l-15">
                                       <p class="m-b-0 text-dark">System Alert</p>
                                       <p class="m-b-0"><small>8 hours ago</small></p>
                                    </div>
                                  </div>
                              </a>
                              <a href="javascript:void(0);" class="dropdown-item d-block p-15 ">
                                 <div class="d-flex">
                                    <div class="avatar avatar-gold avatar-icon">
                                       <i class="anticon anticon-user-add"></i>
                                    </div>
                                    <div class="m-l-15">
                                       <p class="m-b-0 text-dark">You have a new update</p>
                                       <p class="m-b-0"><small>2 days ago</small></p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>

                     </div>
                  </li>
                  -->
                  <li class="dropdown dropdown-animated scale-left" style="padding-right: 20px;">
                     <div class="pointer" data-toggle="dropdown">
                        <div class="avatar avatar-image  m-h-10 m-r-15">
                           <img src="<?php echo base_url(); ?>assets/backend/images/avatars/user.png"  alt="">
                        </div>
                        <?php echo $this->session->userdata('nama_admin'); ?>
                     </div>
                     <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                        <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                           <div class="d-flex m-r-50">
                              <div class="avatar avatar-lg avatar-image">
                                 <img src="<?php echo base_url(); ?>assets/backend/images/avatars/user.png" alt="">
                              </div>
                              <div class="m-l-10">
                                 <p class="m-b-0 text-dark font-weight-semibold"><?php echo $this->session->userdata('nama_admin'); ?></p>
                                 <p class="m-b-0 opacity-07">Administrator</p>
                              </div>
                           </div>
                        </div>
                        <a href="<?php echo base_url(); ?>admin-edit-profile" class="dropdown-item d-block p-h-15 p-v-10">
                           <div class="d-flex align-items-center justify-content-between">
                              <div>
                                <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                <span class="m-l-10">Edit Profile</span>
                              </div>
                              <i class="anticon font-size-10 anticon-right"></i>
                           </div>
                        </a>
                        <!--
                        <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                           <div class="d-flex align-items-center justify-content-between">
                              <div>
                                <i class="anticon opacity-04 font-size-16 anticon-lock"></i>
                                <span class="m-l-10">Account Setting</span>
                              </div>
                              <i class="anticon font-size-10 anticon-right"></i>
                           </div>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                           <div class="d-flex align-items-center justify-content-between">
                              <div>
                                 <i class="anticon opacity-04 font-size-16 anticon-project"></i>
                                 <span class="m-l-10">Projects</span>
                              </div>
                              <i class="anticon font-size-10 anticon-right"></i>
                           </div>
                        </a>
                        -->
                        <a href="<?php echo base_url(); ?>admin/logout" class="dropdown-item d-block p-h-15 p-v-10">
                           <div class="d-flex align-items-center justify-content-between">
                              <div>
                                <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                <span class="m-l-10">Logout</span>
                              </div>
                              <i class="anticon font-size-10 anticon-right"></i>
                           </div>
                        </a>
                     </div>
                  </li>
                  <!--
                  <li>
                     <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">
                        <i class="anticon anticon-appstore"></i>
                     </a>
                  </li>
                  -->
               </ul>
            </div>
         </div>    
         <!-- Header END -->

<style type="text/css">
   li.menu-li.active {
      background-color: rgba(63,135,245,0.15);
      border-right: 2px solid #3f87f5;
   }
</style>
         <!-- Side Nav START -->
         <div class="side-nav">
            <div class="side-nav-inner">
               <ul class="side-nav-menu scrollable">
                  <li id="menu_dashboard" class="menu-li">
                     <a class="" href="<?php echo base_url() ?>admin-dashboard">
                        <span class="icon-holder">
                           <i class="anticon anticon-dashboard"></i>
                        </span>
                        <span class="title">Dashboard
                        </span>
                     </a>
                  </li>
                 
                  
                  <li id="menu_news" class="nav-item dropdown">
                     <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                           <i class="anticon anticon-file-text"></i>
                        </span>
                        <span class="title">News </span>
                        <span class="arrow">
                           <i class="arrow-icon"></i>
                        </span>
                     </a>
                     <ul class="dropdown-menu">
                        <li id="menu_list_news" class="menu-li">
                           <a href="<?php echo base_url() ?>admin-news">List</a>
                        </li>
                         <li id="menu_category_news" class="menu-li">
                            <a href="<?php echo base_url() ?>admin-news-category">Category</a>
                         </li>
                     </ul>
                  </li>

                  <li id="menu_portfolio" class="nav-item dropdown">
                     <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                           <i class="anticon anticon-picture"></i>
                        </span>
                        <span class="title">Portfolio </span>
                        <span class="arrow">
                           <i class="arrow-icon"></i>
                        </span>
                     </a>
                     <ul class="dropdown-menu">
                        <li id="menu_list_portfolio" class="menu-li">
                           <a href="<?php echo base_url() ?>admin-portfolio">List</a>
                        </li>
                         <li id="menu_category_portfolio" class="menu-li">
                            <a href="<?php echo base_url() ?>admin-portfolio-category">Category</a>
                         </li>
                     </ul>
                  </li>

                  <li id="menu_appreance" class="nav-item dropdown">
                     <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                           <i class="anticon anticon-setting"></i>
                        </span>
                        <span class="title">Appreance </span>
                        <span class="arrow">
                           <i class="arrow-icon"></i>
                        </span>
                     </a>
                     <ul class="dropdown-menu">
                        <li id="menu_logo" class="menu-li">
                           <a href="<?php echo base_url() ?>admin-logo">Logo</a>
                        </li>
                         <li id="menu_footer" class="menu-li">
                            <a href="<?php echo base_url() ?>admin-footer">Footer</a>
                         </li>
                     </ul>
                  </li>
                  <li id="menu_website" class="nav-item dropdown">
                     <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                           <i class="anticon anticon-global"></i>
                        </span>
                        <span class="title">Website </span>
                        <span class="arrow">
                           <i class="arrow-icon"></i>
                        </span>
                     </a>
                     <ul class="dropdown-menu">
                        <li id="menu_meta" class="menu-li">
                           <a href="<?php echo base_url() ?>admin-meta">Meta</a>
                        </li>
                        <li id="menu_social_media" class="menu-li">
                            <a href="<?php echo base_url() ?>admin-social-media">Contact &<br>Social Media</a>
                        </li>
                        <li id="menu_embed_map" class="menu-li">
                            <a href="<?php echo base_url() ?>admin-embed-map">Embed Map</a>
                        </li>
                     </ul>
                  </li>
                  
               </ul>
            </div>
         </div>
         <!-- Side Nav END -->

         <!-- Page Container START -->
         <div class="page-container">