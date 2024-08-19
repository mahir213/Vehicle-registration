<?php require_once "config.php" ; ?>
<?php require_once "../classes/Vehicle.php" ; ?>
<?php require_once "../classes/Category.php" ; ?>
<?php require_once "../classes/Owner.php" ; ?>

<?php 

$vehicle = new Vehicle();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container">
            <a class="navbar-brand" href="#">Vehicle registration</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="../dashboard.php">Home</a>
                    </li>
                            <li class="nav-item">
                            
                            </li>
                            
                        </li>
                        <li class="nav-item">
                            
                        </li>  
                    
                </ul>   
            </div>
        </div>
    </nav>             
     

    <?php if(isset($_SESSION['message'])) : ?>
        <div class="alert alert-<?php echo $_SESSION['message']['type']; ?> alert-dismissible fade show" role ="alert">
        <?php
        echo $_SESSION['message']['text'];
        unset($_SESSION['message']);        
        ?>      
        </div>
    <?php endif; ?>