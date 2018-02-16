@extends('layouts.app')
@section('content')

<div class="container">
@include('laravelroles.rolespermissions.header')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>{{trans('blah::translation.CreateRole')}}</h1></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    
                    {{ Form::open(['url' => 'role_create', 'method' => 'post']) }}
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
                       <label> {{trans('blah::translation.Routes')}}:</label>
                    </div>
                    </div> 
					
					
					@foreach($permissions as $routeObj)
                        <div class ="row  col-md-offset-2">
						<label>{{ Form::checkbox("routes[]", $routeObj->id) }}	</label>	

						{{$routeObj->name}}
                    </div>
				    
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
