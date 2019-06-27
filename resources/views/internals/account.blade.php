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
            <a href="">Payment methods</a>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <a href="">Change password</a>
        </div>

    </div>
</div>

@endsection
