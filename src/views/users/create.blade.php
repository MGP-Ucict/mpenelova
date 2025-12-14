<x-app-layout>
    <x-slot name="header">
    	@include('rolespermissions.header')
    </x-slot>
	<div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    	<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg justify-center">
    		<div class="flex max-w-sm mb-4">
				 <svg data-slot="icon" class="size-6" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
				  <path d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" stroke-linecap="round" stroke-linejoin="round"></path>
				</svg>
				<svg data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="size-6 mr-1">
				  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
				</svg>  
			  <div class="font-bold ml-3"> 
			  	{{trans('lang::translation.CreateUser')}}
			</div>
			</div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">	
				<div class="text-red-600">
					@if($errors->any())
					    {!! implode('', $errors->all('<div>:message</div>')) !!}
					@endif
				</div>
			<form action="{{ route('users.store')}}" method="post">
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
					<input type="text" name="name" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"/>
				</div>
				<label class="block text-sm text-gray-700 dark:text-gray-300">
					{{trans('lang::translation.Email')}}
				</label>
				<div class="mb-4">
					<input type="email" name="email" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"/>
				</div>
				<div class="block mt-4">
                   <input type="checkbox" name="is_active" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" value="1" />
					<label class="items-center inline-flex">
						<span class="ms-2 text-sm text-gray-600 dark:text-gray-400">
							{{trans('lang::translation.isActive')}}
						</span>
					</label>
				</div>
				<label class="block text-sm text-gray-700 dark:text-gray-300">
					{{trans('lang::translation.Roles')}}
				</label>
				<div class="mb-4">
					<div class="block">	
					@foreach($roles as $role)
					<div class="word-break">
						<input type="checkbox" name="roles[]" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" value="{{$role->id}}" />
						<label class="items-center inline-flex ">
							<span class="ms-2 text-sm text-gray-600 dark:text-gray-400">
								{{$role->name}}
							</span>
						</label>
					</div>
					@endforeach
					</div>							
				</div>
			</form>
		</div>
	</div>
</x-app-layout>

