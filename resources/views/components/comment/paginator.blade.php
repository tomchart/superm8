<div class="btn-group mt-4">
    @foreach ($paginator->links()->elements as $elements)
    @foreach ($elements as $page_num => $url)
    @if ($paginator->currentPage() == $page_num)
    <x-link-button class="btn-active" :href="$url" :text="$page_num" />
    @else
    <x-link-button :href="$url" :text="$page_num" />
    @endif
    @endforeach
    @endforeach
</div>
