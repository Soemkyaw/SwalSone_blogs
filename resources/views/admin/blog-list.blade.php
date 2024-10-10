<x-dashboard-layout>

    <!-- Blog list content -->
    <div class=" container mt-4">
        <h2>Blog List Page</h2>
        <p>
            Browse all the blogs regardless of their status. You can view, edit, or manage blogs that are Pending,
            Approved, or Canceled.
        </p>

        <div>
            <!-- Responsive Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th class=" text-center">View Blog</th>
                            <th>Blog Title</th>
                            <th>Blog Category</th>
                            <th>Author Name</th>
                            <th class=" text-center">Blog Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <div class="modal fade" id="exampleModal{{ $blog->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">View</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="container px-5 pt-3">
                                            <div
                                                class=" d-md-flex justify-content-md-between align-items-lg-center mt-3">
                                                <h3 class=" fw-bold">{{ $blog->title }}</h3>
                                                <div class=" text-muted">
                                                    <span class=" bg-primary-subtle px-2 rounded fw-bold">
                                                        <a class=" text-decoration-none">
                                                            {{ $blog->category->name }}
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="mt-3 row pb-5">
                                                <div class=" col-lg-6">
                                                    <img src="{{ asset('images/free_logo.png') }}" class="img-fluid">
                                                    <div class="">
                                                        <div class="my-3">
                                                            <a
                                                                class=" text-success fs-4 fw-bold  text-decoration-none">{{ $blog->user->author_name }}</a>
                                                        </div>
                                                        <div class=" fs-6  rounded mb-3 text-muted">
                                                            {{ $blog->created_at->format('M j, Y, h:i A') }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" col-lg-6">
                                                    <p>{{ $blog->content }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <tr>
                                <td class=" text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $blog->id }}">View</a></li>
                                            <li>
                                                <button value="approve" data-blog-id="{{ $blog->id }}"
                                                    class="statusHandler dropdown-item">
                                                    Approve
                                                </button>
                                            </li>
                                            <li>
                                                <button value="cancel" data-blog-id="{{ $blog->id }}"
                                                    class="statusHandler dropdown-item">
                                                    Cancel
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->category->name }}</td>
                                <td>{{ $blog->user->author_name }}</td>
                                <td class=" text-center">
                                    <span id="current-blog-{{ $blog->id }}"
                                        class=" badge @if ($blog->status === 'pending') bg-warning @elseif ($blog->status === 'cancel') bg-danger @else bg-success @endif">
                                        {{ $blog->status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <script>
            $(".statusHandler").on('click', function() {
                let status = $(this).val();
                let blogId = $(this).data("blog-id");

                $.ajax({
                    url: '/admin/blog/list/' + blogId + '/status',
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}", // CSRF token
                        status: status
                    },
                    success: function(response) {
                        if (response.status === "success") {
                            let currentBlogStatus = $('#current-blog-' +blogId); // Select the status badge by blog I
                            currentBlogStatus.removeClass('bg-success bg-danger bg-warning');

                            if (response.blogStatus === 'cancel') {
                                currentBlogStatus.addClass('bg-danger').text('cancel');
                            } else {
                                currentBlogStatus.addClass('bg-success').text('approve');
                            }

                            Swal.fire({
                                text: response.message,
                                icon: "success"
                            });
                        }

                    }
                })

            })
        </script>


</x-dashboard-layout>
