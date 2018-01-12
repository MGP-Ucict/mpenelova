@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('blah::translation.UpdateRole')}}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    You are logged in!
                    {{ Form::open(['url' => 'role_update/'.$roleId, 'method' => 'get']) }}
					<label>{{trans('blah::translation.Name')}}:</label>
					{{ Form::text("name", $roleObj->name) }}
					<br/>
					
					<label>Is active:</label>
					{{ Form::checkbox("is_active", 1, $roleObj->is_active) }}
					<br>
					@foreach($routes as $routeObj)
					<?php
					$flag=0;
					$i=-1;
					
					?>
					@foreach($permissions as $perm)
					
					
					@if($perm->id=== $routeObj->id)
					<?php
					$flag=1;
					?>
					@endif
					@endforeach
					
					@if($flag == 1)
						<label>{{ Form::checkbox("routes[]", $routeObj->id, true) }}	</label>				
						{{$routeObj->name}}
						<br>
						
					@endif
					@if($flag == 0)
						<label>{{ Form::checkbox("routes[]", $routeObj->id, false) }}	</label>				
						{{$routeObj->name}}
						<br>
						
					@endif							
					@endforeach	
				 {{ Form::submit('click me', ['name' => 'submit']) }}
                    {{ Form::close() }}
