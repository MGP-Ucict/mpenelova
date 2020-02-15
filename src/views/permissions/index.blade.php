@extends('layouts.app')

@section('content')
<div class="container">
@include('rolespermissions.header')
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
					@foreach($permissions as $permission)
					<tr> 
						<td>{{$permission->id}}</td>
						<td>{{$permission->method}}</td>
						<td>{{$permission->name}}</td>
						<td>{{$permission->route}}</td>
						<td>
						@path('permission-update')
							{{ Html::linkRoute('permission-update', trans('lang::translation.Edit') , ['id' => $permission['id']], ['class' => 'btn btn-warning']) }}
						@endpath
						@path('permission-delete')
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$permission->id}}">
						{{trans('lang::translation.Delete')}}
						</button>

						<!-- Modal -->
						<div class="modal fade" id="deleteModal-{{$permission->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">{{trans('lang::translation.ConfirmDelete')}}</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>
							  </div>
							  <div class="modal-body">
								  {{ Form::open(['url' => 'admin/route-delete/'.$permission->id, 'method' => 'delete']) }}
									{{trans('lang::translation.Do you really want to delete')}}<b>{{$permission->method}} {{$permission->route}}</b>?
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
			 @path('permission-create')
				{{ Html::linkRoute('permission-create', trans('lang::translation.CreateRoute'), [],['class' => 'btn btn-info']) }}
			@endpath
            </div>
        </div>
    </div>
</div>
@endsection
					
					
