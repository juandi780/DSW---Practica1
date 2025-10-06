
<?php 
include("../includes/header.php");
include("../data/datos.php");
?>
<main>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $animal_id = $_POST['id'] ?? '';
    if ($animal_id && isset($animales[$animal_id])) {
        $success = true;
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $img_dest = "../uploads/images/{$animal_id}.jpg";
            if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $img_dest)) {
                $success = false; echo '<p>Error al subir la imagen.</p>';
            }
        }
        if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
            $pdf_dest = "../uploads/pdfs/{$animal_id}.pdf";
            if (!move_uploaded_file($_FILES['pdf']['tmp_name'], $pdf_dest)) {
                $success = false; echo '<p>Error al subir el PDF.</p>';
            }
        }
        if ($success) echo '<p>Archivos actualizados correctamente.</p>';
    } else {
        echo '<h1>Animal no encontrado</h1>';
    }
} else if (isset($_GET['id'], $animales[$_GET['id']])) {
    $animal_id = $_GET['id'];
    $animal = $animales[$animal_id];
    echo "<h1>-- " . htmlspecialchars($animal['nombre']) . " --</h1>";
    ?>
    <form action="update-animal.php?id=<?php echo $animal_id; ?>" method="POST" enctype="multipart/form-data" class="form-group">
        <input type="hidden" name="id" value="<?php echo $animal_id; ?>">
        <label for="imagen">Imagen: </label>
        <input type="file" name="imagen" id="imagen" accept="image/*">
        <label for="pdf">PDF descriptivo: </label>
        <input type="file" name="pdf" id="pdf" accept="application/pdf">
        <button type="submit">Actualizar</button>
    </form>
    <?php
} else {
    echo "<h1>Animal no encontrado</h1>";
}
?>
</main>
<?php include("../includes/footer.php"); ?>