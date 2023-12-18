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
                                            <select id="hotel_name" class="form-control required" name="hotel_name"
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
                                            <select id="hotel_block" class="form-control required" name="hotel_block"
                                                data-none-selected-text="Non Selected">
                                                
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
                                            <select id="hotel_block" class="form-control required" name="hotel_block"
                                                data-none-selected-text="Non Selected">
                                                <option value="">Non Selected</option>
                                            </select>
                                            <span id="hotel_block_error_message" style="color:red"></span>
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

$('#hotel_name').on('change', function () {
        
        var hotel_name =  $("#hotel_name").val();
        // alert(hotel_name);
        $.ajax({
            url: " <?= ROOM_PATH ?>/blockdata",
            dataType: "JSON",
            method: "POST",
            data: { hotel_name:hotel_name },
            beforeSend: function () {
                $('.searchh2').css('display', 'block');
                $('.searchh2').css('color', 'blue');
            },
            complete: function () {
                $('.searchh2').css('display', 'none');
            },
            success: function (data) {
                $("#hotel_block").find('option').remove();
                $("#hotel_block").selectpicker("refresh");
                var html = "";
                for (var i = 0; i < data.length; i++) {
                    html += '<option value="' + data[i].hostel_id + '">' + data[i].block_name + '</option>';
                }
				 $('#hotel_block').append(html);
                $('.selectpicker').selectpicker('refresh');

            }

        });

    })

</script>



<?php include(INCLUDESPATH . '/footer.php'); ?>