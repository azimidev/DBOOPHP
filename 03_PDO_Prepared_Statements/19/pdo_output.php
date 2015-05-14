<?php
if (isset($_GET['search'])) {
	try {
		require_once '../../includes/pdo_connect.php';
		$sql = 'SELECT make, yearmade, mileage, price, description
                FROM cars
                LEFT JOIN makes USING (make_id)
                WHERE make LIKE :make AND yearmade >= :yearmade AND price <= :price
                ORDER BY price';
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
		$stmt->bindParam(':yearmade', $_GET['yearmade'], PDO::PARAM_INT);
		$stmt->bindParam(':price', $_GET['price'], PDO::PARAM_INT);
		$stmt->execute();
		$stmt->bindColumn('make', $make);
		$stmt->bindColumn(2, $year);
		$stmt->bindColumn('mileage', $mile);
		$stmt->bindColumn('price', $price);
		$stmt->bindColumn('description', $desc);
		$errorInfo = $stmt->errorInfo();
		if (isset($errorInfo[2])) {
			$error = $errorInfo[2];
		}
	} catch (Exception $e) {
		$error = $e->getMessage();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>PDO: Output Parameters</title>
	<link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>
<h1>PDO Prepared Statement: Binding Output Parameters</h1>
<?php if (isset($error)) {
	echo "<p>$error</p>";
} ?>
<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<fieldset>
		<legend>Search for Cars</legend>
		<p>
			<label for="make">Make: </label>
			<input type="text" name="make" id="make">
			<label for="yearmade">Year (minimum): </label>
			<select name="yearmade" id="yearmade">
				<?php for ($y = 1970; $y <= 2010; $y+=5) {
					echo "<option>$y</option>";
				} ?>
			</select>
			<label for="price">Price (maximum): </label>
			<select name="price" id="price">
				<?php for ($p = 5000; $p <= 30000; $p+=5000) {
					echo "<option value='$p'";
					if ($p == 30000) {
						echo ' selected';
					}
					echo '>$' . number_format($p) . '</option>';
				} ?>
			</select>
			<input type="submit" name="search" value="Search">
		</p>
	</fieldset>
</form>
<?php if (isset($_GET['search'])) {
	$stmt->fetch(PDO::FETCH_BOUND);
	if ($make) {
		?>
		<table>
			<tr>
				<th>Make</th>
				<th>Year</th>
				<th>Mileage</th>
				<th>Price</th>
				<th>Description</th>
			</tr>
			<?php do { ?>
				<tr>
					<td><?php echo $make; ?></td>
					<td><?php echo $year; ?></td>
					<td><?php echo number_format($mile); ?></td>
					<td>$<?php echo number_format($price, 2); ?></td>
					<td><?php echo $desc; ?></td>
				</tr>
			<?php } while ($stmt->fetch(PDO::FETCH_BOUND)); ?>
		</table>
	<?php } else {
		echo '<p>No results found.</p>';
	}
} ?>
</body>
</html>