<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Add vendors</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right float-right">
                                <li><a href="<?= VENDOR_PATH ?>">vendors &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Add Vendors</a></li>
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
                                <a href="<?= VENDOR_PATH ?>" class="btn btn-outline-danger float-end">BACK</a>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Name:</label>
                                            <input id="name" class="form-control required" type="text" name="name"
                                                placeholder="Enter Vendor Name">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class=" form-group">
                                            <label> Email ID:</label>
                                            <input id="email" class="form-control required" type="text" name="email"
                                                placeholder="Enter VENDOR Email ID">
                                            <span id="email_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact No:</label>
                                            <input id="contact" class="form-control required" type="text" name="contact"
                                                placeholder="Enter Contact Number">
                                            <span id="contact_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label>Business:</label>
                                            <input id="business" class="form-control required" type="text" name="business"
                                                placeholder="Enter Business">
                                            <span id="contact_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>GST NO:</label>
                                            <input id="gst" class="form-control required" type="text" name="gst"
                                                placeholder="Enter GST Number">
                                            <span id="contact_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address:</label>
                                            <input id="address" class="form-control required" type="text" name="address"
                                                placeholder="Enter address">
                                            <span id="contact_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>State:</label>
                                            <input id="state" class="form-control required" type="text" name="state"
                                                placeholder="Enter state">
                                            <span id="rank_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Pincode:</label>
                                        <input id="pincode" class="form-control required" type="text" name="pincode"
                                            placeholder="Enter pincode">
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>IC No:</label>
                                            <input id="ic_no" class="form-control required" type="text" name="ic_no"
                                                placeholder="Enter IC No">
                                            <span id="ic_no_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="sub_course_div" class="form-group" style="display:none;">
                                            <label>Sub Course:</label>
                                            <select name="sub_course" id="sub_course" class="form-control required">
                                            </select>
                                            <span id="course_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div> -->
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

    $('#course').on('change', function () {
        var id = $(this).val();
        var html1 = '<option value="0">Select Sub Course</option><option value="Army">Army</option><option value="Air Force">Air Force</option><option value="Non Tech branch">Non Tech branch</option>';
        var html2 = '<option value="0">Select Sub Course</option><option value="Air Force">Air Force</option><option value="Ground Duty Tech">Ground Duty Tech</option><option value="Navel Cadet">Navel Cadet</option>';
        if (id == 'B.Sc(Computer)') {
            $('#sub_course').html();
            $('#sub_course_div').css('display', 'block');
            $('#sub_course').html(html1);
        } else if (id == 'B.Tech') {
            $('#sub_course').html();
            $('#sub_course_div').css('display', 'block');
            $('#sub_course').html(html2);
        } else {
            var html3 = '<option value="0">Select Sub Course</option>';
            $('#sub_course').html(html3);
            $('#sub_course_div').css('display', 'none');
        }
    });

    $(".toggle-password").click(function () {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    function add() {
        var name = $("#name").val();
        var email = $("#email").val();
        var contact = $("#contact").val();
        var business = $("#business").val();
        var gst = $("#gst").val();
        var address = $("#address").val();
        var state = $("#state").val();
        var pincode = $("#pincode").val();
        // var messing = $("#messing").val();
        // var ic_no = $("#ic_no").val();
        // if(sub_course == 0){
        //     sub_course = 'NA';
        // }
        $.ajax({
            url: " <?= VENDOR_PATH ?>/addvendors",
            type: "POST",
            datatype: "json",
            crossDomain: true,
            data: JSON.stringify({
                "name": name,
                "email": email,
                "contact": contact,
                "business": business,
                "gst": gst,
                "address": address,
                "state": state,
                "pincode": pincode,
            }),
            success: function (data) {
                if (data.success == true) {
                    window.location.href = "<?= VENDOR_PATH ?>"
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