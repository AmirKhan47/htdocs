<?php
 $subject_id=array(); 
 foreach ($student_subjects as $key => $value) {
     $subject_id[]=$value['subject_id'];
 }
?>
<div class="row">
<?php
  if(count($subjects)>0){
    foreach ($subjects as $key => $value) {
?><!-- <div class="col-md-12">
<?php
        if($value['subject_group'] !=''){
            echo '<b>'.$value['subject_group'].'</b>';
        }else{
             echo '<b>No Group</b>';
        }
?>
</div> -->
<?php
            if(!in_array($value['id'],$subject_id)){ 
?>
                <div class="col-md-5">
                    <div class="md-checkbox">
                        <input type="checkbox" id="checkbox<?php echo $value['id'];?>" name="subjectscheckbox[]" class="md-check" value="<?php echo $value['id'];?>">
                        <label for="checkbox<?php echo $value['id'];?>">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span> <?php echo $value['subject_name'];?> </label>
                    </div>
                </div>


<?php
    }
?>
                                                          
<!-- <?php
            if($value['subject_type'] !=''){
?>
                <ul style="font-size: 10px;">
                    <li><?php echo $value['subject_type'];?></li>
                </ul>
<?php       }
?> -->
        
    
<?php }
    }
?>
</div>


