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
                            <div class=" text-center">
                                @if ($user->avatar)
                                    <img src="{{ asset('storage/'.$user->avatar) }}" width="200px"  alt="User Image" class="img-thumbnail">
                                @else
                                    <img src="{{ asset('images/user-avatar.png') }}" width="200px"  alt="User Image" class="img-thumbnail">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h5 class="card-title">{{ $user->author_name }}</h5>
                            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                            <p class="card-text"><strong>Gender:</strong> {{ Str::ucfirst($user->gender) }}</p>
                            <p class="card-text"><strong>Phone:</strong> {{ $user->phone_no }}</p>
                            <p class="card-text"><strong>Address:</strong> {{ $user->address }}</p>
                            <p class="card-text"><strong>Joined:</strong> {{ $user->created_at->format('M j, Y') }}</p>
                            <a href="/admin/profile/{{ $user->slug }}/edit" class="btn btn-primary">Edit Profile</a>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-alerts></x-alerts>
</x-dashboard-layout>
