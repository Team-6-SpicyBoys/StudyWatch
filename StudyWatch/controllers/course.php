<?php

function getStudents()
{
	require_once(APP_PATH.'/views/students.php');
}

function getCourses()
{
	global $connection;

	$sql = "SELECT name FROM subject";

	$co = $connection->query($sql);

	foreach($co as $course)
	{
		echo '<li class="nav-item">';
			echo '<a id="vak1" href="#" class="nav-link ">';
					  
			echo'<i class="fa fa-book-open nav-icon"></i>';
			echo'<p name="clickable">' . $course['name'] . '</p>';
			echo'</a>';
		echo'</li>';
	}
}


?>