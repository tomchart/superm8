<x-layout>
    @auth
    @if (auth()->user()->id == $user->id)
    <div x-data="{ edit: false, view: true }">
        <div x-show="view">
            <x-profile.user-info :user="$user" />
            <button @click="edit = ! edit; view = ! view" type="button" class="btn btn-outline btn-primary mr-4 mt-8 flex">edit profile</button>
        </div>
        <div x-cloak x-show="edit">
            <form method="POST" action="/profile/{{ $user->username }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input name="name" id="name" type="text" value="{{ $user->name }}" class="input input-ghost input-bordered w-full max-w-xs text-lg mb-4 flex" />
                <input name="username" id="username" type="text" value="{{ $user->username }}" class="input input-ghost input-bordered w-full max-w-xs mb-4 italic text-sm input-xs flex" />
                <textarea name="description" id="description" class="textarea textarea-bordered w-full max-w-xs flex">{{ $user->description }}</textarea>
                <input class="" type="file" name="avatar" id="avatar" />
                <button @click="edit = ! edit; view = ! view" type="button" class="btn btn-outline btn-secondary mr-4 mt-8">cancel</button>
                <button @click="edit = ! edit; view = ! view" type="submit" class="btn btn-outline btn-primary mr-4 mt-8">save</button>
            </form>
        </div>
    </div>
    @else
    <x-profile.user-info :user="$user" />
    @endif

    <div class="mt-12 mb-6 border-t border-gray-600"></div>

    @if (auth()->user()->id == $user->id)
    <div x-data="{ expanded: false }">
        <button @click="expanded = ! expanded" type="button" class="btn btn-outline btn-primary mr-4 mb-6">edit watched</button>
        <div x-cloak x-show="expanded" x-collapse>
            <x-profile.add-watched :mediaTypes="$mediaTypes" :ratings="$ratings" />

            <x-table.table>
                <x-slot name="head">
                    <th></th>
                    <th>Media Name</th>
                    <th></th>
                </x-slot>
                <x-slot name="row">
                    @foreach ($user->media as $media)
                    <tr>
                        <th></th>
                        <td class="flex flex-row">
                            <a class="hover:underline" href="/media/{{ $media->id }}">{{ $media->Title }}</a>
                            <x-rating.rating :media="$media" class="flex flex-row px-2 py-1.5" />
                        </td>
                        <th>
                            <x-table.button action="/profile/{{ $user->username }}/{{ $media->id }}" method="DELETE" btnClass="btn btn-xs btn-error" btnText="remove" />
                        </th>
                        @endforeach
                    </tr>
                </x-slot>
            </x-table.table>

            <div class="mt-6 mb-6 border-t border-gray-600"></div>
        </div>
    </div>
    @endif

    <x-watched :user="$user" />

    @endauth
</x-layout>
