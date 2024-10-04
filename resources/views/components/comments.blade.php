<div class="row mx-0 py-5">
    <div class=" col-md-6 col-10 mx-auto">
        <x-card_wapper class="bg-secondary-subtle border border-0 ">
            <x-comment_form :cmtcount="$cmtcount" :blog="$blog"></x-comment_form>
            @foreach ($comments as $cmt)
                <x-comment :cmt="$cmt"></x-comment>
            @endforeach
            <div class=" mt-3">
                {{ $comments->links() }}
            </div>
        </x-card_wapper>
    </div>
</div>
