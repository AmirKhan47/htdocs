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
    <title>Admin Dashboard| Automated Patient Support System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-info">
        <div class="container pl-0 ml-0">
            <a class="navbar-brand text-light bg-light" href="#"><img src="<?php echo SURL.'assets/logo/logo1.jpg';?>" height="30px"/></a>
            <a href="" class="text-light">Automated Hospital System</a>
            <ul class="nav">
                <li class="nav-item mr-auto text-light">
                    Hello, Admin!
                </li>
                <li class="nav-item">
                    <a class="text-light ml-2 font-weight-bold" href="<?php echo SURL.'Dashboard/hospital';?>">Log out</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-8 bg-light mt-3 shadow mb-3 text-center">
                <h2 class="display-4 text-center">Doctors</h2>
                <hr>
                <a class="btn btn-info" href="<?php echo SURL.'Admin/view_doctor'; ?>" name="" type="">Add Doctor</a>
                <table class="table mt-3">
                        <tr>
                          <th>Doctor ID</th>
                          <th>Doctor Name</th>
                          <th>Doctor Email</th>
                          <th>Doctor Password</th>
                          <!-- <th>View</th> -->
                          <th class="hidden-xs">Action</th>
                        </tr>
                          <?php 
                      $i=0;
                      foreach($user_list As $key=>$val) {?>
                    <tr>
                      <td class="check hidden-xs">
                      <?php echo $i+1?>
                      </td>
                      
                      <td>
                         <?php echo $val['name'];?>
                      </td>
                      <td>
                         <?php echo $val['email'];?>
                      </td>
                       <td>
                         <?php echo $val['password'];?>
                      </td>
                    <td class="actions">
                        <div class="action-buttons">
                         <a class="btn btn-info"  href="<?php echo SURL.'Admin/delete_doctor/'.$val['id'];?>" onclick="return confirm('Are You sure you want to delete the User?');">Delete</a>
                        </div>
                      </td>
                    </tr>
                       <?php $i++; } ?> 
                   </table>
                    <hr>
                    
            </div>
        </div>

        <hr>

        <div class="row">
                <div class="col-md-8 bg-light mt-3 shadow mb-3 text-center">
                    <h2 class="display-4 text-center">Medical Assitants</h2>
                    <hr>
                    <!-- <button class="btn btn-info" name="" type="">Add Medical Assistant</button> -->
                    <a class="btn btn-info" href="<?php echo SURL.'Admin/view_assistant'; ?>">Add Medical Assistant</a>
                    <table class="table mt-3">
                           <tr>
                          <th>Assistant ID</th>
                          <th>Assistant Name</th>
                          <th>Assistant Email</th>
                          <th>Assistant Password</th>
                          <!-- <th>View</th> -->
                          <th class="hidden-xs">Action</th>
                        </tr>
                        </tr>
                          <?php 
                      $i=0;
                      foreach($assistant As $key=>$val) {?>
                    <tr>
                      <td class="check hidden-xs">
                      <?php echo $i+1?>
                      </td>
                      
                      <td>
                         <?php echo $val['name'];?>
                      </td>
                      <td>
                         <?php echo $val['email'];?>
                      </td>
                       <td>
                         <?php echo $val['password'];?>
                      </td>
                    <td class="actions">
                        <div class="action-buttons">
                         <a class="btn btn-info"  href="<?php echo SURL.'Admin/delete_assistant/'.$val['id'];?>" onclick="return confirm('Are You sure you want to delete the User?');">Delete</a>
                        </div>
                      </td>
                    </tr>
                       <?php $i++; } ?> 
                              
                        </table>
                        <hr>
                  
                </div>
            </div>

            <hr>


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