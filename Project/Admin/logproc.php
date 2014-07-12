<?php

include_once('config.php');

/// Connect
//$link = mysql_connect(DB_HOST,DB_USER,DB_PASS);

//mysql_select_db(DB_DATABASE) or die( "Unable to select database");


// Retrieve username and password from database according to user's input
$login = mysql_query("SELECT * FROM user WHERE (username ='" .($_POST['username']) . "') and (password = '" .($_POST['password']) . "')");

// Check username and password match
if (mysql_num_rows($login) == 1) {
        // Set username session variable
        $_SESSION['username'] = $_POST['username'];
        // Jump to secured page
        header('Location: profile.php');
}
else {
        // Jump to login page
        header('Location: login.php');
}

mysql_close($link);
?>