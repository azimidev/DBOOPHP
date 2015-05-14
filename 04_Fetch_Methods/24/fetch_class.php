<?php
try {
    require_once '../../includes/pdo_connect.php';
    require_once 'Car.php';
    // Set car id
    $car_id = 35;

    // Use prepared statement to get the car's details
    $sql = "SELECT * FROM cars
            LEFT JOIN makes USING (make_id)
            WHERE car_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute(array($car_id));

    // Create a car object using the database result
	$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Car', array($car_id));
	$car = $stmt->fetch();
	echo $car;
} catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo $error;
}