
<?php
include("config/config.php");
?>

<form id="register" action="index.php" method="post">
    <h3>Registracija</h3>
            <input type="email" name="email" placeholder="Email" autocomplete="off" required>
            <input type="text" name="username" placeholder="Username" autocomplete="off" required>
            <input type="text" name="password" placeholder="Password" autocomplete="off" required>
            <input type="text" name="password2" placeholder="Repeat password" autocomplete="off" required>
            <input type="submit" name="regsubmit" value="Register" autocomplete="off">

</form>

<?php
//varijabla za proveru regmessage
$registerMessage = false;
//da li je kliknuto?
if(!empty($_POST["regsubmit"])){
    $ok=true;
    if(empty($_POST["username"])){
        $ok=false;
    }
    if(empty($_POST["email"])){
        $ok=false;
    }
    if(empty($_POST["password"])){
        $ok=false;
    }
    if(empty($_POST["password2"])){
        $ok=false;
    }
    if($ok===true && strlen($_POST["username"]) >= 6 ){
        //defining variables
        $juzernejm = $_POST["username"];
        $imejl = $_POST["email"];
        $shifra = $_POST["password"];
        $shifra2 = $_POST["password2"];
        //encrypting password
        $hash = password_hash($shifra, PASSWORD_DEFAULT);

        // dodaj databazu
        $conn = mysqli_connect('localhost', 'root', '', 'soc_net');
        //security measures

        $escapeName = mysqli_real_escape_string($conn, $juzernejm);
        $escapeEmail = mysqli_real_escape_string($conn, $imejl);
        $escapeHash = mysqli_real_escape_string($conn, $hash);

        // da li postoji korisnik>

        //$sqlSelect = "SELECT * FROM users WHERE username ='".$escapeName."'";


        //ubac u bazu?
        $sql = "INSERT INTO users (email, username, password) VALUES (
        '".$escapeEmail."',
        '".$escapeName."',
        '".$escapeHash."'
         )";

        $registerUser = mysqli_query($conn, $sql);

        if($registerUser == true){

            $registerMessage = "User ".$juzernejm." added to db";
        }
        else{
            $registerMessage = "Erroreditordi!";
        }
        if($registerMessage){
            echo '<div class="container">
            <div class="successmsg">
                <span class="closebtn">&times;</span>
                <strong>BRAVO!</strong> '.$registerMessage.'
            </div>
            </div>';

            
    
        }
        if($registerMessage === false)
        {
    
            echo "Passwords do not match";
        }
    }



    elseif(strlen($_POST["username"]) < 6){

        echo 
        
        '<div class="container">
            <div class="successmsg">
                <span class="closebtn">&times;</span>
                <strong>Username must be longer thn 6 chars</strong> $registerMessage
            </div>
            </div>

            ';
    }
}

?>
<script>
    var close = document.querySelector(".closebtn");
    close.addEventListener("click",function(){


        this.parentElement.style.display = "none";
    })



</script>