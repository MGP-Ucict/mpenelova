@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('blah::translation.CreateUser')}}</div>

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
                    {{ Form::open(['url' => 'user_create', 'method' => 'post']) }}
					<label>{{trans('blah::translation.Name')}}:</label>
					{{ Form::text("name") }}
					<br/>
					<label>{{trans('blah::translation.Email')}}:</label>
					{{ Form::text("email") }}
					<br/>
					<label>{{trans('blah::translation.Password')}}:</label>
					{{ Form::password("password") }}
					<br/>
					<label>Is active:</label>
					{{ Form::checkbox("is_active", 1) }}
					<br>
					@foreach($roles as $roleObj)
						<label>{{ Form::checkbox("roles[]", $roleObj->id) }}	</label>				
						{{$roleObj->name}}
						<br>
					@endforeach	
				 {{ Form::submit('click me', ['name' => 'submit']) }}
                    {{ Form::close() }}
