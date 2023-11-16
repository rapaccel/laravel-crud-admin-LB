<?php

namespace App\Http\Controllers;

use App\Models\KIA;
use App\Models\Ektp;
use Illuminate\Http\Request;
use App\Models\AktaKelahiran;
use App\Models\KartuKeluarga;

class DashboardController extends Controller
{
    public function index(Request $request){
        $data = AktaKelahiran::getDataAktaKelahiran();
        $kk=KartuKeluarga::getDataKk();
        $kia=KIA::getDataKia();
        $ktp=Ektp::getDataEktp();
        $successktp = $ktp['success'];
        $successdata = $data['success'];
        $successkia = $kia['success'];
        $successkk = $kk['success'];
        $message1 = $ktp['message'];
        $total1 = $successdata ? count($data['result']) : 0;
        $totalkk = $successkk ? count($kk['result']) : 0;
        $totalkia = $successkia ? count($kia['result']) : 0;
        $totalktp = $successktp ? count($ktp['result']) : 0;
        return view('admin.dashboard',[
            'page'=>"dashboard",
            'subpage'=>'dashboard',
            'statusktp' => $successktp ? 'success' : 'false',
            'statuskk' => $successkk ? 'success' : 'false',
            'statuskia' => $successkia ? 'success' : 'false',
            'statusakta' => $successdata ? 'success' : 'false',
            'title'=>'Dashboard',
            'data1'=>$total1,
            'kk'=>$totalkk,
            'kia'=>$totalkia,
            'ktp'=>$totalktp,
        ]);
    }
}
