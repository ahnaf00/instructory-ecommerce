@extends('backend.layout.master')

@section('title','Testimonials')

@push('admin_style')
<link href="https://cdn.datatables.net/v/dt/dt-2.1.6/datatables.min.css" rel="stylesheet">

<style>
    .editBtn{
        margin-right: 10px;
    }
    .clmessage {
        max-width: 250px; /* Adjust the width as needed */
        white-space: normal; /* This allows the text to wrap to the next line */
        word-wrap: break-word; /* This ensures long words are broken */
    }
</style>

@endpush

@section('content')
<div class="container mt-5">
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success" role="alert">{{ session('status') }}</div>
        @endif
        <div class="col-6">
            <div class="d-flex justify-content-start">
                <h3>Testimonials</h3>
            </div>
        </div>

        <div class="col-6">
            <div class="d-flex justify-content-end">
                <a href="{{ route('testimonial.create') }}" class="btn btn-primary">Add New testimonial</a>
            </div>
        </div>
        <div class="col-12">
            {{-- table starts --}}
            <div class="card p-5">
                <div class="table-responsive">
                    <table class="table table-sm table-hover mb-0 " id="myTable">
                        <thead>
                            <tr>
                                <th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder">#</th>
                                <th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder">Client Image</th>
                                <th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Client Name</th>
                                <th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Client Designation</th>
                                <th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Client Message</th>
                                <th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Updated At</th>
                                <th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonials as $testimonial)
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $loop->index + 1 }}</p>
                                    </td>

                                    <td style="padding: 0;">
                                        <img src="{{ asset('uploads/testimonials/' . $testimonial->client_image) }}" alt="client image" class="img-fluid" style="width: 80px; height: 80px; object-fit: cover;">
                                    </td>

                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 clmessage">{{ $testimonial->client_name }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 clmessage">{{ $testimonial->client_designation }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 clmessage">{{ $testimonial->client_message }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 clmessage">{{ $testimonial->updated_at->format('d M Y') }}</p>
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{route('testimonial.edit', $testimonial->slug)}}" class="btn btn-success btn-sm editBtn" data-toggle="tooltip" data-original-title="Edit user">Edit</a>
                                        <form action="{{route('testimonial.destroy', $testimonial->slug)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm show_confirm" data-toggle="tooltip" data-original-title="Delete user">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- table ends --}}
        </div>
    </div>
</div>

@endsection

@push('admin_script')
<script src="https://cdn.datatables.net/v/dt/dt-2.1.6/datatables.min.js"></script>

<script>

    $(document).ready( function () {
        $('#myTable').DataTable();
    } );

    $('.show_confirm').click(function(event){
        let form = $(this).closest('form');

        event.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
                });
            }
        });

    })
</script>
@endpush
