<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Library\SentryUtils;

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
      $user = auth()->user();
      $sentry = new SentryUtils($user);


      $variables = [
        'menu_ListofPharmaceuticalProducts' => $sentry->hasAccessToFeature('/ADMINISTRATOR'),
        'sentry_count' => $sentry->getTotalRows()
        ];

       return view('welcome',$variables);
    }
}
