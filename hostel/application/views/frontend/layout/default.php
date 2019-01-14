<!DOCTYPE HTML>
    <head>
        <title><?php echo DEFAULT_TITLE; ?></title>
        <link rel="shortcut icon" href="<?php echo Admin_Assets;?>demo/default/media/img/logo/favicon.ico" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="keywords" content="g-13 shop islamabad tags, meta tag, meta tags seo, meta tags definition, what is a meta tag" />
        <link href="<?php echo Website_Assets;?>css/style.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="<?php echo Website_Assets;?>css/slider.css" rel="stylesheet" type="text/css" media="all"/>
        <script type="text/javascript" src="<?php echo Website_Assets;?>js/jquery-1.7.2.min.js"></script> 
        <script type="text/javascript" src="<?php echo Website_Assets;?>js/move-top.js"></script>
        <script type="text/javascript" src="<?php echo Website_Assets;?>js/easing.js"></script>
        <script type="text/javascript" src="<?php echo Website_Assets;?>js/startstop-slider.js"></script>
        <script type="text/javascript" src="<?php echo Website_Assets;?>js/jquery.accordion.js"></script>
        <script src="<?php echo Website_Assets;?>js/easyResponsiveTabs.js" type="text/javascript"></script>
        <link href="<?php echo Website_Assets;?>css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
        <link rel="stylesheet" href="<?php echo Website_Assets;?>css/global.css">
        <script src="<?php echo Website_Assets;?>js/slides.min.jquery.js"></script>
        <script type="text/javascript">
            $(document).ready(function() 
            {
                $("#posts").accordion({ 
                    header: "div.tab", 
                    alwaysOpen: false,
                    autoheight: false
                });
            });
        </script>
        <script>
            $(function(){
                $('#products').slides(
                {
                    preload: true,
                    preloadImage: 'img/loading.gif',
                    effect: 'slide, fade',
                    crossfade: true,
                    slideSpeed: 350,
                    fadeSpeed: 500,
                    generateNextPrev: true,
                    generatePagination: false
                });
            });
        </script>
    </head>
    <body>
        <div class="wrap">
            <div class="header">
        		<!-- footer content -->
        		<?php $this->load->view('frontend/layout/header'); ?> 
        		<!-- /footer content -->  
                <!-- page content -->
                <?php $this->load->view($content_for_layout); ?>
                <!-- /page content -->
            </div>
        <!-- footer content -->
        <?php $this->load->view('frontend/layout/footer'); ?>   
        <!-- /footer content -->

        <li><a href="#" target="_blank"><img src="<?php echo Website_Assets;?>images/facebook.png" alt="" /></a></li>
                            <li><a href="#" target="_blank"><img src="<?php echo Website_Assets;?>images/twitter.png" alt="" /></a></li>
                            <li><a href="#" target="_blank"><img src="<?php echo Website_Assets;?>images/skype.png" alt="" /> </a></li>
                            <li><a href="#" target="_blank"> <img src="<?php echo Website_Assets;?>images/dribbble.png" alt="" /></a></li>
                            <li><a href="#" target="_blank"> <img src="<?php echo Website_Assets;?>images/linkedin.png" alt="" /></a></li>
                            <div class="clear"></div>
                        </ul>
                    </div>
                </div>
            </div>          
        </div>
        <div class="copy_right">
            <p>&copy; 2018 Shopping. All rights reserved | Design by <a href="https://www.facebook.com/ballers999">Amir Khan</a></p>
        </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() 
            {           
                $().UItoTop({ easingType: 'easeOutQuart' });
            });
        </script>
        <a href="#" id="toTop"><span id="toTopHover"></span></a>
    </body>
</html>