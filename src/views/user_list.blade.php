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
                    
                    
                    You are logged in!
                    @foreach($userObjs as $userObj) 
						{{$userObj->name}}
						{{ Html::linkRoute('user_update', 
						 'Edit' , ['userId' => $userObj['id']]) }}
						{{ Html::linkRoute('user_delete', 
						 'Delete', ['userId' => $userObj['id']]) }}
						 <br>
						
					 @endforeach
					
					
