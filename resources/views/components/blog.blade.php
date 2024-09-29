@props(['blog'])
<div class=" col-lg-4 col-md-6">
    <div class="card shadow-sm ">
        <img src="{{ asset('images/free_logo.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
            {{-- <h5 class="card-text fw-bold">Laravel အကြောင်းသိကောင်းစရာများ</h5> --}}
            <h5 class="card-text fw-bold">{{ $blog->title }}</h5>
            <div class=" text-center text-muted my-2">
                <span class=" bg-primary-subtle px-2 rounded">
                    {{ $blog->category->name }}
                </span>
            </div>
            <p>
                {{ Str::words($blog->body, 15, '...') }}
            </p>
            <div class=" d-flex justify-content-between align-items-center">
                <div class=" text-success ">Author - {{ $blog->user->author_name }} </div>
                <div class=" bg-primary-subtle fs-6 px-2 rounded">Read More</div>
            </div>
        </div>
    </div>
</div>
