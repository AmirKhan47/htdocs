<!DOCTYPE html>
<html>
<head>
	<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;    
}
</style>
 <style type="text/css">
            @media print
            {
                #printPageButton
                {
                    display: none;
                }
            }
        </style>
	<title>Undertaking Page</title>
</head>
<body>
	<div>
		<img style="margin-left: 202px;height: 145px;" src="<?php echo SURL.'\assets\img\logo2.PNG';?>">
	</div>
	<br/>
<div style="float: left;margin-left: 15px;">
	<label>Student Name*</label>
	<input type="text" style="text-transform: uppercase;" value="<?php echo $student['student_name']; ?>" name="">
</div>
<div style="margin-left: 350px;">
	<label>CNIC/B.Form No*</label>
	<input type="text" value="<?php echo $student['student_national_id']; ?>" name="">
</div>
<br/>
<div style="float: left;margin-left: 23px;">
	<label>Father Name*</label>
	<input type="text" style="text-transform: uppercase;" value="<?php echo $father['guardian_name']; ?>" name="">
</div>
<div style="margin-left: 383px;">
	<label>Father CNIC*</label>
	<input type="text" value="<?php echo $father['guardian_national_id']; ?>" name="">
</div>
<br/>
<div style="float: left;margin-left: 18px;">
	<label>Mother Name*</label>
	<input type="text" style="text-transform: uppercase;" value="<?php echo $mother['guardian_name']; ?>" name="">
</div>
<div style="margin-left: 377px;">
	<label>Mother CNIC*</label>
	<input type="text" value="<?php echo $mother['guardian_national_id']; ?>" name="">
</div>
<br/>
<div style="float: left;margin-left: 59px;">
	<label>Gender*</label>
	<select class="form-control" id="gender" name="student_gender" required>
                                                   <option value="">Select</option>
                                                    <option value="male"
                                                        <?php
                                                            if($student['student_gender']=='male')
                                                            {
                                                                echo 'selected';
                                                            }
                                                        ?>
                                                        >
                                                        Male
                                                    </option>
                                                   <option value="female" <?php if($student['student_gender']=='female')
                                                   {
                                                    echo 'selected';
                                                   } ?>>Female</option>
                                                             </select>
</div>
<div style="margin-left: 383px;">
	<label>Date of Birth*</label>
	<select class="_58mq" name="student_date_of_birth_day" data-rule-required="true" >
                                                    <option value="<?php echo $student_date_of_birth_day ;?>">
                                                        <?php echo $student_date_of_birth_day ;?>
                                                    </option>
                                                    <?php 
                                                    for ($i=1; $i <= 31; $i++)
                                                    { 
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <select class="_58mq" name="student_date_of_birth_month" data-rule-required="true" >
                                                    <option value="<?php echo $student_date_of_birth_month ;?>">
                                                        <?php echo $student_date_of_birth_month ;?>
                                                    </option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sept</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
                                                </select>
                                                <select class="_58mq" name="student_date_of_birth_year" data-rule-required="true">
                                                   <option value="<?php echo $student_date_of_birth_year ;?>">
                                                        <?php echo $student_date_of_birth_year ;?>
                                                    <?php 
                                                    $year = date("Y"); // get the year part of the current date
                                                    $minYear = $year - 50;
                                                    for ($i=$year; $i >= $minYear; $i--) { 
                                                       echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                    ?>
                                                </select>
</div>
<br/>
<div style="float: left;margin-left: 34px;">
	<label>Nationality*</label>
	<select class="form-control" data-rule-required="true" id="nationality" name="student_nationality">
                                                    
                                                      <option value="<?php echo $student['student_nationality']; ?>"><?php echo $student['student_nationality']; ?></option>
                                                       <option value="Pakistan">Pakistan</option>
                                                        <option value="Foreign">Foreign</option>


                                                    </select>
</div>
<div style="margin-left: 387px;">
	<label>Place of Birth</label>
	<input type="text" value="<?php echo $student['student_place_of_birth']; ?>" name="">
</div>
<br/>
<div style="float: left;margin-left: 59px;">
	<label>Religion</label>
	<select class="form-control"  id="student_religion" name="religion">
                                           <option value="<?php echo $student['student_religion']; ?>"><?php echo $student['student_religion']; ?></option>
                                           <option value="Muslim">Muslim</option>
                                           <option value="Other">Other</option>
                                           
                                                     </select>
</div>
<div style="margin-left: 430px;">
	<label>Email*</label>
	<input type="text" value="<?php echo $student['contact_email']; ?>" name="">
</div>
<br/>
<div style="float: left;margin-left: 29px;">
	<label>Office Phone</label>
	<input type="text" value="<?php echo $student['contact_line']; ?>" name="">
</div>
<div style="margin-left: 423px;">
	<label>Mobile*</label>
	<input type="text" value="<?php echo $student['contact_cell']; ?>" name="">
</div>
<br/>
<div style="float: left;margin-left: 2px;">
	<label>Reason for leaving</label>
    <textarea type="text" name="registration_reason_for_leaving"><?php echo $student['registration_last_school_reason_for_leaving']; ?></textarea>
    
</div>
<div style="margin-left: 398px;">
	<label>Res.Address</label>
	<textarea type="text" name="address_local" placeholder="Permanent"><?php echo $student['address_local']; ?></textarea>
</div>
<br/>
<div style="float: left;margin-left: 48px;">
	<label>Admission </label>
	<select class="_58mq" name="registration_required_from_day" data-rule-required="true" >
                                                    <option value="<?php echo $registration_required_from_day ;?>">
                                                        <?php echo $registration_required_from_day ;?>
                                                    </option>
                                                    <?php 
                                                    for ($i=1; $i <= 31; $i++) { 
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <select class="_58mq" name="registration_required_from_month" data-rule-required="true" >
                                                    <option value="<?php echo $registration_required_from_month ;?>">
                                                        <?php echo $registration_required_from_month ;?>
                                                    </option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sept</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
                                                </select>
                                                <select class="_58mq" name="registration_required_from_year" data-rule-required="true">
                                                    <option value="<?php echo $registration_required_from_year ;?>">
                                                        <?php echo $registration_required_from_year ;?>
                                                    </option>
                                                    <?php 
                                                    $year = date("Y"); // get the year part of the current date
                                                    $minYear = $year + 50;
                                                    for ($i=$year; $i <= $minYear; $i++) { 
                                                       echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                    ?>
                                                </select><br/>
                                                required from*
</div>
<div style="margin-left: 338px;">
	<label>Last School Attented*</label>
	<input type="text" data-rule-required="" data-rule-maxlength="80" name="registration_last_school_name" id="las" pattern="[a-zA-Z0-9\s]+" class="form-control" placeholder="" value="<?php echo $student['registration_last_school_name']; ?>">
	
</div>
<br/>
<div style="float: left;margin-left: 82px;">
	<label>From</label>
	 <select class="_58mq" name="registration_last_school_from_day" data-rule-required="true" >
                                                    <option value="<?php echo $registration_last_school_from_day ;?>">
                                                        <?php echo $registration_last_school_from_day ;?>
                                                    </option>
                                                    <?php 
                                                    for ($i=1; $i <= 31; $i++) { 
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <select class="_58mq" name="registration_last_school_from_month" data-rule-required="true">
                                                    <option value="<?php echo $registration_last_school_from_month ;?>">
                                                        <?php echo $registration_last_school_from_month ;?>
                                                    </option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sept</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
                                                </select>
                                                <select class="_58mq" name="registration_last_school_from_year" data-rule-required="true">
                                                    <option value="<?php echo $registration_last_school_from_year ;?>">
                                                        <?php echo $registration_last_school_from_year ;?>
                                                    </option>
                                                    <?php 
                                                    $year = date("Y")-1; // get the year part of the current date
                                                    $minYear = $year - 50;
                                                    for ($i=$year; $i >= $minYear; $i--) { 
                                                       echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                    ?>
                                                </select>
</div>
<div style="margin-left: 461px;">
	<label>To</label>
	<select class="_58mq" name="registration_last_school_to_day" data-rule-required="true" >
                                                    <option value="<?php echo $registration_last_school_to_day ;?>">
                                                        <?php echo $registration_last_school_to_day ;?>
                                                    </option>
                                                    <?php 
                                                    for ($i=1; $i <= 31; $i++) { 
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <select class="_58mq" name="registration_last_school_to_month" data-rule-required="true" >
                                                    <option value="<?php echo $registration_last_school_to_month ;?>">
                                                        <?php echo $registration_last_school_to_month ;?>
                                                    </option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sept</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
                                                </select>
                                                <select class="_58mq" name="registration_last_school_to_year" data-rule-required="true">
                                                    <option value="<?php echo $registration_last_school_to_year ;?>">
                                                        <?php echo $registration_last_school_to_year ;?>
                                                    </option>
                                                    <?php 
                                                    $year = date("Y"); // get the year part of the current date
                                                    $minYear = $year - 50;
                                                    for ($i=$year; $i >= $minYear; $i--) { 
                                                       echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                    ?>
                                                </select>
</div>
<br/>
<div style="float: left;margin-left: 76px;">
	<label>Class*</label>
	 <select type="text" data-rule-required="true" id="class" name="class_name" class="form-control"  value="<?php $student['class_id']; ?>">
                                                    <?php foreach ($classes as $class) 
                                                        {
                                                            echo '<option value="'.$class['id'].'"';
                                                            if($class['id']==$student['class_id'])
                                                            {
                                                                echo "selected";
                                                            }
                                                            echo '>'.$class['class_name'].'</option>';
                                                        }
                                                    ?>
                                                </select>
</div>
<div style="margin-left: 425px;">
	<label>Branch*</label>
	<select type="text" data-rule-required="true" id="branch" id="branch" class="form-control" name="branch_name" value="<?php $student['branch_id']; ?>">
                                                     <?php foreach ($branches as $branch) {
                                                        echo '<option value="'.$branch['id'].'"';
                                                        if($branch['id']==$student['branch_id']){echo "selected";}
                                                        echo '>'.$branch['branch_name'].'</option>';
                                                        }
                                                    ?>
                                                </select>
</div>
<br/>
<!-- <div style="float: left;margin-left: 40px;">
	<label>Test Result*</label>
	<select class="form-control" data-rule-required="true" name="registration_test" required>
                                                    <option value="">Select Test Result</option>
                                                    <option value="Fail" <>Fail</option>
                                                    <option value="Pass">Pass</option>        
                                                </select>
</div> -->
<!-- <div style="margin-left: 366px;">
	<label>Registration Fee*</label>
	<input type="text" value="<?php echo $student['registration_fee']; ?>" name="">
</div> -->
<!-- <br/> -->
<div>
	<label style="margin-left: 15px;"><b><u>Siblings Registered as Same CNIC:</u></b></label>
	<table style="margin-left: 15px;width: 70%">
  <tr>
    <th>S.No</th>
    <th>Name</th>
    <th>Roll No</th>
  </tr>
  <tr>
    <?php
                                           if(!$siblings){}else{
                                           $i=1; 
                                           foreach($siblings as $sibling){
                                                echo '<tr>';
                                                echo '<th scope="row">'.$i++.'</th>';
                                                echo '<td style="text-transform: uppercase;">'.$sibling['student_name'].'</td>';
                                                echo '<td>'.$sibling['student_roll_no'].'</td>';
                                                echo '</tr>';
                                            } } ?>
  </tr>
</table>
</div>
<div>
       <p name="nationality">
         I, ___________________________________ son/daughter/father/guardian of ___________________________________ hereby solemnly certify that the above particulars are correct to the best of my knowledge. I also affirm that I have carefully read and the student name, father name, date of birth and other information provided is correct and verified from present academic credentials/personal identification records i.e Matric/F.sc/CNIC/B-Form. This may appear on academic credentials of GSIS. I take full responsibility, in case, any of the above particulars are found incorrect/ false.
       </p>
</div>
<br/>
       <div>
       	<label style="text-decoration-line: overline;margin-left: 500px;">Parent Signature</label>
       </div><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <button type="button" id="printPageButton" onclick="window.print();">Print</button>
        <script type="text/javascript">
            $(document).ready(function()
            {
                $('#printPageButton').click();    
            });
        </script>
    </body>
</html>