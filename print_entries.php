<?php 
try {
    global $amount_entries;
    $sql = "SELECT * from guestbook_entries ORDER BY id DESC LIMIT $amount_entries";
    foreach ($pdo->query($sql) as $row) {
        echo $row['id']." <br />";
        echo $row['name'].": <br />";    
        echo $row['message']."<br />";
        echo "posted on: ";
        echo $row['time']."<br />";
    }
} catch(PDOException $e){

}

?>