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

echo "<h2>Method fetch_array();</h2>";
$row = $result->fetch_array();
print_r($row);

echo "<h2>Method fetch_array(MYSQLI_ASSOC);</h2>";
$row = $result->fetch_array(MYSQLI_ASSOC);
print_r($row);

echo "<h2>Method fetch_array(MYSQLI_NUM);</h2>";
$row = $result->fetch_array(MYSQLI_NUM);
print_r($row);

echo '</pre>';
$db->close();