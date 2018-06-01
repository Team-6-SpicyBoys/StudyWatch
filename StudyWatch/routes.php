<?php
session_start();

function call($controller, $action) 
{
    // require the file that matches the controller name
    $includeFile = sprintf('%s/controllers/%s.php', APP_PATH, $controller);
    require_once($includeFile);
    // call the function that matches the action name
    call_user_func($action);
}

$controller = "home";
$action = "login";

// check if the controller and action are set
if (isset($_POST['controller']) && isset($_POST['action'])) 
{
    $controller = $_POST['controller'];
    $action = $_POST['action'];
}

// 
if(isset($_SESSION['username']) && $action == 'login')
{
	$action = 'home';
}

if (getUserType() > 0)
{
	// a list of controllers that every logged in person can access
	$allowedControllers = array(
	'home' => array ('home','error'),
	'user' => array ('logout','login'),
	);
	
	if(getUserType() == 2)
	{
		$allowedControllers['course'] = array ('getStudents');
	}
	else if(getUserType() == 3)
	{
		$allowedControllers['studentlist'] = array('showStudents');
	}
}
else
{
	// a list of the controllers we have and their actions we consider "allowed" values
	$allowedControllers = array(
		'home' => array ('login','error'),
		'user' => array ('login','forgotPassword','logout'),
		
	);	
}

//find a way to add 'docentPage' to the allowedControllers only when logged in.
// check that the requested controller and action are both allowed
// if someone tries to access something else (s)he will be redirected to the error action of the pages controller
if (!array_key_exists($controller, $allowedControllers))
{
    call('home', 'error');
}
else if (!in_array($action, $allowedControllers[$controller]))
{
    call('home', 'error');
}
else
{
    call($controller, $action);
}

?>