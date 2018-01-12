@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>{{trans('blah::translation.UpdateRoute')}}</h1></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    You are logged in!
                    {{ Form::open(['url' => 'route_update/'.$routeId, 'method' => 'get']) }}
					<label>{{trans('blah::translation.Name')}}:</label>
					{{ Form::text("name",$routeObj->name) }}
					<br/>
					<label>{{trans('blah::translation.Route')}}:</label>
					{{ Form::text("route",$routeObj->route) }}
					<br>
					
				 {{ Form::submit(trans('blah::translation.Save'), ['name' => 'submit']) }}
                    {{ Form::close() }}

		</div>
	    </div>
         </div>
    </div>
</div>
@endsection
