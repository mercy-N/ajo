@extends('layouts.app')
@section('content')

<div class='container'>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('') }}</div>

                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger"> {{ session('error') }}</div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success"> {{ session('success') }}</div>
                    @endif

                 <!--    <form method="POST" action="{{ route('cardCreate') }}">
                       @csrf

                       <div class="form-group row">
                           <label for="card_type" class="col-md-4 col-form-label text-md-right">{{ __('Card Type') }}</label>

                           <div class="col-md-6">
                               <div class="form-group">
                                  <select class="form-control" id="card_type" name="card_type">
                                    <option selected>Choose card type</option>
                                    <option>Visa</option>
                                    <option>Master Card</option>
                                  </select>
                            </div>
                           </div>
                       </div>

                       <div class="form-group row">
                         <label for="account_no" class="col-md-4 col-form-label text-md-right">{{ __('Card Number') }}</label>

                        <div class="col-md-6">
                               <input id="card_no" type="text" class="form-control {{ $errors->has('card_no') ? 'has-error' : '' }} " name="card_no" required autofocus>
                           </div>
                       </div><br>

                       <div class="form-group row">
                         <label for="expiry_date" class="col-md-4 col-form-label text-md-right">{{ __('Valid thru') }}</label>

                        <div class="col-md-6">
                               <input id="expiry_date" type="text" class="form-control" name="expiry_date" required autofocus>
                           </div>
                       </div><br>

                       <div class="form-group row">
                         <label for="cvv" class="col-md-4 col-form-label text-md-right">{{ __('CVV') }}</label>

                        <div class="col-md-6">
                               <input id="cvv" type="text" class="form-control" name="cvv" required autofocus>
                           </div>
                       </div><br>


                       <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Card') }}
                                </button>
                            </div>
                        </div>

                    </form> -->


                    <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                      <div class="row" style="margin-bottom:40px;">
                        <div class="col-md-8 col-md-offset-2">
                          <p>
                              <div>
                                  Lagos Eyo Print Tee Shirt
                                  ₦ 2,950
                              </div>
                          </p>
                          <input type="hidden" name="email" value="mercynwachukwu70@gmail.com"> {{-- required --}}
                          <input type="hidden" name="orderID" value="345">
                          <input type="hidden" name="amount" value="2300000"> {{-- required in kobo --}}
                          <input type="hidden" name="quantity" value="3">
                          <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                          <input type="hidden" name="reference" value="{{ $transRef }}"> {{-- required --}}
                          <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                          {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                           <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}


                          <p>
                            <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                            <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                            </button>
                          </p>
                        </div>
                      </div>
              </form>



                </div>
            </div>
        </div>
    </div>
</div>


@endsection
