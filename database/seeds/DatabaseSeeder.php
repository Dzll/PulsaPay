<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use App\Transaksi;
use App\PulsaData;
use App\User;
use App\PayData;
use App\PulsaPay;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);

        // $transaksi = new Transaksi();
        // $transaksi->id_user = 2;
        // $transaksi->id_pulsa = 2;
        // $transaksi->nohp_beli = '0887667662';
        // $transaksi->nama_user = 'Dzul';
        // $transaksi->jumlah_pulsa = '5000';
        // $transaksi->harga_pulsa = '5400';
        // $transaksi->save();

        // $transaksi = new Transaksi();
        // $transaksi->id_user = 1;
        // $transaksi->id_pulsa = 2;
        // $transaksi->nohp_beli = '0887667662';
        // $transaksi->nama_user = 'Dzul';
        // $transaksi->jumlah_pulsa = '10000';
        // $transaksi->harga_pulsa = '11000';
        // $transaksi->save();

        // $transaksi = new Transaksi();
        // $transaksi->id_user = 1;
        // $transaksi->id_pulsa = 2;
        // $transaksi->nohp_beli = '0887667662';
        // $transaksi->nama_user = 'Dzul';
        // $transaksi->jumlah_pulsa = '10000';
        // $transaksi->harga_pulsa = '11000';
        // $transaksi->save();

        // $transaksi = new Transaksi();
        // $transaksi->id_user = 1;
        // $transaksi->id_pulsa = 2;
        // $transaksi->nohp_beli = '0887667662';
        // $transaksi->nama_user = 'Dzul';
        // $transaksi->jumlah_pulsa = '5000';
        // $transaksi->harga_pulsa = '5400';
        // $transaksi->save();

        // $transaksi = new Transaksi();
        // $transaksi->id_user = 2;
        // $transaksi->id_pulsa = 2;
        // $transaksi->nohp_beli = '0887667662';
        // $transaksi->nama_user = 'Dzul';
        // $transaksi->jumlah_pulsa = '5000';
        // $transaksi->harga_pulsa = '5400';
        // $transaksi->save();

        $pulsa = new PulsaData();
        $pulsa->jumlah_pulsa = '5000';
        $pulsa->masa_aktif = 'masa aktif 7 hari';
        $pulsa->harga_pulsa = '5500';
        $pulsa->save();

        $pulsa = new PulsaData();
        $pulsa->jumlah_pulsa = '10000';
        $pulsa->masa_aktif = 'masa aktif 15 hari';
        $pulsa->harga_pulsa = '11000';
        $pulsa->save();

        $pulsa = new PulsaData();
        $pulsa->jumlah_pulsa = '20000';
        $pulsa->masa_aktif = 'masa aktif 20 hari';
        $pulsa->harga_pulsa = '20500';
        $pulsa->save();

        $pulsa = new PulsaData();
        $pulsa->jumlah_pulsa = '25000';
        $pulsa->masa_aktif = 'masa aktif 30 hari';
        $pulsa->harga_pulsa = '24900';
        $pulsa->save();
		
		$pulsa = new PulsaData();
        $pulsa->jumlah_pulsa = '30000';
        $pulsa->masa_aktif = 'masa aktif 30 hari';
        $pulsa->harga_pulsa = '31000';
        $pulsa->save();

        // $pulsapay = new PulsaPay();
        // $pulsapay->id_pulsapay = '1';
        // $pulsapay->nominal_pay = 100000;
        // $pulsapay->id_user = '3';
        // $pulsapay->save();

        // $paydata = new PayData();
        // $paydata->id_pay = '2';
        // $paydata->nominal_pay = 50000;
        // $paydata->id_user = '3';
        // $paydata->save();

    }
}
