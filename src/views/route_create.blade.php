@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('blah::translation.CreateRoute')}}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    You are logged in!
                    {{ Form::open(['action'=>'\Laravelroles\Rolespermissions\Controllers\RouteController@routeCreate' , 'method' => 'get']) }}
					<label>{{trans('blah::translation.Name')}}:
					</label>
					{{ Form::text("name") }}
					<br/>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<label>{{trans('blah::translation.Route')}}:</label>
					{{ Form::text("route") }}
					<br>
					<label>Is active:</label>
					{{ Form::checkbox("is_active", 1) }}
					<br>
				 {{ Form::submit('click me', ['name' => 'submit']) }}
                    {{ Form::close() }}
