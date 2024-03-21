<!-- Content Wrapper START -->
<div class="main-content" style="background:#F9FBFD;">
    <div class="page-header">
        <h2 class="header-title"></h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Website</a>
                <span class="breadcrumb-item active">Social Media</span>
            </nav>
        </div>
    </div>
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
        <h4>Social Media</h4>
        <div class="m-t-25" style="max-width: 700px">
            <form action="<?php echo base_url() ?>admin/save_social_media" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">E-mail</label>
                  <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $web->email_link; ?>" placeholder="examples@mail.com">
                 </div>
               </div>
               <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Facebook</label>
                  <div class="col-sm-9">
                        <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo $web->facebook_link; ?>" placeholder="URL">
                 </div>
               </div>
               <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Twitter</label>
                  <div class="col-sm-9">
                        <input type="text" class="form-control" id="twitter" name="twitter" value="<?php echo $web->twitter_link; ?>" placeholder="URL">
                 </div>
               </div>
               <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Instagram</label>
                  <div class="col-sm-9">
                        <input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo $web->instagram_link; ?>" placeholder="URL">
                 </div>
               </div>
               
               <div class="form-group row">
                    <div class="col-sm-12" style="text-align: right;">

                        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="anticon anticon-save"></i> Save</button>
                        <button id="btn-cancel" type="button" class="btn btn-danger" onclick="meta();"><i class="anticon anticon-edit"></i> Cancel</button>
                        <button id="btn-open" type="button" class="btn btn-primary" onclick="open_meta();"><i class="anticon anticon-edit"></i> Change</button>
                    </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Content Wrapper END -->                

<!-- /.content-wrapper -->
<script type="text/javascript">
    window.onload=meta();
    function meta()
    {
        document.getElementById('email').disabled=true;
        document.getElementById('facebook').disabled=true;
        document.getElementById('twitter').disabled=true;
        document.getElementById('instagram').disabled=true;
        document.getElementById('btn-submit').hidden=true;
        document.getElementById('btn-submit').hidden=true;
        document.getElementById('btn-cancel').hidden=true;
        document.getElementById('btn-open').hidden=false;
    }
    function open_meta()
    {
        document.getElementById('email').disabled=false;
        document.getElementById('facebook').disabled=false;
        document.getElementById('twitter').disabled=false;
        document.getElementById('instagram').disabled=false;
        document.getElementById('btn-submit').hidden=false;
        document.getElementById('btn-cancel').hidden=false;
        document.getElementById('btn-open').hidden=true;
    }
</script>
