<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InfoController extends Controller
{
    public function index()
    {
        $arr = [];
        // $response = Http::get('https://api.kawalcorona.com/indonesia/provinsi');
        // $data = $response->json();
        // $sum1 = 0;
        // $sum2 =0;
        // $sum3 = 0;
        // foreach($data as $row){
        //     $positif = $row['attributes']['Kasus_Posi'];
        //     $meninggal = $row['attributes']['Kasus_Meni'];
        //     $sembuh = $row['attributes']['Kasus_Semb'];
        //     $sum1 += $positif;
        //     $sum2 += $meninggal;
        //     $sum3 += $sembuh;
        // }
        $apitotal = Http::get('https://services5.arcgis.com/VS6HdKS0VfIhv8Ct/arcgis/rest/services/Statistik_Perkembangan_COVID19_Indonesia/FeatureServer/0/query?f=json&where=1%3D1&returnGeometry=false&spatialRel=esriSpatialRelIntersects&outFields=*&outStatistics=%5B%7B%22statisticType%22%3A%22sum%22%2C%22onStatisticField%22%3A%22Jumlah_Kasus_Baru_per_Hari%22%2C%22outStatisticFieldName%22%3A%22value%22%7D%5D&cacheHint=true');
        $apitotal = $apitotal->json();
        $total = $apitotal['features'];
        $api = Http::get('https://services5.arcgis.com/VS6HdKS0VfIhv8Ct/arcgis/rest/services/COVID19_Indonesia_per_Provinsi/FeatureServer/0/query?f=json&where=(Kasus_Posi%20%3C%3E%200)%20AND%20(Provinsi%20%3C%3E%20%27Indonesia%27)&returnGeometry=false&spatialRel=esriSpatialRelIntersects&outFields=*&orderByFields=Kasus_Posi%20desc&resultOffset=0&resultRecordCount=34&cacheHint=true');
        $hasil = $api->json();
        $data = $hasil['features'];
        return view('index',['data'=>$data,'total'=>$total]);
    }
}
