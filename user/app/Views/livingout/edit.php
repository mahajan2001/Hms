<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Edit Living Out</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right float-right">
                                <li><a href="<?= LIVINGOUT_PATH ?>">Monthly Bill &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Edit Living Out</a></li>
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
                                <a href="<?= LIVINGOUT_PATH ?>" class="btn btn-outline-danger float-end">BACK</a>
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
                                            <label>COURSE:</label>
                                            <input value="<?php echo $livingoutdetails['course']; ?>" id="course"
                                                class="form-control required" type="text" name="course"
                                                placeholder="Enter course Name" readonly>
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class=" form-group">
                                            <label>IC CODE:</label>
                                            <input value="<?php echo $livingoutdetails['ic_code']; ?>" id="iccode"
                                                class="form-control required" type="text" name="iccode"
                                                placeholder="Enter ic code" value="<?php echo $ic_no; ?>" readonly>
                                            <span id="email_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>RANK:</label>
                                            <input value="<?php echo $livingoutdetails['rank']; ?>" id="rank"
                                                class="form-control required" type="text" name="rank"
                                                placeholder="Enter Rank" readonly>
                                            <span id="contact_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bill Of Month:</label>
                                            <select name="billofmonth" id="billofmonth" class="form-control required">
                                                <option value="JANUARY">JANUARY</option>
                                                <option value="FEBRUARY">FEBRUARY</option>
                                                <option value="MARCH">MARCH</option>
                                                <option value="APRIL">APRIL</option>
                                                <option value="MAY">MAY</option>
                                                <option value="JUNE">JUNE</option>
                                                <option value="JULY">JULY</option>
                                                <option value="AUGUST">AUGUST</option>
                                                <option value="SEPTEMBER">SEPTEMBER</option>
                                                <option value="OCTOBER">OCTOBER</option>
                                                <option value="NOVEMBER">NOVEMBER</option>
                                                <option value="DECEMBER">DECEMBER</option>
                                            </select>
                                            <span id="contact_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>NAME:</label>
                                            <select name="name" id="name" class="form-control required">
                                                <option value="0">SELECT OFFICER</option>
                                                <?php foreach ($officers as $o) { ?>
                                                    <?php if ($o['id'] == $livingoutdetails['member_id']) { ?>
                                                        <option selected value="<?php echo $o['id'] ?>">
                                                            <?php echo $o['name'] ?>
                                                        </option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $o['id'] ?>">
                                                            <?php echo $o['name'] ?>
                                                        </option>
                                                    <?php } ?>

                                                <?php } ?>
                                            </select>
                                            <span id="contact_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>DATE:</label>
                                            <input value="<?php echo $livingoutdetails['date']; ?>" id="date"
                                                class="form-control required" type="date" name="date"
                                                placeholder="Enter date">
                                            <span id="contact_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>

                                </table>
                            </div><!-- /# card -->
                        </div><!-- /# column -->
                    </div><!-- /# row -->
                </div><!-- /# main content -->
            </div><!-- /# container-fluid -->


            <div class="main-content">
                <!-- Write Content here -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card alert">

                            <div class="bootstrap-data-table-panel">

                                <br>
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
                                            <label>MESS SUBSCRIPTION:</label>
                                            <input value="<?php echo $livingoutdetails['mess_subscription']; ?>"
                                                id="messsubscription" class="form-control required" type="text"
                                                name="messsubscription" placeholder="Enter mess subscription">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class=" form-group">
                                            <label>SPORTS:</label>
                                            <input value="<?php echo $livingoutdetails['sports']; ?>" id="sports"
                                                class="form-control required" type="text" name="sports"
                                                placeholder="Enter sports">
                                            <span id="email_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class=" form-group">
                                            <label>BAR:</label>
                                            <input value="<?php echo $livingoutdetails['bar']; ?>" id="bar"
                                                class="form-control required" type="text" name="bar"
                                                placeholder="Enter bar">
                                            <span id="email_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>MESS MAINTENANCE:</label>
                                            <input value="<?php echo $livingoutdetails['mess_maintainance']; ?>"
                                                id="messmaintainance" class="form-control required" type="text"
                                                name="messmaintainance" placeholder="Enter mess maintenance">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>OFFICERS INSTITUTE:</label>
                                            <input value="<?php echo $livingoutdetails['officers_institute']; ?>"
                                                id="officersinstitute" class="form-control required" type="text"
                                                name="officersinstitute" placeholder="Enter officers institute">
                                            <span id="contact_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class=" form-group">
                                            <label>PARTY BAR:</label>
                                            <input value="<?php echo $livingoutdetails['party_bar']; ?>" id="partybar"
                                                class="form-control required" type="text" name="partybar"
                                                placeholder="Enter party bar">
                                            <span id="email_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>MESS SERVICE:</label>
                                            <input value="<?php echo $livingoutdetails['mess_service']; ?>"
                                                id="messservice" class="form-control required" type="text"
                                                name="messservice" placeholder="Enter mess mess service">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>LADIES CLUB:</label>
                                            <input value="<?php echo $livingoutdetails['ladies_club']; ?>"
                                                id="ladiesclub" class="form-control required" type="text"
                                                name="ladiesclub" placeholder="Enter ladies club">
                                            <span id="contact_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class=" form-group">
                                            <label>ROOM BEARER:</label>
                                            <input value="<?php echo $livingoutdetails['room_bearer']; ?>"
                                                id="roombearer" class="form-control required" type="text"
                                                name="roombearer" placeholder="Enter room bearer">
                                            <span id="email_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>DAILY MESSING:</label>
                                            <input value="<?php echo $livingoutdetails['daily_messing']; ?>"
                                                id="dailymessing" class="form-control required" type="text"
                                                name="dailymessing" placeholder="Enter daily messing">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>OFFICERS CAFETERIA:</label>
                                            <input value="<?php echo $livingoutdetails['officers_cafeteria']; ?>"
                                                id="officerscafeteria" class="form-control required" type="text"
                                                name="officerscafeteria" placeholder="Enter officers cafeteria">
                                            <span id="contact_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class=" form-group">
                                            <label>LINEN:</label>
                                            <input value="<?php echo $livingoutdetails['linen']; ?>" id="linen"
                                                class="form-control required" type="text" name="linen"
                                                placeholder="Enter linen">
                                            <span id="email_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>EXTRA MESSING:</label>
                                            <input value="<?php echo $livingoutdetails['extra_messing']; ?>"
                                                id="extramessing" class="form-control required" type="text"
                                                name="extramessing" placeholder="Enter extra messing">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>SRF FUND:</label>
                                            <input value="<?php echo $livingoutdetails['srf_fund']; ?>" id="srffund"
                                                class="form-control required" type="text" name="srffund"
                                                placeholder="Enter srf fund">
                                            <span id="contact_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class=" form-group">
                                            <label>CLEANING GEAR:</label>
                                            <input value="<?php echo $livingoutdetails['cleaning_gear']; ?>"
                                                id="cleaninggear" class="form-control required" type="text"
                                                name="cleaninggear" placeholder="Enter cleaning gear">
                                            <span id="email_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>PARTY MESSING:</label>
                                            <input value="<?php echo $livingoutdetails['party_messsing']; ?>"
                                                id="partymesssing" class="form-control required" type="text"
                                                name="partymesssing" placeholder="Enter party messsing">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>ENTERTAINMENT:</label>
                                            <input value="<?php echo $livingoutdetails['entert_ainment']; ?>"
                                                id="entertainment" class="form-control required" type="text"
                                                name="entertainment" placeholder="Enter entert ainment">
                                            <span id="contact_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class=" form-group">
                                            <label>ROOM RENT:</label>
                                            <input value="<?php echo $livingoutdetails['room_rent']; ?>" id="roomrent"
                                                class="form-control required" type="text" name="roomrent"
                                                placeholder="Enter room rent">
                                            <span id="email_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>GARDEN:</label>
                                            <input value="<?php echo $livingoutdetails['garden']; ?>" id="garden"
                                                class="form-control required" type="text" name="garden"
                                                placeholder="Enter garden">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>LIBRARY:</label>
                                            <input value="<?php echo $livingoutdetails['library']; ?>" id="library"
                                                class="form-control required" type="text" name="library"
                                                placeholder="Enter library">
                                            <span id="contact_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class=" form-group">
                                            <label>BREAKAGE:</label>
                                            <input value="<?php echo $livingoutdetails['breakage']; ?>" id="breakage"
                                                class="form-control required" type="text" name="breakage"
                                                placeholder="Enter breakage">
                                            <span id="email_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>SARANG:</label>
                                            <input value="<?php echo $livingoutdetails['sarang']; ?>" id="sarang"
                                                class="form-control required" type="text" name="sarang"
                                                placeholder="Enter sarang">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>HOSPITALITY FUND:</label>
                                            <input value="<?php echo $livingoutdetails['hospitality_fund']; ?>"
                                                id="hospitalityfund" class="form-control required" type="text"
                                                name="hospitalityfund" placeholder="Enter hospitality fund">
                                            <span id="contact_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class=" form-group">
                                            <label>EMP. CONTINGENCY:</label>
                                            <input value="<?php echo $livingoutdetails['emp_contingency']; ?>"
                                                id="empcontingency" class="form-control required" type="text"
                                                name="empcontingency" placeholder="Enter emp contingency">
                                            <span id="email_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>SOCIAL WELLBEING:</label>
                                            <input value="<?php echo $livingoutdetails['social_wellbeing']; ?>"
                                                id="socialwellbeing" class="form-control required" type="text"
                                                name="socialwellbeing" placeholder="Enter social wellbeing">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>MEMENTO:</label>
                                            <input value="<?php echo $livingoutdetails['memento']; ?>" id="memento"
                                                class="form-control required" type="text" name="memento"
                                                placeholder="Enter memento">
                                            <span id="contact_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class=" form-group">
                                            <label>SEQURITY DEPOSIT:</label>
                                            <input value="<?php echo $livingoutdetails['security_deposit']; ?>"
                                                id="securitydeposit" class="form-control required" type="text"
                                                name="securitydeposit" placeholder="Enter security deposit">
                                            <span id="email_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>REFUND:</label>
                                            <input value="<?php echo $livingoutdetails['refund']; ?>" id="refund"
                                                class="form-control required" type="text" name="refund"
                                                placeholder="Enter refund">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>PENALTY:</label>
                                            <input value="<?php echo $livingoutdetails['penalty']; ?>" id="penalty"
                                                class="form-control required" type="text" name="penalty"
                                                placeholder="Enter penalty">
                                            <span id="contact_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class=" form-group">
                                            <label>ARREARS:</label>
                                            <input value="<?php echo $livingoutdetails['arrears']; ?>" id="arrears"
                                                class="form-control required" type="text" name="arrears"
                                                placeholder="Enter arrears">
                                            <span id="email_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>QM PACKING:</label>
                                            <input value="<?php echo $livingoutdetails['qm_packing']; ?>" id="qmpacking"
                                                class="form-control required" type="text" name="qmpacking"
                                                placeholder="Enter qmpacking">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>

                                </div>

                                </table>
                            </div><!-- /# card -->
                        </div><!-- /# column -->
                    </div><!-- /# row -->
                </div><!-- /# main content -->
            </div><!-- /# container-fluid -->


            <div class="main-content">
                <!-- Write Content here -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card alert">

                            <div class="bootstrap-data-table-panel">

                                <br>
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
                                            <label>NO OF DAYS:</label>
                                            <input value="<?php echo $livingoutdetails['no_of_days']; ?>" id="noofdays"
                                                class="form-control required" type="text" name="noofdays"
                                                placeholder="Enter no of days">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>GARBAGE COLLECTION:</label>
                                            <input value="<?php echo $livingoutdetails['garbage_collection']; ?>"
                                                id="garbagecollection" class="form-control required" type="text"
                                                name="garbagecollection" placeholder="Enter garbage collection">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>BARBER RECOVERY:</label>
                                            <input value="<?php echo $livingoutdetails['barber_recovery']; ?>"
                                                id="barberrecovery" class="form-control required" type="text"
                                                name="barberrecovery" placeholder="Enter barber recovery">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>AMENITIES:</label>
                                            <input value="<?php echo $livingoutdetails['amenities']; ?>" onkeypress="return isNumberKey(event)" id="amenities" class="form-control required" type="text"
                                                name="amenities" placeholder="Enter barber recovery">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CREDDIT / DEBIT:</label>
                                            <input value="<?php echo $livingoutdetails['credit_debit']; ?>"
                                                id="creditdebit" class="form-control required" type="text"
                                                name="creditdebit" placeholder="Enter credit/debit">
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label></label>

                                            <span id="contact_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class=" form-group">
                                            <label>TOTAL:</label>
                                            <input value="<?php echo $livingoutdetails['total']; ?>" readonly id="total"
                                                class="form-control required" type="text" name="total">
                                            <span id="email_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button onclick="return editMonthlybill()"
                                        class="btn btn-outline-primary float-right">Submit</button>
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
            var billofmonth = document.getElementById("billofmonth");
            billofmonth.value = "<?php echo $livingoutdetails['bill_of_month']; ?>";
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

        $('#name').on('change', function () {
            var id = $(this).val();
            $.ajax({
                url: " <?= OFFICER_PATH ?>/fetchofficerdetails",
                type: "POST",
                dataType: "json",
                data: JSON.stringify({
                    "id": id,
                }),
                success: function (data) {
                    $('#rank').val(data.rank);

                    $('#course').val(data.course);
                },
                error: function (data) {
                }
            })
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

        $('#messsubscription').keyup(function () {
            calculateTotal();
        });
        $('#sports').keyup(function () {
            calculateTotal();
        });
        $('#bar').keyup(function () {
            calculateTotal();
        });
        $('#messmaintainance').keyup(function () {
            calculateTotal();
        });
        $('#officersinstitute').keyup(function () {
            calculateTotal();
        });
        $('#partybar').keyup(function () {
            calculateTotal();
        });
        $('#messservice').keyup(function () {
            calculateTotal();
        });
        $('#ladiesclub').keyup(function () {
            calculateTotal();
        });
        $('#roombearer').keyup(function () {
            calculateTotal();
        });
        $('#dailymessing').keyup(function () {
            calculateTotal();
        });
        $('#officerscafeteria').keyup(function () {
            calculateTotal();
        });
        $('#extramessing').keyup(function () {
            calculateTotal();
        });
        $('#srffund').keyup(function () {
            calculateTotal();
        });
        $('#cleaninggear').keyup(function () {
            calculateTotal();
        });
        $('#partymesssing').keyup(function () {
            calculateTotal();
        });
        $('#entertainment').keyup(function () {
            calculateTotal();
        });
        $('#roomrent').keyup(function () {
            calculateTotal();
        });
        $('#garden').keyup(function () {
            calculateTotal();
        });
        $('#library').keyup(function () {
            calculateTotal();
        });
        $('#breakage').keyup(function () {
            calculateTotal();
        });
        $('#sarang').keyup(function () {
            calculateTotal();
        });
        $('#hospitalityfund').keyup(function () {
            calculateTotal();
        });
        $('#empcontingency').keyup(function () {
            calculateTotal();
        });
        $('#socialwellbeing').keyup(function () {
            calculateTotal();
        });
        $('#memento').keyup(function () {
            calculateTotal();
        });
        $('#securitydeposit').keyup(function () {
            calculateTotal();
        });
        $('#refund').keyup(function () {
            calculateTotal();
        });
        $('#penalty').keyup(function () {
            calculateTotal();
        });
        $('#arrears').keyup(function () {
            calculateTotal();
        });
        $('#qmpacking').keyup(function () {
            calculateTotal();
        });
        $('#garbagecollection').keyup(function () {
            calculateTotal();
        });
        $('#barberrecovery').keyup(function () {
            calculateTotal();
        });
        $('#creditdebit').keyup(function () {
            calculateTotal();
        });
        $('#amenities').keyup(function () {
            calculateTotal();
        });

        function calculateTotal() {
            var messsubscription = parseInt($('#messsubscription').val());
            var sports = parseInt($('#sports').val());
            var bar = parseInt($('#bar').val());
            var messmaintainance = parseInt($('#messmaintainance').val());
            var officersinstitute = parseInt($('#officersinstitute').val());
            var partybar = parseInt($('#partybar').val());
            var messservice = parseInt($('#messservice').val());
            var ladiesclub = parseInt($('#ladiesclub').val());
            var roombearer = parseInt($('#roombearer').val());
            var dailymessing = parseInt($('#dailymessing').val());
            var officerscafeteria = parseInt($('#officerscafeteria').val());
            var linen = parseInt($('#linen').val());
            var extramessing = parseInt($('#extramessing').val());
            var srffund = parseInt($('#srffund').val());
            var cleaninggear = parseInt($('#cleaninggear').val());
            var partymesssing = parseInt($('#partymesssing').val());
            var entertainment = parseInt($('#entertainment').val());
            var roomrent = parseInt($('#roomrent').val());
            var garden = parseInt($('#garden').val());
            var library = parseInt($('#library').val());
            var breakage = parseInt($('#breakage').val());
            var sarang = parseInt($('#sarang').val());
            var hospitalityfund = parseInt($('#hospitalityfund').val());
            var empcontingency = parseInt($('#empcontingency').val());
            var socialwellbeing = parseInt($('#socialwellbeing').val());
            var memento = parseInt($('#memento').val());
            var securitydeposit = parseInt($('#securitydeposit').val());
            var refund = parseInt($('#refund').val());
            var penalty = parseInt($('#penalty').val());
            var arrears = parseInt($('#arrears').val());
            var qmpacking = parseInt($('#qmpacking').val());
            var garbagecollection = parseInt($('#garbagecollection').val());
            var barberrecovery = parseInt($('#barberrecovery').val());
            var creditdebit = parseInt($('#creditdebit').val());
            var amenities = parseInt($('#amenities').val());
            $('#total').val(messsubscription + sports + bar + messmaintainance + officersinstitute + partybar + messservice + ladiesclub + roombearer + dailymessing
                + officerscafeteria + linen + extramessing + srffund + cleaninggear + partymesssing + entertainment + roomrent + garden + library
                + breakage + sarang + hospitalityfund + empcontingency + socialwellbeing + memento + securitydeposit + refund + penalty + arrears
                + qmpacking + garbagecollection + barberrecovery + creditdebit + amenities);
        }

        function editMonthlybill() {
            var course = $("#course").val();
            var iccode = $("#iccode").val();
            var rank = $("#rank").val();
            var billofmonth = $("#billofmonth").val();
            var name = $("#name").val();
            var date = $("#date").val();
            var messsubscription = $("#messsubscription").val();
            var sports = $("#sports").val();
            var bar = $("#bar").val();
            var messmaintainance = $("#messmaintainance").val();
            var officersinstitute = $("#officersinstitute").val();
            var partybar = $("#partybar").val();
            var messservice = $("#messservice").val();
            var ladiesclub = $("#ladiesclub").val();
            var roombearer = $("#roombearer").val();
            var dailymessing = $("#dailymessing").val();
            var officerscafeteria = $("#officerscafeteria").val();
            var linen = $("#linen").val();
            var extramessing = $("#extramessing").val();
            var srffund = $("#srffund").val();
            var cleaninggear = $("#cleaninggear").val();
            var partymesssing = $("#partymesssing").val();
            var entertainment = $("#entertainment").val();
            var roomrent = $("#roomrent").val();
            var garden = $("#garden").val();
            var library = $("#library").val();
            var breakage = $("#breakage").val();
            var sarang = $("#sarang").val();
            var hospitalityfund = $("#hospitalityfund").val();
            var empcontingency = $("#empcontingency").val();
            var socialwellbeing = $("#socialwellbeing").val();
            var memento = $("#memento").val();
            var securitydeposit = $("#securitydeposit").val();
            var refund = $("#refund").val();
            var penalty = $("#penalty").val();
            var arrears = $("#arrears").val();
            var qmpacking = $("#qmpacking").val();
            var noofdays = $("#noofdays").val();
            var garbagecollection = $("#garbagecollection").val();
            var barberrecovery = $("#barberrecovery").val();
            var creditdebit = $("#creditdebit").val();
            var total = $("#total").val();
            var amenities = $("#amenities").val();
            var id = <?php echo $livingoutdetails['id'] ?>;
            $.ajax({
                url: " <?= LIVINGOUT_PATH ?>/editMonthlybill",
                type: "POST",
                datatype: "json",
                crossDomain: true,
                data: JSON.stringify({
                    "id": id,
                    "course": course,
                    "iccode": iccode,
                    "rank": rank,
                    "billofmonth": billofmonth,
                    "name": name,
                    "date": date,
                    "messsubscription": messsubscription,
                    "sports": sports,
                    "bar": bar,
                    "messmaintainance": messmaintainance,
                    "officersinstitute": officersinstitute,
                    "partybar": partybar,
                    "messservice": messservice,
                    "ladiesclub": ladiesclub,
                    "roombearer": roombearer,
                    "dailymessing": dailymessing,
                    "officerscafeteria": officerscafeteria,
                    "linen": linen,
                    "extramessing": extramessing,
                    "srffund": srffund,
                    "cleaninggear": cleaninggear,
                    "partymesssing": partymesssing,
                    "entertainment": entertainment,
                    "roomrent": roomrent,
                    "garden": garden,
                    "library": library,
                    "breakage": breakage,
                    "sarang": sarang,
                    "hospitalityfund": hospitalityfund,
                    "empcontingency": empcontingency,
                    "socialwellbeing": socialwellbeing,
                    "memento": memento,
                    "securitydeposit": securitydeposit,
                    "refund": refund,
                    "penalty": penalty,
                    "arrears": arrears,
                    "qmpacking": qmpacking,
                    "noofdays": noofdays,
                    "garbagecollection": garbagecollection,
                    "barberrecovery": barberrecovery,
                    "creditdebit": creditdebit,
                    "amenities": amenities,
                    "total": total
                }),
                success: function (data) {
                    if (data.success == true) {
                        window.location.href = "<?= LIVINGOUT_PATH ?>"
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