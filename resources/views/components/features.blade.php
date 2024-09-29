<section>
        <div class="container px-5 pt-5">
            <div class=" pb-5">
                <h3 class=" fw-bold text-center fs-2 text-danger">Swal Sone <span class=" text-black">Blogs</span></h3>
                <p class=" fs-4 text-center text-black">
                    Knowledge is the treasure that reading unlocks.
                </p>
            </div>
            <!-- search  -->
            <x-search-feature></x-search-feature>
            <!-- filter categories  -->
            <x-filter-feature :categories="$categories"></x-filter-feature>
        </div>
     </section>
