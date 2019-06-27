@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 pb-5">
            <img src="https://pbs.twimg.com/profile_images/1093864970335514625/N2rRQMQE_400x400.jpg" class="rounded-circle" style="max-height: 80px;"><br>
             <!-- Welcome, {{auth()->user()->firstname}}. -->
        </div>
        </div>
        <div class="row">
            <div class="col-3 pb-3">
                <a href="">Dashboard</a>
            </div>
        </div>
        <div class="row">
            <div class="col-3 pb-3">
                <a href="">Groups</a>
            </div>
        </div>
        <div class="row">
            <div class="col-3 pb-3">
                <a href="">Transactions</a>
            </div>
        </div>
        <div class="row">
            <div class="col-3 pb-3">
                <a href="{{ route('account') }}">Account</a>
            </div>
        </div>
        <div class="row">
            <div class="col-3 pb-3">
                <a href="">Notifications</a>
            </div>
        </div>
        <div class="row">
            <div class="col-3 pb-3">
                <a href="">support</a>
            </div>
        </div>
    </div>
@endsection
