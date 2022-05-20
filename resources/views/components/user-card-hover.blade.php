<div class="flex">
    <div x-data="{ open: false }" @mouseleave="open = false" class="">
        <div @mouseover="open = true" class="relative hover:underline">
            <a href="/profile/{{ $user->username }}">
                <li>{{ $user->username }}</li>
            </a>
            <div x-show="open" class="absolute card lg:card-side bg-base-100 shadow-xl w-64 h-128 -top-32">
                <!-- <figure><img src="https://api.lorem.space/image/album?w=400&h=400" alt="Album"></figure> -->
                <div class="card-body">
                    <h2 class="card-title">{{ "@" . $user->username }}</h2>
                    <p>{{ $user->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
