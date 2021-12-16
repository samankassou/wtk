@extends('layouts.app')

@section('title', 'Cities')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Cities</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">List of Cities</h2>
        <p class="section-lead">This page is for cities registered in the system.</p>
        <div class="card">
            <div class="card-body">

                <div class="row mb-2">

                    <div class="col-12 text-right">
                        <a href="{{ route('admin.cities.create') }}" class="btn btn-primary">{{ __('Create a City') }}</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cover</th>
                                <th>Name</th>
                                <th>Is featured</th>
                                <th>Adverts</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cities as $city)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <a href="{{ route('admin.cities.show', $city) }}" class="font-weight-600">
                                        <img src="{{ $city->getFirstMediaUrl('cover') }}" alt="cover" width="30">
                                    </a>
                                </td>
                                <td>{{ $city->name }}</td>
                                <td>
                                    @include('backend.admin.cities.includes.is_featured', ['is_featured' => $city->is_featured])
                                </td>
                                <td>{{ $city->adverts_count }}</td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('admin.cities.show', $city) }}" class="btn btn-icon btn-warning mr-2" title="Show">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.cities.edit', $city) }}" class="btn btn-icon btn-primary mr-2" title="Edit">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-icon btn-danger" title="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
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
                        {{ $cities->appends(request()->all())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
