<?php
namespace Project\Classes;

require_once 'Vehicle.php';
require_once 'Owner.php';

class Bike extends Vehicle {
    use Owner;
    
    private $bikeType;

    public function __construct($brand, $model, $bikeType) {
        parent::__construct($brand, $model);
        $this->bikeType = $bikeType;
    }

    public function getInfo() {
        return "Bike: $this->brand $this->model, Type: $this->bikeType";
    }
    
    public function __toString() {
        return $this->getInfo() . ", " . $this->getOwner();
    }
}
