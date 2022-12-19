@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	@include('rolespermissions.header')
            <div class="card">
                <div class="card-header">
                	<div class="col-md-4 col-form-label text-md-right">{{trans('lang::translation.UpdateRoute')}}
                	</div>
                </div>

			<div class="card-body">
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif 
				<form action="{{ route('permissions.update', $permission->id)}}" method="post">
					@method('PUT')
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group row">
						<label class="col-md-4 col-form-label text-md-right">
							{{trans('lang::translation.Name')}}
						</label>
						<div class="col-md-6">
							<input type="text" name="name" class="form-control" value="{{$permission->name}}" />
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-4 col-form-label text-md-right">		{{trans('lang::translation.Route')}}
						</label>
						<div class="col-md-6">
							<input type="text" name="route" class="form-control" value="{{$permission->route}}" />
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-4 col-form-label text-md-right">		{{trans('lang::translation.Method')}}
						</label>
						<div class="col-md-6">
							<select name="method" class="form-control">
								<option value="GET" {{ ( $permission->method == "GET") ? 'selected' : '' }} >GET</option>
								<option value="POST" {{ ( $permission->method == "POST") ? 'selected' : '' }} >POST</option>
								<option value="PUT" {{ ( $permission->method == "PUT") ? 'selected' : '' }} >PUT</option>
								<option value="DELETE" {{ ( $permission->method == "DELETE") ? 'selected' : '' }} >DELETE</option>
							</select>
						</div>
					</div>
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
