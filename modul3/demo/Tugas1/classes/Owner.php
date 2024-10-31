<?php
namespace Project\Classes;

trait Owner {
    private $ownerName;
    private $contact;

    public function setOwner($name, $contact) {
        $this->ownerName = $name;
        $this->contact = $contact;
    }

    public function getOwner() {
        return "Owner: $this->ownerName, Contact: $this->contact";
    }
}
