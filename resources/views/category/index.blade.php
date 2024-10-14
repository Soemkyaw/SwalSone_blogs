<x-dashboard-layout>
    <div class=" container mt-4">
        <div class=" d-md-flex justify-content-between align-items-center mb-3 text-center">
            <h2 class=" my-2">Category List Page</h2>
            <a href="/admin/category/create" class=" btn btn-primary my-2">Create New Category</a>
        </div>
        <div>
            <!-- Responsive Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Category Name</th>
                            <th class=" text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td class=" text-center">
                                    <a href="/admin/{{ $category->slug }}/edit" class=" btn btn-warning">Edit</a>
                                    <form action="/admin/{{ $category->slug }}/destroy" method="POST"
                                        class=" d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class=" btn btn-danger category-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $('.category-delete').on('click', function(e) {
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
                    $(this).closest('form').submit();
                }
            });


        })
    </script>

    {{-- <script>
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
                Swal.fire({
                    title: "Deleted!",
                    text: "User has been deleted.",
                    icon: "success"
                })
            }
        });
    </script> --}}
</x-dashboard-layout>
