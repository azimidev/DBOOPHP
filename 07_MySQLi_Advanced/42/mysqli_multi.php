<?php
try {
    require_once '../../includes/mysqli_connect.php';

	$makes = array('Chrysler', 'Ford', 'Toyota');
	$sql = "SELECT make, MIN(price) AS minprice, MAX(price) AS maxprice FROM cars
        LEFT JOIN makes USING (make_id)
        WHERE make = '$makes[0]';SELECT make, MIN(price) AS minprice, MAX(price) AS maxprice FROM cars
        LEFT JOIN makes USING (make_id)
        WHERE make = '$makes[1]';SELECT make, MIN(price) AS minprice, MAX(price) AS maxprice FROM cars
        LEFT JOIN makes USING (make_id)
        WHERE make = '$makes[2]';";

} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MySQLi: Multiple Queries</title>
    <link href="../../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>MySQLi: Handling Multiple Queries</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
} else {
	$db->multi_query($sql);
	do {
		$result = $db->store_result();
		$row = $result->fetch_assoc();
		echo "<h2>{$row['make']}</h2>";
		echo "<p>Price range from $" . number_format($row['minprice']) . " to $" . number_format($row['maxprice']) . "</p>";
		$result->free();
	} while($db->next_result());
}
$db->close();
?>
</body>
</html>