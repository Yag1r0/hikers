<?php
/*********************************************/
/**initial settings for the smarty tpl engine*/
/*********************************************/
require_once("smarty/smarty/libs/Smarty.class.php");

$smarty = new Smarty();
$smarty->template_dir = 'views';
$smarty->compile_dir = 'tmp';

include("config/config.php");
// Create connection
$conn = mysqli_connect(SERVER, USER ,PASS, DB);
//end database connection


/******************************************/
/**getting users username******************/
/******************************************/
$message = '';
 
if(!empty($_GET["username"])){
	$username = $_GET["username"];
	$sql3 = "SELECT * FROM users WHERE username = '$username'";
	$result = $conn->query($sql3);
	$row = mysqli_fetch_assoc($result);
	
} 
//end of getting users username code
	$message ="Hello" ." " .$username."!";

$conn->close();

/**********************************************/
/**send those variables to a our template wall.tpl*/
/**********************************************/
$smarty->assign(
    'username',
     $username
);

$smarty->assign(
    'message',
     $message
);

/* end send request */
$smarty->display('wall.tpl');
?>