<?php
/*********************************************/
/**initial settings for the smarty tpl engine*/
/*********************************************/
require_once("smarty/smarty/libs/Smarty.class.php");

$smarty = new Smarty();
$smarty->template_dir = 'views';
$smarty->compile_dir = 'tmp';
//initial variable definition
$wrongPassword = "";
//end initial nsettings

/*********************************************/
/**database connection and session start******/
/*********************************************/
session_start();
include("config/config.php");

if(empty($_SESSION['user'])) {
    header('Location: index.php');
}

$username = $_SESSION['user'];
$userId = $_SESSION['uid'];
$lastname = $_SESSION['lastname'];
$name = $_SESSION['name'] ." " .$_SESSION['lastname'];


// Create connection
$conn = new mysqli(SERVER, USER ,PASS, DB);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//end database connection settings

/******************************************/
/**succesifull inserted post or not********/
/******************************************/

$postMessage = '';
$postSuccessMessage = '';

//kod za unos podataka u bazu
if(!empty($_POST["submit"])){
$postBody = $_POST["post_body"];
$privacy = $_POST["privacy"];
$date = date("d/m/Y H:i:s");
$userId = $_SESSION['uid'];

$sqlInsert = "INSERT INTO posts(id, body, date, userId, privateStatus) VALUES (null, '".$postBody."', '".$date."', '".$userId."','".$privacy."')";
$resultInsert = $conn->query($sqlInsert);
if ($resultInsert === true) {
    $postSuccessMessage = "Vas post je uspesno unet!";
} else {
    $postSuccessMessage = "Imate gresku u konekciji".$conn->error ;
}
};
//end of insert post code

/***********************************************/
/**give me posts and the users******************/
/***********************************************/

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
        WHERE privateStatus = 'public' OR users.uid='".$userId."' ORDER BY posts.id DESC";
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
$conn->close();
//end of defining variables,
//now we need to send them to template

/**********************************************/
/**send those variables to a our template dashboard.tpl*/
/**********************************************/
$smarty->assign(
    'username',
     $username
);
$smarty->assign(
    'name',
     $name
);

$smarty->assign(
    'postSuccessMessage',
     $postSuccessMessage
);

$smarty->assign(
    'postMessage',
     $postMessage
);
/* end send request */

$smarty->assign(
    'postsRows',
     $postsRows
);
$smarty->display('dashboard.tpl');
?>
