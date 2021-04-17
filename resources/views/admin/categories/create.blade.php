@extends('adminlte::page')

@section('content')
    <div class="col-md-9">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Category</h3>
            </div>

            <form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name <span class="required-form">*</span></label>
                        <input type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="name"
                               id="name"
                               placeholder="Enter Category Name"
                               value="{{ old('name') }}"
                               autofocus
                               required
                        >
                        @error('name')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    

                    <div class="form-group">
                        <label for="image">Upload Image <span class="required-form">*</span></label>
                        <input type="file"
                               class="form-control @error('image') is-invalid @enderror"
                               name="image"
                               id="image"
                               required
                        >
                        @error('image')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                   

                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
    </div>
@endsection
