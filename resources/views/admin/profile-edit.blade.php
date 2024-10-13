<x-dashboard-layout>
    <!-- Blog list content -->
    <div class=" container mt-4">>
        <div class="row">
                <div class="container col-md-10 col-11 mx-auto">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0">Account Edit</h3>
                        </div>
                        <div class="card-body">
                            <form action="/admin/profile/{{ $user->slug }}/update" method="POST" class="row" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-4">
                                    <img src="{{ asset('images/free_logo.png') }}" width="200px" alt="User Image"
                                        class="img-thumbnail mb-2">
                                    <input type="file" class=" form-control">
                                    {{-- <input type="file" name="profile_image" class=" form-control"> --}}
                                </div>
                                <div class="col-md-8">
                                    <div class=" mb-3">
                                        <label class=" mb-2 fw-bold text-muted">Username :</label>
                                        <input type="text" name="author_name" class="form-control"
                                            placeholder="Jhon Doe" value="{{ old('author_name',$user->author_name) }}">
                                        @error('author_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class=" mb-3">
                                        <label class=" mb-2 fw-bold text-muted">Email :</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="JhonDoe@gmail.com" value="{{ old('email',$user->email) }}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class=" mb-3">
                                        <label class=" mb-2 fw-bold text-muted">Gender :</label>
                                        <select name="gender" class=" form-select">
                                            <option {{ old('gender',$user->gender) === 'male' ? 'selected' : '' }} value="male">Male</option>
                                            <option {{ old('gender',$user->gender) === 'female' ? 'selected' : '' }} value="female">Female</option>
                                            <option {{ old('gender',$user->gender) === 'other' ? 'selected' : '' }} value="other">Other</option>
                                        </select>
                                        @error('gender')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class=" mb-3">
                                        <label class=" mb-2 fw-bold text-muted">Phone No :</label>
                                        <input type="number" name="phone_no" class="form-control"
                                            placeholder="+66 xxx xxx xxx" value="{{ old('phone_no',$user->phone_no) }}">
                                        @error('phone_no')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class=" mb-3">
                                        <label class=" mb-2 fw-bold text-muted">Address :</label>
                                        <input type="text" name="address" class="form-control"
                                            placeholder="1234 Elm Street, Springfield, IL 62704" value="{{ old('address',$user->address) }}" >
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Go Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</x-dashboard-layout>
