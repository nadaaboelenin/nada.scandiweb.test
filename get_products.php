<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

include_once 'Database.php';
include_once 'Product.php';

// Create a database connection
$database = new Database();
$db = $database->getConnection();

// Create a new product instance
$product = new Product($db);

// Get the product list
$products = $product->getProducts();

// Check if products were found
if (!empty($products)) {
    echo json_encode($products); // Return the list of products as JSON
} else {
    echo json_encode(array("message" => "No products found."));
}
?>
