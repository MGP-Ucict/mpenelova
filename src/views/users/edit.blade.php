@extends('layouts.app')

@section('content')
<div class="container">
	@include('rolespermissions.header')
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
                    {{ Form::open(['url' => 'admin/user-update/'.$user->id, 'method' => 'put']) }}
					<div class="form-group">
						<label>{{trans('lang::translation.Username')}}:</label>
						{{ Form::text("username", $user->username, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						<label>{{trans('lang::translation.Name')}}:</label>	 
						{{ Form::text("name", $user->name, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						<label>{{trans('lang::translation.Email')}}:</label>	
						{{ Form::text("email", $user->email, ['class' => 'form-control']) }}
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
						<div class="checkbox checkbox-info">
							<label>{{trans('lang::translation.isActive')}}:</label>					
							{{ Form::checkbox("is_active", $user->is_active, $user->is_active) }}
						</div>
					</div>
					<div class="form-group">
						<label>{{trans('lang::translation.Roles')}}:</label>
						@foreach($roles as $role)
							@php
								$flag = false;
							@endphp
							@if(in_array($role->id, $checkedRoles))
								@php
									$flag = true;
								@endphp
							@endif
						
							<div class="checkbox checkbox-info">
								<label>{{ Form::checkbox("roles[]", $role->id, $flag) }}	</label>				
								{{$role->name}}
							</div>	
						@endforeach	
					</div>
					<div class="form-group">
						{!! Form::submit(trans('lang::translation.Save'), ['name' => 'submit', 'class' => 'btn btn-primary']) !!}
					</div>
                    {{ Form::close() }}
 				</div>
	       </div>
		</div>
	</div>
@endsection
