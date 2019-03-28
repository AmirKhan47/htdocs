<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fee Chalan | MLSC</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        @media print{@page {size: landscape}}
    </style>
</head>
<body>
{{-- @section('content') --}}
    <!-- Content Wrapper. Contains page content -->
{{--     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Patient Bill</h1>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#add">Add Patients</button>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section> --}}

        <!-- Main content -->
        <section class="content">
            <div class="container mt-2">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header bg-info">
                                <h3 class="card-title text-center">Patient Bill</h3>
                            </div>
                            <h3 class="text-center">Shah Medical Complex Charsadda</h3>
                            <h5 class="text-center">091-6515077</h5>
                            <div class="row font-weight-bold">
                                <div class="offset-1 col float-left">
                                    Date: {{ date('d-m-Y') }}
                                </div>
                                <div class="col text-rightoffset-1 ">
                                    Computer Operator: {{ $created_by }}
                                </div>
                            </div>
                            <div class="row font-weight-bold">
                                <div class="offset-1 col float-left">
                                    Patient ID: {{ $patient_id }}
                                </div>
                                <div class="col text-rightoffset-1 ">
                                    Patient Name: {{ $name }}
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="" class="table table-sm table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Test Name</th>
                                                <th>Test Fee</th>
                                                <th>No of Tests</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1 @endphp
                                            @for ($i = 0; $i < $test_count; $i++)
                                                <tr>
                                                    <td>{{ $count++ }}</td>
                                                    <td>{{ $test_name[$i] }}</td>
                                                    <td>{{ $fee[$i] }}</td>
                                                    <td>{{ $no_of_test[$i] }}</td>
                                                </tr> 
                                            @endfor
                                            <tfoot class="font-weight-bold">
                                                <tr>
                                                    <td colspan="2">Total Amount</td>
                                                    <td colspan="2">{{ $total }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Welfare</td>
                                                    <td colspan="2">{{ $welfare }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Discount</td>
                                                    <td colspan="2">{{ $discount }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Total Payment</td>
                                                    <td colspan="2">{{ $final_total }}</td>
                                                </tr>
                                            </tfoot>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

{{-- @endsection --}}
</body>
</html>
