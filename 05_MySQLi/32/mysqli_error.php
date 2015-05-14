<?php
try {
    require_once '../../includes/mysqli_connect.php';
    $sql = 'SELECT name, meaning, gender FROM names';
    $result = $db->query($sql);
	if ($db->error) {
		$error = $db->error;
	}
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MySQLi: Error Messages</title>
    <link href="../../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>MySQLi: Getting Error Messages</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
} else {
	?>
	<table>
		<tr>
			<th>Name</th>
			<th>Meaning</th>
			<th>Gender</th>
		</tr>
		<?php while ($row = $result->fetch_assoc()) { ?>
			<tr>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['meaning']; ?></td>
				<td><?php echo $row['gender']; ?></td>
			</tr>
		<?php } ?>
	</table>
<?php
}
$db->close(); ?>
</body>
</html>