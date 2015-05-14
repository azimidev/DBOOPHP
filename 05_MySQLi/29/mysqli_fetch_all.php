<?php
try {
    require_once '../../includes/mysqli_connect.php';
    $sql = 'SELECT name, meaning, gender FROM names
            ORDER BY name';
    $result = $db->query($sql);
} catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo "<p>$error</p>";
}
echo '<pre>';
echo "<h3>Pass MYSQLI_BOTH or MYSQLI_ASSOC as the argument to change the array type</h3>";
$all = $result->fetch_all();
print_r($all);
echo '</pre>';
$db->close();