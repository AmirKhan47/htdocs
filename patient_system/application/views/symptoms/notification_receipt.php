<?php
if($this->session->has_userdata('id'))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reciept-Patient | Automated patient support system</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body style="background: url('<?php echo SURL.'assets/logo/medical-background-with-loop_n26ve-_yg__F0005.png';?>')no-repeat center;">
        <nav class="navbar navbar-light bg-info">
            <div class="container pl-0 ml-0">
                <a class="navbar-brand text-light bg-light" href="#"><img src="<?php echo SURL.'assets/logo/logo1.jpg';?>" height="30px"/></a>
            </div>
           
              <a class="text-light font-weight-bold" href="<?php echo SURL.'Dashboard/hospital';?>">Logout</a>
            
        </nav>
        <div class="container">
            <div class="row">
                 <form method="post" action="<?php echo SURL. 'Notification/message_review' ?>"> 
                <div class="col-md-8 mx-auto bg-light mt-5 mb-5 font-weight-light p-5 shadow">
                    
                    <hr/>
                      <div class="row">
                        <div class="col-md-4">
                             <h4 class="font-weight-light">Patient Name :</h4>
                        </div>
                        <div class="col-md-8">
                          <label name="name1"> <?php echo $disease['name'];?></label>
                          <input type="hidden" name="name" value="<?php echo $disease['name'];?>">
                        </div>
                    </div>
                    <hr>
                   <div class="row">
                        <div class="col-md-4">
                             <h4 class="font-weight-light">Disease :</h4>
                        </div>
                        <div class="col-md-8">
                          <label name="disease_name1"> <?php echo $disease['disease_name'];?></label>
                          <input type="hidden" name="disease_name" value="<?php echo $disease['disease_name'];?>">
                        </div>
                    </div>
                    <hr/>

                    <div class="row">
                            <div class="col-md-4">
                                 <h4 class="font-weight-light">Description :</h4>
                            </div>
                            <div class="col-md-8">
                                <label name="disease_description1"><?php echo $disease['disease_description'];?></label>
                                <input type="hidden" name="disease_description" value="<?php echo $disease['disease_description'];?>">
                          </div>
                    </div>
                    <hr>

                    <div class="row">
                            <div class="col-md-4">
                                 <h4 class="font-weight-light">Remedy :</h4>
                            </div>
                            <div class="col-md-8">
                                <label name="disease_remedy1"><?php echo $disease['disease_remedy'];?></label>
                                 <input type="hidden" name="disease_remedy" value="<?php echo $disease['disease_remedy'];?>">
                           </div>
                    </div>
                    <hr>

                    <div class="row">
                            <div class="col-md-4">
                                 <h4 class="font-weight-light">Medicine Name:</h4>
                            </div>
                            <div class="col-md-8">
                                <label name="medicine_name1"><?php echo $disease['medicine_name'];?></label>
                                 <input type="hidden" name="medicine_name" value="<?php echo $disease['medicine_name'];?>">
                           </div>
                    </div>
                    <hr>

                     <div class="row">
                            <div class="col-md-4">
                                 <h4 class="font-weight-light">Direction of Use :</h4>
                            </div>
                            <div class="col-md-8">
                                <label name="medicine_usage1"><?php echo $disease['medicine_usage'];?></label>
                                <input type="hidden" name="medicine_usage" value="<?php echo $disease['medicine_usage'];?>">
                           </div>
                    </div>

                   
                    <hr>
                     <div class="row">
                            <div class="col-md-4">
                                 <h4 class="font-weight-light">Medical Histroy:</h4>
                            </div>
                            <div class="col-md-8">
                                <label name="illness1"><?php echo $disease['illness'];?></label>
                                <input type="hidden" name="illness" value="<?php echo $disease['illness'];?>">
                           </div>
                    </div>
                     
                               
                                <input type="hidden" name="cnic" value="<?php echo $disease['cnic'];?>">
                         


                   
                    <hr>
                    <div class="row">
                            <div class="col-md-4">
                                 <h4 class="font-weight-light">Doctor's Message and Recommendations :</h4>
                            </div>
                            <div class="col-md-8">
                                <textarea name="doctor_message" id="doctor_message" cols="30" rows="10" style="width:100%;"></textarea>
                           </div>
                    </div>
                    <div class="mt-5 text-right">
                           
                            <input type="submit" name="review" class="btn btn-info" value="Reviewed" />
                          
                    </div>
                    
                </div>
                </form>
            </div>
        </div>
    
</body>
</html>
<?php
}
else
{
  redirect('Login/validate_user');
}
?>