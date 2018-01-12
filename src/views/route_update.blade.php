@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('blah::translation.UpdateRoute')}}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    You are logged in!
                    {{ Form::open(['url' => 'route_update/'.$routeId, 'method' => 'get']) }}
					<label>{{trans('blah::translation.Name')}}:</label>
					{{ Form::text("name",$routeObj->name) }}
					<br/>
					<label>{{trans('blah::translation.Route')}}:</label>
					{{ Form::text("route",$routeObj->route) }}
					<br>
					<label>Is active:</label>
					{{ Form::checkbox("is_active", 1, $routeObj->is_active) }}
					<br>
				 {{ Form::submit('click me', ['name' => 'submit']) }}
                    {{ Form::close() }}
