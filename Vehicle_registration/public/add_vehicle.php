<?php
require_once 'config.php';
require_once '../classes/Category.php';
require_once "../classes/Vehicle.php";
require_once "../classes/Vehicle.php";
require_once '../vehicle.php';

$category = new Category(); 
$categories = $category->fetch_all();


$owner = new Owner();
$owners = $owner->fetch_all();
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vehicle = new Vehicle();

    $type = $_POST['VehicleType']; 
    $brand = $_POST['Brand'];
    $model = $_POST['Model'];
    $year_of_production = $_POST['YearOfProduction']; 
    $color = $_POST['Color'];
    $chassis_number = $_POST['ChassisNumber'];
    $motor_num = $_POST['MotorNumber'];
    $power = $_POST['PowerkW'];
    $cc = $_POST['CylinderCapacity'];
    $reg_num = $_POST['RegistrationNumber'];
    $owner = $_POST['OwnerID']; 

    $realType = $categories[$type]['Category'];

    $vehicle->create($realType, $brand, $model, $year_of_production, $color, $chassis_number, $motor_num, $power, $cc, $reg_num, $owner);

    header('Location: ../dashboard.php');
}
?>

<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 500px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    form {
        display: grid;
        grid-template-columns: 1fr;
        gap: 10px;
    }
    input[type="text"],
    input[type="submit"],
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>

<form action="add_vehicle.php" method="post">
    <select name="VehicleType">
        <?php 
        foreach ($categories as $index => $category) {
            echo '<option value="'.$index.'">'.$category['Category'].'</option>';  
        }
        
        ?> 
    </select>
    <input type="text" name="Brand" placeholder="Brand">
    <input type="text" name="Model" placeholder="Model">
    <input type="hidden" name="YearOfProduction" id="YearOfProduction">
    <input type="text" name="Color" placeholder="Color"> 
    <input type="text" name="ChassisNumber" placeholder="Chassis Number">
    <input type="text" name="MotorNumber" placeholder="Motor Number">
    <input type="text" name="PowerkW" placeholder="Power kW">
    <input type="text" name="CylinderCapacity" placeholder="Cylinder Capacity">
    <input type="text" name="RegistrationNumber" placeholder="Registration Number">
    <select name="OwnerID" id="OwnerID">
        <?php 
        foreach ($owners as $oindex => $owner) {
            echo '<option value="' . htmlspecialchars($owner['OwnerID']) . '">' . htmlspecialchars($owner['Name']) . ' ' . htmlspecialchars($owner['Surname']) . '</option>';
        }
        ?> 
    </select> 
    <input type="submit" value="Add Vehicle">
</form> 