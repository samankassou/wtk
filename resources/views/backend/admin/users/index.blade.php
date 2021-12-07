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
            <div class="card-body">

                <div class="row mb-2">
                    @php
                        $type = 1;
                        $all = 2;
                        $actives = 3;
                        $suspended = 0;
                    @endphp
                <div class="col-sm-8">
                    <a href="{{ route('admin.users.index') }}" class="mr-2 btn btn-outline-primary @if($type==="all") active @endif">{{ __('All') }} ({{ $all }})</a>

                    <a href="{{ route('admin.users.index','type=1') }}" class="mr-2 btn btn-outline-success @if($type==1) active @endif">{{ __('Active') }} ({{ $actives }})</a>

                    <a href="{{ route('admin.users.index','type=2') }}" class="mr-2 btn btn-outline-warning @if($type==2) active @endif">{{ __('Suspened') }} ({{ $suspended }})</a>

                </div>

                <div class="col-sm-4 text-right">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">{{ __('Create a User') }}</a>
                </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-md">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="checkAll"></th>
                                <th>#</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr id="row{{ $user->id }}">
                                <td><input type="checkbox" name="ids[]" value="{{ $user->id }}"></td>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                <td>{{ ucfirst($user->name) }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td>
                                    <div class="dropdown d-inline">
                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                            id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            {{ __('Action') }}
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item has-icon"
                                                href="{{ route('admin.users.show',$user->id) }}"><i
                                                    class="far fa-eye"></i>{{ __('View') }}</a>
                                            <a class="dropdown-item has-icon"
                                                href="{{ route('admin.users.edit',$user->id) }}"><i
                                                    class="far fa-edit"></i> {{ __('Edit') }}</a>
                                            <a class="dropdown-item has-icon"
                                                href="{{ route('admin.users.delete',$user->id) }}"><i
                                                    class="far fa-trash"></i>{{ __('Delete') }}</a>
                                        </div>
                                    </div>
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
            </div>
        </div>
    </div>
</section>
@endsection
