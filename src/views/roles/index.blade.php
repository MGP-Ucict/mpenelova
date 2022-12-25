@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			@include('rolespermissions.header')
			<div class="card">
				<div class="card-header">
					<div class="col-md-4 col-form-label text-md-right">
						{{trans('lang::translation.Roles') }}
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
	                 	<div class="col-md-3">{{trans('lang::translation.Name') }}</div>
		                <div class="col-md-3">{{trans('lang::translation.Actions') }}</div>
		             </div>
            
        			@foreach($roles as $role) 
						@if($role->is_active)
							<div class="row border-bottom border-dark pb-1 pt-1">
						@else 
							<div class="row border-bottom border-dark alert alert-danger pb-1 pt-1">
						@endif
		               <div class="col-md-1">{{$role->id}}</div>
		               <div class="col-md-3">{{$role->name}}</div>
		               <div class="col-md-3">
						@path('roles.edit')
							<a href="{{route('roles.edit', $role->id)}}" class="btn btn-warning"> {{trans('lang::translation.Edit')}}</a>
						@endpath
						@path('roles.destroy')
							<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$role->id}}">
								{{trans('lang::translation.Delete')}}
							</button>

							<!-- Modal -->
							<div class="modal fade" id="deleteModal-{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">{{trans('lang::translation.ConfirmDelete')}}</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								  </div>
								  <div class="modal-body">
									  <form action="{{ route('roles.destroy', $role->id)}}" method="post">
										@method('DELETE')
										<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
										{{trans('lang::translation.Do you really want to delete')}} <b>{{$role->name}}</b>?
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
				@path('roles.create')
				<div class="row mt-1">
					<div class="col-md-2">
						<a href="{{route('roles.create')}}" class="btn btn-info">{{trans('lang::translation.CreateRole')}}
						</a>
					</div>
				</div>
				@endpath
            </div>
        </div>
	</div>
</div>
@endsection
					
					
