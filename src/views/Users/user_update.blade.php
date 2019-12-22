@extends('layouts.app')

@section('content')
<div class="container">
	@include('laravelroles.rolespermissions.header')
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
                    {{ Form::open(['url' => 'admin/user_update/'.$userId, 'method' => 'put']) }}
					<div class="form-group">
						<label>{{trans('lang::translation.Username')}}:</label>
						{{ Form::text("username", $userObj->username, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						<label>{{trans('lang::translation.Name')}}:</label>	 
						{{ Form::text("name", $userObj->name, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						<label>{{trans('lang::translation.Email')}}:</label>	
						{{ Form::text("email", $userObj->email, ['class' => 'form-control']) }}
				    </div>
					<div class="form-group">
						<label>{{trans('lang::translation.Password')}}:</label>	
						{{ Form::password("password", ['class' => 'form-control']) }}
				    </div>
					<div class="form-group">
						<label>{{trans('lang::translation.PasswordConfirm')}}:</label>
						{{ Form::password("password_confirmation", ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						<label>{{trans('lang::translation.isActive')}}:</label>					
						{{ Form::checkbox("is_active", $userObj->is_active, $userObj->is_active)
					</div>
					<div class="form-group">
						<label>{{trans('lang::translation.Roles')}}:</label>
					
					@foreach($roles as $roleObj)
					<?php
						$flag = 0;
						$i = -1;
					?>
					@foreach($rolesOld as $roleOld)
						@if($roleOld->id=== $roleObj->id)
						<?php
							$flag = 1;
						?>
						@endif
					@endforeach
					
					@if($flag == 1)
						<div class="checkbox checkbox-info">
							<label>{{ Form::checkbox("roles[]", $roleObj->id, true) }}	</label>				
							{{$roleObj->name}}
						</div>	
						<br>
					@endif
					@if($flag == 0)
						<div class="checkbox checkbox-info">
							<label>{{ Form::checkbox("roles[]", $roleObj->id, false) }}	</label>				
							{{$roleObj->name}}
						</div>
						<br>
					@endif							
					@endforeach	
					</div>
					<div class="form-group">
						{!! Form::submit(trans('lang::translation.Roles'), ['name' => 'submit', 'class' => 'btn btn-primary']) !!}
					</div>
                    {{ Form::close() }}
 				</div>
	       </div>
		</div>
	</div>
@endsection
