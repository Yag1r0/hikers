<?php
include("register_proces.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>social network</title>
	<link href="css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>
<body>
 <header>
  <nav>
   <div id="navContent">
     Social Network
     <form action="process_login.php" method="post">
     <input type="text" name="username" placeholder="Unesite korisnicko ime" /> | <input type="password" name="password" placeholder="Unesite lozinku">
         <input type="submit" name="login" value="Login" />
     </form>
      <?php
 
 if(!empty ($_COOKIE["poruka"])) {
  echo $_COOKIE["poruka"];
  unset($_COOKIE["poruka"]);
  setcookie("poruka", "", time()-3600, "/"); //da se izbrise cookie
 }
 ?>
   </div>
  </nav>
 </header>
 <main>
    Nova društvena mreža
 </main>
 <aside>
 	Registracija
    <form action="index.php" method="post">
      <input type="text" name="name" placeholder="Unesite vaše ime" autocomplete="off" /><br/>
      <input type="text" name="lastname" placeholder="Unesite vaše prezime" autocomplete="off" /><br/>
      <input type="email" name="email" placeholder="Unesite vaš email" autocomplete="off" /><br/>
      <input type="text" name="username" placeholder="Unesite vaše korisničko ime" autocomplete="off" /><br/>
      <input type="password" name="password" placeholder="Unesite vašu lozinku" autocomplete="off" /><br/><br/>
      <input type="submit" name="register" />
    </form><br><br>
<?php
  if($registerMessage){
  echo
<<<HTML
<div class="container">
  <div class="successmessage">
  <span class="closebtn">&times;</span>
  <strong>Bravo! </strong> $registerMessage
</div>
</div>
HTML;
}
?>
 </aside>
 <script>
   var close = document.querySelector(".closebtn");
   close.addEventListener('click', function(){
    this.parentElement.style.opacity = "0";
   })
 </script>
</body>
</html>