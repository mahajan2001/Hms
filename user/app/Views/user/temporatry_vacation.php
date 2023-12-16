<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
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
                                <h1>TEMPORAY VACATION</h1>
                                <br>
                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Full Name:</label>
                                            <input id="name" class="form-control required" type="text" name="name"
                                                placeholder="Enter student Name">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Registration Number</label>
                                            <input id="regi_number" class="form-control required" type="text" name="regi_number"
                                                placeholder="Enter Registration Number">
                                            <span id="dob_error_message" style="color:red"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Course </label>
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

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>DIAT Department Name</label>
                                            <input id="diat_dep_name" class="form-control required" type="text"
                                                name="diat_dep_name" placeholder="Enter DIAT Department Name ">
                                            <span id="diat_dep_name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Date of Joining Hostel</label>
                                            <input id="d_joining" class="form-control required" type="date" name="d_joining"
                                                placeholder="Select the Date of Joining Hostel">
                                            <span id="dob_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Room Number</label>
                                            <input id="room_no" class="form-control required" type="text" name="room_no"
                                                placeholder="Enter Room Number">
                                            <span id="room_no_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Date of Temporary Vacation</label>
                                            <input id="d_tempory_vacation" class="form-control required" type="date" name="d_tempory_vacation"
                                                placeholder="Select the Date of Temporary Vacation">
                                            <span id="d_tempory_vacation_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Mobile No.</label>
                                            <input id="mobile_no" onkeypress="return isNumberKey(event)" class="form-control required" type="text"
                                                name="mobile_no" placeholder="Enter Mobile No">
                                            <span id="mobile_no_error" style="color:red"></span>
                                        </div>
                                    </div>  
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Security Deposit Amount</label>
                                            <input id="sec_depo_amount" class="form-control required" type="text"
                                                name="sec_depo_amount" placeholder="Enter Security Deposit Amount">
                                            <span id="sec_depo_amount_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mess Balance</label>
                                            <input id="mess_balance" class="form-control required" type="mess_balance"
                                                name="landline" placeholder="Enter Mess Balance">
                                            <span id="mess_balance_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Total Balance</label>
                                            <input id="total_balance" class="form-control required" type="text" name="total_balance"
                                                placeholder="Enter Total Balance">
                                            <span id="total_balance_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div> -->
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
                                            <td colspan="3"><input class="form-control"id="name" ></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Registration Number</td>
                                            <td colspan="3"><input class="form-control" id="registration_no" ></td>
                                        </tr>
                                        <!-- Repeat this pattern for the remaining rows -->
                                        <!-- ... -->
                                        <tr>
                                            <td>Course</td>
                                            <td colspan="3"><input class="form-control" id="course_type"></td>
                                        </tr>
                                        <tr>
                                            <td>Department</td>
                                            <td colspan="3"><input class="form-control" id="department" ></td>
                                        </tr>
                                        <tr>
                                            <td>Date of Joining Hostel and Room Number</td>
                                            <td colspan="3"><input class="form-control" type="text" id="js_date"></td>
                                        </tr>
                                        <tr>
                                            <td>Date of Temporary Vacation of Hostel</td>
                                            <td colspan="3"><input class="form-control" type="date" id="tvh_date"></td>
                                        </tr>
                                        <tr>
                                            <td>Mobile Number</td>
                                            <td colspan="3"><input class="form-control"  id="mobile_no"></td>
                                        </tr>
                                        <tr>
                                            <td >Security Deposit, Amount, Rs(A)</td>
                                            <td colspan="3"><input class="form-control" id="deposit" ></td>
                                        </tr>
                                        <tr>
                                            <td >Mess Balance (IF ANY)</td>
                                            <td collapse="4">Rs:<input class="form-control" id="mess_balance" ></td>
                                            <td collapse="1">Receipt No:<input class="form-control" id="receipt_no_mess"></td>
                                            <td collapse="1">Date:<input class="form-control" type="date" id="date_mess"></td>
                                        </tr>
                                        <tr>
                                            <td id="totalnalance">Total Balance</td>
                                            <td collapse="4">Rs:<input class="form-control" id="total_balance"></td>
                                            <td collapse="1">Receipt No:<input class="form-control" id="receipt_no_tobalance"></td>
                                            <td collapse="1">Date:<input class="form-control" type="date" id="date_tobalance"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <br>
                                <h3>DECLARATION BY THE HOSTEL RESIDENT</h3>
                                <br>
                                <p> 1.I have read the Refund Rules Published by DIAT(DU),pune at the time of submission of this form.</p>
                                <p>2.In View of the above,I request HMS to Stop Billing temporarily. </p>
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

    
    function adddata() {
        var name = $("#name").val();
        var registration_no = $("#registration_no").val();
        var course_type = $("#course_type").val();
        var department = $("#department").val();
        var js_date = $("#js_date").val();
        var tvh_date = $("#tvh_date").val();
        var mobile_no = $("#mobile_no").val();
        var deposit = $("#deposit").val();
        var mess_balance = $("#mess_balance").val();
        var receipt_no_mess = $("#receipt_no_mess").val();
        var date_mess = $("#date_mess").val();
        var total_balance = $("#total_balance").val();
        var receipt_no_tobalance = $("#receipt_no_tobalance").val();
        var date_tobalance = $("#date_tobalance").val();
        $.ajax({
            url: " <?= USER_PATH ?>/addtemporayvacation ",
            type: "POST",
            datatype: "json",
            crossDomain: true,
            data: JSON.stringify({
                "name": name,
                "registration_no": registration_no,
                "course_type": course_type,
                "department": department,
                "js_date": js_date,
                "tvh_date": tvh_date,
                "mobile_no": mobile_no,
                "deposit": deposit,
                "mess_balance": mess_balance,
                "receipt_no_mess": receipt_no_mess,
                "date": date,
                "total_balance": total_balance,
                "receipt_no_tobalance": receipt_no_tobalance,
                "date_tobalance": date_tobalance,
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