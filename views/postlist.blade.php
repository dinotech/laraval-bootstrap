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
			<h2 style="float:left;width:37%;">Post List</h2>
			<a href="{{ url('newpost') }}"><button type="button" class="btn btn-primary" style="float:right;margin:20px 0 10px 10px">Add New</button></a>
			<div style="clear:both;"></div>
			<div class="box box-primary">
			<table class="table table-striped">
				<thead>
					  <tr>
						<th>S.No.</th>
						<th>Title</th>
						<th>State</th>
						<th>Description</th>
						<th>Created Date</th>
						<th>Detals</th>
					  </tr>
				</thead>
				<tbody>
					@foreach($posts as $post)
						<tr>
							<td>{{ $post -> postid }}</td>
							<td>{{ $post -> title }}</td>
							<td>{{ $post -> state }}</td>
							<td>{{ $post -> details }}</td>
							<td>{{ $post -> created_at }}</td>
							<td><a href="{{ url('postdetails/'.$post -> postid) }}"><button type="button" class="btn btn-primary">View</button></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
			@if (Request::path() == 'postlist')
				<div class="pagination">{{ $posts -> links() }}</div>
			@endif
			</div>
		</div>
	</div>		
@endsection

