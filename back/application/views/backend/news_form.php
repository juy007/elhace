 <link href="<?php echo base_url(); ?>assets/backend/vendors/select2/select2.css" rel="stylesheet">
 <link href="<?php echo base_url(); ?>assets/backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
<!-- Content Wrapper START -->
<div class="main-content">
  	<div class="page-header">
   		<h2 class="header-title"></h2>
   		<div class="header-sub-title">
   			<nav class="breadcrumb breadcrumb-dash">
   				<a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>News</a>
   				<span class="breadcrumb-item active">Add News</span>
   			</nav>
   		</div>
   	</div>
   	<div class="card">
   		<div class="card-body">
   			<h4>News Form</h4>
   			<div class="m-t-25" style="max-width: 700px">
                <form action="<?php echo base_url() ?>admin/save_news" method="POST">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-6">
                            <select id="inputState" class="form-control" name="category" required>
                                <option value="" selected>Choose...</option>
                                <?php 
                                    foreach ($category as $key => $valueCategory) {
                                 ?>
                                    <option value="<?php echo $valueCategory['id_category']; ?>"><?php echo $valueCategory['category_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">News Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="news_title" name="news_title" autofocus placeholder="News Title">
                        </div>
                    </div>
                   	<div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                           <div class="custom-file">
						        <input type="file" class="custom-file-input" id="customFile" name="news_image">
						        <label class="custom-file-label" for="customFile">Choose file</label>
						    </div>
                        </div>
                    </div>
                    <div class="m-t-25">
                        <div id="editor">
                            <p>Hello World!</p>
                            <p>Some initial <strong>bold</strong> text</p>
                            <p><br></p>
                        </div>
                        <textarea style="width:800px;" id="news_text" name="news_text">
                        	
                        </textarea>
                    </div>
                                   
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" onclick="alll();">coba</button>
                        </div>
                	</div>
            	</form>
            </div>
   		</div>
   	</div>
</div>
<!-- Content Wrapper END -->

<script type="text/javascript">
	function alll(){
		$("#news_text").val($("#editor").html());
	}
</script>