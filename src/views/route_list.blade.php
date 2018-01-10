@extends('layouts.app')

@section('content')
<div class="container">


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
                    
                    
                    You are logged in!
                    @foreach($routeObjs as $routeObj) 
						{{$routeObj->name}}
						{{ Html::linkRoute('route_update', 
						 'Edit' , ['routeId' => $routeObj['id']]) }}
						{{ Html::linkRoute('route_delete', 
						 'Delete', ['routeId' => $routeObj['id']]) }}
						 <br>
						
					 @endforeach
					
					