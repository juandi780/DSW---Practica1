<?php
    include("../includes/header.php"); // incluimos el header y los datos
    include('../data/datos.php');
?>

<main>
    <?php
        if (isset($_GET['id']) && array_key_exists($_GET['id'], $categorias)) { // comprobamos que el id de la categoría existe

            // obtenemos la categoría y mostramos su información
            $categoria_id = (int) $_GET['id'];
            $categoria = $categorias[$_GET['id']];
            echo "<h1>" . htmlspecialchars($categoria['nombre']) . "</h1>";
            echo "<p>" . htmlspecialchars($categoria['descripcion']) . "</p>";

            // mostramos los animales que pertenecen a esta categoría
            echo "<h2>Animales en esta categoría:</h2>";
            echo "<ul>";
            foreach ($animales as $animal_id => $animal) {
                if ((int)$animal['categoria_id'] === $categoria_id) {//si el id de la categoría del animal coincide con el id de la categoría actual, lo mostramos
                    echo '<li><a href="animal.php?id=' . $animal_id . '">' . htmlspecialchars($animal['nombre']) . '</a></li>';
                }
            }
            echo "</ul>";
        } else {
            echo "<h1>Categoría no encontrada</h1>";//si no existe, damos este mensaje
        }
    ?>
</main>

<?php
    include("../includes/footer.php"); // incluimos el footer
?>