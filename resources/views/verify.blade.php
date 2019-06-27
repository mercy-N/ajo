@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('verify otp') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('verifyotp') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('OTP Number') }}</label>

                            <div class="col-md-6">
                                <input type="hidden" name="phone_number" value={{session('status')}}>
                                <input id="name" type="text" class="form-control @error('phone') is-invalid @enderror" name="verification_code" value="{{ old('verification_code') }}" autocomplete="name" autofocus>

                                <!-- if( session('status')) -->
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ session('status') }}</strong>
                                    </span>
                                <!-- endif -->
                            </div>
                        </div>
                        <div>
                            your verification code is {{ session('status') }}
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('verify') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

