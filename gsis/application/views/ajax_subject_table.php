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
   if(!$registeredSubjects){}else{
   $i=1; 
   foreach($registeredSubjects as $registeredSubject){
        echo '<tr>';
        echo '<th scope="row">'.$i++.'</th>';
        echo '<td>'.$registeredSubject['subject_name'];
        if($registeredSubject['subject_type'] != null){
                echo '<p style="font-size: 10px;">'.$registeredSubject['subject_type'].'</p>';
            }
        echo '</td>';
        echo'<td>
                <button type="submit" class="btn btn-primary btn-xs btn-circle" disabled>Edit</button>
                <a href="'.base_url().'admin/edit_guardian/">
                    <button type="submit" class="btn btn-danger btn-xs btn-circle">Delete</button>
                </a>
            </td>';
        echo '</tr>';
    } } ?>
</tbody>
<!--Table body-->

</table>