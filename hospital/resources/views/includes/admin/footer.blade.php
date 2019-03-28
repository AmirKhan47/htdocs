  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0-alpha
    </div>
    <strong>Copyright &copy; {{ date('Y') }} <a href="https://www.redstartechs.com/" target="_blank">Red Star Technologies</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->

<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>

<!-- SlimScroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>

<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function ()
    {
        $('#add_doctor_form_submit').click(function()
        {
            checked = $(".category_checkbox:checked").length;
            if (checked == 0)
            {
                alert("You must check at least one Category checkbox.");
                return false;
            }
        });
    });
</script>
<script>
    $(function()
    {
        $('#users').DataTable();
        $('#headers').DataTable();
        $('#hospital_daily_report').DataTable();
        $('#tests').DataTable();
        $('#doctors').DataTable();
        $('#patients').DataTable();
        $('#room').DataTable();
        $('#operation').DataTable();
    });

    $(document).ready(function()
    {
        // Add New Header Modal
        $('#add_header_btn').click(function(event)
        {
            if(!$("#add_header_form")[0].checkValidity())
            {
                $("#add_header_form").find("#add_header_hidden_submit").click();
                return false;
            }
            var form = $('#add_header_form')[0];
            var formData = new FormData( $('#add_header_form')[0]);
            $.ajax(
            {
                type:'POST',
                url:'/header',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function(data)
                {
                    if (data==1)
                    {
                        alert('Successful!');
                        $('.modal_alert').html('<div class="alert alert-primary bg-primary"><span>Record Added!</span></div>');
                        $("#add_header_form")[0].reset();
                        // var table = $('#headers').DataTable(
                        // {
                        // });
                        // table.ajax.reload();
                    }
                    else
                    {
                        alert('Failed!');
                        $('.modal_alert').html('<div class="alert alert-danger bg-danger"><span> Record Not Added!</span></div>');
                    }
                }
            });
            event.preventDefault();
            return false;
        });

        // Reload Close Modal Button
        $('.close_header_btn').click(function()
        {
            location.reload();
        });

        // Add Hospital Detail Modal
        $('#hospital_detail_btn').click(function(event)
        {
            if(!$("#hospital_detail_form")[0].checkValidity())
            {
                $("#hospital_detail_form").find("#hospital_detail_hidden_submit").click();
                return false;
            }
            var form = $('#hospital_detail_form')[0];
            var formData = new FormData( $('#hospital_detail_form')[0]);
            $.ajax(
            {
                type:'POST',
                url:'/hospitalexpense',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function(data)
                {
                    if (data==1)
                    {
                        alert('Successful!');
                        $('.modal_alert').html('<div class="alert alert-primary bg-primary"><span>Record Added!</span></div>');
                        $("#hospital_detail_form")[0].reset();
                        // var table = $('#headers').DataTable(
                        // {
                        // });
                        // table.ajax.reload();
                    }
                    else
                    {
                        alert('Failed!');
                        $('.modal_alert').html('<div class="alert alert-danger bg-danger"><span> Record Not Added!</span></div>');
                    }
                }
            });
            event.preventDefault();
            return false;
        });

        // Add Other Businesses Detail Modal
        $('#other_bussiness_detail_btn').click(function(event)
        {
            if(!$("#other_bussiness_detail_form")[0].checkValidity())
            {
                $("#other_bussiness_detail_form").find("#other_bussiness_detail_hidden_submit").click();
                return false;
            }
            var form = $('#other_bussiness_detail_form')[0];
            var formData = new FormData( $('#other_bussiness_detail_form')[0]);
            $.ajax(
            {
                type:'POST',
                url:'/otherexpense',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function(data)
                {
                    if (data==1)
                    {
                        alert('Successful!');
                        $('.modal_alert').html('<div class="alert alert-primary bg-primary"><span>Record Added!</span></div>');
                        $("#other_bussiness_detail_form")[0].reset();
                        // var table = $('#headers').DataTable(
                        // {
                        // });
                        // table.ajax.reload();
                    }
                    else
                    {
                        alert('Failed!');
                        $('.modal_alert').html('<div class="alert alert-danger bg-danger"><span> Record Not Added!</span></div>');
                    }
                }
            });
            event.preventDefault();
            return false;
        });

        // Add Stock Detail Modal
        $('#stock_detail_btn').click(function(event)
        {
            if(!$("#stock_detail_form")[0].checkValidity())
            {
                $("#stock_detail_form").find("#stock_detail_hidden_submit").click();
                return false;
            }
            var form = $('#stock_detail_form')[0];
            var formData = new FormData( $('#stock_detail_form')[0]);
            $.ajax(
            {
                type:'POST',
                url:'/stock',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function(data)
                {
                    if (data==1)
                    {
                        alert('Successful!');
                        $('.modal_alert').html('<div class="alert alert-primary bg-primary"><span>Record Added!</span></div>');
                        $("#stock_detail_form")[0].reset();
                        // var table = $('#headers').DataTable(
                        // {
                        // });
                        // table.ajax.reload();
                    }
                    else
                    {
                        alert('Failed!');
                        $('.modal_alert').html('<div class="alert alert-danger bg-danger"><span> Record Not Added!</span></div>');
                    }
                }
            });
            event.preventDefault();
            return false;
        });

    });
    // Get Data For Header Detail Modal
    function header_detail(id)
    {
        $.ajax(
        {
            url: '/header/'+id,
            method: 'GET',
            dataType: 'json',
        })
        .done(function(data)
        {
            console.log("success");
            $('.name').text(data.name);
            $('.header_id').val(data.id);
            $('.category').text(data.category);
            $('.type').text(data.type);
            if (data.category=='Hospital')
            {
                $('#hospital_detail_modal').modal();
            }
            if (data.category=='Other Business')
            {
                $('#other_bussiness_detail_modal').modal();
            }
            if (data.category=='Stock')
            {
                $('#stock_detail_modal').modal();
            }
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    }
</script>
<script>
    $(document).ready(function()
    {
        $('#test_commission_add').click(function(event)
        {
            if(!$("#doctor_form")[0].checkValidity())
            {
                $("#doctor_form").find("#add_doctor_form_submit").click();
                return false;
            }
            var test_name = $('#test_id').find(":selected").text();
            var test_id = $('#test_id').val();
            var test_commission = $("#test_commission").val();
            var row = "<tr><td><input type='hidden' name='test_id[]' value='" + test_id + "'><input type='checkbox' name='checkbox'></td><td><input type='text' name='test_name[]' value='" + test_name + "' class='border-0' readonly='readonly'></td><td><input type='text' name='test_commission[]' value='" + test_commission + "' class='border-0' readonly='readonly'></td></tr>";
            $("table tbody").append(row);
        });

        // Find and remove selected table rows
        $("#delete_test_commission").click(function()
        {
            $("table tbody").find('input[name="checkbox"]').each(function()
            {
                if($(this).is(":checked"))
                {
                    $(this).parents("tr").remove();
                }
            });
        });
    });    
</script>
<script>
    $(document).ready(function()
    {
        $('#test_receipt_add').click(function(event)
        {
            if(!$("#test_receipt_form")[0].checkValidity())
            {
                $("#test_receipt_form").find("#test_receipt_submit").click();
                return false;
            }
            var test_name = $('#test_id').find(":selected").text();
            var test_id = $('#test_id').val();
            var doctor_name = $('#doctor_id').find(":selected").text();
            var doctor_id = $('#doctor_id').val();
            var no_of_test = $("#no_of_test").val();
            var result = test_id.split('.');
            var test_id = result[0];
            var rate = result[1];
            var sub_total = rate*no_of_test;
            // var sub_total1[] = sub_total+$("#no_of_test").val();
            var row = "<tr><td><input type='hidden' name='test_id[]' value='" + test_id + 
            "'><input type='hidden' name='doctor_id[]' value='" + doctor_id + 
            "'><input type='checkbox' name='checkbox'></td><td><input type='text' name='test_name[]' value='" + test_name + "' class='border-0' readonly='readonly'></td><td><input type='text' name='doctor_name[]' value='" + doctor_name + "' class='border-0' readonly='readonly'></td><td><input type='text' name='fee[]' value='" + rate + "' class='border-0' readonly='readonly'></td><td><input type='text' name='no_of_test[]' value='" + no_of_test + "' class='border-0' readonly='readonly'></td><td><input type='text' name='sub_total[]' value='" + sub_total + "' class='border-0 sub_total' readonly='readonly'></td></tr>";

            var total = sub_total;
            $('.sub_total').each(function (index, element)
            {
                total = total + parseFloat($(element).val());
            });
            $("table tbody").append(row);
            $("#total").val(total);
            $("#final_total").val(total);

            // $("#test_id").val('');
            // $("#doctor_id").val('');
            // $("#no_of_test").val('');
        });

        $('#welfare').keyup(function()
        {
            var welfare = $('#welfare').val();
            var discount = $('#discount').val();
            var total = $('#total').val();
            total = total - welfare - discount;
            // alert(total);
            $("#final_total").val(total);
        });

        $('#discount').keyup(function()
        {
            var welfare = $('#welfare').val();
            var discount = $('#discount').val();
            var total = $('#total').val();
            total = total - welfare - discount;
            // alert(total);
            $("#final_total").val(total);
        });

        // Find and remove selected table rows
        $("#test_receipt_delete").click(function()
        {
            $("table tbody").find('input[name="checkbox"]').each(function()
            {
                if($(this).is(":checked"))
                {
                    $(this).parents("tr").remove();
                }
            });
        });
    });    
</script>
</body>
</html>