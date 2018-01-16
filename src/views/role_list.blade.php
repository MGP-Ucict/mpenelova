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
                    
                    
                    
                    @foreach($roleObjs as $roleObj) 
						{{$roleObj->name}}
						{{ Html::linkRoute('role_update', 
						 'Edit' , ['roleId' => $roleObj['id']]) }}
						{{ Html::linkRoute('role_delete', 
						 'Delete', ['roleId' => $roleObj['id']]) }}
						 <br>
						
					 @endforeach
					
					
