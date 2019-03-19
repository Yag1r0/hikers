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
    $name = $row['name'] ." " .$row['lastname'];
    
    // select postova
$sql2 = "SELECT posts.id,
        users.uid,
        posts.userId,
        posts.privateStatus,
        posts.date,
        users.name,
        users.username,
        users.lastname,
        posts.body FROM posts INNER JOIN users ON posts.userId=users.uid
        WHERE users.uid='".$row['uid']."' ORDER BY posts.id DESC";
    $result = $conn->query($sql2);
    $postsRows = [];
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //save users and posts in this variable
            $postsRows[] = $row;
        }
    } else {
        $postMessage = "Trenutno nema podataka u bazi";
    }
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

$smarty->assign(
    'name',
     $name
);

$smarty->assign(
    'postsRows',
     $postsRows
);

/* end send request */
$smarty->display('wall.tpl');
?>