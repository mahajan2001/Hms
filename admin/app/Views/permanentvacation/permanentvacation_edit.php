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
                            <h1>Edit Student</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right float-right">
                                <li><a href="<?= PERMANENTVACATION_PATH ?>">permanentvacation &nbsp; </a></li>
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
                                <h1>PERMANENT VACATION</h1>
                                <br>
                                
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
                                            <td colspan="3"><input class="form-control"id="name"  value="<?php echo $permanentvacation['name']; ?>" ></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Registration Number</td>
                                            <td colspan="3"><input class="form-control" id="registration_no" value="<?php echo $permanentvacation['registration_no']; ?>" ></td>
                                        </tr>
                                        <!-- Repeat this pattern for the remaining rows -->
                                        <!-- ... -->
                                        <tr>
                                            <td>Course</td>
                                            <td colspan="3"><input class="form-control" id="course_type" value="<?php echo $permanentvacation['course_type']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Department</td>
                                            <td colspan="3"><input class="form-control" id="department" value="<?php echo $permanentvacation['course_type']; ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Date of Joining Hostel </td>
                                            <td colspan="3"><input class="form-control" type="date" id="js_date" value="<?php echo $permanentvacation['joining_date']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Room Number</td>
                                            <td colspan="3"><input class="form-control" type="text" id="room_no" value="<?php echo $permanentvacation['room_no']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Date of Permanent Vacation of Hostel</td>
                                            <td colspan="3"><input class="form-control" type="date" id="pvh_date" value="<?php echo $permanentvacation['permanent_vacation_date']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Mobile Number</td>
                                            <td colspan="3"><input class="form-control"  id="mobile_no" value="<?php echo $permanentvacation['mobile_no']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td >Security Deposit, Amount, Rs(A)</td>
                                            <td colspan="3"><input class="form-control" id="deposit" value="<?php echo $permanentvacation['deposit']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td >Mess Balance (IF ANY)</td>
                                            <td collapse="4">Rs:<input class="form-control" id="mess_balance" value="<?php echo $permanentvacation['mess_balance']; ?>"></td>
                                           
                                        </tr>
                                        <tr>
                                            <td id="totalnalance">Total Balance For Refund</td>
                                            <td collapse="4">Rs:<input class="form-control" id="total_balance" value="<?php echo $permanentvacation['total_balance']; ?>"></td>
                                           
                                        </tr>
                                    </tbody>
                                </table>
                                 <br>
                                <h3>DECLARATION BY THE HOSTEL RESIDENT |Tick any one or more of the following</h3>
                                <br>
                                <p> 1.I have read the Refund Rules Published by DIAT(DU),pune at the time of submission of this form.</p>
                                <p>2.I have completed the course(M.Tech/PhD/JRF/SRF/RA/PA) and submitted the FINAL CLEARANCE FROM issued by Academic section/Admin to the Hostel office. </p>
                                <p>3.I am Permanently vacating the hostel due to personal resons and do not require hostel accommodation in future after Permanent Vacation. </p>
                                <p>4.I am that,if I again ask for hostel accommodation(subject to availability) after refund,I will be treated as GUEST and  have to pay GUEST CHARGES as applicable. </p>
                               <br>
                                <p> In view of the above , I request HMS to process the Refund of <b> SECURITY DEPOSIT AND / OR MESS BALANCE (IF ANY) </b>after recovering all the deficiencies /damages (if any) in the room inventory and other dues (if any) to my active Bank Account.My Active Bank account details are as follows<b> (please enclosed a copy of front page of pass book or front page of pass book or front page details of ONLINE Statement):</b> </p>
                               
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
                                            <td>Name of the Account Holder</td>
                                            <td colspan="3"><input class="form-control"id="account_name" value="<?php echo $permanentvacation['account_name']; ?>"></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Bank Account Number</td>
                                            <td colspan="3"><input class="form-control" id="bankaccount_no" value="<?php echo $permanentvacation['bankaccount_no']; ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Name of the Bank</td>
                                            <td colspan="3"><input class="form-control" id="bank_name" value="<?php echo $permanentvacation['bank_name']; ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Name of the Branch</td>
                                            <td colspan="3"><input class="form-control" id="branch_name" value="<?php echo $permanentvacation['branch_name']; ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Branch IFSC Code</td>
                                            <td colspan="4"><input class="form-control" id="ifsc_code" value="<?php echo $permanentvacation['ifsc_code']; ?>" ></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>Upload cheque /Bank Statement /Passbook </label>
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="customFile">Select Checkbook</label>
                                        </div>
                                        <span id="image_error_message" style="color:red"></span>
                                    </div>
                            </div>
<br>
                            </div>
                             <br>
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

                            

    
    function edit() {
        var id = <?php echo $permanentvacation['id']; ?>;
        var name = $("#name").val();
        var registration_no = $("#registration_no").val();
        var course_type = $("#course_type").val();
        var department = $("#department").val();
        var js_date = $("#js_date").val();
        var room_no = $("#room_no").val();
        var pvh_date = $("#pvh_date").val();
        var mobile_no = $("#mobile_no").val();
        var deposit = $("#deposit").val();
        var mess_balance = $("#mess_balance").val();
        //var receipt_no_mess = $("#receipt_no_mess").val();
       // var date_mess = $("#date_mess").val();
        var total_balance = $("#total_balance").val();
       // var receipt_no_tobalance = $("#receipt_no_tobalance").val();
       // var date_tobalance = $("#date_tobalance").val();
        
        var account_name = $("#account_name").val();
        var bankaccount_no = $("#bankaccount_no").val();
        var bank_name = $("#bank_name").val();
        var branch_name = $("#branch_name").val();
        var ifsc_code = $("#ifsc_code").val();
        
        $.ajax({
            url: " <?= PERMANENTVACATION_PATH ?>/editpermanentvacation ",
            type: "POST",
            datatype: "json",
            crossDomain: true,
            data: JSON.stringify({
                "id": id,
                "name": name,
                "registration_no": registration_no,
                "course_type": course_type,
                "department": department,
                "js_date": js_date,
                "room_no":room_no,
                "pvh_date": pvh_date,
                "mobile_no": mobile_no,
                "deposit": deposit,
                "mess_balance": mess_balance,
               // "receipt_no_mess": receipt_no_mess,
                //"date_mess": date_mess,
                "total_balance": total_balance,
               // "receipt_no_tobalance": receipt_no_tobalance,
               // "date_tobalance": date_tobalance,

                "account_name":account_name,
                "bankaccount_no":bankaccount_no,
                "bank_name":bank_name,
                "branch_name":branch_name,
                "ifsc_code":ifsc_code,


            }),
            success: function (data) {
                if (data.success == true) {
                    window.location.href = "<?= PERMANENTVACATION_PATH ?>"
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