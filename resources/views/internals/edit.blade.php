@extends('layouts.app')
@section('content')

<form action="">
    <div class="row">
        <div class="col-4 offset-2">
            <div class="row">
                <strong><h4>Update profile information</h4></strong>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label">Phone Number</label>

                <input id="phone_number"
                type="text"
                class="form-control{{ $errors->has('phone_number')?'is-invalid':'' }} "
                name="phone_number"
                value="{{auth()->user()->phone}}">

                @if($errors->has('phone_number'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone_number') }}</strong>
                </span>
                @endif

            </div>
            <div class="row">
                <label for="firstname" class="col-md-4 col-form-label">
                   first Name
                </label>

                <input type="text" name="firstname" class="form-control"
                value="{{auth()->user()->firstname}}" disabled="">
            </div>

            <div class="row">
                <label for="lastname" class="col-md-4 col-form-label">Last Name</label>

                <input type="text" name="lastname" class="form-control"
                value="{{auth()->user()->lastname}}" disabled="">
            </div>

            <div class="row">
                <label for="email" class="col-md-4 col-form-label">Email</label>

                <input type="email" name="email" class="form-control"
                value="{{auth()->user()->email}}">
            </div>

            <div class="row">
                <label for="bvn" class="col-md-4 col-form-label">BVN</label>

                <input type="number" name="bvn" class="form-control"
                value="{{auth()->user()->bvn}}" disabled="">
            </div>

            <div class="row">
                <label for="image" class="col-md-4 col-form-label">Profile picture</label>

                <input type="file" class="form-control-file" id="image" name="image">

                 @if($errors->has('image'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('image') }}</strong>
                </span>
                @endif
            </div>

            <div class="row pt-3">
                <button class="btn btn-primary">update</button>
            </div>
        </div>
    </div>
</form>




@endsection
