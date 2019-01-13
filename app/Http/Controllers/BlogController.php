<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
          $blogList = Blog::where('bloggerId',$bloggerId)->select('id','title')->orderBy('id','DESC')->get();
          if(sizeof($blogList) >= 1)
          {
            return view('salesDashboard',compact('blogList'));  
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
        $blogList = Blog::where('bloggerId',$bloggerId)->select('id','title')->orderBy('id','DESC')->get();
        $blogDetails = Blog::where('id',$id)->first();
        return view('salesDashboard',compact('blogDetails','blogList'));  
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
}
