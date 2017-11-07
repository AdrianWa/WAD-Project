<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <title> GUESTBOOK </title>
        <link rel="stylesheet"
              href="stylesheet.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">
        <script src="../ckeditor.js"></script>
    </head>

    <body>

        <?php
        $servername = "localhost";
        $username = 'root';
        $password = '';
        $pdo = null;
        $name = $message = "";
        $nameErr = $messageErr = "";

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        try {
            global $pdo;
            $pdo = new PDO('mysql:host=localhost;dbname=wad-project', $username, $password);

            global $name;
            global $message;
            global $nameErr;
            global $messageErr;
            $insertBool1 = $insertBool2 = false;

            if($_SERVER["REQUEST_METHOD"] == "POST"){
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
            }

            if($insertBool1 && $insertBool2){
                $statement = $pdo->prepare("INSERT INTO guestbook_entries (name, message) VALUES (?, ?)");
                $statement->execute(array($name, $message));
                $name = $message = "";
            }



        } catch(PDOException $e){
            echo "No database connection";
        }

        ?>

        <nav id="nav">
            <ul>
                <li><a href="#top">Home</a></li>
                <li><a href="#guestbook">The Guestbook</a></li>
                <li><a href="#about">About</a></li>
            </ul>

        </nav>

        <img id="cover-picture" src="res/cover_pic.jpg" alt="Cover-Picture">



        <div id=basis>

            <h1 id="home">Home</h1>

            <p> Welcome to my Website!</p>
            <p> This site is currently under construction!</p>
            <img src="res/under_construction1600.png" style="height: 200px; width: 200px;">
            <br>
            <hr>

            <h1 id="guestbook">My Guestbook</h1>


            <!--

<div id="template">
<p>"Your message"!</p>
<div id="infos">posted by NAME on DATE</div>
</div>
<br>

-->

            <button id="loading-button">
                Load more!
            </button>

            <?php 
            try {
                //$lastid = $sql->lastInsertId();
                $sql = "SELECT * from guestbook_entries ORDER BY id DESC LIMIT 10";
                //echo $lastid;
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

            <br>
            <br>
            <br>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <fieldset>
                    Enter your Nickname:
                    <br>
                    <input type="text" name="name" id="textfield" value="<?php global $name; echo $name;?>" placeholder="Please enter your name!">
                    <span id="error" style="color: red"> <?php global $nameErr; echo $nameErr; ?> </span>
                    <br>
                    Enter your message:
                    <br>
                    <textarea id="textarea" name="message" rows="10" value="<?php global $message; echo $message;?>" placeholder="Please enter your message!"></textarea>
                    <br>
                    <span id="error" style="color: red"> <?php global $messageErr; echo $messageErr; ?> </span>
                    <input type="submit" id="submit">
                </fieldset>
            </form>
            <br>
            <hr>

            <h1 id="about">About</h1>

            <!--
<form>
<textarea name="editor1" id="editor1" rows="10" cols="100">
This is my textarea to be replaced with CKEditor.
</textarea>
<script>
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace( 'editor1' );
</script>
</form>
-->

            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum

            </p>

            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum

            </p>

        </div>


        <div id="footer">Copyright &copy;</div>

        <?php
        $pdo = null; //close database connection
        ?>

    </body>
</html>