<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>All Invoices</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb float-right">
                                <li><a href="<?= DASHBOARD_PATH ?>">Dashboard &nbsp; </a></li>
                                / &nbsp;
                                <li><a>All Invoices</a></li>
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
                                <h4>All Invoices</h4>
                                <a type="submit" class="btn btn-outline-danger btn-flat btn-sm float-right" href="<?= INVOICE_PATH ?>/add">Add invoice</a>
                            </div>
                            <div class="card-body">
                                <span id="error_msg" style="color:red"></span>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>IC Code</th>
                                            <th>Name</th>
                                            <th>Messing</th>
                                            <th>Month</th>
                                            <th>Rank</th>
                                            <th>Course</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($monthlymessdetails)) {
                                            $html = '';
                                            foreach ($monthlymessdetails as $row) { ?>
                                                <tr>
                                                    <td><?= $row['id'] ?></td>
                                                    <td><?= $row['ic_code'] ?></td>
                                                    <td><?= $row['name'] ?></td>
                                                    <td><?= $row['messing'] ?></td>
                                                    <td><?= $row['month'] ?></td>
                                                    <td><?= $row['rank'] ?></td>
                                                    <td><?= $row['course'] ?></td>
                                                    <?php if ($row['status'] == 1) { ?>
                                                        <td>Unpaid</td>
                                                    <?php } else { ?>
                                                        <td>Paid</td>
                                                    <?php } ?>

                                                    <td>&nbsp;&nbsp;<a class="fa fa-print text-blue" data-toggle="tooltip" title="Download PDF!" href="<?= INVOICE_PATH ?>/viewPDF/<?= $row["id"]; ?>"></a>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<a class="fa fa-envelope text-blue" data-toggle="tooltip" title="Send Mail!" href="<?= INVOICE_PATH ?>/sendmail/<?= $row["id"]; ?>"></a>
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

        // function downloadpdf(){
        //     window.print('<?= site_url('invoice/pdf') ?>');
        // }

        
    function downloadpdf() {
        var newWindow = window.open('<?= INVOICE_PATH ?>/viewPDF/<?= $row["id"]; ?>', '_blank');
        if (newWindow) {
            newWindow.focus();
        } else {
            alert('Please allow pop-ups for this website to view the PDF.');
        }
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
            url: "<?= OFFICER_PATH ?>/change_visibility",
            data: JSON.stringify({
                'id': id,
                'status': visibility
            }),
            success: function(data) {},
            error: function(data) {
                console.log("error is" + JSON.stringify(data));
            }
        });
    });
   
</script>