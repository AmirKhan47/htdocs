<table class="table table-hover">
    <thead>
        <tr>
            <th> Sr. # </th>
            <th> Name </th>
            <th> Class </th>
            <th> School </th>
            <th> Status </th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($children_details as $key => $value){?>
            <tr>
                <td><?php echo $i;?></td>
                <form id="child_<?php echo $value['children_detail_id'];?>">
                <td>
                    <div class="hide_<?php echo $value['children_detail_id'];?>" id="div_name_<?php echo $value['children_detail_id'];?>"><?php echo $value['children_name'];?></div>
                    <input type="hidden" class="show_<?php echo $value['children_detail_id'];?>" id="h_name_<?php echo $value['children_detail_id'];?>" value="<?php echo $value['children_name'];?>">
                </td>
                <td>
                    <div class="hide_<?php echo $value['children_detail_id'];?>"  id="div_class_<?php echo $value['children_detail_id'];?>"><?php echo $value['children_class'];?></div>
                    <input type="hidden" class="show_<?php echo $value['children_detail_id'];?>" id="h_class_<?php echo $value['children_detail_id'];?>" value="<?php echo $value['children_class'];?>">
                </td>
                <td>
                    <div class="hide_<?php echo $value['children_detail_id'];?>"  id="div_school_<?php echo $value['children_detail_id'];?>"><?php echo $value['children_school'];?></div>
                    <input type="hidden" class="show_<?php echo $value['children_detail_id'];?>" id="h_school_<?php echo $value['children_detail_id'];?>" value="<?php echo $value['children_school'];?>">
                </td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-info hide_<?php echo $value['children_detail_id'];?>" onclick="showupdate('<?php echo $value['children_detail_id'];?>')">Edit</a>
                        <a class="btn btn-info update_<?php echo $value['children_detail_id'];?>" onclick="submitupdate('<?php echo $value['children_detail_id'];?>',event)" style="display: none;">Update</a>
                        <a onclick="delete_child('<?php echo $value['children_detail_id'];?>',event)" id="children_details_delete_btn" class="btn btn-danger">Delete</a>
                    </div>
                </form>
                </td>
            </tr>
        <?php $i++;} ?>
    </tbody>
</table>