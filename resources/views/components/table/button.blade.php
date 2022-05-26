<form method="POST" action="{{ $action }}">
    @csrf
    @method($method) 

    <button class="{{ $btnClass }}">{{ $btnText }}</button>
</form>
