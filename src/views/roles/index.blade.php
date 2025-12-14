<x-app-layout>
    <x-slot name="header">
    	@include('rolespermissions.header')
    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            	<div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            		<div class="px-4">
                		<div class="text-base text-gray-800 dark:text-gray-200">
                			<div class="text-xl text-gray-800 dark:text-gray-200 leading-tight">
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
                				  <div class="font-bold ml-3"> 
                				  	{{trans('lang::translation.Roles') }}
                				</div>
							</div>
            				<a href="{{ route('roles.create')}}"
					        	class="bg-gray-700 text-slate-50 rounded-full p-2 flex xs:w-full sm:w-full md:w-60 lg:w-48 text-sm justify-center">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
									 	<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
									</svg>		
									{{trans('lang::translation.CreateRole')}}
						        </a>
					    </div>
					</div>
					@if (session('status'))
						<div class="text-green-600 border-b-2 mb-4 mt-4">
							{{ session('status') }}
						</div>
					@endif
	   				<div class="grid xs:grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 border-b-2">
						<div class="column-xs mb-2">#</div>
					  	<div class="column-xs mb-2" >{{trans('lang::translation.Name') }}</div>
					  	<div class="column-xs mb-2 w-80 flex">{{trans('lang::translation.Actions') }}</div>
					</div>
	     			@foreach($roles as $role)
					  		@if($role->is_active)
								<div class="grid xs:grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 border-b-2 mb-4">
							@else 
								<div class="grid xs:grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 text-red-600 border-b-2 mb-4">
							@endif
							<div class="column-xs mt-2 mb-2">{{$role->id}}</div> 
							<div class="column-xs mt-2 mb-2">{{$role->name}}</div>
							<div class="column-xs mt-2 mb-2">
								<div class="flex grid grid-cols-2">
								<a 	href="{{ route('roles.edit', $role)}}"
						        	class="bg-gray-700 text-slate-50 rounded-full p-2 flex xs:w-15 sm:w-15 md:w-15 lg:w-15 text-sm justify-center mr-2">
						        	<svg data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="size-6 mr-1">
									  <path d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" stroke-linecap="round" stroke-linejoin="round" ></path>
									</svg>
										{{trans('lang::translation.Edit')}}
						        </a>

						       <button command="show-modal" commandfor="dialog-{{$role->id}}" class="bg-gray-700 text-slate-50 rounded-full p-2 flex xs:w-15 sm:w-15 md:w-15 lg:w-15 text-sm justify-center">
						       	<svg data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="size-6 mr-1">
  									<path d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" stroke-linecap="round" stroke-linejoin="round"></path>
								</svg>{{trans('lang::translation.Delete')}}</button>
								<el-dialog>
								  <dialog id="dialog-{{$role->id}}" aria-labelledby="dialog-{{$role->id}}" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
								    <el-dialog-backdrop class="fixed inset-0 bg-gray-500/75 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

								    <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
								      <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
								        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
								          <div class="sm:flex sm:items-start">
								            <div class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 text-sm sm:size-10">
								              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
								                <path d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" stroke-linecap="round" stroke-linejoin="round" />
								              </svg>
								            </div>
								            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
								              <h3 id="dialog-title" class="text-base  text-gray-900">{{trans('lang::translation.ConfirmDelete')}}</h3>
								              <div class="mt-2">
								                <p class="text-sm text-gray-500">{{trans('lang::translation.ReallyDelete')}} {{$role->name}}?</p>
								              </div>
								            </div>
								          </div>
								        </div>
									    <form action="{{ route('roles.destroy', $role)}}" method="post">
									        @method("DELETE")
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
									        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
									         <button type="submit" command="close" commandfor="dialog-{{$role->id}}" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto">{{trans('lang::translation.Delete')}}</button>
									          <button type="button" command="close" commandfor="dialog-{{$role->id}}" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">{{trans('lang::translation.No')}}</button>
									        </div>
									    </form>
								      </el-dialog-panel>
								    </div>
								  </dialog>
								</el-dialog>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
  		</div>
	</div>
</x-app-layout>
					
					
