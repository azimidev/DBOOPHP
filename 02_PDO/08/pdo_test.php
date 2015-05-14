<?php
try {
	require_once('pdo_connect.php');
} catch(Exception $e) {
	$error = $e->getMessage();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Database Connection with PDO</title>
    <link href="../../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Connecting with PDO</h1>
<?php if ($db) {
    echo "<p>Connection successful.</p>";
} elseif (isset($error)) {
    echo "<p>$error</p>";
}
?>
</body>
</html>