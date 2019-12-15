<div class="navbar">
    <div class="navbar-inner">
		<ul class="nav nav-tabs">
		@if(Auth::user()->hasAccess('user_list'))
			<li>{{ Html::linkRoute('user_list', trans('lang::translation.Users')) }}&nbsp;</li>
		@endif
		@if(Auth::user()->hasAccess('route_list'))
            <li>{{ Html::linkRoute('route_list', trans('lang::translation.Routes')) }}&nbsp;</li>
		@endif
		@if(Auth::user()->hasAccess('role_list'))
            <li>{{ Html::linkRoute('role_list', trans('lang::translation.Roles')) }}&nbsp;</li>
		@endif
		</ul>
	</div>
</div>

