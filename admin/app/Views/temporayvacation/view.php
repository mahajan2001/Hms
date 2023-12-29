<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>view Student</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right float-right">
                                <li><a href="<?= USER_PATH ?>">Officers &nbsp; </a></li>
                                / &nbsp;
                                <li><a>view student</a></li>
                                <!--	<li class="active">Data Table</li>-->
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-content">

                <!-- Write Content here -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card alert">

                            <div class="bootstrap-data-table-panel">
                                <a href="<?= TEMPORAYVACATION_PATH ?>"
                                    class="btn btn-outline-danger float-end">BACK</a>
                                <br><br>
                                <div id="myDiv">
                                    <!DOCTYPE html>
                                    <html lang="en">

                                    <head>
                                        <meta charset="UTF-8" />
                                        <title>Military Hostel Accommodation Application</title>

                                    </head>

                                    <body>

                                        <img src="Hms\public\assets\images\DIAT.jpeg" alt="Military Hostel Logo"
                                            style="float: right" />
                                        <p colspan="4" style="">
                                        <h3 style="color: #c0c0c0; text-align: center ;"> DEFENCE INSTITUTE OF ADVANCED
                                            TECHNOLOGY(DU), PUNE - 411025</h3>
                                        </p>
                                        <h1 style="text-align: center;  text-decoration: underline;">
                                            TEMPORARY VACATION</h1>

                                        <p style="text-align: center"><strong>
                                                All correspondences onlytohme@diat.ac.in</strong>
                                        </p>
                                        <h3 style="text-align: center">
                                            (To be submitted to Hostel Office at the time of <b
                                                style="text-decoration: underline;">TEMPORARY VACATION</b> of Hostel)
                                        </h3>
                                        <hr>
                                        <table>
                                        <style>
                                            table {
                                                border-collapse: collapse;
                                                width: 80%;
                                                margin: 20px auto;
                                            }

                                            th,
                                            td {
                                                border: 1px solid black;
                                                padding: 8px;
                                                text-align: left;
                                            }

                                            .header-section {
                                                background-color: #c0c0c0;
                                                text-align: left;
                                            }

                                            .header-section1 img {

                                                /* display: block; */
                                                /* margin-left: auto;
                                                 margin-right: auto; */
                                                /* margin-left: 40px; */
                                                width: 100px;
                                                height: 100px;
                                            }

                                            .headline {
                                                font-size: 20px;
                                                font-weight: bold;
                                            }
                                        </style>
                                        
                                            <thead class="header-section1">

                                            </thead>
                                            <tbody>
                                                <!-- Section 2 -->
                                                <tr class="section2">
                                                    <td class=""><strong>Full Name of Student </strong> </td>
                                                    <td style="border-right: hidden"><?php $tempView['name'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                </tr>
                                                <!-- Section 2 -->
                                                <tr class="section2">
                                                    <td class=""> <strong>Registration No.</strong></td>
                                                    <td style="border-right: hidden"> <?= $tempView['registration_no'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                </tr>
                                                <!-- Section 2 -->
                                                <tr class="section2">
                                                    <td class=""> <strong>Course M.Tech/PhD/JSF/SRF/RA/PA</strong></td>
                                                    <td style="border-right: hidden"><?= $tempView['course_type'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                </tr>
                                                <!-- Section 2 -->
                                                <tr class="section2">
                                                    <td class=""> <strong>Department</strong></td>
                                                    <td style="border-right: hidden"><?= $tempView['department'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                </tr>
                                                <!-- Section 2 -->
                                                <tr class="section2">
                                                    <td class=""> <strong>Date of Joining Hostel</strong>
                                                    </td>
                                                    <td style="border-right: hidden"><?= $tempView['joining_date'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                </tr>

                                                <tr class="section2">
                                                    <td class=""> <strong> Room No.</strong>
                                                    </td>
                                                    <td style="border-right: hidden"><?= $tempView['room_no'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                </tr>


                                                <!-- Section 2 -->
                                                <tr class="section2">
                                                    <td class=""> <strong>Date of Temporary Vacation of Hostel</strong>
                                                    </td>
                                                    <td style="border-right: hidden"><?= $tempView['temporary_vacation_date'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                </tr>
                                                <!-- Section 2 -->
                                                <tr class="section2">
                                                    <td class=""> <strong>Mobile No.</strong></td>
                                                    <td style="border-right: hidden"><?= $tempView['mobile_no'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                </tr>
                                                <!-- Section 2 -->
                                                <tr class="section2">
                                                    <td class=""> <strong>SECURITY DEPOSIT , Amount, Rs.(A)</strong>
                                                    </td>
                                                    <td style="border-right: hidden"><?= $tempView['deposit'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                </tr>
                                                <!-- Section 2 -->
                                                <tr class="section2">
                                                    <td class=""> <strong>MESS BALANCE (IF ANY) &nbsp; &nbsp; &nbsp;
                                                            &nbsp; &nbsp; &nbsp; &nbsp; (B)</strong> <br>
                                                        <p>(Information filled by the HMC staff)</p>
                                                    </td>
                                                    <td style="border-right: hidden"><?= $tempView['mess_balance'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                </tr>
                                                <tr class="header-section">
                                                    <td class=""> <strong>TOTAL BALANCE (C)</strong></td>
                                                    <td style="border-right: hidden">Rs.<?= $tempView['total_balance'] ?>          </td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <h3 style="text-align: center">
                                            DECLARATION BY THE HOSTEL RESIDENCY [Tick any one or more of hte following]
                                        </h3>
                                        <p style="text-align: center">
                                            <b>1.</b> In View of the above ,I request HMC to Stop Biling temporarily.
                                        </p>
                                        <br>
                                        <br>
                                        
                                        <p style="text-align: center"><b>Student
                                                Signature_________________________________________
                                                Date:________________________________</b>
                                        </p>

                                        <br>
                                        <br>

                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6" style="text-align: left;">
                                                <strong>
                                                    Name & Signature with Date
                                                    (Hostel Manager)
                                                </strong>
                                            </div>
                                            <div class="col-md-6" style="text-align: right;"> <strong>
                                                    Name & Signature with Date
                                                    Hostel Warden (Boys/Girls)
                                                </strong>
                                            </div>
                                        </div>
                                        <br>
                                    </body>

                                    </html>

                                </div>
                            </div>

                            <div class="form-group">
                                <button onclick="printDiv('myDiv')"
                                    class="btn btn-outline-danger float-right">Print</button>
                            </div>

                            <script>

                                function printDiv(divId) {
                                    var printContent = document.getElementById(divId);
                                    var originalContent = document.body.innerHTML;

                                    document.body.innerHTML = printContent.innerHTML;

                                    window.print();

                                    document.body.innerHTML = originalContent;
                                }
                            </script>
                            </table>
                        </div><!-- /# card -->
                    </div><!-- /# column -->
                </div><!-- /# row -->
            </div><!-- /# main content -->
        </div><!-- /# container-fluid -->
    </div><!-- /# main -->
</div><!-- /# content wrap -->

<script>

</script>
<?php include(INCLUDESPATH . '/footer.php'); ?>