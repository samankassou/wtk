@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Categories</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">List of Categories</h2>
        <p class="section-lead">This page is for categories registered in the system.</p>
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                                <td>1</td>
                                <td>Lorem</td>
                                <td></td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">No data found</td>
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
