<?php
//if(!isset($_SESSION))
session_start();
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_DATABASE','omr');
define('DB_USERDB','cmd_record');
define('DB_USERDB1','students');
define('DB_USERDB2','insert_att');
define('DB_USERDB3','user');

$link = mysql_connect(DB_HOST,DB_USER,DB_PASS);
$select=mysql_select_db(DB_DATABASE);

?>