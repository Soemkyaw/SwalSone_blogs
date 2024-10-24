<x-dashboard-layout>
    <div class=" container mt-4">
        <div class=" container row">
            <form action="/admin/{{ $category->slug }}/update" method="POST" class=" col-md-6 mx-auto my-5 p-5 border border-0 shadow">
                @csrf
                @method('PATCH')
                <h4 class=" text-center text-decoration-underline mb-3">Category Edit</h4>
                <div class=" my-3">
                    <label class=" fw-bold text-muted">Name</label>
                    <input type="text" name="name" class=" form-control" value="{{ old('name',$category->name) }}">
                </div>
                <div class=" float-end mt-3">
                    <button class=" btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>
