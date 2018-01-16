@extends('layouts.app')

@section('content')
<div class="container">
@include('laravelroles.rolespermissions.header')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>{{trans('blah::translation.CreateRoute')}}</h1></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    
                    {{ Form::open(['action'=>'\Laravelroles\Rolespermissions\Controllers\RouteController@routeCreate' , 'method' => 'get']) }}
					<label>{{trans('blah::translation.Name')}}:
					</label>
					{{ Form::text("name") }}
					<br/>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<label>{{trans('blah::translation.Route')}}:</label>
					{{ Form::text("route") }}
					<br>
					
				 {{ Form::submit(trans('blah::translation.Save'), ['name' => 'submit']) }}
                    {{ Form::close() }}
		</div>
	    </div>
         </div>
    </div>
</div>
@endsection
