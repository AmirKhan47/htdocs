<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>login page</title>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
        
        <style>
            #response{display: none}
        </style>
    </head>
    <body>
        <div class="container" style="margin-top: 10%">
		    <blockquote>
			<div class="col-md-6 col-md-offset-3">
                <h2>TryCatch Classes : login page</h2>
                <a href="https://www.facebook.com/TryCatchClasses/">by TryCatch Classes</a>
            </div>
            <div class="row clear_fix">
                <div class="col-md-6 col-md-offset-3">
                    					<style>
                        #response{display: none}
                        div #fb, div #gp, div #tw{display: inline-block;}
                        #fb{width: 180px;}
                        #gp{width:  100px;}
                        #tw{width: 180px;}
                    </style>
					<div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
                    <div>
                        <div id="tw">
                            <a href="https://twitter.com/trycatchclasses" class="twitter-follow-button" data-show-count="false" data-size="medium">Follow @trycatchclasses</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                        </div>
                        <div id="gp">
                            <!-- Place this tag in your head or just before your close body tag. -->
                           <script src="https://apis.google.com/js/platform.js" async defer></script>
                           <!-- Place this tag where you want the +1 button to render. -->
                           <div class="g-plusone" data-href="https://plus.google.com/+TryCatchClassesMumbai"></div>
                       </div>
					    <div id="fb">
							<div class="fb-like" data-href="https://www.facebook.com/TryCatchClasses/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
						</div>
                    </div>
					</blockquote>
					<br/>
                    <p class="alert alert-danger" id="response"><b>INVALID USER NAME OR PASSWORD</b></p>
                    <form id="frm_login" role="form" action="<?php echo base_url(); ?>index.php/auth/login" method="POST">
                        <div class="form-group">
                          <label for="">User name</label>
                          <input type="text" class="form-control" name="username"  placeholder="User name">
                        </div>
                        <div class="form-group">
                          <label for="">Password</label>
                          <input type="password" class="form-control" name="password"  placeholder="Password">
                        </div>
                        <input type="submit" class="btn btn-info btn-block" value="submit">
                      </form>
                    
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function (){
            $("#frm_login").submit(function (e){
                e.preventDefault();
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                
                $.ajax({
                   url:url,
                   type:method,
                   data:data
                }).done(function(data){
                   if(data !== '')
                    {
                        $("#response").show('fast');
                        $("#response").effect( "shake" );
                        $('#frm_login')[0].reset();
                    }
                    else
                    {
                    window.location.href='<?php echo base_url() ?>index.php/home/';
                    throw new Error('go');
                    } 
                });
            });
            
            $( "div" ).each(function( index ) {
            var cl = $(this).attr('class');
            if(cl =='')
                {
                    $(this).hide();
                }
            });
            
        });
        </script>
        
    </body>
</html>
