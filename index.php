<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/index.css">
    <title>Hikers</title>
</head>
<body>
    <h1>Hello hikers!!!!!!!</h1>
    <p>PAPAPAPAPPAPAPAPAPAPAP</p>
    <p>Ne znam da li kontam kako se ovo koristi!</p>
    <p>Proba dva</p>
    <h2>Treci put probam da izmenim, tj dodam nesto
        <p>pozdrav od Vesne</p></h2>
    <!--Aleksa changing, dodajem navbar ispod -->
    <p>Ovo je ruchno kopiran Navbar</p>
    <header>
        <nav>
            <div id="navContent">

            Hikers
            <!-- -->
            <form action="processlogin.php" method="POST">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="login" value="Login">
                
                <?php
                    //proverava cookies i ispisuje poruku
                    if(!empty($_COOKIE["poruka"])) {
                        echo $_COOKIE["poruka"];
                        unset($_COOKIE["poruka"]);
                        setcookie("poruka", "",time()-3600,"/");
                    }
                ?>  
            </form>
        </nav>
    </header>
    <main>
        <h1>Lets hike everyone!</h1>
        <?php include ("registracija.php") ?>
   
       
        
    </main>
</body>
</html>
