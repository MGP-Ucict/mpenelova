@extends('layouts.app')

@section('content')
<div class="container">
@include('laravelroles.rolespermissions.header')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('blah::translation.Roles') }}</div>

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
                          <th scope="col">{{trans('blah::translation.Name') }}</th>
                          <th scope="col">{{trans('blah::translation.Actions') }}</th>
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
						 trans('blah::translation.Edit')  , ['roleId' => $roleObj['id']]) }}
						{{ Html::linkRoute('role_delete', 
						 trans('blah::translation.Delete') , ['roleId' => $roleObj['id']], ['onclick' => 'return confirm("Delete?")']) }}
						 </td>
						</tr>
					 @endforeach
                    </tbody>
                </table>
                 @if(Auth::user()->hasAccess(['role_create']))
                        {{ Html::linkRoute('role_create', 
                         trans('blah::translation.CreateRole') ) }}
                         @endif
            </div>
        </div>
    </div>
</div>
</div>
@endsection
					
					
