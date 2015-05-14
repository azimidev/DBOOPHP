<?php
try {
    require_once '../../includes/pdo_connect.php';
    $sql = 'SELECT name, meaning FROM names';
    $result = $db->query($sql);
    $names = $result->fetchAll(PDO::FETCH_KEY_PAIR);
} catch (Exception $e) {
    $error = $e->getMessage();
}
echo "<pre>";
print_r($names);
echo "</pre>";