<x-layout>
    <section class="">
        <div class=" container py-5 ">
            <div class="row">
                <div class="container col-lg-8 col-md-10 col-11 mx-auto">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0">Blog Create</h3>
                        </div>
                        <div class="card-body">
                            <form action="/blog/store" method="POST" class="row" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class=" mb-3">
                                        <label class=" mb-2 fw-bold text-muted">Thumbnail :</label>
                                        <input type="file" name="thumbnail" class="form-control"
                                            value="{{ old('thumbnail') }}">
                                        @error('thumbnail')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class=" mb-3">
                                        <label class=" mb-2 fw-bold text-muted">Title :</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter blog title"
                                            value="{{ old('title') }}">
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class=" mb-3">
                                        <label class=" mb-2 fw-bold text-muted">Category :</label>
                                        <select name="category_id" class=" form-select">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class=" mb-3">
                                        <label class=" mb-2 fw-bold text-muted">Content :</label>
                                        <textarea name="content" class="form-control" rows="5" aria-label="With textarea"
                                            placeholder="Write a comment..."></textarea>
                                        @error('content')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Go Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
