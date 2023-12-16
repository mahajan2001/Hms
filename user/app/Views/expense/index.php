<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>All Expenses</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb float-right">
                                <li><a href="<?= DASHBOARD_PATH ?>">Dashboard &nbsp; </a></li>
                                / &nbsp;
                                <li><a>All Expenses</a></li>
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
                                <h4>All Expenses</h4>
                                <a type="submit" class="btn btn-outline-danger btn-flat btn-sm float-right" href="<?= EXPENSE_PATH ?>/add">Add expense</a>
                            </div>
                            <div class="card-body">
                                <span id="error_msg" style="color:red"></span>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Vendor Name</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($expenses)) {
                                            $html = '';
                                            foreach ($expenses as $row) { ?>
                                                <tr>
                                                    <td><?= $row['id'] ?></td>
                                                    <td><?= $row['name'] ?></td>
                                                    <td><?= $row['total'] ?></td>
                                                    <td><?= $row['expense_status'] ?></td>

                                                    <td>&nbsp;&nbsp;<a class="fa fa-print text-blue" data-toggle="tooltip" title="Download PDF!" onclick="return downloadpdf()" href="<?= EXPENSE_PATH ?>/viewPDF/<?= $row["id"]; ?>"></a>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<a class="fa fa-pencil text-blue" data-toggle="tooltip" title="Edit!" href="<?= EXPENSE_PATH ?>/edit/<?= $row["id"]; ?>"></a>
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
</script>