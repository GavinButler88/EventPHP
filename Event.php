<?php

//
class Event {
    
    private $eventid;
    private $title;
    private $description;
    private $startDate;
    private $time;
    private $endDate;
    private $maxCapacity;
    private $price;
    private $locationid;

    public function __construct($id, $t, $d, $sd, $tm, $ed, $mc, $p, $lid) {
        $this->eventid = $id;
        $this->title = $t;
        $this->description = $d;
        $this->startDate = $sd;
        $this->time = $tm;
        $this->endDate = $ed;
        $this->maxCapacity = $mc;
        $this->price = $p;
        $this->locationid = $lid;
    }
    
    public function getEventid() {
        return $this->eventid;
    }
    
    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getstartDate() {
        return $this->startDate;
    }

    public function getTime() {
        return $this->time;
    }

    public function getendDate() {
        return $this->endDate;
    }

    public function getmaxCapacity() {
        return $this->maxCapacity;
    }

    public function getPrice() {
        return $this->price;
    }
    
    public function getLocationid() {
        return $this->locationid;
    }

}
