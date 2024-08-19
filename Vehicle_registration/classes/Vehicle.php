<?php

class Vehicle 
{
    protected $conn;

    public function __construct() 
    {
        global $conn;
        $this->conn = $conn;
    }

    public function fetch_all()
    {
        $sql = "SELECT * FROM vehicle INNER JOIN owner on vehicle.OwnerID = owner.OwnerID INNER JOIN reg_category ON reg_category.Category = vehicle.VehicleType";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function create($type, $brand, $model, $year_of_production, $color, $chassis_number, $motor_num, $power, $cc, $reg_num, $owner)
    { 
        $ownerCheckQuery = "SELECT 1 FROM owner WHERE OwnerID = ?";
        $ownerCheckStmt = $this->conn->prepare($ownerCheckQuery);
        if (!$ownerCheckStmt) {
            die("Prepare failed: " . $this->conn->error);
        }

        $ownerCheckStmt->bind_param('i', $owner);
        $ownerCheckStmt->execute();
        $ownerCheckStmt->store_result();

        if ($ownerCheckStmt->num_rows === 0) {
            die("Execute failed: OwnerID does not exist in the owner table.");
        }
        
        $ownerCheckStmt->close();
 
        $query = "INSERT INTO vehicle (VehicleType, Brand, Model, YearOfProduction, Color, ChassisNumber, MotorNumber, PowerkW, CylinderCapacity, RegistrationNumber, OwnerID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            die("Prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param('sssssssiisi', $type, $brand, $model, $year_of_production, $color, $chassis_number, $motor_num, $power, $cc, $reg_num, $owner);
        $success = $stmt->execute();
        if (!$success) {
            die("Execute failed: " . $stmt->error);
        }
    }


    public function read($vehicle_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM vehicle WHERE VehicleID=?");
        $stmt->bind_param("i", $vehicle_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function update($realType, $brand, $model, $year_of_production, $color, $chassis_number, $motor_num, $power, $cc, $reg_num, $owner, $vehicle_id)
    {
        $query  = "UPDATE vehicle SET VehicleType = ?, Brand = ?, Model = ?, YearOfProduction = ?, Color = ?, ChassisNumber = ?, MotorNumber = ?, PowerkW = ?, CylinderCapacity = ?, RegistrationNumber = ?, OwnerID = ? WHERE VehicleID = ?";
        
       
        if ($stmt = $this->conn->prepare($query)) {
            
            $stmt->bind_param('sssssssiissi', $realType, $brand, $model, $year_of_production, $color, $chassis_number, $motor_num, $power, $cc, $reg_num, $owner, $vehicle_id);
    
            if ($stmt->execute()) {
                
                if ($stmt->affected_rows > 0) {
                    echo "Update successful!";
                } else {
                    echo "No rows updated.";
                }
            } else {
               
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
    
            
            $stmt->close();
        } else {
           
            echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
        }
    }
    

    public function delete($vehicle_id)
    {
        $query = "DELETE FROM vehicle WHERE VehicleID = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $vehicle_id);
        $stmt->execute();
    }
} 