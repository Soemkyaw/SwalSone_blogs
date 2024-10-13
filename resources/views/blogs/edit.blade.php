<x-layout>
    <section class="">
        <div class=" container py-5 ">
            <div class="row">
                <div class="container col-lg-8 col-md-10 col-11 mx-auto">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0">Blog Edit</h3>
                        </div>
                        <div class="card-body">
                            <form action="/blog/{{ $blog->slug }}/update" method="POST" class="row p-3" enctype="multipart/form-data">
                                @csrf
                                <div class=" col-sm-6 col-12 mx-auto">
                                    <img src="{{ asset('storage/'.$blog->thumbnail) }}" alt="User Image"
                                    class="img-thumbnail mb-2 img-fixed-size">
                                </div>
                                <div class=" mb-3">
                                    <label class=" mb-2 fw-bold text-muted">Thumbnail</label>
                                    <input type="file" name="thumbnail" class=" form-control">
                                </div>
                                <div class=" mb-3">
                                    <div class=" mb-3">
                                        <label class=" mb-2 fw-bold text-muted">Title :</label>
                                        <input type="text" name="title" class="form-control"
                                            placeholder="Jhon Doe" value="{{ old('title',$blog->title) }}">
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class=" mb-3">
                                        <label class=" mb-2 fw-bold text-muted">Category :</label>
                                        <select name="category_id" class=" form-select">
                                            @foreach ($categories as $category)
                                                <option {{ old('category_id',$blog->category->id) === $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('gender')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class=" mb-3">
                                        <label class=" mb-2 fw-bold text-muted">Content :</label>
                                        <textarea name="content" class=" form-control" cols="30" rows="15">{{ $blog->content }}</textarea>
                                        @error('content')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class=" float-end">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Go Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
