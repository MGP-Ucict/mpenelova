<div class="navbar">
    <div class="navbar-inner">
		<ul class="nav nav-tabs">
		@path('users-list')
			<li>{{ Html::linkRoute('users-list', trans('lang::translation.Users')) }}&nbsp;</li>
		@endpath
		@path('permissions-list')
            <li>{{ Html::linkRoute('permissions-list', trans('lang::translation.Routes')) }}&nbsp;</li>
		@endpath
		@path('roles-list')
            <li>{{ Html::linkRoute('roles-list', trans('lang::translation.Roles')) }}&nbsp;</li>
		@endpath
		</ul>
	</div>
</div>

