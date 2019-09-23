@extends('layouts.app')

@section('content')
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">
                     {{ __('Notifications') }}
                 </div>
                    <div class="card-body">

                        <ul>

                            @foreach($invites as $invite)
                                <li>

                                    {{ $invite->sendingParty->firstname }}
                                    {{ $invite->sendingParty->lastname }} invited you to join
                                    {{ $invite->group->name }}
                                    <div class="bronx">
                                    @if($invite->status === 1)
                                        <button class="btn btn-success">Accepted
                                        </button>
                                    @else
                                    <div id="acceptanceBox{{$invite->id}}">
                                         <button type="submit" acceptanceID="{{$invite->id}}" class="btn btn-primary"
                                        onclick="accept({{$invite->id}})" id="acceptance{{$invite->id}}">  Accept
                                        </button>
                                    </div>

                                    @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>


                    </div>
             </div>
         </div>
     </div>
 </div>







@endsection
@section('script')
<script type="text/javascript">
    function accept(inviteId) {
        // alert(inviteId);
          $.ajax({
          url: 'addGroupAccept/'+inviteId,
          method: 'GET',
          success: (data)=>{
            console.log(data);
            $('#acceptanceBox'+inviteId).html('<button class="btn btn-success">{{ __("Accepted") }}</button>');
            console.log(true);
          }
        });
    }


</script>
@endsection
