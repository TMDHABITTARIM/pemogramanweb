<?php
require_once 'classes/Car.php';
require_once 'classes/Bike.php';

use Project\Classes\Car;
use Project\Classes\Bike;

// Buat objek Car
$car = new Car("Toyota", "Corolla", "Petrol");
$car->setOwner("Alice", "08123456789");

// Buat objek Bike
$bike = new Bike("Yamaha", "YZF-R15", "Sport");
$bike->setOwner("Bob", "08198765432");

// Tampilkan informasi kendaraan
echo $car . "\n";
echo $bike . "\n";
