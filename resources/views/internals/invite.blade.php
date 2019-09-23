@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Invite Friends</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('invite.send') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone number</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="phone_number">

                                {!! session('error') !!}
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ session('error') }}</strong>
                                    </span>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary" value="send Invite">
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <p class="center">You can share this link: {{$referral_link}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
