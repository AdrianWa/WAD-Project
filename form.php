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