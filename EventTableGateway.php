<?php

class EventTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getEvents() {
        // execute a query to get all programmers
        $sqlQuery = "SELECT * FROM event";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve events");
        }

        return $statement;
    }

    public function getEventById($id) {
        // execute a query to get the user with the specified id
        $sqlQuery = 
                "SELECT e.*, l.NameOfLocation AS NameOfLocation
                 FROM event e
                 LEFT JOIN location l ON l.Locationid = e.Locationid";
             

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "Eventid" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve user");
        }

        return $statement;
    }

    //function to insert an event into a database
    public function insertEvent($t, $d, $sd, $tm, $ed, $mc, $p) {
        //execute a query to insert an event to the db
        $sqlQuery = "INSERT INTO event " .
                "(Title, Description, StartDate, Time, EndDate, MaxCapacity, Price) " .
                "VALUES (:Title, :Description, :StartDate, :Time, :EndDate, :MaxCapacity, :Price)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "Title" => $t,
            "Description" => $d,
            "StartDate" => $sd,
            "Time" => $tm,
            "EndDate" => $ed,
            "MaxCapacity" => $mc,
            "Price" => $p
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert user");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    //function and query to delete an event from the database
    public function deleteEvent($id) {
        $sqlQuery = "DELETE FROM event WHERE Eventid = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete user");
        }

        return ($statement->rowCount() == 1);
    }

    //function and query to edit an event in the database
    public function updateEvent($id, $t, $d, $sd, $tm, $ed, $mc, $p) {
        $sqlQuery = "UPDATE event SET Title=:Title, Description=:Description, StartDate=:StartDate,"
                . "Time=:Time, EndDate=:EndDate, MaxCapacity=:MaxCapacity, Price=:Price WHERE Eventid = :Eventid";


        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "Eventid" => $id,
            "Title" => $t,
            "Description" => $d,
            "StartDate" => $sd,
            "Time" => $tm,
            "EndDate" => $ed,
            "MaxCapacity" => $mc,
            "Price" => $p
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not update event");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

}
