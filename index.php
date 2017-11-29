<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <title> GUESTBOOK </title>
        <link rel="stylesheet"
              href="stylesheet.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">
        <!--  <script src="../ckeditor.js"></script>  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script>
            $(document).ready(function(){
                $("loading-button").click(function(){
                    $.ajax({{
                        alert("Nice!");
                    }});
                });
            });
        </script>
    </head>

    <body>

        <?php include('backend.php'); ?>

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

            <?php include('print_entries.php'); ?>

            <br>
            <!--
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="submit" id="loading-button" name="load" value="Load more!"/>
</form>
-->

            <button id="loading-button" onClick="myAjax()">Load more!</button>

            <br>
            <br>
            <br>

            <?php include('form.php'); ?>

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
        //close database connection
        $pdo = null; 
        ?>

    </body>
</html>