<?php
abstract class Videos{

  public $codigo,$nombre,$estado;

  public function __construct ($codigo,$nombre,$estado){
    $this->codigo=$codigo;
    $this->nombre=$nombre;
    $this->estado=$estado;
  }

  //To String equivale a imprimir factura//
  public function __toString(){
    $salida= "Codigo: ".$this->codigo ."<br>Nombre: ".$this->nombre
    . "<br>Estado: " .$this->estado;
    return $salida;
  }

  public abstract function costoAlquiler();

}

class Peliculas extends Videos {
  public $genero,$director,$categoria;

  public function __construct($codigo,$nombre,$estado,$genero,$director,$categoria){
    parent::__construct($codigo,$nombre,$estado);
    $this->genero = $genero;
    $this->director = $director;
    $this->categoria = $categoria;
  }

  public function __toString(){
    $salida = parent::__toString();
    $salida.= "<br>Genero: ". $this->genero . "<br>Director: " .$this->director
    . "<br>Categoria: " . $this->categoria;
    return $salida;
  }

  public function costoAlquiler(){
    if ($this->categoria == "Estreno"){
      return 7000;
    }else{
      return 5000;
    }
  }
}

  class Conciertos extends Videos
  {

    public $artista='',$ano=0,$lugar='';

    public function __construct($codigo,$nombre,$disponible,$artista,$ano,$lugar){
        parent::__construct($codigo,$nombre,$disponible);
        $this->artista = $artista;
        $this->ano = $ano;
        $this->lugar = $lugar;
    }

    public function __toString(){
        $salida= parent::__toString();
        $salida.="<br>Artista: ".$this->artista. "<br>Año: " .$this->ano. "<br>Lugar: ".$this->lugar;
        return $salida;
    }

    public function costoAlquiler(){
        if( ($this->ano) >= 2015){
            return 6000;
        }else{
            return 4500;
        }
    }

  }

class Karaokes extends Videos{

    public $genero='',$numCanciones=0,$compania='';

    public function __construct($codigo,$nombre,$disponible,$genero,$numCanciones,$compania){
        parent::__construct($codigo,$nombre,$disponible);
        $this->genero = $genero;
        $this->numCanciones = $numCanciones;
        $this->compañia = $compania;
    }

    public function __toString(){
        $salida= parent::__toString();
        $salida.="<br>Genero: ".$this->genero. "<br>Número de Canciones: "
        .$this->numCanciones. "<br>Compañía: ".$this->compania;
        return $salida;
    }

    public function costoAlquiler(){
        return 5000;
    }
}
