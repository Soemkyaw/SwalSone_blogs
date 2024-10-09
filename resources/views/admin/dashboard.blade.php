<x-dashboard-layout>

    <!-- Dashboard Content -->
    <div class="container mt-4">
        <h2>Welcome to the Dashboard</h2>
        <p>This is a responsive dashboard layout using Bootstrap 5.</p>

        <!-- Example of a card -->
        <div class="row">
            <a href="#" class="col-md-3 mb-3 text-decoration-none text-black">
                <div class="card overflow-hidden">
                    <div class="row card-body py-5 px-3 align-items-center bg-primary-subtle">
                        <div class=" col-8">
                            <h5 class="card-title">Total - <span>{{ $blogs->count() }}</span></h5>
                            <p class="card-text fw-bold">All Blogs</p>
                        </div>
                        <div class=" col-4 text-end">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class=" text-primary" width="35px"
                                height="35px">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                            </svg>

                        </div>
                    </div>
                    <div class="card-footer py-3 bg-primary text-white">
                        Go somewhere
                    </div>
                </div>
            </a>
            <div class="col-md-3 mb-3">
                <div class="card overflow-hidden">
                    <div class="row card-body py-5 px-3 align-items-center bg-success-subtle">
                        <div class=" col-8">
                            <h5 class="card-title">Total - <span>50</span></h5>
                            <p class="card-text fw-bold">Approved Blogs</p>
                        </div>
                        <div class=" col-4 text-end">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class=" text-success" width="35px"
                                height="35px">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                    </div>
                    <div class="card-footer py-3 bg-success text-white">
                        Go somewhere
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card overflow-hidden">
                    <div class="row card-body py-5 px-3 align-items-center bg-warning-subtle">
                        <div class=" col-8">
                            <h5 class="card-title">Total - <span>50</span></h5>
                            <p class="card-text fw-bold">Pending Blogs</p>
                        </div>
                        <div class=" col-4 text-end">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class=" text-warning" width="35px"
                                height="35px">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                            </svg>
                        </div>
                    </div>
                    <div class="card-footer py-3 bg-warning">
                        Go somewhere
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card overflow-hidden">
                    <div class="row card-body py-5 px-3 align-items-center bg-danger-subtle">
                        <div class=" col-8">
                            <h5 class="card-title ">Total - <span>50</span></h5>
                            <p class="card-text fw-bold">Cancle Blogs</p>
                        </div>
                        <div class=" col-4 text-end">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class=" text-danger" width="35px"
                                height="35px">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                        </div>
                    </div>
                    <div class="card-footer py-3 bg-danger text-white">
                        Go somewhere
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- @dd($blogs) --}}

</x-dashboard-layout>
