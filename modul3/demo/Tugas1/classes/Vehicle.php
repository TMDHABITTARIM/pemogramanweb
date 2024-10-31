<?php
namespace Project\Classes;

abstract class Vehicle {
    protected $brand;
    protected $model;
    
    public function __construct($brand, $model) {
        $this->brand = $brand;
        $this->model = $model;
    }
    
    abstract public function getInfo();
    
    public function getBrand() {
        return $this->brand;
    }

    public function getModel() {
        return $this->model;
    }
}
