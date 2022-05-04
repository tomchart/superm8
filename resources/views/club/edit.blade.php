<x-layout>
    <x-sidebar.account-sidebar>
        <form method="POST" action='/admin/club/{{ $club->id }}' enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="lg:grid lg:grid-cols-12">
                <div class="col-span-8">
                    <x-form.label name="name" />
                    <x-form.input name="name" :value="old('title', $club->name)" />
                </div>

                <div class="inline-flex col-span-4 ml-4">
                    <x-form.button>update</x-form.button>
                </div>
            </div>

            <x-form.label name="users" />
            <div class="lg:grid lg:grid-cols-12">
                <div class="col-span-8 mt-6">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($club->users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900 hover:underline">
                                                        <a href="/profile/{{ $user->username }}">
                                                            {{ $user->username . ' (' . $user->name . ')' }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form method="POST" action="/admin/club/{{ $club->id }}/{{ $user->id }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="text-xs text-red-500 hover:underline">remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </x-sidebar.account-sidebar>
</x-layout>
