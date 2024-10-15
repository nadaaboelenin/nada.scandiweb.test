<?php
class Product {
    private $conn;

    // Product properties
    public $sku;
    public $name;
    public $price;
    public $productType;
    public $size;
    public $weight;
    public $height;
    public $width;
    public $length;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Method to add a product
    public function addProduct() {
        // Prepare SQL query
        $query = "INSERT INTO products (sku, name, price, product_type, size, weight, height, width, length) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);

        // Bind values to parameters
        $stmt->bind_param("ssdssssss", 
            $this->sku, 
            $this->name, 
            $this->price, 
            $this->productType, 
            $this->size, 
            $this->weight, 
            $this->height, 
            $this->width, 
            $this->length
        );

        // Execute the statement
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
