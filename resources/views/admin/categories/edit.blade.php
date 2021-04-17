@extends('adminlte::page')

@section('content')
    <div class="col-md-9">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
            </div>

            <form method="POST" action="{{route('categories.update',$category)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name <span class="required-form">*</span></label>
                        <input type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="name"
                               id="name"
                               placeholder="Enter Category Name"
                               value="{{ $category->name}}"
                               autofocus
                               required
                        >
                        @error('name')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    

                    <div class="form-group">
                        <label for="image">Upload Image <span class="required-form"></span></label>
                        <input type="file"
                               class="form-control @error('image') is-invalid @enderror"
                               name="image"
                               id="image"
                               value="{{$category->image}}"
                                                     >
                        @error('image')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status <span class="required-form">*</span></label>
                        <select name="status" id="status" class="form-control select2 @error('status') is-invalid @enderror"
                                required>
                            <option value="">Select</option>
                            <option value="1"
                                    @if($category->status == 1) selected @endif >Active
                            </option>
                            <option value="0"
                                    @if($category->status  == 0) selected @endif >Inactive
                            

                        </select>
                        @error('status')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
    </div>
@endsection
