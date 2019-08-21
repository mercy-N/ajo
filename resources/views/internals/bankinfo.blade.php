@extends('layouts.app')
@section('content')

<div class='container'>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bank Details') }}</div>

                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger"> {{ session('error') }}</div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success"> {{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('bankinfo') }}">
                       @csrf

                       <div class="form-group row">
                           <label for="bank_name" class="col-md-4 col-form-label text-md-right">{{ __('Bank Name') }}</label>

                           <div class="col-md-6">
                               <div class="form-group">
                                  <select class="form-control" id="bank_name" name="bank_name">
                                    <option selected>Select Bank</option>
                                    @foreach($bankme as $bankname)
                                    <option value={{$bankname->id}}>{{$bankname->name}}</option>
                                    @endforeach
                                  </select>
                            </div>
                           </div>
                       </div>

                       <div class="form-group row">
                         <label for="account_no" class="col-md-4 col-form-label text-md-right">{{ __('Account Number') }}</label>

                        <div class="col-md-6">
                               <input id="account_no" type="text" class="form-control {{ $errors->has('account_no') ? 'has-error' : '' }} " name="account_no" required autofocus>
                           </div>
                       </div><br>

                       <div class="form-group row">
                         <label for="account_name" class="col-md-4 col-form-label text-md-right">{{ __('Account Name') }}</label>

                        <div class="col-md-6">
                               <input id="account_name" type="text" class="form-control" name="account_name" required autofocus>
                           </div>
                       </div><br>

                       <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Bank') }}
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
