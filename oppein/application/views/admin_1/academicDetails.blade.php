@extends('layout.master')

@section('title')
Submit New Application
@endsection
@section('css')
 <link href="{{asset('assets/global/css/components-md.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{asset('assets/global/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script src="{{asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/validation.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/application.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/tables.js')}}" type="text/javascript"></script>

@endsection

@section('breadcrumb')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{route('getUserApplications')}}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>New Application</span>
        </li>
    </ul>
</div>
                    
<h3 class="page-title" style="font-size:24px;">New Application
     
</h3>
                    
@endsection
@section('content')
<div class="row">
        <div class="col-md-12">
            
            @if (count($errors) > 0)
                <div class="note note-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('Message'))
                <div class="alert alert-success">
                            {{Session::get('Message')}}
                </div>
                
            @endif
            @if(Session::has('UnMessage'))
                <div class="alert alert-danger">
                            {{Session::get('UnMessage')}}
                </div>
                
            @endif              
            
        </div>
    </div>
    <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption font-green-seagreen">
                                                        <i class="fa fa-user font-green-seagreen"></i>
                                                        <span class="caption-subject bold uppercase"> Academic Record</span>
                                                    </div> 
                                                <div class="actions">
                                                  
                                                    
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="{{route('postAcademicDetailForm', Route::input('id'))}}" id="form_sample_16"  class="form-horizontal" method="post">
                                                    <div class="form-body">
                                                    <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                   <div class="alert alert-block alert-info fade in">
                                                        <p><b>'<span style="color:red;">*</span>' fields are compulsory.</b></p>
                                                    </div>
                                                        
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                             <div class="table-responsive">      
                                                        <!--/row-->
                                                        <table class="table table-bordered  table-scrollable" id="sample_4">
                                                            <tr>
                                                                <th>Degree Level</th>
                                                                <th>Degree Title </th>        
                                                                
                                                                <th>Obtained Marks/CGPA</th>
                                                                <th>Total Marks/CGPA</th>
                                                                <th>Passing Year</th>
                                                                <th>College</th>
                                                                <th>Board </th>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Matriculation (SSC)</td>
                                                                <td>
                                                                 <div class="">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text"  style="border:none" id="BoardUniv" name="q1" value="{{$Data->q1 or old('q1')}}" data-rule-required="true" data-rule-maxlength="20" data-rule-minlength="2"  class="form-control" placeholder="">
                                                                </div>
                                                                <span class="help-block">  
                                                                </span>
                                                                </td>     
                                                                <td> 
                                                                    <div class=""><i class="fa"></i>
                                                                                    <input type="text"  style="border:none" id="PassingYear" name="q2" value="{{$Data->q2 or old('q2')}}" data-rule-digits="true"  data-rule-required="true" data-rule-maxlength="4" class="form-control" placeholder="">
                                                                                </div>
                                                                    <span class="help-block">  
                                                                    </span>
                                                                </td>
                                                               
                                                                <td>
                                                                    <div class="">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text"  style="border:none" id="MarksObtained" name="q3" value="{{$Data->q3 or old('q3')}}" data-rule-digits="true"  data-rule-required="true" data-rule-maxlength="4" data-rule-minlength="2" class="form-control" placeholder="">
                                                                                   </div>
                                                                                    <span class="help-block">  </span>
                                                                                </td>
                                                                <td>
                                                                <div class="">
                                                                                    <i class="fa"></i>
                                                                                     <input type="text"  style="border:none" id="TotalMarks" name="q4" value="{{$Data->q4 or old('q4')}}"   data-rule-required="true" data-rule-maxlength="4" data-rule-digits="true" data-rule-minlength="4" class="form-control" placeholder="">
                                                                                 </div>
                                                                                     <span class="help-block">  </span>
                                                                </td>
                                                                <td> <div class="">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text"  style="border:none" id="MarksInSubject" name="q5" value="{{$Data->q5 or old('q5')}}" data-rule-required="true"  data-rule-maxlength="50"  data-rule-minlength="2" class="form-control" placeholder="">
                                                                                </div>

                                                                                    <span class="help-block">  </span>
                                                                                </td>
                                                                <td> 
                                                                    <div class="">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text"  style="border:none" id="Marks" name="q6" value="{{$Data->q6 or old('q6')}}" data-rule-required="true" data-rule-maxlength="50" data-rule-minlength="2" class="form-control" placeholder="">
                                                                                </div>
                                                                                <span class="help-block">  </span>
                                                                            </td>
                                                               
                                                             
                                                            </tr>
                                                            <tr>
                                                                <td>Intermediate (HSSC)</td>
                                                                  <td><div class="">
                                                                                    <i class="fa"></i>
                                                                                 <input type="text"  style="border:none" id="BoardUniv" name="q7" value="{{$Data->q7 or old('q7')}}" data-rule-required="true" data-rule-maxlength="20" data-rule-minlength="2" class="form-control" placeholder="">
                                                                             </div>
                                                                             <span class="help-block">  </span>
                                                                         </td>     
                                                                <td><div class="">
                                                                                    <i class="fa"></i>
                                                                                     <input type="text"  style="border:none" id="PassingYear" name="q8" value="{{$Data->q8 or old('q8')}}" data-rule-required="true" data-rule-maxlength="4" data-rule-digits="true" class="form-control" placeholder="">
                                                                                 </div>
                                                                                 <span class="help-block">  </span>
                                                                             </td>
                                                                             <td>
                                                                    <div class="">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text"  style="border:none" id="MarksObtained" name="q9" value="{{$Data->q9 or old('q9')}}" data-rule-required="true" data-rule-maxlength="4" data-rule-digits="true"  class="form-control" placeholder="">
                                                                                   </div>
                                                                                    <span class="help-block">  </span>
                                                                                </td>
                                                                <td>
                                                                <div class="">
                                                                                    <i class="fa"></i>
                                                                                     <input type="text"  style="border:none" id="TotalMarks" name="q10" value="{{$Data->q10 or old('q10')}}" data-rule-required="true" data-rule-maxlength="4" data-rule-minlength="4" data-rule-digits="true" class="form-control" placeholder="">
                                                                                 </div>
                                                                                     <span class="help-block">  </span>
                                                                </td>
                                                                <td> <div class="">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text"  style="border:none" id="MarksInSubject" name="q11" value="{{$Data->q11 or old('q11')}}" data-rule-required="true"  data-rule-maxlength="50"  data-rule-minlength="2" class="form-control" placeholder="">
                                                                                </div>

                                                                                    <span class="help-block">  </span>
                                                                                </td>
                                                                <td> <div class="">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text"  style="border:none" id="MarksInSubject" name="q12" value="{{$Data->q12 or old('q12')}}" data-rule-required="true"  data-rule-maxlength="50"  data-rule-minlength="2" class="form-control" placeholder="">
                                                                                </div>

                                                                                    <span class="help-block">  </span>
                                                                                </td>

                                                            </tr>
                                                            @if($Data->form =='PG')
                                                            <tr>
                                                                <td>Graduation </td>
                                                                <td><div class="">
                                                                                    <i class="fa"></i>
                                                                                 <input type="text"  style="border:none" id="BoardUniv" name="q13" value="{{$Data->q13 or old('q13')}}" data-rule-required="true" data-rule-maxlength="20" data-rule-minlength="2" class="form-control" placeholder="">
                                                                             </div>
                                                                             <span class="help-block">  </span>
                                                                         </td>     
                                                                <td><div class="">
                                                                                    <i class="fa"></i>
                                                                                     <input type="text"  style="border:none" id="PassingYear" name="q14" value="{{$Data->q14 or old('q14')}}" data-rule-required="true" data-rule-maxlength="4" data-rule-number="true" class="form-control" placeholder="">
                                                                                 </div>
                                                                                 <span class="help-block">  </span>
                                                                             </td>
                                                                <td>
                                                                  
                                                                    <div class="">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text"  style="border:none" id="MarksObtained" name="q15" value="{{$Data->q15 or old('q15')}}" data-rule-required="true" data-rule-maxlength="4" data-rule-number="true" class="form-control" placeholder="">
                                                                                   </div>
                                                                                    <span class="help-block">  </span>
                                                                                </td>
                                                                <td>
                                                                <div class="">
                                                                                    <i class="fa"></i>
                                                                                     <input type="text"  style="border:none" id="TotalMarks" name="q16" value="{{$Data->q16 or old('q16')}}" data-rule-required="true" data-rule-maxlength="4" data-rule-minlength="4" data-rule-digits="true" class="form-control" placeholder="">
                                                                                 </div>
                                                                                     <span class="help-block">  </span>
                                                                </td>
                                                                <td> <div class="">
                                                                                    <i class="fa"></i>
                                                                                    <select style="border:none;width:140px;" id="MarksInSubject" name="q17">
                                                                                        <option> Select University</option>
                                                                                        @if($Data->q17=="")
                                                                                        @foreach($Univ as $U)
                                                                                        <option value="$U->name" @if(old('q17')== $U->name) selected="selected" @endif>{{$U->name}}</option>
                                                                                        @endforeach
                                                                                        @else
                                                                                        @foreach($Univ as $U)
                                                                                        <option value="$U->name" @if($Data->q17== $U->name) selected="selected" @endif>{{$U->name}}</option>
                                                                                        @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                    <!-- <input type="text"  style="border:none" id="MarksInSubject" name="q17" value="{{$Data->q17 or old('q17')}}" data-rule-required="true"  data-rule-maxlength="50"  data-rule-minlength="2" class="form-control" placeholder="">
                                                                               --> 
                                                                                </div>

                                                                                    <span class="help-block">  </span>
                                                                                </td>
                                                                <td> 
                                                                    <div class="">
                                                                                    <i class="fa"></i>
                                                                                    <input type="text"  style="border:none" id="Marks" name="q18" value="{{$Data->q18 or old('q18')}}" data-rule-required="true" data-rule-maxlength="50" data-rule-minlength="2" class="form-control" placeholder="">
                                                                                </div>
                                                                                <span class="help-block">  </span>
                                                                            </td>
                                                            </tr>
                                                            @endif
                                                        </table>
                                                    </div>

                                                        </div>
                                                    </div>

                                                 
                                                    
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-6">
                                                               <a href="{{route('getRmenu',$Data->id)}}" value="cancel" name="action" class="btn red-mint"><i class="glyphicon glyphicon-arrow-left"></i>
                                                                Go to menu</a>
                                                                <button type="submit" name="action" value="save" class="btn btn-md green-meadow"><i class="glyphicon glyphicon-ok-sign"></i>
                                                                Save & Close</button>
                                                               
                                                                <button name="action" type="submit" value="submit" class="btn btn-md green-meadow"><i class="glyphicon glyphicon-arrow-right"></i>
                                                                Submit & Next</button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- END FORM-->
                                            </div>
                                        </div>
@endsection