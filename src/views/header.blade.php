
<div class="navbar">
    <div class="navbar-inner">

        <ul class="nav nav-tabs">
		@if(Auth::user()->hasAccess(['role_list']))
            <li><a href="/role_list">{{trans('blah::translation.Roles') }}</a></li>
		@endif
		@if(Auth::user()->hasAccess(['route_list']))
            <li><a href="/route_list">{{trans('blah::translation.Routes') }}</a></li>
		@endif
		@if(Auth::user()->hasAccess(['user_list']))
            <li><a href="/user_list">{{trans('blah::translation.Users') }}</a></li>
		@endcan
</div>

