<?php
    include("../includes/header.php");
    include('../data/datos.php');
?>
    <main>
        <h1>Listado de Caterogías</h1>
        <ul>
            <?php
                foreach($categorias as $categoria){
                    echo '<li><a href="category.php?id=' . $categoria['id'] . '">' . $categoria['nombre'] . '</a></li>';
                }
            ?>
        </ul>
    </main>
<?php
    include("../includes/footer.php");
?>