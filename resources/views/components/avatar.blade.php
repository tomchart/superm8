<div {{ $attributes(['class' => 'avatar']) }}>
    <div class="w-16 rounded-full">
        @if ($user->avatar)
        <img src="{{ asset('storage/' . $user->avatar) }}" />
        @else
        <div class="avatar placeholder">
            <div class="bg-neutral-focus text-neutral-content rounded-full w-16">
                <span class="text-3xl">{{ substr($user->name, 0, 1) }}</span>
            </div>
        </div>
        @endif
    </div>
</div>
