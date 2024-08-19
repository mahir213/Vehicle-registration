<?php
require_once 'config.php'; // Učitajte vašu konfiguraciju za bazu podataka
require_once '../classes/Category.php'; // Učitajte klasu Category


$category = new Category();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    foreach ($_POST['prices'] as $categoryName => $price) {
        $price = floatval($price); 
        $category->updateCategoryPrice($categoryName, $price);
    }
    header("Location: ../dashboard.php");
    exit();
}

$categories = $category->fetchAllCategoriesWithPrices();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Category Prices</title>
     
</head>
<body>

<style>
    

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: 50px auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h1 {
    text-align: center;
    color: #333;
}

form {
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
    color: #333;
}

tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

input[type="number"] {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

</style>


    <h1>Edit Category Prices</h1>
    <form method="POST" action="edit_category_price.php">
        <table border="1">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Overview Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $cat) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($cat['Category']); ?></td>
                        <td>
                            <input type="number" name="prices[<?php echo htmlspecialchars($cat['Category']); ?>]" value="<?php echo htmlspecialchars($cat['Overview_price']); ?>" step="0.01">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="submit">Update Prices</button>
    </form>
</body>
</html>



