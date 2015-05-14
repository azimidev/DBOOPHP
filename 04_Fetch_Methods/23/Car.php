<?php

class Car {

	protected $data = array();

	public function __construct($id) {
		$this->car_id = $id;
		$this->make = 'Unknown';
		$this->mileage = 'Not registered';
		$this->price = 'Unknown';
		$this->description = 'Not available';
	}

	public function __set($name, $value) {
		$this->data[$name] = $value;
	}

	public function __get($name) {
		if (isset($this->data[$name])) {
			return $this->data[$name];
		}
		else {
			return false;
		}
	}

	public function getPrice() {
		if (is_numeric($this->price)) {
			return '$' . number_format($this->price, 2);
		}
		else {
			return $this->price;
		}
	}

	public function getMileage() {
		if (is_numeric($this->mileage)) {
			return number_format($this->mileage);
		}
		else {
			return $this->mileage;
		}
	}

	public function __toString() {
		$output = 'Car id:' . $this->car_id . '<br>';
		$output .= 'Make: ' . $this->make . '<br>';
		$output .= 'Mileage: ' . $this->getMileage() . '<br>';
		$output .= 'Price: ' . $this->getPrice() . '<br>';
		$output .= 'Description: ' . $this->description;
		return $output;
	}
}