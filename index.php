<?php
error_reporting(1);
ini_set('display_errors', 1);

require_once './models/ProductModel.php';
require_once './controllers/ProductController.php';
include_once './config/database.php';

$productModel = new ProductModel($conexion);
$productController = new ProductController($productModel);

if (isset($_GET['action'])) {
	$action = base64_decode($_GET['action']);

	switch ($action) {

		case 'add':
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {

				$name = htmlspecialchars($_POST['name']);
				$price = htmlspecialchars($_POST['price']);
				$quantity = htmlspecialchars($_POST['quantity']);

				$newProduct = new Product($name, $price, $quantity);
				$product = $productController->addProduct($newProduct);

				if ($product != null) {
					header('Location: index.php');
				} else {
					$message = 'Ocurrio un error al guardar';

					include './views/includes/Head.php';
					include './views/ProductNotificationView.php';
					include './views/includes/Footer.php';
				}
			} else {
				$product = new Product(null, null, null);
				$product->setId(null);

				include './views/includes/Head.php';
				include './views/ProductFormView.php';
				include './views/includes/Footer.php';
			}

			break;

		case 'update':
			
			break;

		case 'delete':

			
			break;

		default:
			$message = 'Acción desconocida.';

			include './views/includes/Head.php';
			include './views/ProductNotificationView.php';
			include './views/includes/Footer.php';
	}

} else {
	$products = $productController->getProducts();

	include './views/includes/Head.php';
	include './views/ProductView.php';
	include './views/includes/Footer.php';
}
