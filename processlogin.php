<?php
session_start();
//includujemo configuraciju
include("config/config.php");

//defining variables
$username = !empty($_POST["username"]);
$password = !empty($_POST["password"]);


//provera da li su prazne

if($username && $password){
    //konekcija sa bazom
    $db = mysqli_connect(SERVER, USER, PASS, DB);
    //promenimo enkodiranje na utf8 da moze da chita ћчћчčćčć
    mysqli_set_charset($db, "utf8");
    //ubacujemo sigurnosni username unutar sql-a 2 parametra, string i %s << gde emo da ubacimo neshto, drugi parametar u %S ide

    $sql = sprintf("SELECT * FROM users WHERE username='%s'", mysqli_real_escape_string($db, $_POST["username"]));
    //shaljemo nash sql u bazu!
    $result = mysqli_query($db, $sql);
    //varijabla row kojom hvatamo rezultate , pretvara ih u asocijativni niz
    $row = mysqli_fetch_assoc($result);
    //ako je row true i ako se napuni taj asocijativni niz mozemo da radimo dalje, to ifuje sve ispod
    if($row){
        //prvo unosimo password iz baze, shifra je cashovana
        $hash = $row["password"];
    
        if(password_verify($_POST["password"], $hash)){

                $message = 'Login successful.';

                $_SESSION["user"] = $row["username"];
                $_SESSION["uid"] = $row["uid"];
                $_SESSION["image"] = $row["image"];
                $_SESSION["name"] = $row["name"];
                $_SESSION["lastname"] = $row["lastname"];
                //shalje nas na dashboard php ako smo se lepo ulogovali
                header("Location: dashboard.php");
                

            } else{

                //pogresna lozinka
                ///kolachiki

                setcookie("poruka", "Pogresna lozinka" , time() + (86400), "/");
                header("Location: index.php");
            }
        }
        else{
            //cookies i kolko traje ako su pogresni podaci
            setcookie("poruka", "Pogreshni podaci" , time() + (86400), "/");
            header("Location: index.php");
        }
            mysqli_close($db);
    }else{

            //cookies i kolko traje ako nisu popunjena sva polja
        
        setcookie("poruka", "Niste popunili sva polja" , time() + (86400), "/");
        header("Location: index.php");
    }


?>