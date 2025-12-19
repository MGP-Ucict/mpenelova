<div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white dark:bg-gray-900">
    <div class="lg:w-full sm:max-w-md px-6 py-4 bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg justify-center">
        <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                                {{ __("Users") }}
                            </x-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')">
                                {{ __("Roles") }}
                            </x-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('permissions.index')" :active="request()->routeIs('permissions.index')">
                                {{ __("Permissions") }}
                            </x-nav-link>
                        </div>
                    </div>
                    <!-- Hamburger -->
                    <div class="-me-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __("Profile")  }}
                        </x-responsive-nav-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __("Logout")  }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                            {{ __("Users") }}
                        </x-responsive-nav-link>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')">
                            {{ __("Roles") }}
                        </x-responsive-nav-link>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('permissions.index')" :active="request()->routeIs('permissions.index')">
                            {{ __("Permissions") }}
                        </x-responsive-nav-link>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
