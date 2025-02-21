@extends('backend.layout.master')
@section('title', 'Product Edit')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                {{-- form starts --}}
                <form action="{{ route('product.update', $product->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3>Update Product</h3>
                                <a href="{{ route('product.index') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>

                        {{-- Product Name --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="updateProductName" class="form-control-label">Product Name</label>
                                <input type="text" class="form-control @error('updateProductName') is-invalid @enderror"
                                    id="updateProductName" name="updateProductName" placeholder="Product name..."
                                    value="{{ old('updateProductName', $product->name) }}">
                                @error('updateProductName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Product Category --}}
                            <div class="form-group">
                                <label for="updateProductCategory" class="form-control-label">Category</label>
                                <select class="form-control @error('updateProductCategory') is-invalid @enderror" id="updateProductCategory" name="updateProductCategory">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if($category->id == $product->category_id) selected @endif>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('updateProductCategory')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Short Description --}}
                            <div class="form-group">
                                <label for="updateShortDescription" class="form-control-label">Short Description</label>
                                <textarea
                                    class="form-control @error('updateShortDescription') is-invalid @enderror"
                                    name="updateShortDescription"
                                    id="updateShortDescription" rows="3"
                                    {{-- value="{{old('shortDescription')}}" --}}
                                    >{{old('updateShortDescription',$product->short_description)}}</textarea>

                                @error('updateShortDescription')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Long Description --}}
                            <div class="form-group">
                                <label for="updateLongDescription" class="form-control-label">Long Description</label>
                                <textarea
                                    class="form-control @error('updateLongDescription') is-invalid @enderror"
                                    name="updateLongDescription"
                                    id="updateLongDescription" rows="4"
                                    {{-- value="{{old('updateLongDescription')}}" --}}
                                    >{{old('updateLongDescription',$product->description)}}</textarea>

                                @error('updateLongDescription')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Additional Information --}}
                            <div class="form-group">
                                <label for="updateAdditionalInfo" class="form-control-label">Additional Information</label>
                                <textarea
                                    class="form-control @error('updateAdditionalInfo') is-invalid @enderror"
                                    name="updateAdditionalInfo"
                                    id="additionalInfo" rows="2"
                                    {{-- value="{{old('additionalInfo')}}" --}}
                                    >{{old('updateAdditionalInfo',$product->additional_info)}}</textarea>

                                @error('updateAdditionalInfo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        {{-- Product Price --}}
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="updateProductCode" class="form-control-label">Product Code</label>
                                <input type="number" class="form-control @error('updateProductCode') is-invalid @enderror"
                                    id="updateProductCode" name="updateProductCode" placeholder="Product Code..."
                                    value="{{ old('updateProductCode', $product->product_code) }}">
                                @error('updateProductCode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="updateProductPrice" class="form-control-label">Product Price</label>
                                <input type="number" class="form-control @error('updateProductPrice') is-invalid @enderror"
                                    id="updateProductPrice" name="updateProductPrice" placeholder="Price..."
                                    value="{{ old('updateProductPrice', $product->price) }}">
                                @error('updateProductPrice')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Product Stock --}}
                            <div class="form-group">
                                <label for="updateProductStock" class="form-control-label">Product Stock</label>
                                <input type="number" class="form-control @error('updateProductStock') is-invalid @enderror"
                                    id="updateProductStock" name="updateProductStock" placeholder="Stock..."
                                    value="{{ old('updateProductStock', $product->product_stock) }}">
                                @error('updateProductStock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Product Quantity --}}
                            <div class="form-group">
                                <label for="updateProductQuantity" class="form-control-label">Product Quantity</label>
                                <input type="number" class="form-control @error('updateProductQuantity') is-invalid @enderror"
                                    id="updateProductQuantity" name="updateProductQuantity" placeholder="Quantity..."
                                    value="{{ old('updateProductQuantity', $product->quantity) }}">
                                @error('updateProductQuantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Product Rating --}}
                            {{-- <div class="form-group">
                                <label for="updateProductRating" class="form-control-label">Product Rating</label>
                                <input type="number" class="form-control @error('updateProductRating') is-invalid @enderror"
                                    id="updateProductRating" name="updateProductRating" placeholder="Rating (1-5)..."
                                    value="{{ old('updateProductRating', $product->ratings) }}" min="1" max="5">
                                @error('updateProductRating')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}

                            {{-- Product Status --}}
                            <div class="form-group">
                                <label for="updateProductStatus" class="form-control-label">Product Status</label>
                                <select class="form-control" name="updateProductStatus">
                                    <option value="1" @if ($product->is_active == 1) selected @endif>Active</option>
                                    <option value="0" @if ($product->is_active == 0) selected @endif>Inactive</option>
                                </select>
                            </div>

                            {{-- Product Image --}}
                            <div class="form-group">
                                <label for="updateProductImage" class="form-control-label">Product Image</label><br>
                                <img class="w-15" id="oldImg" src="{{ asset('uploads/products/'.$product->image) }}"/><br/>
                                <input
                                    type="file"
                                    oninput="oldImg.src=window.URL.createObjectURL(this.files[0])"
                                    class="form-control-file btn btn-primary @error('updateProductImage') is-invalid @enderror"
                                    id="updateProductImage" name="updateProductImage">
                                @error('updateProductImage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    {{-- Submit Button --}}
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
