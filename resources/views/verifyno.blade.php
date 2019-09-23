<p> OTP for {{$user_phone_number->phone_number}} your OTP is {{$user_phone_number->verification_code}}</p>

<form method="post" action="{{route('verify.otp')}}">
    @csrf
    <input type="number" name="otp_number">
    <input type="hidden" name="phone_number" value="{{$user_phone_number->phone_number}}">
    <input type="submit" name="" value="submit">
</form>
