@extends('layouts.app')

@section('content')
<div class="container">

@include('laravelroles.rolespermissions.header')
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('blah::translation.EditUser')}}</div>

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
                    
                    
                    You are logged in!
                    {{ Form::open(['url' => 'user_update/'.$userId, 'method' => 'get']) }}
					<label>{{trans('blah::translation.Name')}}:</label>
					{{ Form::text("name", $userObj->name) }}
					<br/>
					<label>{{trans('blah::translation.Email')}}:</label>
					{{ Form::text("email", $userObj->email) }}
					<br/>
					<label>{{trans('blah::translation.Password')}}:</label>
					{{ Form::password("password") }}
					<br/>
					<label>Is active:</label>
					{{ Form::checkbox("is_active", 1, $userObj->is_active) }}
					<br>
					@foreach($roles as $roleObj)
					<?php
					$flag=0;
					$i=-1;
					
					?>
					@foreach($roles0 as $role0)
					
					
					@if($role0->id=== $roleObj->id)
					<?php
					$flag=1;
					?>
					@endif
					@endforeach
					
					@if($flag == 1)
						<label>{{ Form::checkbox("roles[]", $roleObj->id, true) }}	</label>				
						{{$roleObj->name}}
						<br>
						
					@endif
					@if($flag == 0)
						<label>{{ Form::checkbox("roles[]", $roleObj->id, false) }}	</label>				
						{{$roleObj->name}}
						<br>
						
					@endif							
					@endforeach	
				 {{ Form::submit('click me', ['name' => 'submit']) }}
                    {{ Form::close() }}
