<?php
try {
    require_once '../../includes/pdo_connect.php';
    $sql = 'SELECT name, meaning, gender FROM names ORDER BY name';
    $result = $db->query($sql);
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO: Fetching a Column</title>
    <link href="../../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>PDO: Fetching a Single Column</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
}
?>
<table>
    <tr>
        <th>Column</th>
    </tr>
    <?php while($col = $result->fetchColumn(0)) { ?>
    <tr>
        <td><?php echo $col; ?></td>
    </tr>
    <?php } ?>
</table>
</body>
</html>