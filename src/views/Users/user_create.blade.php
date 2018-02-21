@extends('layouts.app')

@section('content')
<div class="container">

@include('laravelroles.rolespermissions.header')
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>{{trans('blah::translation.CreateUser')}}</h1></div>

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
                    
                    
                    {{ Form::open(['url' => 'user_create', 'method' => 'post']) }}
                    <div class ="row  col-md-offset-1">
                   	<div class = "col-md-4">	
					<label>{{trans('blah::translation.Name')}}:</label>
				    </div>
				    <div class = "col-md-4">
					{{ Form::text("name") }}
					</div>
					</div>
					<div class ="row  col-md-offset-1">
                   	<div class = "col-md-4">
					<label>{{trans('blah::translation.Email')}}:</label>
				    </div>
				    <div class = "col-md-4">
					{{ Form::text("email") }}
					</div>
					</div>
					
					<div class ="row  col-md-offset-1">
                   	<div class = "col-md-4">	
					<label>{{trans('blah::translation.Password')}}:</label>
					</div>
                   	<div class = "col-md-4">
					{{ Form::password("password") }}
					</div>
					</div>
			<div class ="row  col-md-offset-1">
                   	<div class = "col-md-4">	
					<label>{{trans('blah::translation.PasswordConfirm')}}:</label>
					</div>
                   	<div class = "col-md-4">
					{{ Form::password("password_confirmation") }}
					</div>
					</div>
				    <div class ="row  col-md-offset-1">
                   	<div class = "col-md-4">	
					<label>{{trans('blah::translation.Roles')}}:</label>
				    </div>
					</div>
					@foreach($roles as $roleObj)
					<div class ="row  col-md-offset-2">
						<label>{{ Form::checkbox("roles[]", $roleObj->id) }}	</label>				
						{{$roleObj->name}}
					</div>
					@endforeach	
					<div class ="row  col-md-offset-1">
					<div class = "col-md-4 col-md-offset-4">
				 {{ Form::submit(trans('blah::translation.Save'), ['name' => 'submit']) }}
				 </div>
			</div>
                    {{ Form::close() }}

                    </div>
	       </div>
        </div>
    </div>

@endsection
