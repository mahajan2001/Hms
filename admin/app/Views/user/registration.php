<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Add Student Details</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right float-right">
                                <li><a href="<?= USER_PATH ?>">Add Studet Details &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Add Studet Details </a></li>
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
                                <h1>SECTION 1: PERSONAL DETAILS OF APPLICANT</h1>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Full Name</label>
                                            <input id="name" class="form-control required" type="text" name="name"
                                                placeholder="Enter student Name">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Date of Birth</label>
                                            <input id="dob" class="form-control required" type="date" name="dob"
                                                placeholder="Select the Birth Date">
                                            <span id="dob_error_message" style="color:red"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Gender</label>
                                            <select id="gender" class="form-control required" name="gender"
                                                placeholder="Select the Gender">
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
                                            <label>Blood Group</label>
                                            <select id="blood_group" class="form-control required" name="blood_group"
                                                placeholder="Select the Blood Group">
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
                                            <label>Address for Correspondence</label>
                                            <input id="address" class="form-control required" type="text" name="address"
                                                placeholder="Enter address">
                                            <span id="address_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Permanent Address</label>
                                            <input id="permanent_address" class="form-control required" type="text" name="permanent_address"
                                                placeholder="Enter Permanent Address">
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
                                                name="postal_code" placeholder="Enter Postal Code">
                                            <span id="postal_code_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Mobile Number</label>
                                            <input id="mobile_no" onkeypress="return isNumberKey(event)" class="form-control required" type="text"
                                                name="mobile_no" placeholder="Enter Mobile Number">
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
                                                name="parent_mobile" placeholder="Enter Parent Contact No">
                                            <span id="parent_mobile_code_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Landline No.(with STD Code)</label>
                                            <input id="landline" class="form-control required" type="text"
                                                name="landline" placeholder="Enter Landline No">
                                            <span id="landline_code_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Gmail</label>
                                            <input id="gmail" class="form-control required" type="text" name="gmail"
                                                placeholder="Enter Gmail">
                                            <span id="gmail_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Driving License No</label>
                                            <input id="dl_no" class="form-control required" type="text" name="dl_no"
                                                placeholder="Enter Driving License No">
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
                                                placeholder="Enter PAN Details">
                                            <span id="pd_no_error" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Aadhar Number</label>
                                            <input id="aadhar_no" class="form-control required"  onkeypress="return isNumberKey(event)" type="text"
                                                name="aadhar_no" placeholder="Enter Aadhar Number">
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
                                        <label>Select Signature: </label>
                                        <div class="custom-file">
                                            <input name="signature" type="file" class="custom-file-input" id="signature">
                                            <label class="custom-file-label" for="customFile">Select signature</label>
                                        </div>
                                        <span id="signature_error_message" style="color:red"></span>
                                    </div>
                                    </div>  
                                </div>
                                <br>
                                <h1>SECTION 2: ACADEMIC PROGRAMME/COURSE DETAILS</h1>
                                <br>
                                <div class="row">
                                  <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Organization/lab/Esttb Name</label>
                                            <input id="ole_name" class="form-control required" type="text"
                                                name="ole_name" placeholder="Enter Organization/lab/Esttb Name ">
                                            <span id="ole_name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Course Applied For</label>
                                            <select id="course_type" class="form-control required" name="course_type"
                                                placeholder="Select Course Applied For">
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
                                                name="course_name" placeholder="Enter Name of Course ">
                                            <span id="course_name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Academic Year</label>
                                            <input id="academic_year" class="form-control required" type="text"
                                                name="academic_year" placeholder="Enter Academic Year">
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
                                                name="diat_dep_name" placeholder="Enter DIAT Department Name ">
                                            <span id="diat_dep_name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>DIAT Reg.No</label>
                                            <input id="reg_no" class="form-control required" type="text" name="reg_no"
                                                placeholder="Enter DIAT Reg.No">
                                            <span id="v_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                               
                                <br>
                                <h1>SECTION 3: DECLARATION BY HOSTEL RESIDENT </h1>
                                <br>
                                <p>
                                    <input type="checkbox" onchange="updateButtonState()" id="hostelRulesCheckbox1" >
                                    <label for="hostelRulesCheckbox">
                                        I have gone through, fully understood, and agree to obey all the DIAT (DU)
                                        Hostel Rules and Regulations available on
                                        <a href="https://www.diat.ac.in" target="_blank">www.diat.ac.in</a> under
                                        Hostels Portal with letter and spirit.
                                    </label>
                                </p>
                                <p>
                                    <input type="checkbox" onchange="updateButtonState()" id="hostelRulesCheckbox2">
                                    <label for="hostelRulesCheckbox">
                                        I am aware that, DIAT(DU) Hostel Rules and REgulation subjext to change from
                                        time-to-time during my stay.
                                    </label>
                                </p>
                                <p>
                                    <input type="checkbox" onchange="updateButtonState()" id="hostelRulesCheckbox3">
                                    <label for="hostelRulesCheckbox">
                                        I am aware that, essential facilities are created that makes my comfortable stay
                                        in the hostels.
                                    </label>
                                </p>

                                <p>
                                    <input type="checkbox" onchange="updateButtonState()" id="hostelRulesCheckbox4">
                                    <label for="hostelRulesCheckbox">
                                        I am aware that,outside food will not be permitted to the hostel rooms and it is
                                        only perimitted up to the dining halls.
                                    </label>
                                </p>

                                <p>
                                    <input type="checkbox" onchange="updateButtonState()" id="hostelRulesCheckbox5">
                                    <label for="hostelRulesCheckbox">
                                        I am aware that,I need to mandatorily enter my movement in the movement register
                                        kept in the hostels and I will do the same.
                                    </label>
                                </p>

                                <p>
                                    <input type="checkbox" onchange="updateButtonState()" id="hostelRulesCheckbox6">
                                    <label for="hostelRulesCheckbox">
                                        I will always cooperate with the Institute/Hostel staff and I will not
                                        mis-behave with the Hostel Wardens,and staff members or any other person working
                                        in the hostels.
                                    </label>
                                </p>
                                <p>
                                    <input type="checkbox" onchange="updateButtonState()" id="hostelRulesCheckbox7">
                                    <label for="hostelRulesCheckbox">
                                        I am aware that, I will be responsible for the safeguard of all my belongings in
                                        the hostel/Institue.
                                    </label>
                                </p>
                                <p>
                                    <input type="checkbox" onchange="updateButtonState()" id="hostelRulesCheckbox8">
                                    <label for="hostelRulesCheckbox">
                                        I will come back to the hostel before the prescribed time as notified by the
                                        hostel management.
                                        I am also aware that during my outing period, I am responsible for my safety and
                                        security, and the Institute
                                        or hostel management is in no way responsible for any untoward incident
                                        happening outside.
                                        While going out of the hostel, I will carry my Institute ID.
                                        I will be fully and solely responsible for my acts within the Institute and
                                        outside the DIAT (DU), Pune premises.
                                    </label>
                                </p>

                                <p>
                                    <input type="checkbox" onchange="updateButtonState()" id="hostelRulesCheckbox9">
                                    <label for="hostelRulesCheckbox">
                                        I will be inside the hostel by 10.00 PM on any day, which may be extended with
                                        the prior permission from the warden. </label>
                                </p>
                                <p>
                                    <input type="checkbox" onchange="updateButtonState()" id="hostelRulesCheckbox10">
                                    <label for="hostelRulesCheckbox">
                                        I am aware that, on repeated late arrival to the hostel after outing, I may be
                                        suspended/expelled from the hostel/Institute.
                                </p>
                                <p>
                                    <input type="checkbox" onchange="updateButtonState()" id="hostelRulesCheckbox11">
                                    <label for="hostelRulesCheckbox">
                                        I will not indulage in gambling, smoking, consuming liquor,narcoti drugs or any
                                        other intoxicants inside/ outside of the hostel/Institute.
                                        If I am found in such intoxicated condition, I will accept any punishment
                                        imposed by the hostel management/institute authorities including expulsion from
                                        the hostel
                                        and or rustication from the Institue.
                                </p>
                                <p>
                                    <input type="checkbox" onchange="updateButtonState()" id="hostelRulesCheckbox12">
                                    <label for="hostelRulesCheckbox">
                                        I will not spread any kind unauthorized data(text/audio/video etc.,) across the
                                        social media platfoems(like Twitter/Facebook/WhatsApp etc.,)
                                        against the hostels/Institute which can downgrade the reputation of
                                        DIAT(DU),pune
                                </p>
                                <p>
                                    <input type="checkbox" onchange="updateButtonState()" id="hostelRulesCheckbox13">
                                    <label for="hostelRulesCheckbox">
                                        For any problems in Hostel/Mess, I will approach the Hostel Wardens/Hostel Staff
                                        through proper channel and I will abide to the hierarchy.
                                </p>
                            </div>

                           <div class="form-group">
                                <button  id="submitButton" disabled  onclick="return adddata()"
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
<script>

    /* $('#course').on('change', function () {
         var id = $(this).val();
         var html1 = '<option value="0">Select Sub Course</option><option value="Army">Army</option><option value="Air Force">Air Force</option><option value="Non Tech branch">Non Tech branch</option>';
         var html2 = '<option value="0">Select Sub Course</option><option value="Air Force">Air Force</option><option value="Ground Duty Tech">Ground Duty Tech</option><option value="Navel Cadet">Navel Cadet</option>';
         if (id == 'B.Sc(Computer)') {
             $('#sub_course').html();
             $('#sub_course_div').css('display', 'block');
             $('#sub_course').html(html1);
         } else if (id == 'B.Tech') {
             $('#sub_course').html();
             $('#sub_course_div').css('display', 'block');
             $('#sub_course').html(html2);
         } else {
             var html3 = '<option value="0">Select Sub Course</option>';
             $('#sub_course').html(html3);
             $('#sub_course_div').css('display', 'none');
         }
     });*/
     
    $('#mobile_no').on('keyup', function(){
        var mobile_no = $('#mobile_no').val();
        if(mobile_no.length != 10 ){
            $('#mobile_no_error').text('Please enter 10 digit mobile no');
        }else{
            $('#mobile_no_error').text('');
        }
    })

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode != 46 && charCode > 31 &&
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }


    $('#aadhar_no').on('keyup', function(){
        var aadhar_no = $('#aadhar_no').val();
        if(aadhar_no.length != 12 ){
            $('#aadhar_no_error').text('Please enter 12 digit aadhar  no');
        }else{
            $('#aadhar_no_error').text('');
        }
    })

    function validatePan(evt) {
            var inputValue = evt.target.value;
            var panRegex = /^[A-Z]{5}[0-9]{4}[A-Z]$/; // Example regex for PAN 
            if (panRegex.test(inputValue)) {
                console.log("PAN is valid");
            } else {
                console.log("Invalid PAN");
            }
        }

    $('#pd_no').on('keyup', function(){
        var pd_no = $('#pd_no').val();
        if(pd_no.length != 10 ){
            $('#pd_no_error').text('Please enter 10 digit Pan  no');
        }else{
            $('#pd_no_error').text('');
        }
    })
    $('#postal_code').on('keyup', function(){
        var postal_code = $('#postal_code').val();
        if(postal_code.length != 6 ){
            $('#postal_code_error_message').text('Please enter 6 digit Postal code');
        }else{
            $('#postal_code_error_message').text('');
        }
    })

    function adddata() {
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
        // var image = $('#image')[0].files[0];
        // var signature = $('#signature')[0].files[0];
        var ole_name = $("#ole_name").val();
        var course_name = $("#course_name").val();
        var course_type = $("#course_type").val();
        var academic_year = $("#academic_year").val();
        var diat_dep_name = $("#diat_dep_name").val();
        var reg_no = $("#reg_no").val();
        // if (image) {
        //     var file_extension = image['name'].split('.').pop();
        // }
        // if (signature) {
        //     var file_extension = signature['name'].split('.').pop();
        // }
        $.ajax({
            url: " <?= USER_PATH ?>/addstudentdata",
            type: "POST",
            datatype: "json",
            crossDomain: true,
            data: JSON.stringify({
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
                // "image" : image,
                // "signature" : signature,
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
<script>
    // Function to update button state based on checkbox status
    function updateButtonState() {
      var hostelRulesCheckbox1 = document.getElementById('hostelRulesCheckbox1');
      var hostelRulesCheckbox2 = document.getElementById('hostelRulesCheckbox2');
      var hostelRulesCheckbox3 = document.getElementById('hostelRulesCheckbox3');
      var hostelRulesCheckbox4 = document.getElementById('hostelRulesCheckbox4');
      var hostelRulesCheckbox5 = document.getElementById('hostelRulesCheckbox5');
      var hostelRulesCheckbox6 = document.getElementById('hostelRulesCheckbox6');
      var hostelRulesCheckbox7 = document.getElementById('hostelRulesCheckbox7');
      var hostelRulesCheckbox8 = document.getElementById('hostelRulesCheckbox8');
      var hostelRulesCheckbox9 = document.getElementById('hostelRulesCheckbox9');
      var hostelRulesCheckbox10 = document.getElementById('hostelRulesCheckbox10');
      var hostelRulesCheckbox11 = document.getElementById('hostelRulesCheckbox11');
      var hostelRulesCheckbox12 = document.getElementById('hostelRulesCheckbox12');
      var hostelRulesCheckbox13 = document.getElementById('hostelRulesCheckbox13');
      var submitButton = document.getElementById('submitButton');

      // Enable the button only if at least one checkbox is checked
      if (hostelRulesCheckbox1.checked && hostelRulesCheckbox2.checked && hostelRulesCheckbox3.checked 
    &&hostelRulesCheckbox4.checked && hostelRulesCheckbox5.checked &&hostelRulesCheckbox6.checked && hostelRulesCheckbox7.checked &&
    hostelRulesCheckbox8.checked && hostelRulesCheckbox9.checked && hostelRulesCheckbox10.checked &&hostelRulesCheckbox11.checked &&
    hostelRulesCheckbox12.checked && hostelRulesCheckbox13.checked ) {
        submitButton.disabled = false;
      } else {
        submitButton.disabled = true;
      }
    }

  </script>


<?php include(INCLUDESPATH . '/footer.php'); ?>