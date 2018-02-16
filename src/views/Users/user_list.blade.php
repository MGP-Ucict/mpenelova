@extends('layouts.app')

@section('content')
<div class="container">
@include('laravelroles.rolespermissions.header')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('blah::translation.ListUsers')}}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">{{trans('blah::translation.Username') }}</th>
                          <th scope="col">{{trans('blah::translation.Name') }}</th>
                          <th scope="col">{{trans('blah::translation.Email') }}</th>
                          <th scope="col">{{trans('blah::translation.Actions') }}</th>
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
                        @if(Auth::user()->hasAccess(['user_update']))
						{{ Html::linkRoute('user_update', 
						 trans('blah::translation.Edit') , ['userId' => $userObj['id']], ['class' => 'btn btn-warning']) }}
                         @endif

                         @if(Auth::user()->hasAccess(['user_delete']))
						{{ Html::linkRoute('user_delete', 
						 trans('blah::translation.Delete'), ['userId' => $userObj['id']], ['class' => 'btn btn-danger'],['onclick' => 'return confirm("'.trans('blah::translation.Delete').' '.$userObj['name'].'?")']) }}
                         @endif
						 </td>
						</tr>
					 @endforeach
                    </tbody>
                </table>
                 @if(Auth::user()->hasAccess(['user_create']))
                        {{ Html::linkRoute('user_create', 
                         trans('blah::translation.CreateUser'), [], ['class' => 'btn btn-info']) }}
                         @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
					
					
