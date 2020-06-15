<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Teaches View</title>
</head>
<body>
	<?php  
	$datas=array();
	$teacher_ary=array();
	$tuto_title=array();
	if(!empty($teachers)){
		foreach ($teachers as $teacher) {
			// dd($teachers);
			$teacher_ary=array('id'=>$teacher->teacher_id,'teacher_name'=>$teacher->teacher_name,'total_tutorials'=>$teacher->total_tutorials,'type'=>$teacher->type);
			array_push($datas,$teacher_ary)."<br>";		
      }
      $data_ary=$datas;
      // echo "<pre>".print_r($datas)."</pre>";
      echo '<pre>',print_r($data_ary,1),'</pre>';
  }

  	if(!empty($tutors)){
  		dd($tutors);
		foreach ($tutors as $tutor) {
			$tutor_ary=array('id'=>$tutor->teacher_id,'tutor_name'=>$tutor->teacher_name,'subject_name'=>$tutor->subject,'total_tutorials'=>$tutor->total_tutorials,'static_views'=>$tutor->static_views,'unique_views'=>$tutor->unique_views,'type'=>$tutor->type);
			array_push($datas,$tutor_ary)."<br>";		
      }
      // echo "<pre>".print_r($datas)."</pre>";
      echo '<pre>',print_r($datas,1),'</pre>';
  }
	?>
</body>
</html>