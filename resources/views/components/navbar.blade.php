<nav class="text-black">
    <div class="navbar bg-secondary">
        <div class="flex-none">
            <label for="my-drawer" class="btn btn-square btn-ghost drawer-button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </label>
        </div>
        <div class="flex-1">
            <a href="/" class="btn btn-ghost normal-case text-xl italic ml-4">superm8</a>
        </div>
        @auth
        <div class="flex-none">
            <div class="dropdown dropdown-end mr-4">
                <label tabindex="0" class="">
                    <a class="flex">{{ auth()->user()->username }}
                        <svg class="fill-current ml-1 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                        </svg>
                    </a>
                </label>
                <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-secondary rounded-box w-52">
                    <li><a href="/profile/{{ auth()->user()->username }}">My Profile</a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </div>
        </div>
        @else
        <div class="flex-none">
            <ul class="menu menu-horizontal p-0 mr-4">
                <li><a href="/login">login</a></li>
            </ul>
        </div>
        @endauth
    </div>
</nav>
