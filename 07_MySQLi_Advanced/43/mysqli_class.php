<?php
try {
    require_once '../../includes/mysqli_connect.php';
    require_once 'Car.php';
    // Set car id
    $car_id = 25;

    // Get the car's details
    $sql = "SELECT * FROM cars
            LEFT JOIN makes USING (make_id)
            WHERE car_id = $car_id";
    $result = $db->query($sql);
    $car = $result->fetch_object('Car', array($car_id));
    echo $car;
} catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo $error;
}