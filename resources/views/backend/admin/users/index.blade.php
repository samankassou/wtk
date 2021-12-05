@extends('layouts.app')

@section('title', 'Users')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Users</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">List of Users</h2>
        <p class="section-lead">This page is for Users registered in the system.</p>
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td></td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No data found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
