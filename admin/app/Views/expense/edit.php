<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Edit Expense</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb text-right float-right">
                                <li><a href="<?= EXPENSE_PATH ?>">All Expenses &nbsp; </a></li>
                                / &nbsp;
                                <li><a>Edit Expense</a></li>
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
                                <a href="<?= EXPENSE_PATH ?>" class="btn btn-outline-danger float-end">BACK</a>
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
                                            <label>Supplier Name:</label>
                                            <select name="vendor" id="vendor" class="form-control required">
                                                <option value="0">Select Vendor</option>
                                                <?php foreach($vendors as $v) { ?>
                                                    <?php if($v['id'] == $expenseDetails[0]['vendor_id']) { ?>
                                                        <option selected value="<?= $v['id'] ?>"><?= $v['name'] ?> - <?= $v['email'] ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $v['id'] ?>"><?= $v['name'] ?> - <?= $v['email'] ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Status:</label>
                                            <select name="status" id="status" class="form-control required" >
                                                <option value="0">Select Status</option>
                                                <option value="Paid">Paid</option>
                                                <option value="Part Paid">Part Paid</option>
                                                <option value="Unpaid">Unpaid</option>
                                            </select>
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                            <label>Date:</label>
                                            <input value="<?php echo $expenseDetails[0]['date'] ?>" id="date" class="form-control required" type="date" name="date"
                                                placeholder="Enter Date" >
                                            <span id="name_error_message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button id="addExpenseRow" class="btn btn-outline-primary float-center">Add EXPENSE ENTRY</button>
                                </div>
                                
                                <input value="<?php echo sizeof($expenseDetails); ?>" id="totalItems" hidden>
                                
                                <div id="mainDiv">
                                    <?php for($i = 1; $i <= sizeof($expenseDetails); $i++) { ?>
                                        <div class="row" id="div<?php echo $i; ?>">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Label:</label>
                                                <input id="itemlabel<?php echo $i; ?>" value="<?php echo $expenseDetails[$i - 1]['item_name']; ?>" class="form-control required" type="text" 
                                                    placeholder="Enter Item Label">
                                                <span id="name_error_message" style="color:red"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Quantity:</label>
                                                <input id="quantity<?php echo $i; ?>" value="<?php echo $expenseDetails[$i - 1]['quantity']; ?>" onkeyup="calculateTotal()" onkeydown="calculateTotal()" class="form-control required" type="text" 
                                                    placeholder="Enter Quantity" >
                                                <span id="name_error_message" style="color:red"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class=" form-group">
                                                <label>Rate:</label>
                                                <input id="rate<?php echo $i; ?>" value="<?php echo $expenseDetails[$i - 1]['rate']; ?>" onkeyup="calculateTotal()" onkeydown="calculateTotal()" class="form-control required" type="text" 
                                                    placeholder="Enter rate" >
                                                <span id="email_error_message" style="color:red"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class=" form-group">
                                                <label>Sub Total:</label>
                                                <input id="subtotal<?php echo $i; ?>" value="<?php echo $expenseDetails[$i - 1]['subtotal']; ?>" class="form-control required" type="text"
                                                     readonly>
                                                <span id="email_error_message" style="color:red"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class=" form-group">
                                                <label>Remove:</label>
                                                <button id="removeRow<?php echo $i; ?>" onclick="removeDiv(<?php echo $i; ?>)" class=" form-control required btn btn-danger">Remove Row</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Total:</label>
                                            <input id="total" value="<?php echo $expenseDetails[0]['total'] ?>" class="form-control required" type="text" name="total"
                                                readonly >
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                    <button onclick="return updateExpense()" class="btn btn-outline-primary float-right">UPDATE EXPENSE ENTRY</button>
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
        var billofmonth = document.getElementById("status");
        billofmonth.value = "<?php echo $expenseDetails[0]['expense_status']; ?>";
    });

    $('#addExpenseRow').on('click',function(){
        var total = $('#totalItems').val();
        var id = parseInt(total) + 1;
        var divToappend = '<div class="row" id="div' + id + '"> <div class="col-md-3"> <div class="form-group"> <label>Label:</label> <input id="itemlabel' + id + '" class="form-control required" type="text" placeholder="Enter Item Label"> <span id="name_error_message" style="color:red"></span> </div> </div> <div class="col-md-2"> <div class="form-group"> <label>Quantity:</label> <input id="quantity' + id + '" value="0" onkeyup="calculateTotal()" onkeydown="calculateTotal()" class="form-control required" type="text" placeholder="Enter Quantity" > <span id="name_error_message" style="color:red"></span> </div> </div> <div class="col-md-2"> <div class=" form-group"> <label>Rate:</label> <input id="rate' + id + '" value="0" onkeyup="calculateTotal()" onkeydown="calculateTotal()" class="form-control required" type="text" placeholder="Enter rate" > <span id="email_error_message" style="color:red"></span> </div> </div> <div class="col-md-3"> <div class=" form-group"> <label>Sub Total:</label> <input id="subtotal' + id + '" class="form-control required" type="text" readonly> <span id="email_error_message" style="color:red"></span> </div> </div> <div class="col-md-2"> <div class=" form-group"> <label>Remove:</label> <button onclick="removeDiv(' + id + ')" id="removeRow' + id + '" class="form-control required btn btn-danger">Remove Row</button> </div> </div> </div>';
        $('#mainDiv').append(divToappend);
        $('#totalItems').val(id);
        calculateTotal();
    });
    
    function calculateTotal(){
        var total = $('#totalItems').val();
        var totalAmount = 0;
        for(let i = 1; i <= total; i++){
            var qty = parseInt($('#quantity' + i).val());
            var rate = parseInt($('#rate' + i).val());
            $('#subtotal' + i).val(qty * rate);
            totalAmount += qty * rate;
        }
        $('#total').val(totalAmount);
    }
    
    function removeDiv(id){
        var total = $('#totalItems').val();
        var count = parseInt(total) - 1;
        $('#div' + total).remove();
        $('#totalItems').val(count);
    }

    function updateExpense() {
        var date = $("#date").val();
        var status = $("#status").val();
        var vendor = $("#vendor").val();
        var id = <?php echo $expenseDetails[0]['expense_id'] ?>;
        
        var itemArray = [];
        var total = $('#totalItems').val();
        for(let i = 1; i <= total; i++){
            var name = $('#itemlabel' + i).val();
            var qty = parseInt($('#quantity' + i).val());
            var rate = parseInt($('#rate' + i).val());
            var subtotal = parseInt($('#subtotal' + i).val());
            var innerObj = {
                "name": name,
                "qty": qty,
                "rate": rate,
                "subtotal": subtotal,
            }
            itemArray.push(innerObj);
        }
        
        var totalAmount = $('#total').val();
        $.ajax({
            url: " <?= EXPENSE_PATH ?>/updateExpense",
            type: "POST",
            dataType: "json",
            crossDomain: true,
            data: JSON.stringify({
                "totalAmount": totalAmount,
                "id": id,
                "expense_date": date,
                "status": status,
                "vendor": vendor,
                "itemArray": itemArray
            }),
            success: function (data) {
                if (data.success == true) {
                    window.location.href = "<?= EXPENSE_PATH ?>"
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