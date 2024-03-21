    <!-- page css -->
    <link href="<?php echo base_url(); ?>assets/backend/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/backend/css/news.css">


                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title"></h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>News</a>
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
                                <?php } ?>
                            <?php } ?>
                            <!--============end notifikasi==========================-->
                        <div class="card-body">
                            <h4>News list</h4>
                            <p></p>
                            <a href="<?php echo base_url(); ?>admin-news-form" class="btn btn-default m-r-5" style="float:right"><i class="anticon anticon-plus"></i> Add news</a><br>
                            <div class="m-t-25"  style="overflow-x: scroll;">
                                <table id="data-table" class="table table-hover table-stripe">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>News Title</th>
                                            <th>Category</th>
                                            <th>Created Date</th>
                                            <th>Updated Date</th>
                                            <th>Publish Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no =0;
                                            foreach ($read_news as $key => $valueNews) {
                                                $no++;
                                         ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $valueNews['news_title']; ?></td>
                                            <td><?php echo $valueNews['news_category_name']; ?></td>
                                            <td><?php echo date('d/m/Y', strtotime($valueNews['create_date'])); ?></td>
                                            <td>
                                                <?php
                                                    if (empty($valueNews['updated_date'] )) {
                                                        echo "-";
                                                    }else{
                                                        echo date('d/m/Y', strtotime($valueNews['updated_date'])); 
                                                    }
                                                ?>    
                                             </td>
                                            <td>
                                                <?php //echo $valueNews['news_status']; 
                                                    if ($valueNews['news_status']=='yes') {
                                                ?>
                                                    <label class="switch">
                                                      <input id="status_change_c<?php echo $valueNews['id_news']; ?>" type="checkbox" class="" onclick="status_change('status_change_c','<?php echo $valueNews['id_news']; ?>');" checked>
                                                      <span class="slider round"></span>
                                                    </label>
                                                <?php 
                                                    }if ($valueNews['news_status']=='no') {
                                                 ?>
                                                    <label class="switch">
                                                      <input id="status_change<?php echo $valueNews['id_news']; ?>" type="checkbox" class="" onclick="status_change('status_change','<?php echo $valueNews['id_news']; ?>');">
                                                      <span class="slider round"></span>
                                                    </label>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button style="margin:2px" type="button" class="btn btn-warning btn-xs" onclick="read_news('<?php echo $valueNews['id_news']; ?>');"  data-toggle="tooltip" data-placement="top" title="view"><i class="anticon anticon-eye"></i></button>

                                                <a style="margin:2px" href="<?php echo base_url() ?>admin-news-edit/<?php echo $valueNews['id_news']; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="edit"><i class="anticon anticon-edit"></i></a>

                                                <a style="margin:2px" href="<?php echo base_url() ?>admin-news-delete/<?php echo $valueNews['id_news']; ?>" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="delete"><i class="anticon anticon-delete"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                               
                                <div id="modal_read_news" class="modal fade read_news">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title h4" id="m_news_title"></h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <i class="anticon anticon-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="m_news_image" style="width:100%;" src="">
                                                <p id="m_news_text"></p>
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
                    function read_news(id)
                    {
                        $.ajax({
                           type    : 'POST',
                           url     : base_url+'admin/news_read',
                           data    : {'id_news': id},
                           dataType: "json",
                           success : function(result){
                              document.getElementById('m_news_title').innerHTML=result.news_title;
                              document.getElementById('m_news_image').src= base_url+'upload_file/news/'+result.news_folder+'/image_news.png';
                              document.getElementById('m_news_text').innerHTML=result.news_text;
                              $('#modal_read_news').modal('show');
                           }
                        })
                    }

                    function status_change(id_input, id_news)
                    {
                        if (document.getElementById(id_input+id_news).checked) {
                            var status_change='yes';
                        }else {
                            var status_change='no';
                        }
        
                        $.ajax({
                            type    : 'POST',
                            url     : base_url+'admin/news_status',
                            data    : {'id_news': id_news, 'news_status': status_change},
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

                                   