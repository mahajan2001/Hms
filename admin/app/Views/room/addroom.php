<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Add Room</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right float-right">
                                <li><a href="<?= ROOM_PATH ?>">Add Room &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Add Room</a></li>
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
                                <h1>ADD ROOM</h1>
                                <br>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Hostel Name</label>
                                            <select id="hostel_name" class="form-control required" name="hostel_name"
                                                data-none-selected-text="Non Selected">
                                                <option value="">Non Selected</option>

                                                <?php
                                                foreach ($room as $key => $value) {
                                                    ?>
                                                    <option value="<?php echo $value['id']; ?>">
                                                        <?php echo $value['name']; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <span id="hostel_name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Hostel Block</label>
                                            <select id="hostel_block" class="form-control required" name="hostel_block"
                                                data-none-selected-text="Non Selected">
                                                <option value="">Non Selected</option>
                                            </select>
                                            <span id="hotel_block_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>Hostel Floor</label>
                                            <select id="hostel_floor" class="form-control required" name="hostel_floor"
                                                data-none-selected-text="Non Selected">
                                                <option value="">Non Selected</option>
                                                <option value="">1St Floor</option>
                                                <option value="">2St Floor</option>
                                                <option value="">3St Floor</option>
                                                <option value="">4St Floor</option>
                                                <option value="">Ground</option>
                                            </select>
                                            <span id="hostel_floor_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <small class="req text-danger">* </small>
                                            <label>No of Bed</label>
                                            <select id="no_of_bed" class="form-control required" name="no_of_bed"
                                                data-none-selected-text="Non Selected">
                                                <option value="">Non Selected</option>
                                            </select>
                                            <span id="no_of_bed_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <button id="submitButton" onclick="return adddata()"
                                    class="btn btn-outline-primary float-right">SAVE</button>
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

    $('#hostel_name').on('change', function () {
        
        var hostel_name =  $("#hostel_name").val();
      // alert(hostel_name);
        $.ajax({
            url: " <?= ROOM_PATH ?>/blockdata",
            dataType: "JSON",
            method: "POST",
            data: { hostel_name:hostel_name },
            beforeSend: function () {
                $('.searchh2').css('display', 'block');
                $('.searchh2').css('color', 'blue');
            },
            complete: function () {
                $('.searchh2').css('display', 'none');
            },
            success: function (data) {
				 $('#hostel_block').html('');
                var html = "<option value=''>Non Selected</option>";
                for (var i = 0; i < data.length; i++) {
                    html += '<option value="' + data[i].id + '">' + data[i].block_name+ '</option>';
                }
				 $('#hostel_block').append(html);
            }

        });

    })
   
/*
    function adddata() {
        var hostel_name = $("#hostel_name").val();
        var hostel_block = $("#hostel_block").val();
        var hostel_floor = $("#hostel_floor").val();
        var no_of_bed = $("#no_of_bed").val();
        
        $.ajax({
            url: " <?= ROOM_PATH ?>/addroom ",
            type: "POST",
            datatype: "json",
            crossDomain: true,
            data: JSON.stringify({
                "hostel_name": hostel_name,
                "hostel_block": hostel_block,
                "hostel_floor":hostel_floor,
                "no_of_bed": no_of_bed,
                

            }),
            success: function (data) {
                if (data.success == true) {
                    window.location.href = "<?= ROOM_PATH ?>"
                } else {
                    window.location.reload();
                }
            },
            error: function (data) {
            }
        })
    }

*/
</script>



<?php include(INCLUDESPATH . '/footer.php'); ?>