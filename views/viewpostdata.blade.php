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
				<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
					<h3>Title :</h3>
					<h4>{{ $postdetail -> state }}</h4>
				</div>
				<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
					<h3>Modal :</h3>
					<h4>{{ $postdetail -> make }}-{{ $postdetail -> model }}({{ $postdetail -> color }})</h4>
				</div>
				<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
					<h3>Year :</h3>
					<h4>{{ $postdetail -> year }}</h4>
				</div>
				<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
					<h3>Reg. No. of Car :</h3>
					<h4>{{ $postdetail -> regno }}</h4>
				</div>
				<div style="clear: both;"></div>
				<div class="column col-lg-12 col-md-12 col-xs-12 col-sm-12">	
					<h3>Details :</h3>
					<h5>{{ $postdetail -> details }}</h5>
				</div>
				<div style="clear: both;"></div>
				<div class="column col-lg-12 col-md-12 col-xs-12 col-sm-12">
						<?php
							$images = explode(',', $postdetail->images);
						?>
					@foreach($images as $img)
						<a href="../image/{{ $img }}" target="_black">	
							<img src="../image/{{ $img }}" class="col-lg-3 col-md-3 col-xs-3 col-sm-3" />
						</a>
					@endforeach
				</div>
				<div style="clear: both;"></div>
			</div>
		</div>
	</div>		
@endsection