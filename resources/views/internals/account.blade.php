@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-3">
            <a href="{{ route('edit') }}">Edit Profile</a>
        </div>
    </div>

    <div class="row">
        <div class="col-3">
            <a href=" {{ route('bankinfo') }} ">Bank</a>
        </div>
    </div>

    <div class="row">
        <div class="col-3">
            <a href=" {{ route('cardCreate') }} ">Payment methods</a>
        </div>
    </div>

    <div class="row">
        <div class="col-3">
            <a href="{{ route('changePassword')}} ">Change password</a>
        </div>

    </div>

    <div class="row">
        <div class="col-3">
            <a href="{{ route('invite')}} ">Referrals</a>
        </div>

    </div>
</div>

@endsection
