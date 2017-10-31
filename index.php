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
        $pdo = new PDO('mysql:host=localhost;dbname=wad-project', 'root', '');

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


            <div id="template">
                <p>"Your message"!</p>
                <div id="infos">posted by NAME on DATE</div>
            </div>
            <br>

            <div id="template">
                <p>"Your message"!</p>
                <div id="infos">posted by NAME on DATE</div>
            </div>
            <br>

            <div id="template">
                <p>"Your message"!</p>
                <div id="infos">posted by NAME on DATE</div>
            </div>
            <br>

            <div id="template">
                <p>"Your message"!</p>
                <div id="infos">posted by NAME on DATE</div>
            </div>
            <br>

            <div id="template">
                <p>"Your message"!</p>
                <div id="infos">posted by NAME on DATE</div>
            </div>
            <br>

            <button id="loading-button">
                Load more!
            </button>

            <?php 
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

            ?>

            <br>
                <br>
                <br>

                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <fieldset>
                Enter your Nickname:
            <br>
                <input type="text" id="textfield" value="<?php echo $name;?>">
                <br>
                Enter your message:
            <br>
                <textarea id="textarea" rows="10" value="<?php echo $message;?>">
                </textarea>
                <br>
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


                    </body>
                    </html>