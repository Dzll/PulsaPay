	
	@extends('layouts.header')

		@section('content')

		<div class="card" style="background: #fff;">


		   <!--  <div class="card-body"> -->
				<div class="row">
					<div class="col-sm-4"> 
						<div class="alert" style="background:  #fff; margin-top:2vw" align="center">
							<h1 align="center" class="h-tex"><b>No Pulsa? No Life</b></h1><br>
							<p class="tex">
									Pulsa Ku adalah aplikasi online untuk membeli Pulsa. Dengan menggunakan Pulsa Ku Anda akan dimudahkan dalam membeli pulsa, 
									tinggal klik dan bayar menggunakan saldo PulsaPay atau dapat menggunakan Bank yang telah kami sediakan.
							</p>
						</div>
					</div>
					<div class="col-sm-8 float-right">
						<div id="demo" class="carousel slide" data-ride="carousel">
						  <!-- Indicators -->
						  <ul class="carousel-indicators">
						    <li data-target="#demo" data-slide-to="0" class="active"></li>
						    <li data-target="#demo" data-slide-to="1"></li>
						    <li data-target="#demo" data-slide-to="2"></li>
						  </ul>
						  
						  <!-- The slideshow -->
						  <div class="carousel-inner">
						    
						    <div class="carousel-item">
						      <img src="{{ asset('images/promo1.png') }}" width="900" height="500">
						    </div>
						    <div class="carousel-item">
						      <img src="{{ asset('images/promo2.png') }}" width="900" height="500">
						    </div>
						    <div class="carousel-item active">
						      <img src="{{ asset('images/promo3.png') }}" width="900" height="500">
						    </div>
						  </div>
						  
						  <!-- Left and right controls -->
						  <a class="carousel-control-prev" href="#demo" data-slide="prev">
						    <span class="carousel-control-prev-icon"></span>
						  </a>
						  <a class="carousel-control-next" href="#demo" data-slide="next">
						    <span class="carousel-control-next-icon"></span>
						  </a>
						</div>
					</div>
				</div>
			<!-- </div> -->
		</div><br><br>

		<!-- Isi Konten -->

		<div>
			<h2>Daftar Pulsa</h2>
			<hr>
		</div>

		<table class="table table-striped">
				<thead>
					<tr>
						<th style="width:30%">Jumlah Pulsa</th>
						<th style="width:30%">Masa Aktif</th>
						<th style="width:30%">Harga</th>
						<th style="width:10%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($pulsa as $p)
					<tr>
						<td>{{ $p->jumlah_pulsa }}</td>
						<td>{{ $p->masa_aktif }}</td>
						<td>{{ $p->harga_pulsa }}</td>
						<td>
							<a href="/pembelian/{{ $p->id_pulsa }}">
								<button type="submit" name="beli" class="btn btn-info">Beli</button>
							</a>
						</td>
					</tr>
					@endforeach
					</tbody>
			</table>

@endsection