
<?php 
try {
    global $amount_entries;
    $sql = "SELECT * from guestbook_entries ORDER BY id DESC LIMIT $amount_entries";
    foreach ($pdo->query($sql) as $row) {
        echo '<div id="template">';
        echo '<div id="number">';
        echo $row['id']." <br />";
        echo '</div>';
        echo '<b>';
        echo $row['name'].": <br />";  
        echo '</b>';        
        echo '<br>';
        echo $row['message']."<br />";        
        echo '<br>';
        echo '<div id="infos">';
        echo "posted on: ";
        echo $row['time']."<br />";
        echo '</div>';
        echo '</div>';
        echo '<br>';
    }
} catch(PDOException $e){

}

?>
    