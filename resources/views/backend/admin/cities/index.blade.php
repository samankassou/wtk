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
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cover</th>
                                <th>Name</th>
                                <th>Adverts</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cities as $city)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td></td>
                                <td>{{ $city->name }}</td>
                                <td>{{ $city->adverts_count }}</td>
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
