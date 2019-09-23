@extends('layouts.app')

@section('content')
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">
                     {{ __('Transactions') }}
                 </div>
                    <div class="card-body">

                        <ul>

                            @foreach($transactions as $transaction)
                                <li>
                                    {{$transaction->amount }}
                                    {{ $transaction->type }}
                                    {{ $transaction->created_at}}
                                </li>
                            @endforeach
                        </ul>


                    </div>
             </div>
         </div>
     </div>
 </div>







@endsection
