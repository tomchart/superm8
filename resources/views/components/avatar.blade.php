<div {{ $attributes(['class' => 'avatar']) }}>
    <div class="w-16 rounded-full">
        <img src="{{ asset('storage/' . $user->avatar) }}" />
    </div>
</div>
