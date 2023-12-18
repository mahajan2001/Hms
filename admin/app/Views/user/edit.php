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
                                <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Full Name:</label>
                                            <input id="name" class="form-control required" type="text" name="name"
                                                placeholder="Enter student Name" value="<?php echo $students['name']; ?>">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Date of Birth:</label>
                                            <input id="dob" class="form-control required" type="date" name="dob"
                                                placeholder="Select the Birth Date"  value="<?php echo $students['dob']; ?>">
                                            <span id="dob_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Gender:</label>
                                            <select id="gender" class="form-control required" name="gender"
                                                placeholder="Select the Gender"  value="<?php echo $students['gender']; ?>">
                                                <option value=""></option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                                <option value="T">Transgender</option>
                                            </select>
                                            <span id="gender_error_message" style="color:red"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Blood Group:</label>
                                            <select id="blood_group" class="form-control required" name="blood_group"
                                                placeholder="Select the Blood Group" value="<?php echo $students['blood_group']; ?>">
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
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Address for Correspondence:</label>
                                            <input id="address" class="form-control required" type="text" name="address"
                                                placeholder="Enter address" value="<?php echo $students['address']; ?>">
                                            <span id="address_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Permanent Address</label>
                                            <input id="permanent_address" class="form-control required" type="text" name="permanent_address"
                                                placeholder="Enter Permanent Address" value="<?php echo $students['permanent_address']; ?>">
                                            <span id="permanent_address_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Postal Code</label>
                                            <input id="postal_code" class="form-control required" onkeypress="return isNumberKey(event)" type="text"
                                                name="postal_code" placeholder="Enter Postal Code" value="<?php echo $students['postal_code']; ?>">
                                            <span id="postal_code_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Mobile No.</label>
                                            <input id="mobile_no" onkeypress="return isNumberKey(event)" class="form-control required" type="text"
                                                name="mobile_no" placeholder="Enter Mobile No"  value="<?php echo $students['mobile_no']; ?>">
                                            <span id="mobile_no_error" style="color:red"></span>
                                        </div>
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <small class="req text-danger">* </small>
                                                <label>Parent Contact No</label>
                                                <input id="parent_mobile" class="form-control required" type="text"
                                                    name="parent_mobile" placeholder="Enter Parent Contact No" value="<?php echo $students['parent_mobile']; ?>">
                                                <span id="parent_mobile_code_error_message" style="color:red"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Landline No.(with STD Code)</label>
                                                <input id="landline" class="form-control required" type="text"
                                                    name="landline" placeholder="Enter Landline No" value="<?php echo $students['landline']; ?>">
                                                <span id="landline_code_error_message" style="color:red"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Gmail</label>
                                            <input id="gmail" class="form-control required" type="text" name="gmail"
                                                placeholder="Enter Gmail" value="<?php echo $students['gmail']; ?>">
                                            <span id="gmail_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Driving License No</label>
                                            <input id="dl_no" class="form-control required" type="text" name="dl_no"
                                                placeholder="Enter Driving License No" value="<?php echo $students['dl_no']; ?>">
                                            <span id="dl_no_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>PAN Details</label>
                                            <input id="pd_no" class="form-control required" onkeypress="return validatePan(event)" type="text" name="pd_no"
                                                placeholder="Enter PAN Details" value="<?php echo $students['pd_no']; ?>">
                                            <span id="pd_no_error" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>AAdhar No</label>
                                            <input id="aadhar_no" class="form-control required"  onkeypress="return isNumberKey(event)" type="text"
                                                name="aadhar_no" placeholder="Enter AAdhar No"  value="<?php echo $students['aadhar_no']; ?>">
                                            <span id="aadhar_no_error" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Image: </label>
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="customFile">Select Image</label>
                                        </div>
                                        <span id="image_error_message" style="color:red"></span>
                                    </div>
                                    </div>  
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select signature: </label>
                                        <div class="custom-file">
                                            <input name="signature" type="file" class="custom-file-input" id="signature" >
                                            <label class="custom-file-label" for="customFile">Select signature</label>
                                        </div>
                                        <span id="signature_error_message" style="color:red"></span>
                                    </div>
                                    </div>  
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Organization/lab/Esttb Name</label>
                                            <input id="ole_name" class="form-control required" type="text"
                                                name="ole_name" placeholder="Enter Organization/lab/Esttb Name "  value="<?php echo $students['ole_name']; ?>">
                                            <span id="ole_name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Course Applied For</label>
                                            <select id="course_type" class="form-control required" name="course_type"
                                                placeholder="Select Course Applied For" value="<?php echo $students['course_type']; ?>">
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
                                            <input id="course_name" class="form-control required" type="text"
                                                name="course_name" placeholder="Enter Name of Course " >
                                            <span id="course_name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Academic Year</label>
                                            <input id="academic_year" class="form-control required" type="text"
                                                name="academic_year" placeholder="Enter Academic Year"  value="<?php echo $students['academic_year']; ?>">
                                            <span id="academic_year_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>DIAT Department Name</label>
                                            <input id="diat_dep_name" class="form-control required" type="text"
                                                name="diat_dep_name" placeholder="Enter DIAT Department Name "  value="<?php echo $students['diat_dep_name']; ?>">
                                            <span id="diat_dep_name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>DIAT Reg.No</label>
                                            <input id="reg_no" class="form-control required" type="text" name="reg_no"
                                                placeholder="Enter DIAT Reg.No" value="<?php echo $students['reg_no']; ?>">
                                            <span id="v_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                            <div class="form-group">
                                <button onclick="return edit()"
                                    class="btn btn-outline-primary float-right">Update</button>
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

   

    // $('#course').on('change', function () {
    //     var id = $(this).val();
    //     var html1 = '<option value="0">Select Sub Course</option><option value="Army">Army</option><option value="Air Force">Air Force</option><option value="Non Tech branch">Non Tech branch</option>';
    //     var html2 = '<option value="0">Select Sub Course</option><option value="Air Force">Air Force</option><option value="Ground Duty Tech">Ground Duty Tech</option><option value="Navel Cadet">Navel Cadet</option>';
    //     if (id == 'B.Sc(Computer)') {
    //         $('#sub_course').html();
    //         $('#sub_course_div').css('display', 'block');
    //         $('#sub_course').html(html1);
    //     } else if (id == 'B.Tech') {
    //         $('#sub_course').html();
    //         $('#sub_course_div').css('display', 'block');
    //         $('#sub_course').html(html2);
    //     } else {
    //         var html3 = '<option value="0">Select Sub Course</option>';
    //         $('#sub_course').html(html3);
    //         $('#sub_course_div').css('display', 'none');
    //     }
    // });

    // $(".toggle-password").click(function () {

    //     $(this).toggleClass("fa-eye fa-eye-slash");
    //     var input = $($(this).attr("toggle"));
    //     if (input.attr("type") == "password") {
    //         input.attr("type", "text");
    //     } else {
    //         input.attr("type", "password");
    //     }
    // });

    function edit() {
        var id = <?php echo $students['id']; ?>;
        var name = $("#name").val();
        var dob = $("#dob").val();
        var gender = $("#gender").val();
        var blood_group = $("#blood_group").val();
        var address = $("#address").val();
        var permanent_address = $("#permanent_address").val();
        var postal_code = $("#postal_code").val();
        var mobile_no = $("#mobile_no").val();
        var parent_mobile = $("#parent_mobile").val();
        var landline = $("#landline").val();
        var gmail = $("#gmail").val();
        var dl_no = $("#dl_no").val();
        var pd_no = $("#pd_no").val();
        var aadhar_no = $("#aadhar_no").val();
        var ole_name = $("#ole_name").val();
        var course_name = $("#course_name").val();
        var course_type = $("#course_type").val();
        var academic_year = $("#academic_year").val();
        var diat_dep_name = $("#diat_dep_name").val();
        var reg_no = $("#reg_no").val();
        $.ajax({
            url: " <?= USER_PATH ?>/editstudent",
            type: "POST",
            datatype: "json",
            crossDomain: true,
            data: JSON.stringify({
                "id":id,
                "name": name,
                "dob": dob,
                "gender": gender,
                "blood_group": blood_group,
                "address": address,
                "permanent_address": permanent_address,
                "postal_code": postal_code,
                "mobile_no": mobile_no,
                "parent_mobile": parent_mobile,
                "landline": landline,
                "gmail":gmail,
                "dl_no": dl_no,
                "pd_no": pd_no,
                "aadhar_no": aadhar_no,
                "ole_name": ole_name,
                "course_name":course_name,
                "course_type": course_type,
                "academic_year": academic_year,
                "diat_dep_name": diat_dep_name,
                "reg_no": reg_no,
            }),
            success: function (data) {
                if (data.success == true) {
                    window.location.href = "<?= USER_PATH ?>"
                } else {
                    window.location.reload();
                }
            },
            error: function (data) {
            }
        })
    }
</script>
<?php include(INCLUDESPATH . '/footer.php'); ?>