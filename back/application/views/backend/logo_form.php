<!-- Content Wrapper START -->
<div class="main-content" style="background:#F9FBFD;">
   <div class="page-header">
        <h2 class="header-title"></h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Appreance</a>
                <span class="breadcrumb-item active">Logo</span>
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
        <h4>Logo Form</h4>
        <div class="m-t-25" style="max-width: 700px">
            <form id="form_logo" action="<?php echo base_url() ?>admin/save_logo" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Logo</label>
                  <div class="col-sm-6">
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" id="customFile" name="logo" accept="image/*" require="required">
                           <label class="custom-file-label" id="btn_select" for="customFile">Choose file</label>
                        </div>
                        <img id="image_show" src="<?php echo base_url() ?>assets/frontend/img/main_logo.png?l=<?php echo date('s'); ?>" style="width:50%;margin-top: 5px;">
                  </div>
               </div>
               <div class="form-group row">
                    <div class="col-sm-8" style="text-align: right;">
                        <button type="button" class="btn btn-primary" onclick="process();"><i class="anticon anticon-save"></i> Save</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Content Wrapper END -->                

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
    function process()
    {
        if ($('#customFile').val()=='') {
            //alert('1');
        }else{
            document.getElementById("form_logo").submit();
        }
    }
</script>
