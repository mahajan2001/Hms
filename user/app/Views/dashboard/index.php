<?php include(INCLUDESPATH . '/header.php'); ?>

<style>
    p {
        font-size: 20px;
        color: white;
    }

    .h3,
    h3 {
        font-size: 2.55rem;
    }

    .bg-info,
    .bg-info>a {
        color: #fff !important;
    }

    .bg-info {
        background-color: #17a2b8 !important;
    }

    .small-box {
        border-radius: .75rem;
        box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
        display: block;
        margin-top: 15px;
        position: relative;
    }

    .small-box>.inner {
        padding: 10px;
    }

    *,
    ::after,
    ::before {
        box-sizing: border-box;
    }

    .small-box .icon {
        color: rgba(0, 0, 0, .15);
        z-index: 0;
    }

    .small-box>.small-box-footer {
        background-color: rgba(0, 0, 0, .1);
        color: rgba(255, 255, 255, .8);
        display: block;
        padding: 3px 0;
        position: relative;
        text-align: center;
        text-decoration: none;
        z-index: 10;
    }

    .small-box1>.small-box1-footer {
        background-color: rgba(255, 0, 0, 0.1);
        /* Red background with 10% opacity */
        color: rgba(255, 255, 255, 0.8);
        /* White text with 80% opacity */
        display: block;
        padding: 3px 0;
        position: relative;
        text-align: center;
        text-decoration: none;
        z-index: 10;
    }

    .small-box .icon>i {
        font-size: 60px;
        position: absolute;
        right: 15px;
        top: 15px;
        transition: -webkit-transform .3s linear;
        transition: transform .3s linear;
        transition: transform .3s linear, -webkit-transform .3s linear;
    }

    /* Style for the input container */
    .input-container {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    /* Style for the <a> tag containing the icon */
    .input-container a {
        display: inline-block;
        padding: 5px;
        font-size: 18px;
        color: #333;
        /* Adjust the color as needed */
        text-decoration: none;
    }

    /* Style for the input field */
    .input-container input[type="text"] {
        flex-grow: 1;
        padding: 5px 10px;
        border: 1px solid #ccc;
        /* Add your desired border styles */
        border-radius: 5px;
        font-size: 16px;
        outline: none;
    }

    /* Add spacing between the icon and input field */
    .input-container a+input[type="text"] {
        margin-left: 10px;
    }

    /* Style for the input container */
    .input-container {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    /* Style for the <a> tag containing the icon */
    .input-container a {
        display: inline-block;
        padding: 5px;
        font-size: 18px;
        color: #333;
        /* Adjust the color as needed */
        text-decoration: none;
    }

    /* Style for the input field */
    .input-container input[type="text"] {
        flex-grow: 1;
        padding: 5px 10px;
        border: 1px solid #ccc;
        /* Add your desired border styles */
        border-radius: 5px;
        font-size: 16px;
        outline: none;
    }

    /* Add spacing between the icon and input field */
    .input-container a+input[type="text"] {
        margin-left: 10px;
    }
</style>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb float-right">
                                <li><a href="<?= DASHBOARD_PATH ?>">Dashboard &nbsp; </a></li>
                                / &nbsp;
                            </ol>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
            <?php /* <div class="row custom-stat-widget">
                <div class="col-lg-2">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="fa fa-industry  text-orange"></i>
                                <div class="stat-digit"><?php echo $officers ?></div>
                            </div>
                            <a class="text-blue" href="<?= OFFICER_PATH ?>">
                                <div class="stat-content dib">
                                    <div class="text-blue">Officers</div>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="fa fa-warehouse   text-orange"></i>
                                <div class="stat-digit"><?php echo $livingin ?></div>
                            </div>
                            <a href="<?= LIVINGIN_PATH ?>">
                                <div class="stat-content dib">
                                    <div class="text-blue">Living In Monthly Mess Count</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="fa fa-user  text-orange"></i>
                                <div class="stat-digit"><?php echo $livingout ?></div>
                            </div>
                            <a href="<?= LIVINGOUT_PATH ?>">
                                <div class="stat-content dib">
                                    <div class="text-blue">Living Out Monthly Mess Count</div>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div> */ ?>
            <div class="row">
                <div class="col-md-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>150</h3>
                            <p>Officers</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="<?= OFFICER_PATH ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>
                            <p>Guests</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <a href="<?= OFFICER_PATH ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>150</h3>
                            <p>Total Monthly Invoices</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <a href="<?= INVOICE_PATH ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>150</h3>
                            <p>Total Expense Bill</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-inr"></i>
                        </div>
                        <a href="<?= EXPENSE_PATH ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <br><br>


            <!-- table 1 -->
            <a> Monthly Invoice Status</a>


            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <!-- table -->
                            <table id="example1" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Invoice Raised</th>
                                        <th>Invoice Paid</th>
                                        <th>Invoice Due</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Amt</td>
                                        <td>1000</td>
                                        <td>8000</td>
                                        <td>2000</td>
                                    </tr>
                                    <tr>
                                        <td>qty</td>
                                        <td>1000</td>
                                        <td>8000</td>
                                        <td>2000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="input-container">
                                <a href="#"><i class="fas fa-home"></i></a>
                                <input type="text" placeholder="Living In">
                            </div>
                            <div class="input-container">
                                <a href="#"><i class="fas fa-sign-out-alt"></i></a>
                                <input type="text" placeholder="Living Out">
                            </div>
                            <div class="input-container">
                                <a href="#"><i class="fas fa-suitcase"></i></a>
                                <input type="text" placeholder="Temporary Duty">
                            </div>
                            <div class="input-container">
                                <a href="#"><i class="fas fa-users"></i></a>
                                <input type="text" placeholder="Guest">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- table 2 -->
            <a> Monthly Expense Status</a>
            <br> <br>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <!-- table -->
                            <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Bill Raised</th>
                                        <th>Bill Paid</th>
                                        <th>Bill Due</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Amt</td>
                                        <td>1000</td>
                                        <td>8000</td>
                                        <td>2000</td>
                                    </tr>
                                    <tr>
                                        <td>qty</td>
                                        <td>1000</td>
                                        <td>8000</td>
                                        <td>2000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="input-container">
                                <a href="#"><i class="fas fa-landmark"></i></a>
                                <input type="text" placeholder="Army">
                            </div>
                            <div class="input-container">
                                <a href="#"><i class="fas fa-plane"></i></a>
                                <input type="text" placeholder="Airforce">
                            </div>
                            <div class="input-container">
                                <a href="#"><i class="fas fa-anchor"></i></a>
                                <input type="text" placeholder="Navy">
                            </div>
                            <div class="input-container">
                                <a href="#"><i class="fas fa-ship"></i></a>
                                <input type="text" placeholder="Coast Guard">
                            </div>
                            <div class="input-container">
                                <a href="#"><i class="fas fa-user"></i></a>
                                <input type="text" placeholder="Civilian">
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <canvas id="inventoryStock"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <canvas id="modelWise"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <canvas id="overallSalesStock"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <canvas id="totalInvoice"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <canvas id="totalQuotation"></canvas>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <?php if (isset($success_message) && $success_message != '') {  ?>
                    <div class="alert alert-info alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong>
                        <?php echo isset($success_message) ? $success_message : $this->session->flashdata('invalid'); ?>
                    </div>
                <?php  } ?>
                <?php if (isset($error_message) && $error_message != '') {  ?>
                    <div class="alert alert-info alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error!</strong>
                        <?php echo isset($error_message) ? $error_message : $this->session->flashdata('invalid'); ?>
                    </div>
                <?php } ?>
            </div><!-- /# row -->
        </div>
    </div><!-- /# main content -->
</div><!-- /# container-fluid -->
</div><!-- /# main -->
</div><!-- /# content wrap -->

<?php include(INCLUDESPATH . "/footer.php") ?>

<script>

    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    function poolColors(a) {
        var pool = [];
        for (i = 0; i < a; i++) {
            pool.push(getRandomColor());
        }
        return pool;
    }
    
    const ctx2 = document.getElementById('inventoryStock');
    var data1 = {
        labels: ["Officers","Guests","Vendors"],
        datasets: [{
            label: 'Members',
            data: [65, 59, 80],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(153, 102, 255)',
              'rgb(201, 203, 207)'
            ],
            borderWidth: 1
          }]
        };
    var config = new Chart(ctx2, {
        type: 'bar',
        data: data1,
        options: {
            scales: {
              x: {
                stacked: true,
              },
              y: {
                stacked: true
              }
            },
            animation: {
              onComplete: () => {
                delayed = true;
              },
              delay: (context) => {
                let delay = 0;
                if (context.type === 'data' && context.mode === 'default' && !delayed) {
                  delay = context.dataIndex * 300 + context.datasetIndex * 100;
                }
                return delay;
              },
            },
        }
    });
    
    const ctx3 = document.getElementById('overallSalesStock');
    var data1 = {
        labels: ["Amit","Ajay", "Pavan","Sukrut"],
        datasets: [{
                label: ['Living In'],
                data: ["1","3","15","7"],
                borderWidth: 1,
                backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(255, 99, 132, 0.2)',
                ],
            },
            {
                label: ['Living Out'],
                data: ["2","4","9","4"],
                borderWidth: 1,
                backgroundColor: [
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                ],
            }
        ]
    };
    var config = new Chart(ctx3, {
        type: 'bar',
        data: data1,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
    const ctx1 = document.getElementById('modelWise');
    var data1 = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May","Jun", "Jul","Aug","Sept","Oct","Nov","Dec"],
        datasets: [{
                label: "Income",
                data: [1,2,3,11,3,67,90,5,34,21,6,12],
                backgroundColor: 'transparent',
                borderColor: '#28A745',
                pointBorderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                fill: false,
                tension: 0.1
            },{
                 label: "Expense",
                data: [4,6,7,9,56,98,67,34,12,17,9,90],
                backgroundColor: 'transparent',
                borderColor: '#DC3545',
                pointBorderColor: '#DC3545',
                pointBackgroundColor: '#DC3545',
                fill: false,
                tension: 0.1
            }]
    };
    var config = new Chart(ctx1, {
        type: 'line',
        data: data1,
        options: {
            animations: {
                tension: {
                    duration: 4000,
                    easing: 'linear',
                    from: 1,
                    to: 0,
                    loop: true
                }
            },

            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },

            }
        },

    });
    
    const ctx6 = document.getElementById('totalInvoice');
    const data = {
        labels: ["Army","Ground","Navy","Air Force"],
        datasets: [{
            label: 'Count',
            data: [11,67,9,12],
            backgroundColor: poolColors(4),
            hoverOffset: 4
        }]
    };
    var config = new Chart(ctx6, {
        type: 'pie',
        data: data,
        options: {
            segmentShowStroke: true,
            segmentStrokeColor: "#fff",
            segmentStrokeWidth: 2,
            percentageInnerCutout: 50,
            animationSteps: 150,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: true,
            responsive: true,
            maintainAspectRatio: true,
            showScale: true,
            animateScale: true
        }
    });
    
     const ctx5 = document.getElementById('totalQuotation');
     const data9 = {
        labels: ["B.Sc","B.E","B.Tech","BCA"],
        datasets: [{
            label: 'Count',
            data: [56,98,78,70],
            backgroundColor: poolColors(5),
            hoverOffset: 4
        }]
    };
    var config = new Chart(ctx5, {
        type: 'doughnut',
        data: data9,
        options: {
            segmentShowStroke: true,
            segmentStrokeColor: "#fff",
            segmentStrokeWidth: 2,
            percentageInnerCutout: 50,
            animationSteps: 150,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: true,
            responsive: true,
            maintainAspectRatio: true,
            showScale: true,
            animateScale: true
        }
    });
</script>


<?php include(INCLUDESPATH . "/close.php"); ?>