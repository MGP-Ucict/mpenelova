<x-app-layout>
    <x-slot name="header">
    	@include('rolespermissions.header')
    </x-slot>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    	<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg justify-center">
    		<div class="flex max-w-sm mb-4">
               	<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
				</svg>
				<svg data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="size-6 mr-1">
					<path d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" stroke-linecap="round" stroke-linejoin="round" ></path>
			      </svg>   
				  <div class="font-bold ml-3"> 
				  	{{ __("Edit permission") }}
				</div>
			</div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">	
				<div class="text-red-600">
					@if($errors->any())
					    {!! implode('', $errors->all('<div>:message</div>')) !!}
					@endif
				</div>
				<form action="{{ route('permissions.update', $permission)}}" method="post">
				@method('PUT')
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="flex items-center justify-start mb-4">
						<button type="submit" class="bg-gray-700 text-slate-50 rounded-full p-2 flex xs:w-full sm:w-full md:w-60 lg:w-48 text-sm justify-center">
					    	{{ __("Save") }}
						</button>
					</div>
					<label class="block text-sm text-gray-700 dark:text-gray-300">
						{{ __("Name") }}
					</label>
					<div class="mb-4">
						<input type="text" name="name" value="{{$permission->name}}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" />
					</div>
					<div>
					<label class="block text-sm text-gray-700 dark:text-gray-300">
						{{ __("Route") }}
					</label>
					<div class="mb-4">
						<input type="text" name="route" value="{{$permission->route}}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" />
					</div>
				</div>
				<div>
					<label class="block text-sm text-gray-700 dark:text-gray-300">
						{{ __("Method") }}
					</label>
					<div class="mb-4">
						<select name="method" value="{{$permission->method}}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
							<option value="GET" @selected($permission->method == 'GET')>GET</option>
							<option value="POST" @selected($permission->method == 'POST')>POST</option>
							<option value="PUT" @selected($permission->method == 'PUT')>PUT></option>
							<option value="DELETE" @selected($permission->method == 'DELETE')>DELETE</option>
						</select>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</x-app-layout>




