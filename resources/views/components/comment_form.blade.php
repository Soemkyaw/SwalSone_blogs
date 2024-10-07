<form action="/blog/{{ $blog->id }}/comment" method="POST" class=" mb-3">
    @csrf
    <div class=" d-flex justify-content-between my-3">
        <h4 class=" fw-bold fs-5">Reader Dicussion</h4>
        <p>{{ $cmtcount }} comments</p>
    </div>
    <div class="bg-white p-3 rounded">
        <div class="input-group my-3">
            <img src="{{ asset('images/free_logo.png') }}" class=" rounded-circle border" width="50px" height="50px">
            <textarea class="form-control ms-3 border border-0 rounded" name="body" rows="5"
                aria-label="With textarea" placeholder="Write a comment..."></textarea>
        </div>
        @error('body')
            <small class=" text-danger" style="margin-left: 66px">{{ $message }}</small>
        @enderror
        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
        <div class=" d-flex justify-content-end mb-3">
            <button type="submit" class="btn btn-primary px-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" width="24" height="24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                </svg>

            </button>
        </div>
    </div>
</form>
