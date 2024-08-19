<?php

class Category 
{
    protected $conn;

    public function __construct() 
    {
        global $conn;
        $this->conn = $conn;
    }

    public function fetch_all()
    {
        $sql = "SELECT * FROM reg_category";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);

        
    } 

    public function fetchAllCategoriesWithPrices() {
        $query = "SELECT * FROM reg_category";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateCategoryPrice($category, $price) {
        $query = "UPDATE reg_category SET Overview_price = ? WHERE Category = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ds', $price, $category);
        return $stmt->execute();
    }


    
} 