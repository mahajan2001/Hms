<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Officers</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb float-right">
                                <li><a href="<?= DASHBOARD_PATH ?>">Dashboard &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Officers</a></li>
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
                                <h4>All Officers</h4>
                                <a type="submit" class="btn btn-outline-danger btn-flat btn-sm float-right" href="<?= OFFICER_PATH ?>/add">Add Officer</a>
                            </div>
                            <div class="card-body">
                                <span id="error_msg" style="color:red"></span>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email ID</th>
                                            <th>IC NO</th>
                                            <th>Member Type</th>
                                            <th>Messing</th>
                                            <th>Rank</th>
                                            <th>Faculty</th>
                                            <th>Phone Number</th>
                                            <th>Status</th>
                                            <th>Update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($officers)) {
                                            $html = '';
                                            foreach ($officers as $row) { ?>
                                                <tr>
                                                    <td><?= $row['id'] ?></td>
                                                    <td><?= $row['name'] ?></td>
                                                    <td><?= $row['email'] ?></td>
                                                    <td><?= $row['ic_no'] ?></td>
                                                    <td><?= $row['member_type'] ?></td>
                                                    <td><?= $row['messing'] ?></td>
                                                    <td><?= $row['rank'] ?></td>
                                                    <td><?= $row['faculty'] ?></td>
                                                    <td><?= $row['contact'] ?></td>
                                                    <td>
                                                        <div>
                                                            <label class="switch">
                                                                <input type="checkbox" class="status_change ct_switch" data-id="<?= $row['id'] ?>" value="<?= $row['status'] ?>" <?= $row['status'] == 1 ? "checked" : "" ?>>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>&nbsp;&nbsp;<a class="fa-solid fa-pen-to-square text-blue" data-toggle="tooltip" title="Edit Guest!" href="<?= OFFICER_PATH ?>/edit/<?= $row["id"]; ?>"></a>
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
            url: "<?= OFFICER_PATH ?>/change_visibility",
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