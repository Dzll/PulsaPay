@extends('layouts.header')

@section('content')
            <table class="table table-striped">
				<thead>
					<tr>
						<th style="width:30%">Jumlah Pulsa</th>
						<th style="width:30%">Masa Aktif</th>
						<th style="width:30%">Harga</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ $data_pembelian->jumlah_pulsa }}</td>
                        <td>{{ $data_pembelian->masa_aktif }}</td>
						<td>{{ $data_pembelian->harga_pulsa }}</td>
					</tr>
					</tbody>
            </table>

            <form action="{{ $data_pembelian->id_pulsa }}/pulsapay" method="post">

                {{ csrf_field() }}
                    <h3>Masukkan nomor</h3>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary" type="button">Indonesia</button>  
                      </div>
                      <input type="text" class="form-control" name="nohp_beli" placeholder="Masukkan nomor anda" autocomplete="off" required>
                    </div>
                    <br>

                    <div class="form-group">
                        <div class="input-group-prepend">
                        <select name="operator" class="custom-select" id="mySelect" required>
                          <option value="Indosat">Indosat</option>
                          <option value="Telkomsel">Telkomsel</option>
                          <option value="Smartfren">Smartfren</option>
                          <option value="XL">XL</option>
                        </select>
                        </div>
                    </div>

                    <img id="operatorImage" src="{{ asset('images/operator/indosat.png') }}" alt="Logo Operator" height="50vw">

                    <script>
                        $('select').on('change', function() {
                            // alert( this.selectedIndex );
                            if(this.selectedIndex == 0){
                                $('#operatorImage').attr('src','{{ asset("images/operator/indosat.png") }}');
                            }else if(this.selectedIndex == 1){
                                $('#operatorImage').attr('src','{{ asset("images/operator/telkomsel.png") }}');
                            }else if(this.selectedIndex == 2){
                                $('#operatorImage').attr('src','{{ asset("images/operator/smartfren.png") }}');
                            }else if(this.selectedIndex == 3){
                                $('#operatorImage').attr('src','{{ asset("images/operator/xl.png") }}');
                            }
                        });
                    </script>

                    <br><br>

                <button type="submit" class="btn btn-info col-sm-3" name="submit" value="Bayar PulsaPay"><strong>Bayar PulsaPay : </strong> Saldo Rp {{ $pay_data->nominal_pay }}</button>

                <br><br>

                {{-- <a href="{{ $data_pembelian->id_pulsa }}/bayar_bank"> --}}
                <button type="submit" class="btn btn-info col-sm-3" name="submit" value="Transfer Bank"><strong>Transfer Bank</strong></button>
                {{-- </a> --}}

            </form>

            
            

@endsection;