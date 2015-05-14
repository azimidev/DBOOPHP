<?php
if (isset($_GET['search'])) {
    try {
        require_once '../../includes/mysqli_connect.php';
        $sql = 'SELECT make, yearmade, mileage, price, description
                FROM cars
                LEFT JOIN makes USING (make_id)
                WHERE make LIKE ? AND yearmade >= ? AND price <= ?
                ORDER BY price';
        $stmt = $db->stmt_init();
        if (!$stmt->prepare($sql)) {
            $error = $stmt->error;
        } else {
            $stmt->bind_param('sid', $make, $_GET['yearmade'], $_GET['price']);
            $make = '%' . $_GET['make'] . '%';
            $stmt->execute();
	        $stmt->bind_result($maker, $year, $miles, $price, $desc);
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
    <title>MySQLi: Prepared Statement</title>
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>
<h1>MySQLi: Prepared Statement</h1>
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
<?php
if (isset($_GET['search'])) {
	$stmt->store_result();
	$numrows = $stmt->num_rows;
    if (!$numrows) {
        echo '<p>No results found.</p>';
    } else {
        ?>
        <table>
            <tr>
                <th>Make</th>
                <th>Year</th>
                <th>Mileage</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
            <?php while ($stmt->fetch()) { ?>
                <tr>
                    <td><?php echo $maker; ?></td>
                    <td><?php echo $year; ?></td>
                    <td><?php echo number_format($miles); ?></td>
                    <td>$<?php echo number_format($price, 2); ?></td>
                    <td><?php echo $desc; ?></td>
                </tr>
            <?php }  ?>
        </table>
    <?php }
}
if (isset($db)) {
    $db->close();
}
?>
</body>
</html>