@extends('layouts.app')

@section('title', 'Edit city')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit city</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Edit a city</h2>
        <p class="section-lead">This page is for editing a city.</p>
        <form class="row" action="{{ route('admin.cities.update', $city) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-danger text-sm font-italic">(*) Required fields</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name">Name<sup class="text-danger text-bold">*</sup></label>
                                            <input type="text" id="name" name="name"
                                                value="{{ old('name', $city->name) }}"
                                                class="form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                            <span class="invalid-feedback text-small">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Is featured --}}
                                <div class="col-12">
                                    <div class="control-label"></div>
                                    <label class="custom-switch pl-0 mb-3">
                                        <input type="checkbox" name="is_featured"
                                            value="1"
                                            class="custom-switch-input" @if($city->is_featured) checked @endif>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Is featured?</span>
                                    </label>
                                </div>
                            {{-- End is featured --}}
                        </div>

                        <div class="row">
                            {{-- Description --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea style="min-height: 100px" name="description" id="description"
                                        class="form-control" rows="8" cols="50"
                                        placeholder="Description">{{ old('description', $city->description) }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- End description --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Image</label>
                                    <img id="image-preview" class="img-fluid" src="{{ $city->getFirstMediaUrl('cover', 'cover-sm') }}" alt="City image">
                                    <input accept="image/*" class="mt-4" type="file" name="image" id="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <button type="submit" class="btn btn-block btn-primary">Save</button>
                            </div>
                            <div class="col-12 col-md-6">
                                <a class="btn btn-block btn-danger" href="{{ route('admin.cities.index') }}">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
@push('javascript')
    <script>
        $(document).ready(function(){
            $('#image').on('change', function(e){
                const [file] = e.target.files;
                if(file){
                    $('#image-preview').attr('src', URL.createObjectURL(file));
                }
            });
        })
    </script>
@endpush
