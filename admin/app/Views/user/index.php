<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Students</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb float-right">
                                <li><a href="<?= DASHBOARD_PATH ?>">Dashboard &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Students</a></li>
                                <!--	<li class="active">Data Table</li>-->
                            </ol>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
            <div class="main-content">
                <?php if (isset($success_message) && $success_message != '') {  ?>

                    <div class="alert alert-info alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong>
                        <?php echo isset($success_message) ? $success_message : $this->session->flashdata('invalid'); ?>
                    </div>

                <?php  } ?>

                <?php if (isset($error_message) && $error_message != '') {  ?>

                    <div class="alert alert-info alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error!</strong>
                        <?php echo isset($error_message) ? $error_message : $this->session->flashdata('invalid'); ?>
                    </div>

                <?php } ?>

                <!-- Write Content here -->
                <div class="row">



                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header">
                                <h4>All Students</h4>
                                <a type="submit" class="btn btn-outline-danger btn-flat btn-sm float-right" href="<?= USER_PATH ?>/registration">Add Student</a>
                            </div>
                            <div class="card-body">
                                <span id="error_msg" style="color:red"></span>
                                <table id="example" class="table table-striped table-bordered table-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Student Id</th>
                                            <th>Name</th>
                                            <th>Email ID</th>
                                            <th>Phone Number</th>
                                            <th>Aadhar Number</th>
                                            <th>Course</th>
                                            <th>Department Name</th>
                                            <th>Room Allocated</th>
                                            <th>Action</th>
                                            <th>Allocate Room</th>
                                            <th>Update</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($students)) {
                                            $html = '';
                                            foreach ($students as $row) { ?>
                                                <tr>
                                                    <td><?= $row['id'] ?></td>
                                                    <td><?= $row['student_id'] ?></td>
                                                    <td><?= $row['name'] ?></td>
                                                    <td><?= $row['gmail'] ?></td>
                                                    <td><?= $row['mobile_no'] ?></td>
                                                    <td>XXXX XXXX <?= substr($row['aadhar_no'], 8)  ?></td>
                                                    <td><?= $row['course_type'] ?></td>
                                                    <td><?= $row['diat_dep_name'] ?></td>
                                                    <td>
                                                        <?php if($row['is_allocated'] == 1) { ?>
                                                            Yes
                                                        <?php } else { ?>
                                                            No
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <label class="switch">
                                                                <input type="checkbox" class="status_change ct_switch" data-id="<?= $row['id'] ?>" value="<?= $row['status'] ?>" <?= $row['status'] == 1 ? "checked" : "" ?>>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div> 
                                                    </td>
                                                    <td>&nbsp;&nbsp;<a class="fa-solid fa-pen-to-square text-blue" onclick="openModal(<?= $row["id"]; ?>)" href="#" title="Allocate Room!"></a>
                                                    </td>
                                                    <td>&nbsp;&nbsp;<a class="fa-solid fa-pen-to-square text-blue" data-toggle="tooltip" title="Edit User!" href="<?= USER_PATH ?>/edit/<?= $row["id"]; ?>"></a>
                                                    </td>
                                                    <td>&nbsp;&nbsp;<a class="fa-solid fa-eye text-green" data-toggle="tooltip" title="View User!" href="<?= USER_PATH ?>/view/<?= $row["id"]; ?>"></a></td>

                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>

                        </div><!-- card -->
                    </div>

                </div><!-- /# card container -->
                <!-- /# column -->
            <div class="modal fade" id="hostelAllocationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="height: 400px;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Allocate Room</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Select Hostel</label>
                                        <select id="hostel" class="form-control required" name="hostel" placeholder="Select Hostel">
                                            <option value="">Select Hostel</option>
                                            <?php foreach($hostels as $h) { ?>
                                                <option value="<?php echo $h['id'] ?>"><?php echo $h['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" id="block_div" style="display:none;">
                                    <div class="form-group">
                                        <label>Select Block</label>
                                        <select id="block" class="form-control required" name="block" placeholder="Select Block">
                                            <option value="">Select Block</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" >
                                    <div class="form-group">
                                        <label>Select Room</label>
                                        <select id="room" class="form-control required" name="room" placeholder="Select Room">
                                            <option value="">Select Room</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" >
                                    <div class="form-group">
                                        <label>Select Bed No</label>
                                        <select id="bed" class="form-control required" name="bed" placeholder="Select Bed">
                                            <option value="">Select Bed No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="allocate_room()">Save changes</button>
                            <input hidden value="" id="user_id">
                        </div>
                    </div>
                </div>
            </div>
            </div><!-- /# main content -->
        </div><!-- /# container-fluid -->
    </div><!-- /# main -->
</div><!-- /# content wrap -->

<?php include(INCLUDESPATH . '/footer.php'); ?>
<script type="text/javascript">

    function openModal(id){
        $('#user_id').val(id);
        $('#hostelAllocationModal').modal('show');
    }
    
    $('#hostel').on('change', function(){
        var hostel_id = $(this).val();
        if(hostel_id == 1){
            $('#block_div').css('display', 'block');
        }else{
            $('#block_div').css('display', 'none');
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?= USER_PATH ?>/fetch_rooms",
                data: JSON.stringify({
                    'hostel_id': hostel_id,
                }),
                success: function(data) {
                    var html = '<option value="">Select Room</option>';
                    $.each(data, function(i, item){
                        
                        html += '<option value="'+ item.id +'">'+ item.room_no +'</option>';
                    });
                    $('#room').html(html);
                },
                error: function(data) {
                    console.log("error is" + JSON.stringify(data));
                }
            });
        }
    });
    
    $('#block').on('change', function(){
        var block_id = $(this).val();
        var hostel_id = $('#hostel').val();
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "<?= USER_PATH ?>/fetch_rooms_block_wise",
            data: JSON.stringify({
                'block': block_id,
                'hostel_id': hostel_id
            }),
            success: function(data) {
                var html = '<option value="">Select Room</option>';
                $.each(data, function(i, item){
                    
                    html += '<option value="'+ item.id +'">'+ item.room_no +'</option>';
                });
                $('#room').html(html);
            },
            error: function(data) {
                console.log("error is" + JSON.stringify(data));
            }
        });
    });
    
    $('#room').on('change', function(){
        var room_id = $(this).val();
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "<?= USER_PATH ?>/fetch_beds",
            data: JSON.stringify({
                'room_id': room_id
            }),
            success: function(data) {
                var html = '<option value="">Select Bed No</option>';
                $.each(data, function(i, item){
                    html += '<option value="'+ item.id +'">'+ item.bed_no +'</option>';
                });
                $('#bed').html(html);
            },
            error: function(data) {
                console.log("error is" + JSON.stringify(data));
            }
        });
    });
    
    function allocate_room(){
        var bed_id = $('#bed').val();
        var user_id = $('#user_id').val();
        var hostel_id = $('#hostel').val();
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "<?= USER_PATH ?>/allocate_room",
            data: JSON.stringify({
                'bed_id': bed_id,
                'user_id': user_id,
                'hostel_id': hostel_id,
            }),
            success: function(data) {
                $('#hostelAllocationModal').modal('hide');
                alert('Room allocated successfully');
            },
            error: function(data) {
                console.log("error is" + JSON.stringify(data));
            }
        });
    }
    

     $(document).on('change', '.status_change ', function() {
        if ($(this).is(":checked")) {
            var visibility = '1';
        } else {
            var visibility = '0';
        }
        var id = $(this).attr('data-id');
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "<?= USER_PATH ?>/change_visibility",
            data: JSON.stringify({
                'id': id,
                'status': visibility
            }),
            success: function(data) {
                if(data.payload.check_flag == 1){
                    alert("Login credentials sent to student's mail");
                } 
            },
            error: function(data) {
                console.log("error is" + JSON.stringify(data));
            }
        });
    });
</script>