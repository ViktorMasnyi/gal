<?php
if (isset($_POST['mobilenum']) && isset($_POST['message'])){
    echo "<p><a href='sms:" . $_POST['mobilenum'] . "?body=" . $_POST['message'] . "'>Send SMS welcome message to new member</a></p>";
} else {
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8" />
</head>
<body>
<div id="container">
<h1>Sending SMS with PHP</h1>
<form action="" method="post">
<ul>
<li>
<label for="mobilenum">Mobile Number</label>
<input type="text" name="mobilenum" id="mobilenum" /></li>
<li>
<label for="message">Message</label>
<textarea name="message" id="message" cols="45" rows="15"></textarea>
</li>
<li><input type="submit" name="sendMessage" id="sendMessage" value="Send Message" /></li>
</form>
<?php } ?>