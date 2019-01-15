<?php
if($this->session->has_userdata('id'))
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

    <title>Symptoms</title>
  </head>
  <body style="background: url('<?php echo SURL.'assets/logo/medical-background-with-loop_n26ve-_yg__F0005.png';?>')no-repeat center;">
    <nav class="navbar navbar-light bg-info">
      <div class="container pl-0 ml-0">
       <a class="navbar-brand text-light bg-light" href="#"><img src="<?php echo SURL.'assets/logo/logo1.jpg';?>" height="30px"/></a>
        <a class="navbar-brand text-light">Automated Patient Support System</a>
      <form method="post" action="<?php echo SURL.'Symtoms/symtoms' ?>">
      <ul class="nav">
        <li class="nav-item text-danger font-weight-bold bg-danger p-2">
          <label class="text-dark" for="checkbox">Emergency</label>
          
          <input type="checkbox" name="emergency" value="1">
        </li>
          <!-- <div class="form-check">
            <input class="form-check-input border-danger" type="radio" name="gridRadios" id="gridRadios1" value="option1">
            <label class="form-check-label" for="gridRadios1">
              Emergency
            </label>
          </div> -->
      </ul>
      </div>
    </nav>
    <div class="container bg-light mt-5 mb-5">
      <div class="row">
        <div class="col-md-8">
          <div id="wrapper">
            <div class="row">
              <div class="col-md-10">
                <h1 class="text-dark display-4">Symptoms</h1>
              </div>
            </div>
            <hr>
            
            <div class="form-group">
              <label for="">Symptom 1</label>
             <select class="form-control col-md-10" id="class" name="symtom_1" required="symtom_1">
                            <option value="">Select Symptoms</option>
                        <?php foreach($symtoms as $symptom => $s): ?>
                        <option value="<?php echo $s['symtoms_id']; ?>"><?php echo $s['symtoms_name']; ?></option>
                    <?php endforeach; ?>
                  </select>
            </div>
            <div class="form-group">
              <label for="">Symptom 2</label>
              <select class="form-control col-md-10" id="class" name="symtom_2" required="symtom_2">
                            <option value="">Select Symptoms</option>
                        <?php foreach($symtoms as $symptom => $s): ?>
                        <option value="<?php echo $s['symtoms_id']; ?>"><?php echo $s['symtoms_name']; ?></option>
                    <?php endforeach; ?>
                  </select>
            </div>
              <div class="form-group">
              <label for="">Symptom 3</label>
              <select class="form-control col-md-10" id="class" name="symtom_3" required="symtom_3">
                            <option value="">Select Symptoms</option>
                        <?php foreach($symtoms as $symptom => $s): ?>
                        <option value="<?php echo $s['symtoms_id']; ?>"><?php echo $s['symtoms_name']; ?></option>
                    <?php endforeach; ?>
                  </select>
            </div>
              <div class="form-group">
              <label for="">Symptom 4</label>
              <select class="form-control col-md-10" id="class" name="symtom_4" required="symtom_4">
                            <option value="">Select Symptoms</option>
                        <?php foreach($symtoms as $symptom => $s): ?>
                        <option value="<?php echo $s['symtoms_id']; ?>"><?php echo $s['symtoms_name']; ?></option>
                    <?php endforeach; ?>
                  </select>
            </div>
              <div class="form-group">
              <label for="">Symptom 5</label>
              <select class="form-control col-md-10" id="class" name="symtom_5" required="symtom_5">
                            <option value="">Select Symptoms</option>
                        <?php foreach($symtoms as $symptom => $s): ?>
                        <option value="<?php echo $s['symtoms_id']; ?>"><?php echo $s['symtoms_name']; ?></option>
                    <?php endforeach; ?>
                  </select>
            </div>
              <div class="form-group">
              <label for="">Symptom 6</label>
              <select class="form-control col-md-10" id="class" name="symtom_6">
                            <option value="">Select Symptoms</option>
                        <?php foreach($symtoms as $symptom => $s): ?>
                        <option value="<?php echo $s['symtoms_id']; ?>"><?php echo $s['symtoms_name']; ?></option>
                    <?php endforeach; ?>
                  </select>
            </div>
            <div class="form-group">
              <label for="">Symptom 7</label>
              <select class="form-control col-md-10" id="class" name="symtom_7">
                            <option value="">Select Symptoms</option>
                        <?php foreach($symtoms as $symptom => $s): ?>
                        <option value="<?php echo $s['symtoms_id']; ?>"><?php echo $s['symtoms_name']; ?></option>
                    <?php endforeach; ?>
                  </select>
            </div>
          </div>
          <div>
             <input type="hidden" name="patient_id" value="<?php echo $result['id']; ?>">
           <input type="submit" class="btn btn-info mb-3" name="submit" value="Save & Proceed">
          </div>
        
        </div>
        <div class="col-md-4 mb-3">
          <h1 class="text-dark display-4">Patient details</h1>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <div class="card bg-light border-info">
                <div class="card-body">
                   <!--  -->
                  <h5 class="card-title">Personal Details</h5>
                
                  <label class="card-text">Patient's name:<?php echo $result['name']; ?></label>
                   
                                   <label class="card-text">Patient's address:<?php echo $result['address']; ?></label>
                  <label class="card-text">Patient's CNIC:<?php echo $result['cnic']; ?></label>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <div class="card bg-light border-info">
                <div class="card-body">
                  <h5 class="card-title">Medical History</h5>
                  <p class="card-text">Illness:</p>
                 <input type="text" name="illness">
                  <p class="card-text">Reporting Date:</p>
                  <input type="date" name="reporting_date">
               </div>
              </div>
            </div>
          </div>
          </form>
        </div>
      </di>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script type="text/javascript" src="js/symptoms.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

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