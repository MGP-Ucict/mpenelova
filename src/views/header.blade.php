<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
	 	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPermissions" aria-controls="navbarPermissions" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarPermissions">
	        <!-- Right Side Of Navbar -->
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item">
					@path('users.index')
					<a class="nav-link" href="{{route('users.index')}}">
						{{ trans('lang::translation.Users')}}
					</a>
					@endpath
				</li>
				<li class="nav-item">
					@path('permissions.index')
			            <a class="nav-link" href="{{route('permissions.index')}}">
			            	{{ trans('lang::translation.Routes')}}
			        	</a>
					@endpath
				</li>
				<li class="nav-item">
					@path('roles.index')
			            <a class="nav-link" href="{{route('roles.index')}}">
				            {{ trans('lang::translation.Roles')}}
				        </a>
					@endpath
				</li>
			</ul>
		</div>
	</div>
</nav>

