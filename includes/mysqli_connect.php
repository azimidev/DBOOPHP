<?php
$db = new mysqli('localhost', 'amir', 'azimi', 'oophp');
//$db = new mysqli('localhost', 'root', 'root', 'oophp', 8889);

if ($db->connect_error) {
    $error = $db->connect_error;
}
$db->set_charset("utf8");