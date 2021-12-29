@extends('layouts.app')

@section('title', "Edit user \"{$user->name}\"")

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit "{{ $user->name }}" user</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Edit "{{ $user->name }}" user</h2>
        <p class="section-lead">This page is for editing user's informations.</p>
        <form class="row" action="{{ route('admin.users.update', $user) }}" method="POST">
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
                                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
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
                                    <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}"
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
                                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
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
                                        <input type="number" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" class="form-control @error('phone') is-invalid @enderror">
                                        @error('phone')
                                        <span class="invalid-feedback text-small">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="form-label">Role<sup class="text-danger text-bold">*</sup></label>
                            <div class="selectgroup w-100">
                                @foreach ($roles as $role)
                                <label class="selectgroup-item">
                                    <input type="radio" name="role" value="{{ $role }}" class="selectgroup-input"
                                        @if(old('role', $user->role)==$role) checked @endif>
                                    <span class="selectgroup-button">{{ ucfirst($role) }}</span>
                                </label>
                                @endforeach
                            </div>
                            @error('role')
                            <span class="invalid-feedback text-small">
                                {{ $message }}
                            </span>
                            @enderror
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
                                <button type="submit" class="btn btn-block btn-primary">{{ __('Save changes') }}</button>
                            </div>
                            <div class="col-12 col-md-6">
                                <a class="btn btn-block btn-danger" href="{{ route('admin.users.index') }}">Cancel</a>
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
        $('#change-password').on('click', function(){
            $('#password-zone').toggle(500);
        });
    </script>
@endpush
