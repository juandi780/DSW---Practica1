<?php
    include("../includes/header.php");
    include('../data/datos.php');
?>

<main>
    <?php
        if (isset($_GET['id']) && array_key_exists($_GET['id'], $categorias)) {
            $categoria_id = (int) $_GET['id'];
            $categoria = $categorias[$_GET['id']];

            echo "<h1>" . htmlspecialchars($categoria['nombre']) . "</h1>";
            echo "<p>" . htmlspecialchars($categoria['descripcion']) . "</p>";

            echo "<h2>Animales en esta categoría:</h2>";
            echo "<ul>";
            foreach ($animales as $animal_id => $animal) {
                if ((int)$animal['categoria_id'] === $categoria_id) {
                    echo '<li><a href="animal.php?id=' . $animal_id . '">' . htmlspecialchars($animal['nombre']) . '</a></li>';
                }
            }
            echo "</ul>";
        } else {
            echo "<h1>Categoría no encontrada</h1>";
        }
    ?>
</main>

<?php
    include("../includes/footer.php");
?>