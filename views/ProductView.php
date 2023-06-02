<header class="bg-dark text-light py-2">
	<div class="container text-center">
		<h1>Productos</h1>
	</div>
</header>

<main class="container" id="mainContainer">
	<div class="d-flex justify-content-center my-4">
		<a href="index.php?action=<?php echo base64_encode("add") ?>" class="btn btn-outline-info">
			Agregar
		</a>
	</div>

	<table class="table align-items-center table-flush" id="productsTable" style="width:100%">
		<thead class="thead-light">
			<tr>
				<th scope="col">Producto</th>
				<th scope="col">Precio</th>
				<th scope="col">Cantidad</th>
				<th scope="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($products as $product) : ?>
				<tr>
					<td><?php echo $product->getName(); ?></td>
					<td><?php echo $product->getPrice(); ?></td>
					<td><?php echo $product->getQuantity(); ?></td>
					<td>
						<a href="#">Editar</a> |
						<a href="#">Eliminar</a>

					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</main>