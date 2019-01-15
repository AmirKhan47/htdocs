<?php
   if(count($logs)>0){

?>
    <table class="table table-striped table-bordered table-hover" id="activity-table">
        <thead>
            <tr>
                <th> Login Time</th>
                <th> Logout Time</th>
                <th> Status </th>
            </tr>
        </thead>
        <tbody>                                
    
<?php
    foreach ($logs as $key => $value) {
?>
            <tr>
                <td><?= date('h:i A', strtotime($value['login_time']));?></td>
                <td><?= date('h:i A', strtotime($value['logout_time']));?></td>
                <td>
                    <?php
                     if($value['status']==1){
                        echo '<span class="label label-success">Logout</span>';
                     }elseif ($value['status']==2) {
                         echo '<span class="label label-danger">Session Expire</span>';
                     }elseif ($value['status']==0) {
                         echo '<span class="label label-info">Login</span>';
                     }
                    ?>
                </td>
            </tr>
<?php }?>
        </tbody>
    </table>

<?php
}
else{
    echo '<div class="alert alert-danger">
            No Record Found
         </div>';
}
?>