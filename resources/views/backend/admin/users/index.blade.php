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
                    <div class="col-sm-8">
                        <a href="{{ route('admin.users.index', 'type=all') }}" class="mr-2 btn btn-outline-primary @if(request('type') && request('type')==="all") active @endif">{{ __('All') }} ({{ $all }})</a>

                        <a href="{{ route('admin.users.index','type=active') }}" class="mr-2 btn btn-outline-success @if(request('type') && request('type')=="active") active @endif">{{ __('Active') }} ({{ $actives }})</a>

                        <a href="{{ route('admin.users.index','type=suspended') }}" class="mr-2 btn btn-outline-warning @if(request('type') && request('type')=="suspended") active @endif">{{ __('Suspened') }} ({{ $suspended }})</a>

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
                                <th>Image</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created at</th>
                                <th>Status</th>
                                <th>Is Super</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr id="row{{ $user->id }}">
                                <td><input type="checkbox" name="ids[]" value="{{ $user->id }}"></td>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <a href="{{ route('admin.users.show', $user) }}" class="font-weight-600">
                                        <img src="{{ $user->getFirstMediaUrl('avatar') }}" alt="avatar" width="30" class="rounded-circle mr-1"> {{ $user->name }}
                                    </a>
                                </td>
                                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td>{{ optional($user->created_at)->format('d/m/Y') }}</td>
                                <td>
                                    @include('backend.admin.users.includes.status', ['status' => $user->status])
                                </td>
                                <td>
                                    @include('backend.admin.users.includes.is_super_user', ['is_super' => $user->is_super_user])
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-icon btn-primary mr-2" title="Edit">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    {{-- If it is not super admin, show the delete button --}}
                                    @if (!$user->is_super_user)
                                        <button class="btn btn-icon btn-danger" data-confirm="{{ __('Are you sure?|This action can\'t be undone') }}" data-confirm-yes="deleteUser({{ $user->id }});" title="Delete">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    @endif
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
                    {{ $users->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('javascript')
    <script>
        function deleteUser(id){
            $.ajax({
                url: route('admin.users.destroy', id),
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
