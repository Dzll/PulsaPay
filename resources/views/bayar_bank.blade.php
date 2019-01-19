@extends('layouts.header')

@section('content')

    <div class="container col-sm 8">
        <div class="alert alert-putih">
            <div class="container col-sm-8" align="center">
                <h4>Hai {{Auth::user()->name}}!,</h4>
                <h5>Terimakasih telah membeli di PulsaKu.co.id. Mohon segera melakukan pembayaran.</h5>
                <p></p>
                <hr>
                <h5>
                    Lakukan pembayaran sebesar :
                </h5><br>
                <h3>Rp {{ $pulsa->harga_pulsa - str_pad(rand(0, pow(10, 3)-1), 3, '0', STR_PAD_LEFT) }}</h3>
                <hr>
                <h5>Pembayaran dapat dilakukan ke salah satu nomor rekening a/n Pulsaku.co.id</h5>
            
                <br><br>

                <div align="left" style="padding-left:2vw">
                    <table border="0" class="table">
                        <tr style="padding:10vw">
                            <td width="30%"><img src="{{ asset('images/bank/MANDIRI.png') }}" alt="BRI" height="30vw"></td>
                            <td width="25%"><h5>Bank Mandiri</h5></td>
                            <td width="35%"><h5>0700 000 544 221</h5></td>
                        </tr>
                        <tr style="padding:10vw">
                            <td width="30%"><img src="{{ asset('images/bank/BCA.png') }}" alt="BRI" height="25vw"></td>
                            <td width="25%"><h5>Bank BCA</h5></td>
                            <td width="35%"><h5>731 022 2456</h5></td>
                        </tr>
                        <tr style="padding:10vw">
                            <td width="30%"><img src="{{ asset('images/bank/BNI.png') }}" alt="BRI" height="25vw"></td>
                            <td width="25%"><h5>Bank BNI</h5></td>
                            <td width="35%"><h5>023 822 2008</h5></td>
                        </tr>
                        <tr style="padding:10vw">
                            <td width="30%"><img src="{{ asset('images/bank/BRI.png') }}" alt="BRI" height="25vw"></td>
                            <td width="25%"><h5>Bank BRI</h5></td>
                            <td width="35%"><h5>034 101 005 234 566</h5></td>
                        </tr>
                    </table>

                    <br>
                    <a href="/riwayat">
                        <button class="btn btn-success">Cek Status</button>
                    </a>

                    <div class="row ">
                        
                    </div>
                </div>

            </div>
            


            {{-- <div class="row">
                <div class="col-sm-6">   
                    <h5>Nominal : {{ $pulsa->jumlah_pulsa }}</h5>
                    <br>
                    <h5>Bank : </h5>
                    <br>
                    <h5>Rekening : </h5>
                </div>
                <div class="col-sm-6">
                    <h5>Jumlah : {{ $pulsa->jumlah_pulsa }}</h5>
                    <br>
                    <h5>Masa Aktif : {{ $pulsa->masa_aktif }}</h5>
                    <br>
                    <h5>Harga : {{ $pulsa->harga_pulsa }}</h5>
                </div>
            </div><hr> --}}
            {{-- <button class="btn btn-info"><b> Konfirmasi Pembayaran </b></button> --}}
            <br><br>
        </div>
    </div>

@endsection