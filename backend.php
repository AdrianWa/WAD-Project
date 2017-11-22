<?php
//all global variables
$servername = "localhost";
$username = 'root';
$password = '';
$pdo = null;
$name = $message = "";
$nameErr = $messageErr = "";
$amount_entries = 10;       //show 10 entries as standard

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function load_entries(){
    echo("Jep");
    global $amount_entries;
    $amount_entries += 10;
}

try {
    //open database connection
    global $pdo;
    $pdo = new PDO('mysql:host=localhost;dbname=wad-project', $username, $password);

    global $name;
    global $message;
    global $nameErr;
    global $messageErr;
    $insertBool1 = $insertBool2 = false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //echo("test");
        //if($_POST['action'] == "load"){
        //    echo("Yeah!");
        //    load_entries();
        //} else {
        if(empty($_POST["name"])){
            $nameErr = "Please enter your name!";
        } else {
            $name = test_input($_POST["name"]);
            $insertBool1 = true;
        }
        if(empty($_POST["message"])){
            $messageErr = "Please enter your message!";  
        } else {
            $message = test_input($_POST["message"]);
            $insertBool2 = true;
        }
        //}
    }

    //adds input to database, if checking was successful
    if($insertBool1 && $insertBool2){
        $statement = $pdo->prepare("INSERT INTO guestbook_entries (name, message) VALUES (?, ?)");
        $statement->execute(array($name, $message));
        $name = $message = "";
    }



} catch(PDOException $e){
    echo "No database connection";
}


?>