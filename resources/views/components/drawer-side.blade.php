<div class="drawer-side">
    <label for="my-drawer" class="drawer-overlay"></label>
    <ul class="menu p-4 overflow-y-auto w-80 bg-base-300 text-base-content">
        <!-- Sidebar content here -->
        @auth
        <p class="mt-4 ml-2 mb-2 font-semibold">Welcome, {{ auth()->user()->name }}!</p>
        <div class="divider"></div>
        <li><a href="/home">Home</a></li>
        <li><a href="/profile/{{ auth()->user()->username }}">My profile</a></li>
        <li><a href="/club">Create a club</a></li>
        <li><a href="/redeem">Redeem an invite</a></li>
        <div class="divider"></div>
        <p class="mt-2 mb-4 ml-2 font-semibold">Your current clubs: </p>

        @foreach (auth()->user()->clubs as $club)
        <li><a href="/club/{{ $club->slug }}">{{ ucwords($club->name) }}</a></li>
        @endforeach
        <div class="divider"></div>
        <p class="mt-2 mb-4 ml-2 font-semibold">Account: {{ auth()->user()->username }}</p>
        <li><a href="/account">Account Management</a></li>
        <li><a href="/clubs">Club Management</a></li>

        @else
        <p>Please log in to view content.</p>

        @endauth

    </ul>
</div>
