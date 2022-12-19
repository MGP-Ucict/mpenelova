@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	@include('rolespermissions.header')
            <div class="card">
                <div class="card-header">
                	<div class="col-md-4 col-form-label text-md-right">
						{{trans('lang::translation.UpdateRole')}}
					</div>
				</div>
				<div class="card-body">
	                @if (session('status'))
	                    <div class="alert alert-success">
	                        {{ session('status') }}
	                    </div>
	                @endif
	               
	               <form action="{{ route('roles.update', $role->id)}}" method="post">
						@method('PUT')
						<input name="_token" type="hidden" value="{{ csrf_token() }}">
						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">
								{{trans('lang::translation.Name')}}
							</label>
							<div class="col-md-6">
								<input type="text" name="name" class="form-control" value="{{$role->name}}" />
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6 offset-md-4">
		                        <div class="form-check">
									<input type="checkbox" name="is_active" class="form-check-input" value="1" 
									{{ $role->is_active ? 'checked="checked"' : '' }} />
									<label class="form-check-label">
										{{trans('lang::translation.isActive')}}
									</label>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">
									{{trans('lang::translation.Routes')}}
							</label>
						</div>
						<div style="height: 300px; overflow-y: scroll; overflow-x: hidden;">		
							@foreach($permissions as $permission)
							<div class="form-group row">
			                    <div class="col-md-6 offset-md-4">
			                        <div class="form-check">
										<input type="checkbox" name="routes[]" class="form-check-input" value="{{$permission->id}}" {{ (in_array($permission->id, $checkedPermissions)) ? 'checked="checked"' : '' }}/>
										<label class="form-check-label">
											{{$permission->name}}
										</label>
									</div>
								</div>							
							</div>
							@endforeach	
						</div>
						<div class="form-group row">
							<div class="col-md-4 col-form-label text-md-right">
								<input type="submit" value="{{trans('lang::translation.Save')}}" class="btn btn-primary" />
							</div>
						</div>
	               </form>
	           </div>
			</div>
		</div>
	</div>
</div>
@endsection



