<div class="mt-10">
    <div x-data="{ expanded: false }">
        <h2 @click="expanded = ! expanded" class="font-bold underline text-lg hover:italic">create new watchlist</h2>
        <div x-show="expanded" x-collapse>
            {{ $new }}
        </div>
    </div>

    <div x-data="{ expanded: false }">
        <h2 @click="expanded = ! expanded" class="font-bold underline text-lg hover:italic">add to list</h2>
        <div x-show="expanded" x-collapse>
            {{ $input }}
        </div>
    </div>

    <div class="mt-6 border-t border-gray-600"></div>

    <h2 class="font-bold underline text-lg mt-6 mb-6">watch lists</h2>
    {{ $list }}
</div>
