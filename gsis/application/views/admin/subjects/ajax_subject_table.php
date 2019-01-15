<table class="table table-bordered table-striped table-condensed flip-content">
<!--Table head-->
<thead>
    <tr>
        <th>#</th>
        <th>Subject</th>
        <th>Action</th>
    </tr>
</thead>
<!--Table head-->

<!--Table body-->
<tbody>
   <?php
   if(!$registered_subjects){}else{
   $i=1; 
   foreach($registered_subjects as $value){
        echo '<tr>';
        echo '<th scope="row">'.$i++.'</th>';
        echo '<td>'.$value['subject_name'];
        if($value['subject_type'] != null){
                echo '<p style="font-size: 10px;">'.$value['subject_type'].'</p>';
            }
        echo '</td>';
        echo'<td>
                <button onclick="delete_subject('.$value['id'].')" type="button" class="btn btn-danger btn-xs btn-circle">
                    Delete
                </button>
            </td>';
        echo '</tr>';
    } } ?>
</tbody>
<!--Table body-->

</table>