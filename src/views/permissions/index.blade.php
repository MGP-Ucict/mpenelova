@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			@include('rolespermissions.header')
			<div class="card">
				<div class="card-header">
					<div class="col-md-4 col-form-label text-md-right">
						{{trans('lang::translation.Routes')}} 
					</div>
				</div>
				<div class="card-body">
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif        
				<div class="row">
					<div class="col-md-12">
						<div class="row border-bottom border-dark">
							<div class="col-md-1">#</div>
					  		<div class="col-md-2">{{trans('lang::translation.Method')}}</div>
					 		<div class="col-md-3">{{trans('lang::translation.Name')}}</div>
					  		<div class="col-md-3">{{trans('lang::translation.Path')}}</div>
					  	</div>
					  	
						@foreach($permissions as $permission)
						  	<div class="row border-bottom border-dark pb-1 pt-1">
								<div class="col-md-1">{{$permission->id}}</div>
								<div class="col-md-2">{{$permission->method}}</div>
								<div class="col-md-3">{{$permission->name}}</div>
								<div class="col-md-3">{{$permission->route}}</div>
								<div class="col-md-3">
									@path('permissions.edit')
										<a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-warning"> {{trans('lang::translation.Edit')}}</a>
									@endpath
									@path('permissions.destroy')
										<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$permission->id}}">
											{{trans('lang::translation.Delete')}}
										</button>
									<!-- Modal -->
									<div class="modal fade" id="deleteModal-{{$permission->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">{{trans('lang::translation.ConfirmDelete')}}</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										  </div>
										  <div class="modal-body">
											<form action="{{ route('permissions.destroy', $permission->id)}}" method="post">
												@method('DELETE')
												<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
												{{trans('lang::translation.Do you really want to delete')}} <b>{{$permission->name}}</b>?
												<br>
												<input type="submit" class="btn btn-danger" value="{{trans('lang::translation.Delete')}}"/>
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('lang::translation.No')}}</button>
											</form>
										</div>
									  </div>
									</div>
								</div>
							@endpath	
							</div>
						</div>
						@endforeach
				</div>
			</div>
			@path('permissions.create')
				<div class="row mt-1">
					<div class="col-md-2">
						<a href="{{route('permissions.create')}}" class="btn btn-info">{{trans('lang::translation.CreatePermission')}}</a>
					</div>
				</div>
			@endpath
            </div>
        </div>
    </div>
</div>
@endsection
					
					
