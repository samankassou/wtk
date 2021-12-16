@extends('layouts.app')

@section('title', $city->name)

@section('content')
<section class="section">
    <div class="section-header">
        <h1>City details</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">{{ $city->name }}</h2>
        <p class="section-lead">This page is for showing a city informations.</p>
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-widget">
                            <div class="profile-widget-header mb-2 text-center">
                                <img alt="image" src="{{ $city->getFirstMediaUrl('cover') }}"
                                    class="profile-widget-picture" height="80">
                            </div>
                            <div class="profile-widget-description">
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>Name</strong> : {{ $city->name }}</li>
                                    <li class="list-group-item"><strong>Description</strong> : {{ $city->description }}</li>
                                    <li class="list-group-item"><strong>Is featured</strong>: @include('backend.admin.cities.includes.is_featured', ['is_featured' => $city->is_featured])</li>
                                    <li class="list-group-item"><strong>Created at</strong> : {{ optional($city->created_at)->format('d/m/Y') }}</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <a href="{{ route('admin.cities.edit', $city) }}" class="btn btn-block btn-primary">Edit</a>
                            </div>
                            <div class="col-12 col-md-6">
                                <a class="btn btn-block btn-danger" href="{{ route('admin.cities.index') }}">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
