
<?php
include("../includes/header.php");
include("../data/datos.php");
include("../includes/funciones.php");
?>
<main>
<?php
$animal_id = $_POST['id'] ?? '';
$nombre = trim($_POST['nombre'] ?? '');
$habitat = trim($_POST['habitat'] ?? '');
$caracteristicas = trim($_POST['caracteristicas'] ?? '');
$categoria_id = $_POST['categoria_id'] ?? '';

$errores = [];
if ($nombre === '') $errores[] = "El nombre no puede estar vacío.";
if ($habitat === '') $errores[] = "El hábitat no puede estar vacío.";
if ($caracteristicas === '') $errores[] = "Las características no pueden estar vacías.";

$img_url = '';
$pdf_url = '';
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $img_dest = "../uploads/images/{$animal_id}.jpg";
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $img_dest)) $img_url = $img_dest;
    else $errores[] = "Error al subir la imagen.";
}
if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
    $pdf_dest = "../uploads/pdfs/{$animal_id}.pdf";
    if (move_uploaded_file($_FILES['pdf']['tmp_name'], $pdf_dest)) $pdf_url = $pdf_dest;
    else $errores[] = "Error al subir el PDF.";
}

mostrarErrores($errores);
if (!$errores) {
    echo "<h1>" . htmlspecialchars($nombre) . "</h1>";
    echo "<p><strong>Hábitat:</strong> " . htmlspecialchars($habitat) . "</p>";
    if ($img_url) echo "<img src='$img_url' alt='Imagen de $nombre' style='max-width:300px;'>";
    $caracts = array_map('trim', explode(',', $caracteristicas));
    mostrarCaracteristicas($caracts);
    if ($pdf_url) echo "<p><a href='$pdf_url' target='_blank'>Ver PDF descriptivo</a></p>";
}
?>
</main>
<?php include("../includes/footer.php"); ?>