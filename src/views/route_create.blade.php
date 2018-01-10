@extends('layouts.app')

@section('content')
<div class="container">


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
                    
                    
                    You are logged in!
                    {{ Form::open(['action'=>'\Laravelroles\Rolespermissions\Controllers\RouteController@routeCreate' , 'method' => 'get']) }}
					<label>Name:
					</label>
					{{ Form::text("name") }}
					<br/>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<label>Route:</label>
					{{ Form::text("route") }}
					<br>
					<label>Is active:</label>
					{{ Form::checkbox("is_active", 1) }}
					<br>
				 {{ Form::submit('click me', ['name' => 'submit']) }}
                    {{ Form::close() }}