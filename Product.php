<?php
class Product {
    private $conn;

    // Product properties
    public $id;
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
        return $stmt->execute();
    }

    // Method to get the product list
    public function getProducts() {
        $query = "SELECT * FROM products ORDER BY id"; // Adjust the ordering as necessary
        $result = $this->conn->query($query);
        
        $products = [];
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row; // Add each row to the products array
            }
        }
        
        return $products; // Return the array of products
    }
}
?>
