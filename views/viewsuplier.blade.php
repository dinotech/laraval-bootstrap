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
			<h2 style="float:left;width:37%;">{{ $title }}</h2>
			<!--<a href="{{ url('newpost') }}"><button type="button" class="btn btn-primary" style="float:right;margin:20px 0 10px 10px">Add New</button></a>-->
			<div style="clear:both;"></div>
			<div class="box box-primary" style="padding: 15px;">
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
					<h3>Name :</h3>
					<h4>{{ $suplier -> name }}</h4>
				</div>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
					<h3>Email Id :</h3>
					<h4>{{ $suplier -> email }}</h4>
				</div>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
					<h3>Phone :</h3>
					<h4>{{ $suplier -> phone }}</h4>
				</div>
				<div style="clear: both;"></div>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
					<h3>Street :</h3>
					<h4>{{ $suplier -> street }}</h4>
				</div>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
					<h3>City :</h3>
					<h4>{{ $suplier -> city }}</h4>
				</div>
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
					<h3>State :</h3>
					<h4>{{ $suplier -> state }}</h4>
				</div>
				<div style="clear: both;"></div>
			</div>
		</div>

		
	</div>		
@endsection

