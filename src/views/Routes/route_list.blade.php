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
						@path('route_update')
							{{ Html::linkRoute('route_update', trans('lang::translation.Edit') , ['id' => $routeObj['id']], ['class' => 'btn btn-warning']) }}
						@endpath
						@path('route_delete')
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$routeObj->id}}">
						{{trans('lang::translation.Delete')}}
						</button>

						<!-- Modal -->
						<div class="modal fade" id="deleteModal-{{$routeObj->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">{{trans('lang::translation.ConfirmDelete')}}</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>
							  </div>
							  <div class="modal-body">
								  {{ Form::open(['url' => 'admin/route_delete/'.$routeObj->id, 'method' => 'delete']) }}
									Do you really want to delete <b>{{$routeObj->method}} {{$routeObj->route}}</b>?
									<br>
									{!! Form::submit(trans('lang::translation.Delete'), ['name' => 'submit','class' => 'btn btn-danger']) !!}
								   <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
								  {{ Form::close() }}
							</div>
						  </div>
						</div>
						@endpath
						 </td>
					</tr>	
					@endforeach
				</tbody>
			</table>
			 @path('route_create')
				{{ Html::linkRoute('route_create', trans('lang::translation.CreateRoute'), [],['class' => 'btn btn-info']) }}
			@endpath
            </div>
        </div>
    </div>
</div>
@endsection
					
					
