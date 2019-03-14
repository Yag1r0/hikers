

<?php
    session_start();
    //ako nismo loginovani vraca nas na homepejdz
    if(!isset($_SESSION["user"]) || !$_SESSION["user"]){
        header("Location: index.php");
    } else{
        //echo $_SESSION["user"];
        
    }
    $username = $_SESSION["user"];
?>
<?php
include("config/config.php");
?>

<?php
    $conn = new mysqli(SERVER, USER, PASS, DB);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
?>
<?php

//kod za unos podataka u bazu
if(!empty($_POST["onmindsubmit"])){// ako je kliknuto onda odradi ovo dole

    $bodipost = $_POST["onyourmind"];
    $jazorajdi = $_SESSION["uid"];
    $sqlInsert = "INSERT INTO posts(id, body, date, userID) VALUES (null, '".$bodipost."', now(), '".$jazorajdi."')";

    $resultInsert = $conn->query($sqlInsert);
    if($resultInsert === true){


        echo "Vash status je uspeshtno evidentiran";
    }
    else{

        echo "Imate greshku u konekciji ".$conn->error;
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/dashboard.css">
    <title>Social network</title>
</head>
<body>
    <header>
        <h1>Social-network</h1>
        <div id="picanduser">
            <div class="userpic"></div>
            <h2><?php echo $_SESSION["user"]?></h2>
            <a href="logout.php" id="logout"></a>
        </div>
        
    </header>
    <main>
        
        <form id="onmind" action="dashboard.php" method="post">
            <div id="mindpic">
                <div class="userpic" alt="slika korisnika"></div>
                <input id="whatonmind" type="text" name="onyourmind" placeholder="What's on your mind?">
            </div>
            
            <input id="submituj" type="submit" name="onmindsubmit" value="Send">
            <div id="kocka">Show my posts only<div  id ="kockica" class="kockica" value="0"></div></div>
        </form>
       

        
    </main>  
    <?php

            // Create connection
            

            // $sql = "SELECT id, body, date, userID FROM posts";
            // $result = $conn->query($sql);

            //spajam username i posts 
            $sql2 = "SELECT posts.id,
            posts.userID,
            posts.date,
            posts.body,
            users.uid,
            users.username,
            users.email FROM posts INNER JOIN users ON posts.userID = users.uid ORDER BY posts.id ASC";

            //konekcija
            $result = $conn->query($sql2);

            //provera konekcije
            if ($result->num_rows > 0) {

                
                // output data of each row

                echo "<div id='wrap'>";
                while($row = $result->fetch_assoc()) {
                    //davanje varijabli
                    $body = $row["body"];
                    $ajdi = $row["id"];
                    $usajdi = $row["username"];
                    $dejt = $row["date"];
                    $email = $row["email"];
                    echo 
                    <<<HTML
                        <div class='coms'>Name: $usajdi<br>
                        Said:  $body<br>
                        id:  $ajdi<br>
                        Mail: $email<br>
                        <div class='date'>$dejt</div></div>
                    HTML;

                }
                echo "</div>";
            } else {
                echo "Nema rezultata u bazi";
            }
            $conn->close();
        ?>
        
        <script src="dash.js"></script>
        
</body>
</html>






