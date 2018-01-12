@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('blah::translation.CreateRole')}}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    You are logged in!
                    {{ Form::open(['url' => 'role_create', 'method' => 'get']) }}
					<label>{{trans('blah::translation.Name')}}:</label>
					{{ Form::text("name") }}
					<br/>
					
					<label>Is active:</label>
					{{ Form::checkbox("is_active", 1) }}
					<br>
					@foreach($permissions as $routeObj)
						<label>{{ Form::checkbox("routes[]", $routeObj->id) }}	</label>				
						{{$routeObj->name}}
						<br>
					@endforeach	
				 {{ Form::submit('click me', ['name' => 'submit']) }}
                    {{ Form::close() }}
