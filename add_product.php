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

// Get the input data from the request body
$data = json_decode(file_get_contents("php://input"));

// Set product properties
$product->sku = $data->sku;
$product->name = $data->name;
$product->price = $data->price;
$product->productType = $data->product_type;

switch ($product->productType) {
    case 'DVD':
        $product->size = $data->size;
        break;
    case 'Book':
        $product->weight = $data->weight;
        break;
    case 'Furniture':
        $product->height = $data->height;
        $product->width = $data->width;
        $product->length = $data->length;
        break;
    default:
        echo json_encode(array("message" => "Invalid product type."));
        exit();
}

// Try to add the product
if ($product->addProduct()) {
    echo json_encode(array("message" => "Product was added successfully."));
} else {
    echo json_encode(array("message" => "Unable to add product. Please check the SKU and try again."));
}
?>
