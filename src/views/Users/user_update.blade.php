@extends('layouts.app')

@section('content')
<div class="container">

@include('laravelroles.rolespermissions.header')
    

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>{{trans('lang::translation.EditUser')}}</h1></div>

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
                    
                    
                    
                    {{ Form::open(['url' => 'user_update/'.$userId, 'method' => 'post']) }}
                    <div class ="row  col-md-offset-1">
                   	<div class = "col-md-4">	
					<label>{{trans('lang::translation.Name')}}:</label>
					</div>
				    <div class = "col-md-4">	 
					{{ Form::text("name", $userObj->name) }}
				    </div>
					</div>
					
					<div class ="row  col-md-offset-1">
                   	<div class = "col-md-4">	
					<label>{{trans('lang::translation.Email')}}:</label>
				    </div>
                   	<div class = "col-md-4">	
					{{ Form::text("email", $userObj->email) }}
				    </div>
				    </div>
					
					<div class ="row  col-md-offset-1">
                   	<div class = "col-md-4">	
					<label>{{trans('lang::translation.Password')}}:</label>
				    </div>
                   	<div class = "col-md-4">	
					{{ Form::password("password") }}
				    </div>
				    </div>
					
			<div class ="row  col-md-offset-1">
                   	<div class = "col-md-4">	
					<label>{{trans('lang::translation.PasswordConfirm')}}:</label>
					</div>
                   	<div class = "col-md-4">
					{{ Form::password("password_confirmation") }}
					</div>
					</div>		
				    <div class ="row  col-md-offset-1">
                   	<div class = "col-md-4">	
					<label>{{trans('lang::translation.Roles')}}:</label>
				    </div>
					</div>
					
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
					<div class ="row  col-md-offset-2">
						<label>{{ Form::checkbox("roles[]", $roleObj->id, true) }}	</label>				
						{{$roleObj->name}}
					</div>
						<br>
						
					@endif
					@if($flag == 0)
					<div class ="row  col-md-offset-2">
						<label>{{ Form::checkbox("roles[]", $roleObj->id, false) }}	</label>				
						{{$roleObj->name}}
					</div>
						<br>
						
					@endif							
					@endforeach	

					<div class ="row  col-md-offset-1">
					<div class = "col-md-4 col-md-offset-4">
				 {{ Form::submit(trans('lang::translation.Roles'), ['name' => 'submit']) }}
				</div>
			</div>
                    {{ Form::close() }}
 				</div>
	       </div>
        </div>
    </div>

@endsection
