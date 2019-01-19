@extends('layouts.header')

@section('content')
<form method="post" action="/login" class="forem">

@csrf

@if($errors->any())
<div class="alert alert-danger">
<h4>{{$errors->first()}}</h4>
</div>

@endif
	  <div class="group" align="center">
	  	<img src="{{ asset('images/logo2.png') }}" alt="Logo" width="200vw">
          <br><br>
        <h4 align="center" style="color:#17a2b8">~ No Pulsa? No Life ~</h4>
	  </div>
	  <div class="group">
	    <input type="text" name="email" autocomplete="off" required=""><span class="highlight"></span><span class="bar"></span>
	    <label>Email</label>
	  </div>
	  <div class="group">
	    <input type="password" name="password" autocomplete="off" required=""><span class="highlight"></span><span class="bar"></span>
	    <label>Password</label>
	  </div>
	  <button type="submit" class="button buttonBlue" name="login">Login
	    <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
	  </button>
	</form>
	<footer>
	  <p>Copyright &copy; 2019 | Pulsaku All right reserved.</p>
	</footer>

@endsection