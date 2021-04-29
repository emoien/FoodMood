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


                    <div class="mb-2">
                        <label for="cover-image">Image: </label>
                        <div class="form-group">
                            <input type="file" class="form control @error('image') is-invalid @enderror"
                                   name="image"
                                   id="image"
                                   required
                            >
                        </div>

                            <img id="cover" src=" {{asset("/Images/logo.png")}}"
                                 height="100px" width="100px"><br>

                            @error('image')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
        @endsection
        @push('scripts')
            <script>


                $(function () {
                    function previewImages() {
                        var preview = document.querySelector('#preview');
                        if (this.files) {
                            [].forEach.call(this.files, readAndPreview);
                        }

                        function readAndPreview(file) {
                            // Make sure `file.name` matches our extensions criteria
                            if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                                return alert(file.name + " is not an image");
                            } // else...
                            var reader = new FileReader();
                            reader.addEventListener("load", function () {
                                var image = new Image();
                                image.height = 100;
                                image.width = 100;
                                image.title = file.name;
                                image.src = this.result;
                                preview.appendChild(image);
                            });
                            reader.readAsDataURL(file);
                        }
                    }

                    document.querySelector('#file-input').addEventListener("change", previewImages);
                });


            </script>
    @endpush
