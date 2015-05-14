<?php
try {
    require_once '../../includes/mysqli_connect.php';

	// Set up prepared statements transfer from one account to another
	$amount = 200;
	$payer = 'John White';
	$payee = 'Jane Brown';
	$debit = 'UPDATE savings SET balance = balance - ? WHERE name = ?';
	$credit = 'UPDATE savings SET balance = balance + ? WHERE name = ?';

	$pay = $db->stmt_init();
	if (!$pay->prepare($debit)) {
		$error = $pay->error;
	}
	$pay->bind_param('is', $amount, $payer);

	$receive = $db->stmt_init();
	if (!$receive->prepare($credit)) {
		$error = $receive->error;
	}
	$receive->bind_param('is', $amount, $payee);

	// Transaction
	// PHP 5.5+
	// $db->begin_transaction();
	$db->autocommit(false); // Transaction beginning
	$pay->execute();
	if (!$db->affected_rows) {
	    $db->rollback();
		$error = "Transaction failed: Couldn't update $payer's account";
	} else {
		$receive->execute();
		if (!$db->affected_rows) {
			$db->rollback();
			$error = "Transaction failed: Couldn't update $payee's account";
		} else {
			$db->commit();
		}
	}


	$balances = $db->query('SELECT name, balance FROM savings');
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MySQLi Transaction</title>
    <link href="../../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>MySQLi Transactions</h1>
<?php
if (isset($error)) {
    echo "<p style='color: red;'>$error</p>";
}
?>
<table>
    <tr>
        <th>Name</th>
        <th>Balance</th>
    </tr>
    <?php while ($row = $balances->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td>$<?php echo number_format($row['balance'], 2); ?></td>
    </tr>
    <?php } ?>
</table>
<?php $db->close(); ?>
</body>
</html>