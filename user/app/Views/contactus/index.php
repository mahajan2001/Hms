<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Contact-Us</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb float-right">
                                <li><a href="<?= DASHBOARD_PATH ?>">Dashboard &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Contact-Us</a></li>
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
                                <h4>All Contact-Us</h4>
                                <!-- <a type="submit" style="margin-left:10px" class="btn btn-outline-danger btn-flat btn-sm float-right" href="<?= PROJECT_PATH ?>/viewprojectallocationtocompany">View Company allocated to contactus</a>
                                &nbsp; &nbsp;
                                <a type="submit" class="btn btn-outline-danger btn-flat btn-sm float-right" href="<?= PROJECT_PATH ?>/add">Add Project</a> -->
                            </div>

                            <div class="card-body">
                                <span id="error_msg" style="color:red"></span>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>E-mail</th>
                                            <th>Contact</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th>Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($contactus)) {
                                            $html = '';
                                            foreach ($contactus as $row) { ?>
                                                <tr>
                                                    <td><?= $row['id'] ?></td>
                                                    <td><?= $row['contactus_name'] ?></td>
                                                    <td><?= $row['contactus_email'] ?></td>
                                                    <td><?= $row['contactus_phone'] ?></td>
                                                    <td><?= $row['message'] ?></td>
                                                    <td><?php
                                                        $date = date_create($row['created']);
                                                        echo date_format($date, "d-m-Y");
                                                        ?></td>
                                                    <td>
                                                        <div>
                                                            <label class="switch">
                                                                <input type="checkbox" class="status_change ct_switch" data-id="<?= $row['id'] ?>" value="<?= $row['status'] ?>" <?= $row['status'] == 1 ? "checked" : "" ?>>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <!-- <td>&nbsp;&nbsp;<a class="fa-solid fa-pen-to-square text-blue" data-toggle="tooltip" title="Edit Project Details !" href="<?= PROJECT_PATH ?>/edit/<?= $row["id"]; ?>"></a> -->
                                                    </td>
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
            url: "<?= CONTACTUS_PATH ?>/change_visibility",
            data: JSON.stringify({
                'id': id,
                'status': visibility
            }),
            headers: ({
                Authorization: <?= "'" . $controller->session->get('jwtToken') . "'" ?>
            }),
            success: function(data) {
                if (data.success == true) {
                    console.log(data);
                } else {
                    $("#error_msg").text(data.error.message);
                }

            },
            error: function(data) {
                console.log("error is" + JSON.stringify(data));
            }
        });
    });
</script>