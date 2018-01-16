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
                          <th scope="col">Username</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                    
                    
                    @foreach($userObjs as $userObj)
                        <tr>
                        <th scope="row">{{$userObj->id}}</th> 
						<td>{{$userObj->username}}</td>
                        <td>{{$userObj->name}}</td>
                        <td>{{$userObj->email}}</td>
                        <td>
                        @if(Auth::user()->hasAccess(['user_update']))
						{{ Html::linkRoute('user_update', 
						 "Edit" , ['userId' => $userObj['id']]) }}
                         @endif

                         @if(Auth::user()->hasAccess(['user_delete']))
						{{ Html::linkRoute('user_delete', 
						 "Delete", ['userId' => $userObj['id']]) }}
                         @endif
						 </td>
						</tr>
					 @endforeach
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
					
					
