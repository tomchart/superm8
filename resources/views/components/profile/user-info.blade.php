<p class="text-lg">{{ $user->name }}</p>
<p class="mb-4 italic text-sm text-gray-500">{{ '@' . $user->username }}</p>
<p class="text-sm">{{ $user->description }}</p>
@foreach ($user->clubs as $club)
<x-link-button href="/club/{{ $club->slug }}" class="btn-outline btn-secondary mt-6 mr-2" :text="$club->name" />
@endforeach
