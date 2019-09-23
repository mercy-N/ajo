@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row" style="margin-left: 900px;">
        <a class="btn btn-primary" href=" {{ route('createGroup') }} ">Create Group</a>
  </div>

</div>
  <div class="row" style="padding-left:150px; padding-top: 50px;">
    @foreach($groups as $group)
    <div col-md-6 ml-2 style="padding-right: 100px;">
      <div class="card text-center" style="width: 30rem;">
      <div class="card-header">
        <ul class="nav nav-pills card-header-pills">
          <li class="nav-item">
            <a class="nav-link active" href="#">{{ $group->name }}</a><br>
            <a class="btn btn-primary" href=" {{ route('searchPhone', ['group'=> $group->id]) }} ">Add Member</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"> {{ $group->order_number }} </a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <h5 class="card-title">Group members: {{ $group->no_of_users }} </h5>
        <p class="card-text">Amount: {{ $group->amount }}</p>
        <a href="#" class="btn btn-primary">remove group/ restart new cycle</a>
      </div>
    </div>
    </div>
    @endforeach
  </div>
@endsection
