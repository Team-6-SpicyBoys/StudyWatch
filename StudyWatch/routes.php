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
$allowedControllers = [];

// check if the controller and action are set
if (isset($_POST['controller']) && isset($_POST['action']))
{
    $controller = $_POST['controller'];
    $action = $_POST['action'];
}

if (getUserType() > 0)
{
	// a list of controllers that every logged-in person can access
	$allowedControllers = array(
	'home' => array ('home','error',),
	'user' => array ('logout','login','setCurrentCourse', 'aanmelden'),
	);

	if(getUserType() == 1)
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

	$allowedControllers = array(
		'home' => array ('login','error'),
		'user' => array ('login','forgotPassword','logout')

	);
}

if(getUserType() < 3 && getUserType() >0&& $action == 'login')
{
	$controller = 'home';
	$action = 'home';
}

if(getUserType() == 3 && $action == 'login')
{
	$controller ='studentlist';
	$action='showStudents';
}

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
