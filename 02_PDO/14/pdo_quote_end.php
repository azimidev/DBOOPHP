<?php
if (isset($_GET['search'])) {
    try {
        require_once '../../includes/pdo_connect.php';
        $searchterm = '%' . $_GET['searchterm'] . '%';
        $sql = 'SELECT name, meaning FROM names
                WHERE name LIKE ' . $db->quote($searchterm);
        $result = $db->query($sql);
        $errorInfo = $db->errorInfo();
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
    <title>PDO: Using quote()</title>
    <link href="../../styles/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>PDO: Escaping Input with quote()</h1>
<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p>
        <label for="searchterm">Enter a name or part of one:</label>
        <input type="search" name="searchterm" id="searchterm">
        <input type="submit" name="search" value="Go">
    </p>

</form>
<?php if (isset($error)) {
    echo "<p>$error</p>";
} elseif (isset($result)) {
    $allResults = $result->fetchAll(PDO::FETCH_ASSOC);
    if ($allResults) {
        foreach ($allResults as $row) { ?>
            <p>The name <?php echo $row['name']; ?> means <?php echo $row['meaning']; ?>.</p>
    <?php }
    } else { ?>
        <p>No results found</p>
   <?php }
} ?>
</body>
</html>