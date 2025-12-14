<x-app-layout>
    <x-slot name="header">
    	@include('rolespermissions.header')
    </x-slot>
	<div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    	<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg justify-center">
    		<div class="flex max-w-sm mb-4">
                <svg fill="#000000" width="30px" height="px" viewBox="0 0 32 32" id="icon" xmlns="http://www.w3.org/2000/svg">
					<defs>
						    <style>
						      .cls-1 {
						        fill: none;
						      }
						    </style>
						  </defs>
						  <title>roles</title>
						  <path d="M20,25a6.9908,6.9908,0,0,1-5.833-3.1287l1.666-1.1074a5.0007,5.0007,0,0,0,8.334,0l1.666,1.1074A6.9908,6.9908,0,0,1,20,25Z"/>
						  <path d="M24,14a2,2,0,1,0,2,2A1.9806,1.9806,0,0,0,24,14Z"/>
						  <path d="M16,14a2,2,0,1,0,2,2A1.9806,1.9806,0,0,0,16,14Z"/>
						  <path d="M28,8H22V4a2.0023,2.0023,0,0,0-2-2H4A2.0023,2.0023,0,0,0,2,4V14a10.01,10.01,0,0,0,8.8027,9.9214A9.9989,9.9989,0,0,0,30,20V10A2.0023,2.0023,0,0,0,28,8ZM4,14V4H20V8H12a2.0023,2.0023,0,0,0-2,2V20a9.9628,9.9628,0,0,0,.168,1.78A8.0081,8.0081,0,0,1,4,14Zm24,6a8,8,0,0,1-16,0V10H28Z"/>
						  <rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32"/>
						</svg>
						<svg data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="size-6 mr-1">
						  <path d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" stroke-linecap="round" stroke-linejoin="round" ></path>
						</svg>  
    				  <div class="font-bold ml-3"> 
    				  	{{trans('lang::translation.UpdateRole')}}
    				</div>
				</div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">	
				<div class="text-red-600">
					@if($errors->any())
					    {!! implode('', $errors->all('<div>:message</div>')) !!}
					@endif
				</div>
			<form action="{{ route('roles.update', $role)}}" method="post">
				@method('PUT')
				<input name="_token" type="hidden" value="{{ csrf_token() }}">
				<div class="flex items-center justify-start mb-4">
					<button type="submit" class="bg-gray-700 text-slate-50 rounded-full p-2 flex xs:w-full sm:w-full md:w-60 lg:w-48 text-sm justify-center">
				    	{{trans('lang::translation.Save')}}
					</button>
				</div>
				<label class="block text-sm text-gray-700 dark:text-gray-300">
					{{trans('lang::translation.Name')}}
				</label>
				<div class="mb-4">
					<input type="text" name="name" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" value="{{$role->name}}"/>
				</div>
				<div class="block mt-4">
                   <input type="checkbox" name="is_active" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                   value="1" @checked($role->is_active)
                   />
					<label class="items-center inline-flex">
						<span class="ms-2 text-sm text-gray-600 dark:text-gray-400">
							{{trans('lang::translation.isActive')}}
						</span>
					</label>
				</div>
				<label class="block text-sm text-gray-700 dark:text-gray-300">
					{{trans('lang::translation.Routes')}}
				</label>
				<div class="mb-4">
					@foreach($permissions as $permission)
					<div class="word-break">	
						<input type="checkbox" name="routes[]" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" value="{{$permission->id}}" @checked(in_array($permission->id, $checkedPermissions))/>
						<label class="items-center inline-flex">
							<span class="ms-2 text-md text-gray-600 dark:text-gray-400">
								{{$permission->name}}
							</span>
						</label>
					</div>	
					@endforeach						
				</div>
			</form>
		</div>
	</div>
</x-app-layout>