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
        <img src="img/user.jpg" />
        {$name}
      </a>
    </nav>
	    <div align="center" id="insertPost">
	        <img src="img/profile.gif"/>
            <a href="wall.php?username={$username}" style="color: black;">
                {$name}
            </a>
        <form action="dashboard.php" method="post">
	        <input type="text" name="post_body" placeholder="Whats on your mind ?"/>
            {$postSuccessMessage}<br>
            <select name="privacy">
                <option value="public">Public</option>
                <option value="private">Private</option>
            </select>
	        <input id="button" type="submit" name="submit" value="Insert data" >
        </form>
	    </div>
<div class="container">
    <!-- ISCITAVANJE POSTOVA-->
    {section name=i loop=$postsRows}
<div align="center" id="printText">
 <div class="row">
 <div>
     <img src="img/profile2.png">
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
<script>
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
   };
</script>
</body>
</html>