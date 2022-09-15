<div x-data="{ expanded: false }">
    <button @click="expanded = ! expanded" type="button" class="btn btn-outline btn-primary mb-2">leave a comment</button>
    <div x-show="expanded" x-collapse>
        <form method="POST" action="{{ $action }}">
            @csrf
            <x-form.input name="body" placeholder="enter comment..." required />
            <x-form.button>post</x-form.button>
        </form>
    </div>
</div>
