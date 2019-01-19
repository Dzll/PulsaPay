<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PulsaData;
use App\User;
use App\Transaksi;
use App\PayData;
use App\PulsaPay;
use Auth;
use PHPMailer\PHPMailer;

class ApiController extends Controller
{
    public function dataPulsa()
    {
        $pulsa =  PulsaData::all();
        return $pulsa->toArray();
    }
    public function singledatapulsa($id)
    {
        $pulsa = PulsaData::find($id);
        return $pulsa->toArray();
    }
    public function dataTransaksi($id_user)
    {
        //$trans = Transaksi::all();
        $trans = Transaksi::where('id_user', '=', $id_user)->orderBy('id_transaksi', 'desc')->get();
        return $trans->toArray();
    }
    public function loginuser(Request $request, User $user)
    {
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
        {
            $users = $user->find(Auth::user()->id);
            return response()->json(['status'=>200,'message'=>'OK','id'=>$users->id,'name'=>$users->name, 'no_hp'=>$users->no_hp, 'email'=>$users->email]);
        }else {
            return response()->json(['status'=>401,'message'=>'Unauthorized']);
        }   
    }
    public function regisuser(Request $request, User $user, PulsaPay $pulsapay)
    {
        $user = $user->create([
            'name' => $request->nama,
            'no_hp' => $request->telepon,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => bcrypt($request->email)
        ]);

        $pulsapay->nominal_pay = 0;
        $pulsapay->id_user = $user->id;
        $pulsapay->save();
        
    }
    public function transaksiadd(Request $request, Transaksi $transaksi)
    {
        $transaksi = $transaksi->create([
            'id_user' => $request->id_user,
            'nama_user' => $request->nama_user,
            'nohp_beli' => $request->nohp_beli,
            'id_pulsa' => $request->id_pulsa,
            'jumlah_pulsa' => $request->jumlah_pulsa,
            'harga_pulsa' => $request->harga_pulsa,
            'operator' => $request->operator,
            'status' => '1'
        ]);
        
    }
    public function paydata($id_user)
    {
        $paydata = PayData::where('id_user', '=', $id_user)->orderBy('id_pay', 'desc')->get();
        return $paydata->toArray();
    }

    public function payadd(Request $request, PayData $paydata, PulsaPay $pulsapay)
    {

        $paydata = $paydata->create([
            'nominal_pay' => $request->nominal_pay,
            'id_user' => $request->id_user,
            'status' => '0'
        ]);

    }
    public function pulsapay($id_user)
    {
        $pulsapay = PulsaPay::where('id_user', '=', $id_user)->get();
        return $pulsapay->toArray();

    }
    public function payUp(Request $request)
    {
        $sisa = (int)$request->nominal_pay - (int)$request->pulsabayar;
        $pay = PulsaPay::where('id_pulsapay', $request->id_pulsapay)->update(array('nominal_pay'=>$sisa));
    }



    // Admin Control Panel
    public function trans()
    {
        $trans = Transaksi::orderBy('id_transaksi', 'desc')->get();
        return $trans->toArray();
    }
    public function user()
    {
        $user = User::all();
        return $user->toArray();
    }
    public function topup()
    {
        $topup = PayData::orderBy('id_pay', 'desc')->get();
        return $topup->toArray();
    }
    public function UpTopup(Request $request)
    {
        $nom = $request->nominal_pay;
        $idius = $request->id_user;
        $idip = $request->id_pay;

        $pulsapay = PulsaPay::where('id_user', '=', $idius)->firstOrFail();
        $hasil = $pulsapay->nominal_pay + $request->nominal_pay;
        $pulsap = PulsaPay::where('id_user', $idius)->update(array(
            'nominal_pay'=>$hasil
        ));

        $paydat = PayData::where('id_pay', $idip)->update(array(
            'status'=>'1'
        ));
        //return $pulsapay;
    }


    public function transUpPost(Request $request)
    {
        $trans = Transaksi::where('id_transaksi', $request->id_transaksi)->update(array('status'=>'2'));
    }
    public function pulsaadd(Request $request, PulsaData $pulsadata)
    {
        $pulsadata = $pulsadata->create([
            'jumlah_pulsa' => $request->jumlah_pulsa,
            'masa_aktif' => $request->masa_aktif,
            'harga_pulsa' => $request->harga_pulsa
        ]);
    }
    public function pulsaedit(Request $request)
    {
        $pulsa = PulsaData::where('id_pulsa', '=', $request->id_pulsa)->firstOrFail();
        $pulsadata = PulsaData::where('id_pulsa', $request->id_pulsa)->update(array(
            'masa_aktif' => $request->masa_aktif,
            'jumlah_pulsa' => $request->jumlah_pulsa,
            'harga_pulsa' => $request->harga_pulsa
        ));
        // $pulsadata->save();

    }


}
