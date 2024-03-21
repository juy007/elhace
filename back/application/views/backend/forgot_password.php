<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Elhace - Administrator</title>

    <!-- Favicon -->
     <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/frontend/img/favicon.ico">

    <!-- page css -->

    <!-- Core css -->
    <link href="<?php echo base_url(); ?>assets/backend/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('<?php echo base_url(); ?>assets/backend/images/others/login-3.pngd')">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                        <img style="margin-left: auto;margin-right: auto;" class="img-fluid" alt="" src="<?php echo base_url(); ?>assets/frontend/img/main_logo.png?l=<?php echo date('s'); ?>">
                                        <h2 class="m-b-0"></h2>
                                    </div>
                                    <form method="POST" action="<?php echo base_url(); ?>admin/validation_forgot">
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="userName">E-mail:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-mail"></i>
                                                <input type="email" class="form-control" id="userName" name="email" value="<?php echo $this->session->flashdata('email'); ?>" placeholder="E-mail" required>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <a class="btn btn-default" href="<?php echo base_url(); ?>"> <i class="anticon anticon-left-circle"></i> Back</a>
                                                <button type="submit" style="background: #000;color: #FFF;" class="btn btn-default">Next <i class="anticon anticon-right-circle"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!--============notifikasi==========================-->
                            <?php if($this->session->flashdata('notif')){?>
                                <?php if($this->session->flashdata('notif') == 'false'){?>
                                            <div class="alert alert-danger"> <i class="fa fa-times-circle"></i> <?php echo $this->session->flashdata('teks_notif'); ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        </div>
                                <?php } ?>
                            <?php } ?>
                            <!--============end notifikasi==========================-->
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex p-h-40 justify-content-between">
                    <span class="">© <?php echo date('Y'); ?> <?php echo $web->footer; ?></span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                        </li>
                        <li class="list-inline-item">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="<?php echo base_url(); ?>assets/backend/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="<?php echo base_url(); ?>assets/backend/js/app.min.js"></script>

</body>

</html>