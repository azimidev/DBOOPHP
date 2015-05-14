<?php
try {
    require_once '../../includes/pdo_connect.php';
	$count = $db->query('SELECT COUNT(*) FROM names');
	$numrows = $count->fetchColumn();
	if($numrows) {
		$sql = 'SELECT name, meaning, gender FROM names
	            ORDER BY name';
        $result = $db->query($sql);
	}
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO: Counting Rows</title>
    <link href="../../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>PDO: Counting Rows in a Result Set</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
}
?>
<?php echo "<p>Total result: $numrows</p>"; ?>
<?php if ($numrows1): ?>
<table>
    <tr>
        <th>Name</th>
        <th>Meaning</th>
        <th>Gender</th>
    </tr>
    <?php while($row = $result->fetch()) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['meaning']; ?></td>
            <td><?php echo $row['gender']; ?></td>
        </tr>
    <?php } ?>
</table>
<?php endif; ?>
</body>
</html>