<?php

function mostrarCaracteristicas($caracts) {
	echo "<h3>Características:</h3><ul>";
	foreach ($caracts as $c) {
		echo "<li>" . htmlspecialchars($c) . "</li>";
	}
	echo "</ul>";
}

function mostrarErrores($errores) {
	if ($errores) {
		echo '<ul style="color:red">';
		foreach ($errores as $err) echo "<li>$err</li>";
		echo '</ul>';
	}
}
