<div>
    @if(session()->has('message'))
        <div class="py-4 px-2 bg-green-400">{{ session()->get('message') }}</div>
    @elseif(session()->has('error'))
        <div class="py-4 px-2 bg-red-400">{{ session()->get('erro') }}</div>
    @endif
</div>