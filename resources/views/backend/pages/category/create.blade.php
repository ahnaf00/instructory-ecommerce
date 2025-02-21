@extends('backend.layout.master')
@section('title', 'Category Create')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                {{-- form starts --}}
                <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3>Create Category</h3>
                                <a href="{{ route('category.index') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="categoryName" class="form-control-label">Category Title</label>
                                <input
                                type="text"
                                class="form-control @error('categoryName') is-invalid @enderror"
                                id="categoryName"
                                name="categoryName"
                                placeholder="Butter..."
                                value="{{old('categoryName')}}"
                                >
                                @error('categoryName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="categoryImage" class="form-control-label">Client Image</label><br>
                                <br/>
                                    <img class="w-15" id="newImg" src="{{asset('uploads/categories/default-category.jpg')}}"/>
                                <br/>
                                <input
                                    type="file"
                                    oninput="newImg.src=window.URL.createObjectURL(this.files[0])"
                                    class="form-control-file btn btn-primary @error('categoryImage') is-invalid @enderror"
                                    id="categoryImage"
                                    name="categoryImage"
                                >
                                @error('categoryImage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </form>
                {{-- form ends --}}
            </div>
        </div>
    </div>
@endsection
