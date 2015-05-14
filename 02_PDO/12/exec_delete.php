<?php
try {
    require_once '../../includes/pdo_connect.php';
    $sql = 'DELETE FROM names WHERE name = "William"';
	$affected = $db->exec($sql);
	echo $affected . ' records deleted.';
} catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo $error;
}