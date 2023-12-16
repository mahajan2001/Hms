<?php include(INCLUDESPATH . '/header.php'); ?>
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
<style>

  .clearfix:after {
    content: "";
    display: table;
    clear: both;
  }
  
  a {
    color: #5D6975;
    text-decoration: underline;
  }
  
  
  header {
    padding: 10px 0;
    margin-bottom: 30px;
  
  }
  
  #logo {
    text-align: left;
    margin-bottom: 10px;
  }
  
  #logo img {
    width: 90px;
  }
  
  h1 {
    border-top: 1px solid  #5D6975;
    border-bottom: 1px solid  #5D6975;
    color: #5D6975;
    font-size: 2.4em;
    line-height: 1.4em;
    font-weight: normal;
    text-align: left;
    margin: 0 0 20px 0;
    background: url(dimension.png);
  }
  
  #project {
    float: left;
    text-align: left; 
  }
  
  #project span {
    color: #5D6975;
    text-align: right;
    width: 52px;
    margin-right: 10px;
    display: inline-block;
    font-size: 0.8em;
    
  }
  
  #company {
    float: right;
    text-align: right;
  }
  
  #project div,
  #company div {
    white-space: nowrap;        
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
  }
  
  table tr:nth-child(2n-1) td {
    background: #F5F5F5;
  }
  
  table th,
  table td {
    text-align: center;
  }
  
  table th {
    padding: 5px 20px;
    color: #5D6975;
    border-bottom: 1px solid #C1CED9;
    white-space: nowrap;        
    font-weight: normal;
  }
  
  table .service,
  table .desc {
    text-align: left;
    max-width:fit-content;
  }
  
  table td {
    padding: 20px;
    text-align: right;
  }
  
  table td.service,
  table td.desc {
    vertical-align: top;
  }
  
  table td.unit,
  table td.qty,
  table td.total {
    font-size: 1.2em;
    text-align: center;
  }
  
  table td.grand {
    border-top: 1px solid #5D6975;;
  }
  
  #notices .notice {
    color: #5D6975;
    font-size: 1.2em;
  }
  
  footer {
    color: #5D6975;
    width: 100%;
    height: 30px;
    position: absolute;
    bottom: 0;
    border-top: 1px solid #C1CED9;
    padding: 8px 0;
    align: right;
  }
  
  /* Define the styles for the blue button */
  .blue-button {
    background-color: #0074d9; /* Set the background color to blue */
    color: white; /* Set the text color to white */
    padding: 10px 20px; /* Add padding to the button */
    border: none; /* Remove the button border */
    border-radius: 4px; /* Add rounded corners to the button */
    cursor: pointer; /* Change the cursor to a pointer on hover */
    
  }
  
  /* Style the button on hover */
  .blue-button:hover {
    background-color: #0056b3; /* Darker blue on hover */
  }
  .button-container {
    display: flex; /* Use flexbox to align items */
    justify-content: flex-end; /* Align items to the right */
  
  }
  
      </style>
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

                            <header class="clearfix">

                                <h1>INVOICE</h1>

                                <div id="logo">
                                    <!-- <img src="logo.png"> -->
                                    <img src="<?= FETCH_IMAGE ?>/<?= ($controller->fetchProjectDetails())['project_logo'] ?>">
                                </div>

                                <div id="company" class="clearfix">

                                    <!-- <div><span>PROJECT</span> Website development</div> -->
                                    <div><span> </span> <?php echo $invoiceDetails[0]['name'] ?></div>
                                    <div><span>IC Code: </span> <?php echo $invoiceDetails[0]['ic_code'] ?></div>
                                    <!-- <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div> -->
                                    <!-- <div><span>DATE</span> August 17, 2015</div> -->
                                    <div><span>Issue Date:</span> <?php echo $invoiceDetails[0]['date'] ?></div>

                                </div>

                                <div id="project">
        
                                    <div>Payment From:</div>
                                    <!-- <div>455 Foggy Heights,<br /> AZ 85004, US</div>
                                    <div>(602) 519-0450</div>
                                    <div><a href="mailto:company@example.com">company@example.com</a></div> -->
                                </div>
                                    
                            </header>
                            <main>
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="service">Payment to</th>
                                            <th class="desc"></th>
                                            <th></th>
                                            <th></th>
                                            <th>Pay Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="service">Milits Officers Mess,<br> Address in Khadakwasala,<br>Pune 1234567890 </td>
                                            <td class="desc"></td>
                                            <td class="unit"></td>
                                            <td class="qty"></td>
                                            <td class="total">RS <?php echo $invoiceDetails[0]['total'] ?></td>
                                        </tr>
                                      

                                    </tbody>
                                </table>
                                <!-- <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div> -->

                                <button class="blue-button" onclick="return generateinvoice()">Pay now</button>

                            </main>

                        </div><!-- card -->
                    </div>

                </div><!-- /# card container -->
                <!-- /# column -->

            </div><!-- /# main content -->
        </div><!-- /# container-fluid -->
    </div><!-- /# main -->
</div><!-- /# content wrap -->

<script>
   window.onload = function() {
     window.print();
            alert('The page has loaded.');
            // You can perform actions here when the page is fully loaded.
        };
  function downloadpdf(){

         
      }
</script>

<?php include(INCLUDESPATH . '/footer.php'); ?>
</script>