<x-layout>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-10 mx-auto  rounded shadow my-5 py-4 px-4 bg-secondary-subtle">
                    <form action="" method="POST">
                        @csrf
                        <h3 class=" mb-3 text-primary fw-bold fs-2">
                            <div class="spinner-grow text-primary-subtle" role="status"></div>
                            Login
                        </h3>
                        <p class=" text-muted fs-6">Login now and get full access to our app.</p>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput"
                                placeholder="name@example.com"
                                value="{{ old('email') }}"
                                >
                            <label for="floatingInput">Email address</label>
                            @error("email")
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            @error("password")
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <button class=" w-100 btn btn-primary mb-2 mt-2">
                                Submit
                            </button>
                        </div>
                        <div class=" text-center">
                            <p>Don't have an account? <a href="/register">Sign up now</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
