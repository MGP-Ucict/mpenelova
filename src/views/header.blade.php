
<div class="navbar">
    <div class="navbar-inner">

        <ul class="nav nav-tabs">
		@can('view', App\Models\Role::class )
            <li><a href="/role_list">Roles list</a></li>
		@endcan
		@can('view', App\Models\Route::class )
            <li><a href="/route_list">Routes list</a></li>
		@endcan
		@can('view', App\Models\User::class )
            <li><a href="/user_list">Users list</a></li>
		@endcan
</div>

