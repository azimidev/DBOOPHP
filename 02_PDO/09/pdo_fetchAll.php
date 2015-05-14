<?php
try {
    require_once '../../includes/pdo_connect.php';
    $sql = 'SELECT name, meaning, gender FROM names
            ORDER BY name';
    $result = $db->query($sql);
	$all = $result->fetchAll();
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO: Fetching All Rows</title>
    <link href="../../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>PDO: Fetching All Rows in a Result Set</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
}
?>
<pre>
<?php print_r($all); ?>
</pre>
</body>
</html>