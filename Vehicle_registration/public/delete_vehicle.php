<?php
require_once 'config.php';
require_once '../classes/Vehicle.php';




    $vehicle = new Vehicle();

    $vehicle_id = $_GET['VehicleID'];

    $vehicle->delete($vehicle_id);

    header('Location: ../dashboard.php');



?>