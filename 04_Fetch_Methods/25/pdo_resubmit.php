<?php
try {
    require_once '../../includes/pdo_connect.php';
    $sql = 'SELECT name, meaning FROM names ORDER BY name';
    $result = $db->query($sql);
    $errorInfo = $db->errorInfo();
    if (isset($errorInfo[2])) {
        $error = $errorInfo[2];
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO: Reusing a Result</title>
    <link rel="stylesheet" href="../../styles/styles.css" type="text/css">
</head>
<body>
<h1>PDO: Resubmitting the Query</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
} else { ?>
<ul>
    <?php while ($col = $result->fetchColumn(0)) {
        echo '<li><a href=#"' . $col . '">' . $col . '</a></li>';
    } ?>
</ul>
    <p>Lots more content here.</p>
    <dl>
        <?php
        // Resubmit the query before using it again
        $result = $db->query($sql);
        while ($row = $result->fetch()) {
            echo '<dt id="' . $row['name'] . '">' . $row['name'] . '</dt>';
            echo '<dd>' . $row['meaning'] . '</dd>';
        } ?>
    </dl>
<?php } ?>
</body>
</html>