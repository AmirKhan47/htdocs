<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layouts/common'); ?>
</head>    
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->load->view('layouts/header'); ?>

    <div class="page-container">
        <?php $this->load->view('layouts/side_bar_menu'); ?>
        <div class="page-content-wrapper">
            <div class="page-content">
                <?php $this->load->view('layouts/breadcrumb'); ?>
                <!-- BEGIN : ECHARTS -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                           <!--  <div class="portlet-title">
                                <div class="caption">
                                    <i class=" icon-layers font-green"></i>
                                    <span class="caption-subject font-green bold uppercase">Expenditure Details</span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group">
                                        <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter Range
                                            <span class="fa fa-angle-down"> </span>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a class="actionButton" id="2016" href="javascript:;"> Q1 2016
                                                    <span class="label label-sm label-default"> Past </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="actionButton" id="2017" href="javascript:;"> Q1 2017
                                                    <span class="label label-sm label-default"> Past </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="actionButton" id="2018" href="javascript:;"> Q2 2018
                                                    <span class="label label-sm label-default"> Current </span>
                                                </a>
                                            </li>
                                            <li class="active">
                                                <a class="actionButton" id="2019" href="javascript:;"> Q3 2019
                                                    <span class="label label-sm label-success"> Upcoming </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="actionButton" id="2020" href="javascript:;"> Q4 2020
                                                    <span class="label label-sm label-warning"> Upcoming </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                        <!--     <div class="portlet-body">
                                <div id="echarts_bar" style="height:500px;"> </div>
                            </br></br>
                            <form class="form-horizontal form-bordered" name="frmlegaccountlist" id="frmlegaccountlist" method="post" action="contacts/customer">
                                <div class="row" style="border-bottom: 1px solid #eef1f5;">
                                    <div class="col-md-12">
                                        <div class="form-group" >
                                            <h4 class="control-label col-md-3"><strong>Select Date:</strong></h4>
                                            <div class="col-md-4">


                                                <div class="input-group">
                                                    <div class="input-group">
                                                        <select class="form-control " class="select" required name="month" id="month">
                                                            <option></option>
                                                            <option value="1">Jan</option>
                                                            <option value="2">Feb</option>
                                                            <option value="3">March</option>
                                                            <option value="4">April</option>
                                                            <option value="5">May</option>
                                                            <option value="6">June</option>
                                                            <option value="7">July</option>
                                                            <option value="8">August</option>
                                                            <option value="9">Sep</option>
                                                            <option value="10">Oct</option>
                                                            <option value="11">Nov</option>
                                                            <option value="12">Dec</option>
                                                        </select>
                                                        <span class="input-group-addon"></span>
                                                        <select class="form-control " required name="year" id="year">
                                                            <option value="2016">2016</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>

                                                        </select>
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button" id="clear">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                            <button class="btn default" type="button"id="search" >
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div  id="wait" hidden>
                                                    <img src="<?php echo base_url(); ?>uploaded/ajax-loader.gif" />
                                                </div>
                                                <p class="Error" style="display:none;">Please select dates.</p>

                                            </div>  
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </br>
                        
                        <table style="cursor:pointer" class="table table-striped table-bordered table-hover table-checkable order-column" id="report_tbl">
                            <thead>
                                <tr>
                                    <td width="40%">Labour Name</td>
                                    <td>Engineer Tauheed</td>
                                    <td>Engineer Saad</td>
                                    <td>Engineer Parsad</td>
                                    <td>Engineer Yousf</td>
                                    <td>Overall</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </form> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- END DASHBOARD STATS 1-->
</div>
</div>
</div> 
<!-- varibales for global use... -->
<script>
window.table_id = "";
</script>        
<?php $this->load->view('layouts/footer'); ?>
<?php $this->load->view('layouts/common_js'); ?> 

</body>
</html>