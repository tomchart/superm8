<div class="ml-56 mr-56 mt-20 absolute inset-0 z-10">
    <div class="hero bg-base-200 rounded-xl border border-gray-600 flex">
        <div class="hero-content flex-col lg:flex-row">
            <img src="{{ asset('storage/images/cannes-resize.jpeg') }}" class="max-w-sm rounded-lg shadow-2xl scale-50" />
            <div>
                <h1 class="text-5xl font-bold">Uh oh!</h1>
                <p class="py-6">You currently have no clubs or watched media 💔</p>
                <x-link-button class="btn btn-primary btn-outline" text="Create a club" href="/club" />
                <x-link-button class="btn btn-primary btn-outline ml-2" text="Redeem an invite" href="/redeem" />
                <x-link-button class="btn btn-primary btn-outline ml-2" text="Add watched media" href="/profile/{{ auth()->user()->username }}" />
            </div>
        </div>
    </div>
</div>
