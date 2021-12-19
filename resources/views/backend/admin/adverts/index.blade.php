@extends('layouts.app')

@section('title', 'Adverts')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Adverts</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">List of Adverts</h2>
        <p class="section-lead">This page is for adverts registered in the system.</p>
        <div class="card">
            <div class="card-body">

                <div class="row mb-2">
                    <div class="col-sm-8">
                        <a href="{{ route('admin.adverts.index', 'type=all') }}" class="mr-2 btn btn-outline-primary @if(!request('type') || (request('type') && request('type')==="all")) active @endif">{{ __('All') }} ({{ $all }})</a>

                        <a href="{{ route('admin.adverts.index','type=approved') }}" class="mr-2 btn btn-outline-success @if(request('type') && request('type')=="approved") active @endif">{{ __('Approved') }} ({{ $approved }})</a>

                        <a href="{{ route('admin.adverts.index','type=pending') }}" class="mr-2 btn btn-outline-warning @if(request('type') && request('type')=="pending") active @endif">{{ __('Pending') }} ({{ $pending }})</a>

                        <a href="{{ route('admin.adverts.index','type=rejected') }}" class="mr-2 btn btn-outline-danger @if(request('type') && request('type')=="rejected") active @endif">{{ __('Rejected') }} ({{ $rejected }})</a>

                    </div>

                    <div class="col-sm-4 text-right">
                        <a href="{{ route('admin.adverts.create') }}" class="btn btn-primary">{{ __('Create an advert') }}</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-md">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="checkAll"></th>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Status</th>
                                <th>Moderation Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($adverts as $advert)
                            <tr id="row{{ $advert->id }}">
                                <td><input type="checkbox" name="ids[]" value="{{ $advert->id }}"></td>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <img src="{{ $advert->getFirstMediaUrl('images') }}" alt="Property image" width="50">
                                </td>
                                <td>{{ $advert->title }}</td>
                                <td>{{ $advert->created_at->format('d/m/Y') }}</td>
                                <td>
                                    {{ $advert->status }}
                                </td>
                                <td>
                                    @include('backend.admin.adverts.includes.moderation_status', ['status' => $advert->moderation_status])
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('admin.adverts.edit', $advert) }}" class="btn btn-icon btn-primary mr-2" title="Edit">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <button class="btn btn-icon btn-danger" data-confirm="{{ __('Are you sure?|This action can\'t be undone') }}" data-confirm-yes="deleteAdvert({{ $advert->id }});" title="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center">No data found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    {{ $adverts->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('javascript')
    <script>
        function deleteAdvert(id){
            $.ajax({
                url: route('admin.adverts.destroy', id),
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
