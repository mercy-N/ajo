@extends('layouts.app')
@section('content')

<div class='container'>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Group') }}</div>

                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger"> {{ session('error') }}</div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success"> {{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('createGroup') }}">
                       @csrf

                       <div class="form-group row">
                         <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Group Name') }}</label>

                        <div class="col-md-6">
                               <input id="name" type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }} " name="name" required autofocus>
                           </div>
                       </div><br>

                       <div class="form-group row">
                           <label for="no_of_users" class="col-md-4 col-form-label text-md-right">{{ __('Number of members') }}</label>

                           <div class="col-md-6">
                               <div class="form-group">
                                  <select class="form-control" id="no_of_users" name="no_of_users">
                                    <option selected>Choose Number</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                  </select>
                            </div>
                           </div>
                       </div>

                       <div class="form-group row">
                         <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                        <div class="col-md-6">
                               <input id="amount" type="text" class="form-control {{ $errors->has('amount') ? 'has-error' : '' }} " name="amount" required autofocus>
                           </div>
                       </div><br>

                       <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Group') }}
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
