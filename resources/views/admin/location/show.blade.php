@extends('admin.layouts.app')
@section('title', 'Điểm thi')
@section('page-title', 'Điểm thi')
@section('page-title-small', 'statistics, charts, recent events and reports')
@section('content')
<div class="row">
	<div class="col-md-8">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-pointer font-blue"></i>
					<span class="caption-subject font-blue bold uppercase">Điểm thi</span>
				</div>
			</div>
			<div class="portlet-body">
				<h4>Tên điểm thi: <strong>{{$location->name}}</strong></h4>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Tên phòng thi</th>
							<th scope="col">Số máy</th>
							<th scope="col">Số ca thi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($location->rooms as $room)
						<tr>
							<th scope="row">{{$loop->index+1}}</th>
							<td>
								<a href="{{route('room.show', $room->id)}}">{{$room->name}}</a>
							</td>
							<td>{{$room->computer_quantity}}</td>
							<td>{{$room->shifts()->count()}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<p>Tổng số phòng: <strong>{{$location->rooms->count()}}</strong></p>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus font-blue"></i>
					<span class="caption-subject font-blue bold uppercase">Thêm phòng thi</span>
				</div>
			</div>
			<div class="portlet-body">
				<form action="{{URL::to('admin/room')}}" method="POST" class="form-horizontal" role="form">
					{{ csrf_field() }}
					<input type="hidden" name="location_id" value="{{$location->id}}">
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-4 control-label">Tên phòng thi</label>
							<div class="col-md-8">
								<input type="text" name="name" class="form-control input-inline input-medium" placeholder="Enter text">
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-4 col-md-8">
								<button type="submit" class="btn green">Submit</button>
								<a href="{{URL::to('admin/room')}}" type="button" class="btn default">Cancel</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection