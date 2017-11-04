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
			<!--<a href="{{ url('newpost') }}"><button type="button" class="btn btn-primary" style="float:right;margin:20px 0 10px 10px">Add New</button></a>-->
			<div style="clear:both;"></div>
			<div class="box box-primary">
			<table class="table table-striped">
				<thead>
					  <tr>
						<th>S.No.</th>
						<th>Title</th>
						<th>Created Date</th>
						<th>View Details</th>
					  </tr>
				</thead>
				<tbody>
					<?php $i = 1?>
					@foreach($posts as $post)
						<tr>
							<td>{{ $i }}</td>
							<td>{{ $post -> title }}</td>
							<td>{{ $post -> created_at }}</td>
							<td><a href="{{ url('viewpost/'.$post -> postid) }}"><button type="button" class="btn btn-primary">Details</button></td>
						</tr>
						<?php $i++ ?>
					@endforeach
				</tbody>
			</table>
			@if (Request::path() == 'posts')
				<div class="pagination">{{ $posts -> links() }}</div>
			@endif
			</div>
		</div>
	</div>		
@endsection

