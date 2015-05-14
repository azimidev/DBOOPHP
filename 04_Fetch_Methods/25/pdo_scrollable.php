<?php
try {
    require_once '../../includes/pdo_connect.php';
    $sql = 'SELECT name, meaning FROM names ORDER BY name';
    // Use a scrollable cursor
    $db->setAttribute(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL);
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
    <title>PDO: Resetting the Cursor</title>
    <link rel="stylesheet" href="../../styles/styles.css" type="text/css">
</head>
<body>
<h1>PDO: Resetting a Scrollable Cursor</h1>
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
        $row = $result->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_ABS, 0);
        do  {
            echo '<dt id="' . $row['name'] . '">' . $row['name'] . '</dt>';
            echo '<dd>' . $row['meaning'] . '</dd>';
        } while ($row = $result->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)); ?>
    </dl>
<?php } ?>
</body>
</html>