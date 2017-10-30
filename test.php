<?php
$pdo = new PDO('mysql:host=localhost;dbname=wad-project', 'root', '');

$sql = "SELECT * from guestbook_entries ORDER BY id DESC LIMIT 10";
foreach ($pdo->query($sql) as $row) {
    echo $row['id']." <br />";
    echo $row['name'].": <br />";    
    echo $row['message']."<br />";
    echo "posted on: ";
    echo $row['time']."<br />";
}
?>