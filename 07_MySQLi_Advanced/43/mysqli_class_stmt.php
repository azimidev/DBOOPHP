<?php
try {
    require_once '../../includes/mysqli_connect.php';
    require_once 'Car.php';
    // Set car id
    $car_id = 25;

    // Use prepared statement to get the car's details
    $sql = 'SELECT * FROM cars
            LEFT JOIN makes USING (make_id)
            WHERE car_id = ?';
	$stmt = $db->stmt_init();
    if (!$stmt->prepare($sql)) {
        $error = $stmt->error;
    } else {
        $stmt->prepare($sql);
        $stmt->bind_param('i', $car_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Create a car object using the database result
        $car = $result->fetch_object('Car', array($car_id));
        echo $car;
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo $error;
}