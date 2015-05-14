<?php
try {
    require_once '../../includes/pdo_connect.php';
    $sql = 'SELECT name, meaning, gender FROM names ORDER BY name';
	$result = $db->query($sql);
} catch (Exception $e) {
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO: Fetching a Row</title>
    <link href="../../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>PDO: Fetching the Next Row</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
}
?>
<table>
    <tr>
        <th>Name</th>
        <th>Meaning</th>
        <th>Gender</th>
    </tr>
	<?php while($row = $result->fetch()): ?>
    <tr>
        <td><?php echo $row[0]; ?></td>
        <td><?php echo $row['meaning']; ?></td>
        <td><?php echo $row['gender']; ?></td>
    </tr>
	<?php endwhile ?>
</table>
</body>
</html>