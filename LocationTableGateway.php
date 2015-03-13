<?php

class LocationTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getLocation() {
        // execute a query to get all programmers
        $sqlQuery = "SELECT * FROM location";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve locations");
        }

        return $statement;
    }

    public function getLocationById($id) {
        // execute a query to get the user with the specified id
        $sqlQuery = 
                "SELECT * FROM location WHERE Locationid = :Locationid";
             

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "Locationid" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve user");
        }

        return $statement;
    }

    //function to insert an event into a database
    public function insertLocation($nol, $a, $mc, $lmn, $lma, $lmno) {
        //execute a query to insert an event to the db
        $sqlQuery = "INSERT INTO location " .
                "(NameOfLocation, Address, MaxCapacity, LocationManagerName, LocationManagerAddress, LocationManagerNumber) " .
                "VALUES (:NameOfLocation, :Address, :MaxCapacity, :LocationManagerName, :LocationManagerAddress, :LocationManagerNumber)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "NameOfLocation" => $nol,
            "Address" => $a,
            "MaxCapacity" => $mc,
            "LocationManagerName" => $lmn,
            "LocationManagerAddress" => $lma,
            "LocationManagerNumber" => $lmno
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert location");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    //function and query to delete an event from the database
    public function deleteLocation($id) {
        $sqlQuery = "DELETE FROM location WHERE Locationid = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "Locationid" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete location");
        }

        return ($statement->rowCount() == 1);
    }

    //function and query to edit an event in the database
    public function updateLocation($lid, $nol, $a, $mc, $lmn, $lma, $lmno) {
        $sqlQuery = "UPDATE location SET NameOfLocation=:NameOfLocation, Address=:Address, MaxCapacity=:MaxCapacity,"
                . "LocationManagerName=:LocationManagerName, LocationManagerAddress=:LocationManagerAddress, LocationManagerNumber=:LocationManagerNumber WHERE Locationid = :Locationid";


        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "Locationid" => $id,
            "NameOfLocation" => $nol,
            "Address" => $a,
            "MaxCapacity" => mc,
            "LocationManagerName" => $lmn,
            "LocationManagerAddress" => $lma,
            "LocationManagerNumber" => $lmno
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not update event");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

}


