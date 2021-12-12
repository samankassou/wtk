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
                                <img alt="image" src="{{ $user->getFirstMediaUrl('avatar') }}"
                                    class="profile-widget-picture rounded" height="80">
                            </div>
                            <div class="profile-widget-description">
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>Name</strong> : {{ $user->name }}</li>
                                    <li class="list-group-item"><strong>Email</strong> : {{ $user->email }}</li>
                                    <li class="list-group-item"><strong>Username</strong>: {{ $user->username }}</li>
                                    @if ($user->phone)
                                        <li class="list-group-item"><strong>Phone</strong> : {{ $user->phone }}</li>
                                    @endif
                                    <li class="list-group-item"><strong>Status</strong> : @include('backend.admin.users.includes.status', ['status' => $user->status])</li>
                                    <li class="list-group-item"><strong>Role</strong> : {{ $user->role }}</li>

                                    <li class="list-group-item"><strong>Joining Date</strong> : {{ $user->created_at->format('d/m/Y') }}</li>
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
