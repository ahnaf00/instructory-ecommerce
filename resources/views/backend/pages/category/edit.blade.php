@extends('backend.layout.master')
@section('title', 'Category Edit')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                {{-- form starts --}}
                <form action="{{ route('category.update', $category->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3>Update Category</h3>
                                <a href="{{ route('category.index') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="updateCategoryName" class="form-control-label">Category Title</label>
                                <input type="text" class="form-control @error('updateCategoryName') is-invalid @enderror"
                                    id="updateCategoryName" name="updateCategoryName" placeholder="Butter..."
                                    value="{{ old('categoryName', $category->name) }}">
                                @error('updateCategoryName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="categoryStatus" class="form-control-label">Category Status</label>
                                <select class="form-control" name="updateCategoryStatus">
                                    <option value="1"
                                        @if ($category->is_active == 1)
                                            selected
                                        @endif
                                    >Active</option>
                                    <option value="0"
                                        @if ($category->is_active == 0)
                                            selected
                                        @endif
                                    >Inactive</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="updateCategoryImage" class="form-control-label">Category Image</label><br>
                                <br/>
                                    <img class="w-15" id="oldImg" src="{{asset('uploads/categories')}}/{{$category->category_image}}"/>
                                <br/>
                                <input
                                    type="file"
                                    oninput="oldImg.src=window.URL.createObjectURL(this.files[0])"
                                    class="form-control-file btn btn-primary @error('updateCategoryImage') is-invalid @enderror"
                                    id="updateCategoryImage"
                                    name="updateCategoryImage"
                                >
                                @error('updateCategoryImage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>

                </form>
                {{-- form ends --}}
            </div>
        </div>
    </div>
@endsection
