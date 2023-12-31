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
                                <li><a href="<?= TEMPORAYVACATION_PATH ?>">temporayvacation &nbsp; </a></li>
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
                                <a href="<?= TEMPORAYVACATION_PATH ?>" class="btn btn-outline-danger float-end">BACK</a>
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
                                            <td colspan="3"><input class="form-control" id="name"  value="<?php echo $temporayvacation['name']; ?>"></td>

                                        </tr>
                                        <tr>
                                            <td>Registration Number</td>
                                            <td colspan="3"><input class="form-control" id="registration_no" value="<?php echo $temporayvacation['registration_no']; ?>" ></td>
                                        </tr>
                                        <!-- Repeat this pattern for the remaining rows -->
                                        <!-- ... -->
                                        <tr>
                                            <td>Course</td>
                                            <td colspan="3"><input class="form-control" id="course_type" value="<?php echo $temporayvacation['course_type']; ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Department</td>
                                            <td colspan="3"><input class="form-control" id="department" value="<?php echo $temporayvacation['department']; ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Date of Joining Hostel </td>
                                            <td colspan="3"><input class="form-control" type="date" id="js_date" value="<?php echo $temporayvacation['joining_date']; ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Room Number</td>
                                            <td colspan="3"><input class="form-control" type="text" id="room_no" value="<?php echo $temporayvacation['room_no']; ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Date of Temporary Vacation of Hostel</td>
                                            <td colspan="3"><input class="form-control" type="date" id="tvh_date" value="<?php echo $temporayvacation['temporary_vacation_date']; ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Mobile Number</td>
                                            <td colspan="3"><input class="form-control" id="mobile_no" value="<?php echo $temporayvacation['mobile_no']; ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Security Deposit, Amount, Rs(A)</td>
                                            <td colspan="3"><input class="form-control" id="deposit" value="<?php echo $temporayvacation['deposit']; ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td>Mess Balance (IF ANY)</td>
                                            <td collapse="4"><input class="form-control" id="mess_balance" value="<?php echo $temporayvacation['mess_balance']; ?>" ></td>
                                           
                                        </tr>
                                        <tr>
                                            <td id="totalnalance">Total Balance</td>
                                            <td collapse="4"><input class="form-control" id="total_balance" value="<?php echo $temporayvacation['total_balance']; ?>" ></td>
                                           
                                    </tbody>
                                </table>
                                <br>
                                <h3>DECLARATION BY THE HOSTEL RESIDENT</h3>
                                <br>
                                
                                <p>1.In View of the above,I request HMS to Stop Billing temporarily. </p>
                            </div>
                            <br>
                            <div class="form-group">
                                <button onclick="return edit()"
                                    class="btn btn-outline-primary float-right">Update</button>
                            </div>

                            </table>
                        </div><!-- /# card -->
                    </div><!-- /# column -->
                </div><!- </div><!-- /# container-fluid -->
            </div><!-- /# main -->
        </div><!-- /# content wrap -->
        <script>

            function edit() {
                var id = <?php echo $temporayvacation['id']; ?>;
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
               // var receipt_no_tobalance = $("#receipt_no_tobalance").val();
               // var date_tobalance = $("#date_tobalance").val();
                $.ajax({
                    url: " <?= TEMPORAYVACATION_PATH ?>/edittemporayvacation",
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
                        "room_no": room_no,
                        "tvh_date": tvh_date,
                        "mobile_no": mobile_no,
                        "deposit": deposit,
                        "mess_balance": mess_balance,
                       // "receipt_no_mess": receipt_no_mess,
                       // "date_mess": date_mess,
                        "total_balance": total_balance,
                       // "receipt_no_tobalance": receipt_no_tobalance,
                       // "date_tobalance": date_tobalance,
                    }),
                    success: function (data) {
                        if (data.success == true) {
                            window.location.href = "<?= TEMPORAYVACATION_PATH ?>"
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