@props(['categories'])
<div class=" d-flex justify-content-center mt-3">
    {{-- <div class="dropdown mx-5">
        <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Filter By Category
        </a>

        <ul class="dropdown-menu">
            @foreach ($categories as $category)
                <li><a class="dropdown-item" href="#">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div> --}}
    <div class=" row gap-3">
        @foreach ($categories as $category)
        <div class=" col  bg-secondary-subtle text-black shadow  rounded px-2 py-1 text-center">
                <a class="dropdown-item" href="#">{{ $category->name }}</a>
            </div>
        @endforeach
    </div>
    {{-- <div class="dropdown mx-5">
        <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Filter By date
        </a>

        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Oldest Blogs</a></li>
            <li><a class="dropdown-item" href="#">Latest Blogs</a></li>
        </ul>
    </div> --}}
</div>
