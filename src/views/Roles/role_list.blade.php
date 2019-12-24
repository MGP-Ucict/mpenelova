@extends('layouts.app')

@section('content')
<div class="container">
@include('laravelroles.rolespermissions.header')
	<div class="panel panel-default">
        <div class="panel-heading">{{trans('lang::translation.Roles') }}</div>
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
                          <th scope="col">{{trans('lang::translation.Name') }}</th>
                          <th scope="col">{{trans('lang::translation.Actions') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                    @foreach($roleObjs as $roleObj) 
                    <tr>
                        <td>{{$roleObj->id}}</td>
                        <td>{{$roleObj->name}}</td>
                        <td>
						@path('role_update')
							{{ Html::linkRoute('role_update',
							 trans('lang::translation.Edit')  , ['id' => $roleObj['id']], ['class' => 'btn btn-warning']) }}
						@endpath
						@path('role_delete')				
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$roleObj->id}}">
							{{trans('lang::translation.Delete')}}
							</button>

							<!-- Modal -->
							<div class="modal fade" id="deleteModal-{{$roleObj->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">{{trans('lang::translation.ConfirmDelete')}}</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								  </div>
								  <div class="modal-body">
									  {{ Form::open(['url' => 'admin/role_delete/'.$roleObj->id, 'method' => 'delete']) }}
										{{trans('lang::translation.Do you really want to delete')}} <b>{{ $roleObj->name}}</b>?
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
                @path('role_create')
                        {{ Html::linkRoute('role_create', 
                         trans('lang::translation.CreateRole'), [],['class' => 'btn btn-info']) }}
                @endpath
            </div>
        </div>
    </div>
</div>
@endsection
					
					
