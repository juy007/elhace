<!-- Content Wrapper START -->
<div class="main-content" style="background:#F9FBFD;">
    <div class="page-header">
        <h2 class="header-title"></h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Administrator</a>
                <span class="breadcrumb-item active">Profile</span>
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
        <h4>Profile</h4>
        <div class="m-t-25" style="max-width: 700px">
            <form action="<?php echo base_url() ?>admin/save_setting" method="POST" enctype="multipart/form-data">
               <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
                  <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo  $this->session->userdata('nama_admin'); ?>">
                 </div>
               </div>
               <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">E-mail</label>
                  <div class="col-sm-9">
                        <input class="form-control" id="email" name="email" value="<?php echo $this->session->userdata('email'); ?>">
                 </div>
               </div>
               <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Username</label>
                  <div class="col-sm-9">
                        <input class="form-control mati" id="username" name="username" value="<?php echo $this->session->userdata('username'); ?>">
                 </div>
               </div>
              
               <div class="form-group row">
                    <div class="col-sm-12" style="text-align: right;">

                        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="anticon anticon-save"></i> Save</button>
                        <button id="btn-cancel" type="button" class="btn btn-danger" onclick="meta();"><i class="anticon anticon-edit"></i> Cancel</button>
                        <button id="btn-open" type="button" class="btn btn-primary" onclick="open_meta();"><i class="anticon anticon-edit"></i> Ubah</button>
                    </div>
               </div>
            </form>
         </div>
         <hr>
      <h4>Password</h4>
        <div class="m-t-25" style="max-width: 700px">
            <form action="<?php echo base_url() ?>admin/save_setting_password" method="POST" enctype="multipart/form-data">
               <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Old password</label>
                  <div class="col-sm-9">
                        <input type="password" class="form-control" id="oldpass" name="name" value="" onkeyup="check_pass();">
                 </div>
               </div><hr>
               <div class="form-group row" id="newpass">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">New password</label>
                  <div class="col-sm-9">
                        <input type="password" class="form-control" id="passnew" name="passnew" value="">
                 </div>
               </div>
               <div class="form-group row" id="repass">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Repassword</label>
                  <div class="col-sm-9">
                        <input type="password" class="form-control" id="repassword" name="repassword" value="" onkeyup="repass();">
                        <span id="notif_repass" style="color:red;">password is not the same</span>
                 </div>
               </div>
               
               
               <div class="form-group row">
                    <div class="col-sm-12" style="text-align: right;">
                        <button id="btn-submit-pass" type="submit" class="btn btn-primary"><i class="anticon anticon-save"></i> Save</button>
                    </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Content Wrapper END -->                
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
           
<!-- /.content-wrapper -->
<script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';
    window.onload=meta();
    function meta()
    {
        document.getElementById('name').disabled=true;
        document.getElementById('email').disabled=true;
        document.getElementById('username').disabled=true;
        document.getElementById('btn-submit').hidden=true;
        document.getElementById('btn-submit').hidden=true;
        document.getElementById('btn-cancel').hidden=true;
        document.getElementById('btn-open').hidden=false;

        document.getElementById('newpass').hidden=true;
        document.getElementById('repass').hidden=true;
        document.getElementById('btn-submit-pass').hidden=true;
         document.getElementById('notif_repass').hidden=true;
        
    }
    function open_meta()
    {
        document.getElementById('name').disabled=false;
        document.getElementById('email').disabled=false;
         document.getElementById('username').disabled=false;
        document.getElementById('btn-submit').hidden=false;
        document.getElementById('btn-cancel').hidden=false;
        document.getElementById('btn-open').hidden=true;
    }

    function check_pass()
    {

        var id_admin='<?php echo $this->session->userdata('id_admin'); ?>';
        var pass = $('#oldpass').val();

        $.ajax({
            type    : 'POST',
            url     : base_url+'admin/setting_check_pass',
            data    : {'id_admin': id_admin, 'pass': pass},
            dataType: "json",
            success : function(result){
                if (result.notif=='true') {
                    document.getElementById('newpass').hidden=false;
                    document.getElementById('repass').hidden=false;
                   //document.querySelector('#notif_true').classList.add('show');
                }else if(result.notif=='false') {
                    document.getElementById('newpass').hidden=true;
                    document.getElementById('repass').hidden=true;
                }
            }
        })
    }

    function repass()
    {
        var newpass = $('#passnew').val();
        var repass = $('#repassword').val();

        if (newpass == repass) {
            document.getElementById('btn-submit-pass').hidden=false;
            document.getElementById('notif_repass').hidden=true;
        }else{
            document.getElementById('btn-submit-pass').hidden=true;
            document.getElementById('notif_repass').hidden=false;
        }
    }
</script>
