<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Add Sub Admin</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right float-right">
                                <li><a href="<?= SUBADMIN_PATH ?>">Sub Admins &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Add Sub Admin</a></li>
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
                                <table class="table table-striped table-bordered">
                                    <a href="<?= SUBADMIN_PATH ?>" class="btn btn-outline-danger float-end">BACK</a>
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
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input id="subadmin_name" class="form-control required" type="text" name="subadmin_name" placeholder="Enter Subadmin Name">
                                        <span id="name_error_message" style="color:red"></span>
                                    </div>

                                    <div class="form-group">
                                        <label>Contact:</label>
                                        <input id="subadmin_contact" class="form-control required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" type="text" name="subadmin_contact" placeholder="Enter Contact Number">
                                        <span id="contact_error_message" style="color:red"></span>
                                    </div>
                                    <div class=" form-group">
                                        <label>Email:</label>
                                        <input id="subadmin_email" class="form-control required" type="text" name="subadmin_email" placeholder="Enter Email Address">
                                        <span id="email_error_message" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Address:</label>
                                        <textarea id="subadmin_address" class="form-control required" type="text" name="subadmin_address" placeholder="Enter address"></textarea>
                                        <span id="address_error_message" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input id="subadmin_password" class="form-control required" type="password" name="subadmin_password" placeholder="Enter Password">
                                        <span toggle="#subadmin_password" class="fa fa-lg fa-eye field-icon  toggle-password"></span>
                                        <span id="password_error_message" style="color:red"></span>
                                    </div>

                            </div>
                            <div class="form-group">
                                <button onclick="return add()" class="btn btn-outline-primary float-right">Add</button>
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
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    function add() {

        var name = $("#subadmin_name").val();
        var email = $("#subadmin_email").val();
        var contact = $("#subadmin_contact").val();
        var password = $("#subadmin_password").val();
        var address = $("#subadmin_address").val();
        var name_regex = /^[a-zA-Z_-]+( [a-zA-Z_-]+)*$/;
        var email_regex = /^(?=[^@]*[A-Za-z])([a-zA-Z0-9])(([a-zA-Z0-9])*([\._-])?([a-zA-Z0-9]))*@(([a-zA-Z0-9\-])+(\.))+([a-zA-Z]{2,4})+$/i;;
        var password_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/;
        var address_regex = /^(?=.*[0-9a-zA-z])(?=.*[a-zA-Z])([a-zA-Z0-9-\/, ]().+)$/;
        var contact_regex = /^[0-9]{10}$/;
        if (name === "") {
            $("#name_error_message").text("Name should not empty!!");
            $("#contact_error_message").text("");
            $("#email_error_message").text("");
            $("#password_error_message").text("");
            $("#address_error_message").text("");
            return false;
        } else
        if (!name_regex.test(name)) {
            $("#name_error_message").text("Name should be in characters!!");
            $("#contact_error_message").text("");
            $("#email_error_message").text("");
            $("#password_error_message").text("");
            $("#address_error_message").text("");
            return false;
        } else
        if (name.length < 3 || name.length > 40) {
            $("#name_error_message").text("Name should be between 3 to 40 characters!!");
            $("#contact_error_message").text("");
            $("#email_error_message").text("");
            $("#password_error_message").text("");
            $("#address_error_message").text("");
            return false;
        } else
        if (contact === "") {
            $("#name_error_message").text("");
            $("#contact_error_message").text("Contact Number should not empty!!");
            $("#email_error_message").text("");
            $("#password_error_message").text("");
            $("#address_error_message").text("");
            return false;
        } else
        if (!contact_regex.test(contact) || contact.length != 10) {
            $("#name_error_message").text("");
            $("#contact_error_message").text("Contact Number should be 10 digits!!");
            $("#email_error_message").text("");
            $("#password_error_message").text("");
            $("#address_error_message").text("");
            return false;
        } else
        if (email === "") {
            $("#name_error_message").text("");
            $("#contact_error_message").text("");
            $("#email_error_message").text("email address should not empty!!");
            $("#password_error_message").text("");
            $("#address_error_message").text("");
            return false;
        } else
        if (!email_regex.test(email)) {
            $("#name_error_message").text("");
            $("#contact_error_message").text("");
            $("#email_error_message").text("Invalid email address!!");
            $("#password_error_message").text("");
            $("#address_error_message").text("");
            return false;
        } else
        if (address === "") {
            $("#name_error_message").text("");
            $("#contact_error_message").text("");
            $("#email_error_message").text("");
            $("#password_error_message").text("");
            $("#address_error_message").text("address should not empty!!");
            return false;
        } else if (!address_regex.test(address)) {
            $("#name_error_message").text("");
            $("#contact_error_message").text("");
            $("#email_error_message").text("");
            $("#password_error_message").text("");
            $("#address_error_message").text("Please provide valid address");
            return false;
        } else
        if (address.length < 3 || address.length > 255) {
            $("#name_error_message").text("");
            $("#contact_error_message").text("");
            $("#email_error_message").text("");
            $("#password_error_message").text("");
            $("#address_error_message").text("Address should be between 3 to 255 !!");
            return false;
        } else
        if (password === "") {
            $("#name_error_message").text("");
            $("#contact_error_message").text("");
            $("#email_error_message").text("");
            $("#password_error_message").text("password should not empty!!");
            $("#address_error_message").text("");
            return false;
        } else if (!password_regex.test(password)) {
            $("#name_error_message").text("");
            $("#contact_error_message").text("");
            $("#email_error_message").text("");
            $("#password_error_message").text("Password should be 8 to 15 characters and at least one uppercase, one lowercase alphabet, one number and one special character!!");
            $("#address_error_message").text("");
            return false;
        } else {
            $.ajax({
                url: " <?= SUBADMIN_PATH ?>/addSubadmin",
                type: "POST",
                datatype: "json",
                crossDomain: true,
                data: JSON.stringify({
                    "subadmin_name": name,
                    "subadmin_email": email,
                    "subadmin_contact": contact,
                    "subadmin_password": password,
                    "subadmin_address": address
                }),
                headers: ({
                    Authorization: <?= "'" . $controller->session->get('jwtToken') . "'" ?>
                }),
                success: function(data) {
                    if (data.success == true) {
                        window.location.href = "<?= SUBADMIN_PATH ?>"
                    } else {
                        window.location.reload();
                    }
                },
                error: function(data) {
                    console.log("error is" + data);
                }
            })
        }
    }
</script>
<?php include(INCLUDESPATH . '/footer.php'); ?>