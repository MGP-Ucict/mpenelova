<div class="navbar">
    <div class="navbar-inner">
		<ul class="nav nav-tabs">
		@path('user_list')
			<li>{{ Html::linkRoute('user_list', trans('lang::translation.Users')) }}&nbsp;</li>
		@endpath
		@path('route_list')
            <li>{{ Html::linkRoute('route_list', trans('lang::translation.Routes')) }}&nbsp;</li>
		@endpath
		@path('role_list')
            <li>{{ Html::linkRoute('role_list', trans('lang::translation.Roles')) }}&nbsp;</li>
		@endpath
		</ul>
	</div>
</div>

