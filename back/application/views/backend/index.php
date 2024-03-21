
                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                                            <i class="anticon anticon-file-text"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <h2 class="m-b-0"><?php echo count($news); ?></h2>
                                            <p class="m-b-0 text-muted">News</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                            <i class="anticon anticon-picture"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <h2 class="m-b-0"><?php echo count($portfolio); ?></h2>
                                            <p class="m-b-0 text-muted">Portfolio</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-icon avatar-lg avatar-gold">
                                            <i class="anticon anticon-eye"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <h2 class="m-b-0"><?php echo count($news_view)+count($portfolio_view); ?></h2>
                                            <p class="m-b-0 text-muted">Today content</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-icon avatar-lg avatar-purple">
                                            <i class="anticon anticon-user"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <h2 class="m-b-0"><?php echo count($visitor); ?></h2>
                                            <p class="m-b-0 text-muted">Today visitor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4>Traffic <?php echo date("Y"); ?></h4>
                                        <div>
                                            <div class="btn-group">
                                                <!--
                                                <button class="btn btn-default active">
                                                    <span>Month</span>
                                                </button>
                                                <button class="btn btn-default">
                                                    <span>Year</span>
                                                </button>
                                                -->
                                            </div>
                                        </div>
                                    </div>
                                     <script src="<?php echo base_url(); ?>assets/backend/vendors/chartjs/Chart.min.js"></script>
                                    <div class="m-t-20" style="height: 330px">
                                        <canvas class="chart" height="90" id="traffic_chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
                <!-- Content Wrapper END -->
                <?php 
                    $visitor_1 = $this->M_admin->visitor_month(date('Y').'-01-01', date('Y-m-t', strtotime(date('Y').'-01-01')));
                    $visitor_2 = $this->M_admin->visitor_month(date('Y').'-02-01', date('Y-m-t', strtotime(date('Y').'-02-01')));
                    $visitor_3 = $this->M_admin->visitor_month(date('Y').'-03-01', date('Y-m-t', strtotime(date('Y').'-03-01')));
                    $visitor_4 = $this->M_admin->visitor_month(date('Y').'-04-01', date('Y-m-t', strtotime(date('Y').'-04-01')));
                    $visitor_5 = $this->M_admin->visitor_month(date('Y').'-05-01', date('Y-m-t', strtotime(date('Y').'-05-01')));
                    $visitor_6 = $this->M_admin->visitor_month(date('Y').'-06-01', date('Y-m-t', strtotime(date('Y').'-06-01')));
                    $visitor_7 = $this->M_admin->visitor_month(date('Y').'-07-01', date('Y-m-t', strtotime(date('Y').'-07-01')));
                    $visitor_8 = $this->M_admin->visitor_month(date('Y').'-08-01', date('Y-m-t', strtotime(date('Y').'-08-01')));
                    $visitor_9 = $this->M_admin->visitor_month(date('Y').'-09-01', date('Y-m-t', strtotime(date('Y').'-09-01')));
                    $visitor_10 = $this->M_admin->visitor_month(date('Y').'-10-01', date('Y-m-t', strtotime(date('Y').'-10-01')));
                    $visitor_11 = $this->M_admin->visitor_month(date('Y').'-11-01', date('Y-m-t', strtotime(date('Y').'-11-01')));
                    $visitor_12 = $this->M_admin->visitor_month(date('Y').'-12-01', date('Y-m-t', strtotime(date('Y').'-12-01')));
                 ?>
               <script>
                var visitor1 = '<?php echo count($visitor_1); ?>'; var visitor2 = '<?php echo count($visitor_2); ?>'; var visitor3 = '<?php echo count($visitor_3); ?>'; var visitor4 = '<?php echo count($visitor_4); ?>'; var visitor5 = '<?php echo count($visitor_5); ?>'; var visitor6 = '<?php echo count($visitor_6); ?>'; var visitor7 = '<?php echo count($visitor_7); ?>'; var visitor8 = '<?php echo count($visitor_8); ?>'; var visitor9 = '<?php echo count($visitor_9); ?>'; var visitor10 = '<?php echo count($visitor_10); ?>'; var visitor11 = '<?php echo count($visitor_11); ?>'; var visitor12 = '<?php echo count($visitor_12) ?>';

                var ctx = document.getElementById("traffic_chart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September","October","November", "December"],
                        datasets: [{
                            label: 'Visitors',
                            data: [visitor1, visitor2, visitor3, visitor4, visitor5, visitor6, visitor7,visitor8,visitor9, visitor10, visitor11, visitor12],
                            backgroundColor: '#E2EDFE'
                            /*
                            [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                            ]*/
                            ,
                            borderColor: '#3F87F5'
                            /*[
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                            ]*/,
                            borderWidth: 3
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            </script>