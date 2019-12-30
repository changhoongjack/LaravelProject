<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Charts\SampleChart;
use ConsoleTVs\Charts\Classes\C3\Chart;
use DB;
use App\Content;
use Auth;
use App\children;
use App\downloadRecord;
use View;

class HomeController extends Controller
{

    public function __construct(){
        parent::__construct();
      }

    public function index()
    {

        
        // $countDownloads = downloadRecord::select('languageCode' ,DB::raw('count(*) as count'))
        //                         ->groupBy('languageCode')
        //                         ->orderBy('languageCode', 'ASC')
        //                         ->pluck('count');
        //   dd($countDownloads);


        // $chart1 = new SampleChart;

        // $chart1->labels(['EN', "MS", "TA", "ZH(SIM)", "ZH(TRA)"]);
        // $chart1->dataset('Type of Storybook Genre', 'doughnut',  $countDownloads)->options([
        // 'legend' => 'true',
        // 'fill' => 'true',
        // 'borderColor' => '#666',
        
        //  ]);

//===============================================================================================================================

        // $chart = new SampleChart;

        // $chart->labels(['Fairy Tales', 'Historical Fiction', 'Legends', 'Other', 'Poetry & Drama']);
        // $chart->dataset('Type of Storybook Genre', 'bar',  $countGenre)->options([
        // 'fill' => 'true',
        // 'borderColor' => '#51C1C0'
        
        // ]);




        $contentcounts = [ 
            [     
            'number' => Content::where('status', 'Published' )->count() ],

        ];

        $readercount = children::all()->count();

         $downloadcount = downloadRecord::all()->count();

      

        $id = Auth::user()->name;

        return view('home',compact('contentcounts', 'id', 'readercount', 'downloadcount'));
    }
}
