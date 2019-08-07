@extends('layouts.app')
@section('content')

<div class='container'>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Search Phone Number') }}</div>

                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger"> {{ session('error') }}</div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success"> {{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('searchPhoneNumber') }}">
                       @csrf

                       <div class="form-group row">
                         <label for="account_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                        <div class="col-md-6">
                               <input id="phone" type="text" class="form-control {{ $errors->has('phone') ? 'has-error' : '' }} " name="phone" required autofocus>
                           </div>
                       </div><br>

                       <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Search') }}
                                </button>
                            </div>
                        </div>

                    </form>
                    <div>
                      @phonefound
                        @if(isset(session('userPhone')->phone))
                          {{ session('userPhone')->phone }}
                          <button class="btn btn-primary">{{ session('status') }}</button>
                        @else
                          {{ session('userPhone') }}
                          <button class="btn btn-primary">{{ session('status') }}</button>
                        @endif
                      @endphonefound

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
