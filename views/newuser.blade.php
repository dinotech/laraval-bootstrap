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
			<a href="{{ url('userlist') }}"><button type="button" class="btn btn-primary" style="float:right;margin:20px 0 10px 10px">Back</button></a>
			<div style="clear:both;"></div>
			<div class="box box-primary" style="padding:30px;">
				<form method="POST" action="{{ url('/newsupervisor') }}">
	                {{ csrf_field() }}
	                	<input type="hidden" name="user_type" value="User" />
	                <div class="form-group has-feedback">
	                    <input type="text" class="form-control" placeholder="Name" name="name" required/>
	                </div>
	                <div class="form-group has-feedback">
	                    <input type="email" class="form-control" placeholder="Email Id" name="email" required/>
	                </div>
	                <div class="form-group has-feedback">
	                    <input type="password" class="form-control" placeholder="Password" name="password" required/>
	                </div>
	                <div class="form-group has-feedback">
	                    <input type="text" class="form-control" placeholder="Street" name="street" required/>
	                </div>
	                <div class="form-group has-feedback">
	                    <input type="text" class="form-control" placeholder="City" name="city" required/>
	                </div>
	                <div class="form-group has-feedback">
	                    <select class="form-control" name='state' required>
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
	                <div class="form-group has-feedback">
	                    <input type="text" class="form-control" placeholder="Phone" name="phone" required/>
	                </div>

	               	<div class="form-group">
						<button type="submit" class="btn btn-default">Save</button>
					</div>
	            </form>
			</div>	
		</div>
	</div>		
@endsection