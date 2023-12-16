<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Course wise Monthly Mess Bill</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb float-right">
                                <li><a href="<?= DASHBOARD_PATH ?>">Dashboard &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Course Wise Monthly Mess Bill</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
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

                <!-- Write Content here -->
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header">
                                <?php if($defaultMonth == '') { ?>
                                    <h4>MESS BILL SUMMARY FOR ALL MONTHS</h4>
                                <?php } else { ?>
                                    <h4>MESS BILL SUMMARY FOR <?php echo $defaultMonth; ?></h4>
                                <?php } ?>
                                <div class="col-md-3 float-right">
                                    <div class="form-group">
                                        <select name="month" id="month" class="form-control required">
                                            <option value="">Select Month</option>
                                            <option value="JANUARY">JANUARY</option>
                                            <option value="FEBRUARY">FEBRUARY</option>
                                            <option value="MARCH">MARCH</option>
                                            <option value="APRIL">APRIL</option>
                                            <option value="MAY">MAY</option>
                                            <option value="JUNE">JUNE</option>
                                            <option value="JULY">JULY</option>
                                            <option value="AUGUST">AUGUST</option>
                                            <option value="SEPTEMBER">SEPTEMBER</option>
                                            <option value="OCTOBER">OCTOBER</option>
                                            <option value="NOVEMBER">NOVEMBER</option>
                                            <option value="DECEMBER">DECEMBER</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <span id="error_msg" style="color:red"></span>
                                <table id="customReport" class="table table-striped table-bordered table-responsive nowrap"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>COURSE</th>
                                            <!--<th>BILL OF MONTH</th>-->
                                            <th>SUBSCRIPTION</th>
                                            <th>MAINTAINANCE</th>
                                            <th>SERVICE</th>
                                            <th>DAILY MESSING</th>
                                            <th>EXTRA MESSING</th>
                                            <th>PARTY MESSING</th>
                                            <th>GARDEN</th>
                                            <th>SARANG</th>
                                            <th>SOCIAL WELLBEING</th>
                                            <th>REFUND</th>
                                            <th>QM PACKING</th>
                                            <th>SPORT</th>
                                            <th>OFFICER CLUB</th>
                                            <th>LADIES CLUB</th>
                                            <th>TEA CLUB</th>
                                            <th>SRF</th>
                                            <th>ENTERTAINMENT</th>
                                            <th>LIBRARY</th>
                                            <th>HOSPITALITY</th>
                                            <th>MOMENTO</th>
                                            <th>BAR</th>
                                            <th>PARTY BAR</th>
                                            <th>ROOM BARRIER</th>
                                            <th>LINEN</th>
                                            <th>CLEANING GEAR</th>
                                            <th>ROOM RENT</th>
                                            <th>BREAKAGE</th>
                                            <th>EMP. CONGENCY</th>
                                            <th>SECURITY DEPOSIT</th>
                                            <th>PENALTY</th>
                                            <th>ARREARS</th>
                                            <th>MISC</th>
                                            <th>CREDIT-DEBIT(+/-)</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($monthlymessdetails)) {
                                            $html = '';
                                            $i = 0;
                                            foreach ($monthlymessdetails as $row) { ?>
                                                <tr>
                                                    <?php if ($i == (sizeof($monthlymessdetails) - 1)) { ?>
                                                        <td>
                                                            Total
                                                        </td>
                                                    <?php } else { ?>
                                                        <td>
                                                            <?= $row['course'] ?>
                                                        </td>
                                                    <?php } ?>
                                                    <?php /* if ($i == (sizeof($monthlymessdetails) - 1)) { ?>
                                                        <td>
                                                            NA
                                                        </td>
                                                    <?php } else { ?>
                                                        <td>
                                                            <?= $row['bill_of_month'] ?>
                                                        </td>
                                                    <?php } */ ?>
                                                    <td>
                                                        <?= $row['total_mess_subscription'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_mess_maintainance'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_mess_service'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_daily_messing'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_extra_messing'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_party_messsing'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_garden'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_sarang'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_social_wellbeing'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_refund'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_qm_packing'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_sports'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_officers_institute'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_ladies_club'] ?>
                                                    </td>
                                                    <td>
                                                        0
                                                    </td>
                                                    <td>
                                                        <?= $row['total_srf_fund'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_entert_ainment'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_library'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_hospitality_fund'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_memento'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_bar'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_party_bar'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_room_bearer'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_linen'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_cleaning_gear'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_room_rent'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_breakage'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_emp_contingency'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_security_deposit'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_penalty'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_arrears'] ?>
                                                    </td>
                                                    <td>
                                                        0
                                                    </td>
                                                    <td>
                                                        <?= $row['total_credit_debit'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total_total'] ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- card -->
                    </div>
                </div><!-- /# card container -->
                <!-- /# column -->
            </div><!-- /# main content -->
        </div><!-- /# container-fluid -->
    </div><!-- /# main -->
</div><!-- /# content wrap -->

<?php include(INCLUDESPATH . '/footer.php'); ?>
<script type="text/javascript">
    $('#month').on('change', function () {
        var month = $(this).val();
        if (month == '') {
            window.location.href = "<?php echo COURSEWISEMONTHLYBLL_PATH; ?>";
        } else {
            window.location.href = "<?php echo COURSEWISEMONTHLYBLL_PATH; ?>" + "/index/" + month;
        }
    });

    $(document).ready(function () {
        var billofmonth = document.getElementById("month");
        billofmonth.value = "<?php echo $defaultMonth; ?>";
        document.querySelector('title').textContent = "<?php echo $title; ?>";
    });
</script>