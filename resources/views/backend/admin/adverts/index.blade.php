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
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Number of neighborhoods</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($adverts as $advert)
                            <tr>
                                <td>1</td>
                                <td>Lorem</td>
                                <td></td>
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
