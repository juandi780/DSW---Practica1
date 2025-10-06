<?php
    include("../includes/header.php"); // incluimos el header y los datos
    include("../data/datos.php");
?>

    <main>
        <h1>Registrar nuevo animal</h1>
    <!-- Formulario para registrar un nuevo animal -->
    <form action="process-animal.php" method="POST" enctype="multipart/form-data" class ="form-group"> <!-- formulario con enctype para subir archivos y con clase form-group para estilos -->
        <label for="categoria">Categoría:</label>
        <select name="categoria" id="categoria" required>
            <?php
                foreach ($categorias as $id => $categ) {//recorremos las categorías para mostrarlas en el select
                    echo '<option value="' . $id . '">' . htmlspecialchars($categ['nombre']) . '</option>';
                }
            ?>
        </select>

        <!-- añadimos campos para la información del animal -->
        <label for="animal_id">ID del animal:</label>
        <input type="number" name="animal_id" id="animal_id" required>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="habitat">Hábitat:</label>
        <input type="text" name="habitat" id="habitat" required>

        <label for="caracteristicas">Características: (separa por comas)</label>
        <textarea name="caracteristicas" id="caracteristicas" rows="4" placeholder="Ejemplo 1, Ejemplo 2"></textarea>

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" accept="image/*">

        <label for="pdf">PDF descriptivo:</label>
        <input type="file" name="pdf" id="pdf" accept="application/pdf">
        <br><br>

        <button type="submit">Registrar el animal</button>

    </form>
    </main>
<?php
    include("../includes/footer.php"); //incluimos el footer
?>