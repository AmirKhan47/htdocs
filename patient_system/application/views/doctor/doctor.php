<?php
if($this->session->has_userdata('id'))
{
$notification=admin_notifications();
$total_notification=notification_count();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <title>Doctor Portal</title>
  </head>
  <body style="background: url('<?php echo SURL.'assets/logo/medical-background-with-loop_n26ve-_yg__F0005.png';?>')center;">
    <!-- Just an image -->
  <nav class="navbar navbar-light bg-info">
    <div class="container pl-0 ml-0">
      <a class="navbar-brand text-light bg-light" href="#"><img src="<?php echo SURL.'assets/logo/logo1.jpg';?>" height="30px"/></a>
      <a href="" class="text-light">Automated Hospital System</a>
        <ul class="nav">
          <li class="nav-item text-light mt-2 pr-2">Welcome, Doctor</li>
          <!-- <li class="nav-item mr-2"><i class="far fa-bell fa-2x"></i> </li -->
            <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" height=20px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <i class="far fa-bell fa-2x"></i><span class="badge"><?= count($total_notification);?></span>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <?php
      if(count($notification)>0){
        foreach ($notification as $key => $value) {
    ?>
    <a class="dropdown-item" href="<?= SURL.'Notification/update_status/'.$value['id'];?>" 
      <?php
         if($value['emergency']==1){?>
          style="color:red;"
          <?php } ?>
      ><?= $value['title'];?></a>
    <?php
        }
        ?>
       <!--  <a class="dropdown-item" href="<?= SURL.'Notification/';?>">View all notifications</a> -->
    <?php
      }else{
    ?>
    <a class="dropdown-item" href="#">no notification</a>
    <!-- <a class="dropdown-item" href="<?= SURL.'Notification/';?>">View all notifications</a> -->
    <?php }


        
    ?>
  </div>
</div>
          <li class="nav-item">
            <a class="text-light font-weight-bold pr-3"  href="<?php echo SURL.'Dashboard/hospital';?>">Logout</a>
          </li>
        </ul>
    </div>
  </nav>
  <div class="container-fluid">
      <div class="row">
     <nav class="col-md-2 d-none d-md-block sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active text-secondary" href="#">
                  <span data-feather="home"></span>
                  Doctor <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo SURL.'Login/validate_user';?>">
                  <span data-feather="shopping-cart"></span>
                  Medical Assistant
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo SURL.'Login/validate_user';?>">
                  <span data-feather="bar-chart-2"></span>
                  Admin
                </a>
              </li>
           </ul>
         </div>
        </nav>
     <main role="main" class="col-md-10  col-lg-6  ml-5">
  <div class="container bg-light mt-5 mr-3">
    <div class="row">
      <div class="col-md-8">
        <table class="table mt-5 bg-light ml-5">
          <tr>
            <th>Patient ID</th>
            <th>Patient Name</th>
            <th>Illnes/Disease</th>
            <th class="hidden-xs">Action</th>
          </tr>
            <tr>
               <?php 
                      $i=0;
                      foreach($doctor_view As $key=>$val) {?>
                    <tr>
                      <td class="check hidden-xs">
                      <?php echo $i+1?>
                      </td>
                      
                      <td>
                         <?php echo $val['name']?>
                      </td>
                      <td>
                         <?php echo $val['disease_name']?>
                      </td>
                     
          
                   <td class="actions">
                        <div class="action-buttons">
                           <a class="btn btn-info" href="<?php echo SURL.'Doctor/edit_notification/'.$val['id'];?>">View</a>
                       </div>
                      </td>
                    </tr>
                       <?php $i++; } ?> 
          <!--   <tr>
              <td>#2</td>
              <td>Ali</td>
              <td>03xxxxxxxxxxx</td>
            </tr>
            <tr>
              <td>#3</td>
              <td>Qasim</td>
              <td>03xxxxxxxxxxx</td>
            </tr> -->
        </table>
      </div>

     <!--  <div class="col-md-3 mt-5 offset-md-1">

        <div class="card text-dark border-info p-3">
          <p class="lead">Doctor Name : </p>
          <p class="lead">Doctor Email : </p>
          <p class="lead">Doctor Phone : </p>
        </div>
      </div> -->
    </div>
  </div>
  </main>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>
<?php
}
else
{
  redirect('Login/validate_user');
}
?>
