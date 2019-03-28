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
          $pel1= new Peliculas("P000001","Star Wars: Los últimos Jedi","Disponible","Acción","Luke Skywalker","Estreno");
          $pel2= new Peliculas("P000002","Thor: Ragnarok","Disponible","Acción","Marvel","Estreno");
          $pel3= new Peliculas("P000003","El ocaso de la Luz","Disponible","Acción","Nicholas Cage","General");

          $videotienda= [$pel1,$pel2,$pel3];
          $imagenes = ['star-wars.jpg','thor.jpg','el-ocaso-de-la-luz.jpg'];
          echo "<ol>";
          for ( $i = 0 ; $i < count($videotienda); $i++){
            echo '<div class="columna-1">';
              echo "<li>". $videotienda[$i]->nombre."</li>";
              echo "<br>";
            echo '</div>';
              echo '<div class="columna-2">';
              echo '<img src="imagenes/'.$imagenes[$i].'"/>';
            echo '</div>';
          }
          echo "</ol>";

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $videoActual = $_POST['video'];
            echo '<div id="formato-impresion">'.$videotienda[$videoActual-1].
            "<br>Costo Alquiler: ".$videotienda[$videoActual-1]->costoAlquiler().'</div>';            
          }
          ?>
          <div class="parte-formulario">
            <input type="text" name="video" required placeholder="Seleccione Película">
            <input type="submit" value="Consultar">
          </div>
        </form>
    </section>
</body>
</html>
