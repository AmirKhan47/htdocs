<table class="table table-hover">
    <thead>
        <tr>
            <th> Sr. # </th>
            <th> Level Name </th>
            <th> Status </th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($children_details as $key => $value){?>
            <tr>
                <td><?php echo $i;?></td>
                <form id="child_<?php echo $value['employee_level_id'];?>">
                <td>
                    <div class="hide_<?php echo $value['employee_level_id'];?>" id="div_name_<?php echo $value['employee_level_id'];?>"><?php echo $value['level_name'];?></div>
                    <input type="hidden" class="show_<?php echo $value['employee_level_id'];?>" id="h_name_<?php echo $value['employee_level_id'];?>" value="<?php echo $value['level_name'];?>">
                </td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-info hide_<?php echo $value['employee_level_id'];?>" onclick="showupdate('<?php echo $value['employee_level_id'];?>')">Edit</a>
                        <a class="btn btn-info update_<?php echo $value['employee_level_id'];?>" onclick="submitupdate('<?php echo $value['employee_level_id'];?>',event)" style="display: none;">Update</a>
                        <a onclick="delete_child('<?php echo $value['employee_level_id'];?>',event)" id="children_details_delete_btn" class="btn btn-danger">Delete</a>
                    </div>
                </form>
                </td>
            </tr>
        <?php $i++;} ?>
    </tbody>
</table>