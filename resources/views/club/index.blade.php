<x-layout>
    <x-sidebar.account-sidebar>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($clubs as $club)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="/club/{{ $club->slug }}">
                                                    {{ $club->name }}
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-12 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/admin/club/{{ $club->id }}/edit" class="text-gray-900 hover:underline">Edit</a>
                                    </td>

                                    <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/admin/club/{{ $club->id }}/leave" class="text-gray-900 hover:underline">Leave</a>
                                    </td>

                                    <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/admin/club/{{ $club->id }}">
                                            @csrf
                                            @method('DELETE')

                                            <button class="text-xs text-red-500 hover:underline">Delete</button>
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
    </x-sidebar.account-sidebar>
</x-layout>
