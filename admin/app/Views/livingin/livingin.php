<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Monthly Mess Bill(Living In)</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb float-right">
                                <li><a href="<?= DASHBOARD_PATH ?>">Dashboard &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Monthly Mess Bill</a></li>
                                <!--	<li class="active">Data Table</li>-->
                            </ol>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
            <div class="main-content">
                <?php if (isset($success_message) && $success_message != '') { ?>

                    <div class="alert alert-info alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong>
                        <?php echo isset($success_message) ? $success_message : $this->session->flashdata('invalid'); ?>
                    </div>

                <?php } ?>

                <?php if (isset($error_message) && $error_message != '') { ?>

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
                                <h4>All Bills</h4>
                                <a type="submit" class="btn btn-outline-danger btn-flat btn-sm float-right"
                                    href="<?= LIVINGIN_PATH ?>/add">Add Monthly Bill</a>
                                <a type="submit" class="btn btn-outline-danger btn-flat btn-sm float-right mr-2"
                                    href="<?= LIVINGIN_PATH ?>/downloadSampleFile">Download Sample Monthly Bill</a>
                                <a type="submit" onclick="bulkUploadMonthlyMess()"
                                    class="btn btn-outline-danger btn-flat btn-sm float-right mr-2">Upload Monthly
                                    Bill</a>
                                <input type="file" id="file" name="file" class=" float-right">
                            </div>
                            <div class="card-body">
                                <span id="error_msg" style="color:red"></span>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Course</th>
                                            <th>IC Code</th>
                                            <th>Name</th>
                                            <th>Rank</th>
                                            <th>Bill of Month</th>
                                            <th>Date</th>
                                            <th>No of Days</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($monthlymessdetails)) {
                                            $html = '';
                                            foreach ($monthlymessdetails as $row) { ?>
                                                <tr>
                                                    <td>
                                                        <?= $row['id'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['course'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['ic_code'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['name'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['rank'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['bill_of_month'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['date'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['no_of_days'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['total'] ?>
                                                    </td>
                                                    <td>&nbsp;&nbsp;<a class="fa-solid fa-pen-to-square text-blue"
                                                            data-toggle="tooltip" title="Edit !"
                                                            href="<?= LIVINGIN_PATH ?>/edit/<?= $row["id"]; ?>"></a>
                                                            &nbsp;&nbsp;<a class="fa fa-print text-blue "
                                                            data-toggle="tooltip" title="Print!"
                                                            href="<?= LIVINGIN_PATH ?>/printPdf/<?= $row["id"]; ?>"></a>
                                                    </td>
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

            </div><!-- /# main content -->
        </div><!-- /# container-fluid -->
    </div><!-- /# main -->
</div><!-- /# content wrap -->

<?php include(INCLUDESPATH . '/footer.php'); ?>
<script type="text/javascript">
    function bulkUploadMonthlyMess() {
        var file = $('#file')[0].files[0];
        var formData = new FormData();
        formData.append("file", file);
        $.ajax({
            url: "<?= LIVINGIN_PATH ?>/uploadBulkMonthlyMess",
            enctype: "multipart/form-data",
            type: "POST",
            crossDomain: true,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                window.location.reload();
            }
        })
    }
</script>