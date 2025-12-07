<x-app-layout>
    <x-slot name="header">
    	@include('rolespermissions.header')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
   			{{trans('lang::translation.Routes')}} 	
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            	<div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            		<div class="px-4">
                		<div class="font-medium text-base text-gray-800 dark:text-gray-200">
					        <a href="{{route('permissions.create')}}" 
					        class="text-black bg-brand box-border border border-black hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 rounded-lg">{{trans('lang::translation.CreatePermission')}}</a>
					    </div>
					</div>
	            	@if (session('status'))
						<div class="p-4 mb-4 text-sm text-fg-brand-strong rounded-base bg-brand-softer" role="alert">
							{{ session('status') }}
						</div>
					@endif
	   				<div class="grid xs:grid-cols-1 sm-grid-cols-1 md:grid-cols-5 lg:grid-cols-4 border-b-2 gap-5">
						<div class="column-xs mb-2">#</div>
					  	<div class="column-xs mb-2">
						  	{{trans('lang::translation.Method')}}
						  </div>
					  	<div class="column-xs mb-2">
					  		{{trans('lang::translation.Name')}}
					  	</div>
					  	<div class="column-xs mb-2">
					  		{{trans('lang::translation.Path')}}
					  	</div>
					  	<div class="column-xs mb-2">
					  		{{trans('lang::translation.Actions')}}
					  	</div>
					</div>
					@foreach($permissions as $permission)
						<div class="grid xs:grid-cols-1 sm-grid-cols-1 md:grid-cols-5 lg:grid-cols-5 gap-5 border-b-2 mb-4">
							<div class="column-xs mt-2 mb-2">{{$permission->id}}</div> 
							<div class="column-xs mt-2 mb-2">{{$permission->method}</div>
							<div class="column-xs mt-2 mb-2">{{$permission->name}}</div>
							<div class="column-xs mt-2 mb-2">{{$permission->route}}</div>
							<div class="column-xs mt-2 mb-2">
								<a href="{{route('permissions.edit', $permission->id)}}" class="text-red-400 bg-brand hover:bg-brand-strong box-border border border-red-700 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-xs px-3 py-1 rounded-lg mt-2 mr-2 mb-4"> 	
									{{trans('lang::translation.Edit')}}
								</a>
								<a 	href="#"
					        	class="text-red-700 bg-brand hover:bg-brand-strong box-border border border-red-700 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-xs px-3 py-1 rounded-lg mt-2 mr-2 mb-4">
									{{trans('lang::translation.Delete')}}
						        </a>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</x-app-layout>
					
				
					  	
						
						 