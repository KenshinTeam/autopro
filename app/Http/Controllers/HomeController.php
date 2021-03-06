<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vps;
use App\Models\Website;

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
        $users = \DB::connection('mysql2')->select('select count(*) as user, sum(count_pin) as pin from users');
        $vps = Vps::count();
        $website = Website::count();

        return view('home', compact(['users', 'vps', 'website']));
    }
}
