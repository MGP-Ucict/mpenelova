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
							{{ Html::linkRoute('role_update',
							 trans('lang::translation.Edit')  , ['id' => $roleObj['id']], ['class' => 'btn btn-warning']) }}
							{{ Html::linkRoute('role_delete', 
							 trans('lang::translation.Delete') , ['id' => $roleObj['id']], ['class' => 'btn btn-danger','onclick' => 'return confirm("'.trans('lang::translation.Delete').' '. $roleObj['name'].'?")']) }}
						 </td>
						</tr>
					 @endforeach
                    </tbody>
                </table>
                @if(Auth::user()->hasAccess(['role_create']))
                        {{ Html::linkRoute('role_create', 
                         trans('lang::translation.CreateRole'), [],['class' => 'btn btn-info']) }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
					
					
