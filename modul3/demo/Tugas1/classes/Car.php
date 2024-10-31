<?php
namespace Project\Classes;

require_once 'Vehicle.php';
require_once 'Owner.php';

class Car extends Vehicle {
    use Owner;
    
    private $fuelType;

    public function __construct($brand, $model, $fuelType) {
        parent::__construct($brand, $model);
        $this->fuelType = $fuelType;
    }

    public function getInfo() {
        return "Car: $this->brand $this->model, Fuel Type: $this->fuelType";
    }
    
    public function __toString() {
        return $this->getInfo() . ", " . $this->getOwner();
    }
}
