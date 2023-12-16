<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Change Admin Profile Details</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb float-right">
                                <li><a href="<?= ADMIN_PATH ?>">Profile &nbsp; </a></li>
                                /&nbsp;
                                <li><a>Update Profile</a></li>
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
                            <?php if ($controller->session->getFlashdata('error') != null) { ?>
                                <div class="col-md-12">
                                    <div id="error_msg" class="alert alert-danger alert-dismissible text-center">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Error!</strong>
                                        <?= $controller->session->getFlashData('error'); ?>
                                    </div>
                                </div>
                            <?php
                            } ?>
                            <div class="card-header">
                                <h5>Change Profile Details</h5>

                            </div>
                            <div class=" card-body">
                                <div class="menu-upload-form">
                                    <span id="error_msg" style="color:red"></span>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label"> Name :</label>
                                                <div class="col-sm-12">
                                                    <input id="admin_name" value="<?= $results['admin_name'] ?>" class="form-control required" type="text" name="admin_name" placeholder="Enter name">
                                                    <span id="error_message_admin_name" style="color:red;"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label"> Contact :</label>
                                                <div class="col-sm-12">
                                                    <input id="admin_contact" onkeypress="return isNumberKey(event)" value="<?= $results['admin_contact'] ?>" class="form-control required" type="text" name="admin_contact" placeholder="Enter Contact">
                                                    <span id="error_message_admin_contact" style="color:red;"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Email :</label>
                                                <div class="col-sm-12">
                                                    <input id="admin_email" value="<?= $results['admin_email'] ?>" class="form-control required" type="text" name="admin_email" placeholder="Enter Email">
                                                    <span id="error_message_admin_email" style="color:red;"></span>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-12">
                                                    <button onclick="return validate()" class="btn btn-outline-primary float-right">Update
                                                        Details</button>
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
    function validate() {
        var admin_contact = $("#admin_contact").val();
        var admin_name = $("#admin_name").val();
        var admin_email = $("#admin_email").val();
        var name_regex = /^[a-zA-Z_-]+( [a-zA-Z_-]+)*$/;
        var email_reg = /^(?=[^@]*[A-Za-z])([a-zA-Z0-9])(([a-zA-Z0-9])*([\._-])?([a-zA-Z0-9]))*@(([a-zA-Z0-9\-])+(\.))+([a-zA-Z]{2,4})+$/i;

        if (admin_name === "") {
            $("#error_message_admin_name").html("Please enter name");
            $("#error_message_admin_contact").text("");
            $("#error_message_admin_email").text("");
            return false;
        } else if (admin_name.length < 3 || admin_name.length > 100) {
            $("#error_message_admin_name").html("Name must be between 2 and 100 characters");
            $("#error_message_admin_email").text("");
            $("#error_message_admin_contact").text("");
            return false;
        } else if (!admin_name.match(name_regex)) {
            $("#error_message_admin_name").html("Enter valid name");
            $("#error_message_admin_email").text("");
            $("#error_message_admin_contact").text("");
            return false;
        } else if (admin_contact === "") {
            $("#error_message_admin_contact").text("Please enter contact");
            $("#error_message_admin_email").text("");
            $("#error_message_admin_name").text("");
            return false;
        } else if (admin_contact.length != 10) {
            $("#error_message_admin_email").text("");
            $("#error_message_admin_contact").text("Please enter only 10 digits");
            $("#error_message_admin_name").text("");
            return false;
        } else if (admin_email === "") {
            $("#error_message_admin_email").text("Please enter email ID");
            $('#error_message_admin_name').text("");
            $("#error_message_admin_contact").text("");
            return false;
        } else if (!admin_email.match(email_reg)) {
            $("#error_message_admin_email").text("Please enter valid email ID");
            $('#error_message_admin_name').text("");
            $("#error_message_admin_contact").text("");
            return false;
        } else {
            $("#error_message_admin_email").text("");
            $("#error_message_admin_contact").text("");
            $("#error_message_admin_email").text("");

            $.ajax({
                url: "<?= ADMIN_PATH ?>/edit",
                type: "POST",
                dataType: "json",
                crossDomain: true,
                headers: {
                    Authorization: <?= "'" . $controller->session->get("jwtToken") . "'" ?>
                },
                data: JSON.stringify({
                    "admin_contact": admin_contact,
                    "admin_name": admin_name,
                    "admin_email": admin_email
                }),

                success: function(data) {
                    console.log(data);
                    if (data.success == true) {
                        window.location.href = "<?= ADMIN_PATH ?>"
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

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode != 46 && charCode > 31 &&
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
</script>
<?php include(INCLUDESPATH . '/close.php'); ?>