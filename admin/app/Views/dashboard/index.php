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
                            <h1> Hostel Dashboard</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb float-right">
                                <li><a href="<?= DASHBOARD_PATH ?>"> Hostel Dashboard &nbsp; </a></li>
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
       </div> */?>
            <div class="row">
                <div class="col-md-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $Ghostel[0]['total_beds'] ?> / <?php echo $Ghostel[0]['total_available_beds'] ?></h3>
                            <p>Ganga Available Beds</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bed"></i>
                        </div>
                        <a href="<?= HOSTEL_PATH ?>/index/1" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                            
                            <h3> <?php echo $Khostel[0]['total_beds'] ?> /  <?php echo $Khostel[0]['total_available_beds'] ?></h3>
                            <p>Krishna Available Beds</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-bed"></i>
                        </div>
                        <a href="<?= HOSTEL_PATH ?>/index/2" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            
                            <h3> <?php echo $Yhostel[0]['total_beds'] ?> /  <?php echo $Yhostel[0]['total_available_beds'] ?></h3>
                            <p>Yamuna Available Beds</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bed"></i>
                        </div>
                        <a href="<?= HOSTEL_PATH ?>/index/3" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            
                            <h3> <?php echo $Gohostel[0]['total_beds'] ?> /  <?php echo $Gohostel[0]['total_available_beds'] ?></h3>
                            <p>Godavari Available Beds</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bed"></i>
                        </div>
                        <a href="<?= HOSTEL_PATH ?>/index/4" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
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
                <?php if (isset($success_message) && $success_message != '') { ?>
                    <div class="alert alert-info alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong>
                        <?php echo isset($success_message) ? $success_message : $this->session->flashdata('invalid'); ?>
                    </div>
                <?php } ?>
                <?php if (isset($error_message) && $error_message != '') { ?>
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



<?php include(INCLUDESPATH . "/close.php"); ?>