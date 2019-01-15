<?php
    date_default_timezone_set("Asia/Karachi");
    $dateToday = date('Y-m-d');
    $total = $challan[0]['challan_admission_fee']+$challan[0]['challan_security_fee']+$challan[0]['challan_monthly_fee']+$challan[0]['challan_house_shirt_fee']
    +$challan[0]['challan_annual_fee']+$challan[0]['challan_exam_fee']+$challan[0]['challan_registration_fee']+$challan[0]['challan_annual_stationary_fee']
    +$challan[0]['challan_monthly_computer_fee']+$challan[0]['challan_monthly_lab_fee']+$challan[0]['challan_monthly_security_fee']-$challan[0]['challan_deferred']-$challan[0]['challan_less_received'];
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="shortcut icon" href="<?php echo Assets;?>32x32.png" /> 
        <title>Challan Form</title>
        <style type="text/css">
            td
            {
                font-size: 1em;
                font-family: arial;
            }
            @media print
            {
                #printPageButton,#search_button,#input
                {
                    display: none;
                }
            }
        </style>
    </head>
    <body>
        <form id="" action="<?php echo base_url(); ?>challan/search/" method="post" accept-charset="utf-8">
            <input type="search" id="input" name="search"  value="" placeholder="Search by Roll No.">
            <button type="submit" id="search_button" class="btn btn-success green-meadow">
            <i class="glyphicon glyphicon-arrow-right"></i>
            Search
            </button>
        </form>
        <div class="col-md-12">
            <table style="float: left;" border="1">
                <tbody>
                    <tr >
                        <th colspan="2">
                            <img src="<?php echo base_url(). 'assets/img/Challan1.PNG' ?>" />
                        </th>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td style="width: 201px;">
                            Admission Fee
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_admission_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Security (Refundable)
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_security_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Tuition Fee
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_monthly_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Computer Charges
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_monthly_computer_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Lab Charges (Per Lab)
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_monthly_lab_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Security Services
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_monthly_security_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Annual Fund
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_annual_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Annual Stationery Fund
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_annual_stationary_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Exam Charges
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_exam_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Registration Charges
                        </td>
                        <td class="text-center">
                             <?php echo $challan[0]['challan_registration_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            House Shirt Charges
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_house_shirt_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Less: DEFERRED (IF ANY)
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_deferred']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Less: RECEIVED (IF ANY)
                        </td>
                        <td class="text-center">
                             <?php echo $challan[0]['challan_less_received']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="margin-left: 90px;">
                            TOTAL
                        </td>
                        <td class="text-center">
                            <?php echo $total; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table style="float: left;" border="1" >
                <tbody>
                    <tr>
                        <th colspan="4">
                            <img style="height: 64px;width: 495px" src="<?php echo base_url(). 'assets/img/Challan2.PNG' ?>"/>
                        </th>
                    </tr>
                    <tr>
                        <td class="text-left">
                            Payment Date 
                        </td>
                        <td class="text-left">
                            <?php echo $challan[0]['challan_date_submitted']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Cheque No.
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Bank 
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>Branch Name</td>
                        <td class="font-weight-bold"><?php echo $branch; ?></td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Name
                        </td>
                        <td>
                            <b class="text-uppercase bold" style="text-transform: uppercase"><?php echo $student[0]['student_name']; ?></b>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Class 
                        </td>
                        <td class="font-weight-bold">
                            <?php echo $class; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Issue Date  
                        </td>
                        <td class="font-weight-bold">
                            <?php
                                $originalDate = $challan[0]['challan_date_created'];
                                $newDate = date("d-m-Y", strtotime($originalDate));
                                echo $newDate;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Fee Period 
                        </td>
                        <td class="font-weight-bold">
                            <?php
                                $originalDate = $challan[0]['challan_fee_month'];
                                $newDate = date("M Y", strtotime($originalDate));
                                echo $newDate;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right font-weight-bold" style="height: 54px;" colspan="2">Amount payable within Due Date</td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <td class="text-center font-weight-bold">During</td>
                        <td class="font-weight-bold">
                            <span style="margin-left:40px">8th to 12th</span>
                            <span style="margin-left:40px">13th to 18th</span>
                            <span style="margin-left:40px">19th to 25th</span>
                        </td>
                    </tr>
                    <tr style="height: 54px;">
                        <td></td>
                        <td>
                            <span style="margin-left:40px">Rs.100</span>
                            <span style="margin-left:70px">Rs.300</span>
                            <span style="margin-left:90px">Rs.500</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">Generated By: <b><?php echo $user['name']; ?></b></td>
                    </tr>
                </tbody>
            </table>
            <table style="border-left: none;" border="1" >
                <tbody>
                    <tr>
                        <th colspan="2">
                            <img style="height: 64px;width: 145px;" src="<?php echo base_url(). 'assets/img/Challan3.PNG' ?>"/>
                        </th>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td><?php
                                $originalDate = $dateToday;
                                $newDate = date("d-m-Y", strtotime($originalDate));
                                echo $newDate;
                            ?>
                    </tr>
                    <tr>
                        <td colspan="2" style="font-size: 11px;height: 27px">Registration No. : <?php echo $student[0]['student_roll_no']; ?></td>
                    </tr>
                    <tr style="height: 54px;text-align: center;background-color: black;color: white;">
                        <td colspan="2"> NEW ADMISSION </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" colspan="2"> <b>Due Date</b> </td>
                    </tr>
                    <tr style="height: 81px;">
                        <td style="text-align: center;" colspan="2">
                            <b style="font-size: 25px">
                            <?php
                                $originalDate = $challan[0]['challan_due_date'];
                                $newDate = date("d-m-Y", strtotime($originalDate));
                                echo $newDate;
                                ?>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;height: 54px" colspan="2"><b style="font-size: 25px"><?php echo $total; ?></b></td>
                    </tr>
                    <tr style="height: 81px;">
                        <td style="text-align: center;" colspan="2"> <b>Invoice ID : <?php echo $challan[0]['id']; ?></b> </td>
                    </tr>
                    <tr style="text-align: center;background-color: grey;">
                        <td colspan="2"><b> BANK COPY </b></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <b>------------------------------------------------------------------------------------------------------------------------------------------------------------</b>
        </div>
        <div class="col-md-12">
            <table style="float: left;" border="1">
                <tbody>
                    <tr >
                        <th colspan="2">
                            <img src="<?php echo base_url(). 'assets/img/Challan1.PNG' ?>" />
                        </th>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td style="width: 201px;">
                            Admission Fee
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_admission_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Security (Refundable)
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_security_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Tuition Fee
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_monthly_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Computer Charges
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_monthly_computer_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Lab Charges (Per Lab)
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_monthly_lab_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Security Services
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_monthly_security_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Annual Fund
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_annual_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Annual Stationery Fund
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_annual_stationary_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Exam Charges
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_exam_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Registration Charges
                        </td>
                        <td class="text-center">
                             <?php echo $challan[0]['challan_registration_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            House Shirt Charges
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_house_shirt_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Less: DEFERRED (IF ANY)
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_deferred']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Less: RECEIVED (IF ANY)
                        </td>
                        <td class="text-center">
                             <?php echo $challan[0]['challan_less_received']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="margin-left: 90px;">
                            TOTAL
                        </td>
                        <td class="text-center">
                            <?php echo $total; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table style="float: left;" border="1" >
                <tbody>
                    <tr>
                        <th colspan="4">
                            <img style="height: 64px;width: 495px" src="<?php echo base_url(). 'assets/img/Challan2.PNG' ?>"/>
                        </th>
                    </tr>
                    <tr>
                        <td class="text-left">
                            Payment Date 
                        </td>
                        <td class="text-left">
                            <?php echo $challan[0]['challan_date_submitted']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Cheque No.
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Bank 
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>Branch Name</td>
                        <td class="font-weight-bold"><?php echo $branch; ?></td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Name
                        </td>
                        <td>
                            <b class="text-uppercase bold" style="text-transform: uppercase"><?php echo $student[0]['student_name']; ?></b>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Class 
                        </td>
                        <td class="font-weight-bold">
                            <?php echo $class; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Issue Date  
                        </td>
                        <td class="font-weight-bold">
                            <?php
                                $originalDate = $challan[0]['challan_date_created'];
                                $newDate = date("d-m-Y", strtotime($originalDate));
                                echo $newDate;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Fee Period 
                        </td>
                        <td class="font-weight-bold">
                            <?php
                                $originalDate = $challan[0]['challan_fee_month'];
                                $newDate = date("M Y", strtotime($originalDate));
                                echo $newDate;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right font-weight-bold" style="height: 54px;" colspan="2">Amount payable within Due Date</td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <td class="text-center font-weight-bold">During</td>
                        <td class="font-weight-bold">
                            <span style="margin-left:40px">8th to 12th</span>
                            <span style="margin-left:40px">13th to 18th</span>
                            <span style="margin-left:40px">19th to 25th</span>
                        </td>
                    </tr>
                    <tr style="height: 54px;">
                        <td></td>
                        <td>
                            <span style="margin-left:40px">Rs.100</span>
                            <span style="margin-left:70px">Rs.300</span>
                            <span style="margin-left:90px">Rs.500</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">Generated By: <b><?php echo $user['name']; ?></b></td>
                    </tr>
                </tbody>
            </table>
            <table style="border-left: none;" border="1" >
                <tbody>
                    <tr>
                        <th colspan="2">
                            <img style="height: 64px;width: 145px;" src="<?php echo base_url(). 'assets/img/Challan3.PNG' ?>"/>
                        </th>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td><?php
                                $originalDate = $dateToday;
                                $newDate = date("d-m-Y", strtotime($originalDate));
                                echo $newDate;
                            ?>
                    </tr>
                    <tr>
                        <td colspan="2" style="font-size: 11px;height: 27px">Registration No. : <?php echo $student[0]['student_roll_no']; ?></td>
                    </tr>
                    <tr style="height: 54px;text-align: center;background-color: black;color: white;">
                        <td colspan="2"> NEW ADMISSION </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" colspan="2"> <b>Due Date</b> </td>
                    </tr>
                    <tr style="height: 81px;">
                        <td style="text-align: center;" colspan="2">
                            <b style="font-size: 25px">
                            <?php
                                $originalDate = $challan[0]['challan_due_date'];
                                $newDate = date("d-m-Y", strtotime($originalDate));
                                echo $newDate;
                                ?>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;height: 54px" colspan="2"><b style="font-size: 25px"><?php echo $total; ?></b></td>
                    </tr>
                    <tr style="height: 81px;">
                        <td style="text-align: center;" colspan="2"> <b>Invoice ID : <?php echo $challan[0]['id']; ?></b> </td>
                    </tr>
                    <tr style="text-align: center;background-color: grey;">
                        <td colspan="2"><b> SCHOOL COPY </b></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <b>------------------------------------------------------------------------------------------------------------------------------------------------------------</b>
        </div>
        <div class="col-md-12">
            <table style="float: left;" border="1">
                <tbody>
                    <tr >
                        <th colspan="2">
                            <img src="<?php echo base_url(). 'assets/img/Challan1.PNG' ?>" />
                        </th>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td style="width: 201px;">
                            Admission Fee
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_admission_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Security (Refundable)
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_security_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Tuition Fee
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_monthly_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Computer Charges
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_monthly_computer_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Lab Charges (Per Lab)
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_monthly_lab_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Security Services
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_monthly_security_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Annual Fund
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_annual_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Annual Stationery Fund
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_annual_stationary_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Exam Charges
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_exam_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Registration Charges
                        </td>
                        <td class="text-center">
                             <?php echo $challan[0]['challan_registration_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            House Shirt Charges
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_house_shirt_fee']; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Less: DEFERRED (IF ANY)
                        </td>
                        <td class="text-center">
                            <?php echo $challan[0]['challan_deferred']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Less: RECEIVED (IF ANY)
                        </td>
                        <td class="text-center">
                             <?php echo $challan[0]['challan_less_received']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="margin-left: 90px;">
                            TOTAL
                        </td>
                        <td class="text-center">
                            <?php echo $total; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table style="float: left;" border="1" >
                <tbody>
                    <tr>
                        <th colspan="4">
                            <img style="height: 64px;width: 495px" src="<?php echo base_url(). 'assets/img/Challan2.PNG' ?>"/>
                        </th>
                    </tr>
                    <tr>
                        <td class="text-left">
                            Payment Date 
                        </td>
                        <td class="text-left">
                            <?php echo $challan[0]['challan_date_submitted']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Cheque No.
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Bank 
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>Branch Name</td>
                        <td class="font-weight-bold"><?php echo $branch; ?></td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Name
                        </td>
                        <td>
                            <b class="text-uppercase bold" style="text-transform: uppercase"><?php echo $student[0]['student_name']; ?></b>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Class 
                        </td>
                        <td class="font-weight-bold">
                            <?php echo $class; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: none;">
                        <td>
                            Issue Date  
                        </td>
                        <td class="font-weight-bold">
                            <?php
                                $originalDate = $challan[0]['challan_date_created'];
                                $newDate = date("d-m-Y", strtotime($originalDate));
                                echo $newDate;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Fee Period 
                        </td>
                        <td class="font-weight-bold">
                            <?php
                                $originalDate = $challan[0]['challan_fee_month'];
                                $newDate = date("M Y", strtotime($originalDate));
                                echo $newDate;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right font-weight-bold" style="height: 54px;" colspan="2">Amount payable within Due Date</td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <td class="text-center font-weight-bold">During</td>
                        <td class="font-weight-bold">
                            <span style="margin-left:40px">8th to 12th</span>
                            <span style="margin-left:40px">13th to 18th</span>
                            <span style="margin-left:40px">19th to 25th</span>
                        </td>
                    </tr>
                    <tr style="height: 54px;">
                        <td></td>
                        <td>
                            <span style="margin-left:40px">Rs.100</span>
                            <span style="margin-left:70px">Rs.300</span>
                            <span style="margin-left:90px">Rs.500</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">Generated By: <b><?php echo $user['name']; ?></b></td>
                    </tr>
                </tbody>
            </table>
            <table style="border-left: none;" border="1" >
                <tbody>
                    <tr>
                        <th colspan="2">
                            <img style="height: 64px;width: 145px;" src="<?php echo base_url(). 'assets/img/Challan3.PNG' ?>"/>
                        </th>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td><?php
                                $originalDate = $dateToday;
                                $newDate = date("d-m-Y", strtotime($originalDate));
                                echo $newDate;
                            ?>
                    </tr>
                    <tr>
                        <td colspan="2" style="font-size: 11px;height: 27px">Registration No. : <?php echo $student[0]['student_roll_no']; ?></td>
                    </tr>
                    <tr style="height: 54px;text-align: center;background-color: black;color: white;">
                        <td colspan="2"> NEW ADMISSION </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" colspan="2"> <b>Due Date</b> </td>
                    </tr>
                    <tr style="height: 81px;">
                        <td style="text-align: center;" colspan="2">
                            <b style="font-size: 25px">
                            <?php
                                $originalDate = $challan[0]['challan_due_date'];
                                $newDate = date("d-m-Y", strtotime($originalDate));
                                echo $newDate;
                                ?>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;height: 54px" colspan="2"><b style="font-size: 25px"><?php echo $total; ?></b></td>
                    </tr>
                    <tr style="height: 81px;">
                        <td style="text-align: center;" colspan="2"> <b>Invoice ID : <?php echo $challan[0]['id']; ?></b> </td>
                    </tr>
                    <tr style="text-align: center;background-color: grey;">
                        <td colspan="2"><b> STUDENT COPY </b></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <b>------------------------------------------------------------------------------------------------------------------------------------------------------------</b>
        </div>
        <h5><input type="text" readonly="readonly" name="" style="width: 1024px;" placeholder="Note: ALL Charges except Security are Non Refundable"></h5>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </div>
        <button type="button" onclick="window.print();" id="printPageButton" class="btn btn-success btn-lg green-meadow" style="margin-left: 30%"><i class="glyphicon glyphicon-arrow-right"></i>
        Print</button>
    </body>
</html>