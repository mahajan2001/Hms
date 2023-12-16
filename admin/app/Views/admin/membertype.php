<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Member Type</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb float-right">
                                <li><a href="<?= DASHBOARD_PATH ?>">Dashboard &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Member type</a></li>
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
                                <h4>All Member Types</h4>
                            </div>

                            <div class="card-body">
                                <span id="error_msg" style="color:red"></span>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Member Type</th>
                                            <th>Update Member Type Name</th>
                                            <th>Update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($membertype)) {
                                            $html = '';
                                            foreach ($membertype as $row) { ?>
                                                <tr>
                                                    <td><?= $row['id'] ?></td>
                                                    <td><?= $row['member_name'] ?></td>
                                                    <td><input type="text" id="membertype<?= $row['id'] ?>" class="form-control required" value="<?= $row['member_name'] ?>"></td>
                                                    <td>&nbsp;&nbsp;<a class="btn btn-outline-danger btn-flat btn-sm" onclick="editMember('<?= $row['id'] ?>')">Update</a>
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
<script>
    function editMember(id) {
        var membertypename = $("#membertype" + id).val();
        $.ajax({
            url: "<?= ADMIN_PATH ?>/editMembertype",
            type: "POST",
            dataType: "json",
            crossDomain: true,
            headers: {
                Authorization: <?= "'" . $controller->session->get("jwtToken") . "'" ?>
            },
            data: JSON.stringify({
                "id": id,
                "membertypename": membertypename
            }),
            success: function(data) {
                console.log(data);
                if (data.success == true) {
                    window.location.href = "<?= ADMIN_PATH ?>/fetchMembertype"
                } else {
                    window.location.reload();
                }
            },
            error: function(data) {
                console.log("error is" + JSON.stringify(data));
            }
        })
    }
</script>