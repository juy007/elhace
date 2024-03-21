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
        <h4>Portfolio Form</h4>
        <div class="m-t-25" style="max-width: 700px">
            
            <form action="<?php echo base_url() ?>admin/save_portfolio" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="port_title" name="port_title" placeholder="Title" required onchange="to_meta();">
                    </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Category</label>
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
                    <label for="created_date" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="description" name="description" rows="10" placeholder="" required="required" onchange="to_meta();"></textarea>
                    </div>
                </div> 

                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Image</label>
                  <div class="col-sm-6">
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" id="customFile" name="image_portfolio" accept="image/*" require>
                           <label class="custom-file-label" id="btn_select" for="customFile">Choose file</label>
                        </div>
                        <img id="image_show" src="<?php echo base_url() ?>assets/backend/images/avatars/thumb-1.jpg" style="width:100%;margin-top: 5px;">
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
                 </div>
               </div> 
                <div class="form-group row">
                 <label for="created_date" class="col-sm-3 col-form-label">Created Date</label>
                 <div class="col-sm-4">
                   <input type="date" class="form-control" id="created_date" name="created_date" value="<?php echo date('Y-m-d'); ?>" required>
                 </div>
               </div> 
               <hr/>
               <input type="hidden" class="form-control" id="publish_status" name="publish_status">
               <div class="form-group row">
                    <div class="col-sm-12" style="text-align: right;">

                        <a class="btn btn-default" href="<?php echo base_url() ?>admin-portfolio"><i class="anticon anticon-left-circle"></i> Back</a>
                        <button type="submit" class="btn btn-default" onclick="change_port_status_0();"><i class="anticon anticon-save"></i> Save as draft</button>
                        <button type="submit" class="btn btn-primary" onclick="change_port_status_1();"><i class="anticon anticon-save"></i> Save & Publish</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<!-- Content Wrapper END -->                
<script type="text/javascript">
    function to_meta()
    {
        var meta_description = $('#port_title').val()+' - '+$('#description').val();
        $('#meta_description').val(meta_description.substring(0, 500));
        $('#meta_keyword').val($('#port_title').val());
    }
</script>
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
<script type="text/javascript">

   function change_port_status_0()
   {
      $('#publish_status').val('no');
   }
   function change_port_status_1()
   {
      $('#publish_status').val('yes');
   }
</script>
<!-- /.content-wrapper -->
