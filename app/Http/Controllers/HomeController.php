<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Blog;
use App\Follow;

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
          $blogList = Blog::paginate(5);
          if(sizeof($blogList) >= 1)
          {
            return view('customerDashboard',compact('blogList')); 
          }
          return view('customerDashboard');   
        }
        
    }


    public function show($id,$bloggerId)
    {
        $blogList = Blog::where('bloggerId',$bloggerId)->where('id','!=',$id)->select('id','title','bloggerId')->orderBy('id','DESC')->get();
        $blogDetails = Blog::where('id',$id)->first();
        $checkFollow = Follow::where('customerId',Auth::user()->id)->where('blogger',$bloggerId)->count();
        if($checkFollow == 1)
        {
            $follow = "TRUE";
        }
        else
        {
            $follow = "FALSE";
        }
        return view('blogDetails',compact('blogDetails','blogList','follow')); 
    }

    public function follow(Request $request)
    {
        $follow = new Follow();
        $follow->customerId = $request->customer;
        $follow->blogger = $request->blogger;
        $follow->save();

    }

    public function unfollow(Request $request)
    {
        $customer = $request->customer;
        $blogger = $request->blogger;

        Follow::where('customerId',$customer)->where('blogger',$blogger)->delete();

    }    
}
