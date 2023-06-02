<header class="bg-dark text-light py-2">
	<div class="container text-center">
		<h1>Notificación</h1>
	</div>
</header>

<main class="container" id="mainContainer">
	<?php if ($message != "") :  ?>
		<div class="alert alert-danger mt-5" role="alert">
			<?php echo $message ?>
		</div>
	<?php endif; ?>
	<a href="index.php" class="btn btn-outline-info">Regresar</a>
</main>