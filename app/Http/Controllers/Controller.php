<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use View;
use App\Charts\SampleChart;
use ConsoleTVs\Charts\Classes\C3\Chart;
use DB;
use App\Content;
use App\downloadRecord;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {

        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];
        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];

        $countDownloads = downloadRecord::select('languageCode' ,DB::raw('count(*) as count'))
                                ->groupBy('languageCode')
                                ->orderBy('languageCode', 'ASC')
                                ->pluck('count');


        $chart1 = new SampleChart;

        $chart1->labels(['EN', "MS", "TA", "ZH(SIM)", "ZH(TRA)"]);
        $chart1->dataset('Type of Storybook Genre', 'bar',  $countDownloads);

                
                
                







        $countGenre = Content::select('storybookGenre', DB::raw('count(*) as count'))
        ->groupBy('storybookGenre')
        ->orderBy('storybookGenre', 'ASC')
        ->pluck('count'); 

        $chart = new SampleChart;

        $chart->labels(['Fairy Tales', 'Historical Fiction', 'Legends', 'Other', 'Poetry & Drama']);
        $chart->dataset('Type of Storybook Genre', 'bar',  $countGenre)
                ->backgroundColor($fillColors)
                ->color($borderColors);
                


        View::share ('chart', $chart);
        View::share ('chart1', $chart1);



    }
}
