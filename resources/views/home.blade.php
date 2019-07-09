@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
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
                <a href=" {{ route('groups') }} ">Groups</a>
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
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="height:20rem;">
                        <div class="card-body">
                            <h5 class="card-title">Group 1 Summary</h5>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">group 2</a>
                                        <a class="dropdown-item" href="#">group 3</a>
                                        <a class="dropdown-item" href="#">group 4</a>
                                      </div>
                                </div>
                                <p class="card-text">Savings Plan    50,000</p>
                                <p class="card-text">Number of members     6</p>
                                <p class="card-text">Total amount paid to members   </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card" style="height:20rem;">
                       <div class="card-body">
                           <div class="card-body">
                               <h5 class="card-title">Order of group members </h5>
                                   <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">group 2</a>
                                        <a class="dropdown-item" href="#">group 3</a>
                                        <a class="dropdown-item" href="#">group 4</a>
                                      </div>
                                    <p class="card-text">Ada N</p>
                                    <p class="card-text">Michael C</p>
                                    <p class="card-text">Mercy N</p>
                                    <p class="card-text">Schneider K</p>
                                    <p class="card-text">Joy J</p>

                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div><br>

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="height:20rem;">
                        <div class="card-body">
                            <h5 class="card-title">Group Transaction History</h5>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     last 30 days
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">group 2</a>
                                        <a class="dropdown-item" href="#">group 3</a>
                                        <a class="dropdown-item" href="#">group 4</a>
                                      </div>
                                </div>
                                <p class="card-text" style="color:red;">View more</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card" style="height:20rem;">
                       <div class="card-body">
                           <div class="card-body">
                               <h5 class="card-title">Your Payment history</h5>
                                   <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Payments Received
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Payments made</a>
                                      </div>
                                </div>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection
