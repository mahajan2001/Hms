<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Edit Student</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right float-right">
                                <li><a href="<?= USER_PATH ?>">Officers &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Edit student</a></li>
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
                                <a href="<?= USER_PATH ?>" class="btn btn-outline-danger float-end">BACK</a>
                                <br><br>
                                <div id="myDiv">
                                    <!DOCTYPE html>
                                    <html lang="en">

                                    <head>
                                        <meta charset="UTF-8" />
                                        <title>Military Hostel Accommodation Application</title>
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
                                                display: block;
                                                margin-left: auto;
                                                margin-right: auto;
                                                width: 150px;
                                                height: 130px;
                                            }

                                            .headline {
                                                font-size: 24px;
                                                font-weight: bold;
                                            }
                                        </style>
                                    </head>

                                    <body>
                                        <table>
                                            <thead class="header-section1">
                                                <?php

                                                $html = '';

                                                // foreach ($studentView as $row) { 
                                                ?>

                                                <tr>
                                                    <td colspan="4">
                                                        <br />
                                                        <img src="/public/assets/images/download.jpeg" alt="Military Hostel Logo" style="float: left" />
                                                        <p colspan="4" style="text-align: right">
                                                            <strong> DEFENCE INSTITUTE OF ADVANCED TECHNOLOGY,</strong>
                                                        </p>
                                                        <p style="text-align: right">
                                                            DEEMED UNIVERSITY, PUNE - 411025,<br />
                                                            Autonomous Organization of Department of Defence R & D, <br />
                                                            Ministry of Defence, Govt. of India
                                                        </p>
                                                        <p>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </p>
                                                        <h2 style="text-align: center">
                                                            Application for Accommodation in ______ Hostel
                                                        </h2>
                                                        <p style="text-align: center">
                                                            (Fill the details in <b>BLOCK LETTERS</b> only)
                                                        </p>
                                                    </td>
                                                    <td style="color: red; text-align: bottom; width: 6%">Roll No.</td>
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
                                                    <td> </td>
                                                </tr>

                                                <tr class="header-section">
                                                    <td colspan="4" class="headline" style="border-right: hidden">
                                                        SECTION 1 : PERSONAL DETAILS OF APPLICANT
                                                    </td>
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
                                            </thead>
                                            <tbody>
                                                <!-- Section 2 -->
                                                <tr class="section2">
                                                    <td class="header-section">Full Name</td>
                                                    <td style="border-right: hidden"><?= $studentView['name'] ?></td>
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
                                                    <td class="header-section">Date of Birth</td>
                                                    <td style="border-right: hidden"><?= $studentView['dob'] ?></td>
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
                                                    <td class="header-section">Gender (please Tick)</td>
                                                    <td style="border-right: hidden"><?= $studentView['gender'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                    <td class="header-section" style="border-right: hidden">
                                                        Blood Group
                                                    </td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section"></td>
                                                    <td style="border-right: hidden"><?= $studentView['blood_group'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                </tr>

                                                <tr class="section1">
                                                    <td class="header-section" rowspan="2">Address of Correspondance</td>
                                                    <td style="border-right: hidden"><?= $studentView['address'] ?></td>
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

                                                <tr class="section1">
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                    <td class="header-section" style="border-right: hidden">
                                                        Postal Code
                                                    </td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section"></td>
                                                    <td style="border-right: hidden"><?= $studentView['postal_code'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>

                                                    <td></td>
                                                </tr>

                                                <tr class="section1">
                                                    <td class="header-section" rowspan="2">Permanent Address</td>
                                                    <td style="border-right: hidden"><?= $studentView['permanent_address'] ?></td>
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
                                                <tr class="section1">
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>

                                                    <td class="header-section" style="border-right: hidden">
                                                        Postal Code
                                                    </td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section"></td>
                                                    <td style="border-right: hidden"><?= $studentView['postal_code'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>

                                                    <td></td>
                                                </tr>

                                                <!-- Section 3 -->
                                                <tr class="section1">
                                                    <td class="header-section">Mobile No. </td>
                                                    <td style="border-right: hidden"> <?= $studentView['mobile_no'] ?> </td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                    <td class="header-section" style="border-right: hidden; ">Parent Contact No</td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section"></td>
                                                    <td style="border-right: hidden"><?= $studentView['parent_mobile'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <!-- <td  style="border-right: hidden;"></td> -->

                                                    <td></td>
                                                </tr>
                                                <tr class="section3">
                                                    <td class="header-section">Landline No. (with STD Code)</td>
                                                    <td style="border-right: hidden"><?= $studentView['landline'] ?></td>
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
                                                <!-- Section 3 -->
                                                <tr class="section3">
                                                    <td class="header-section">E mail id (Gmail)</td>
                                                    <td style="border-right: hidden"><?= $studentView['gmail'] ?></td>
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
                                                <!-- Section 3 -->
                                                <tr class="section3">
                                                    <td class="header-section">Driving License No.</td>
                                                    <td style="border-right: hidden"><?= $studentView['dl_no'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                    <td class="header-section" style="border-right: hidden">
                                                        PAN Details
                                                    </td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section"></td>
                                                    <td style="border-right: hidden"><?= $studentView['pd_no'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                </tr>

                                                <!-- Section 3 -->
                                                <tr class="section3">
                                                    <td class="header-section">AADHAR No.</td>
                                                    <td style="border-right: hidden"><?= $studentView['aadhar_no'] ?></td>
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
                                                    <!-- <td style="border-right: hidden"></td> -->
                                                    <!-- <td></td> -->
                                                </tr>

                                                <tr class="header-section">
                                                    <td colspan="4" class="headline" style="border-right: hidden">
                                                        SECTION 2 : ACADEMIC PROGRAME / COURSE DETAILS
                                                    </td>
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
                                                    <td class="header-section">Organization/Lab/Esttb Name</td>
                                                    <td style="border-right: hidden"><?= $studentView['diat_dep_name'] ?></td>
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
                                                    <td class="header-section">Course Applied For</td>
                                                    <td style="border-right: hidden"><?= $studentView['course_type'] ?></td>
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

                                                <!-- Section 3 -->
                                                <tr class="section3">
                                                    <td class="header-section">Name of the Course</td>
                                                    <td style="border-right: hidden"><?= $studentView['course_name'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                    <td class="header-section" style="border-right: hidden">
                                                        Academic Year
                                                    </td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section"></td>
                                                    <td style="border-right: hidden"><?= $studentView['academic_year'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                </tr>

                                                <!-- Section 3 -->
                                                <tr class="section3">
                                                    <td class="header-section">DIAT Department Name</td>
                                                    <td style="border-right: hidden"><?= $studentView['diat_dep_name'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                    <td class="header-section" style="border-right: hidden">
                                                        DIAT Reg No.
                                                    </td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section" style="border-right: hidden"></td>
                                                    <td class="header-section"></td>
                                                    <td style="border-right: hidden"><?= $studentView['reg_no'] ?></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                </tr>

                                                <tr class="header-section">
                                                    <td colspan="4" class="headline" style="border-right: hidden">
                                                        SECTION 3 : DECLARATION BY HOSTEL RESIDENCY
                                                    </td>
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

                                                <tr>
                                                    <td class="notes" colspan="12" style="border-right: hidden">
                                                        <p>
                                                            1. I have read, understood and agree to all the Rules & Regulations for Hostel Residents available on DIAT Website. I have submitted the mandatory Undertaking Form for Hostel Residents Hostel 2. I am aware that, Twin sharing Accommodation will be provided in the Hostel on first come, first serve basis. 0/5² PA/RA/ Intan T.A Academic Year I/II Non-mandatory 1st time. 3. I am aware that, One time Refundable Security deposit should be paid at the time of Admission to Hostels and Mess Advance per semester as approved by competent authority is Payable in first half of July and January every year. 4. I am aware that, Accommodation Charges (Fixed) are applicable from Hostel Admission to Permanent vacation by Hostel residents. Temporary vacation of Hostel is NOT ALLOWED. 5 I am aware that, Mess balance (if any) and Security deposit will be refunded as per Rules & Regulations of Hostel Residents one month after Final clearance from DIAT(DU) or One month after Permanent vacation of Hostel by Hostel residents. 6 I am aware that, Hostel Fee Defaulters will be terminated from Hostels without any notice, Monthly stipend will be stopped from the following month. No Hostel admission will be given later on.
                                                        </p>
                                                    </td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td style="border-right: hidden"></td>
                                                    <td></td>
                                                </tr>

                                            </tbody>
                                        </table>
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