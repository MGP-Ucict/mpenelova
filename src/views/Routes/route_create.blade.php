@extends('layouts.app')

@section('content')
<div class="container">
@include('laravelroles.rolespermissions.header')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>{{trans('lang::translation.CreateRoute')}}</h1></div>

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
                    
                    {{ Form::open(['url'=>'route_create' , 'method' => 'post']) }}
                    <div class ="row  col-md-offset-1">
						<div id="form-control">
							<div class = "col-md-4">
								<label>{{trans('lang::translation.Name')}}:</label>
							</div>
							<div class = "col-md-4">
								{{ Form::text("name") }}
							</div>
						</div>	
                    </div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class ="row  col-md-offset-1">
						<div id="form-control">
							<div class = "col-md-4">
								<label>{{trans('lang::translation.Route')}}:</label>
							</div>
							<div class = "col-md-4">
								{{ Form::text("route") }}
							</div>
						</div>
                    </div>
					<div class ="row  col-md-offset-1">
						<div id="form-control">
							<div class = "col-md-4">
								<label>{{trans('lang::translation.Method')}}:</label>
							</div>
							<div class = "col-md-4">
								{{ Form::text("method") }}
							</div>
						</div>
                    </div>
					<div class ="row  col-md-offset-1">
						<div class = "col-md-4 col-md-offset-4">
						 {{ Form::submit(trans('lang::translation.Save'), ['name' => 'submit']) }}
							{{ Form::close() }}
						</div>
					</div>
				</div>
			</div>
         </div>
    </div>
</div>
@endsection
