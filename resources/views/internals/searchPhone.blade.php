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
                          <form action="/addGroupRequest" method="POST" id="a">
                            @csrf
                            <input type="hidden" value=" {{ session('userPhone')->phone }} " name="phone" id="aPhone">
                            <button id="addGroup" class="btn btn-primary">{{ session('status') }}</button>
                          </form>
                        @else
                          {{ session('userPhone') }}
                          <form>
                          <input type="hidden" name="phone" id="iPhone" value="{{ session('userPhone') }} ">
                          <button id="inviteGroup" class="btn btn-primary">{{ session('status') }}</button>
                          </form>
                        @endif
                      @endphonefound

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')
<script type="text/javascript">
$('#inviteGroup').click((e)=>{
  e.preventDefault();
  var idata =  $('#iPhone').val();
  var groupData = {{ $group }};
  $.ajax({
    url: '/group-invite',
    method: 'POST',
    data: {'_token': "{{ csrf_token()}}", 'phone': idata, 'group': groupData },
    success: (data)=>{ 
      console.log(data);
      alert('done');
    }
  })
  // console.log($('#iPhone').val());
  //take this to the invite function
  //if returns true
  //drop a notice that the user has been invited
  //else
  //drop a notice that the user has not been invited
});
$('#addGroup').click((e)=>{
  e.preventDefault();
  var phoneData = $('#aPhone').val();
  var group = {{ $group }};
  console.log(group);
  $.ajax({
    url: '/addGroupRequest',
    method: 'POST',
    data: {'_token': "{{ csrf_token() }}", 'phone': phoneData, 'group': group},
    success: (data)=>{
    switch(data){
      case 'already':
      alert('tell the fool to accept');
      break;
      case 'done':
      alert('request has been sent');
      break;
      default:
      alert('request could not be sent');
    }
      }

  });
  // console.log($('#aPhone').val());
  //take this to the add to group function
  //if returns true
  //drop a notice that the user has been added
  //else
  //drop a notice that the user has not been added
});
</script>
@endsection
