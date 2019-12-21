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
					{{ Html::linkRoute('user_delete', 
					 trans('lang::translation.Delete'), ['id' => $userObj['id']], ['class' => 'btn btn-danger','onclick' => 'return confirm("'.trans('blah::translation.Delete').' '.$userObj['name'].'?")']) }}
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
					
					
