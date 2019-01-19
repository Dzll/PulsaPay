<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PulsaData;
use App\Transaksi;
use App\PulsaPay;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {

        $pulsa = PulsaData::all();

        return view('pulsaku')->with('pulsa' , $pulsa);
    }

    public function pembelian($id)
    {
        $pembelian = PulsaData::find($id);
        $idius = Auth::User()->id;
        $pay = PulsaPay::where('id_user', $idius)->firstOrFail(); //firstOrFail();
        return view('pembelian')->with('data_pembelian', $pembelian)->with('pay_data', $pay);   
    }

    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function pulsapay($id)
    {
        $pembayaran = PulsaData::find($id);
        return view('nota')->with('pembayaran', $pembayaran);
    }
    public function riwayat(Transaksi $transaksi)
    {   
        $riwayat = $transaksi->where('id_user', Auth::user()->id)->orderBy('id_transaksi', 'desc')->get();
        return view('riwayat')->with('his', $riwayat);
    }
    public function bayar_bank($id)
    {
        $pembelian = PulsaData::find($id);
        return view('bayar_bank')->with('pulsa', $pembelian);
    }
}
