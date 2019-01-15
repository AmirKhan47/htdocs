<?php
   if(count($visit)>0){

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Sno</th>
                <th>Document Name</th>
                <th>Uploaded Date</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>                                
    
<?php
     $i=1;
    foreach ($visit as $key => $value) {
?>
            <tr>
                <td><?= $i;?></td>
                <td><?= 'visit_'.$value['document_name'];?></td>
                <td><?= date('d-m-Y',strtotime($value['created_date']));?></td>
                <td><a href="<?php echo Upload.'document/'.$value['document_name'];?>" class="btn btn-success" download="visit_<?php echo $value['document_name'];?>"><i class="fa fa-download"></i></a></td>
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