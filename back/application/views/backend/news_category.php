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
                                <a href="#" class="breadcrumb-item active"> News Category</a>
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
                        <div class="card-body col-lg-8">
                            <h4>News Category</h4>
                            <p></p>
                            <button href="" class="btn btn-default m-r-5" style="float:right" data-toggle="modal" data-target="#formAddCategory"><i class="anticon anticon-plus"></i> Add Category</button><br>

                            <div class="modal fade" id="formAddCategory">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Form Category</h5>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <i class="anticon anticon-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="m-t-25" style="max-width: 700px">
                                                <form id="form-category" action="<?php echo base_url() ?>admin/save_news_category" method="POST">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Category</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="category" name="category" autofocus placeholder="category" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                             <div class="modal fade" id="formEditCategory">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Form Category</h5>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <i class="anticon anticon-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="m-t-25" style="max-width: 700px">
                                                <form id="form-category" action="<?php echo base_url() ?>admin/save_news_category_update" method="POST">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Category</label>
                                                        <div class="col-sm-9">
                                                             <input type="hidden" class="form-control" id="id_news_category" name="id_news_category"required>
                                                            <input type="text" class="form-control" id="category_edit" name="category" autofocus placeholder="category" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-25">
                                <table id="data-table" class="table table-hover table-stripe">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no =0;
                                            foreach ($category as $key => $valueCategory) {
                                                $no++;
                                         ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $valueCategory['news_category_name']; ?></td>
                                            
                                            <td>
                                                <button style="margin:2px" href="#" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="edit" onclick="edit_category('<?php echo $valueCategory['id_news_category']; ?>');"><i class="anticon anticon-edit"></i></button>

                                                <a style="margin:2px" href="<?php echo base_url() ?>admin/news_category_delete/<?php echo $valueCategory['id_news_category']; ?>" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="delete"><i class="anticon anticon-delete"></i></a>
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
                    function edit_category(id)
                    {
                        $.ajax({
                           type    : 'POST',
                           url     : base_url+'admin/edit_news_category',
                           data    : {'id_news_category': id},
                           dataType: "json",
                           success : function(result){
                              document.getElementById('id_news_category').value=id;
                              document.getElementById('category_edit').value= result.news_category_name;
                              $('#formEditCategory').modal('show');
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
                <script type="text/javascript">
                    function submitform()
                    {
                        document.getElementById('form-category').submit();
                    }
                </script>

                                   