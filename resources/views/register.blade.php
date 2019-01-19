@extends('layouts.header')

@section('content')
<form method="post" action="/register" class="forem">

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
	    <input type="text" name="nama" autocomplete="off" required=""><span class="highlight"></span><span class="bar"></span>
	    <label>Nama</label>
      </div>
      <div class="group">
	    <input type="number" name="telepon" autocomplete="off" required=""><span class="highlight"></span><span class="bar"></span>
	    <label>Telepon</label>
	  </div>
	  <div class="group">
	    <input type="email" name="email" autocomplete="off" required=""><span class="highlight"></span><span class="bar"></span>
	    <label>Email</label>
	  </div>
	  <div class="group">
	    <input type="password" name="password" autocomplete="off" required=""><span class="highlight"></span><span class="bar"></span>
	    <label>Password</label>
		</div>
		<div class="group">
	    <input type="password" name="password_confirmation" autocomplete="off" required=""><span class="highlight"></span><span class="bar"></span>
	    <label>Confirm Password</label>
	  </div>
	  <button type="submit" class="button buttonBlue" name="register">Register
	    <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
	  </button>
	</form>
	<footer>
	  <p>Pulsaku</p>
	</footer>
@endsection