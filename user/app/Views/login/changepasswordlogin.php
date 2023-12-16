<?php include(INCLUDESPATH . '/header.php'); ?>
<div class="unix-login">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-6 align-self-center">
                <div class="login-content">
                    <!-- Write Content here -->
                    <div class="login-form shadow" style="border-radius: .75rem;">
                        <h4>Change Password</h4>
                        <?php if ($controller->session->getFlashdata('error') != null) { ?>

                            <div id=" error_msg" class="alert alert-danger alert-dismissible text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Error!</strong>
                                <?= $controller->session->getFlashdata('error'); ?>
                            </div>

                        <?php
                        } ?>
                        <?php if ($controller->session->getFlashdata('success') != null) { ?>

                            <div id="Success_msg" class="alert alert-success alert-dismissible text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong>
                                <?= $controller->session->getFlashdata('success'); ?>
                            </div>
                        <?php
                        } ?>
                        <div id="error_alert" style="display:none;" class="alert alert-danger" role="alert">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 control-label"> New Password :</label>
                            <div class="col-sm-12">
                                <input id="newpassword" class="form-control required" type="password" name="newpassword" required placeholder="Enter Password">
                                <span toggle="#newpassword" class="fa fa-lg fa-eye field-icon  toggle-password"></span>
                                <span id="error_message_newpassword" style="color:red;"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12 control-label">Confirm Password :</label>
                            <div class="col-sm-12">
                                <input id="confirmpassword" class="form-control required" type="password" name="confirmpassword" required placeholder="Enter Confirm Password">
                                <span toggle="#confirmpassword" class="fa fa-lg fa-eye field-icon  toggle-password"></span>
                                <span id="error_message_confirmpassword" style="color:red;"></span>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button onclick="return validate()" type="submit" class="btn btn-outline-danger float-end">Change
                                    Password</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /# card -->
        </div><!-- /# column -->
    </div><!-- /# row -->
</div>
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
            $.ajax({
                url: "<?= ADMIN_PATH ?>/changepass",
                type: "POST",
                crossDomain: true,
                contentType: 'application/json;charset=UTF-8',

                data: JSON.stringify({
                    "newpassword": newpassword,
                    "confirmpassword": confirmpassword
                }),
                success: function(data) {
                    if (data.success == true) {
                        $("#password_changed_message").text("Password changed successfully!");
                        $("#error_message").css("display", "block");
                        window.location.href = "<?= LOGIN_PATH ?>";
                    } else {
                        window.location.reload();
                    }
                },
                error: function(data) {
                    console.log("error is" + JSON.stringify(data));

                }
            })
        }
    }
</script>
<?php include(INCLUDESPATH . '/close.php'); ?>