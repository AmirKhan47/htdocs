<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Header</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container mt-5 bg-light">
		<h1>Headers</h1>

		@if(count($errors) > 0)
		    @foreach ($errors->all() as $error)
		        <div class="alert alert-danger">
		            {{$error}}
		        </div>
		    @endforeach
		@endif

		@if(session('success'))
		    <div class="alert alert-success">
		        {{session('success')}}
		    </div>
		@endif

		@if(session('error'))
		    <div class="alert alert-danger">
		        {{session('error')}}
		    </div>
		@endif

		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
		  	<li class="nav-item">
		    	<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Add New Header</a>
		  	</li>
		  	<li class="nav-item">
		    	<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Add Header Amount</a>
		  	</li>
		  	<li class="nav-item">
		    	<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Edit Header Amount</a>
		  	</li>
		</ul>

		<div class="tab-content" id="pills-tabContent">

			<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				<form action="/headers" method="POST">
					@csrf
					<div class="row">
						<label for="" class="col-sm-2 col-form-label">Header Name</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="header_name" required="required">
						</div>
						<input type="submit" class="btn btn-primary" name="submit">
					</div>
				</form>
			</div>

			<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
				<form action="/headers" method="POST">
					@csrf
					@foreach ($data as $header)
						<div class="row">
							<label for="" class="col-sm-2 col-form-label">{{$header->header_name}}</label>
							<div class="col-sm-3">
								<input type="number" class="form-control" min="0" name="header_amount[]" value="{{$header->header_amount}}" placeholder="Amount" required="required" @if($header->header_amount!=NULL) { readonly="readonly" } @endif >
							</div>
						</div>
					@endforeach
					<input type="submit" class="btn btn-primary" name="submit1">
				</form>
			</div>

			<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
				<form action="/headers" method="POST">
					@csrf
					@foreach ($data as $header)
						<div class="row">
							<label for="" class="col-sm-2 col-form-label">{{$header->header_name}}</label>
							<div class="col-sm-4">
								<input type="number" class="form-control" min="0" step="0.01" max="{{$header->header_amount}}" name="header_amount[]" value="{{$header->header_amount}}" required="required">
							</div>
						</div>
					@endforeach
					<input type="submit" class="btn btn-primary" name="submit2">
				</form>
			</div>

		</div>

	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>