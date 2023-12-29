<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Add Guest Details</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right float-right">
                                <li><a href="<?= GUESTAPPLICATION_PATH ?>">Add Guest Details &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Add Guest Details </a></li>
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
                                <h1>SECTION 1: PERSONAL DETAILS OF Guest</h1>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Full Name</label>
                                            <input id="name" class="form-control required" type="text" name="name" placeholder="Enter student Name">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Total guest</label>
                                            <input id="total_guest" class="form-control required" type="text" name="total_guest" placeholder="Enter the guest">
                                            <span id="guest_error_message" style="color:red"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Student ID</label>
                                            <input id="student_id" class="form-control required" type="text" name="student_id" placeholder="Enter the Student">
                                            <span id="studentid_error_message" style="color:red"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!-- <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Guest 1 Name</label>
                                            <input id="guest_name" class="form-control required" type="text" name="guest_name" placeholder="Enter the Guest Name">
                                            <span id="guest_name_error_message" style="color:red"></span>
                                        </div> -->
                                    </div>
                                </div>

                            </div>
                            <br><br>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Guest 1 Name</label>
                                        <input id="guest_name" class="form-control required" type="text" name="guest_name" placeholder="Enter the Guest Name">
                                        <span id="guest_name_error_message" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Relationship of Guest</label>
                                        <input id="relationship" class="form-control required" type="text" name="relationship" placeholder="Enter Relationship of Guest">
                                        <span id="relationship_error_message" style="color:red"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Mobile Number</label>
                                        <input id="mobile_no" onkeypress="return isNumberKey(event)" class="form-control required" type="text" name="mobile_no" placeholder="Enter Mobile Number">
                                        <span id="mobile_no_error" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Email ID</label>
                                        <input id="email" class="form-control required" type="text" name="email" placeholder="Enter Email">
                                        <span id="Email_error_message" style="color:red"></span>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Aadhar Number</label>
                                        <input id="aadhar_no" class="form-control required" onkeypress="return isNumberKey(event)" type="text" name="aadhar_no" placeholder="Enter Aadhar Number">
                                        <span id="aadhar_no_error" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Gender</label>
                                        <select id="gender" class="form-control required" name="gender" placeholder="Select the Gender">
                                            <option value=""></option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                            <option value="T">Transgender</option>
                                        </select>
                                        <span id="gender_error_message" style="color:red"></span>
                                    </div>
                                </div>


                            </div>
                            <div class="row">

                               

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Blood Group</label>
                                        <select id="blood_group" class="form-control required" name="blood_group" placeholder="Select the Blood Group">
                                            <option value=""></option>
                                            <option value="A+">A positive</option>
                                            <option value="A+">A negative</option>
                                            <option value="B+">B positive</option>
                                            <option value="B+">B negative</option>
                                            <option value="AB+">AB positive</option>
                                            <option value="AB+">AB negative</option>
                                            <option value="O+">O positive</option>
                                            <option value="O+">O negative</option>

                                        </select>
                                        <span id="blood_group_error_message" style="color:red"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Gmail</label>
                                        <input id="gmail" class="form-control required" type="text" name="gmail" placeholder="Enter Gmail">
                                        <span id="gmail_error_message" style="color:red"></span>
                                    </div> -->
                                </div>

                            </div>

                            <br> <br>
                            <hr>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Guest 2 Name</label>
                                        <input id="guest_name" class="form-control required" type="text" name="guest_name" placeholder="Enter the Guest Name">
                                        <span id="guest_name_error_message" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Relationship of Guest</label>
                                        <input id="relationship" class="form-control required" type="text" name="relationship" placeholder="Enter Relationship of Guest">
                                        <span id="relationship_error_message" style="color:red"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Mobile Number</label>
                                        <input id="mobile_no" onkeypress="return isNumberKey(event)" class="form-control required" type="text" name="mobile_no" placeholder="Enter Mobile Number">
                                        <span id="mobile_no_error" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Email ID</label>
                                        <input id="email" class="form-control required" type="text" name="email" placeholder="Enter Email">
                                        <span id="Email_error_message" style="color:red"></span>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Aadhar Number</label>
                                        <input id="aadhar_no" class="form-control required" onkeypress="return isNumberKey(event)" type="text" name="aadhar_no" placeholder="Enter Aadhar Number">
                                        <span id="aadhar_no_error" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Gender</label>
                                        <select id="gender" class="form-control required" name="gender" placeholder="Select the Gender">
                                            <option value=""></option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                            <option value="T">Transgender</option>
                                        </select>
                                        <span id="gender_error_message" style="color:red"></span>
                                    </div>
                                </div>


                            </div>
                            <div class="row">

                               

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Blood Group</label>
                                        <select id="blood_group" class="form-control required" name="blood_group" placeholder="Select the Blood Group">
                                            <option value=""></option>
                                            <option value="A+">A positive</option>
                                            <option value="A+">A negative</option>
                                            <option value="B+">B positive</option>
                                            <option value="B+">B negative</option>
                                            <option value="AB+">AB positive</option>
                                            <option value="AB+">AB negative</option>
                                            <option value="O+">O positive</option>
                                            <option value="O+">O negative</option>

                                        </select>
                                        <span id="blood_group_error_message" style="color:red"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Gmail</label>
                                        <input id="gmail" class="form-control required" type="text" name="gmail" placeholder="Enter Gmail">
                                        <span id="gmail_error_message" style="color:red"></span>
                                    </div> -->
                                </div>

                            </div>

                            <br> <br>
                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Guest 3 Name</label>
                                        <input id="guest_name" class="form-control required" type="text" name="guest_name" placeholder="Enter the Guest Name">
                                        <span id="guest_name_error_message" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Relationship of Guest</label>
                                        <input id="relationship" class="form-control required" type="text" name="relationship" placeholder="Enter Relationship of Guest">
                                        <span id="relationship_error_message" style="color:red"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Mobile Number</label>
                                        <input id="mobile_no" onkeypress="return isNumberKey(event)" class="form-control required" type="text" name="mobile_no" placeholder="Enter Mobile Number">
                                        <span id="mobile_no_error" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Email ID</label>
                                        <input id="email" class="form-control required" type="text" name="email" placeholder="Enter Email">
                                        <span id="Email_error_message" style="color:red"></span>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Aadhar Number</label>
                                        <input id="aadhar_no" class="form-control required" onkeypress="return isNumberKey(event)" type="text" name="aadhar_no" placeholder="Enter Aadhar Number">
                                        <span id="aadhar_no_error" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Gender</label>
                                        <select id="gender" class="form-control required" name="gender" placeholder="Select the Gender">
                                            <option value=""></option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                            <option value="T">Transgender</option>
                                        </select>
                                        <span id="gender_error_message" style="color:red"></span>
                                    </div>
                                </div>


                            </div>
                            <div class="row">

                               

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Blood Group</label>
                                        <select id="blood_group" class="form-control required" name="blood_group" placeholder="Select the Blood Group">
                                            <option value=""></option>
                                            <option value="A+">A positive</option>
                                            <option value="A+">A negative</option>
                                            <option value="B+">B positive</option>
                                            <option value="B+">B negative</option>
                                            <option value="AB+">AB positive</option>
                                            <option value="AB+">AB negative</option>
                                            <option value="O+">O positive</option>
                                            <option value="O+">O negative</option>

                                        </select>
                                        <span id="blood_group_error_message" style="color:red"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Gmail</label>
                                        <input id="gmail" class="form-control required" type="text" name="gmail" placeholder="Enter Gmail">
                                        <span id="gmail_error_message" style="color:red"></span>
                                    </div> -->
                                </div>





                            </div>

                            <br> <br>
                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Guest 4 Name</label>
                                        <input id="guest_name" class="form-control required" type="text" name="guest_name" placeholder="Enter the Guest Name">
                                        <span id="guest_name_error_message" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Relationship of Guest</label>
                                        <input id="relationship" class="form-control required" type="text" name="relationship" placeholder="Enter Relationship of Guest">
                                        <span id="relationship_error_message" style="color:red"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Mobile Number</label>
                                        <input id="mobile_no" onkeypress="return isNumberKey(event)" class="form-control required" type="text" name="mobile_no" placeholder="Enter Mobile Number">
                                        <span id="mobile_no_error" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Email ID</label>
                                        <input id="email" class="form-control required" type="text" name="email" placeholder="Enter Email">
                                        <span id="Email_error_message" style="color:red"></span>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Aadhar Number</label>
                                        <input id="aadhar_no" class="form-control required" onkeypress="return isNumberKey(event)" type="text" name="aadhar_no" placeholder="Enter Aadhar Number">
                                        <span id="aadhar_no_error" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Gender</label>
                                        <select id="gender" class="form-control required" name="gender" placeholder="Select the Gender">
                                            <option value=""></option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                            <option value="T">Transgender</option>
                                        </select>
                                        <span id="gender_error_message" style="color:red"></span>
                                    </div>
                                </div>


                            </div>
                            <div class="row">

                               

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Blood Group</label>
                                        <select id="blood_group" class="form-control required" name="blood_group" placeholder="Select the Blood Group">
                                            <option value=""></option>
                                            <option value="A+">A positive</option>
                                            <option value="A+">A negative</option>
                                            <option value="B+">B positive</option>
                                            <option value="B+">B negative</option>
                                            <option value="AB+">AB positive</option>
                                            <option value="AB+">AB negative</option>
                                            <option value="O+">O positive</option>
                                            <option value="O+">O negative</option>

                                        </select>
                                        <span id="blood_group_error_message" style="color:red"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- <div class="form-group">
                                        <small class="req text-danger">* </small>
                                        <label>Gmail</label>
                                        <input id="gmail" class="form-control required" type="text" name="gmail" placeholder="Enter Gmail">
                                        <span id="gmail_error_message" style="color:red"></span>
                                    </div> -->
                                </div>

                            </div>

                            <br> <br>
                            <hr>


                            <h1>SECTION 2: ACADEMIC PROGRAMME/COURSE DETAILS</h1>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="req text-danger">* </small>
                                    <label>Organization/lab/Esttb Name</label>
                                    <input id="ole_name" class="form-control required" type="text" name="ole_name" placeholder="Enter Organization/lab/Esttb Name ">
                                    <span id="ole_name_error_message" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="req text-danger">* </small>
                                    <label>Course Applied For</label>
                                    <select id="course_type" class="form-control required" name="course_type" placeholder="Select Course Applied For">
                                        <option value=""></option>
                                        <option value="M.Tech">M.Tech</option>
                                        <option value="M.Sc">M.Sc</option>
                                        <option value="PhD">PhD</option>
                                        <option value="JRF">JRF</option>
                                        <option value="SRF">SRF</option>
                                        <option value="PA</">PA</option>
                                        <option value="RA</">RA</option>
                                        <option value="Intern">Intern</option>
                                        <option value="TA</">TA</option>
                                    </select>
                                    <span id="blood_group_error_message" style="color:red"></span>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="req text-danger">* </small>
                                    <label>Name of Course</label>
                                    <input id="course_name" class="form-control required" type="text" name="course_name" placeholder="Enter Name of Course ">
                                    <span id="course_name_error_message" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="req text-danger">* </small>
                                    <label>Academic Year</label>
                                    <input id="academic_year" class="form-control required" type="text" name="academic_year" placeholder="Enter Academic Year">
                                    <span id="academic_year_error_message" style="color:red"></span>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <small class="req text-danger">* </small>
                                    <label>DIAT Department Name</label>
                                    <input id="diat_dep_name" class="form-control required" type="text" name="diat_dep_name" placeholder="Enter DIAT Department Name ">
                                    <span id="diat_dep_name_error_message" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>DIAT Reg.No</label>
                                    <input id="reg_no" class="form-control required" type="text" name="reg_no" placeholder="Enter DIAT Reg.No">
                                    <span id="v_error_message" style="color:red"></span>
                                </div>
                            </div>
                        </div>

                        <br> <br>
                            <hr>

                        <h1>SECTION 3: DECLARATION BY HOSTEL RESIDENT </h1>
                        <br>
                        <p>
                            <input type="checkbox" id="hostelRulesCheckbox1">
                            <label for="hostelRulesCheckbox">
                                I am aware of Food and Accommodation changes as published by DIAT(DU) applicable for Guests
                            </label>
                        </p>
                        <p>
                            <input type="checkbox" id="hostelRulesCheckbox2">
                            <label for="hostelRulesCheckbox">
                                I am aware that, Payment of Hostel Charges is Only through ONLINE PAYMENT to PMMC Account against receipt by Hostel Staff.Cash transactions are strictly Prohibited.Claims with regard to cash Payment will not be entertained.Transaction Receipts shpold be sent to hms@diat.ac.in
                            </label>
                        </p>
                        <p>
                            <input type="checkbox" id="hostelRulesCheckbox3">
                            <label for="hostelRulesCheckbox">
                                I have verified, taken over the inventory in the room alloted as per the list and submitted the duly signed inventory from along with this application. I am aware that, for any loss, damage or deficieny of the inventory in my room and hostel premises, I will be imposed Charges as decided by HMS at the time of permanent vacation of Hostels.
                            </label>
                        </p>

                        <p>
                            <input type="checkbox" id="hostelRulesCheckbox4">
                            <label for="hostelRulesCheckbox">
                                I am aware that, my accommodation in the hostel is subject to availability for a maximum duration of 1 week. </label>
                        </p>
                        <div class="form-group">
                            <button id="submitButton" onclick="return adddata()" class="btn btn-outline-primary float-right">SAVE</button>
                        </div>

                        </div>



                        

                    </div>


                    </table>
                </div><!-- /# card -->
            </div><!-- /# column -->
        </div><!-- /# row -->
    </div><!-- /# main content -->
</div><!-- /# container-fluid -->
</div><!-- /# main -->
</div><!-- /# content wrap -->
<script>
    function adddata() {
        var name = $("#name").val();
        var total_guest = $("#total_guest").val();
        var student_id = $("#student_id").val();
        var guest_name = $("#guest_name").val();
        var relationship = $("#relationship").val();
        var mobile_no = $("#mobile_no").val();
        var email = $("#email").val();
        var aadhar_no = $("#aadhar_no").val();
        var blood_group = $("#blood_group").val();
        var aadhar_no1 = $("#aadhar_no1").val();
        var gender1 = $("#gender1").val();
        var blood_group1 = $("#blood_group1").val();
        var guest_name1 = $("#guest_name1").val();
        var relationship1 = $("#relationship1").val();

        var aadhar_no2 = $("#aadhar_no2").val();
        var gender2 = $("#gender2").val();
        var blood_group2 = $("#blood_group2").val();
        var guest_name2 = $("#guest_name2").val();
        var relationship2 = $("#relationship2").val();

        var aadhar_no3 = $("#aadhar_no3").val();
        var gender3 = $("#gender3").val();
        var blood_group3 = $("#blood_group3").val();
        var guest_name3 = $("#guest_name3").val();
        var relationship3 = $("#relationship3").val();

        $.ajax({
            url: " <?= USER_PATH ?>/addstudentdata",
            type: "POST",
            datatype: "json",
            crossDomain: true,
            data: JSON.stringify({
                "name": name,
                "total_guest": total_guest,
                "student_id": student_id,
                "guest_name": guest_name,
                "relationship": relationship,
                "permanent_address": permanent_address,
                "postal_code": postal_code,
                "mobile_no": mobile_no,
                "aadhar_no": aadhar_no,
                "blood_group": blood_group,
                "gmail": gmail,
                "dl_no": dl_no,
                "pd_no": pd_no,
                "aadhar_no": aadhar_no,
                // "image" : image,
                // "signature" : signature,
                "ole_name": ole_name,
                "course_name": course_name,
                "course_type": course_type,
                "academic_year": academic_year,
                "diat_dep_name": diat_dep_name,
                "reg_no": reg_no,
            }),
            success: function(data) {
                if (data.success == true) {
                    window.location.href = "<?= USER_PATH ?>"
                } else {
                    window.location.reload();
                }
            },
            error: function(data) {}
        })
    }
</script>



<?php include(INCLUDESPATH . '/footer.php'); ?>
