@extends('layouts.app')

@section('content')
<div class="container">
@include('laravelroles.rolespermissions.header')
	<div class="panel panel-default">
        <div class="panel-heading">{{trans('lang::translation.ListUsers')}}</div>
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
					  <th scope="col">{{trans('lang::translation.Username') }}</th>
					  <th scope="col">{{trans('lang::translation.Name') }}</th>
					  <th scope="col">{{trans('lang::translation.Email') }}</th>
					  <th scope="col">{{trans('lang::translation.Actions') }}</th>
					</tr>
				  </thead>
				  <tbody>
				@foreach($userObjs as $userObj)
				<tr>
				<td scope="row">{{$userObj->id}}</td> 
				<td>{{$userObj->username}}</td>
				<td>{{$userObj->name}}</td>
				<td>{{$userObj->email}}</td>
				<td>
				@path('user_update')
					{{ Html::linkRoute('user_update', 
					 trans('lang::translation.Edit') , ['id' => $userObj['id']], ['class' => 'btn btn-warning']) }}
				@endpath
				@path('user_delete')
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$userObj->id}}">
						{{trans('lang::translation.Delete')}}
						</button>

						<!-- Modal -->
						<div class="modal fade" id="deleteModal-{{$userObj->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">{{trans('lang::translation.ConfirmDelete')}}</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>
							  </div>
							  <div class="modal-body">
								  {{ Form::open(['url' => 'admin/user_delete/'.$userObj->id, 'method' => 'delete']) }}
									  {{trans('lang::translation.Do you really want to delete')}} <b>{{$userObj->name}}</b>?
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
			@path('user_create')
				{{ Html::linkRoute('user_create', 
				trans('lang::translation.CreateUser'), [], ['class' => 'btn btn-info']) }}
			@endpath       
            </div>
        </div>
    </div>
</div>
@endsection
					
					
