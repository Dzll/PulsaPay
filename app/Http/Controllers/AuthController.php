<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transaksi;
use App\PulsaData;
use App\PulsaPay;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
  
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
        {
            return redirect('/riwayat');

        }
        
        return  redirect()->back()->withInput($request->only('email'))->withErrors("Salah Bego!!");
        
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function register(Request $request)
    {

        $this->validate($request, [
            'nama' => 'required|min:3|max:50',
            'email' => 'required|email',
            'telepon' => 'required|max:12|min:10|number',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required ',
        ]);

        $user = new User();
        $user->name = $request->nama;
        $user->no_hp = $request->telepon;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = Hash::make($user->email);
        $user->save();

        $pulsapay = new PulsaPay();
        $pulsapay->nominal_pay = 0;
        $pulsapay->id_user = $user->id;
        $pulsapay->save();

        \Session::flash('regis_success', 'Sign Up Berhasil !!');
        
        return redirect('login');
    }

    public function pulsainsert(Request $request, $id)
    {

        $pulsa = PulsaData::find($id);
        $user_id = Auth::user()->id;
        $user_nama = Auth::user()->name;

        $pulsapay = PulsaPay::where('id_user', $user_id)->firstOrFail();

        $kurang = ((int)$pulsa->harga_pulsa - $pulsapay->nominal_pay);

        if($request->submit == "Bayar PulsaPay"){

            if( $pulsapay->nominal_pay < (int)$pulsa->harga_pulsa ){
            
                \Session::flash('nominal_null', 'Saldo anda Kurang!! Rp '. $kurang);
                return redirect('/pembelian/'. $id);

            }else {
 
                $saldo = ($pulsapay->nominal_pay - (int)$pulsa->harga_pulsa);
                $ppay = PulsaPay::where('id_user', $user_id)->update(array('nominal_pay'=>$saldo));

                $transaksi = new Transaksi();
                $transaksi->id_user = $user_id;
                $transaksi->id_pulsa = $pulsa->id_pulsa;
                $transaksi->nohp_beli = $request->nohp_beli;
                $transaksi->nama_user = $user_nama;
                $transaksi->jumlah_pulsa = $pulsa->jumlah_pulsa;
                $transaksi->harga_pulsa = $pulsa->harga_pulsa;
                $transaksi->operator = $request->operator;
                $transaksi->status = '1';
                $transaksi->save();

                \Session::flash('pembayaran_berhasil', 'Pembayaran Berhasil !!');

                return redirect('/riwayat');
            }

        }else {

            $transaksi = new Transaksi();
            $transaksi->id_user = $user_id;
            $transaksi->id_pulsa = $pulsa->id_pulsa;
            $transaksi->nohp_beli = $request->nohp_beli;
            $transaksi->nama_user = $user_nama;
            $transaksi->jumlah_pulsa = $pulsa->jumlah_pulsa;
            $transaksi->harga_pulsa = $pulsa->harga_pulsa;
            $transaksi->operator = $request->operator;
            $transaksi->status = '0';
            $transaksi->save();

            return redirect('/pembelian/'.$id.'/bayar_bank');
            
            }
    }
    
}
