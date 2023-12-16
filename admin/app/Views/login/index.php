<?php include(INCLUDESPATH . '/header.php'); ?>
<div class="unix-login" style="background-image:url('<?= FETCH_IMAGE ?>backgroundLogin.png'); background-size:cover;">

    <div class="container">
        <div class="row  justify-content-md-center" style="margin-bottom:-7%; margin-top: 1%;">
           
        </div>

        <div class="row  justify-content-md-center">
            <div class="col-lg-6 align-self-center">
                <div class="login-content">
                    <div class="login-logo" style="margin:130px 0;">
                        <?php /*<a href="javascript:void(0)"><span><?= $this->settings->project_name ?></span></a>*/ ?>
                    </div>
                    <div class="login-form shadow" style="border-radius: .75rem;">
                         <img src="<?= FETCH_IMAGE ?>/<?=  $project['project_logo'] ?>" width="35%" style="margin-left: 157px;">
                        <h4 style="margin-bottom: 30px; margin-top: 15px;"><?= $project['project_name'] ?><br>Adminstrator Login</h4>

                        <?php if ($controller->session->getFlashdata('error') != null) { ?>

                            <div id="error_msg" class="alert alert-danger alert-dismissible text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Error!</strong>
                                <?= $controller->session->getFlashdata('error'); ?>
                            </div>

                        <?php
                        } ?>
                        <!-- <center> <span id="invalid_credentials_msg" style="color:red;"></span></center> -->
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control required" name="admin_email" id="admin_email" placeholder="Email" value="">
                            <span id="email_error_msg" style="color:red"></span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control required" name="admin_password" id="admin_password" placeholder="Password" value="">
                            <span toggle="#admin_password" class="fa fa-lg fa-eye field-icon  toggle-password"></span>
                            <span id="password_error_msg" style=color:red></span>
                        </div>

                        <button type="submit" onclick="return login()" class="btn btn-outline-danger btn-flat m-b-30 m-t-30">Sign in</button>

                        <br>
                        <a class="btn-sm text-blue" href="<?= ADMIN_PATH ?>/forgotPassword">Forgot Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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

    function login() {
        var email = $("#admin_email").val();
        var password = $("#admin_password").val();
        var email_reg = /^(?=[^@]*[A-Za-z])([a-zA-Z0-9])(([a-zA-Z0-9])*([\._-])?([a-zA-Z0-9]))*@(([a-zA-Z0-9\-])+(\.))+([a-zA-Z]{2,4})+$/i;

        if (email === "") {
            $("#password_error_msg").text("");
            $("#email_error_msg").text("Please Enter Email Address");
            return false;
        } else if (!email.match(email_reg)) {
            $("#password_error_msg").text("");
            $("#email_error_msg").text("Please Enter Valid Email Address");
            return false;

        } else
        if (password === "") {
            $("#email_error_msg").text("");
            $("#password_error_msg").text("Please Enter Password");
            return false;
        } else {
            $("#email_error_msg").text("");
            $("#password_error_msg").text("");
            $.ajax({
                url: "<?= LOGIN_PATH ?>/login",
                type: "POST",
                dataType: "json",
                crossDomain: true,
                contentType: 'application/json;charset=UTF-8',
                data: JSON.stringify({
                    "admin_email": email,
                    "admin_password": password,
                }),
                success: function(data) {
                    if (data.success == true) {
                        window.location.href = "<?= DASHBOARD_PATH ?>";
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
<?php include(INCLUDESPATH . '/footer.php'); ?>