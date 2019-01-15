<?php
if($this->session->userdata('id'))
{
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>Medical Assistant</title>
  </head>
  <body>
    <!-- Just an image -->
  <nav class="navbar navbar-light bg-info">
    <div class="container pl-0 ml-0">
      <a class="navbar-brand text-light" href="#"><img src="<?php echo SURL.'assets/logo/logo1.jpg';?>" height="30px"/></a>
      <a href="" class="text-light">Automated Hospital System</a>
        <ul class="nav">
          <li class="nav-item text-light mr-5">Welcome, Medical Assistant</li>
          <li class="nav-item">
            <a class="text-light font-weight-bold" href="<?php echo SURL.'Login/validate_user';?>">Logout</a>
          </li>
        </ul>
    </div>
  </nav>
    <div class="container-fluid">
      <div class="row">
     <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active text-secondary" href="#">
                  <span data-feather="home"></span>
                  Medical Assistant <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo SURL.'Login/validate_user';?>">
                  <span data-feather="shopping-cart"></span>
                   Doctor
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
     <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
           <div class="container bg-light mt-5">
    <div class="row">
      <div class="col-md-8">
        <table class="table mt-5">
          <tr>
            <th>Patient ID</th>
            <th>Patient's Name</th>
            <th>Patient's CNIC</th>
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
                         <?php echo $val['cnic']?>
                      </td>
                      <td>
                         <?php echo $val['disease_name']?>
                      </td>
                     
          
                   <td class="actions">
                        <div class="action-buttons">
                           <a class="btn btn-info" href="<?php echo SURL.'Medical_assistant/edit_assistant/'.$val['id'];?>">View</a>
                       </div>
                      </td>
                    </tr>
                       <?php $i++; } ?> 
           
        </table>
      </div>

      <div class="col-md-3 mt-5 offset-md-1">
        
       

        <div class="row mt-5 mb-5">
          <!-- <button class="btn btn-info text-light" type="button" name="button">Add New patient</button> -->
          <a href="<?php echo SURL.'Patient/patient_reg'; ?>" class="btn btn-info text-light">Add New patient</a>
        </div>

      </div>
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