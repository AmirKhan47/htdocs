$(document).ready(function(){
    //load log thru ajax
    function load_log(page){
        var date=$('#date').val();
        var urls=$('#url').val();
        var ro=$('#ro_list').val();
        var aurl='';
        if(page !=''){
         aurl=urls+'log/get_ro/'+page;
        }else{
            aurl=urls+'log/get_ro/';
        }
        if(date !='' && ro !=''){
            
            // var serialized = $('#activity-form').serialize();
            $.ajax({
                url:aurl,
                method:'POST',
                dataType:'json',
                data:{ro1:ro,date1:date},
                success:function(data){
                    $('#log-table').html(data.log_table);
                    $('#log-pagination').html(data.pagination_link);
                }
            });
        }
    }

    $('#activity-btn').click(function(e){
        var date=$('#date').val();
        var urls=$('#url').val();
        var ro=$('#ro_list').val();
        e.preventDefault();

        if(date !='' && ro !=''){
            load_log(1);
            return false;
        }

    });

    $(document).on("click", ".pagination li a", function(event){
        event.preventDefault();
        var page = $(this).data("ci-pagination-page");
        load_log(page);
    });
});