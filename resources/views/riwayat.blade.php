	
	@extends('layouts.header')

    @section('content')

    <!-- Isi Konten -->
    <h3>Nama : {{Auth::user()->name}}</h3>
    <hr>
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th style="width:20%">Telepon</th>
                    <th style="width:15%">Jumlah</th>
                    <th style="width:15%">Operator</th>
                    <th style="width:15%">Harga</th>
                    <th style="width:20%">Tanggal</th>
                    <th style="width:15%">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @foreach($his as $h)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $h->nohp_beli }}</td>
                    <td>{{ $h->jumlah_pulsa }}</td>
                    <td>{{ $h->operator }}</td>
                    <td>Rp {{ $h->harga_pulsa }}</td>
                    <td>{{ $h->created_at }}</td>
                    @if( $h->status == '0' )
                        <td style="color:#ef1515">
                            <strong>Belum Bayar</strong>
                        </td>
                    @elseif( $h->status == '1' )
                        <td style="color:#0086ce">
                            <strong>Bayar ~ Belum Dikirim</strong>
                        </td>
                    @else
                        <td style="color:#0dba32">
                            <strong>Success ~ Terkirim</strong>
                        </td>
                    @endif
                </tr>
                @endforeach
                </tbody>
        </table>
        @if( !$his->all() )
            <br>
            <h3 align="center"> << Belum ada riwayat transaksi >></h3>
        @endif

@endsection