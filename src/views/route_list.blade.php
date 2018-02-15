@extends('layouts.app')

@section('content')
<div class="container">
@include('laravelroles.rolespermissions.header')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Routes</div>

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
                    @foreach($routeObjs as $routeObj)
                    <tr> 
                        <td>
                        {{$routeObj->id}}
                        </td>
                        <td>
						{{$routeObj->name}}
                        </td>
                        <td>
						{{ Html::linkRoute('route_update', 
						 'Edit' , ['routeId' => $routeObj['id']]) }}
						{{ Html::linkRoute('route_delete', 
						 'Delete', ['routeId' => $routeObj['id']]) }}
						 </td>
					</tr>	
					 @endforeach
                    </tbody>
                </table>
                 @if(Auth::user()->hasAccess(['route_create']))
                        {{ Html::linkRoute('route_create', 
                         "Create route") }}
                         @endif
            </div>
        </div>
    </div>
</div>
</div>
@endsection
					
					
