<?php
try {
    require_once '../../includes/pdo_connect.php';
    $sql = 'INSERT INTO names (name, meaning, gender)
            VALUES ("William", "resolute guardian", "boy")';
    $affected = $db->exec($sql);
	echo $affected . ' row affected with ID: ' . $db->lastInsertId();
} catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo $error;
}