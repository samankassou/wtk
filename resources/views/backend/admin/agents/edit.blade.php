@extends('layouts.app')

@section('title', "Edit account \"{$agent->name}\"")

@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit "{{ $agent->name }}" account</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Edit "{{ $agent->name }}" account</h2>
        <p class="section-lead">This page is for editing agent informations.</p>
        <form class="row" action="{{ route('admin.agents.update', $agent) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-danger text-sm font-italic">(*) Required fields</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Name<sup class="text-danger text-bold">*</sup></label>
                                    <input type="text" id="name" name="name" value="{{ old('name', $agent->name) }}"
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="username">Username<sup class="text-danger text-bold">*</sup></label>
                                    <input type="text" id="username" placeholder="Ex: john_doe" name="username" value="{{ old('username', $agent->username) }}"
                                        class="form-control @error('username') is-invalid @enderror">
                                    @error('username')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="email">Email<sup class="text-danger text-bold">*</sup></label>
                                    <input type="email" id="email" name="email" value="{{ old('email', $agent->email) }}"
                                        class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone<sup class="text-danger text-bold">*</sup></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                +237
                                            </div>
                                        </div>
                                        <input type="number" name="phone" id="phone" value="{{ old('phone', $agent->phone) }}" class="form-control @error('phone') is-invalid @enderror">
                                        @error('phone')
                                        <span class="invalid-feedback text-small">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>


                         <div class="row">
                            {{-- Is featured --}}
                            <div class="col-12">
                                <div class="control-label"></div>
                                <label class="custom-switch pl-0 mb-3">
                                    <input type="checkbox" name="is_featured" value="1"
                                        class="custom-switch-input" @if(old('is_featured', $agent->is_featured)) checked @endif>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Is featured?</span>
                                </label>
                            </div>
                            {{-- End is featured --}}
                        </div>

                        <div class="row">
                            {{-- Dob --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="dob">Date of birth</label>
                                    <div class="input-group">
                                        <input type="text" name="dob" value="{{ old('dob', $agent->dob) }}" class="form-control datepicker" placeholder="DD/MM/YYYY">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="cursor: pointer">
                                                <i class="fas fa-calendar"></i>
                                            </div>
                                        </div>
                                        @error('dob')
                                        <span class="invalid-feedback text-small">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- End dob --}}
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" name="change_password" type="checkbox"
                                            id="change-password" value="1" @if(old('change_password')) checked @endif>
                                        <label class="form-check-label"
                                            for="change-password">{{ __('Change password?') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="password-zone" @if(!old('change_password')) style="display: none" @endif>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="password">Password<sup class="text-danger text-bold">*</sup></label>
                                    <input type="password" id="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                    <span class="invalid-feedback text-small">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="password-confirmation">Password confirmation</label>
                                    <input type="password" id="password-confirmation" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror">
                                    @error('password_confirmation')
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
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <button type="submit" class="btn btn-block btn-primary">Save changes</button>
                            </div>
                            <div class="col-12 col-md-6">
                                <a class="btn btn-block btn-danger" href="{{ route('admin.agents.index') }}">Cancel</a>
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
<script src="{{ asset('vendor/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script>
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
    });

    $('#change-password').on('click', function(){
        $('#password-zone').toggle(500);
    });
</script>
@endpush
