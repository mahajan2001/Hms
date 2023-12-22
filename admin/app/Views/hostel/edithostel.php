<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Edit Hostel Details</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right float-right">
                                <li><a href="<?= HOSTEL_PATH ?>">Edit Hostel Details &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Edit Hostel Details </a></li>
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
                                <!-- //<a href="<?= USER_PATH ?>" class="btn btn-outline-danger float-end">BACK</a> -->
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
                               
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Hostel Name</label>
                                            <input id="hostel_name" class="form-control required" type="text" name="hostel_name"
                                                placeholder="Enter Hostel Name">
                                            <span id="hostel_name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Total Available Beds</label>
                                            <input id="available_beds" class="form-control required" type="text" name="available_beds"
                                                placeholder="Enter Toatl Available Beds ">
                                            <span id="available_beds_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Total Room</label>
                                            <input id="total_room" class="form-control required" type="text" name="total_room"
                                                placeholder="Enter Total Room">
                                            <span id="total_room_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                           <div class="form-group">
                                <button  id="submitButton"   onclick="return edit()"
                                    class="btn btn-outline-primary float-right">UPDATE</button>
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

   
    function edit() {
        var id = <?php echo $hostel['id']; ?>;
        var hostel_name = $("#hostel_name").val();
        var available_beds = $("#available_beds").val();
        var total_room = $("#total_room").val();
       
        $.ajax({
            url: " <?= HOSTEL_PATH ?>/edithostel",
            type: "POST",
            datatype: "json",
            crossDomain: true,
            data: JSON.stringify({
                "id":id,
                "hostel_name": hostel_name,
                "available_beds": available_beds,
                "total_room": total_room,
               
            }),
            success: function (data) {
                if (data.success == true) {
                    window.location.href = "<?= HOSTEL_PATH ?>"
                } else {
                    window.location.reload();
                }
            },
            error: function (data) {
            }
        })
    }
</script>



<?php include(INCLUDESPATH . '/footer.php'); ?>