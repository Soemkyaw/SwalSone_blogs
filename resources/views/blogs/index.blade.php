<x-layout>
    <!-- hero section start  -->
    <x-hero-section></x-hero-section>
    <!-- hero section end  -->

    <!-- search and categories section start  -->
     <x-features :categories="$categories"></x-features>
    <!-- search and categories section end  -->

    <!-- blogs section start -->
     <x-blogs :blogs="$blogs"></x-blogs>
    <!-- blogs section end -->

</x-layout>
