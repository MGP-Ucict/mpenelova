@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	@include('rolespermissions.header')
            <div class="card">
                <div class="card-header">
                	<div class="col-md-4 col-form-label text-md-right">
                		{{trans('lang::translation.EditUser')}}
                	</div>
                </div>

                <div class="card-body">
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
					<form action="{{ route('users.update', $user->id)}}" method="post">
						@method('PUT')
						<input name="_token" type="hidden" value="{{ csrf_token() }}">
						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">
								{{trans('lang::translation.Name')}}
							</label>
							<div class="col-md-6">
								<input type="text" name="name" class="form-control" value="{{$user->name}}" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">
								{{trans('lang::translation.Email')}}
							</label>
							<div class="col-md-6">
								<input type="text" name="email" class="form-control" value="{{$user->email}}" />
							</div>
						</div>
						<div class="form-group row">	
							<label class="col-md-4 col-form-label text-md-right">
								{{trans('lang::translation.Password')}}
							</label>
							<div class="col-md-6">
								<input type="password" name="password" class="form-control" />
							</div>
						</div>
						<div class="form-group row">	
							<label class="col-md-4 col-form-label text-md-right">
								{{trans('lang::translation.PasswordConfirm')}}
							</label>
							<div class="col-md-6">
								<input type="password" name="password_confirmation" class="form-control" />
							</div>
						</div>
						<div class="form-group row">
	                        <div class="col-md-6 offset-md-4">
	                            <div class="form-check">
									<input type="checkbox" name="is_active" class="form-check-input" value="1" {{($user->is_active) ? 'checked="checked" ' : '' }} />
									<label class="form-check-label">
										{{trans('lang::translation.isActive')}}
									</label>
								</div>
							</div>
						</div>
					<div class="form-group row">
						<label class="col-md-4 col-form-label text-md-right">
							{{trans('lang::translation.Roles')}}
						</label>
					</div>	
					@foreach($roles as $role)
					<div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
								<input type="checkbox" name="roles[]" class="form-check-input" value="{{$role->id}}" {{ (in_array($role->id, $checkedRoles)) ? 'checked="checked"' : '' }}/>
								<label class="form-check-label">
									{{$role->name}}
								</label>
							</div>
						</div>							
					</div>
					@endforeach	
					<div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
							<input type="submit" value="{{trans('lang::translation.Save')}}" class="btn btn-primary" />
						</div>
					</div>
            	</form>
            </div>
       </div>
	</div>
</div>
@endsection
