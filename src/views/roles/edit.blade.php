@extends('layouts.app')
@section('content')
<div class="container">
@include('rolespermissions.header')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
					<h1>
						{{trans('lang::translation.UpdateRole')}}
					</h1>
				</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    {{ Form::open(['url' => 'admin/role-update/'.$role->id, 'method' => 'put']) }}
					<div class="form-group">
						<label for="name">{{trans('lang::translation.Name')}}:</label>
						{{ Form::text("name", $role->name, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						<div class="checkbox checkbox-info">
							<label>{{ Form::checkbox("is_active",true,$role->is_active) }}	</label>	
							{{trans('lang::translation.isActive')}}
						</div>
					</div>
					<div class="form-group">
                       <label for="routes"> {{trans('lang::translation.Routes')}} </label>
						@foreach($permissions as $permission)
							@php
								$flag = false;
							@endphp
							@if(in_array($permission->id, $checkedPermissions))
								@php
									$flag = true;
								@endphp
							@endif
					
							<div class="checkbox checkbox-info">
								<label>{{ Form::checkbox("routes[]", $permission->id, $flag) }}	</label>				
								{{$permission->method}} {{$permission->route}}
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
</div>
@endsection



