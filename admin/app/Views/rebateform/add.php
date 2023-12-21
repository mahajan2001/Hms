<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        width: 10%;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Add Temporary Vacation</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right float-right">
                                <li><a href="<?= USER_PATH ?>">Add Temporary Vacation &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Add Temporary Vacation</a></li>
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
                                <!-- //<a href="<?= USER_PATH ?>" class="btn btn-outline-danger float-end">BACK</a> -->
                                <br><br>
                                <?php if ($controller->session->getFlashdata('error') != null) { ?>
                                    <div class="col-md-12">
                                        <div id="error_msg" class="alert alert-danger alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Error!</strong>
                                            <?= $controller->session->getFlashData('error'); ?>
                                        </div>
                                    </div>
                                    <?php
                                } ?>
                                <h2 style="text-align: center; text-decoration: underline;">
                                    <b> DEFENCE INSTITUTE OF ADVANCE TECHNOLOGY</b>
                                </h2>

                                <h2 style="text-align: center; text-decoration: underline;">
                                    <b>HOSTEL MANAGEMENT COMMITTEE</b>
                                </h2>

                                <br>

                                <h3 style="text-align: center; text-decoration: underline;"></b> MESS REBATE FORM </b>
                                </h3>

                                <br>
                                <p style="margin-left:20px">
                                    1. Rebate will be pxcancelled/considered null and void completely if found availing
                                    mess dining in facility during claimed dates by HMC authorities, further enquiry
                                    will not be entertained. <br>
                                    2. Stamp and signature of HOD/Supervisor/co-ordinator is mandatory on form. <br>
                                    3. Students should apply and submit rebate form at least two days in advance. <br>
                                    4.Mess rebate claim will be considered for minimum 3 days. <br>
                                    5. Mess rebate claims will be considered under academic reasons (Attending seminar,
                                    workshop, conference, internship etc.) Leave sanctioned by department (Casual etc.)
                                    and on medical ground. <br>
                                    6. Attachphotocopy of leave application/internship letter etc.(if applicable). <br>
                                    7. Arrivinglate/departing early beyond the claimed dates without informing HMC
                                    office, Rebate will not be considered. <br>
                                    8.Backdated Rebate will not be considered. <br>
                                    9.I have read all the above conditions. <br>

                                    I Agree <input type="checkbox" id="myCheckbox" name="myCheckbox"
                                        value="checkboxValue">

                                <p style="text-align: right;">
                                    Signature of Student
                                </p>

                                </p>

                                <br>
                                <br>

                                <h3 style="margin-left:10px">APPLICANT DETAILS</h3>
                                <table>
                                    <thead>
                                        <tr>
                                            <!-- <th>Column 1</th>
                                            <th>Column 2</th>
                                            <th>Column 3</th>
                                            <th>Column 4</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Rows -->
                                        <tr>
                                            <td>Name of the Student</td>
                                            <td colspan="3">
                                                <span id="name_error_message" style="color:red"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Enrollment Number</td>
                                            <td colspan="3">
                                                <span id="enrollment_number_error_message" style="color:red"></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Course Name</td>
                                            <td colspan="3">
                                                <span id="course_type_error_message" style="color:red"></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Room Number</td>
                                            <td colspan="3">
                                                <span id="room_no_error_message" style="color:red"></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Mobile Number</td>
                                            <td colspan="3">
                                                <span id="mobile_no_error_message" style="color:red"></span>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                <br>
                               
                                <h3>Requested Rebate Period :</h3>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Starting Date</th>
                                            <th>Ending Date</th>
                                            <th>No of Days</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td><input type="date" placeholder="Enter your text"></td>
                                        <td><input type="date" placeholder="Enter your text"></td>
                                        <td><input type="text" placeholder="Enter no of days"></td>
                                    </tr>
                                </table>
                                <br>
                                <div class="col-md-5">
                                <div class="form-group">
                                        <label>REASON FOR SEEKING REBATE</label>
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="customFile">Select Document</label>
                                        </div>
                                        <span id="image_error_message" style="color:red"></span>
                                    </div>   
                                    </div>
                                <br><br>
                            </div>
                            <br>
                            <div class="form-group">
                                <button id="submitButton" onclick="return adddata()"
                                    class="btn btn-outline-primary float-right">SAVE</button>
                            </div>

                            </table>
                        </div><!-- /# card -->
                    </div><!-- /# column -->
                </div><!-- /# row -->
            </div><!-- /# main content -->
        </div><!-- /# container-fluid -->
    </div><!-- /# main -->
</div><!-- /# content wrap -->

<?php include(INCLUDESPATH . '/footer.php'); ?>