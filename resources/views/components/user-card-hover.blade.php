<div class="flex">
    <div x-data="{ open: false }" @mouseleave="open = false" class="">
        <div @mouseover="open = true" class="relative hover:underline">
            <a href="/profile/{{ $user->username }}">
                <li>{{ $user->username }}</li>
            </a>
            <div x-show="open" class="absolute card lg:card-side bg-base-100 shadow-xl w-80 h-128 -top-32">
                <div class="card-body">
                    <div class="flex">
                        <!-- this is flexing more than i would like but idk how to stop it -->
                        <x-avatar :user="$user" class="flex-none" />
                        <div class="mt-4 ml-4">
                            <a class="card-title">{{ "@" . $user->username }}</a>
                            <p class="text-xs">{{ $user->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
