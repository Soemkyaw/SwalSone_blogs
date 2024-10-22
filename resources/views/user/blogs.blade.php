<x-layout>
    <div class=" container p-5">
        <div class=" d-sm-flex justify-content-between align-items-center my-3 text-center">
            <h4 class=" my-2">{{ auth()->user()->author_name }}'s Blogs</h4>
            <a href="/blog/create" class=" btn btn-primary my-2">Create New Blog</a>
        </div>
        @if ($blogs->total())
            <div class=" row g-3">
                @foreach ($blogs as $blog)
                    <x-blog :blog="$blog"></x-blog>
                @endforeach
                <div class=" mt-5">
                    {{ $blogs->links() }}
                </div>
            </div>
        @else
            <div class=" text-center my-3">There is no blog.</div>
        @endif
    </div>
</x-layout>
