<!-- include libraries(jQuery, bootstrap) -->
<link href="<?php echo base_url(); ?>assets/backend/summernote/bs4.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/backend/summernote/summernote-bs4.min.css" rel="stylesheet">

<!-- Content Wrapper START -->
<div class="main-content" style="background:#F9FBFD;">
   <div class="card">
   	<!--============notifikasi==========================-->
		 <?php if($this->session->flashdata('notif')){?>
            <?php if($this->session->flashdata('notif') == 'true'){?>
                        <div class="alert alert-success"> <i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('teks_notif'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        </div>
                    <?php }elseif($this->session->flashdata('notif') == 'false'){?>
                        <div class="alert alert-danger"> <i class="fa fa-times-circle"></i> <?php echo $this->session->flashdata('teks_notif'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
            <?php } ?>
        <?php } ?>
		<!--============end notifikasi==========================-->
   	<div class="card-body">
   		<h4>News Form</h4>
   		<div class="m-t-25" style="max-width: 700px">
            <form action="<?php echo base_url() ?>admin/save_news" method="POST" enctype="multipart/form-data">
               <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">News Title</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" id="news_title" name="news_title" placeholder="News Title" required onchange="to_meta();">
                 </div>
               </div>
               <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                  <div class="col-sm-6">
                     <select id="inputState" class="form-control" name="category" required>
                           <option value="" selected>Choose...</option>
                           <?php 
                           foreach ($category as $key => $valueCategory) {
                           ?>
               
                           <option value="<?php echo $valueCategory['id_news_category']; ?>"><?php echo $valueCategory['news_category_name']; ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               
               <div class="m-t-25">
                 <textarea class="" id="news_text" name="news_text" placeholder="" required="required"></textarea>
               </div>

               <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-8">
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="news_banner" accept="image/*" require>
                        <label class="custom-file-label" id="btn_select" for="customFile">Choose file</label>
                     </div>
                     <img id="image_show" src="<?php echo base_url() ?>assets/backend/images/avatars/thumb-1.jpg" style="width:90%;margin-top: 5px;">
                  </div>
               </div>

              	<div class="form-group row">
                 <label for="inputEmail3" class="col-sm-3 col-form-label">Meta Description</label>
                 <div class="col-sm-9">
                   <input type="text" class="form-control" id="meta_description" name="meta_description"placeholder="Meta Description" required>
                 </div>
               </div> 

               <div class="form-group row">
                 <label for="inputEmail3" class="col-sm-3 col-form-label">Meta Keyword</label>
                 <div class="col-sm-9">
                   <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Meta Keyword" value="" required>
                   <input type="hidden" class="form-control"  id="news_status" name="news_status" value="">
                 </div>
               </div> 

               <div class="form-group row">
                 <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                 <div class="col-sm-9">
                   <input type="hidden" class="form-control" id="tag" name="tag" value="" placeholder="tag 1, tag 2, tag 3" value="" required>
                 </div>
               </div>       

               <div class="form-group row">
                 <label for="created_date" class="col-sm-3 col-form-label">Created Date</label>
                 <div class="col-sm-4">
                   <input type="date" class="form-control" id="created_date" name="created_date" value="<?php echo date('Y-m-d'); ?>" required>
                 </div>
               </div> 
               <!--
               <div class="form-group row">
                 <label for="updated_date" class="col-sm-3 col-form-label">Updated Date</label>
                 <div class="col-sm-4">
                   <input type="date" class="form-control" id="updated_date" name="updated_date" value="">
                 </div>
               </div> 
               -->
               <input type="hidden" name="news_folder" value="<?php echo $this->session->userdata('news_folder'); ?>">
               <div class="form-group row">
               	<div class="col-sm-12" style="text-align: right;">

               	  <a class="btn btn-default" href="<?php echo base_url() ?>admin-news"><i class="anticon anticon-left-circle"></i> Back</a>
                     <button type="submit" class="btn btn-default" onclick="change_news_status_0();"><i class="anticon anticon-save"></i> Save as draft</button>
                     <button type="submit" class="btn btn-primary" onclick="change_news_status_1();"><i class="anticon anticon-save"></i> Save & Publish</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Content Wrapper END -->				

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/backend/summernote/bs4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>

<script src="<?php echo base_url(); ?>assets/backend/summernote/summernote-bs4.min.js"></script>

<script type="text/javascript">
	function to_meta()
	{
		$('#meta_description').val($('#news_title').val());
		$('#meta_keyword').val($('#news_title').val());
	}

   function change_news_status_0()
   {
      $('#news_status').val('no');
   }
   function change_news_status_1()
   {
      $('#news_status').val('yes');
   }
</script>
<!-- /.content-wrapper -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#news_text').summernote({
			toolbar: [
	        // [groupName, [list of button]]
	        ['style', ['style']],
	        ['font', ['bold', 'italic', 'underline', 'clear']],
	        ['font', ['fontsize', 'color']],
	        ['font', ['fontname']],
	        ['para', ['paragraph']],
	        ['insert', ['link','picture','video','table']], // image and doc are customized buttons
	        ['misc', ['codeview', 'fullscreen']],
	        ],
	        height: 500,
	        callbacks: {
	        	onImageUpload: function(image) {
	        		uploadImage(image[0]);
	        	},
	        	onMediaDelete : function(target) {
	        		deleteImage(target[0].src);
	        	}
	        }

	      });


		function uploadImage(image) {

			var data = new FormData();
			data.append("image", image);
			var folder='as';
			$.ajax({
				url: "<?php echo base_url()?>admin/upload_image_summernote",
				cache: false,
				contentType: false,
				processData: false,
				data: data,
				type: "POST",
				success: function(url) {
				
					$('#news_text').summernote("insertImage", url);
				},
				error: function(data) {
					console.log(data);
				}
			});
		}

		function deleteImage(src) {
			$.ajax({
				data: {src : src},
				type: "POST",
				url:	"<?php echo base_url()?>admin/delete_image_summernote",
				cache: false,
				success: function(response) {
					console.log(response);
				}
			});
		}

	});
</script>
            <!-- Footer START -->
            <footer class="footer">
               <div class="footer-content">
                  <p class="m-b-0">Copyright © <?php echo date('Y'); ?> Bodro Bilowo all rights reserved.</p>
                  <span>
                     <a href="" class="text-gray m-r-15">Term &amp; Conditions</a>
                     <a href="" class="text-gray">Privacy &amp; Policy</a>
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

        <!-- page js -->
    <script src="<?php echo base_url(); ?>assets/backend/vendors/chartjs/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/pages/dashboard-default.js"></script>

    <!-- Core JS -->
    <script src="<?php echo base_url(); ?>assets/backend/js/app.min.js"></script>

    <script type="text/javascript">
    var baseurl='<?php echo base_url(); ?>';
    var fullurl = window.location.href;
   </script>
   <script src="<?php echo base_url(); ?>assets/backend/js/menu.js"></script>

   <script type="text/javascript">
        var tm_pilih = document.getElementById('btn_select');//button pilih
        var file = document.getElementById('customFile');//input file
        tm_pilih.addEventListener('click', function () {
            file.click();
        })
        file.addEventListener('change', function () {
            gambar(this);
        })
        function gambar(a) {
            if (a.files && a.files[0]) {     
                 var reader = new FileReader();    
                 reader.onload = function (e) {
                     document.getElementById('image_show').src=e.target.result;//id tampil
                 }    
                 reader.readAsDataURL(a.files[0]);
            }

        }
</script>
</body>

</html>