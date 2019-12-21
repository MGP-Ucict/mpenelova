@extends('layouts.app')

@section('content')
<div class="container">
@include('laravelroles.rolespermissions.header')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>{{trans('lang::translation.UpdateRole')}}</h1></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                   
                    {{ Form::open(['url' => 'admin/role_update/'.$roleId, 'method' => 'put']) }}
					<div class="form-group">
						<label for="name">{{trans('lang::translation.Name')}}:</label>
						{{ Form::text("name", $roleObj->name, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
                       <label for="routes"> {{trans('lang::translation.Routes')}} </label>
						@foreach($routes as $routeObj)
							<?php
								$flag = 0;
								$i = -1;
							?>
							@foreach($permissions as $perm)
								@if($perm->id === $routeObj->id)
								<?php
									$flag=1;
								?>
								@endif
							@endforeach
							
							@if($flag == 1)
								<div class="checkbox checkbox-info">
									<label>{{ Form::checkbox("routes[]", $routeObj->id, true) }}	</label>				
									{{$routeObj->method}} {{$routeObj->route}}
								</div>	
							@endif
							@if($flag == 0)
								<div class="checkbox checkbox-info">
									<label>{{ Form::checkbox("routes[]", $routeObj->id, false) }}	</label>				
									{{$routeObj->method}} {{$routeObj->route}}
								</div>	
							@endif
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



