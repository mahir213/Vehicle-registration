<?php 
require_once 'config.php';
require_once "../classes/Category.php";
require_once "../classes/Vehicle.php";
require_once "../classes/Owner.php" ;
require_once '../vehicle.php';


$category = new Category(); 
$categories = $category->fetch_all();


$vehicle_obj = new Vehicle();
$vehicle = null;

$owner_obj = new Owner();
$owners = $owner_obj->fetch_all();


if (isset($_GET['VehicleID'])) {
    $vehicle = $vehicle_obj->read($_GET['VehicleID']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

   
    $vehicle_id1 = $_POST['VehicleID'];
    $vehicle_id = intval($vehicle_id1);
    $type = $_POST['VehicleType'];
    $brand = $_POST['Brand'];
    $model = $_POST['Model'];
    $year_of_production = $_POST['YearOfProduction'];
    $color = $_POST['Color'];
    $chassis_number = $_POST['ChassisNumber'];
    $motor_num = $_POST['MotorNumber'];
    $power = intval($_POST['PowerkW']);
    $cc = intval($_POST['CylinderCapacity']);
    $reg_num = $_POST['RegistrationNumber'];
    $owner = intval($_POST['OwnerID']);

    
    if (isset($categories[$type])) {
        $realType = $categories[$type]['Category'];
    } else {
        die("Invalid vehicle type");
    }

   
    $vehicle_obj->update($realType, $brand, $model, $year_of_production, $color, $chassis_number, $motor_num, $power, $cc, $reg_num, $owner, $vehicle_id);

    
    header("Location: ../dashboard.php");
    exit();
}
?>  




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vehicle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Vehicle</h2>
    <form action="edit_vehicle.php" method="post">

    <div class="form-group">
    <label for="VehicleID">Vehicle ID</label>
    <input type="text" name="VehicleID" id="VehicleID" placeholder="Vehicle ID" value="<?php echo $vehicle['VehicleID']; ?>">
</div>

<div class="form-group">
    <label for="Category">Category</label>

    <select name="VehicleType" id="VehicleType">
    <?php foreach ($categories as $index => $category) : ?>
        <?php if ($category['Category'] === $vehicle['VehicleType']) : ?>
            <option value="<?php echo $index; ?>" selected><?php echo $category['Category']; ?></option>
        <?php else: ?>
            <option value="<?php echo $index; ?>"><?php echo $category['Category']; ?></option>
        <?php endif; ?>
    <?php endforeach; ?>
</select>      
</div>
<div class="form-group">
    <label for="Brand">Brand</label>
    <input type="text" name="Brand" id="Brand" placeholder="Brand" value="<?php echo $vehicle['Brand']; ?>">
</div>
<div class="form-group">
    <label for="Model">Model</label>
    <input type="text" name="Model" id="Model" placeholder="Model" value="<?php echo $vehicle['Model']; ?>">
</div>
<div class="form-group">
    <label for="YearOfProduction">Year of Production</label>
    <input type="text" name="YearOfProduction" id="YearOfProduction" placeholder="Year of Production" value="<?php echo $vehicle['YearOfProduction']; ?>">
</div>
<div class="form-group">
    <label for="Color">Color</label>
    <input type="text" name="Color" id="Color" placeholder="Color" value="<?php echo $vehicle['Color']; ?>">
</div>
<div class="form-group">
    <label for="ChassisNumber">Chassis Number</label>
    <input type="text" name="ChassisNumber" id="ChassisNumber" placeholder="Chassis Number" value="<?php echo $vehicle['ChassisNumber']; ?>">
</div>
<div class="form-group">
    <label for="MotorNumber">Motor Number</label>
    <input type="text" name="MotorNumber" id="MotorNumber" placeholder="Motor Number" value="<?php echo $vehicle['MotorNumber']; ?>">
</div>
<div class="form-group">
    <label for="PowerkW">Power kW</label>
    <input type="text" name="PowerkW" id="PowerkW" placeholder="Power kW" value="<?php echo $vehicle['PowerkW']; ?>">
</div>
<div class="form-group">
    <label for="CylinderCapacity">Cylinder Capacity</label>
    <input type="text" name="CylinderCapacity" id="CylinderCapacity" placeholder="Cylinder Capacity" value="<?php echo $vehicle['CylinderCapacity']; ?>">
</div>
<div class="form-group">
    <label for="RegistrationNumber">Registration Number</label>
    <input type="text" name="RegistrationNumber" id="RegistrationNumber" placeholder="Registration Number" value="<?php echo $vehicle['RegistrationNumber']; ?>">
</div>
<div class="form-group">
    <label for="OwnerID">Owner</label>
    <select name="OwnerID" id="OwnerID">
    <?php foreach ($owners as $oindex => $owner) : ?>
        <?php if ($owner['OwnerID'] === $vehicle['OwnerID']) : ?>
            <option value="<?php echo htmlspecialchars($owner['OwnerID']); ?>" selected><?php echo htmlspecialchars($owner['Name']) . ' ' . htmlspecialchars($owner['Surname']); ?></option>
        <?php else: ?>
            <option value="<?php echo htmlspecialchars($owner['OwnerID']); ?>"><?php echo htmlspecialchars($owner['Name']) . ' ' . htmlspecialchars($owner['Surname']); ?></option>
        <?php endif; ?>
    <?php endforeach; ?>
</select>

</div>


        <div class="form-group">
            <input type="submit" value="Edit vehicle">
        </div>
    </form>
</div>

</body>
</html>
