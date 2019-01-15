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
<body style="background: url('<?php echo SURL.'assets/logo/medical-background-with-loop_n26ve-_yg__F0005.png';?>')center;">
        <nav class="navbar navbar-light bg-info">
            <div class="container pl-0 ml-1">
               <a class="navbar-brand text-light bg-light" href="#"><img src="<?php echo SURL.'assets/logo/logo1.jpg';?>" height="30px"/></a>
                <a class="navbar-brand text-light" style="margin-right:450px" >Medical Prescription</a>
            </div>
           
              <a class="text-light font-weight-bold" href="<?php echo SURL.'Dashboard/hospital';?>">Logout</a>
            
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto bg-light mt-5 mb-5 font-weight-light p-5 shadow">
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                             <h4 class="font-weight-light">Disease :</h4>
                        </div>
                        <div class="col-md-8">
                          <label name"disease"> <?php echo $disease['disease_name'];?></label>
                        </div>
                    </div>
                    <hr/>

                    <div class="row">
                            <div class="col-md-4">
                                 <h4 class="font-weight-light">Description :</h4>
                            </div>
                            <div class="col-md-8">
                                <label name="description"><?php echo $disease['disease_description'];?></label>
                          </div>
                    </div>
                    <hr>

                    <div class="row">
                            <div class="col-md-4">
                                 <h4 class="font-weight-light">Remedy :</h4>
                            </div>
                            <div class="col-md-8">
                                <label name="remedy"><?php echo $disease['disease_remedy'];?></label>
                           </div>
                    </div>
                    <hr>

                    <div class="row">
                            <div class="col-md-4">
                                 <h4 class="font-weight-light">Medicine :</h4>
                            </div>
                            <div class="col-md-8">
                                <!-- <p class="lead"> -->
                                    <ul>
                                        <?php echo $disease['medicine_name'];?>
                                        
                                    </ul>
                                <!-- </p> -->
                            </div>
                    </div>
                    <hr>

                    <div class="row">
                            <div class="col-md-4">
                                 <h4 class="font-weight-light">Direction of Use :</h4>
                            </div>
                            <div class="col-md-8">
                                    <ul>
                                       <?php echo $disease['medicine_usage'];?>
                                    </ul>
                            </div>
                    </div>
                    <hr>
                    <div class="mt-5 text-right">
                           <form method="post" action="<?php echo SURL.'Doctor/doctor_review'; ?>">
                            <input type="hidden" name="patient_id" value="<?= $patient;?>">
                             <input type="hidden" name="disease_id" value="<?= $disease['disease_id'];?>">
                              <input type="hidden" name="emergency" value="<?= $emergency;?>">
                              <input type="hidden" name="history" value="<?=$history['id'];?>">
                            <input type="submit" name="send_to_doctor" class="btn btn-info" value="Send to Doctor" />
                            </form>
    
                    </div>
                    
                </div>
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