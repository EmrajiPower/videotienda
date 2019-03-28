<!DOCTYPE html>
<html>
<link rel="stylesheet" href="tiendita.css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<body>
  <header class="info-container">
      <img src="" alt="" width="60" height="60">
      <div class="lista-container">
        <ol>
          <li>
            <a href="peliculas.php">Películas</a>
          </li>
          <li>
            <a href="conciertos.php">Conciertos</a>
          </li>
          <li>
            <a href="karaokes.php">Karaokes</a>
          </li>
        </ol>
      </div>
    </header>
    <section class="formulario-container">
      <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <?php
        require "Clases.php";
        $concierto1 = new Conciertos("C000001", "Brisas del Caribe", "No Disponible", "Totó la Momposina", 2019, "Intendencia Fluvial");
        $concierto2 = new Conciertos("C000002", "XVII Encuentro del Bambuco", "Disponible", "María Moñito", 2014, "Plaza de la Paz");
        $concierto3 = new Conciertos("C000003", "El bololó", "Disponible", "Chespirito", 2015, "Soledad 2000");

        $videotienda= [$concierto1,$concierto2,$concierto3];

        echo "<ol>";
        for ( $i = 0 ; $i < count($videotienda) ; $i++){
          echo "<li>". $videotienda[$i]->nombre . "</li>";
        }
        echo "</ol>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $conciertoActual = $_POST['concierto'];
          echo $videotienda[$conciertoActual-1]. "<br>Costo Alquiler: ".$videotienda[$conciertoActual-1]->costoAlquiler();
        }
        ?>
        <div class="parte-formulario">
          <input type="text" name="concierto" required placeholder="Seleccione concierto">
          <input type="submit" value="Consultar">
        </div>
      </form>
    </section>
</body>
</html>
