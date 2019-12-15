@extends('layouts.app')

@section('content')
<div class="container">
@include('laravelroles.rolespermissions.header')
    <div class="panel panel-default">
        <div class="panel-heading">{{trans('lang::translation.Routes')}} </div>
			<div class="panel-body">
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif        
				<table class="table table-striped">
				  <thead class="thead">
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">{{trans('lang::translation.Method')}}</th>
					  <th scope="col">{{trans('lang::translation.Name')}}</th>
					  <th scope="col">{{trans('lang::translation.Path')}}</th>
					</tr>
				  </thead>
				  <tbody>
					@foreach($routeObjs as $routeObj)
					<tr> 
						<td>{{$routeObj->id}}</td>
						<td>{{$routeObj->method}}</td>
						<td>{{$routeObj->name}}</td>
						<td>{{$routeObj->route}}</td>
						<td>
						{{ Html::linkRoute('route_update', trans('lang::translation.Edit') , ['id' => $routeObj['id']], ['class' => 'btn btn-warning']) }}
						{{ Html::linkRoute('route_delete', trans('lang::translation.Delete'),  ['id' => $routeObj['id']],  ['class' => 'btn btn-danger','onclick' => 'return confirm("'.trans('lang::translation.Delete').' '.$routeObj['name'].'?")']) }}
						 </td>
					</tr>	
					@endforeach
				</tbody>
			</table>
			 @if(Auth::user()->hasAccess(['route_create']))
				{{ Html::linkRoute('route_create', trans('lang::translation.CreateRoute'), [],['class' => 'btn btn-info']) }}
			@endif
            </div>
        </div>
    </div>
</div>
@endsection
					
					
