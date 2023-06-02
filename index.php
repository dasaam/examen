<?php
error_reporting(1);
ini_set('display_errors', 1);

require_once './models/ProductModel.php';
require_once './controllers/ProductController.php';
include_once './config/database.php';

$productModel = new ProductModel($conexion);
$productController = new ProductController($productModel);

if (isset($_GET['action'])) {

} else {
	$products = $productController->getProducts();

	include './views/includes/Head.php';
	include './views/ProductView.php';
	include './views/includes/Footer.php';
}
