<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\CovidChart;
use Illuminate\Support\Facades\Http;

class CovidController extends Controller
{
    public function index()
    {
        $api = Http::get('https://services5.arcgis.com/VS6HdKS0VfIhv8Ct/arcgis/rest/services/COVID19_Indonesia_per_Provinsi/FeatureServer/0/query?f=json&where=(Kasus_Posi%20%3C%3E%200)%20AND%20(Provinsi%20%3C%3E%20%27Indonesia%27)&returnGeometry=false&spatialRel=esriSpatialRelIntersects&outFields=*&orderByFields=Kasus_Posi%20desc&resultOffset=0&resultRecordCount=34&cacheHint=true');
        $hasil = $api->json();
        $data = collect($hasil['features']);
        $labels = $data->flatten(1)->pluck('Provinsi');
        $dataku   = $data->flatten(1)->pluck('Kasus_Posi');
        $colors = $labels->map(function($item) {
            return $rand_color = '#' . substr(md5(mt_rand()), 0, 6);
        });
        $chart = new CovidChart;
        $chart->labels($labels);
        $chart->dataset('Kasus Positif', 'pie', $dataku)->backgroundColor($colors);;
        return view('corona', [
            'chart' => $chart,
        ]);
    }
}
