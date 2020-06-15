<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TeacherController extends Controller
{
	public function left(){
     $query="SELECT tr.name as teacher_name,tr.id as teacher_id,count(tuto.id) as total_tutorials,(CASE WHEN count(tuto.id)<4 THEN 'Armature' ELSE 'Genius' END)as type from teachers as tr left join tutorials as tuto on tr.id=tuto.created_by where tr.creator=1 GROUP BY tuto.created_by ";
     $teachers=DB::select($query);
     return view('teachers_view',compact('teachers'));
 }

 public function right(){
 			 $query="SELECT tr.name as teacher_name,tr.id as teacher_id,count(tuto.id) as total_tutorials,(CASE WHEN count(tuto.id)<4 THEN 'Armature' ELSE 'Genius' END)as type from teachers as tr right join tutorials as tuto on tr.id=tuto.created_by GROUP BY tuto.created_by ";
     $teachers=DB::select($query);
     return view('teachers_view',compact('teachers'));	
 }

 public function complecate(){
 			 $query="SELECT tr.name as teacher_name,tr.id as teacher_id,count(tuto.id) as total_tutorials,(CASE WHEN count(tuto.id)<4 THEN 'Armature' ELSE 'Genius' END)as type,SUM(tv.static_view) as static_views,SUM(tv.unique_view) as unique_views,sub.name as subject from teachers as tr join tutorials as tuto on tr.id=tuto.created_by join tutorial_views as tv on tuto.id=tv.id join subjects as sub on tuto.subject_id=sub.id where tr.creator=3 GROUP BY sub.id ";
 	 $tutors=DB::select($query);
     return view('teachers_view',compact('tutors'));	
 }
}
