@extends('layouts.app')
@section('content')
<div class="container">
	@include('rolespermissions.header')
	<div class="panel panel-default">
		<div class="panel-heading"><h1>{{trans('lang::translation.CreateRoute')}}</h1></div>
			<div class="panel-body">
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif
					
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif	
				{{ Form::open(['url'=>'admin/permission-create' , 'method' => 'post']) }}
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label for="name">{{trans('lang::translation.Name')}}:</label>
					{{ Form::text("name", null, ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					<label for="route">{{trans('lang::translation.Route')}}:</label>
					{{ Form::text("route", null, ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					<label for="route">{{trans('lang::translation.Method')}}:</label>
						{!! Form::select('method', array(
							'GET'=>'GET',
							'POST'=>'POST',
							'PUT' => 'PUT',
							'DELETE'=> 'DELETE'
						), null, ['class' => 'form-control'] )!!}
				</div>
				<div class="form-group">
					{!! Form::submit(trans('lang::translation.Save'), ['name' => 'submit','class' => 'btn btn-primary']) !!}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
