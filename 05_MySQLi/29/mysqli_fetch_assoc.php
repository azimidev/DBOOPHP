<?php
try {
    require_once '../../includes/mysqli_connect.php';
    $sql = 'SELECT name, meaning, gender FROM names
            ORDER BY name';
    $result = $db->query($sql);
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MySQLi: Select</title>
    <link href="../../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>MySQLi: Simple SELECT Query</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
}
$numrows = $result->num_rows;
if (!$numrows) {
    echo '<p>No results found.</p>';
} else {
    echo "<p>Total results found: $numrows.</p>";
?>
<table>
    <tr>
        <th>Name</th>
        <th>Meaning</th>
        <th>Gender</th>
    </tr>
	<?php while($row = $result->fetch_assoc()): ?>
	    <tr>
	        <td><?php echo $row['name']; ?></td>
	        <td><?php echo $row['meaning']; ?></td>
	        <td><?php echo $row['gender']; ?></td>
	    </tr>
	<?php endwhile; ?>
</table>
<?php } // end else
$db->close();
?>
</body>
</html>