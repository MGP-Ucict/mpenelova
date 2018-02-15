@extends('layouts.app')

@section('content')
<div class="container">
@include('laravelroles.rolespermissions.header')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Routes</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    
                    {{ Form::open(['url' => 'role_update/'.{{$roleId}}, 'method' => 'get']) }}
					<label>Name:</label>
					{{ Form::text("name", $roleObj->name) }}
					<br/>
					
					<label>Is active:</label>
					{{ Form::checkbox("is_active", 1, $roleObj->is_active) }}
					<br>
					@foreach($permissions as $routeObj)
						<label>{{ Form::checkbox("routes[]", $routeObj->id) }}	</label>				
						{{$routeObj->name}}
						<br>
					@endforeach	
				 {{ Form::submit('click me', ['name' => 'submit']) }}
                    {{ Form::close() }}
