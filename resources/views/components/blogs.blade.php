@props(['blogs'])
<section>
    <div class=" container p-5">

        <div class=" row g-3">
            @foreach ($blogs as $blog)
                <x-blog :blog="$blog"></x-blog>
            @endforeach
            <div class=" mt-5">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</section>
