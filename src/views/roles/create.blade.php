@extends('layouts.app')
@section('content')

<div class="container">
@include('rolespermissions.header')
    <div class="panel panel-default">
        <div class="panel-heading"><h1>{{trans('lang::translation.CreateRole')}}</h1></div>
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
				
                    
               {{ Form::open(['url' => 'admin/role-create', 'method' => 'post']) }}
				<div class="form-group">
					<label for="name">{{trans('lang::translation.Name')}}:</label>
					{{ Form::text("name", null, ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
					<div class="checkbox checkbox-info">
						<label>{{ Form::checkbox("is_active", true) }}	</label>	
						{{trans('lang::translation.isActive')}}
					</div>
				</div>
				<div class="form-group">
				   <label for="routes"> {{trans('lang::translation.Routes')}}:</label>
					@foreach($permissions as $routeObj)
					<div class="checkbox checkbox-info">
						<label>{{ Form::checkbox("routes[]", $routeObj->id) }}	</label>	
						{{$routeObj->method}} {{$routeObj->route}}
					</div>
					@endforeach	
				</div>
				<div class="form-group">
				{!! Form::submit(trans('lang::translation.Save'), ['name' => 'submit', 'class' => 'btn btn-primary']) !!}
                    {{ Form::close() }}
                </div>
	       </div>
        </div>
    </div>
</div>
@endsection
