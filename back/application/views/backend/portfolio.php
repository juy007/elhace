<!-- page css -->
<link href="<?php echo base_url(); ?>assets/backend/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/backend/css/news.css">


<!-- Content Wrapper START -->
<div class="main-content">
   <div class="page-header">
      <h2 class="header-title"></h2>
      <div class="header-sub-title">
         <nav class="breadcrumb breadcrumb-dash">
            <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Portfolio</a>
            <a href="#" class="breadcrumb-item active"> List</a>
         </nav>
      </div>
   </div>
   <div class="card">
      <div id="notif_true" class="notif_fix alert">
         <strong>status changed successfully</strong>
      </div>
      <div id="notif_false" class="notif_fix alert">
         <strong>failed to change status</strong>
      </div>
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
      <?php }} ?>
      <!--============end notifikasi==========================-->
      <div class="card-body">
         <h4>Portfolio list</h4>
         <p></p>
         <a href="<?php echo base_url(); ?>admin-portfolio-form" class="btn btn-default m-r-5" style="float:right"><i class="anticon anticon-plus"></i> Add portfolio</a><br>

         <div class="m-t-25" style="overflow-x: scroll;">
            <table id="data-table" class="table table-hover table-stripe">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Image</th>
                     <th>Category</th>
                     <th>Created Date</th>
                     <th>Publish Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                     $no =0;
                     foreach ($portfolio_read as $key => $valuePortfolio) {
                     $no++;
                  ?>
                  <tr>
                     <td><?php echo $no; ?></td>
                     <td>
                        <?php echo $valuePortfolio['title']; ?><br>
                        <img style="max-width:350px;" src="<?php echo base_url() ?>upload_file/portfolio/<?php echo $valuePortfolio['image']; ?>">
                     </td>
                     <td><?php echo $valuePortfolio['category_name']; ?></td>
                     <td><?php echo date('d/m/Y', strtotime($valuePortfolio['create_date'])); ?></td>
                     <td>
                        <?php //echo $valuePortfolio['portfolio_status']; 
                           if ($valuePortfolio['portfolio_status']=='yes') {
                        ?>
                        <label class="switch">
                           <input id="status_change_c<?php echo $valuePortfolio['id_portfolio']; ?>" type="checkbox" class="" onclick="status_change('status_change_c','<?php echo $valuePortfolio['id_portfolio']; ?>');" checked>
                           <span class="slider round"></span>
                        </label>
                        <?php 
                           }
                           if ($valuePortfolio['portfolio_status']=='no') {
                        ?>
                        <label class="switch">
                           <input id="status_change<?php echo $valuePortfolio['id_portfolio']; ?>" type="checkbox" class="" onclick="status_change('status_change','<?php echo $valuePortfolio['id_portfolio']; ?>');">
                           <span class="slider round"></span>
                        </label>
                        <?php } ?>
                     </td>
                     <td>
                        <button style="margin:2px" type="button" class="btn btn-warning btn-xs" onclick="read_portfolio('<?php echo $valuePortfolio['id_portfolio']; ?>');"  data-toggle="tooltip" data-placement="top" title="view"><i class="anticon anticon-eye"></i></button>
                         <a style="margin:2px" href="<?php echo base_url() ?>admin-portfolio-edit/<?php echo $valuePortfolio['id_portfolio']; ?>" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="edit"><i class="anticon anticon-edit"></i></a>
                        <a style="margin:2px" href="<?php echo base_url() ?>admin-portfolio-delete/<?php echo $valuePortfolio['id_portfolio']; ?>" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="delete"><i class="anticon anticon-delete"></i></a>
                     </td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>

            <div id="modal_read_portfolio" class="modal fade read_portfolio">
               <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title h4" id="m_news_title"> Portfolio</h5>
                        <button type="button" class="close" data-dismiss="modal">
                           <i class="anticon anticon-close"></i>
                        </button>
                     </div>
                     <div class="modal-body">
                        <h1 id="title" style="text-align:center;"></h1>
                        <img id="m_portfolio_image" style="width:100%;" src="">
                        <div class="row">
                           <div class="col-md-3">
                              <h2>Category</h2>
                           </div>
                           <div class="col-md-9">
                              <h2 id="category"></h2>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3">
                              <h2>Description</h2>
                           </div>
                           <div class="col-md-9">
                              <h4 id="description"></h4>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3">
                              <h2>Create Date</h2>
                           </div>
                           <div class="col-md-9">
                              <h2 id="create_date"></h2>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3">
                              <h2>Meta Description</h2>
                           </div>
                           <div class="col-md-9">
                              <h4 id="meta_description"></h4>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3">
                              <h2>Meta Keyword</h2>
                           </div>
                           <div class="col-md-9">
                              <h4 id="meta_keyword"></h4>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3">
                              <h2>Url Slug</h2>
                           </div>
                           <div class="col-md-9">
                              <h4 id="url_slug"></h4>
                           </div>
                        </div>
                        <!--
                        <table border="0">
                           <tr>
                              <td><h2>Category</h2></td>
                              <td>&nbsp;<h2>:</h2>&nbsp;&nbsp;&nbsp;</td>
                              <td><h2 id="category"></h2></td>
                           </tr>
                           <tr>
                              <td><h2>Description</h2></td>
                              <td>&nbsp;<h2>:</h2>&nbsp;&nbsp;&nbsp;</td>
                              <td><h4 id="description"></h4></td>
                           </tr>
                           <tr>
                              <td><h2>Create Date</h2></td>
                              <td>&nbsp;<h2>:</h2>&nbsp;&nbsp;&nbsp;</td>
                              <td><h2 id="create_date"></h2></td>
                           </tr>
                           <tr>
                              <td style="width: 270px;"><h2>Meta Description</h2></td>
                              <td>&nbsp;<h2>:</h2>&nbsp;&nbsp;&nbsp;</td>
                              <td><h4 id="meta_description"></h4></td>
                           </tr>
                           <tr>
                              <td><h2>Meta Keyword</h2></td>
                              <td>&nbsp;<h2>:</h2>&nbsp;&nbsp;&nbsp;</td>
                              <td><h4 id="meta_keyword"></h4></td>
                           </tr>
                           <tr>
                              <td><h2>Url Slug</h2></td>
                              <td>&nbsp;<h2>:</h2>&nbsp;&nbsp;&nbsp;</td>
                              <td><h4 id="url_slug"></h4></td>
                           </tr>
                        </table>
                        -->
                     </div>
                  </div>
               </div>
            </div>

         </div>

      </div>
   </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Content Wrapper END -->
<script type="text/javascript">
   var base_url = '<?php echo base_url(); ?>';
   function read_portfolio(id)
   {
      $.ajax({
         type    : 'POST',
         url     : base_url+'admin/portfolio_read',
         data    : {'id_portfolio': id},
         dataType: "json",
         success : function(result){
            document.getElementById('category').innerHTML=" : "+result.category_name;
            document.getElementById('meta_description').innerHTML=" : "+ result.meta_description;
            document.getElementById('meta_keyword').innerHTML=" : "+ result.meta_keyword;
            document.getElementById('title').innerHTML=" : "+ result.title;
            document.getElementById('description').innerHTML=" : "+result.description;
            document.getElementById('create_date').innerHTML=" : "+ result.create_date;
            document.getElementById('url_slug').innerHTML=" : "+ "<?php echo base_url(); ?>portfolio/"+result.url_slug;

            document.getElementById('m_portfolio_image').src= base_url+'upload_file/portfolio/'+result.image;
            $('#modal_read_portfolio').modal('show');
         }
      })
    }

   function status_change(id_input, id_portfolio)
   {
      if (document.getElementById(id_input+id_portfolio).checked) {
         var status_change='yes';
      }else {
         var status_change='no';
      }

      $.ajax({
         type    : 'POST',
         url     : base_url+'admin/portfolio_status',
         data    : {'id_portfolio': id_portfolio, 'portfolio_status': status_change},
         dataType: "json",
         success : function(result){
            if (result.notif=='true') {
               $("#notif_true").fadeIn(1500);
               $("#notif_true").fadeOut(1500);
                  //document.querySelector('#notif_true').classList.add('show');
            }else if(result.notif=='false') {
               $("#notif_false").fadeIn(1000);
               $("#notif_false").fadeOut(1000);
            }
         }
      })
   }
</script>

