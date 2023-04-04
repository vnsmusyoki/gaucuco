<?php

namespace App\Http\Controllers;

use App\Models\DrivingVisitor;
use App\Models\HouseRental;
use App\Models\Owner;
use App\Models\WalkininCustomer;
use App\Models\Watchmen;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $watchmen = Watchmen::all();
        $owners = Owner::all();
        $wcustomers= WalkininCustomer::all();
        $dcustomers = DrivingVisitor::all();
        $rentals = HouseRental::all();
        $visitors = $wcustomers->count() + $dcustomers->count();
        $total = $watchmen->count() + $owners->count() + $wcustomers->count() + $dcustomers->count();
        return view('home', compact('watchmen', 'total','owners', 'rentals','visitors'));
    }
}
