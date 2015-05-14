<?php
try {
    require_once '../../includes/pdo_connect.php';
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO Transaction</title>
    <link href="../../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>PDO Transactions</h1>
<?php
if (isset($error)) {
    echo "<p>$error</p>";
}
?>
<table>
    <tr>
        <th>Name</th>
        <th>Balance</th>
    </tr>
    <?php foreach ($db->query('SELECT name, balance FROM savings') as $row) { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td>$<?php echo number_format($row['balance'], 2); ?></td>
    </tr>
    <?php } ?>
</table>
</body>
</html>