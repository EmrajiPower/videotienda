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
        $karaoke1 = new Karaokes('K000001','Carnaval de Barranquilla','Disponible','Cumbia',24,'Olimpica Stereo');
        $karaoke2 = new Karaokes('K000002','Mi tierrita linda','Disponible','Vallenato',15,'Megadiscos del valle');
        $karaoke3 = new Karaokes('K000003','Synthfest 2019','Disponible','Synthwave',21,'Nicemusic Records');

        $videotienda= [$karaoke1,$karaoke2,$karaoke3];

        echo "<ol>";
        for ( $i = 0 ; $i < count($videotienda) ; $i++){
          echo "<li>". $videotienda[$i]->nombre . "</li>";
        }
        echo "</ol>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $karaokeActual = $_POST['karaokes'];
          echo $videotienda[$karaokeActual-1]. "<br>Costo Alquiler: ".$videotienda[$karaokeActual-1]->costoAlquiler();
        }
        ?>
        <div class="parte-formulario">
          <input type="text" name="karaokes" required placeholder="Seleccione Karaoke">
          <input type="submit" value="Consultar">
        </div>
      </form>
    </section>
</body>
</html>
