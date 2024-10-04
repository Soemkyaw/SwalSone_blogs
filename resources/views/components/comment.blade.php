<x-card_wapper class="border border-0 my-2">
    <div class=" d-flex align-items-center">
        <img src="{{ asset('images/free_logo.png') }}" class=" rounded-circle border" width="50px" height="50px">
        <div class=" ms-3">
            <a href="" class=" fs-5 text-decoration-none text-dark fw-bold">{{ $cmt->user->author_name }}</a>
        </div>
    </div>
    <div style="margin-left: 65px">
        <p class="">
            {{ $cmt->body }}
        </p>
    </div>
</x-card_wapper>
