<?php
include("../includes/header.php");
include('../data/datos.php');
?>

<main>
<?php
if (isset($_GET['id'], $animales[$_GET['id']])) {

    $animal = $animales[$_GET['id']];
    echo '<h1>' . htmlspecialchars($animal['nombre']) . '</h1>';
    echo '<p><b>Hábitat:</b> ' . htmlspecialchars($animal['habitat']) . '</p>';
    echo '<div class="imagen"><img src="../uploads/images/' . htmlspecialchars($animal['imagen']) . '" alt="' . htmlspecialchars($animal['nombre']) . '" style="max-width:300px;"></div>';
    echo '<h2>Características</h2><ul>';

    foreach ($animal['caracteristicas'] as $car) echo '<li>' . htmlspecialchars($car) . '</li>';

    echo '</ul>';
    echo '<p><a href="../uploads/pdfs/' . htmlspecialchars($animal['pdf']) . '" target="_blank">Ver PDF descriptivo</a></p>';
    echo '<p><a href="update-animal.php?id=' . urlencode($_GET['id']) . '">Actualizar animal</a></p>';

} else {
    echo '<h1>Animal no encontrado</h1>';
}

?>

</main>
<?php include("../includes/footer.php"); ?>