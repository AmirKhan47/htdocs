
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Portal</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>STAFF</span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <!-- <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                                <i class="icon-calendar"></i>&nbsp;
                                <span class="thin uppercase hidden-xs"></span>&nbsp;
                                <i class="fa fa-angle-down"></i>
                            </div> -->
                        </div>
                    </div>
                    <h3 class="page-title"> Staff Portal
                       
                    </h3>
                      <div class="row">
                        <div class="col-md-12">
                           
                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        Registered Forms </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <!-- <a href="#portlet-config" data-toggle="modal" class="config"> </a> -->
                                        <a href="javascript:;" class="reload"> </a>
                                        <!-- <a href="javascript:;" class="remove"> </a> -->
                                    </div>
                                </div>
                                <div class="portlet-body flip-scroll">
                                    <table class="table table-bordered table-striped table-condensed flip-content">
                                        <thead class="flip-content">
                                            <tr>
                                                <th> Name </th>
                                                <th> CNIC No </th>
                                                <th> Disable </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                   <?php
//print_r($students);
                                   if(!$students){}else{
foreach ($students as $student) {
    echo '<tr>';
    echo '<td>'.$student['student_name'].'</td>';
    echo '<td>'.$student['student_national_id'].'</td>';
    echo '<td>';
    echo $student['student_is_disable']?'Yes':'No';
    echo '</td>';

    echo '<td><div id="fruit-select" class="dropdown dropselect">
                <input type="hidden" name="fruit" value="">
               
                <button  class="btn btn-circle btn-secondary btn-xs  dropdown-toggle" type="button" id="fruit" data-toggle="dropdown" aria-expanded="true">
                    <span class="dropdown-label">Dropdown</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="option-post-cleanup">
                    <li role="presentation"><a data-value="orange" data-selected="selected" role="menuitem" tabindex="-1">Orange</a></li>
                    <li role="presentation"><a data-value="pear" role="menuitem" tabindex="-1">Pear</a></li>
                    <li role="presentation"><a data-value="apple" role="menuitem" tabindex="-1">Apple</a></li>
                    <li role="presentation"><a data-value="" role="menuitem" tabindex="-1">None</a></li>
                </ul>
            </div>  ';
    echo '<button type="button" class="btn btn-circle green btn-xs">Detail</button></td>';
    echo '</tr>';
}
}
?>
                                            <!-- <tr>
                                                <td> 1 </td>
                                                <td> teyr </td>
                                                <td> dshfghd</td>
                                                <td> 27568-6757875-1 </td>
                                                <td> 
                                                      <div id="fruit-select" class="dropdown dropselect">
                <input type="hidden" name="fruit" value="">
               
                <button  class="btn btn-circle btn-secondary btn-xs  dropdown-toggle" type="button" id="fruit" data-toggle="dropdown" aria-expanded="true">
                    <span class="dropdown-label">Dropdown</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="option-post-cleanup">
                    <li role="presentation"><a data-value="orange" data-selected="selected" role="menuitem" tabindex="-1">Orange</a></li>
                    <li role="presentation"><a data-value="pear" role="menuitem" tabindex="-1">Pear</a></li>
                    <li role="presentation"><a data-value="apple" role="menuitem" tabindex="-1">Apple</a></li>
                    <li role="presentation"><a data-value="" role="menuitem" tabindex="-1">None</a></li>
                </ul>
            </div>  
                                                 </td>
                                                <td><button type="button" class="btn btn-circle green btn-xs">Assigned</button></td>
                                                
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                    <script src="<?php echo base_url(). 'assets/global/plugins/jquery.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/bootstrap/js/bootstrap.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/js.cookie.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jquery.blockui.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/uniform/jquery.uniform.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'?>" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(). 'assets/global/plugins/moment.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/morris/morris.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/morris/raphael-min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/counterup/jquery.waypoints.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/counterup/jquery.counterup.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/amcharts/amcharts.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/amcharts/serial.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/amcharts/pie.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/amcharts/radar.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/amcharts/themes/light.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/amcharts/themes/patterns.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/amcharts/themes/chalk.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/ammap/ammap.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/ammap/maps/js/worldLow.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/amcharts/amstockcharts/amstock.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/fullcalendar/fullcalendar.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/flot/jquery.flot.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/flot/jquery.flot.resize.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/flot/jquery.flot.categories.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jquery.sparkline.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js'?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(). 'assets/global/scripts/app.min.js'?>" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url(). 'assets/pages/scripts/dashboard.min.js'?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url(). 'assets/layouts/layout/scripts/layout.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/layouts/layout/scripts/jquery.dropselect.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/layouts/layout/scripts/demo.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/layouts/global/scripts/quick-sidebar.min.js'?>" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>    
    function display_fruit(){
        //get current value of select
        var value=$('#fruit-select').dropselect('value');
        //display red information line
        $("#display").html('<br><p>"'+value+'" selected. This will post a hidden input named "fruit" and a value of "'+value+'" if wrapped by a form element.</p>');
    }
    
    $(document).ready(function () {
        //make Bootstrap dropdown to behave like select
        //this is enough for most people! When user selects an option, a hidden input named "fruit" with the selected value is created.
        $('.dropselect').dropselect();
        
        //set onchange event handler to display red information line
        $('#fruit-select').on('change', display_fruit);      
    }); 
</script>
    </body>

</html> 