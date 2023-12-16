<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Change Password Admin</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb float-right">
                                <li><a href="<?= ADMIN_PATH ?>">Profile &nbsp; </a></li>
                                /&nbsp;
                                <li><a>Change Password</a></li>
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
                            <div class="card-header">
                                <h5>Change Password</h5>

                            </div>
                            <div class="card-body">
                                <div class="menu-upload-form">
                                    <?php if ($controller->session->getFlashdata('error') != null) { ?>
                                        <div class="col-md-12">
                                            <div id="error_msg" class="alert alert-danger alert-dismissible">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Error!</strong>
                                                <?= $controller->session->getFlashdata('error'); ?>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label"> New Password :</label>
                                                <div class="col-sm-12">
                                                    <input id="newpassword" class="form-control required" type="password" name="newpassword" required placeholder="Enter Password">
                                                    <span toggle="#newpassword" class="fa fa-lg fa-eye field-icon  toggle-password"></span>
                                                    <span id="error_message_newpassword" style="color:red;"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Confirm Password :</label>
                                                <div class="col-sm-12">
                                                    <input id="confirmpassword" class="form-control required" type="password" name="confirmpassword" required placeholder="Enter Confirm Password">
                                                    <span toggle="#confirmpassword" class="fa fa-lg fa-eye field-icon  toggle-password"></span>
                                                    <span id="error_message_confirmpassword" style="color:red;"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-12">
                                                    <button onclick="return validate()" type="submit" class="btn btn-outline-primary float-right">Change
                                                        Password</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div><!-- /# card -->
                    </div><!-- /# column -->
                </div><!-- /# row -->

            </div><!-- /# main content -->
        </div><!-- /# container-fluid -->
    </div><!-- /# main -->
</div><!-- /# content wrap -->

<?php include(INCLUDESPATH . '/footer.php'); ?>
<script>
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    function validate() {
        var newpassword = $("#newpassword").val();
        var confirmpassword = $("#confirmpassword").val();

        if (newpassword === "") {
            $("#error_message_newpassword").text("Please enter new password");
            $("#error_message_confirmpassword").text("");
            return false;
        } else if (confirmpassword === "") {
            $("#error_message_confirmpassword").text("Please enter confirm password");
            $("#error_message_newpassword").text("");
            return false;
        } else {
            $("#error_message_newpassword").text("");
            $("#error_message_confirmpassword").text("");
            $.ajax({
                url: "<?= ADMIN_PATH ?>/changepasswordProfile",
                type: "POST",
                datatype: "json",
                crossDomain: true,
                data: JSON.stringify({
                    "newpassword": newpassword,
                    "confirmpassword": confirmpassword
                }),
                headers: ({
                    Authorization: <?= "'" . $controller->session->get('jwtToken') . "'" ?>
                }),
                success: function(data) {
                    if (data.success == true) {
                        window.location.href = "<?= ADMIN_PATH ?>"
                    } else {
                        window.location.reload();
                    }
                },
                error: function(data) {
                    console.log("error is " + JSON.stringify(data));
                }
            })
        }

    }
</script>
<?php include(INCLUDESPATH . '/close.php'); ?>