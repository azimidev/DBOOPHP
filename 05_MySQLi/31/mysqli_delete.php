<?php
try {
    require_once '../../includes/mysqli_connect.php';
    $sql = 'DELETE FROM names WHERE name = "William"';
    $db->query($sql);
    echo 'Number of records deleted: ' . $db->affected_rows;
} catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo $error;
}
$db->close();