<div class="navbar">
    <div class="navbar-inner">
		<ul class="nav nav-tabs">
		@path('users.index')
			<li><a href="users">{{ trans('lang::translation.Users')}}</a>&nbsp;</li>
		@endpath
		@path('permissions.index')
            <li><a href="permissions">{{ trans('lang::translation.Routes')}}</a>&nbsp;</li>
		@endpath
		@path('roles.index')
            <li><a href="roles">{{ trans('lang::translation.Roles')}}</a>&nbsp;</li>
		@endpath
		</ul>
	</div>
</div>

