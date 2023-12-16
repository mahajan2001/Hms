<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Admin Profile</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <?php if (isset($success_message) && $success_message != '') {  ?>

                    <div class="alert alert-info alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong>
                        <?php echo isset($success_message) ? $success_message : $this->session->flashdata('invalid'); ?>
                    </div>

                <?php  } ?>

                <?php if ($controller->session->getFlashdata('error') != null) { ?>
                    <div class="col-md-12">
                        <div id="error_msg" class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Error!</strong>
                            <?= $controller->session->getFlashdata('error'); ?>
                        </div>
                    </div>
                <?php
                } ?>
                <!-- Write Content here -->
                <div class="col-lg-12">
                    <div class="card alert">
                        <div class="card-header">
                            <h4>Admin Details</h4>
                            <a class="btn btn-outline-danger float-right" href="<?= ADMIN_PATH ?>/editprofile">Update
                                Profile</a>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12">

                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>Name :</td>
                                            <td class="text-right">
                                                <?= $admin["admin_name"] ?></td>
                                        </tr>

                                        <tr>
                                            <td>Email :</td>
                                            <td class="text-right">
                                                <?= $admin["admin_email"] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Contact :</td>
                                            <td class="text-right">
                                                <?= $admin["admin_contact"] ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                                <a href="<?= DASHBOARD_PATH ?>"><i class="fa fa-arrow-left"></i> Back to Dashboard</a>
                            </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div><!-- /# main content -->
    </div><!-- /# container-fluid -->
</div><!-- /# main -->
</div><!-- /# content wrap -->

<?php include(INCLUDESPATH . '/footer.php');
include(INCLUDESPATH . '/close.php'); ?>