@extends('layouts.app')

@section('title', 'Agents')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Agents</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">List of Agents</h2>
        <p class="section-lead">This page is for Agents registered in the system.</p>
        <div class="card">
            <div class="card-body">

                <div class="row mb-2">
                    <div class="col-sm-8">
                        <a href="{{ route('admin.agents.index', 'type=all') }}" class="mr-2 btn btn-outline-primary @if(request('type') && request('type')==="all") active @endif">{{ __('All') }} ({{ $all }})</a>

                        <a href="{{ route('admin.agents.index','type=active') }}" class="mr-2 btn btn-outline-success @if(request('type') && request('type')=="active") active @endif">{{ __('Active') }} ({{ $actives }})</a>

                        <a href="{{ route('admin.agents.index','type=suspended') }}" class="mr-2 btn btn-outline-warning @if(request('type') && request('type')=="suspended") active @endif">{{ __('Suspened') }} ({{ $suspended }})</a>

                    </div>

                    <div class="col-sm-4 text-right">
                        <a href="{{ route('admin.agents.create') }}" class="btn btn-primary">{{ __('Create an agent') }}</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-md">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="checkAll"></th>
                                <th>#</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>{{ __('Credits') }}</th>
                                <th>Created at</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($agents as $agent)
                            <tr id="row{{ $agent->id }}">
                                <td><input type="checkbox" name="ids[]" value="{{ $agent->id }}"></td>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <a href="{{ route('admin.agents.show', $agent) }}">
                                        {{ $agent->username }}
                                    </a>
                                </td>
                                <td><a href="mailto:{{ $agent->email }}">{{ $agent->email }}</a></td>
                                <td>{{ $agent->credits }}</td>
                                <td>{{ optional($agent->created_at)->format('d/m/Y') }}</td>
                                <td>
                                    @include('backend.admin.agents.includes.status', ['status' => $agent->status])
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('admin.agents.edit', $agent) }}" class="btn btn-icon btn-primary mr-2" title="Edit">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <button class="btn btn-icon btn-danger" data-confirm="{{ __('Are you sure?|This action can\'t be undone') }}" data-confirm-yes="deleteAgent({{ $agent->id }});" title="Delete">
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
                    {{ $agents->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('javascript')
        <script>
        function deleteAgent(id){
            $.ajax({
                url: route('admin.agents.destroy', id),
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
