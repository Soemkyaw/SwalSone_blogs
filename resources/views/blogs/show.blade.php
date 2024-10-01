<x-layout>
    <!-- blog section start  -->
    <main class=" bg-secondary-subtle">
        <div class="container px-5 pt-3">
            <div class=" d-md-flex justify-content-md-between align-items-lg-center mt-3">
                <h3 class=" fw-bold">{{ $blog->title }}</h3>
                <div class=" text-muted">
                    <span class=" bg-primary-subtle px-2 rounded fw-bold">
                        <a class=" text-decoration-none"
                            href="/?category={{ str_replace(' ', '-', $blog->category->name) }}{{ request('search') ? '&search='.request('search') : '' }}{{ request('author') ? '&author='.request('author') : '' }}">
                            {{ $blog->category->name }}
                        </a>
                    </span>
                </div>
            </div>
            <div class="mt-3 row pb-5">
                <div class=" col-lg-6">
                    <img src="{{ asset('images/free_logo.png') }}" class="img-fluid">
                    <div class="">
                        <div class="my-3">
                            <a href="/?author={{ str_replace(' ','_',$blog->user->author_name) }}" class=" text-success fs-4 fw-bold  text-decoration-none">{{ $blog->user->author_name }}</a>
                        </div>
                        <div class=" fs-6  rounded mb-3 text-muted">{{ $blog->created_at->format('M j, Y, h:i A') }}
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <p>{{ $blog->body }}</p>
                </div>
            </div>
        </div>
    </main>
    <!-- blog section end  -->

    <!-- random bolgs start  -->
    <section class=" py-5">
        <div class=" container my-3">
            <h4 class=" fw-bold text-decoration-underline pb-2 ps-5">Blogs U May Like</h4>
            <div class=" row g-3 px-5">
                @foreach ($randomBlogs as $blog)
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <div class="card shadow-sm">
                            <img src="{{ asset('images/free_logo.png') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-text fw-bold">{{ $blog->title }}</h5>
                                <div class=" text-center  my-2 text-muted">
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
                @endforeach
            </div>
        </div>
    </section>
    <!-- random bolgs end  -->
</x-layout>
