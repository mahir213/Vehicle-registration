<?php

require_once"config.php";

class Owner {

    protected $conn;

    public function __construct() 
    {
        global $conn;
        $this->conn = $conn;
    }
   
    
    public function fetch_all() {
        $query = "SELECT * FROM owner";
        return $this->conn->query($query);
    }


    public function add_owner($name, $surname, $birthday, $birth_place, $address, $city, $country, $phone_number, $email) {
        $query = "INSERT INTO owner (Name, Surname, Birthday, Birth_place, Address, City, Country, PhoneNumber, Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sssssssss', $name, $surname, $birthday, $birth_place, $address, $city, $country, $phone_number, $email);
        return $stmt->execute();
    }

}
?>
