@extends('layouts.app')

@section('title', 'Edit category')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit "{{ $category->name }}" category</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Edit Category</h2>
        <p class="section-lead">This page is for editing the "{{ $category->name }}" category.</p>
        <form class="row" action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PATCH')
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
                                <div class="form-group">
                                    <label for="name">Name<sup class="text-danger text-bold">*</sup></label>
                                    <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}"
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Parent --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="parent" class="form-label">Parent</label>
                                        <select name="parent" id="parent" class="form-control @error('parent') is-invalid @enderror">
                                            <option value="">{{ __('None') }}</option>
                                            @foreach ($allCategories as $cat)
                                            <option value="{{ $cat->id }}" @if(old('category', $category->parent_id) == $cat->id) selected
                                                @endif>{{ ucfirst($cat->name) }}</option>
                                            @endforeach
                                        </select>
                                        @error('parent')
                                        <span class="invalid-feedback text-small">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- End parent --}}

                         <div class="row">
                            {{-- Is featured --}}
                            <div class="col-12">
                                <div class="control-label"></div>
                                <label class="custom-switch pl-0 mb-3">
                                    <input type="checkbox" name="is_featured" value="1"
                                        class="custom-switch-input" @if(old('is_featured', $category->is_featured)) checked @endif>
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
                                        placeholder="Description">{{ old('description', $category->description) }}</textarea>
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
                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <button type="submit" class="btn btn-block btn-primary">Save changes</button>
                            </div>
                            <div class="col-12 col-md-6">
                                <a class="btn btn-block btn-danger" href="{{ route('admin.categories.index') }}">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
