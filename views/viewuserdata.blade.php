@extends('layouts.app')

@section('htmlheader_title')
	{{$title}}
@endsection

@section('extra-header')
<link href="{{ asset('/css/flots.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('contentheader_title')
	{{$title}}
@endsection

@section('contentheader_description')
	
@endsection

@section('main-content')
	<div class="row">
		<div class="column col-lg-12 col-md-12 col-xs-12 col-sm-12" id="viewdata">
			<h2 style="float:left;width:37%;">{{ $title }}</h2>
			<!--<a href="{{ url('newpost') }}"><button type="button" class="btn btn-primary" style="float:right;margin:20px 0 10px 10px">Add New</button></a>-->
			<div style="clear:both;"></div>
			<div class="box box-primary" style="padding: 15px;">
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
					<h3>Name :</h3>
					<h4>{{ $userdata -> name }}</h4>
				</div>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
					<h3>Email :</h3>
					<h4>{{ $userdata -> email }}</h4>
				</div>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
					<h3>Phone :</h3>
					<h4>{{ $userdata -> phone }}</h4>
				</div>
				<div style="clear: both;"></div>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
					<h3>Street :</h3>
					<h4>{{ $userdata -> street }}</h4>
				</div>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
					<h3>City :</h3>
					<h4>{{ $userdata -> city }}</h4>
				</div>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
					<h3>State :</h3>
					<h4>{{ $userdata -> state }}</h4>
				</div>
				<div style="clear: both;"></div>
				<button type="button" class="btn btn-primary" style="float:right;margin:20px 0 10px 10px" id="edit">EDIT</button>
				<div style="clear: both;"></div>
			</div>
		</div>

		<div class="column col-lg-12 col-md-12 col-xs-12 col-sm-12" id="editform" style="display: none;">
			<h2 style="float:left;width:37%;">Edit Details</h2>
			<!--<a href="{{ url('newpost') }}"><button type="button" class="btn btn-primary" style="float:right;margin:20px 0 10px 10px">Add New</button></a>-->
			<div style="clear:both;"></div>
			<div class="box box-primary" style="padding: 15px;">
				<form class="form-horizontal" action="{{ url('/updateuserdata/'.$userdata -> id) }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group">
					  <label class="control-label col-sm-2" for="name">Name :</label>
					  <div class="col-sm-10">
						<input type="text" name="name" class="form-control" required value="{{ $userdata -> name }}">
					  </div>
					</div>

					<div class="form-group">
					  <label class="control-label col-sm-2" for="email">Email :</label>
					  <div class="col-sm-10">
						<input type="email" name="email" class="form-control" required value="{{ $userdata -> email }}">
					  </div>
					</div>

					<div class="form-group">
					  <label class="control-label col-sm-2" for="phone">Phone :</label>
					  <div class="col-sm-10">
						<input type="text" name="phone" class="form-control" required value="{{ $userdata -> phone }}">
					  </div>
					</div>

					<div class="form-group">
					  <label class="control-label col-sm-2" for="street">Street :</label>
					  <div class="col-sm-10">
						<input type="text" name="street" class="form-control" required  value="{{ $userdata -> street }}">
					  </div>
					</div>
					
					<div class="form-group">
					  <label class="control-label col-sm-2" for="city">City :</label>
					  <div class="col-sm-10">
						<input type="text" name="city" class="form-control" required  value="{{ $userdata -> city }}">
					  </div>
					</div>

					<div class="form-group">
					  <label class="control-label col-sm-2" for="state">State :</label>
					  <div class="col-sm-10">
						<select class="form-control" name="state" required>
							<option value="">Select State</option>
							@if($userdata -> state == 'Western Cape' )
	                        	<option value="Western Cape" selected>Western Cape</option>
	                        @else
	                        	<option value="Western Cape">Western Cape</option>
	                        @endif
	                        @if($userdata -> state == 'Northern Cape' )
	                        	<option value="Northern Cape">Northern Cape</option>
	                        @else
	                        	<option value="Northern Cape">Northern Cape</option>
	                        @endif
	                        @if($userdata -> state == 'Eastern Cape' )
	                        	<option value="Eastern Cape" selected>Eastern Cape</option>
	                        @else
	                        	<option value="Eastern Cape">Eastern Cape</option>
	                        @endif
	                        @if($userdata -> state == 'KwaZulu-Natal' )
	                        	<option value="KwaZulu-Natal" selected>KwaZulu-Natal</option>
	                        @else
	                        	<option value="KwaZulu-Natal">KwaZulu-Natal</option>
	                        @endif
	                        @if($userdata -> state == 'Free State' )
	                        	<option value="Free State" selected>Free State</option>
	                        @else
	                        	<option value="Free State">Free State</option>
	                        @endif
	                        @if($userdata -> state == 'North West' )
	                        	<option value="North West" selected>North West</option>
	                        @else
	                        	<option value="North West">North West</option>
	                        @endif
	                        @if($userdata -> state == 'Gauteng' )
	                        	<option value="Gauteng" selected>Gauteng</option>
	                        @else
	                        	<option value="Gauteng">Gauteng</option>
	                        @endif
	                        @if($userdata -> state == 'Mpumalanga' )
	                        	<option value="Mpumalanga" selected>Mpumalanga</option>
	                        @else
	                        	<option value="Mpumalanga">Mpumalanga</option>
	                        @endif
	                        @if($userdata -> state == 'Limpopo' )
	                        	<option value="Limpopo" selected>Limpopo</option>
	                        @else
	                        	<option value="Limpopo">Limpopo</option>
	                        @endif
						</select>
					  </div>
					</div>
					
					<div class="form-group">
					  <div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Update</button>
					  </div>
					</div>
				</form>
				<button type="button" class="btn btn-primary" style="float:right;margin:20px 0 10px 10px" id="back">BACK</button>
				<div style="clear: both;"></div>
			</div>
		</div>
	</div>		
@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#edit').click(function(){                
	        $('#viewdata').css('display', 'none');
	        $('#editform').css('display', 'block');
	   	});

	   	$('#back').click(function(){                
	        $('#editform').css('display', 'none');
	        $('#viewdata').css('display', 'block');
	   	});
	});
</script>

