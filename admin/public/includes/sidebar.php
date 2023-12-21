<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures bg-dark">
    <div class="nano">
        <div class="nano-content bg-dark">
            <ul class="bg-dark">
                <li class="active"><a href="<?= DASHBOARD_PATH ?>"><i class="fa-solid fa-home"></i> Dashboard </a></li>
                <li><a class="sidebar-sub-toggle"><i class="fa fa-gear"></i>Users <span
                            class="sidebar-collapse-icon fa-solid fa-chevron-down"></span></a>
                    <ul>
                        <!-- <li><a href="<?= OFFICER_PATH ?>"><i class="fa fa-user"></i>Officers<span></span></a></li> -->
                        <!-- <li><a href="<?= OFFICER_PATH ?>/fetchGuests"><i class="fa fa-user"></i>Guests<span></span></a> -->
                        <!-- <li><a href="<?= VENDOR_PATH ?>"><i class="fa fa-user"></i>Vendor<span></span></a></li> -->
                        <!-- <li><a href="<?= USER_PATH ?>"><i class="fa fa-user"></i>USER<span></span></a></li>
                        <li><a href="<?= TEMPORAYVACATION_PATH ?>"><i class="fa fa-user"></i>Temporay Vacation</a></li>
                        <li><a href="<?= PERMANENTVACATION_PATH ?>"><i class="fa fa-user"></i>Permanent Vacation</a></li>
                        <li><a href="<?= ROOM_PATH ?>"><i class="fa fa-user"></i>Room</a></li>
                        <li><a href="<?= GUESTAPPLICATION_PATH ?>"><i class="fa fa-user"></i>Guest Application</a></li>
                        <li><a href="<?= REBATEFORM_PATH ?>"><i class="fa fa-user"></i>Rebate Form</a></li> -->

                    </ul>
                </li>
                
                <?php /* 
                <li><a class="sidebar-sub-toggle"><i class="fa fa-gear"></i>Logs <span
                            class="sidebar-collapse-icon fa-solid fa-chevron-down"></span></a>
                    <ul>
                        <li><a href="<?= LOGS_PATH ?>/Adminlogs"><i class="fa fa-user"></i>Admin Logs<span></span></a>
                        </li>
                        <li><a href="<?= LOGS_PATH ?>/Userlogs"><i class="fa fa-user"></i>Officers Logs<span></span></a>
                        </li>
                    </ul>
                </li>
                */ ?>
                <!-- <li><a class="sidebar-sub-toggle"><i class="fa-solid fa-money-bill-wave"></i>Monthly Bill <br> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <small> (Mess/Institute) </small><span
                        class="sidebar-collapse-icon fa-solid fa-chevron-down"></span></a>
                    <ul>
                        <li><a href="<?= LIVINGIN_PATH ?>"><i class="fa fa-user"></i>Living in<span></span></a></li>
                        <li><a href="<?= LIVINGOUT_PATH ?>"><i class="fa fa-user"></i>Living out<span></span></a></li>
                        <li><a href="<?= TEMPORARYDUTY_PATH ?>"><i class="fa fa-user"></i>Temporary Duty<span></span></a></li>
                        <li><a href="<?= GUESTBILL_PATH ?>"><i class="fa fa-user"></i>Guest<span></span></a></li>
                    </ul>
                </li> -->
                <!-- <li><a href="<?= INVOICE_PATH ?>"><i class="fas fa-file-invoice-dollar"></i> Monthly Bill Invoices </a></li>
                <li><a href="<?= COURSEWISEMONTHLYBLL_PATH ?>"><i class="fa fa-cogs"></i>Course Wise Monthly Mess Bill</a></li>
                <li><a href="<?= EXPENSE_PATH ?>"><i class="fa fa-inr"></i>Expense</a></li>
                <li><a href="<?= MASTER_PATH ?>"><i class="fa fa-cogs"></i>Master Settings</a></li> -->
                <!-- <li><a href="<?= USER_PATH ?>"><i class=""></i>Registration Form</a></li>
                <li><a href="<?= TEMPORAYVACATION_PATH ?>"><i class=""></i>Temporay vacation</a></li> -->

                      <li><a href="<?= USER_PATH ?>"><i class="fa fa-user"></i>USER<span></span></a></li>
                        <li><a href="<?= TEMPORAYVACATION_PATH ?>"><i class="fa fa-user"></i>Temporay Vacation</a></li>
                        <li><a href="<?= PERMANENTVACATION_PATH ?>"><i class="fa fa-user"></i>Permanent Vacation</a></li>
                        <li><a href="<?= ROOM_PATH ?>"><i class="fa fa-user"></i>Room</a></li>
                        <li><a href="<?= GUESTAPPLICATION_PATH ?>"><i class="fa fa-user"></i>Guest Application</a></li>
                        <li><a href="<?= REBATEFORM_PATH ?>"><i class="fa fa-user"></i>Rebate Form</a></li>
            </ul>
        </div>
    </div>
</div><!-- /# sidebar -->
<div class="header">
    <div class="pull-left p-r-50">
        <?php /* <div class="logo"><span><?= strtoupper($this->settings->project_name) ?></span></a></div>*/?>
        <div class="hamburger sidebar-toggle">
            <span class="line "></span>
            <span class="line "></span>
            <span class="line ">  </span>
        </div>
    </div>
    
    <img src="<?= FETCH_IMAGE ?>/<?= ($controller->fetchProjectDetails())['project_logo'] ?>" width="50px">
    
    <span style="margin-left: 5%;font-size: 15px; color: white;"><?= ($controller->fetchProjectDetails())['project_name'] ?></span>
    <span class="" style="margin-left: 40%; color: white;"><i class="fa fa-map-marker fa-lg" style="margin-right: 5px;"></i><?= ($controller->fetchProjectDetails())['address'] ?></span>

    <div class="pull-right p-r-15">
   
        <ul>
            <li class="header-icon dib">
                <span class="user-avatar" style="color: white;">
                    <?php
                    $checkLoginReturn = $controller->checkLogin();
                    if ($checkLoginReturn == "-1") {
                        echo "<script>window.location.href='" . LOGIN_PATH . "'</script>";
                    } else {
                        echo $checkLoginReturn;
                    }
                    ?>
                    <span class="fa-solid fa-chevron-down"></span>
                </span>
                <div class="drop-down dropdown-profile">
                    <div class="dropdown-content-body">
                        <ul>

                            <li><a href="<?= ADMIN_PATH ?>"><i class="fa fa-user"></i>
                                    <span>Profile</span></a>
                            </li>
                            <li><a href="<?= ADMIN_PATH ?>/changepassword"><i class="fa fa-user"></i> <span>Change
                                        Password</span></a></li>
                            <li>
                                <a href="<?= LOGIN_PATH ?>/logout">
                                    <i class="fa fa-power-off"></i> <span>Logout</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>