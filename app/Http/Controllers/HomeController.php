<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\Authorizable;

class HomeController extends Controller
{
    use Authorizable;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth:api');
//        dd(auth());
//        dd($this->getMiddleware());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(123);
//        dd( auth()->user());
//        return view('home');
    }
}
