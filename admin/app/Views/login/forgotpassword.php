<?php include(INCLUDESPATH . '/header.php'); ?>
<div class="unix-login">
    <div class="container">
        <div class="row  justify-content-md-center">
            <div class="col-lg-6 align-self-center">
                <div class="login-content">
                    <div class="login-logo">
                        <?php /*<a href="javascript:void(0)"><span><?= $this->settings->project_name ?></span></a>*/ ?>
                    </div>
                    <div class="login-form shadow" style="border-radius: .75rem;">
                        <h4>Forgot Password</h4>
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
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="text" class="form-control required" name="admin_email" id="admin_email" placeholder="Enter Email" value="">
                            <span id="email_error_msg" style="color:red"></span>
                        </div>
                        <div class=" form-group">
                            <label>OTP</label>
                            <input type="text" onkeypress="return isNumberKey(event)" class="form-control required" name="admin_otp" id="admin_otp" placeholder="Enter OTP" value="">
                            <span id="error_otp" style="color:red;"></span>
                        </div>
                        <div class="row">
                            <div class="col md-6">
                                <a onclick="return sendotp()" class="btn btn-outline-danger float-end m-b-30 m-t-30">Send OTP</a>
                            </div>

                            <div class="col md-6">
                                <a id="submit" onclick="return verifyOTP()" class="btn btn-outline-danger float-end m-b-30 m-t-30">Verify OTP</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cover-spin"></div>
            </div>
        </div>
    </div>
</div>

<script>
    function sendotp() {
        var email = $("#admin_email").val();
        var email_reg = /^(?=[^@]*[A-Za-z])([a-zA-Z0-9])(([a-zA-Z0-9])*([\._-])?([a-zA-Z0-9]))*@(([a-zA-Z0-9\-])+(\.))+([a-zA-Z]{2,4})+$/i;
        if (email === "") {
            $("#email_error_msg").text("Email id should not be empty!");
            return false;
        } else if (!email.match(email_reg)) {
            $("#email_error_msg").text("Please Enter Valid Email Address");
            return false;

        } else {
            $('#cover-spin').show(0)
            $.ajax({
                url: "<?= ADMIN_PATH ?>/forgotPass",
                type: "POST",
                crossDomain: true,
                contentType: 'application/json',

                data: JSON.stringify({
                    "admin_email": email
                }),
                success: function(data) {
                    if (data.success == true) {
                        window.location.reload();
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
<script>
    function verifyOTP() {
        otp = $('#admin_otp').val();
        $("#email_error_msg").text("");
        if (otp === "") {
            $('#error_otp').text("Enter OTP");
            return false;
        } else if (otp.length != 4) {
            $('#error_otp').text("Enter only 4 digit OTP");
        } else {
            $('#error_otp').text("");
        }
        $.ajax({
            url: "<?= ADMIN_PATH ?>/verifyOTP",
            type: "POST",
            crossDomain: true,
            contentType: 'application/json;charset=UTF-8',

            data: JSON.stringify({
                "admin_otp": otp
            }),
            success: function(data) {

                if (data.success == true) {
                    window.location.href = "<?= ADMIN_PATH ?>/changepasswordLogin";
                } else {
                    window.location.reload();
                }
            },
        });
    }

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode != 46 && charCode > 31 &&
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
</script>

<?php include(INCLUDESPATH . '/footer.php'); ?>