<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Edit Sub Admin</h1>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right float-right">
                                <li><a href="<?= SUBADMIN_PATH ?>">Sub Admins &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Edit Sub Admin</a></li>
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
                                        <input id="subadmin_name" class="form-control required" value="<?= $subadmin['member_name'] ?>" type="text" name="subadmin_name" placeholder="Enter Subadmin Name">
                                        <span id="name_error_message" style="color:red"></span>
                                    </div>

                                    <div class="form-group">
                                        <label>Contact:</label>
                                        <input id="subadmin_contact" class="form-control required" value="<?= $subadmin['member_contact'] ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" type="text" name="subadmin_contact" placeholder="Enter Contact Number">
                                        <span id="contact_error_message" style="color:red"></span>
                                    </div>
                                    <div class=" form-group">
                                        <label>Email:</label>
                                        <input id="subadmin_email" class="form-control required" value="<?= $subadmin['member_email'] ?>" type="text" name="subadmin_email" placeholder="Enter Email Address">
                                        <span id="email_error_message" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Address:</label>
                                        <textarea id="subadmin_address" class="form-control required" type="text" name="subadmin_address" placeholder="Enter address"><?= $subadmin['member_address'] ?></textarea>
                                        <span id="address_error_message" style="color:red"></span>
                                    </div>

                            </div>
                            <div class="form-group">
                                <button onclick="return edit()" class="btn btn-outline-primary float-right">Update</button>
                            </div>
                            </table>
                        </div>
                    </div><!-- /# column -->
                </div><!-- /# row -->
            </div><!-- /# main content -->
        </div><!-- /# container-fluid -->
    </div><!-- /# main -->
</div><!-- /# content wrap -->
<script>
    function edit() {
        var name = $("#subadmin_name").val();
        var email = $("#subadmin_email").val();
        var phone = $("#subadmin_contact").val();
        var address = $("#subadmin_address").val();
        var name_regex = /^[a-zA-Z_-]+( [a-zA-Z_-]+)*$/;
        var email_regex = /^(?=[^@]*[A-Za-z])([a-zA-Z0-9])(([a-zA-Z0-9])*([\._-])?([a-zA-Z0-9]))*@(([a-zA-Z0-9\-])+(\.))+([a-zA-Z]{2,4})+$/i;;
        var address_regex = /^(?=.*[0-9a-zA-z])(?=.*[a-zA-Z])([a-zA-Z0-9-\/, ]().+)$/;
        if (name === "") {
            $("#name_error_message").text("Name should not be empty!!");
            $("#email_error_message").text("");
            $("#contact_error_message").text("");
            $("#address_error_message").text("");
            return false;

        } else if (!name_regex.test(name)) {
            $("#name_error_message").text("Name should be in characters!!");
            $("#contact_error_message").text("");
            $("#email_error_message").text("");
            $("#address_error_message").text("");
            return false;
        } else if (name.length < 3 || name.length > 40) {
            $("#name_error_message").text("Name should be between 3 to 40 characters!!");
            $("#contact_error_message").text("");
            $("#email_error_message").text("");
            $("#address_error_message").text("");
            return false;
        } else if (email === "") {
            $("#email_error_message").text("Email should not be empty!!");
            $("#contact_error_message").text("");
            $("#name_error_message").text("");
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
        } else if (phone === "") {
            $("#contact_error_message").text("Contact Number Should Not be Empty!!");
            $("#name_error_message").text("");
            $("#email_error_message").text("");
            $("#address_error_message").text("");
            return false;
        }
        if (phone.length != 10) {
            $("#name_error_message").text("");
            $("#contact_error_message").text("Contact Number should be 10 digits!!");
            $("#email_error_message").text("");
            $("#address_error_message").text("");
            return false;
        } else if (address === "") {
            $("#contact_error_message").text("");
            $("#name_error_message").text("");
            $("#email_error_message").text("");
            $("#address_error_message").text("Address should not be empty!!");
            return false;
        } else if (!address_regex.test(address)) {
            $("#name_error_message").text("");
            $("#contact_error_message").text("");
            $("#email_error_message").text("");
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
        } else {
            $("#contact_error_message").text("");
            $("#name_error_message").text("");
            $("#email_error_message").text("");
            $("#address_error_message").text("")
            $.ajax({
                url: "<?= SUBADMIN_PATH ?>/editSubadmin",
                type: "POST",
                datatype: "json",
                crossDomain: true,
                data: JSON.stringify({
                    "id": "<?= $subadmin["id"]; ?> ",
                    "subadmin_name": name,
                    "subadmin_email": email,
                    "subadmin_contact": phone,
                    "subadmin_address": address,
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
                    console.log("error is " + JSON.stringify(data));
                }

            })
        }
    }
</script>
<?php include(INCLUDESPATH . '/footer.php');
include(INCLUDESPATH . '/close.php'); ?>