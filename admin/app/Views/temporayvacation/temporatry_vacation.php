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
                                <h1>TEMPORARY VACATION</h1>
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

                                            <td colspan="3">
                                                <select id="name" class="form-control required" name="name" placeholder="Select the student namer">
                                                    <option value=""></option>

                                                    <?php
                                                    foreach ($student as $key => $value) {
                                                    ?>
                                                        <option value="<?php echo $value['id']; ?>">
                                                            <?php echo $value['id']; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                                <span id="name_error_message" style="color:red"></span>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Registration Number</td>
                                            <td colspan="3"><input class="form-control" type="text" id="registration_no" name="registration_no"></td>
                                        </tr>

                                        <tr>
                                            <td>Course</td>
                                            <td colspan="3"><input class="form-control" type="text" id="course" name="course"></td>
                                        </tr>

                                        <tr>
                                            <td>Department</td>
                                            <td colspan="3"><input class="form-control" id="department" name="department"></td>
                                        </tr>

                                        <tr>
                                            <td>Date of Joining Hostel </td>
                                            <td colspan="3"><input class="form-control" type="text" id="js_date" name="js_date"></td>
                                        </tr>

                                        <tr>
                                            <td>Room Number</td>
                                            <td colspan="3"><input class="form-control" type="text" id="room_no" name="room_no"></td>
                                        </tr>
                                        <tr>
                                            <td>Date of Temporary Vacation of Hostel</td>
                                            <td colspan="3"><input class="form-control" type="date" id="tvh_date" name="tvh_date"></td>
                                        </tr>
                                        <tr>
                                            <td>Mobile Number</td>
                                            <td colspan="3"><input class="form-control" type="text" id="mobile_number" name="mobile_number"></td>
                                        </tr>
                                        <tr>
                                            <td>Security Deposit, Amount, Rs(A)</td>
                                            <td colspan="3"><input class="form-control" id="deposit" name="deposit"></td>
                                        </tr>
                                        <tr>
                                            <td>Mess Balance (IF ANY)</td>
                                            <td collapse="4"><input class="form-control" id="mess_balance" name="mess_balance"></td>

                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <h3>DECLARATION BY THE HOSTEL RESIDENT</h3>
                                <br>
                                <p>1.In View of the above,I request HMS to Stop Billing temporarily. </p>
                            </div>
                            <br>
                            <div class="form-group">
                                <button id="submitButton" onclick="return adddata()" class="btn btn-outline-primary float-right">SAVE</button>
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
        var registration_no = $("#registration_no").val();
        var course_type = $("#course_type").val();
        var department = $("#department").val();
        var js_date = $("#js_date").val();
        var room_no = $("#room_no").val();
        var tvh_date = $("#tvh_date").val();
        var mobile_no = $("#mobile_no").val();
        var deposit = $("#deposit").val();
        var mess_balance = $("#mess_balance").val();
        // var receipt_no_mess = $("#receipt_no_mess").val();
        // var date_mess = $("#date_mess").val();
        var total_balance = $("#total_balance").val();
        //  var receipt_no_tobalance = $("#receipt_no_tobalance").val();
        //  var date_tobalance = $("#date_tobalance").val();

        $.ajax({
            url: " <?= TEMPORAYVACATION_PATH ?>/addtemporayvacation ",
            type: "POST",
            datatype: "json",
            crossDomain: true,
            data: JSON.stringify({
                "name": name,
                "registration_no": registration_no,
                "course_type": course_type,
                "department": department,
                "js_date": js_date,
                "room_no": room_no,
                "tvh_date": tvh_date,
                "mobile_no": mobile_no,
                "deposit": deposit,
                "mess_balance": mess_balance,
                //"receipt_no_mess": receipt_no_mess,
                //"date_mess": date_mess,
                "total_balance": total_balance,
                // "receipt_no_tobalance": receipt_no_tobalance,
                // "date_tobalance": date_tobalance,
            }),
            success: function(data) {
                if (data.success == true) {
                    window.location.href = "<?= TEMPORAYVACATION_PATH ?>"
                } else {
                    window.location.reload();
                }
            },
            error: function(data) {}
        })

       

    }
</script>

<script>

    function getData(){
        $('#name').on('change', function() {
            var id = $(this).val();

            // Assuming 'registration_no', 'course_type', 'department' are IDs of fields to update
            if (id === $value['student_id']) {
                $('#registration_no').val($value['registration_no']);
                $('#course_type').val($value['course_type']);
                $('#department').val($value['department']);
                $('#js_date').val($value['joining_date']);
                $('#room_no').val($value['room_no']);
                $('#tvh_date').val($value['temporary_vacation_date']);
                $('#mobile_no').val($value['mobile_no']);
                $('#deposit').val($value['deposit']);
                $('#mess_balance').val($value['mess_balance']);
            } 
        });
    }
</script>

<?php include(INCLUDESPATH . '/footer.php'); ?>