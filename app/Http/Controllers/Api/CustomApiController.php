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
        

            header('Access-Control-Allow-Origin: *');
            header('Content-type: application/json');
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

    }
}
