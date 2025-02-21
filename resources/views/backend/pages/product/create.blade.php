@extends('backend.layout.master')
@section('title', 'Product Create')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                {{-- form starts --}}
                <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3>Create Product</h3>
                                <a href="{{ route('product.index') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="productName" class="form-control-label">Product Name</label>
                                <input
                                type="text"
                                class="form-control @error('productName') is-invalid @enderror"
                                id="productName"
                                name="productName"
                                placeholder="Enter product name..."
                                value="{{old('productName')}}"
                                >
                                @error('productName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="productPrice" class="form-control-label">Product Price</label>
                                <input
                                type="text"
                                class="form-control @error('productPrice') is-invalid @enderror"
                                id="productPrice"
                                name="productPrice"
                                min="0"
                                placeholder="Enter product price..."
                                value="{{old('productPrice')}}"
                                >
                                @error('productPrice')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="shortDescription" class="form-control-label">Short Description</label>
                                <textarea
                                    class="form-control @error('shortDescription') is-invalid @enderror"
                                    name="shortDescription"
                                    id="shortDescription" rows="3"
                                    {{-- value="{{old('shortDescription')}}" --}}
                                    >{{old('shortDescription')}}</textarea>

                                @error('shortDescription')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="longDescription" class="form-control-label">Long Description</label>
                                <textarea
                                    class="form-control @error('longDescription') is-invalid @enderror"
                                    name="longDescription"
                                    id="longDescription" rows="4"
                                    {{-- value="{{old('longDescription')}}" --}}
                                    >{{old('longDescription')}}</textarea>

                                @error('longDescription')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="additionalInfo" class="form-control-label">Additional Information</label>
                                <textarea
                                    class="form-control @error('additionalInfo') is-invalid @enderror"
                                    name="additionalInfo"
                                    id="additionalInfo" rows="2"
                                    {{-- value="{{old('additionalInfo')}}" --}}
                                    >{{old('additionalInfo')}}</textarea>

                                @error('additionalInfo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="quantity" class="form-control-label">Quantity</label>
                                <input
                                    type="text"
                                    class="form-control @error('quantity') is-invalid @enderror"
                                    id="quantity"
                                    name="quantity"
                                    min="1"
                                    placeholder="Enter quantity..."
                                    value="{{ old('quantity') }}"
                                >
                                @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="productCode" class="form-control-label">Product Code</label>
                                <input
                                    type="text"
                                    class="form-control @error('productCode') is-invalid @enderror"
                                    id="productCode"
                                    name="productCode"
                                    placeholder="Enter product code..."
                                    value="{{old('productCode')}}"
                                >
                                @error('productCode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="productStock" class="form-control-label">Stock Quantity</label>
                                <input
                                    type="text"
                                    class="form-control @error('productStock') is-invalid @enderror"
                                    id="productStock"
                                    name="productStock"
                                    placeholder="Enter stock quantity..."
                                    value="{{old('productStock')}}"
                                >
                                @error('productStock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="productCategory" class="form-control-label">Category</label>
                                <select
                                    class="form-control @error('productCategory') is-invalid @enderror"
                                    id="productCategory"
                                    name="productCategory"
                                >
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('productCategory') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('productCategory')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="productStatus" class="form-control-label">Product Status</label>
                                <select class="form-control" name="productStatus">
                                    <option selected>Select Option</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="productImage" class="form-control-label">Product Image</label><br>
                                <br/>
                                    <img class="w-15" id="newImg" src="{{asset('uploads/products/default-product.jpg')}}"/>
                                <br/>
                                <input
                                    type="file"
                                    oninput="newImg.src=window.URL.createObjectURL(this.files[0])"
                                    class="form-control-file btn btn-primary @error('productImage') is-invalid @enderror"
                                    id="productImage"
                                    name="productImage"
                                >
                                @error('productImage')
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
