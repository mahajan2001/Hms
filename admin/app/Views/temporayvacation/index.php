<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Students</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb float-right">
                                <li><a href="<?= DASHBOARD_PATH ?>">Dashboard &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Students</a></li>
                                <!--	<li class="active">Data Table</li>-->
                            </ol>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
            <div class="main-content">
                <?php if (isset($success_message) && $success_message != '') {  ?>

                    <div class="alert alert-info alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong>
                        <?php echo isset($success_message) ? $success_message : $this->session->flashdata('invalid'); ?>
                    </div>

                <?php  } ?>

                <?php if (isset($error_message) && $error_message != '') {  ?>

                    <div class="alert alert-info alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error!</strong>
                        <?php echo isset($error_message) ? $error_message : $this->session->flashdata('invalid'); ?>
                    </div>

                <?php } ?>

                <!-- Write Content here -->
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header">
                                <h4>All Students Temporay Vacation</h4>
                                <a type="submit" class="btn btn-outline-danger btn-flat btn-sm float-right" href="<?= TEMPORAYVACATION_PATH ?>/temporary_vacation">Add Temporay Vacation</a>
                            </div>
                            <div class="card-body">
                                <span id="error_msg" style="color:red"></span>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Registration No</th>
                                            <th>Course</th>
                                            <th>Phone Number</th>
                                            <th>Deposit</th>
                                            <th>Mess Balance</th>
                                            <th>Total Balance</th>
                                            <th>Update</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($temporayvacation)) {
                                            $html = '';
                                            foreach ($temporayvacation as $row) { ?>
                                                <tr>
                                                    <td><?= $row['id'] ?></td>
                                                    <td><?= $row['name'] ?></td>
                                                    <td><?= $row['registration_no'] ?></td>
                                                    <td><?= $row['course_type'] ?></td>
                                                    <td><?= $row['mobile_no'] ?></td>
                                                    <td><?= $row['deposit'] ?></td>
                                                    <td><?= $row['mess_balance'] ?></td>
                                                    <td><?= $row['total_balance'] ?></td>
                                                    
                                                    <td>&nbsp;&nbsp;<a class="fa-solid fa-pen-to-square text-blue" data-toggle="tooltip" title="Edit Guest!" href="<?= TEMPORAYVACATION_PATH ?>/edit/<?= $row["id"]; ?>"></a>
                                                    </td>
                                                    <td>&nbsp;&nbsp;<a class="fa-solid fa-eye text-green" data-toggle="tooltip" title="View Guest!" href="<?= TEMPORAYVACATION_PATH ?>/edit/<?= $row["id"]; ?>"></a></td>

                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>

                        </div><!-- card -->
                    </div>

                </div><!-- /# card container -->
                <!-- /# column -->

            </div><!-- /# main content -->
        </div><!-- /# container-fluid -->
    </div><!-- /# main -->
</div><!-- /# content wrap -->

<?php include(INCLUDESPATH . '/footer.php'); ?>
<script type="text/javascript">
     $(document).on('change', '.status_change ', function() {
        if ($(this).is(":checked")) {
            var visibility = '1';
        } else {
            var visibility = '0';
        }
        var id = $(this).attr('data-id');
        $.ajax({
            type: "POST",
            url: "<?= USER_PATH ?>/change_visibility",
            data: JSON.stringify({
                'id': id,
                'status': visibility
            }),
            success: function(data) {
            },
            error: function(data) {
                console.log("error is" + JSON.stringify(data));
            }
        });
    });
</script>