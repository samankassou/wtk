@extends('layouts.app')

@section('title', $user->name)

@section('content')
<section class="section">
    <div class="section-header">
        <h1>User details</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">{{ $user->name }}</h2>
        <p class="section-lead">This page is for showing a user informations.</p>
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-widget">
                            <div class="profile-widget-header mb-2 text-center">
                                <img alt="image" src="{{ asset('assets/img/avatar-1.png') }}"
                                    class="profile-widget-picture rounded" height="80">
                            </div>
                            <div class="profile-widget-description">
                                <ul class="list-group">
                                    <li class="list-group-item">Name : {{ $user->name }}</li>
                                    <li class="list-group-item">Email : {{ $user->email }}</li>
                                    <li class="list-group-item">Total Customers : 0</li>
                                    <li class="list-group-item">Total Orders : 0</li>
                                    <li class="list-group-item">Total Posts: 0</li>
                                    <li class="list-group-item">Storage Used: 0MB / 10000 MB</li>

                                    <li class="list-group-item">Joining Date: 16-November-2021</li>
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
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-block btn-primary">Edit</a>
                            </div>
                            <div class="col-12 col-md-6">
                                <a class="btn btn-block btn-danger" href="{{ route('admin.users.index') }}">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
