<x-card_wapper class="border border-0 my-2">
    <div class=" d-flex align-items-center">
        @if ($cmt->user->avatar)
            <img src="{{ asset('storage/'.$cmt->user->avatar) }}" class=" rounded-circle border object-fit-cover" width="50px" height="50px">
        @else
            <img src="{{ asset('images/user-avatar.png') }}" class=" rounded-circle border object-fit-cover" width="50px" height="50px">
        @endif
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
