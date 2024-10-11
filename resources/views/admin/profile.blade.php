<x-dashboard-layout>
    <!-- Blog list content -->
    <div class=" container mt-4">
        <h2>{{ $user->author_name }} Profile</h2>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">User Details</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('images/free_logo.png') }}" width="200px"  alt="User Image" class="img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <h5 class="card-title">{{ $user->author_name }}</h5>
                            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                            <p class="card-text"><strong>Phone:</strong> (123) 456-7890</p>
                            <p class="card-text"><strong>Address:</strong> 1234 Elm Street, Springfield, IL 62704</p>
                            <p class="card-text"><strong>Joined:</strong> {{ $user->created_at->format('M j, Y') }}</p>
                            <a href="#" class="btn btn-primary">Edit Profile</a>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
