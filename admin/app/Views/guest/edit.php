<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Edit Guest</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right float-right">
                                <li><a href="<?= OFFICER_PATH ?>/fetchGuests">Guests &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Edit Guest</a></li>
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
                                <a href="<?= OFFICER_PATH ?>/fetchGuests"
                                    class="btn btn-outline-danger float-end">BACK</a>
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
                                            <label>Guest Name:</label>
                                            <input id="name" class="form-control required" type="text" name="name"
                                                placeholder="Enter Guest Name" value="<?php echo $guest['name']; ?>">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class=" form-group">
                                            <label>Guest Email ID:</label>
                                            <input id="email" class="form-control required" type="text" name="email"
                                                placeholder="Enter Guest Email ID"
                                                value="<?php echo $guest['email']; ?>">
                                            <span id="email_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact:</label>
                                            <input id="contact" class="form-control required" type="text" name="contact"
                                                placeholder="Enter Contact Number"
                                                value="<?php echo $guest['contact']; ?>">
                                            <span id="contact_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Messing:</label>
                                            <select name="messing" id="messing" class="form-control required">
                                                <option value="0">Select Messing Type</option>
                                                <option value="Living In">Living In</option>
                                                <option value="Living Out">Living Out</option>
                                                <option value="Temporary Duty">Temporary Duty</option>
                                            </select>
                                            <span id="messing_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Member Type:</label>
                                            <select name="member_type" id="member_type" class="form-control required">
                                                <option value="0">Select Member Type</option>
                                                <option value="Staff">Staff</option>
                                                <option value="Course">Course</option>
                                            </select>
                                            <span id="member_type_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Rank:</label>
                                            <select name="rank" id="rank" class="form-control required">
                                                <option value="0">Select Rank</option>
                                                <option value="Lieutenant">Lieutenant</option>
                                                <option value="Captain">Captain</option>
                                                <option value="Major">Major</option>
                                                <option value="Lieutenant Colonel">Lieutenant Colonel</option>
                                                <option value="Brigadier">Brigadier</option>
                                                <option value="Major General">Major General</option>
                                                <option value="Lt. General HAG Scale">Lt. General HAG Scale</option>
                                                <option value="HAG+ Scale">HAG+ Scale</option>
                                                <option value="VCOAS/Army Cdr/Lt Gen">VCOAS/Army Cdr/Lt Gen</option>
                                                <option value="COAS">COAS</option>
                                                <option value="Student">Student</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <span id="rank_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Faculty:</label>
                                            <select name="faculty" id="faculty" class="form-control required">
                                                <option value="0">Select Faculty</option>
                                                <option value="Army">Army</option>
                                                <option value="Navy">Navy</option>
                                                <option value="Air Force">Air Force</option>
                                                <option value="Coast Guard">Coast Guard</option>
                                                <option value="Civilian">Civilian</option>
                                            </select>
                                            <span id="rank_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Course:</label>
                                            <select name="course" id="course" class="form-control required">
                                                <option value="0">Select Course</option>
                                                <option value="BA">BA</option>
                                                <option value="B.Sc">B.Sc</option>
                                                <option value="B.Sc(Computer)">B.Sc(Computer)</option>
                                                <option value="B.Tech">B.Tech</option>
                                            </select>
                                            <span id="course_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>IC No:</label>
                                            <input id="ic_no" class="form-control required" type="text" name="ic_no"
                                                placeholder="Enter IC No" value="<?php echo $guest['ic_no']; ?>">
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
                                </div>
                            </div>
                            <div class="form-group">
                                <button onclick="return edit()"
                                    class="btn btn-outline-primary float-right">Update</button>
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

    $(document).ready(function () {
        var messing = document.getElementById("messing");
        messing.value = "<?php echo $officer['messing']; ?>";
        var member_type = document.getElementById("member_type");
        member_type.value = "<?php echo $officer['member_type']; ?>";
        var rank = document.getElementById("rank");
        rank.value = "<?php echo $officer['rank']; ?>";
        var faculty = document.getElementById("faculty");
        faculty.value = "<?php echo $officer['faculty']; ?>";
        var course = document.getElementById("course");
        course.value = "<?php echo $officer['course']; ?>";
        var sub_course = "<?php echo $officer['sub_course']; ?>";
        var course = "<?php echo $officer['course']; ?>";
        if (sub_course != 'NA') {
            $('#sub_course_div').css('display', 'block');
            if (course == 'B.Sc(Computer)') {
                var html = '<option value="0">Select Sub Course</option><option value="Army">Army</option><option value="Air Force">Air Force</option><option value="Non Tech branch">Non Tech branch</option>';
                $('#sub_course').html(html);
            } else if (course == 'B.Tech') {
                var html = '<option value="0">Select Sub Course</option><option value="Air Force">Air Force</option><option value="Ground Duty Tech">Ground Duty Tech</option><option value="Navel Cadet">Navel Cadet</option>';
                $('#sub_course').html(html);
            }
            var course = document.getElementById("sub_course");
            course.value = "<?php echo $officer['sub_course']; ?>";
        }
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

    function edit() {
        var id = <?php echo $guest['id']; ?>;
        var name = $("#name").val();
        var email = $("#email").val();
        var sub_course = $("#sub_course").val();
        var course = $("#course").val();
        var faculty = $("#faculty").val();
        var rank = $("#rank").val();
        var member_type = $("#member_type").val();
        var messing = $("#messing").val();
        var contact = $("#contact").val();
        var ic_no = $("#ic_no").val();
        if (sub_course == 0) {
            sub_course = 'NA';
        }
        $.ajax({
            url: " <?= OFFICER_PATH ?>/editGuest",
            type: "POST",
            datatype: "json",
            crossDomain: true,
            data: JSON.stringify({
                "id": id,
                "name": name,
                "email": email,
                "sub_course": sub_course,
                "course": course,
                "faculty": faculty,
                "rank": rank,
                "member_type": member_type,
                "messing": messing,
                "contact": contact,
                "ic_no": ic_no,
            }),
            success: function (data) {
                if (data.success == true) {
                    window.location.href = "<?= OFFICER_PATH ?>/fetchGuests"
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