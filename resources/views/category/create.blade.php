<x-app-web-layout> 
    <x-slot name="title">
        Add Categories
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Add Categories
                            <a href="{{ url('categories') }}" class="btn btn-primary btn-sm float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('categories/create') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"/>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="detail" class="form-label">Detail</label>
                                <textarea name="detail" class="form-control" rows="5">{{ old('description') }}</textarea>
                                @error('detail')
                                    <span class="detail">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="is_done" class="form-label">Is Active</label>
                                <input type="checkbox" name="is_done" {{ old('is_') ? 'checked' : '' }} />
                                @error('is_done')
                                    <span class="is_done">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-web-layout>
