@extends('layouts.app')

@section('title', 'Create Advert')

@push('stylesheet')
<link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/dropzone/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.min.css') }}">
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Create a new advert</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Create a new advert</h2>
        <p class="section-lead">This page is for adding a new advert to the system.</p>
        <form id="create-advert-form" class="row" action="{{ route('admin.adverts.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <p class="text-danger text-sm font-italic">(*) Required fields</p>
                            </div>

                            {{-- Title --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Title<sup class="text-danger text-bold">*</sup></label>
                                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                                        placeholder="Title" class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- End title --}}

                            {{-- Type --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="type" class="form-label">Type<sup
                                            class="text-danger text-bold">*</sup></label>
                                    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                        <option value="">Choose a type</option>
                                        @foreach ($types as $type)
                                        <option value="{{ $type }}" @if(old('type')==$type) selected @endif>
                                            {{ ucfirst($type) }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- End type --}}

                            {{-- Is featured --}}
                            <div class="col-12">
                                <div class="control-label"></div>
                                <label class="custom-switch pl-0 mb-3">
                                    <input type="checkbox" name="is_featured" value="{{ old('is_featured') }}"
                                        class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Is featured?</span>
                                </label>
                            </div>
                            {{-- End is featured --}}

                            {{-- Description --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description" class="form-label">Description<sup
                                            class="text-danger text-bold">*</sup></label>
                                    <textarea style="min-height: 100px" name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="8"
                                        cols="50" placeholder="Short description">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- End description --}}
                        </div>

                        <div class="row">
                            {{-- Content --}}
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="content" class="form-label">Content</label>
                                    <textarea name="content" id="content" class="summernote-simple"
                                        placeholder="Full description">
                                        {{ old('content') }}
                                    </textarea>
                                    @error('content')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- End content --}}
                        </div>

                        <div class="row">
                            {{-- Images --}}
                            <div class="col-12">
                                <input hidden id="imagesPreview" name="images"/>
                                <div class="form-group">
                                    <label for="images" class="form-label">Images</label>
                                    <div class="dropzone dropzone-file-area" id="images">
                                        <div class="dz-default dz-message">
                                            <span>Click here to upload your property images</span>
                                        </div>
                                    </div>
                                    @error('images')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- End images --}}

                            {{-- City --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="city" class="form-label">City<sup
                                            class="text-danger text-bold">*</sup></label>
                                    <select name="city" id="city" class="form-control @error('city') is-invalid @enderror">
                                        <option value="">{{ __('Choose a city') }}</option>
                                        @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" @if(old('city')==$city->id) selected
                                            @endif>{{ ucfirst($city->name) }}</option>
                                        @endforeach
                                    </select>
                                    @error('city')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- End city --}}

                            {{-- Property location --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="location" class="form-label">Property location<sup
                                            class="text-danger text-bold">*</sup></label>
                                    <input type="text" id="location" name="location" value="{{ old('location') }}"
                                        placeholder="Property location"
                                        class="form-control @error('location') is-invalid @enderror">
                                    @error('location')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- End property location --}}

                        </div>

                        <div class="row">

                            {{-- Latitude --}}
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="latitude" class="form-label">Latitude</label>
                                    <input type="number" id="latitude" name="latitude" value="{{ old('latitude') }}"
                                        placeholder="Ex: 1.432270"
                                        class="form-control @error('latitude') is-invalid @enderror">
                                    <a class="form-text text-muted"
                                        href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank"
                                        rel="nofollow">Go here to get Latitude from address.</a>
                                    @error('latitude')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- End latitude --}}

                            {{-- Longitude --}}
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="longitude" class="form-label">Longitude</label>
                                    <input type="number" id="longitude" name="longitude" value="{{ old('longitude') }}"
                                        placeholder="Ex: 104.812530"
                                        class="form-control @error('longitude') is-invalid @enderror">
                                    <a class="form-text text-muted"
                                        href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank"
                                        rel="nofollow">Go here to get Longitude from address.</a>
                                    @error('longitude')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- End longitude --}}

                        </div>

                        <div class="row">

                            {{-- Bedrooms --}}
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="number_of_bedrooms" class="form-label">Number of bedrooms</label>
                                    <input type="number" id="number_of_bedrooms" name="number_of_bedrooms"
                                        value="{{ old('number_of_bedrooms') }}" placeholder="Number of bedrooms"
                                        class="form-control @error('number_of_bedrooms') is-invalid @enderror">
                                    @error('number_of_bedrooms')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- End bedrooms --}}

                            {{-- Bathrooms --}}
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="number_of_bathrooms" class="form-label">Number of bathrooms</label>
                                    <input type="number" id="number_of_bathrooms" name="number_of_bathrooms"
                                        value="{{ old('number_of_bathrooms') }}" placeholder="Number of bathrooms"
                                        class="form-control @error('number_of_bathrooms') is-invalid @enderror">
                                    @error('number_of_bedrooms')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- End bathrooms --}}

                            {{-- Square --}}
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="square" class="form-label">Square (m<sup>2</sup>)</label>
                                    <input type="number" id="square" name="square" value="{{ old('square') }}"
                                        placeholder="Square" class="form-control @error('square') is-invalid @enderror">
                                    @error('square')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- End square --}}

                        </div>

                        <div class="row">

                            {{-- Price --}}
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="price" class="form-label">Price (FCFA)<sup class="text-danger text-bold">*</sup></label>
                                    <input type="text" id="price" name="price" value="{{ old('price') }}"
                                        placeholder="Price"
                                        class="form-control @error('price') is-invalid @enderror">
                                    @error('price')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- End Price --}}

                            {{-- Period --}}
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="period" class="form-label">Period (day/month/year)<sup class="text-danger text-bold">*</sup></label>
                                    <select name="period" id="period" class="form-control @error('period') is-invalid @enderror">
                                        <option value="">{{ __('Choose a period') }}</option>
                                        @foreach ($periods as $period)
                                        <option value="{{ $period }}" @if(old('period')==$period)
                                            selected @endif>{{ $period }}</option>
                                        @endforeach
                                    </select>
                                    @error('period')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- End period --}}
                        </div>

                        {{-- Categories --}}
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="categories" class="form-label">Categories<sup
                                            class="text-danger text-bold">*</sup></label>
                                    <select name="categories[]" id="categories" style="width: 100%" data-allow-clear="true" class="form-control select2 @error('categories') is-invalid @enderror" multiple="multiple">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if(collect(old('categories'))->contains($category->id)) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('categories')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- End categories --}}

                    </div>
                </div>

                {{-- features --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="d-block">Features</label>
                                    @foreach ($features as $feature)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" name="features[]" type="checkbox"
                                                id="feature{{ $feature->id }}" value="{{ $feature->id }}" @if(collect(old('features'))->contains($feature->id)) checked @endif>
                                            <label class="form-check-label"
                                                for="feature{{ $feature->id }}">{{ $feature->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End features --}}

                {{-- Extra info --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    {{-- Visit fees --}}
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="visit_fees" class="form-label">Visit fees (FCFA)</label>
                                            <input type="text" id="visit_fees" name="visit_fees" value="{{ old('visit_fees') }}"
                                                placeholder="Visit fees"
                                                class="form-control @error('visit_fees') is-invalid @enderror">
                                            @error('visit_fees')
                                            <span class="invalid-feedback text-small">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- End visit fees --}}

                                    {{-- Commission --}}
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="commission" class="form-label">Commission fees (FCFA)</label>
                                            <input type="text" id="commission" name="commission" value="{{ old('commission') }}"
                                                placeholder="Commission fees"
                                                class="form-control @error('commission') is-invalid @enderror">
                                            @error('commission')
                                            <span class="invalid-feedback text-small">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- End commission --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Additional info --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="status" class="form-label">Status<sup
                                                    class="text-danger text-bold">*</sup></label>
                                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                                <option value="">{{ __('Choose a status') }}</option>
                                                @foreach ($status as $singleStatus)
                                                <option value="{{ $singleStatus }}" @if(old('status')==$singleStatus)
                                                    selected @endif>{{ $singleStatus }}</option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                            <span class="invalid-feedback text-small">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="moderation_status" class="form-label">Moderation status<sup
                                                    class="text-danger text-bold">*</sup></label>
                                            <select name="moderation_status" id="moderation_status"
                                                class="form-control @error('moderation_status') is-invalid @enderror">
                                                <option value="">{{ __('Choose a moderation status') }}</option>
                                                @foreach ($moderationStatus as $status)
                                                <option value="{{ $status }}" @if(old('moderation_status')==$status)
                                                    selected @endif>{{ $status }}</option>
                                                @endforeach
                                            </select>
                                            @error('moderation_status')
                                            <span class="invalid-feedback text-small">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="account" class="form-label">Account<sup
                                                    class="text-danger text-bold">*</sup></label>
                                            <select name="account" id="account" class="form-control @error('account') is-invalid @enderror">
                                                <option value="">{{ __('Choose an agent') }}</option>
                                                @foreach ($accounts as $account)
                                                <option value="{{ $account->id }}" @if(old('account')==$account->id)
                                                    selected @endif>{{ $account->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('account')
                                            <span class="invalid-feedback text-small">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End additional info --}}

            </div>



            <div class="col-12 col-md-4">
                <div class="card position-sticky fixed-top">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <button type="submit" class="btn btn-block btn-primary">{{ __('Save') }}</button>
                            </div>
                            <div class="col-12 col-md-6">
                                <a class="btn btn-block btn-danger" href="{{ route('admin.adverts.index') }}">{{ __('Cancel') }}</a>
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
<script src="{{ asset('vendor/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('vendor/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('vendor/summernote/summernote-bs4.min.js') }}"></script>
<script>
    var fileList = new Array;
    var i = 0;
   Dropzone.options.images = {
        url: "{{ route('temporal_upload') }}",
        uploadMultiple: true,
        parallelUploads: 1,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        addRemoveLinks: true,
        acceptedFiles: ".jpeg,.jpg,.png",
        success: function(file, response){
            // add the file id from the files list
            var imgName = response;
            //console.log(response);
            fileList.push(imgName);
            console.log(fileList);
            file.previewElement.classList.add("dz-success");
        },
        removedfile: function(file){
            // remove the file id from the files list
            thisDropzone = this;
            console.log(file.name);
            let _del;
            return (_del = file.previewElement) != null ? _del.parentNode.removeChild(file.previewElement) : void 0;
        },
        error: function(file, response){
            file.previewElement.classList.add("dz-error");
        },

    }

    $('#create-advert-form').on('submit', function(){
        $('#imagesPreview').val(fileList);
    })
</script>
@endpush
