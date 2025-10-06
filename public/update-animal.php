

<?php 
include("../includes/header.php");
include("../data/datos.php");   //incluimos los datos, el header y las funciones para mostrar características
include("../includes/funciones.php");
?>
<main>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {//comprobamos que el método es POST
    $animal_id = $_POST['id'] ?? '';
    if ($animal_id && isset($animales[$animal_id])) {//comprobamos que el id del animal existe
        $success = true;
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $img_dest = "../uploads/images/{$animal_id}.jpg";
            if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $img_dest)) {
                $success = false; mostrarErrores(["Error al subir la imagen."]);
            }
        }
        if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
            $pdf_dest = "../uploads/pdfs/{$animal_id}.pdf";
            if (!move_uploaded_file($_FILES['pdf']['tmp_name'], $pdf_dest)) {
                $success = false; mostrarErrores(["Error al subir el PDF."]);
            }
        }
        if ($success) echo '<p>Archivos actualizados correctamente.</p>';//si todo ha ido bien mostramos un mensaje de éxito
    } else {
        echo '<h1>Animal no encontrado</h1>';//si no, mostramos un mensaje de error
    }
} else if (isset($_GET['id'], $animales[$_GET['id']])) {//si el método es GET comprobamos que el id del animal existe
    $animal_id = $_GET['id'];
    $animal = $animales[$animal_id];
    echo "<h1>-- " . htmlspecialchars($animal['nombre']) . " --</h1>";//mostramos el nombre del animal
    ?>
    <!-- Formulario para actualizar la imagen y el pdf del animal -->
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
    echo "<h1>Animal no encontrado.";//si no existe, se muestra un mensaje de error
}
?>
</main>
<?php include("../includes/footer.php"); //incluimos el footer

?>