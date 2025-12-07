<x-app-layout>
    <x-slot name="header">
    	@include('rolespermissions.header')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
   			{{trans('lang::translation.UpdateRoute')}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">	
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif
				<form action="{{ route('permission.update', $permission->id)}}" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div>
					<label class="block font-medium text-sm text-gray-700 dark:text-gray-300">
						{{trans('lang::translation.Name')}}
					</label>
					<div class="mb-4">
						<input type="text" name="name" value="{{$permission->name}}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" />
					</div>
				</div>
				<div>
					<label class="block font-medium text-sm text-gray-700 dark:text-gray-300">
						{{trans('lang::translation.Route')}}
					</label>
					<div class="mb-4">
						<input type="text" name="route" value="{{$permission->route}}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" />
					</div>
				</div>
				<div>
					<label class="block font-medium text-sm text-gray-700 dark:text-gray-300">
						{{trans('lang::translation.Method')}}
					</label>
					<div class="mb-4">
						<select name="method" value="{{$permission->method}}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
							<option value="GET" {{($permission->method == 'GET')?"selected":""}}>GET</option>
							<option value="POST" {{($permission->method == 'POST')?"selected":""}}>POST</option>
							<option value="PUT" {{($permission->method == 'PUT')?"selected":""}}>PUT</option>
							<option value="DELETE" {{($permission->method == 'DELETE')?"selected":""}}>DELETE</option>
						</select>
					</div>
				</div>
				<div class="flex items-center justify-start">
					<input type="submit" value="{{trans('lang::translation.Save')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" />
				</div>
				</form>
			</div>
		</div>
	</div>
</x-app-layout>




