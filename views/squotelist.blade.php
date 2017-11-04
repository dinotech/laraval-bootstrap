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
			<h2 style="float:left;width:37%;">Quote List</h2>
			<div style="clear:both;"></div>
			<div class="box box-primary">
			<table class="table table-striped">
				<thead>
					  <tr>
						<th>S.No.</th>
						<th>Suplier Name</th>
						<th>Work Days</th>
						<th>Price</th>
						<th>Details</th>
						@if($poststatus == 'panding')
						<th>Download Quotation</th>
						@if(Auth::user()->user_type == 'SuperAdmin')
							<th>Delete</th>
						@endif
						<th>Select</th>
						@endif
					  </tr>
				</thead>
				<tbody>
					<?php $i=1 ?> 
					@foreach($quotes as $quote)
						<tr>
							<td>{{ $i }}</td>
							<td>{{ $quote -> name }}</td>
							<td>{{ $quote -> workdays }}</td>
							<td>{{ $quote -> price }}</td>
							<td><a href="{{ url('sviewsuplier/'.$quote -> suplierid) }}"><button type="button" class="btn btn-primary">View</button></a></td>
							<td><a href="{{ url('../public/quotation/'.$quote -> quotation) }}" target="_blank"><button type="button" class="btn btn-success">Download</button></a></td>
							@if($poststatus == 'panding')
							@if(Auth::user()->user_type == 'SuperAdmin')
								<td><a href="{{ url('deletequote/'.$quote -> bidid) }}"><button type="button" class="btn btn-danger">Delete</button></a></td>
							@endif
							
								@if($quote -> status == 'true')
								<td>
								<a href="{{ url('/supdatequote/'.$quote -> bidid.'/'.$quote -> postid) }}"><button type="button" class="btn btn-primary">Select</button></a></td>
								@else
								<td>
								<a href="{{ url('/supdatequote/'.$quote -> bidid.'/'.$quote -> postid) }}"><button type="button" class="btn btn-default">Select</button></a></td>
								@endif
							@endif
						</tr>
						<?php $i++ ?>
					@endforeach
				</tbody>
				
			</table>
			@if (Request::path() == 'squotelist/'.$postid)
				<div class="pagination">{{ $quotes -> links() }}</div>
			@endif
			</div>
		</div>
	</div>		
@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
	$('#selectsuplier').click(function(){                
        $('#dataform').submit();
      });
});
</script>