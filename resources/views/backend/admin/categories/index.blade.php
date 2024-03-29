@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Categories</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">List of Categories</h2>
        <p class="section-lead">This page is for categories registered in the system.</p>
        <div class="card">
            <div class="card-body">

                <div class="row mb-2">

                    <div class="col-12 text-right">
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">{{ __('New category') }}</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>{{ __('Total adverts') }}</th>
                                <th>Is Featured</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->adverts_count }}</td>
                                <td>
                                    @include('backend.admin.categories.includes.is_featured', ['is_featured' => $category->is_featured])
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-icon btn-primary mr-2" title="Edit">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <button class="btn btn-icon btn-danger" data-confirm="{{ __('Are you sure?|This action can\'t be undone') }}" data-confirm-yes="deleteCategory({{ $category->id }});" title="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No data found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        {{ $categories->appends(request()->all())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('javascript')
        <script>
        function deleteCategory(id){
            $.ajax({
                url: route('admin.categories.destroy', id),
                method: 'POST',
                data: {
                    _method: 'DELETE'
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(response){
                    if(response.success){
                        window.location.reload();
                    }else{
                        iziToast.error({
                            title: 'Error',
                            message: "{{ __('Something went wrong') }}",
                            position: 'topRight'
                        });
                    }
                },
                error: function(response){
                    iziToast.error({
                        title: 'Error',
                        message: "{{ __('Something went wrong') }}",
                        position: 'topRight'
                    });
                }
            })
        }
    </script>
@endpush
