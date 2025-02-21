@extends('backend.layout.master')
@section('title', 'Testimonial Create')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                {{-- form starts --}}
                <form action="{{route('testimonial.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3>Create Testimonial</h3>
                                <a href="{{ route('testimonial.index') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="clientName" class="form-control-label">Client Name</label>
                                <input
                                type="text"
                                class="form-control @error('clientName') is-invalid @enderror"
                                id="clientName"
                                name="clientName"
                                placeholder="John Doe..."
                                value="{{old('clientName')}}"
                                >
                                @error('clientName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="clientDesignation" class="form-control-label">Client Designation</label>
                                <input
                                type="text"
                                class="form-control @error('clientDesignation') is-invalid @enderror"
                                id="clientDesignation"
                                name="clientDesignation"
                                value="{{old('clientDesignation')}}"
                                >
                                @error('clientDesignation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="clientMessage" class="form-control-label">Client Message</label>
                                <input
                                type="text"
                                class="form-control @error('clientMessage') is-invalid @enderror"
                                id="clientMessage"
                                name="clientMessage"
                                value="{{old('clientMessage')}}"
                                >
                                @error('clientMessage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="clientImage" class="form-control-label">Client Image</label><br>
                                <br/>
                                    <img class="w-15" id="newImg" src="{{asset('uploads/testimonials/default-client.jpg')}}"/>
                                <br/>
                                <input
                                    type="file"
                                    oninput="newImg.src=window.URL.createObjectURL(this.files[0])"
                                    class="form-control-file btn btn-primary @error('clientImage') is-invalid @enderror"
                                    id="clientImage"
                                    name="clientImage"
                                >
                                @error('clientImage')
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
