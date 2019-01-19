<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>PulsaKu</title>
    <link rel="icon" type="image/png" href="{{ asset('images/iconLogo.png') }}" />
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <style>
		* { box-sizing:border-box; }

		body {
			font-family: Helvetica;
			background: #eee;
		  -webkit-font-smoothing: antialiased;
		}
        .alert-biru{
            background:#e5e5e5;
            color:#000;
        }
		.alert-putih{
            background:#fff;
            /* 	color:#000; */
        }

		hgroup { 
			text-align:center;
			margin-top: 5em;
		}


		h1, h3 { font-weight: 300; }

		h1 { color: #636363; }

		h3 { color: #3490dc; }

		.forem {
			width: 430px;
			margin: 4em auto;
			padding: 3em 2em 2em 2em;
			background: #fafafa;
			border: 1px solid #ebebeb;
			box-shadow: rgba(0,0,0,0.14902) 0px 1px 1px 0px,rgba(0,0,0,0.09804) 0px 1px 2px 0px;
		}

		.group { 
			position: relative; 
			margin-bottom: 45px; 
		}

		input {
			font-size: 18px;
			padding: 10px 10px 10px 5px;
			-webkit-appearance: none;
			display: block;
			background: #fafafa;
			color: #17a2b8;
			width: 100%;
			border: none;
			border-radius: 0;
			border-bottom: 1px solid #17a2b8;
		}

		input:focus { outline: none; }


		/* Label */

		label {
			color: #999; 
			font-size: 18px;
			font-weight: normal;
			position: absolute;
			pointer-events: none;
			left: 5px;
			top: 10px;
			transition: all 0.2s ease;
		}


		/* active */

		input:focus ~ label, input.used ~ label {
			top: -20px;
		    transform: scale(.75); left: -2px;
			/* font-size: 14px; */
			color: #17a2b8;
		}


		/* Underline */

		.bar {
			position: relative;
			display: block;
			width: 100%;
		}

		.bar:before, .bar:after {
			content: '';
			height: 1px; 
			width: 0;
			bottom: 1px; 
			position: absolute;
			background: #17a2b8; 
			transition: all 0.2s ease;
		}

		.bar:before { left: 50%; }

		.bar:after { right: 50%; }


		/* active */

		input:focus ~ .bar:before, input:focus ~ .bar:after { width: 50%; }


		/* Highlight */

		.highlight {
			position: absolute;
			height: 60%; 
			width: 100px; 
			top: 25%; 
			left: 0;
			pointer-events: none;
			opacity: 0.5;
		}


		/* active */

		input:focus ~ .highlight {
			animation: inputHighlighter 0.3s ease;
		}


		/* Animations */

		@keyframes inputHighlighter {
			from { background: #17a2b8; }
			to 	{ width: 0; background: transparent; }
		}


		/* Button */

		.button {
		  position: relative;
		  display: inline-block;
		  padding: 12px 24px;
		  margin: .3em 0 1em 0;
		  width: 100%;
		  vertical-align: middle;
		  color: #fff;
		  font-size: 16px;
		  line-height: 20px;
		  -webkit-font-smoothing: antialiased;
		  text-align: center;
		  letter-spacing: 1px;
		  background: transparent;
		  border: 0;
		  /*border-bottom: 2px solid #3160B6;*/
		  cursor: pointer;
		  transition: all 0.15s ease;
		}
		.button:focus { outline: 0; }


		/* Button modifiers */

		.buttonBlue {
		  background: linear-gradient(60deg, #077182, #17a2b8); /*#00db0e;*/
		  color: white;
		  font-family: arial;
		  border-radius: 7px;
		  /*text-shadow: 1px 1px 0 rgba(39, 110, 204, .5);*/
		}

		.buttonBlue:hover { background: #17a2b8;}


		/* Ripples container */

		.ripples {
		  position: absolute;
		  top: 0;
		  left: 0;
		  width: 100%;
		  height: 100%;
		  overflow: hidden;
		  background: transparent;
		}


		/* Ripples circle */

		.ripplesCircle {
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  transform: translate(-50%, -50%);
		  opacity: 0;
		  width: 0;
		  height: 0;
		  border-radius: 50%;
		  background: rgba(255, 255, 255, 0.25);
		}

		.ripples.is-active .ripplesCircle {
		  animation: ripples .4s ease-in;
		}


		/* Ripples animation */

		@keyframes ripples {
		  0% { opacity: 0; }

		  25% { opacity: 1; }

		  100% {
		    width: 200%;
		    padding-bottom: 200%;
		    opacity: 0;
		  }
		}

		footer { text-align: center; }

		footer p {
			color: #888;
			font-size: 13px;
			letter-spacing: .4px;
		}

		footer a {
			color: #00aa0b;
			text-decoration: none;
			transition: all .2s ease;
		}

		footer a:hover {
			color: #666;
			text-decoration: underline;
		}

		footer img {
			width: 80px;
			transition: all .2s ease;
		}

		footer img:hover { opacity: .83; }

		footer img:focus , footer a:focus { outline: none; }

		img.center{
			display: block;
			margin: 0 auto;
		}

        .ketebalan{
            padding-top:0.7vw;
            padding-bottom:0.7vw; 
        }
    </style>
	<script>
		$(window, document, undefined).ready(function() {

		  $('input').blur(function() {
		    var $this = $(this);
		    if ($this.val())
		      $this.addClass('used');
		    else
		      $this.removeClass('used');
		  });

		  var $ripples = $('.ripples');

		  $ripples.on('click.Ripples', function(e) {

		    var $this = $(this);
		    var $offset = $this.parent().offset();
		    var $circle = $this.find('.ripplesCircle');

		    var x = e.pageX - $offset.left;
		    var y = e.pageY - $offset.top;

		    $circle.css({
		      top: y + 'px',
		      left: x + 'px'
		    });

		    $this.addClass('is-active');

		  });

		  $ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function(e) {
		  	$(this).removeClass('is-active');
		  });

		});

		// Select Option

		$('#mySelect').on('change', function() {
			var value = $(this).val();
			alert(value);
		});

	</script>
</head>
<body>

        <div class="container-fluid">
            <br>
            <div align="center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 15vw;">
            </div>
            <br>
        </div>

        <nav class="navbar navbar-expand-sm bg-primary navbar-dark sticky-top ketebalan">
            <div class="container col-sm-8">
            <ul class="navbar-nav">
                <li class="nav-item active">
                <a class="nav-link" href="/">PulsaKu</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">About</a>
                </li>
            </ul>

            <ul class="navbar-nav navbar-right">
            @if(Auth::check())
			<!-- <h4>Hello  {{Auth::user()->name}}</h4> -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown" href="#" data-toggle="dropdown">Profile</a>
                <ul class="dropdown-menu dropdown-lr" role="menu">
				    <div class="col-lg-12">
					<div class="text-center">
				    	<br>
					    </div>
					    <div class="form-group" align="center">
					      	<img src="{{ asset('images/user.png') }}" alt="User" width="60">
					    </div><hr style="background-color: #d8d8d8;">
					    <div class="form-group" align="center">
							<h4>{{Auth::user()->name}}</h4>
							<p>{{Auth::user()->no_hp}}</p>
							<hr>
							<p>{{Auth::user()->email}}</p>
							<a href="/riwayat">Riwayat Pembelian</a>
					    </div><hr style="background-color: #d8d8d8;">
                        <button type="submit"class="btn btn-info btn-sm btn-block" value="Logout">
                            {{ csrf_field() }}
                            <a href="/logout" style="color:white; text-decoration: none;">Logout</a>
                        </button>
					</div>
				</ul>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="/register">Sign Up</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
            </li>
            
            @endif
            </ul>
            </div>
        </nav><br>

    <div class="container col-sm-8">    

		@if(Session::has('regis_success'))
			<div class="alert alert-success"><b>{{ Session::get('regis_success') }}</b></div>
		@endif

		@if(Session::has('nominal_null'))
			<div class="alert alert-danger"><b>{{ Session::get('nominal_null') }}</b></div>
		@endif

		@if(Session::has('pembayaran_berhasil'))
			<div class="alert alert-success"><b>{{ Session::get('pembayaran_berhasil') }} ~ </b><a href="/riwayat">Ok</a></div>
		@endif

        @yield('content')

        <br><br><br><hr>
		<p align="left" style="font-size: 14px;">Copyright &copy; 2018 | Dzulkarnain Inc. All right reserved.</p>
	</div>
</body>
</html>