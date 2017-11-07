<?php
$servername = "localhost";
$username = 'root';
$password = '';
$pdo = null;

try {
    global $pdo;
    $pdo = new PDO('mysql:host=localhost;dbname=wad-project', $username, $password);

    $name = $message = "";
    $nameErr = $messageErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["name"])){
            $nameErr = "Please enter your name!";
        } else {
            $name = test_input($_POST["name"]);
        }
        if(empty($_POST["message"])){
            $nameErr = "Please enter your message!";
        } else {
            $message = test_input($_POST["messsage"]);
        }
    }


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

} catch(PDOException $e){
    echo "No database connection";
}

$sql = "SELECT * from guestbook_entries ORDER BY id DESC LIMIT 10";
foreach ($pdo->query($sql) as $row) {
    echo $row['id']." <br />";
    echo $row['name'].": <br />";    
    echo $row['message']."<br />";
    echo "posted on: ";
    echo $row['time']."<br />";
}
$entryname = 'DRACULA';
$entrymessage = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.';
$statement = $pdo->prepare("INSERT INTO guestbook_entries (name, message) VALUES (?, ?)");
$statement->execute(array($entryname, $entrymessage));

$pdo = null;

?>
