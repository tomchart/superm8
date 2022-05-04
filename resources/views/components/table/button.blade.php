<td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
    <form method="POST" action="{{ $action }}">
        @csrf
        @method($method)

        <button class="text-xs text-red-500 hover:underline">{{ $text }}</button>
    </form>
</td>
