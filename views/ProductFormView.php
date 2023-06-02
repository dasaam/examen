<?php
$metodo = ($product->getId() == null ? 'agregar' : 'modificar');
$action = ($product->getId() == null ? base64_encode('add') : base64_encode('update') . '&id=' . base64_encode($product->getId()));
?>

<header class="bg-dark text-light py-2">
	<div class="container text-center">
		<h1><?php echo ucfirst($metodo) ?> producto</h1>
	</div>
</header>

<main class="container" id="mainContainer">
	<h3>
		<span class="my-4 badge badge-pill badge-<?php echo ($metodo == 'agregar' ? 'success' : 'warning') ?>">Accion : <?php echo $metodo ?></span>
	</h3>

	<form id="productForm" method="POST" action="index.php?action=<?php echo $action ?>">

		<div class="form-group">
			<label for="name"><span class="text-danger">(*)</span> Nombre</label>
			<input type="text" class="form-control" id="name" name="name" value="<?php echo $product->getName() ?>" placeholder="Nombre del producto" maxlength="250">
		</div>
		<div class="form-group">
			<label for="price"><span class="text-danger">(*)</span> Precio</label>
			<input type="number" class="form-control" id="price" name="price" min="1" value="<?php echo $product->getPrice() ?>" placeholder="Precio del producto">
		</div>
		<div class="form-group">
			<label for="quantity"><span class="text-danger">(*)</span> Cantidad</label>
			<input type="number" class="form-control" id="quantity" name="quantity" min="1" value="<?php echo $product->getQuantity() ?>" placeholder="Cantidad del producto">
		</div>

		<div class="form-floating d-flex justify-content-end">
			<button type="button" onclick="sendProductForm('productForm');" class="btn btn-outline-success mx-3">
				Guardar
			</button>

			<a href="index.php" class="btn btn-outline-info">Regresar</a>
		</div>
	</form>