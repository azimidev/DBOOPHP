<?php
try {
    require_once '../../includes/pdo_connect.php';
    $sql = 'INSERT INTO names (name, meaning, gender)
            VALUES ("William", "resolute guardian", "boy")';
	$result = $db->query($sql);
	echo $result->queryString;
} catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo $error;
}