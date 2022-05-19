<div class="mt-6">
    <div x-data="{ expanded1: false, expanded2: false }">
        <button @click="expanded2 = ! expanded2" type="button" class="btn btn-outline btn-primary mr-4 mb-2">add to watchlist</button>
        <button @click="expanded1 = ! expanded1" type="button" class="btn btn-outline btn-primary mb-2">create watchlist</button>

        <div x-show="expanded1" x-collapse>
            {{ $new }}
        </div>

        <div x-show="expanded2" x-collapse>
            {{ $input }}
        </div>
    </div>
</div>
