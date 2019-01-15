<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Follow;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $bloggerId = Auth::user()->id;
        $follower = "";
        $follower = DB::table('users')
            ->join('follows', 'users.id', '=', 'follows.customerId')
            ->select('users.name', 'follows.id','follows.hasRestriction')
            ->where('blogger',$bloggerId)
            ->get();
 
        $blogList ="";
        $blogList = Blog::where('bloggerId',$bloggerId)->select('id','title')->orderBy('id','DESC')->get();
        $blogListOtherAuthor = "";
        $blogListOtherAuthor = Blog::where('bloggerId','!=', $bloggerId)->paginate(5);
        if(sizeof($blogList) >= 1 || sizeof($blogListOtherAuthor))
          {
            return view('salesDashboard',compact('blogList','blogListOtherAuthor','follower'));  
          }



          return view('salesDashboard');  
          

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validation = Validator::make($request->all(), [
            'title' => 'required|min:10',
            'blogContent' => 'required',
        ]);

        if($validation->fails())
        {
            return redirect()->back()->withErrors($validation);
        }
        else
        {        
            $storeBlog = new Blog();
            $storeBlog->bloggerId = $request->bloggerId;
            $storeBlog->title = $request->title;
            $storeBlog->blogDescription = $request->blogContent;
            $storeBlog->save();
            return back()->withAlert('Success :: Blog Posted Successfully');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bloggerId = Auth::user()->id;
        $follower = "";
        $follower = DB::table('users')
            ->join('follows', 'users.id', '=', 'follows.customerId')
            ->select('users.name', 'follows.id','follows.hasRestriction')
            ->where('blogger',$bloggerId)
            ->get();
        $blogList = Blog::where('bloggerId',$bloggerId)->select('id','title')->orderBy('id','DESC')->get();
        $blogDetails = Blog::where('id',$id)->first();

        $blogListOtherAuthor = "";
        $blogListOtherAuthor = Blog::where('bloggerId','!=', $bloggerId)->paginate(5);

        return view('salesDashboard',compact('blogDetails','blogList','follower','blogListOtherAuthor'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try
            {
                $user = Blog::findOrFail($request->bloggId);
                $user->title = $request->title;
                $user->blogDescription = $request->blogContent;
                $user->save();
                return back()->withAlert('Success :: Blog Updated Successfully');
            }
            
        catch(ModelNotFoundException $e)
            {
                //Do nothing
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }

    public function unfollow(Request $request)
    {
       $id = $request->id;
       $hasRestriction = $request->hasRestriction;
       if($hasRestriction == 0)
       {
        $value = 1;
       }
       else
       {
        $value = 0;
       }
         $restrict = Follow::findOrFail($id);
         $restrict->hasRestriction = $value;
         $restrict->save();

         return "success";

    }


    public function api()
    {
        return view('apiDashboard');         
    }


}
