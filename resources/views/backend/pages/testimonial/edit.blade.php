@extends('backend.layout.master')
@section('title', 'Testimonial Update')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                {{-- form starts --}}
                <form action="{{route('testimonial.update', $testimonial->slug)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3>Update Testimonial</h3>
                                <a href="{{ route('testimonial.index') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="updateClientName" class="form-control-label">Client Name</label>
                                <input
                                    type="text"
                                    class="form-control @error('updateClientName') is-invalid @enderror"
                                    id="updateClientName"
                                    name="updateClientName"
                                    placeholder="John Doe..."
                                    value="{{old('updateClientName', $testimonial->client_name)}}"
                                >
                                @error('updateClientName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="updateClientDesignation" class="form-control-label">Client Designation</label>
                                <input
                                    type="text"
                                    class="form-control @error('updateClientDesignation') is-invalid @enderror"
                                    id="updateClientDesignation"
                                    name="updateClientDesignation"
                                    value="{{old('updateClientDesignation', $testimonial->client_designation)}}"
                                >
                                @error('updateClientDesignation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="updateClientMessage" class="form-control-label">Client Message</label>
                                <input
                                    type="text"
                                    class="form-control @error('updateClientMessage') is-invalid @enderror"
                                    id="updateClientMessage"
                                    name="updateClientMessage"
                                    value="{{old('updateClientMessage', $testimonial->client_message)}}"
                                >
                                @error('updateClientMessage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="updateClientImage" class="form-control-label">Client Image</label><br>
                                <br/>
                                    <img class="w-15" id="oldImg" src="{{asset('uploads/testimonials')}}/{{$testimonial->client_image}}"/>
                                <br/>
                                <input
                                    type="file"
                                    oninput="oldImg.src=window.URL.createObjectURL(this.files[0])"
                                    class="form-control-file btn btn-primary @error('updateClientImage') is-invalid @enderror"
                                    id="updateClientImage"
                                    name="updateClientImage"
                                >
                                @error('updateClientImage')
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
