
<div class="navbar">
    <div class="navbar-inner">

        <ul class="nav nav-tabs">
		@if(Auth::user()->hasAccess(['role_list']))
            <li><a href="/role_list">Roles list</a></li>
		@endif
		@if(Auth::user()->hasAccess(['route_list']))
            <li><a href="/route_list">Routes list</a></li>
		@endif
		@if(Auth::user()->hasAccess(['user_list']))
            <li><a href="/user_list">Users list</a></li>
		@endcan
</div>

