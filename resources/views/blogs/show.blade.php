<x-layout>
    <!-- blog section start  -->
    <main class=" bg-secondary-subtle">
        <div class="container px-5 pt-3">
            <div class=" d-md-flex justify-content-md-between align-items-lg-center mt-3">
                <h3 class=" fw-bold">{{ $blog->title }}</h3>
                <div class=" text-muted">
                    <span class=" bg-primary-subtle px-2 rounded fw-bold">
                        <a class=" text-decoration-none"
                            href="/?category={{ str_replace(' ', '-', $blog->category->name) }}{{ request('search') ? '&search=' . request('search') : '' }}{{ request('author') ? '&author=' . request('author') : '' }}">
                            {{ $blog->category->name }}
                        </a>
                    </span>
                </div>
            </div>
            <div class="mt-3 row pb-5">
                <div class=" col-lg-6">
                    <img src="{{ asset('storage/'.$blog->thumbnail) }}" class="img-fluid" class=" img-fixed-size img-thumbnail">
                    <div class="">
                        <div class="my-3">
                            <a href="/?author={{ $blog->user->slug }}"
                                class=" text-success fs-4 fw-bold  text-decoration-none">{{ $blog->user->author_name }}</a>
                        </div>
                        <div class=" fs-6  rounded mb-3 text-muted">{{ $blog->created_at->format('M j, Y, h:i A') }}
                        </div>
                        @auth
                            @if (auth()->id() === $blog->user_id)
                                <div>
                                    <a href="/blog/{{ $blog->slug }}/edit" class=" btn btn-primary">Edit</a>
                                    <form action="/blog/{{ $blog->slug }}/destroy" method="POST" class=" d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class=" btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            @else
                                <form action="/blog/{{ $blog->id }}/subscription" method="POST">
                                    @csrf
                                    @if (auth()->user()->isSubscribed($blog))
                                        <button class=" btn btn-danger">
                                            Unsubscribe
                                        </button>
                                    @else
                                        <button class=" btn btn-warning">
                                            Subscribe
                                        </button>
                                    @endif
                                </form>
                            @endif
                        @else
                            <span class="d-inline-block" tabindex="0" data-bs-placement="bottom" data-bs-toggle="tooltip"
                                data-bs-title="U need to login first.">
                                <button class="btn btn-warning" type="button" disabled>Subscribe</button>
                            </span>
                        @endauth
                    </div>
                </div>
                <div class=" col-lg-6">
                    <p>{{ $blog->content }}</p>
                </div>
            </div>
        </div>
        {{-- comments start  --}}
        @auth
            {{-- <x-comments :comments="$blog->comments()->latest()->paginate(5)" :blog="$blog"></x-comments> --}}
            <x-comments :comments="$comments" :blog="$blog"></x-comments>
        @else
            <p class=" py-5 text-center">
                Please <a href="/login">log in</a> to view and participate in the discussion.
            </p>
        @endauth
        {{-- comments end  --}}
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
                            @if ($blog->thumbnail)
                                <img src="{{ asset('storage/'.$blog->thumbnail) }}" class="card-img-top img-fixed-size">
                            @else
                                <img src="{{ asset('images/free_logo.png') }}" class="card-img-top img-fixed-size">
                            @endif
                            <div class="card-body">
                                <h5 class="card-text fw-bold">{{ $blog->title }}</h5>
                                <div class=" text-center  my-2 text-muted">
                                    <span class=" bg-primary-subtle px-2 rounded">
                                        {{ $blog->category->name }}
                                    </span>
                                </div>
                                <p>
                                    {{ Str::words($blog->content, 15, '...') }}
                                </p>
                                <div class=" d-flex justify-content-between align-items-center">
                                    <a href="/?author={{ $blog->user->slug }}" class=" text-success text-decoration-none">
                                        {{ $blog->user->author_name }}
                                    </a>
                                    <a href="/blog/{{ $blog->slug }}"
                                        class=" bg-primary-subtle fs-6 px-2 rounded text-decoration-none">Read More</a>
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
