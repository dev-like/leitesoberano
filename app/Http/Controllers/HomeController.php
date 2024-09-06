<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $dados = new AnalyticsController();
      // $analytics = $dados->initializeAnalytics();
      // $response = $dados->getReport($analytics);
      // dd($dados->printResults($response));
      $dadosVisitantes = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7));
      $dadosPaginas = Analytics::fetchMostVisitedPages(Period::days(7));
      $dadosAcessos = Analytics::performQuery(Period::days(30), "ga:organicSearches, ga:pageviews, ga:sessionDuration, ga:percentNewSessions, ga:avgTimeOnPage", [ 'sort' => '-ga:pageviews']);
      $dadosAcessoAnterior = Analytics::performQuery(Period::create(Carbon::now()->subDay(60), Carbon::now()->subDay(30)), "ga:organicSearches, ga:pageviews");
      //dd(json_encode($analyticsData));
      return view('admin.index',['visitantes' => $dadosVisitantes, 'paginas' => $dadosPaginas, 'acessos' => $dadosAcessos, 'acessoAnterior' => $dadosAcessoAnterior]);
      return view('admin.index');
    }
}
