          <!-- Footer START -->
            <footer class="footer">
               <div class="footer-content">
                  <p class="m-b-0"></p>
                  <span>
                     <p class="m-b-0">Copyright © <?php echo date('Y'); ?> Bodro Bilowo all rights reserved.</p>
                     <a href="" class="text-gray"></a>
                  </span>
               </div>
            </footer>
            <!-- Footer END -->

         </div>
         <!-- Page Container END -->

         <!-- Search Start-->
         <div class="modal modal-left fade search" id="search-drawer">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header justify-content-between align-items-center">
                     <h5 class="modal-title">Search</h5>
                     <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                     </button>
                  </div>
                  <div class="modal-body scrollable">
                     <div class="input-affix">
                        <i class="prefix-icon anticon anticon-search"></i>
                        <input type="text" class="form-control" placeholder="Search">
                     </div>
                     <div class="m-t-30">
                        <h5 class="m-b-20">Files</h5>
                        <div class="d-flex m-b-30">
                           <div class="avatar avatar-cyan avatar-icon">
                              <i class="anticon anticon-file-excel"></i>
                           </div>
                           <div class="m-l-15">
                              <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Quater Report.exl</a>
                              <p class="m-b-0 text-muted font-size-13">by Finance</p>
                           </div>
                        </div>
                        <div class="d-flex m-b-30">
                           <div class="avatar avatar-blue avatar-icon">
                              <i class="anticon anticon-file-word"></i>
                           </div>
                           <div class="m-l-15">
                              <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Documentaion.docx</a>
                              <p class="m-b-0 text-muted font-size-13">by Developers</p>
                           </div>
                        </div>
                        <div class="d-flex m-b-30">
                           <div class="avatar avatar-purple avatar-icon">
                              <i class="anticon anticon-file-text"></i>
                           </div>
                           <div class="m-l-15">
                              <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Recipe.txt</a>
                              <p class="m-b-0 text-muted font-size-13">by The Chef</p>
                           </div>
                        </div>
                        <div class="d-flex m-b-30">
                           <div class="avatar avatar-red avatar-icon">
                              <i class="anticon anticon-file-pdf"></i>
                           </div>
                           <div class="m-l-15">
                              <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Project Requirement.pdf</a>
                              <p class="m-b-0 text-muted font-size-13">by Project Manager</p>
                           </div>
                        </div>
                     </div>
                     <div class="m-t-30">
                        <h5 class="m-b-20">Members</h5>
                        <div class="d-flex m-b-30">
                           <div class="avatar avatar-image">
                              <img src="<?php echo base_url(); ?>assets/backend/images/avatars/thumb-1.jpg" alt="">
                           </div>
                           <div class="m-l-15">
                              <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                              <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                           </div>
                        </div>
                        <div class="d-flex m-b-30">
                           <div class="avatar avatar-image">
                              <img src="<?php echo base_url(); ?>assets/backend/images/avatars/thumb-2.jpg" alt="">
                           </div>
                           <div class="m-l-15">
                              <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                              <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                           </div>
                        </div>
                        <div class="d-flex m-b-30">
                           <div class="avatar avatar-image">
                              <img src="<?php echo base_url(); ?>assets/backend/images/avatars/thumb-3.jpg" alt="">
                           </div>
                           <div class="m-l-15">
                              <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Marshall Nichols</a>
                              <p class="m-b-0 text-muted font-size-13">Data Analyst</p>
                           </div>
                        </div>
                     </div>   
                     <div class="m-t-30">
                        <h5 class="m-b-20">News</h5> 
                        <div class="d-flex m-b-30">
                           <div class="avatar avatar-image">
                              <img src="<?php echo base_url(); ?>assets/backend/images/others/img-1.jpg" alt="">
                           </div>
                           <div class="m-l-15">
                             <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">5 Best Handwriting Fonts</a>
                              <p class="m-b-0 text-muted font-size-13">
                                 <i class="anticon anticon-clock-circle"></i>
                                 <span class="m-l-5">25 Nov 2018</span>
                              </p>
                           </div>
                        </div>
                     </div>    
                  </div>
               </div>
            </div>
         </div>
         <!-- Search End-->

         <!-- Quick View START -->
         <div class="modal modal-right fade quick-view" id="quick-view">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Theme Config</h5>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="m-b-30">
                                <h5 class="m-b-0">Header Color</h5>
                                <p>Config header background color</p>
                                <div class="theme-configurator d-flex m-t-10">
                                    <div class="radio">
                                        <input id="header-default" name="header-theme" type="radio" checked value="default">
                                        <label for="header-default"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-primary" name="header-theme" type="radio" value="primary">
                                        <label for="header-primary"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-success" name="header-theme" type="radio" value="success">
                                        <label for="header-success"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-secondary" name="header-theme" type="radio" value="secondary">
                                        <label for="header-secondary"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-danger" name="header-theme" type="radio" value="danger">
                                        <label for="header-danger"></label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h5 class="m-b-0">Side Nav Dark</h5>
                                <p>Change Side Nav to dark</p>
                                <div class="switch d-inline">
                                    <input type="checkbox" name="side-nav-theme-toogle" id="side-nav-theme-toogle">
                                    <label for="side-nav-theme-toogle"></label>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h5 class="m-b-0">Folded Menu</h5>
                                <p>Toggle Folded Menu</p>
                                <div class="switch d-inline">
                                    <input type="checkbox" name="side-nav-fold-toogle" id="side-nav-fold-toogle">
                                    <label for="side-nav-fold-toogle"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
         </div>
         <!-- Quick View END -->
      </div>
   </div>

    
    <!-- Core Vendors JS -->
    <script src="<?php echo base_url(); ?>assets/backend/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="<?php echo base_url(); ?>assets/backend/vendors/chartjs/Chart.min.js"></script>

    <!-- Core JS -->
    <script src="<?php echo base_url(); ?>assets/backend/js/app.min.js"></script>

  <!-- datatabel -->
    <script src="<?php echo base_url(); ?>assets/backend/vendors/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/vendors/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/pages/datatables.js"></script>

<script type="text/javascript">
    var baseurl='<?php echo base_url(); ?>';
    var fullurl = window.location.href;
</script>
<script src="<?php echo base_url(); ?>assets/backend/js/menu.js?v=1"></script>
</body>

</html>