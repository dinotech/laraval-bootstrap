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
			<a href="{{ url('newsuplier') }}"><button type="button" class="btn btn-primary" style="float:right;margin:20px 0 10px 10px">Add New</button></a>
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
						<th>Delet</th>
					  </tr>
				</thead>
				<tbody>
					@foreach($allsuplier as $suplier)
						<tr>
						<td>{{ $suplier -> id }}</td>
						<td>{{ $suplier -> name }}</td>
						<td>{{ $suplier -> email }}</td>
						<td>{{ $suplier -> state }}</td>
						<td><a href="{{ url('viewsuplierdata/'.$suplier -> id) }}"><button type="button" class="btn btn-primary">View</button></a></td>
						<td><a href="{{ url('deletesuplier/'.$suplier -> id) }}"><button type="button" class="btn btn-danger">Delete</button></a></td>
					  </tr>
					@endforeach
				</tbody>
				
			</table>
			@if (Request::path() == 'suplierlist')
				<div class="pagination">{{ $allsuplier -> links() }}</div>
			@endif
			</div>
		</div>
	</div>		
@endsection