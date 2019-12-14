<div class="navbar">
    <div class="navbar-inner">
		<ul class="nav nav-tabs">
		@if(Auth::user()->hasAccess(['role_list']))
            <li><a href="/role_list">{{trans('lang::translation.Roles') }}</a></li>&nbsp;
		@endif
		@if(Auth::user()->hasAccess(['route_list']))
            <li><a href="/route_list">{{trans('lang::translation.Routes') }}</a></li>&nbsp;
		@endif
		@if(Auth::user()->hasAccess(['user_list']))
            <li><a href="/user_list">{{trans('lang::translation.Users') }}</a></li>&nbsp;
		@endcan
		</ul>
	</div>
</div>

