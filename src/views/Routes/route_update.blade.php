@extends('layouts.app')

@section('content')
<div class="container">
@include('laravelroles.rolespermissions.header')
<div class="panel panel-default">
	<div class="panel-heading"><h1>{{trans('lang::translation.UpdateRoute')}}</h1></div>
		<div class="panel-body">
			@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif 
			{{ Form::open(['url' => 'route_update/'.$routeId, 'method' => 'post']) }}
			<div class="form-group">
				<label for="name">{{trans('lang::translation.Name')}}:</label>
				{{ Form::text("name",$routeObj->name, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				<label for="route">{{trans('lang::translation.Route')}}:</label>
				{{ Form::text("route",$routeObj->route, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				<label for="route">{{trans('lang::translation.Method')}}:</label>
					{!! Form::select('method', array(
						'GET','POST','PUT', 'DELETE'
					), "GET", ['class' => 'form-control'] )!!}
			</div>
			<div class="form-group">
				{!! Form::submit(trans('lang::translation.Save'), ['name' => 'submit','class' => 'btn btn-primary']) !!}
				{{ Form::close() }}
			</div>
		</div>
	</div>
 </div>
@endsection
