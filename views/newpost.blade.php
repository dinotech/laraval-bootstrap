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
		<div class="column col-lg-12 col-md-12 col-xs-12 col-sm-12">
			<h2 style="width:85%;float:left;">{{ $title }}</h2>
			<a href="{{ url('postlist') }}"><button type="button" class="btn btn-primary" style="float:right;margin:20px 0 10px 10px">Back</button></a>
			<div style="clear:both;"></div>
			<div class="box box-primary" style="padding:30px;">
				<form class="form-horizontal" action="{{ url('/newpost') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="form-group">
					  <label class="control-label col-sm-2" for="make">Title:</label>
					  <div class="col-sm-10">
						<input type="text" name="title" class="form-control" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="company_name">Location/Region :</label>
					  <div class="col-sm-10">
						<select class="form-control" name="state" required>
							<option value="">Select State</option>
	                        <option value="Western Cape">Western Cape</option>
	                        <option value="Northern Cape">Northern Cape</option>
	                        <option value="Eastern Cape">Eastern Cape</option>
	                        <option value="KwaZulu-Natal">KwaZulu-Natal</option>
	                        <option value="Free State">Free State</option>
	                        <option value="North West">North West</option>
	                        <option value="Gauteng">Gauteng</option>
	                        <option value="Mpumalanga">Mpumalanga</option>
	                        <option value="Limpopo">Limpopo</option>
						</select>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="make">Make:</label>
					  <div class="col-sm-10">
						<input type="text" name="make" class="form-control" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="model">Model:</label>
					  <div class="col-sm-10">
						<input type="text" name="model" class="form-control" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="year">Year:</label>
					  <div class="col-sm-10">
						<input type="text" name="year" class="form-control" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="color">Color:</label>
					  <div class="col-sm-10">
						<input type="text" name="color" class="form-control" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="regno">Reg. No. of Car:</label>
					  <div class="col-sm-10">
						<input type="text" name="regno" class="form-control" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="regno">Images(Multiple):</label>
					  <div class="col-sm-10">
						<input type="file" name="img[]" class="form-control" multiple required>
					  </div>
					</div>
                                        <?php 
					date_default_timezone_set('Africa/Johannesburg');
					$currdate = date('Y-m-d H:i:s');
					?>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="color">Due Date & Time:</label>
					  <div class="col-sm-10">
						<input type="datetime-local" name="duedatetime" class="form-control" dateformat="Y-m-d" value="<?php echo $currdate;?>" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="details">Details:</label>
					  <div class="col-sm-10">
						<textarea class="form-control" rows="5" name="details" required></textarea>
					  </div>
					</div>
					
					
					<div class="form-group">
					  <div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Post</button>
					  </div>
					</div>
				</form>
			</div>	
		</div>
	</div>		
@endsection
