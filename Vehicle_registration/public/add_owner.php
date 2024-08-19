<?php
require_once "config.php";
require_once "../classes/Owner.php";

$owner = new Owner();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Name"];
    $surname = $_POST["Surname"];
    $birthday = $_POST["Birthday"];
    $birth_place = $_POST["Birth_place"];
    $address = $_POST["Address"];
    $city = $_POST["City"];
    $country = $_POST["Country"];
    $phone_number = $_POST["PhoneNumber"];
    $email = $_POST["Email"];

    if ($owner->add_owner($name, $surname, $birthday, $birth_place, $address, $city, $country, $phone_number, $email)) {
        echo "<p>New owner added successfully!</p>";
    } else {
        echo "<p>Failed to add new owner.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Owner</title>
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
        .form-group input[type="text"], 
        .form-group input[type="date"], 
        .form-group input[type="email"] {
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
    <h2>Add Owner</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="Name" id="Name" required>
        </div>

        <div class="form-group">
            <label for="Surname">Surname</label>
            <input type="text" name="Surname" id="Surname" required>
        </div>

        <div class="form-group">
            <label for="Birthday">Birthday</label>
            <input type="date" name="Birthday" id="Birthday" required>
        </div>

        <div class="form-group">
            <label for="Birth_place">Birth Place</label>
            <input type="text" name="Birth_place" id="Birth_place" required>
        </div>

        <div class="form-group">
            <label for="Address">Address</label>
            <input type="text" name="Address" id="Address" required>
        </div>

        <div class="form-group">
            <label for="City">City</label>
            <input type="text" name="City" id="City" required>
        </div>

        <div class="form-group">
            <label for="Country">Country</label>
            <input type="text" name="Country" id="Country" required>
        </div>

        <div class="form-group">
            <label for="PhoneNumber">Phone Number</label>
            <input type="text" name="PhoneNumber" id="PhoneNumber" required>
        </div>

        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" name="Email" id="Email" required>
        </div>

        <div class="form-group">
            <input type="submit" value="Add Owner">
        </div>
    </form>
</div>

</body>
</html>
