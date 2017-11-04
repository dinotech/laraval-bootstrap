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
			<h2 style="float:left;width:37%;">{{$title}}</h2>
			<a href="{{ url('newuser') }}"><button type="button" class="btn btn-primary" style="float:right;margin:20px 0 10px 10px">Add New</button></a>
			<div style="clear:both;"></div>
			<div class="box box-primary">
			<table class="table table-striped">
				<thead>
					  <tr>
						<th>S.No.</th>
						<th>Name</th>
						<th>Email</th>
						<th>Location</th>
						<th>Details</th>
					  </tr>
				</thead>
				<tbody>
					@foreach($alluser as $user)
						<tr>
						<td>{{ $user -> id }}</td>
						<td>{{ $user -> name }}</td>
						<td>{{ $user -> email }}</td>
						<td>{{ $user -> state }}</td>
						<td><a href="{{ url('viewuserdata/'.$user -> id) }}"><button type="button" class="btn btn-primary">View</button></a></td>
					  </tr>
					@endforeach
				</tbody>
				
			</table>
			@if (Request::path() == 'userlist')
				<div class="pagination">{{ $alluser -> links() }}</div>
			@endif
			</div>
		</div>
	</div>		
@endsection