<?php
try {
    require_once '../../includes/mysqli_connect.php';
    $sql = 'SELECT name, meaning, gender FROM names
            WHERE name = "David"
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
    <title>MySQLi: num_rows</title>
    <link href="../../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>MySQLi: Getting the Number of Results</h1>
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
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>
<?php
}
$db->close(); ?>
</body>
</html>