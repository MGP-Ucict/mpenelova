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
							{{ Html::linkRoute('role_delete', 
							 trans('lang::translation.Delete') , ['id' => $roleObj['id']], ['class' => 'btn btn-danger','onclick' => 'return confirm("'.trans('lang::translation.Delete').' '. $roleObj['name'].'?")']) }}
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
					
					
