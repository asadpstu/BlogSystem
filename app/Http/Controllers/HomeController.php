<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Blog;
use App\Follow;
use Illuminate\Support\Facades\DB;

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
        $customerId = Auth::user()->id;
        if($loggedInAs == "Salesman")
        {
          return redirect('/blog');  
  
        }
        if($loggedInAs == "Customer")
        {
          $findRestrictBlogger = DB::select( DB::raw("SELECT GROUP_CONCAT(DISTINCT blogger ORDER BY id) as 'all' FROM follows where customerId = $customerId and hasRestriction=1 ;") );
          
          $data = $findRestrictBlogger[0]->all;
          $id_list = "[".$data."]";
          $RestrictBlogger = json_decode($id_list, true);
          $blogList = Blog::whereNotIn('bloggerId', $RestrictBlogger)->paginate(5);
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
        $initial = $blogDetails->like;
        $updateView = Blog::findOrFail($id);
                $updateView->like = $initial + 1;
                $updateView->save();

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
