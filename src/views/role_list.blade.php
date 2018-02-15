@extends('layouts.app')

@section('content')
<div class="container">
@include('laravelroles.rolespermissions.header')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Roles</div>

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
                          <th scope="col">Name</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                    @foreach($roleObjs as $roleObj) 
                    <tr>
                        <td>
                        {{$roleObj->id}}
                        </td>
                        <td>
						{{$roleObj->name}}
                        </td>
                        <td>
						{{ Html::linkRoute('role_update', 
						 'Edit' , ['roleId' => $roleObj['id']]) }}
						{{ Html::linkRoute('role_delete', 
						 'Delete', ['roleId' => $roleObj['id']]) }}
						 </td>
						</tr>
					 @endforeach
                    </tbody>
                </table>
                 @if(Auth::user()->hasAccess(['role_create']))
                        {{ Html::linkRoute('role_create', 
                         "Create role") }}
                         @endif
            </div>
        </div>
    </div>
</div>
</div>
@endsection
					
					
