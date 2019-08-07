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
                            <h5 class="card-title" id="c-title"></h5>
                                <div class="dropdown">

                                    <button class="dropbtn" onclick="myFunction()">Select Group
                                      </button>

                                      <div id="myDropdown" class="dropdown-content">
                                        <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">

                                        @foreach ($groups as $group)
                                        <a class="dropdown-item" href="#" onclick="getGroup({{ $group->id}});"> {{ $group->name }} </a>
                                            @endforeach

                                      </div>
                                </div>
                                <p class="card-text" id="amount"></p>
                                <p class="card-text" id="no_of_users"></p>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="card" style="height:20rem;">
                       <div class="card-body">
                           <div class="card-body">
                               <h5 class="card-title">Order of group members </h5>
                                    <ul class="card-text user-group"></ul>


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
@section('script')
<script type="text/javascript">
  function getGroup(groupId){
    $.ajax({
      url: 'get-group/'+groupId,
      method: 'GET',
      success: (data)=>{
        console.log(data);
        for(i=0, users = ""; i < data[0].length; i++){
          users += '<li>'+data[0][i].firstname+ ' ' +data[0][i].lastname+'</li>';
        }
        $('.user-group').html(users);
        $('#c-title').text(data[1].name+' Summary');
        $('#amount').text(data[1].amount);
        $('#no_of_users').text(data[1].no_of_users);



      }
    });
  }


  function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
document.onreadystatechange = ()=>{
    if(document.readyState === "complete"){
      $.ajax({
        url: 'get-first-group/',
        method: 'GET',
        success: (data)=>{
          console.log(data);
          for(i=0, users = ""; i < data[0].length; i++){
            users += '<li>'+data[0][i].firstname+ ' ' +data[0][i].lastname+'</li>';
          }
        $('.user-group').html(users);
        $('#c-title').text(data[1].name+' Summary');
        $('#amount').text(data[1].amount);
        $('#no_of_users').text(data[1].no_of_users);
      }
    });
    }

  }
</script>
@endsection

