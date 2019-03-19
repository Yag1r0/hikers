<!DOCTYPE html>
<html>
<head>
	<title>social network</title>
	<link href="css/dashboard.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>
<body>
<nav>
      <span class="brand">Social-network</span>
      <a href="logout.php" style="float:right; margin-right: 2%;margin-top: 16px;">Logout</a>
      <a href="wall.php?username={$username}" style="float:right; margin-right: 2% ">
        <img src="img/user.jpg"/>
        {$username}
      </a>
</nav>
{$message}
    <br>
    <img src="img/{$username}.jpg"/>
    <p>{$name}</p>
    <div class="container">
    <!-- ISCITAVANJE POSTOVA-->
    {section name=i loop=$postsRows}
<div align="center" id="printText">
 <div class="row">
 <div>
     <img src="img/{$postsRows[i].username}.jpg">
     <div id="picture">
     <a href="wall.php?username={$postsRows[i].username}&name={$postsRows[i].username}&lastname={$postsRows[i].lastname}" style="color: black;" id="fullName">
     {$postsRows[i].name}
     {$postsRows[i].lastname}</a>
    <span id="postDate">{$postsRows[i].date}</span>
    </div>
     <div id="postTxt">{$postsRows[i].body}</div><br> 
     <div id="like">like comment</div><div style="width: 30%;
    float: right; font-size: 15px;">{$postsRows[i].privateStatus}</div><!--pokazuje da li je post public ili private (stavljeno samo zbog kontrole koda-->
     </div>
 </div>
 </div>
  {/section}
 </div>
</body>
</html>
