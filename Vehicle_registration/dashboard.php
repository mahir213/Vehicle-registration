<?php 


require_once "public/config.php";
require_once "classes/Vehicle.php";

$vehicles = new Vehicle();
$fetchedVehicles = $vehicles->fetch_all();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .content {
            padding-top: 4rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Vehicle Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="public/add_vehicle.php">Add Vehicle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="public/add_owner.php">Add new Owner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="public/edit_category_price.php">Update overview price</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="content container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Vehicle ID</th>
                    <th scope="col">Type</th>
                    <th scope="col">Overview price</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Year of Production</th>
                    <th scope="col">Color</th>
                    <th scope="col">Chassis Number</th>
                    <th scope="col">Motor Number</th>
                    <th scope="col">Power (kW)</th>
                    <th scope="col">Cylinder Capacity</th>
                    <th scope="col">Registration Number</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fetchedVehicles as $vehicle): ?>
                <tr>
                    <td><?php echo $vehicle['VehicleID'];?></td>
                    <td><?php echo $vehicle['VehicleType'];?></td>
                    <td>$<?php echo $vehicle['Overview_price'];?></td>
                    <td><?php echo $vehicle['Brand'];?></td>
                    <td><?php echo $vehicle['Model'];?></td>
                    <td><?php echo $vehicle['YearOfProduction'];?></td>
                    <td><?php echo $vehicle['Color'];?></td>
                    <td><?php echo $vehicle['ChassisNumber'];?></td>
                    <td><?php echo $vehicle['MotorNumber'];?></td>
                    <td><?php echo $vehicle['PowerkW'];?></td>
                    <td><?php echo $vehicle['CylinderCapacity'];?></td>
                    <td><?php echo $vehicle['RegistrationNumber'];?></td>
                    <td><?php echo ''.$vehicle['Name']. ' ' . $vehicle['Surname'];?></td>
                    <td><?php echo $vehicle['created_at'];?></td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="public/edit_vehicle.php?VehicleID=<?php echo $vehicle['VehicleID'] ?>" class="btn btn-primary">Edit</a>
                            <a href="public/delete_vehicle.php?VehicleID=<?php echo $vehicle['VehicleID'];?>" class="btn btn-danger">Delete</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4HNIPjVp/Zjvgyo26VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
