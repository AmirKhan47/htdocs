@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Patients</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">@include('includes/admin/messages')</div>
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Patients</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" id="test_receipt_form" class="form-horizontal" action="{{ route('patient.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="">Patient Name</label>
                                            <input type="text" name="name" id="" pattern="^[a-zA-Z ]{3,40}$" maxlength="50" value="{{ old('name') }}" class="form-control" placeholder="" required="required">
                                        </div>
                                        <div class="col">
                                            <label for="">Date</label>
                                            <input type="text" name="" value="{{ date('d-m-Y') }}" class="form-control" readonly="readonly">
                                        </div>
                                    </div>
                                <!-- /.card-body -->
                                <div class="my-3 container table-bordered" style=" border-width:3px !important;">
                                    <div class="row my-1">
                                        <div class="col-1">
                                            <label for="">Test</label>
                                        </div>
                                        <div class="col-2">
                                            <select class="form-control form-control-sm" name="test_id" id="test_id" required="required">
                                                <option value="">Select</option>
                                                @foreach ($tests as $test)
                                                    <option value="{{ $test->id }}.{{ $test->rate }}">{{ $test->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-1">
                                            <label for="">Doctor</label>
                                        </div>
                                        <div class="col-2">
                                            <select class="form-control form-control-sm" name="doctor_id" id="doctor_id" required="required">
                                                <option value="">Select</option>
                                                @foreach ($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <label for="">No of Tests</label>
                                        </div>
                                        <div class="col-1">
                                            <input type="text" class="form-control form-control-sm" name="no_of_test" id="no_of_test" pattern="^(0|[1-9][0-9]*)$" maxlength="50" required="required">
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-primary btn-sm" type="button" id="test_receipt_add">
                                                Add
                                            </button>
                                            <button class="btn btn-danger btn-sm" type="button" id="test_receipt_delete" >
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="" class="table table-sm table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Test</th>
                                                    <th>Doctor</th>
                                                    <th>Fees</th>
                                                    <th>No of Tests</th>
                                                    <th>Sub-Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot class="font-weight-bold mt-2">
                                                <tr>
                                                    <td colspan="2" class="border-0"></td>
                                                    <td>Welfare</td>
                                                    <td><input type="text" class="" name="welfare" id="welfare" value="0"></td>
                                                    <td>Total</td>
                                                    <td><input type="text" class="border-0" name="total" id="total" value="0" readonly="readonly"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="border-0"></td>
                                                    {{-- <td></td>
                                                    <td></td>
                                                    <td></td> --}}
                                                    <td>Discount</td>
                                                    <td><input type="text" class="" name="discount" id="discount" value="0"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="border-0"></td>
                                                    {{-- <td></td>
                                                    <td></td>
                                                    <td></td> --}}
                                                    <td>Final Total</td>
                                                    <td><input type="text" class="border-0" name="final_total" id="final_total" value="0" readonly="readonly"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="offset-5">
                                        <button type="submit" name="test_receipt_submit" id="test_receipt_submit" class="btn btn-primary" value="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
