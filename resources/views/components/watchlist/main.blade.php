<div class="mt-6">
    <div x-data="{ expanded1: false, expanded2: false }">
        <button @click="expanded1 = ! expanded1" type="button" class="bg-gray-700 text-white rounded-full py-2 px-8 hover:bg-gray-800 mt-6 mb-6 ml-4">create watchlist</button>
        <button @click="expanded2 = ! expanded2" type="button" class="bg-gray-700 text-white rounded-full py-2 px-8 hover:bg-gray-800 mt-6 mb-6 ml-4">add to list</button>

        <div x-show="expanded1" x-collapse>
            {{ $new }}
        </div>

        <div x-show="expanded2" x-collapse>
            {{ $input }}
        </div>
    </div>
</div>
