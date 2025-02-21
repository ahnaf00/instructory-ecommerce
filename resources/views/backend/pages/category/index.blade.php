@extends('backend.layout.master')

@section('title','Categories')

@push('admin_style')
{{-- <link rel="stylesheet" href="cdn.datatables.net/2.1.6/css/dataTables.dataTables.min.css"> --}}
<link href="https://cdn.datatables.net/v/dt/dt-2.1.6/datatables.min.css" rel="stylesheet">

<style>
    .editBtn{
        margin-right: 10px;
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
                <h3>Categories</h3>
            </div>
        </div>

        <div class="col-6">
            <div class="d-flex justify-content-end">
                <a href="{{ route('category.create') }}" class="btn btn-primary">Add New Category</a>
            </div>
        </div>
        <div class="col-12">
            {{-- table starts --}}
            <div class="card p-5">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder ">#</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Category Image</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Category Name</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Last Modified</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ps-2">status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                    Category Slug</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $loop->index+1 }}</p>
                                    </td>
                                    <td style="padding: 0;">
                                        <img src="{{ asset('uploads/categories/' . $category->category_image) }}" alt="category image" class="img-fluid" style="width: 80px; height: 80px; object-fit: cover;">
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $category->name }}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $category->updated_at->format('d M Y') }}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold mb-0">
                                            @if($category->is_active == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{ $category->slug }}</p>
                                    </td>

                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('category.edit', $category->slug ) }}" class="btn btn-success btn-sm editBtn" data-toggle="tooltip"
                                            data-original-title="Edit user">
                                            Edit
                                        </a>
                                        <form action="{{ route('category.destroy', $category->slug) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm show_confirm" data-toggle="tooltip"
                                                data-original-title="Delete user">
                                                Delete
                                            </button>
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
{{-- <link rel="stylesheet" href="cdn.datatables.net/2.1.6/js/dataTables.min.js"> --}}
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
