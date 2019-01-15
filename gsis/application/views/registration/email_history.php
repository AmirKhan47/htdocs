        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php echo SURL;?>school/admin_dashboard">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo SURL;?>admin/portal">Pending Registration</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Email History</span>
                </li>
            </ul>
        </div>
        <h3 class="page-title"> Test History </h3>
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-seagreen">
                    <i class="fa fa-user font-green-seagreen"></i>
                    <span class="caption-subject bold uppercase"> Test History List </span>
                </div> 
            </div>
            <div class="portlet-body form">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th> Test Date </th>
                            <th> Test Time </th>
                            <th> Branch </th>
                        </tr>
                    </thead>
                    <tbody>     
                        <?php
                            if(!$meetings)
                            {

                            }
                            else
                            {
                                foreach ($meetings as $meeting)
                                {
                                    echo '<tr>';
                                    echo '<input type="hidden" id="meeting_id" value="'.$meeting['id'].'">';
                                    echo '<td>'.$meeting['meeting_from_date'].'</td>';
                                    echo '<td>'.$meeting['meeting_from_time'].'</td>';
                                    echo '<td>'.$meeting['branch_name'].'</td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <h3 class="page-title"> Email History </h3>
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-seagreen">
                    <i class="fa fa-user font-green-seagreen"></i>
                    <span class="caption-subject bold uppercase"> Email History List </span>
                </div> 
            </div>
            <div class="portlet-body form">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th> Date Time </th>
                            <th> To </th>
                            <th> Subject </th>
                            <th> Message </th>
                        </tr>
                    </thead>
                    <tbody>     
                        <?php
                            if(!$emails)
                            {

                            }
                            else
                            {
                                foreach ($emails as $email)
                                {
                                    echo '<tr>';
                                    echo '<td>'.$email['email_datetime'].'</td>';
                                    echo '<input type="hidden" id="email_id" value="'.$email['id'].'">';
                                    echo '<td>'.$email['email_to'].'</td>';
                                    echo '<td>'.$email['email_subject'].'</td>';
                                    echo '<td>'.$email['email_message'].'</td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div> 
        <script src="<?php echo base_url(). 'assets/global/plugins/respond.min.js'?>"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/excanvas.min.js'?>"></script> 
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url(). 'assets/global/plugins/jquery.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/bootstrap/js/bootstrap.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/js.cookie.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jquery.blockui.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/uniform/jquery.uniform.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'?>" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(). 'assets/global/scripts/app.min.js'?>" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url(). 'assets/global/plugins/jquery-validation/js/jquery.validate.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/global/plugins/jquery-validation/js/additional-methods.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url(). 'assets/layouts/layout/scripts/demo.min.js'?>" type="text/javascript"></script>
         <script src="<?php echo base_url(). 'assets/layouts/global/scripts/quick-sidebar.min.js'?>" type="text/javascript"></script> 
        <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>   
        <script src="<?php echo base_url(). 'assets/pages/scripts/validation.js'?>" type="text/javascript"></script>
   </body>
</html>