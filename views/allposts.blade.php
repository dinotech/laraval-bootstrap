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
			<div style="clear:both;"></div>
			<div class="box box-primary">
			<table class="table table-striped">
				<thead>
					  <tr>
						<th>S.No.</th>
						<th>Title</th>
						<th>State</th>
						<th>Created Date</th>
						<th>Due Date</th>
						<th>Details</th>
						<th>Quotes</th>
						<th>Status</th>
					  </tr>
				</thead>
				<tbody>
					@foreach($allpost as $post)
						<tr>
							<td>{{ $post -> postid }}</td>
							<td>{{ $post -> title }}</td>
							<td>{{ $post -> state }}</td>
							<td>{{ $post -> created_at }}</td>
							<td>
								<!--<form action="{{ url('/updateduedate/'.$post -> postid) }}" method="POST" id="dateform">
									{{ csrf_field() }}
									<input type="date" name="duedate" id="duedate" value="{{ $post -> duedate }}">
								</form>-->
								{{ $post -> duedate }}
							</td>
							<td><a href="{{ url('allpostdetails/'.$post -> postid) }}"><button type="button" class="btn btn-primary">View</button></a></td>
							<?php 
							date_default_timezone_set('Africa/Johannesburg');
							$currdate = date('Y-m-d H:i:s');
							?>
							@if($post -> duedate <= $currdate)
								<td><a href="{{ url('/quotelist/'.$post -> postid) }}"><button type="button" class="btn btn-primary">Quotes</button></a></td>
							@else
								<td><a><button type="button" class="btn btn-primary" disabled>Quotes</button></a></td>
							@endif
							<td><a href="{{ url('/updatestatus/'.$post -> postid) }}"><button type="button" class="btn btn-primary">Archive</button></a></td>
						</tr>
					@endforeach
				</tbody>
				
			</table>
			@if (Request::path() == 'allposts')
				<div class="pagination">{{ $allpost -> links() }}</div>
			@endif
			</div>
		</div>
	</div>		
@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
	$('#duedate').change(function(){                
        $('#dateform').submit();
      });
});
</script>