<?php

//
class Location {
    
    private $locationid;
    private $nameOfLocation;
    private $address;
    private $maxCapacity;
    private $locationManagerName;
    private $locationManagerAddress;
    private $locationManagerNumber;

    public function __construct($lid, $nol, $a, $mc, $lmn, $lma, $lmno) {
        $this->locationid = $lid;
        $this->nameOfLocation = $nol;
        $this->address = $a;
        $this->maxCapacity = $mc;
        $this->locationManagerName = $lmn;
        $this->locationManagerAddress = $lma;
        $this->locationManagerNumber = $lmno;
    }
    
    public function getLocationid() {
        return $this->locationid;
    }
    
    public function getNameOfLocation() {
        return $this->nameOfLocation;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getMaxCapacity() {
        return $this->maxCapacity;
    }

    public function getLocationManagerName() {
        return $this->lmn;
    }

    public function getLocationManagerAddress() {
        return $this->lma;
    }

    public function getLocationManagerNumber() {
        return $this->lmno;
    }

}
