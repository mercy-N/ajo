@extends('layouts.app')
@section('content')

<div class='container'>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change Password') }}</div>

                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger"> {{ session('error') }}</div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success"> {{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('changePassword') }}">
                       @csrf

                       <div class="form-group row">
                           <label for="current-password" class="col-md-4 col-form-label text-md-right">{{ __('current password') }}</label>

                           <div class="col-md-6">
                               <input id="current-password" type="password" class="form-control {{ $errors->has('current-password') ? 'has-error' : '' }} " name="current-password" required autofocus>
                           </div>
                       </div>

                       <div class="form-group row">
                         <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New password') }}</label>

                        <div class="col-md-6">
                               <input id="new-password" type="password" class="form-control {{ $errors->has('password') ? 'has-error' : '' }} " name="password" required autofocus>
                           </div>
                       </div><br>

                       <div class="form-group row">
                         <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm password') }}</label>

                        <div class="col-md-6">
                               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autofocus>
                           </div>
                       </div><br>

                       <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Change Password') }}
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
