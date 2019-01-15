<?php
   if(count($wip)>0){

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Sno</th>
                <th>Document Name</th>
                <th>Category</th>
                <th>Uploaded Date</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>                                
    
<?php
     $i=1;
    foreach ($wip as $key => $value) {
?>
            <tr>
                <td><?= $i;?></td>
                <td><?= 'pre_'.$value['document_name'];?></td>
                <td>
                    <?php
                        if($value['category_status']==1){
                            echo 'Quotation';
                        }
                    ?>
                </td>
                <td><?= date('d-m-Y',strtotime($value['created_date']));?></td>
                <td><a href="<?php echo Upload.'document/'.$value['document_name'];?>" class="btn btn-success" download="wip_<?php echo $value['document_name'];?>"><i class="fa fa-download"></i></a></td>
            </tr>
<?php 
$i++;
}?>
        </tbody>
    </table>
</div>

<?php
}
else{
    echo '<div class="alert alert-danger">
            No perivous data uploaded
         </div>';
}
?>