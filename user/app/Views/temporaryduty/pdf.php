
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
        border-top: 1px solid #5D6975;
        border-bottom: 1px solid #5D6975;
        color: #5D6975;
        font-size: 2.4em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
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
        max-width: fit-content;
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
        border-top: 1px solid #5D6975;
        ;
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
        background-color: #0074d9;
        /* Set the background color to blue */
        color: white;
        /* Set the text color to white */
        padding: 10px 20px;
        /* Add padding to the button */
        border: none;
        /* Remove the button border */
        border-radius: 4px;
        /* Add rounded corners to the button */
        cursor: pointer;
        /* Change the cursor to a pointer on hover */

    }

    /* Style the button on hover */
    .blue-button:hover {
        background-color: #0056b3;
        /* Darker blue on hover */
    }

    .button-container {
        display: flex;
        /* Use flexbox to align items */
        justify-content: flex-end;
        /* Align items to the right */

    }
</style>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="page-header">
                        <div class="page-title">
                            <!-- <h1>All Invoices</h1> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    
                </div>
            </div> <!-- row -->
            <div class="main-content">
                <!-- Write Content here -->
                <div class="row">



                    <div class="col-md-12">
                        <div class="card">

                            <header class="clearfix">

                                <h1 style="color:black !important; font-size: 1.7em !important;"><?= ($controller->fetchProjectDetails())['project_name'] ?><br><span style="font-size: 22px;"><?= ($controller->fetchProjectDetails())['address'] ?></span> </h1>

                                <div id="company" class="clearfix" style="margin-right: 60px;">

                                    <div style="text-align: left !important;"><span >IC Code: </span> <?php echo $mess_details['ic_code'] ?></div>
                                    <div style="text-align: left !important;"><span >BILL OF MONTH: </span> <?php echo $mess_details['bill_of_month'] ?></div>
                                    <div style="text-align: left !important;"><span >DATE: </span> <?php echo date('d-m-Y', strtotime($mess_details['date'])); ?></div>

                                </div>

                                <div id="" style="margin-left:7px !important;">

                                    <div><span style="text-align: left !important;">COURSE: </span>  <?php echo " " . $mess_details['course'] ?> </div>
                                    <div><span style="text-align: left !important;">RANK: </span>   <?php echo " " . $mess_details['rank'] ?></div>
                                    <div><span style="text-align: left !important;">NAME: </span>  <?php echo " " . $mess_details['name'] ?></div>
                                    <?php if($mess_details['type'] == 1) { 
                                        $messType = 'Living In';
                                    } else { 
                                        $messType = 'Living Out';
                                        } ?>
                                    <div><span style="text-align: left !important;">MESSING TYPE: </span>  <?php echo " " . $messType; ?></div>
                                </div>

                            </header>
                            <main>
                                <table>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="border-top: 1px solid #5D6975; text-align: left; padding: 7px;">MESS SUBSCRIPTION</td>
                                        <td style="border-top: 1px solid #5D6975; text-align: left; padding: 7px;"><?php echo $mess_details['mess_subscription'] ?></td>

                                        <td style="border-top: 1px solid #5D6975; text-align: left; padding: 7px;">SPORTS</td>
                                        <td style="border-top: 1px solid #5D6975; text-align: left; padding: 7px;"><?php echo $mess_details['sports'] ?></td>

                                        <td style="border-top: 1px solid #5D6975; text-align: left; padding: 7px;">BAR</td>
                                        <td style="border-top: 1px solid #5D6975; text-align: left; padding: 7px;"><?php echo $mess_details['bar'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; padding: 7px;">MESS MAINTENANCE</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['mess_maintainance'] ?></td>

                                        <td style="text-align: left; padding: 7px;">OFFICER INSTITUDE</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['officers_institute'] ?></td>
                                        
                                        <td style="text-align: left; padding: 7px;">PARTY BAR</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['party_bar'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; padding: 7px;">MESS SERVICE</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['mess_service'] ?></td>

                                        <td style="text-align: left; padding: 7px;">LADIES CLUB</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['ladies_club'] ?></td>

                                        <td style="text-align: left; padding: 7px;"> ROOM BARRIER</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['room_bearer'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; padding: 7px;">DAILY MESSING</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['daily_messing'] ?></td>

                                        <td style="text-align: left; padding: 7px;">OFFICERS CAFETERIA</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['officers_cafeteria'] ?></td>

                                        <td style="text-align: left; padding: 7px;">LINEN</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['linen'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; padding: 7px;">EXTRA MESSING</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['extra_messing'] ?></td>

                                        <td style="text-align: left; padding: 7px;">SRF FUND</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['srf_fund'] ?></td>

                                        <td style="text-align: left; padding: 7px;">CLEANING GEAR</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['cleaning_gear'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; padding: 7px;">PARTY MESSING</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['party_messsing'] ?></td>

                                        <td style="text-align: left; padding: 7px;">ENTERTAINMENT</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['entert_ainment'] ?></td>

                                        <td style="text-align: left; padding: 7px;">ROOM RENT</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['room_rent'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; padding: 7px;">GARDEN</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['garden'] ?></td>

                                        <td style="text-align: left; padding: 7px;">LIBRARY</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['library'] ?></td>

                                        <td style="text-align: left; padding: 7px;">BREAKAGE</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['breakage'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; padding: 7px;">SARANG</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['sarang'] ?></td>

                                        <td style="text-align: left; padding: 7px;">HOSPITALITY FUND</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['hospitality_fund'] ?></td>

                                        <td style="text-align: left; padding: 7px;">EMP. CONTINGENCY</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['emp_contingency'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; padding: 7px;">SOCIAL WELLBEING</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['social_wellbeing'] ?></td>

                                        <td style="text-align: left; padding: 7px;">MEMENTO</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['memento'] ?></td>

                                        <td style="text-align: left; padding: 7px;">SECURITY DEPOSIT</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['security_deposit'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; padding: 7px;">REFUND</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['refund'] ?></td>

                                        <td style="text-align: left; padding: 7px;">PENALTY</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['penalty'] ?></td>

                                        <td style="text-align: left; padding: 7px;">ARREARS</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['arrears'] ?></td>
                                    </tr>


                                    

                                    <tr>
                                        <td style="text-align: left; padding: 7px;">QM PACKING</td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['qm_packing'] ?></td>

                                        <td style="text-align: left; padding: 7px;"> </td>
                                        <td style="text-align: left; padding: 7px;"> </td>

                                        <td style="text-align: left; padding: 7px;"> </td>
                                        <td style="text-align: left; padding: 7px;"></td>
                                    </tr>
                                    <!-- Add more rows as needed -->
                                </tbody>

                                </table>


                                <table>
                                <thead>
                                    
                                </thead>
                                    <tbody>
                                    <tr>
                                        <td style="text-align: left; padding: 7px;">No of Days: </td>
                                        <td style="text-align: left; padding: 7px;"> </td>
                                        <td style="text-align: left; padding: 7px;"> </td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['no_of_days'] ?></td>
                                        <td style="text-align: left; padding: 7px;"> </td>
                                        <td style="text-align: left; padding: 7px;"> </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; padding: 7px;">GARBAGE COLLECTION</td>
                                        <td style="text-align: left; padding: 7px;"></td>

                                        <td style="text-align: left; padding: 7px;"></td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['garbage_collection'] ?></td>

                                        <td style="text-align: left; padding: 7px;"></td>
                                        <td style="text-align: left; padding: 7px;"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; padding: 7px;">BARBER RECOVERY</td>
                                        <td style="text-align: left; padding: 7px;"></td>

                                        <td style="text-align: left; padding: 7px;"></td>
                                        <td style="text-align: left; padding: 7px;"><?php echo $mess_details['barber_recovery'] ?></td>

                                        <td style="text-align: left; padding: 7px;"></td>
                                        <td style="text-align: left; padding: 7px;"></td>
                                    </tr>
                                    <?php if($mess_details['type'] == 2) { ?>
                                        <tr>
                                            <td style="text-align: left; padding: 7px;">AMENITIES</td>
                                            <td style="text-align: left; padding: 7px;"></td>
    
                                            <td style="text-align: left; padding: 7px;"></td>
                                            <td style="text-align: left; padding: 7px;"><?php echo $mess_details['amenities'] ?></td>
    
                                            <td style="text-align: left; padding: 7px;"></td>
                                            <td style="text-align: left; padding: 7px;"></td>
                                        </tr>
                                    <?php }?>
                                    <tr>
                                        <td style="border-bottom: 1px solid #5D6975; text-align: left; padding: 7px;">Credit/Debit : <?php echo $mess_details['credit_debit'] ?> Rs only</td>
                                        <td style="border-bottom: 1px solid #5D6975; text-align: left; padding: 7px;"></td>

                                        <td style="border-bottom: 1px solid #5D6975; text-align: left; padding: 7px;"></td>
                                        <td style="border-bottom: 1px solid #5D6975; text-align: left; padding: 7px;"></td>

                                        <td style="border-bottom: 1px solid #5D6975; text-align: left; padding: 7px;"></td>
                                        <td style="border-bottom: 1px solid #5D6975; text-align: center; padding: 7px;">Total: <?php echo $mess_details['total'] ?> Rs.</td>
                                    </tr>
                                    </tbody>
                                </table>

    <div id="notices">
        <!-- <div>NOTICE:</div> -->
        <div class="notice"><i>Mess bill is to be settled in full by the 15th of the month</i></div>
        <div class="notice"><i>Cheque are to be made in favour of MILIT OFFICERS MESS.</i></div>
      </div>
<br>

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
        window.print();       //priting invoice tab
        // alert('The page has loaded.');
        // You can perform actions here when the page is fully loaded.
    };

    function downloadpdf() {


    }
</script>

<?php include(INCLUDESPATH . '/footer.php'); ?>
</script>