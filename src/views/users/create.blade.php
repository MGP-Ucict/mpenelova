@extends('layouts.app')

@section('content')
<div class="container">

@include('rolespermissions.header')
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>{{trans('lang::translation.CreateUser')}}</h1></div>

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
          
                    {{ Form::open(['url' => 'admin/user-create', 'method' => 'post']) }}
                    <div class="form-group">
						<label>{{trans('lang::translation.Username')}}:</label>
						{{ Form::text("username",null, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						<label>{{trans('lang::translation.Name')}}:</label>
						{{ Form::text("name",null, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						<label>{{trans('lang::translation.Email')}}:</label>
						{{ Form::text("email", null, ['class' => 'form-control']) }}
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
							{{ Form::checkbox("is_active")}}
						</div>
					</div>
					<div class="form-group">
					<label>{{trans('lang::translation.Roles')}}:</label>
					@foreach($roles as $role)
					<div class="checkbox checkbox-info">
						<label>{{ Form::checkbox("roles[]", $role->id) }}	</label>				
						{{$role->name}}
					</div>
					@endforeach	
					<div class="form-group">
						{!! Form::submit(trans('lang::translation.Save'), ['name' => 'submit', 'class' => 'btn btn-primary']) !!}
					</div>
                    {{ Form::close() }}
                </div>
	       </div>
        </div>
    </div>

@endsection
