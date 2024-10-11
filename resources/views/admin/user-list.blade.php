<x-dashboard-layout>

    <!-- Blog list content -->
    <div class=" container mt-4">
        <h2>User List Page</h2>
        <p>
            View and manage all registered users on this platform. Here, you can review user profiles, modify their
            access levels, or delete their accounts.
        </p>

        <div>
            <!-- Responsive Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th class=" text-center">View User</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Blogs Count</th>
                            <th>Role</th>
                            <th class=" text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">View</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="container px-5 pt-3">
                                            <div class=" text-center">
                                                <img src="{{ asset('images/free_logo.png') }}" class=" rounded-circle"
                                                    width="150px" height="150px">
                                                <h5 class="mt-2 fw-bold">{{ $user->author_name }}</h5>
                                            </div>
                                            <div class=" my-5 row">
                                                <div class="col-6 text-center">
                                                    <div>
                                                        <h5>{{ $user->blogs->count() }}</h5>
                                                        <p>Blogs</p>
                                                    </div>
                                                </div>
                                                <div class="col-6 text-center">
                                                    <div>
                                                        <h5>{{ $user->email }}</h5>
                                                        <p>Email</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <tr>
                                <td class=" text-center">
                                    <a class=" btn btn-light" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $user->id }}">View</a>
                                </td>
                                <td>{{ $user->author_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->blogs->count() }}</td>
                                <td>
                                    <select class=" form-select roleHandler" data-user-id="{{ $user->id }}">
                                        <option  {{ $user->is_admin == false ? 'selected' : '' }} value="0">User
                                        </option>
                                        <option  {{ $user->is_admin == true ? 'selected' : '' }} value="1">Admin
                                        </option>
                                    </select>
                                </td>
                                <td class=" text-center">
                                    <button class="btn btn-sm btn-danger"
                                        onclick="confirmDelete({{ $user->id }})">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            function confirmDelete(userId) {
                Swal.fire({
                    title: "Are you sure want to delete?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/${userId}/delete`,
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}", // CSRF token
                            },
                            success: function(response) {
                                if (response.status === "success") {
                                    location.reload()
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "User has been deleted.",
                                        icon: "success"
                                    })
                                }
                            }
                        })
                    }
                });
            }
        </script>
        <script>
                $(".roleHandler").on('change',function(){
                    let selectedRole = $(this).val();
                    let userId = $(this).data('user-id');

                    $.ajax({
                        url: `/admin/user/list/${userId}/role`,
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}", // CSRF token
                            is_admin: selectedRole
                        },
                        success: function(response){
                            if (response.status == "success") {
                                Swal.fire({
                                text: response.message,
                                icon: "success"
                            });
                            }
                        }
                    })
                })

            // })
        </script>
    </div>
</x-dashboard-layout>
