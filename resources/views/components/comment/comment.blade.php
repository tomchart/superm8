<x-panel>
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <div class="flex inline-flex">
                <x-avatar :user="$comment->user" />
                <div class="mt-5 ml-4">
                    <a href="/profile/{{ $comment->user->username}}" class="hover:underline">{{ $comment->user->username }}</a>
                    <p class="text-xs text-gray-500"><time>Posted {{ $comment->created_at->format('F j, Y, g:i a') }}</time></p>
                </div>
            </div>
            <div class="mt-4">{{ $comment->body }}</div>
        </div>
    </article>
</x-panel>
