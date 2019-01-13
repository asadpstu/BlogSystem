<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Blog;

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
        $loggedInAs = Auth::user()->register_as;
        if($loggedInAs == "Salesman")
        {
          return redirect('/blog');  
  
        }
        if($loggedInAs == "Customer")
        {
          return view('customerDashboard');   
        }
        
    }
}
