<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Add Invoice</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right float-right">
                                <li><a href="<?= INVOICE_PATH ?>">All Invoices &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Add Invoice</a></li>
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
                                <a href="<?= INVOICE_PATH ?>" class="btn btn-outline-danger float-end">BACK</a>
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>IC Code:</label>
                                            <select name="iccode" id="iccode" class="form-control required" >
                                                <option value="0">SELECT IC Code</option>
                                                <?php foreach($invoices as $o){ ?>
                                                    <option value="<?php echo $o['id'] ?>"><?php echo $o['ic_code'] ?> - <?php echo $o['messing_type'] ?></option>
                                                <?php }?>
                                            </select>   
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Name:</label>
                                            <input id="name" class="form-control required" type="text" name="name"
                                                placeholder="Enter Officer Name" readonly>
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class=" form-group">
                                            <label>Month:</label>
                                            <input id="month" class="form-control required" type="text" name="month"
                                                placeholder="Enter month" readonly>
                                            <span id="email_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Select Messing:</label>
                                            <input id="messing" class="form-control required" type="text" name="messing"
                                                placeholder="Enter messing type" readonly>
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Rank:</label>
                                            <input id="rank" class="form-control required" type="text" name="rank"
                                                placeholder="Enter rank" readonly>
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class=" form-group">
                                            <label>Course:</label>
                                            <input id="course" class="form-control required" type="text" name="course"
                                                placeholder="Enter course" readonly>
                                            <span id="email_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                                <div class="form-group">
                                    <button onclick="return addinvoice()" class="btn btn-outline-primary float-right">GENERATE INVOICE</button>
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


    $('#iccode').on('change', function () {
        var id = $(this).val();
        $.ajax({
            url: " <?= INVOICE_PATH ?>/fetchInvoiceDetails",
            type: "POST",
            dataType: "json",
            data: JSON.stringify({
                "id": id,
            }),
            success: function (data) {
                $('#name').val(data[0].name);
                $('#month').val(data[0].bill_of_month);
                $('#course').val(data[0].course);
                if(data[0].type == "1"){
                    $('#messing').val("Living In");
                }else{
                    $('#messing').val("Living Out");
                }
                $('#rank').val(data[0].rank);
            },
            error: function (data) {
            }
        })
    }); 

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

    function addinvoice() {
        var iccode = $("#iccode").val();
        var name = $("#name").val();
        var month = $("#month").val();
        var messing = $("#messing").val();
        var rank = $("#rank").val();
        var course = $("#course").val();
        $.ajax({
            url: " <?= INVOICE_PATH ?>/addinvoice",
            type: "POST",
            dataType: "json",
            crossDomain: true,
            data: JSON.stringify({
                "iccode": iccode,
                "name": name,
                "messing": messing,
                "month": month,
                "rank": rank,
                "course": course,
            }),
            success: function (data) {
                if (data.success == true) {
                    window.location.href = "<?= INVOICE_PATH ?>"
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