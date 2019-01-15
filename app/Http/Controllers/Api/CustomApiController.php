<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Follow;
use App\User;

class CustomApiController extends Controller
{
    public function followerList(Request $request)
    {
        header('Access-Control-Allow-Origin: *');
        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
        ];
        header('Content-type: application/json');

        $email   = $request->input('email');
		$bloggerid  = User::where('email', $email)->select('id')->first();
        $id = $bloggerid->id;
        
        /* In Details way start
        =======================*/
        $selectFollower = DB::select( DB::raw("SELECT GROUP_CONCAT(DISTINCT customerId ORDER BY id) as 'all' FROM follows where blogger = $id ") );
        $data = $selectFollower[0]->all;
        $count = count(explode(',', $data));
        $id_list = "[".$data."]";
        $findEmail = json_decode($id_list, true);
        $followerList = DB::table('users')->whereIn('id', $findEmail)->select('email')->get();
        /* In Details way end
        =======================*/        

        /* In short way Start
        ========================
        $count = Follow::where('blogger',$id)->count();
        $followerList = DB::select( DB::raw("SELECT GROUP_CONCAT((select email from users where id=`follows`.`customerId` LIMIT 1) ORDER BY id) as 'all' FROM follows where blogger = $id") );
        ========================
        In short way end */
        


                $response = array();
                $response = array
                (
                    'success' => 'True',
                    'followers' => $followerList,
                    'count'=> $count
                );

                return $response; 

    }

    public function CommonFollower(Request $request)
    {
        header('Access-Control-Allow-Origin: *');
        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
        ];
        header('Content-type: application/json');  
        $result = '';
        $users   = $request->input('users');
  
        $userIds = DB::table('users')
                             ->whereIn('email', $users )
                             ->where('register_as','Salesman')
                             ->pluck('id');
        $count = count($userIds);                   
        foreach ($userIds as $single) 
        {
            $result .= $single.",";
        }
        $result = trim($result,",");
        /*In details Query Description
        $result  = Getting Users as comma separated value
        $selectFollower = It will give us common follower list of the Query Email id.

Follow Table 
==================================================
customerId     blogger(Primary id of `user` table)
==================================================
   2           1  (hmasad09@gmail.com) 
   3           1  (hmasad09@gmail.com)    
   2           6  (rajesh@gmail.com) 
   3           6  (rajesh@gmail.com)    
   2           5  (kedar@gmail.com)

If we Search by 
{
  "users":
    [
      "hmasad09@gmail.com",
      "rajesh@gmail.com"
    ]
}   
  
==========================================
Output : 
{
    "Success": "True",
    "Users": [
        "hmasad09@gmail.com",
        "rajesh@gmail.com"
    ],
    "Followers": [
        {
            "customerId": 2,
            "email": "zaman@gmail.com"
        },
        {
            "customerId": 3,
            "email": "kutub@gmail.com"
        }
    ],
    "Count": 2
}

===========================================

                  
        Common in both email */ 
        if($count >=1)
        {
        //Short code as expected Output
        $selectFollower = DB::select( DB::raw("SELECT customerId,(select email from users where id=`customerId` limit 1) as 'email' FROM (SELECT COUNT(customerId) as common, customerId FROM `follows` where blogger in ($result) group by customerId) AS ab WHERE ab.common = $count") );                 
        $commonUserNumber = count($selectFollower);            
        

                $response = array();
                $response = array
                (
                    'Success' => 'True',
                    'Users'  => $users,
                    'Followers' => $selectFollower,
                    'Count'=> $commonUserNumber
                );

            return $response;
        }
        else
        {
                $response = array();
                $response = array
                (
                    'Success' => 'True',
                    'Status Code' => '412,Precondition Failed!',
                    'Users'  => "Enter Valid User",
                    'Followers' => "No Follower Found",
                    'Count'=> 0
                );

            return $response;            
        }    
               
    }


    public function block(Request $request)
    {
        header('Access-Control-Allow-Origin: *');
        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
        ];
        header('Content-type: application/json');
        $success ="False";
        $user     = $request->input('user');
        $author   = $request->input('author');

        $userid   = User::where('email',$user)->where('register_as','Customer')->select('id')->first();
        $authorid = User::where('email',$author)->where('register_as','Salesman')->select('id')->first();
        
        if(empty($userid ))
        {
          $user_validity ="Invalid"; 
        }
        else
        {
          $user_validity ="Valid";   
          $userid =  $userid->id; 
        }
        
        if(empty($authorid))
        {
          $author_validity ="Invalid";
        }
        else
        {
          $author_validity ="Valid";    
          $authorid =  $authorid->id; 
        }
        
        if($author_validity != "Valid" || $user_validity != "Valid")
        {
            $status = "Invalid Request";
        }

        if(!empty($userid) && !empty($authorid))
        {
           $block = Follow::where('customerId',$userid)->where('blogger',$authorid)->first();
           if(!empty($block))
           {
               $block->hasRestriction = 1;
               if($block->save())
               {
                 $status = "User Blocked";
                 $success = "True";
               }
            }   
           else
           {
             $success = "False";
             $status = "Request valid but cann't Block User at this moment!";
           }

           
        }

        $response = array();
            $response = array
            (
                'Success' => $success,
                'User'  =>  $user_validity,
                'Author' => $author_validity,
                'Status' => $status
            );

            return $response; 

    }


    public function unread(Request $request)
    {
        header('Access-Control-Allow-Origin: *');
        $headers = [
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization'
        ];
        header('Content-type: application/json');
        $success ="False";
        $listOfTitle = "Invalid";
        $user     = $request->input('user');
        $author   = $request->input('author');
        $userid   = User::where('email',$user)->where('register_as','Customer')->select('id')->first();
        $authorid = User::where('email',$author)->where('register_as','Salesman')->select('id')->first();
        
        if(empty($userid ))
        {
          $user_validity ="Invalid"; 
        }
        else
        {
          $user_validity ="Valid";   
          $userid =  $userid->id; 
        }
        
        if(empty($authorid))
        {
          $author_validity ="Invalid";
        }
        else
        {
          $author_validity ="Valid";    
          $authorid =  $authorid->id; 
        }
        
        if($author_validity != "Valid" || $user_validity != "Valid")
        {
            $status = "Invalid Request";
        }
        if(!empty($userid) && !empty($authorid))
        {
           $success = "True";
           //Array of Read Blog by Customer/User 
           $readByUser = DB::select( DB::raw("SELECT GROUP_CONCAT(DISTINCT blogId ORDER BY id) as 'all' FROM blog_views where customerId = $userid ") );
                $dataByUser = $readByUser[0]->all;
                $blogIdList = $dataByUser;

 
           //Array of Created Blog by Sales Person / Author    
           $postByAuthor = DB::select( DB::raw("SELECT GROUP_CONCAT(DISTINCT id ORDER BY id) as 'allblog' FROM blogs where bloggerId = $authorid ") );
                $postByAuthor = $postByAuthor[0]->allblog;
                $blogIdLists = $postByAuthor;
            $data1 = explode(',', $blogIdList);
            $data2 = explode(',', $blogIdLists);
            
            //Getting Unread Blog 
            $unread = array_diff($data2,$data1);

            $listOfTitle = Blog::whereIn('id',$unread)->select('title')->get();
            if(count($listOfTitle) < 1)
            {
                $listOfTitle ="All blogs viewed By the User";
            }
           
        }

        $response = array();
            $response = array
            (
                'Success' => $success,
                'User'  =>  $user_validity,
                'Author' => $author_validity,
                'Blogs' => $listOfTitle
            );
        return $response;
    }
}
