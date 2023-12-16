<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Edit Master Settings</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right float-right">
                                <li><a href="<?= MASTER_PATH ?>">project &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Edit Master Settings </a></li>
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
                                    <a href="<?= MASTER_PATH ?>" class="btn btn-outline-danger float-end">BACK</a>
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
                                        <input id="project_name" value="<?= $master['project_name'] ?>" class="form-control required" type="text" name="project_name" placeholder="Enter project Name">
                                        <span id="name_error_message" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Select Logo Image: </label>
                                        <div class="custom-file">
                                            <input name="project_image" type="file" class="custom-file-input" id="project_image">
                                            <label class="custom-file-label" for="customFile">Choose Logo Image</label>
                                        </div>
                                        <span id="image_error_message" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Address:</label>
                                        <input id="address" value="<?= $master['address'] ?>" class="form-control required" type="text" name="address" placeholder="Enter address">
                                        <span id="address_error_message" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <button onclick="return add()" class="btn btn-outline-danger float-right">Update</button>
                                    </div>
                                </table>
                            </div><!-- /# card -->
                        </div><!-- /# column -->
                    </div><!-- /# row -->
                </div><!-- /# main content -->
            </div><!-- /# container-fluid -->
        </div><!-- /# main -->
    </div>
</div><!-- /# content wrap -->

<script>
    function add() {
        var project_name = $("#project_name").val();
        var address = $("#address").val();
        var project_image = $('#project_image')[0].files[0];
        var image_error = document.getElementById("image_error_message")
        if (project_image) {
            var file_extension = project_image['name'].split('.').pop();
        }
        var project_name_regex = /^[a-zA-Z0-9_-]+( [a-zA-Z0-9_-]+)*$/;

        if (project_name === "") {
            $("#name_error_message").text("Project name should not be empty!!");
            $("#delay_place_order_error_message").text("");
            $("#order_booking_delay_error_message").text("");
            $("#delay_shipment_manufacturing_error_message").text("");
            $("#delay_courier_error_message").text("");
            $("#image_error_message").text("");


            return false;
        }  
        else if (project_name.length < 3 || project_name.length > 255) {
            $("#name_error_message").text("Enter project name between 2 to 255 characters!!");
            $("#delay_place_order_error_message").text("");
            $("#order_booking_delay_error_message").text("");
            $("#delay_shipment_manufacturing_error_message").text("");
            $("#delay_courier_error_message").text("");
            $("#image_error_message").text("");

            return false;
        }  
        // else
        // if (!(file_extension == "jpg" || file_extension == "png" || file_extension == "gif" || file_extension == "jpeg")) {
        //     image_error.textContent = "Please upload valid image";
        //     image_error.style.color = "red"
        //     return false;
        // } 
        else {
            var formData = new FormData();
            formData.append("id", <?= $master['id'] ?>);
            formData.append("project_name", project_name);
            formData.append("project_image", project_image);
            formData.append("address", address);
            $.ajax({
                url: "<?= MASTER_PATH ?>/editProject",
                enctype: "multipart/form-data",
                type: "POST",
                crossDomain: true,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                headers: ({
                    Authorization: "<?= $controller->session->get("jwtToken") ?>"
                }),
                success: function(data) {

                    if (data.success == true) {
                        window.location.href = "<?= MASTER_PATH ?>";
                    } else {
                        window.location.reload();
                    }
                },
                error: function(data) {
                    console.log(JSON.stringify(data));
                }
            })
        }
    }
</script>
<?php include(INCLUDESPATH . '/footer.php'); ?>