<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
	public function users_datas(){
    $query="SELECT ur.name as user_name,ur.id as user_id,count(posted.title) as total_posts,(CASE WHEN count(posted.id)<4 THEN 'Armature' ELSE 'Genius' END)as type from users as ur join posts as posted ON ur.id=posted.user_id  group by posted.user_id";
    $join_datas=DB::Select($query);
    return view('users_view',compact('join_datas'));
}
}
