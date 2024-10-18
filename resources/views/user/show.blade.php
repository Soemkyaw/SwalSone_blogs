<x-layout>
    <section>
        <div class=" container py-5 ">
            <div class="row">
                <div class="container col-lg-6 col-md-8 col-10 mx-auto mt-5">
                    <div class="card">
                        {{-- @dd(auth()->check()) --}}
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0">User Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('images/free_logo.png') }}" width="200px" alt="User Image"
                                        class="img-thumbnail">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">{{ $user->author_name }}</h5>
                                    <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                                    <p class="card-text"><strong>Phone:</strong> {{ $user->phone_no }}</p>
                                    <p class="card-text"><strong>Address:</strong> {{ $user->address }}
                                    </p>
                                    <p class="card-text"><strong>Joined:</strong>
                                        {{ $user->created_at->format('M j, Y') }}</p>
                                    <a href="/user/{{ $user->slug }}/edit" class="btn btn-primary">Edit Profile</a>
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Go Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-alerts></x-alerts>
</x-layout>
