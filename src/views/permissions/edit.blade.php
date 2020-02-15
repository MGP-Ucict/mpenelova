@extends('layouts.app')
@section('content')
<div class="container">
@include('rolespermissions.header')
<div class="panel panel-default">
	<div class="panel-heading"><h1>{{trans('lang::translation.UpdateRoute')}}</h1></div>
		<div class="panel-body">
			@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif 
			{{ Form::open(['url' => 'admin/route-update/'. $permission->id, 'method' => 'put']) }}
			<div class="form-group">
				<label for="name">{{trans('lang::translation.Name')}}:</label>
				{{ Form::text("name",$permission->name, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				<label for="route">{{trans('lang::translation.Route')}}:</label>
				{{ Form::text("route",$permission->route, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				<label for="route">{{trans('lang::translation.Method')}}:</label>
					{!! Form::select('method', array(
						'GET'=>'GET',
						'POST'=>'POST',
						'PUT' => 'PUT',
						'DELETE'=> 'DELETE'
					), $permission->method, ['class' => 'form-control'] )!!}
			</div>
			<div class="form-group">
				{!! Form::submit(trans('lang::translation.Save'), ['name' => 'submit','class' => 'btn btn-primary']) !!}
				{{ Form::close() }}
			</div>
		</div>
	</div>
 </div>
@endsection
