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
                <a href="/?author={{ str_replace(' ','_',$blog->user->author_name) }}" class=" text-success text-decoration-none">{{ $blog->user->author_name }} </a>
                <a href="/blog/{{ str_replace(' ','_',$blog->title) }}" class=" bg-primary-subtle fs-6 px-2 rounded text-decoration-none">Read More</a>
            </div>
        </div>
    </div>
</div>
