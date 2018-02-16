@extends('layouts.app')

@section('content')
<div class="container">
@include('laravelroles.rolespermissions.header')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>{{trans('blah::translation.UpdateRole')}}</h1></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                   
                    {{ Form::open(['url' => 'role_update/'.$roleId, 'method' => 'post']) }}
                    <div class ="row  col-md-offset-1">
                    <div class = "col-md-4">
					<label>{{trans('blah::translation.Name')}}:</label>
					</div>
                    <div class = "col-md-4">
					{{ Form::text("name", $roleObj->name) }}
					</div>
					</div>
					<div class ="row  col-md-offset-1">
                    <div class = "col-md-4">
                       <label> {{trans('blah::translation.Routes')}} </label>
                    </div>
                    </div> 
					
					@foreach($routes as $routeObj)
					<?php
					$flag=0;
					$i=-1;
					
					?>
					@foreach($permissions as $perm)
					
					
					@if($perm->id=== $routeObj->id)
					<?php
					$flag=1;
					?>
					@endif
					@endforeach
					
					@if($flag == 1)
						<div class ="row  col-md-offset-2">
						<label>{{ Form::checkbox("routes[]", $routeObj->id, true) }}	</label>				
						{{$routeObj->name}}
						</div>
						
					@endif
					@if($flag == 0)
						<div class ="row  col-md-offset-2">
						<label>{{ Form::checkbox("routes[]", $routeObj->id, false) }}	</label>				
						{{$routeObj->name}}
						</div>
						
					@endif							
					@endforeach	
					<div class ="row  col-md-offset-1">
                    <div class = "col-md-4 col-md-offset-4">
				 {{ Form::submit(trans('blah::translation.Save'), ['name' => 'submit']) }}
                    {{ Form::close() }}
                </div>
            </div>

		</div>
	    </div>
         </div>
    </div>
</div>
@endsection



